<?php 
namespace TYPO3\TYPO3CR\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3CR".               *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cache\CacheAwareInterface;
use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository;
use TYPO3\TYPO3CR\Domain\Service\Context;
use TYPO3\TYPO3CR\Exception\NodeExistsException;

/**
 * This is the main API for storing and retrieving content in the system.
 *
 * @Flow\Scope("prototype")
 * @api
 */
class Node_Original implements NodeInterface, CacheAwareInterface {

	/**
	 * The NodeData entity this version is for.
	 *
	 * @var \TYPO3\TYPO3CR\Domain\Model\NodeData
	 */
	protected $nodeData;

	/**
	 * @var Context
	 */
	protected $context;

	/**
	 * Defines if the NodeData represented by this Node is already
	 * in the same context or if it is currently just "shining through".
	 *
	 * @var boolean
	 */
	protected $nodeDataIsMatchingContext = NULL;

	/**
	 * @Flow\Inject
	 * @var NodeDataRepository
	 */
	protected $nodeDataRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Factory\NodeFactory
	 */
	protected $nodeFactory;

	/**
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeData $nodeData
	 * @param Context $context
	 * @throws \InvalidArgumentException if you give a Node as originalNode.
	 * @Flow\Autowiring(false)
	 */
	public function __construct(NodeData $nodeData, Context $context) {
		$this->nodeData = $nodeData;
		$this->context = $context;
	}

	/**
	 * Returns the absolute path of this node with additional context information (such as the workspace name).
	 *
	 * Example: /sites/mysitecom/homepage/about@user-admin
	 *
	 * @return string Node path with context information
	 * @api
	 */
	public function getContextPath() {
		$contextPath = $this->nodeData->getPath();
		$workspaceName = $this->context->getWorkspace()->getName();

		$contextPath .= '@' . $workspaceName;

		if ($this->context->getDimensions() !== array()) {
			$contextPath .= ';';
			foreach ($this->context->getDimensions() as $dimensionName => $dimensionValues) {
				$contextPath .= $dimensionName . '=' . implode(',', $dimensionValues) . '&';
			}
			$contextPath = substr($contextPath, 0, -1);
		}
		return $contextPath;
	}

	/**
	 * Set the name of the node to $newName, keeping its position as it is.
	 *
	 * @param string $newName
	 * @return void
	 * @throws \TYPO3\TYPO3CR\Exception\NodeException if you try to set the name of the root node.
	 * @throws \InvalidArgumentException if $newName is invalid
	 * @api
	 */
	public function setName($newName) {
		if (!is_string($newName) || preg_match(NodeInterface::MATCH_PATTERN_NAME, $newName) !== 1) {
			throw new \InvalidArgumentException('Invalid node name "' . $newName . '" (a node name must only contain characters, numbers and the "-" sign).', 1364290748);
		}

		if ($this->getPath() === '/') {
			throw new \TYPO3\TYPO3CR\Exception\NodeException('The root node cannot be renamed.', 1346778388);
		}

		if ($this->getName() === $newName) {
			return;
		}

		$this->setPath($this->getParentPath() . ($this->getParentPath() === '/' ? '' : '/') . $newName);
		$this->nodeDataRepository->persistEntities();
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Sets the absolute path of this node.
	 *
	 * This method is only for internal use by the content repository. Changing
	 * the path of a node manually may lead to unexpected behavior.
	 *
	 * @param string $path
	 * @param boolean $recursive
	 * @return void
	 */
	public function setPath($path, $recursive = TRUE) {
		if ($this->nodeData->getPath() === $path) {
			return;
		}
		if ($recursive === TRUE) {
			/** @var $childNode NodeInterface */
			foreach ($this->getChildNodes() as $childNode) {
				$childNode->setPath($path . '/' . $childNode->getNodeData()->getName(), TRUE);
			}
		}
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setPath($path, FALSE);
		$this->context->getFirstLevelNodeCache()->flush();
	}

	/**
	 * Returns the path of this node
	 *
	 * @return string
	 * @api
	 */
	public function getPath() {
		return $this->nodeData->getPath();
	}

	/**
	 * Returns the level at which this node is located.
	 * Counting starts with 0 for "/", 1 for "/foo", 2 for "/foo/bar" etc.
	 *
	 * @return integer
	 * @api
	 */
	public function getDepth() {
		return $this->nodeData->getDepth();
	}

	/**
	 * Returns the name of this node
	 *
	 * @return string
	 * @api
	 */
	public function getName() {
		return $this->nodeData->getName();
	}

	/**
	 * Returns an up to LABEL_MAXIMUM_LENGTH characters long plain text description of this node
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->nodeData->getLabel();
	}

	/**
	 * Returns a full length plain text description of this node
	 *
	 * @return string
	 */
	public function getFullLabel() {
		return $this->nodeData->getFullLabel();
	}

	/**
	 * Sets the workspace of this node.
	 *
	 * This method is only for internal use by the content repository. Changing
	 * the workspace of a node manually may lead to unexpected behavior.
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\Workspace $workspace
	 * @return void
	 */
	public function setWorkspace(Workspace $workspace) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setWorkspace($workspace);
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the workspace this node is contained in
	 *
	 * @return \TYPO3\TYPO3CR\Domain\Model\Workspace
	 * @api
	 */
	public function getWorkspace() {
		return $this->nodeData->getWorkspace();
	}

	/**
	 * Returns the identifier of this node
	 *
	 * @return string the node's UUID (unique within the workspace)
	 * @api
	 */
	public function getIdentifier() {
		return $this->nodeData->getIdentifier();
	}

	/**
	 * Sets the index of this node
	 *
	 * NOTE: This method is meant for internal use and must only be used by other nodes.
	 *
	 * @param integer $index The new index
	 * @return void
	 */
	public function setIndex($index) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setIndex($index);
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the index of this node which determines the order among siblings
	 * with the same parent node.
	 *
	 * @return integer
	 */
	public function getIndex() {
		return $this->nodeData->getIndex();
	}

	/**
	 * Returns the parent node of this node
	 *
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface The parent node or NULL if this is the root node
	 * @api
	 */
	public function getParent() {
		if ($this->getPath() === '/') {
			return NULL;
		}

		$parentPath = $this->getParentPath();
		$node = $this->context->getFirstLevelNodeCache()->getByPath($parentPath);
		if ($node !== FALSE) {
			return $node;
		}
		$node = $this->nodeDataRepository->findOneByPathInContext($parentPath, $this->context);
		$this->context->getFirstLevelNodeCache()->setByPath($parentPath, $node);
		return $node;
	}

	/**
	 * Returns the parent node path
	 *
	 * @return string Absolute node path of the parent node
	 * @api
	 */
	public function getParentPath() {
		return $this->nodeData->getParentPath();
	}

	/**
	 * Moves this node before the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @return void
	 * @throws \TYPO3\TYPO3CR\Exception\NodeException if you try to move the root node
	 * @throws \TYPO3\TYPO3CR\Exception\NodeExistsException
	 * @api
	 */
	public function moveBefore(NodeInterface $referenceNode) {
		if ($referenceNode === $this) {
			return;
		}

		if ($this->getPath() === '/') {
			throw new \TYPO3\TYPO3CR\Exception\NodeException('The root node cannot be moved.', 1285005924);
		}

		if ($referenceNode->getParent() !== $this->getParent() && $referenceNode->getParent()->getNode($this->getName()) !== NULL) {
			throw new \TYPO3\TYPO3CR\Exception\NodeExistsException('Node with path "' . $this->getName() . '" already exists.', 1292503468);
		}

		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		if ($referenceNode->getParentPath() !== $this->getParentPath()) {
			$parentPath = $referenceNode->getParentPath();
			$this->setPath($parentPath . ($parentPath === '/' ? '' : '/') . $this->getName());
			$this->nodeDataRepository->persistEntities();
		}

		$this->nodeDataRepository->setNewIndex($this->nodeData, NodeDataRepository::POSITION_BEFORE, $referenceNode);
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Moves this node after the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @throws \TYPO3\TYPO3CR\Exception\NodeExistsException
	 * @throws \TYPO3\TYPO3CR\Exception\NodeException
	 * @return void
	 * @api
	 */
	public function moveAfter(NodeInterface $referenceNode) {
		if ($referenceNode === $this) {
			return;
		}

		if ($this->getPath() === '/') {
			throw new \TYPO3\TYPO3CR\Exception\NodeException('The root node cannot be moved.', 1316361483);
		}

		if ($referenceNode->getParent() !== $this->getParent() && $referenceNode->getParent()->getNode($this->getName()) !== NULL) {
			throw new \TYPO3\TYPO3CR\Exception\NodeExistsException('Node with path "' . $this->getName() . '" already exists.', 1292503469);
		}

		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		if ($referenceNode->getParentPath() !== $this->getParentPath()) {
			$parentPath = $referenceNode->getParentPath();
			$this->setPath($parentPath . ($parentPath === '/' ? '' : '/') . $this->getName());
			$this->nodeDataRepository->persistEntities();
		}

		$this->nodeDataRepository->setNewIndex($this->nodeData, NodeDataRepository::POSITION_AFTER, $referenceNode);
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Moves this node into the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @throws \TYPO3\TYPO3CR\Exception\NodeExistsException
	 * @throws \TYPO3\TYPO3CR\Exception\NodeException
	 * @return void
	 * @api
	 */
	public function moveInto(NodeInterface $referenceNode) {
		if ($referenceNode === $this || $referenceNode === $this->getParent()) {
			return;
		}

		if ($this->getPath() === '/') {
			throw new \TYPO3\TYPO3CR\Exception\NodeException('The root node cannot be moved.', 1346769001);
		}

		if ($referenceNode !== $this->getParent() && $referenceNode->getNode($this->getName()) !== NULL) {
			throw new \TYPO3\TYPO3CR\Exception\NodeExistsException('Node with path "' . $this->getName() . '" already exists.', 1292503470);
		}

		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$parentPath = $referenceNode->getPath();
		$this->setPath($parentPath . ($parentPath === '/' ? '' : '/') . $this->getName());
		$this->nodeDataRepository->persistEntities();

		$this->nodeDataRepository->setNewIndex($this->nodeData, NodeDataRepository::POSITION_LAST);
		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Copies this node before the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @param string $nodeName
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 * @throws NodeExistsException
	 * @api
	 */
	public function copyBefore(NodeInterface $referenceNode, $nodeName) {
		if ($referenceNode->getParent()->getNode($nodeName) !== NULL) {
			throw new NodeExistsException('Node with path "' . $referenceNode->getParent()->getPath() . '/' . $nodeName . '" already exists.', 1292503465);
		}
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}

		$copiedNode = $this->createRecursiveCopy($referenceNode->getParent(), $nodeName);
		$copiedNode->moveBefore($referenceNode);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($copiedNode);

		return $copiedNode;
	}

	/**
	 * Copies this node after the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @param string $nodeName
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 * @throws NodeExistsException
	 * @api
	 */
	public function copyAfter(NodeInterface $referenceNode, $nodeName) {
		if ($referenceNode->getParent()->getNode($nodeName) !== NULL) {
			throw new NodeExistsException('Node with path "' . $referenceNode->getParent()->getPath() . '/' . $nodeName . '" already exists.', 1292503466);
		}
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}

		$copiedNode = $this->createRecursiveCopy($referenceNode->getParent(), $nodeName);
		$copiedNode->moveAfter($referenceNode);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($copiedNode);

		return $copiedNode;
	}

	/**
	 * Copies this node into the given node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @param string $nodeName
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 * @throws NodeExistsException
	 * @api
	 */
	public function copyInto(NodeInterface $referenceNode, $nodeName) {
		if ($referenceNode->getNode($nodeName) !== NULL) {
			throw new NodeExistsException('Node with path "' . $referenceNode->getPath() . '/' . $nodeName . '" already exists.', 1292503467);
		}
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}

		$copiedNode = $this->createRecursiveCopy($referenceNode, $nodeName);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($copiedNode);

		return $copiedNode;
	}

	/**
	 * Sets the specified property.
	 *
	 * If the node has a content object attached, the property will be set there
	 * if it is settable.
	 *
	 * @param string $propertyName Name of the property
	 * @param mixed $value Value of the property
	 * @return mixed
	 * @api
	 */
	public function setProperty($propertyName, $value) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setProperty($propertyName, $value);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * If this node has a property with the given name.
	 *
	 * If the node has a content object attached, the property will be checked
	 * there.
	 *
	 * @param string $propertyName
	 * @return boolean
	 * @api
	 */
	public function hasProperty($propertyName) {
		return $this->nodeData->hasProperty($propertyName);
	}

	/**
	 * Returns the specified property.
	 *
	 * If the node has a content object attached, the property will be fetched
	 * there if it is gettable.
	 *
	 * @param string $propertyName Name of the property
	 * @param boolean $returnNodesAsIdentifiers If enabled, references to nodes are returned as node identifiers instead of NodeData objects
	 * @return mixed value of the property
	 * @api
	 */
	public function getProperty($propertyName, $returnNodesAsIdentifiers = FALSE) {
		$value = $this->nodeData->getProperty($propertyName, $returnNodesAsIdentifiers, $this->context);
		if (!empty($value) && $returnNodesAsIdentifiers === FALSE) {
			switch($this->getNodeType()->getPropertyType($propertyName)) {
				case 'references' :
					$nodes = array();
					foreach ($value as $nodeData) {
						$node = $this->nodeFactory->createFromNodeData($nodeData, $this->context);
						// $node can be NULL if the node is not visible according to the current content context:
						if ($node !== NULL) {
							$nodes[] = $node;
						}
					}
					$value = $nodes;
				break;
				case 'reference' :
					$value = $this->nodeFactory->createFromNodeData($value, $this->context);
				break;
			}
		}
		return $value;
	}

	/**
	 * Removes the specified property.
	 *
	 * If the node has a content object attached, the property will not be removed on
	 * that object if it exists.
	 *
	 * @param string $propertyName Name of the property
	 * @return void
	 * @throws \TYPO3\TYPO3CR\Exception\NodeException if the node does not contain the specified property
	 */
	public function removeProperty($propertyName) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->removeProperty($propertyName);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns all properties of this node.
	 *
	 * If the node has a content object attached, the properties will be fetched
	 * there.
	 *
	 * @param boolean $returnNodesAsIdentifiers If enabled, references to nodes are returned as node identifiers instead of NodeData objects
	 * @return array Property values, indexed by their name
	 * @api
	 */
	public function getProperties($returnNodesAsIdentifiers = FALSE) {
		$properties = array();
		foreach ($this->getPropertyNames() as $propertyName) {
			$properties[$propertyName] = $this->getProperty($propertyName, $returnNodesAsIdentifiers);
		}
		return $properties;
	}

	/**
	 * Returns the names of all properties of this node.
	 *
	 * @return array Property names
	 * @api
	 */
	public function getPropertyNames() {
		return $this->nodeData->getPropertyNames();
	}

	/**
	 * Sets a content object for this node.
	 *
	 * @param object $contentObject The content object
	 * @return void
	 * @api
	 */
	public function setContentObject($contentObject) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setContentObject($contentObject);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the content object of this node (if any).
	 *
	 * @return object
	 * @api
	 */
	public function getContentObject() {
		return $this->nodeData->getContentObject();
	}

	/**
	 * Unsets the content object of this node.
	 *
	 * @return void
	 * @api
	 */
	public function unsetContentObject() {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->unsetContentObject();

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Sets the node type of this node.
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeType $nodeType
	 * @return void
	 * @api
	 */
	public function setNodeType(NodeType $nodeType) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setNodeType($nodeType);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the node type of this node.
	 *
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeType
	 * @api
	 */
	public function getNodeType() {
		return $this->nodeData->getNodeType();
	}

	/**
	 * Creates, adds and returns a child node of this node. Also sets default
	 * properties and creates default subnodes.
	 *
	 * @param string $name Name of the new node
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeType $nodeType Node type of the new node (optional)
	 * @param string $identifier The identifier of the node, unique within the workspace, optional(!)
	 * @param array $dimensions Content dimension values to set on the node (Array of dimension names to array of values)
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 * @api
	 */
	public function createNode($name, NodeType $nodeType = NULL, $identifier = NULL, array $dimensions = NULL) {
		$newNode = $this->createSingleNode($name, $nodeType, $identifier, $dimensions);
		if ($nodeType !== NULL) {
			foreach ($nodeType->getDefaultValuesForProperties() as $propertyName => $propertyValue) {
				if (substr($propertyName, 0, 1) === '_') {
					ObjectAccess::setProperty($newNode, substr($propertyName, 1), $propertyValue);
				} else {
					$newNode->setProperty($propertyName, $propertyValue);
				}
			}

			foreach ($nodeType->getAutoCreatedChildNodes() as $childNodeName => $childNodeType) {
				$childNodeIdentifier = $this->buildAutoCreatedChildNodeIdentifier($childNodeName, $newNode->getIdentifier());
				$newNode->createNode($childNodeName, $childNodeType, $childNodeIdentifier, $dimensions);
			}
		}

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($newNode);

		return $newNode;
	}

	/**
	 * Generate a stable identifier for auto-created child nodes
	 *
	 * This is needed if multiple node variants are created through "createNode" with different dimension values. If
	 * child nodes with the same path and different identifiers exist, bad things can happen.
	 *
	 * @param string $childNodeName
	 * @param string $identifier
	 * @return string The generated UUID like identifier
	 */
	protected function buildAutoCreatedChildNodeIdentifier($childNodeName, $identifier) {
		$hex = md5($identifier . '-' . $childNodeName);
		return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
	}

	/**
	 * Creates, adds and returns a child node of this node, without setting default
	 * properties or creating subnodes. Only used internally.
	 *
	 * For internal use only!
	 * TODO: Check if we can change the import service to avoid making this public.
	 *
	 * @param string $name Name of the new node
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeType $nodeType Node type of the new node (optional)
	 * @param string $identifier The identifier of the node, unique within the workspace, optional(!)
	 * @param array $dimensions Content dimension values to set on the node (Array of dimension names to array of values)
	 * @return \TYPO3\TYPO3CR\Domain\Model\Node
	 */
	public function createSingleNode($name, NodeType $nodeType = NULL, $identifier = NULL, array $dimensions = NULL) {
		if ($dimensions === NULL || $dimensions === array()) {
			$dimensions = $this->context->getTargetDimensionValues();
		}

		$nodeData = $this->nodeData->createSingleNodeData($name, $nodeType, $identifier, $this->context->getWorkspace(), $dimensions);
		$node = $this->nodeFactory->createFromNodeData($nodeData, $this->context);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($node);

		return $node;
	}

	/**
	 * Creates and persists a node from the given $nodeTemplate as child node
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeTemplate $nodeTemplate
	 * @param string $nodeName name of the new node. If not specified the name of the nodeTemplate will be used.
	 * @return NodeInterface the freshly generated node
	 * @api
	 */
	public function createNodeFromTemplate(NodeTemplate $nodeTemplate, $nodeName = NULL) {
		$nodeData = $this->nodeData->createNodeDataFromTemplate($nodeTemplate, $nodeName, $this->context->getWorkspace(), $this->context->getDimensions());
		$node = $this->nodeFactory->createFromNodeData($nodeData, $this->context);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($node);

		return $node;
	}

	/**
	 * Returns a node specified by the given relative path.
	 *
	 * @param string $path Path specifying the node, relative to this node
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface The specified node or NULL if no such node exists
	 * @api
	 */
	public function getNode($path) {
		$absolutePath = $this->nodeData->normalizePath($path);
		$node = $this->context->getFirstLevelNodeCache()->getByPath($absolutePath);
		if ($node !== FALSE) {
			return $node;
		}
		$node = $this->nodeDataRepository->findOneByPathInContext($absolutePath, $this->context);
		$this->context->getFirstLevelNodeCache()->setByPath($absolutePath, $node);
		return $node;
	}

	/**
	 * Returns the primary child node of this node.
	 *
	 * Which node acts as a primary child node will in the future depend on the
	 * node type. For now it is just the first child node.
	 *
	 * @return \TYPO3\TYPO3CR\Domain\Model\Node The primary child node or NULL if no such node exists
	 * @api
	 */
	public function getPrimaryChildNode() {
		return $this->nodeDataRepository->findFirstByParentAndNodeTypeInContext($this->getPath(), NULL, $this->context);
	}

	/**
	 * Returns all direct child nodes of this node.
	 * If a node type is specified, only nodes of that type are returned.
	 *
	 * @param string $nodeTypeFilter If specified, only nodes with that node type are considered
	 * @param integer $limit An optional limit for the number of nodes to find. Added or removed nodes can still change the number nodes!
	 * @param integer $offset An optional offset for the query
	 * @return array<\TYPO3\TYPO3CR\Domain\Model\NodeInterface> An array of nodes or an empty array if no child nodes matched
	 * @api
	 */
	public function getChildNodes($nodeTypeFilter = NULL, $limit = NULL, $offset = NULL) {
		$nodes = $this->context->getFirstLevelNodeCache()->getChildNodesByPathAndNodeTypeFilter($this->getPath(), $nodeTypeFilter);
		if ($nodes === FALSE) {
			$nodes = $this->nodeDataRepository->findByParentAndNodeTypeInContext($this->getPath(), $nodeTypeFilter, $this->context, $limit, $offset);
			$this->context->getFirstLevelNodeCache()->setChildNodesByPathAndNodeTypeFilter($this->getPath(), $nodeTypeFilter, $nodes);
		}

		if ($offset !== NULL || $limit !== NULL) {
			$offset = ($offset === NULL) ? 0 : $offset;
			return array_slice($nodes, $offset, $limit);
		}

		return $nodes;
	}

	/**
	 * Returns the number of child nodes a similar getChildNodes() call would return.
	 *
	 * @param string $nodeTypeFilter If specified, only nodes with that node type are considered
	 * @return integer The number of child nodes
	 * @api
	 */
	public function getNumberOfChildNodes($nodeTypeFilter = NULL) {
		return $this->nodeData->getNumberOfChildNodes($nodeTypeFilter, $this->context->getWorkspace(), $this->context->getDimensions());
	}

	/**
	 * Checks if this node has any child nodes.
	 *
	 * @param string $nodeTypeFilter If specified, only nodes with that node type are considered
	 * @return boolean TRUE if this node has child nodes, otherwise FALSE
	 * @api
	 */
	public function hasChildNodes($nodeTypeFilter = NULL) {
		return ($this->getNumberOfChildNodes($nodeTypeFilter, $this->context->getWorkspace(), $this->context->getDimensions()) > 0);
	}

	/**
	 * Removes this node and all its child nodes.
	 *
	 * @return void
	 * @api
	 */
	public function remove() {
		/** @var $childNode Node */
		foreach ($this->getChildNodes() as $childNode) {
			$childNode->remove();
		}

		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->remove();

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeRemoved($this);
	}

	/**
	 * Enables using the remove method when only setters are available
	 *
	 * @param boolean $removed If TRUE, this node and it's child nodes will be removed. Cannot handle FALSE (yet).
	 * @return void
	 * @api
	 */
	public function setRemoved($removed) {
		if ((boolean)$removed === TRUE) {
			$this->remove();
		}
	}

	/**
	 * If this node is a removed node.
	 *
	 * @return boolean
	 * @api
	 */
	public function isRemoved() {
		return $this->nodeData->isRemoved();
	}

	/**
	 * Sets the "hidden" flag for this node.
	 *
	 * @param boolean $hidden If TRUE, this Node will be hidden
	 * @return void
	 * @api
	 */
	public function setHidden($hidden) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setHidden($hidden);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the current state of the hidden flag
	 *
	 * @return boolean
	 * @api
	 */
	public function isHidden() {
		return $this->nodeData->isHidden();
	}

	/**
	 * Sets the date and time when this node becomes potentially visible.
	 *
	 * @param \DateTime $dateTime Date before this node should be hidden
	 * @return void
	 * @api
	 */
	public function setHiddenBeforeDateTime(\DateTime $dateTime = NULL) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setHiddenBeforeDateTime($dateTime);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the date and time before which this node will be automatically hidden.
	 *
	 * @return \DateTime Date before this node will be hidden
	 * @api
	 */
	public function getHiddenBeforeDateTime() {
		return $this->nodeData->getHiddenBeforeDateTime();
	}

	/**
	 * Sets the date and time when this node should be automatically hidden
	 *
	 * @param \DateTime $dateTime Date after which this node should be hidden
	 * @return void
	 * @api
	 */
	public function setHiddenAfterDateTime(\DateTime $dateTime = NULL) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setHiddenAfterDateTime($dateTime);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the date and time after which this node will be automatically hidden.
	 *
	 * @return \DateTime Date after which this node will be hidden
	 * @api
	 */
	public function getHiddenAfterDateTime() {
		return $this->nodeData->getHiddenAfterDateTime();
	}

	/**
	 * Sets if this node should be hidden in indexes, such as a site navigation.
	 *
	 * @param boolean $hidden TRUE if it should be hidden, otherwise FALSE
	 * @return void
	 * @api
	 */
	public function setHiddenInIndex($hidden) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setHiddenInIndex($hidden);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * If this node should be hidden in indexes
	 *
	 * @return boolean
	 * @api
	 */
	public function isHiddenInIndex() {
		return $this->nodeData->isHiddenInIndex();
	}

	/**
	 * Sets the roles which are required to access this node
	 *
	 * @param array $accessRoles
	 * @return void
	 * @api
	 */
	public function setAccessRoles(array $accessRoles) {
		if (!$this->isNodeDataMatchingContext()) {
			$this->materializeNodeData();
		}
		$this->nodeData->setAccessRoles($accessRoles);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeUpdated($this);
	}

	/**
	 * Returns the names of defined access roles
	 *
	 * @return array
	 * @api
	 */
	public function getAccessRoles() {
		return $this->nodeData->getAccessRoles();
	}

	/**
	 * Tells if a node, in general,  has access restrictions, independent of the
	 * current security context.
	 *
	 * @return boolean
	 * @api
	 */
	public function hasAccessRestrictions() {
		return $this->nodeData->hasAccessRestrictions();
	}

	/**
	 * Tells if this node is "visible".
	 *
	 * For this the "hidden" flag and the "hiddenBeforeDateTime" and "hiddenAfterDateTime" dates are
	 * taken into account.
	 *
	 * @return boolean
	 * @api
	 */
	public function isVisible() {
		if ($this->nodeData->isVisible() === FALSE) {
			return FALSE;
		}
		$currentDateTime = $this->context->getCurrentDateTime();
		if ($this->getHiddenBeforeDateTime() !== NULL && $this->getHiddenBeforeDateTime() > $currentDateTime) {
			return FALSE;
		}
		if ($this->getHiddenAfterDateTime() !== NULL && $this->getHiddenAfterDateTime() < $currentDateTime) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Tells if this node may be accessed according to the current security context.
	 *
	 * @return boolean
	 * @api
	 */
	public function isAccessible() {
		return $this->nodeData->isAccessible();
	}

	/**
	 * Returns the context this node operates in.
	 *
	 * @return \TYPO3\TYPO3CR\Domain\Service\Context
	 * @api
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * Materializes the original node data (of a different workspace) into the current
	 * workspace.
	 *
	 * @return void
	 */
	protected function materializeNodeData() {
		$dimensions = $this->context->getTargetDimensionValues();

		$newNodeData = new NodeData($this->nodeData->getPath(), $this->context->getWorkspace(), $this->nodeData->getIdentifier(), $dimensions);
		$this->nodeDataRepository->add($newNodeData);

		$newNodeData->similarize($this->nodeData);

		$this->nodeData = $newNodeData;
		$this->nodeDataIsMatchingContext = TRUE;

		$nodeType = $this->getNodeType();
		foreach ($nodeType->getAutoCreatedChildNodes() as $childNodeName => $childNodeConfiguration) {
			$childNode = $this->getNode($childNodeName);
			if ($childNode instanceof Node && !$childNode->isNodeDataMatchingContext()) {
				$childNode->materializeNodeData();
			}
		}
	}

	/**
	 * Create a recursive copy of this node below $referenceNode with $nodeName.
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $referenceNode
	 * @param string $nodeName
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 */
	protected function createRecursiveCopy(NodeInterface $referenceNode, $nodeName) {
		$copiedNode = $referenceNode->createSingleNode($nodeName);
		$copiedNode->similarize($this);
		/** @var $childNode Node */
		foreach ($this->getChildNodes() as $childNode) {
			// Prevent recursive copy when copying into itself
			if ($childNode->getIdentifier() !== $copiedNode->getIdentifier()) {
				$childNode->copyInto($copiedNode, $childNode->getName());
			}
		}

		return $copiedNode;
	}

	/**
	 * The NodeData matches the context if the workspace matches exactly.
	 * Needs to be adjusted for further context dimensions.
	 *
	 * @return boolean
	 */
	protected function isNodeDataMatchingContext() {
		if ($this->nodeDataIsMatchingContext === NULL) {
			$workspacesMatch = $this->nodeData->getWorkspace() !== NULL && $this->context->getWorkspace() !== NULL && $this->nodeData->getWorkspace()->getName() === $this->context->getWorkspace()->getName();
			$this->nodeDataIsMatchingContext = $workspacesMatch && $this->dimensionsAreMatchingTargetDimensionValues();
		}
		return $this->nodeDataIsMatchingContext;
	}

	/**
	 * For internal use in createRecursiveCopy.
	 *
	 * @param NodeInterface $sourceNode
	 * @return void
	 */
	public function similarize(NodeInterface $sourceNode) {
		$this->nodeData->similarize($sourceNode->getNodeData());
	}

	/**
	 * @return NodeData
	 */
	public function getNodeData() {
		return $this->nodeData;
	}

	/**
	 * Returns a string which distinctly identifies this object and thus can be used as an identifier for cache entries
	 * related to this object.
	 *
	 * @return string
	 */
	public function getCacheEntryIdentifier() {
		return $this->getContextPath();
	}

	/**
	 * Return the assigned content dimensions of the node.
	 *
	 * @return array
	 */
	public function getDimensions() {
		return $this->nodeData->getDimensionValues();
	}

	/**
	 * For debugging purposes, the node can be converted to a string.
	 *
	 * @return string
	 */
	public function __toString() {
		return 'Node ' . $this->getContextPath() . '[' . $this->getNodeType()->getName() . ']';
	}

	/**
	 * Given a context a new node is returned that is like this node, but
	 * lives in the new context.
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Service\Context $context
	 * @return NodeInterface
	 */
	public function createVariantForContext($context) {
		$autoCreatedChildNodes = array();
		$nodeType = $this->getNodeType();
		foreach ($nodeType->getAutoCreatedChildNodes() as $childNodeName => $childNodeConfiguration) {
			$childNode = $this->getNode($childNodeName);
			if ($childNode !== NULL) {
				$autoCreatedChildNodes[$childNodeName] = $childNode;
			}
		}

		$nodeData = clone $this->nodeData;
		$nodeData->adjustToContext($context);

		$node = $this->nodeFactory->createFromNodeData($nodeData, $context);

		$this->context->getFirstLevelNodeCache()->flush();
		$this->emitNodeAdded($node);

		foreach ($autoCreatedChildNodes as $autoCreatedChildNode) {
			$autoCreatedChildNode->createVariantForContext($context);
		}

		return $node;
	}

	/**
	 * Internal method
	 *
	 * The dimension value of this node has to match the current target dimension value (must be higher in priority or equal)
	 *
	 * @return boolean
	 */
	public function dimensionsAreMatchingTargetDimensionValues() {
		$dimensions = $this->getDimensions();
		$contextDimensions = $this->context->getDimensions();
		foreach ($this->context->getTargetDimensions() as $dimensionName => $targetDimensionValue) {
			if (!isset($dimensions[$dimensionName])) {
				return FALSE;
			} elseif (!in_array($targetDimensionValue, $dimensions[$dimensionName], TRUE)) {
				$contextDimensionValues = $contextDimensions[$dimensionName];
				$targetPositionInContext = array_search($targetDimensionValue, $contextDimensionValues, TRUE);
				$nodePositionInContext = min(array_map(function ($value) use ($contextDimensionValues) { return array_search($value, $contextDimensionValues, TRUE); }, $dimensions[$dimensionName]));

				$val = $targetPositionInContext !== FALSE && $nodePositionInContext !== FALSE && $targetPositionInContext >= $nodePositionInContext;
				if ($val === FALSE) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	/**
	 * Set the associated NodeData in regards to the Context.
	 *
	 * NOTE: This is internal only and should not be used outside of the TYPO3CR.
	 *
	 * @param NodeData $nodeData
	 * @return void
	 */
	public function setNodeData(NodeData $nodeData) {
		$this->nodeData = $nodeData;
		$this->nodeDataIsMatchingContext = NULL;
	}

	/**
	 * Set the status of the associated NodeData in regards to the Context.
	 *
	 * NOTE: This is internal only and should not be used outside of the TYPO3CR.
	 *
	 * @param boolean $status
	 * @return void
	 */
	public function setNodeDataIsMatchingContext($status) {
		$this->nodeDataIsMatchingContext = $status;
	}

	/**
	 * Signals that a node was added.
	 *
	 * @Flow\Signal
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function emitNodeAdded(NodeInterface $node) {
	}

	/**
	 * Signals that a node was updated.
	 *
	 * @Flow\Signal
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function emitNodeUpdated(NodeInterface $node) {
	}

	/**
	 * Signals that a node was removed.
	 *
	 * @Flow\Signal
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function emitNodeRemoved(NodeInterface $node) {
	}

}
namespace TYPO3\TYPO3CR\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * This is the main API for storing and retrieving content in the system.
 * @\TYPO3\Flow\Annotations\Scope("prototype")
 */
class Node extends Node_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeData $nodeData
	 * @param Context $context
	 * @throws \InvalidArgumentException if you give a Node as originalNode.
	 * @\TYPO3\Flow\Annotations\Autowiring(enabled=false)
	 */
	public function __construct() {
		$arguments = func_get_args();

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(1, $arguments)) $arguments[1] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $nodeData in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		if (!array_key_exists(1, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $context in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\TYPO3CR\Domain\Model\Node' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 protected function Flow_Aop_Proxy_buildMethodsAndAdvicesArray() {
		if (method_exists(get_parent_class($this), 'Flow_Aop_Proxy_buildMethodsAndAdvicesArray') && is_callable('parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray')) parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		$objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager;
		$this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array(
			'emitNodeAdded' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
			'emitNodeUpdated' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
			'emitNodeRemoved' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
				$this->Flow_Proxy_injectProperties();
		$result = NULL;
		if (method_exists(get_parent_class($this), '__wakeup') && is_callable('parent::__wakeup')) parent::__wakeup();
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies() {
		if (!isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices) || empty($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices)) {
			$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
			if (is_callable('parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies')) parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies() {
		if (!$this instanceof \Doctrine\ORM\Proxy\Proxy || isset($this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies)) {
			return;
		}
		$this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies = TRUE;
		if (is_callable(array($this, 'Flow_Proxy_injectProperties'))) {
			$this->Flow_Proxy_injectProperties();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Aop_Proxy_getAdviceChains($methodName) {
		$adviceChains = array();
		if (isset($this->Flow_Aop_Proxy_groupedAdviceChains[$methodName])) {
			$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
		} else {
			if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName])) {
				$groupedAdvices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName];
				if (isset($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice'])) {
					$this->Flow_Aop_Proxy_groupedAdviceChains[$methodName]['TYPO3\Flow\Aop\Advice\AroundAdvice'] = new \TYPO3\Flow\Aop\Advice\AdviceChain($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice']);
					$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
				}
			}
		}
		return $adviceChains;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint) {
		if (__CLASS__ !== $joinPoint->getClassName()) return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode[$joinPoint->getMethodName()])) {
			return call_user_func_array(array('self', $joinPoint->getMethodName()), $joinPoint->getMethodArguments());
		}
	}

	/**
	 * Autogenerated Proxy Method
	 * @param NodeInterface $node
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitNodeAdded(\TYPO3\TYPO3CR\Domain\Model\NodeInterface $node) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeAdded'])) {
		$result = parent::emitNodeAdded($node);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeAdded'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['node'] = $node;
			
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeAdded', $methodArguments);
					$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitNodeAdded']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeAdded', $joinPoint->getMethodArguments(), NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeAdded']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeAdded']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param NodeInterface $node
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitNodeUpdated(\TYPO3\TYPO3CR\Domain\Model\NodeInterface $node) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeUpdated'])) {
		$result = parent::emitNodeUpdated($node);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeUpdated'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['node'] = $node;
			
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeUpdated', $methodArguments);
					$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitNodeUpdated']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeUpdated', $joinPoint->getMethodArguments(), NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeUpdated']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeUpdated']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param NodeInterface $node
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitNodeRemoved(\TYPO3\TYPO3CR\Domain\Model\NodeInterface $node) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeRemoved'])) {
		$result = parent::emitNodeRemoved($node);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeRemoved'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['node'] = $node;
			
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeRemoved', $methodArguments);
					$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitNodeRemoved']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\TYPO3CR\Domain\Model\Node', 'emitNodeRemoved', $joinPoint->getMethodArguments(), NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeRemoved']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitNodeRemoved']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\TYPO3CR\Domain\Model\Node');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\TYPO3CR\Domain\Model\Node', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			if (count($this->$propertyName) > 0) {
				foreach ($this->$propertyName as $key => $value) {
					$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
				}
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\TYPO3CR\Domain\Model\Node', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Proxy_injectProperties() {
		$nodeDataRepository_reference = &$this->nodeDataRepository;
		$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository');
		if ($this->nodeDataRepository === NULL) {
			$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d8e58e235099c88f352e23317321129', $nodeDataRepository_reference);
			if ($this->nodeDataRepository === NULL) {
				$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d8e58e235099c88f352e23317321129',  $nodeDataRepository_reference, 'TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository'); });
			}
		}
		$nodeFactory_reference = &$this->nodeFactory;
		$this->nodeFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Factory\NodeFactory');
		if ($this->nodeFactory === NULL) {
			$this->nodeFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('bc9bb21d5b30e2ec064f6bb8e860feb4', $nodeFactory_reference);
			if ($this->nodeFactory === NULL) {
				$this->nodeFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('bc9bb21d5b30e2ec064f6bb8e860feb4',  $nodeFactory_reference, 'TYPO3\TYPO3CR\Domain\Factory\NodeFactory', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Factory\NodeFactory'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'nodeDataRepository',
  1 => 'nodeFactory',
);
	}
}
#