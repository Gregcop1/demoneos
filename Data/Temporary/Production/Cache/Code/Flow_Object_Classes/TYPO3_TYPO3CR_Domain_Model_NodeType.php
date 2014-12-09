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
use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\TYPO3CR\Exception\InvalidNodeTypePostprocessorException;
use TYPO3\TYPO3CR\NodeTypePostprocessor\NodeTypePostprocessorInterface;

/**
 * A Node Type
 *
 * Although methods contained in this class belong to the public API, you should
 * not need to deal with creating or managing node types manually. New node types
 * should be defined in a NodeTypes.yaml file.
 *
 * @api
 */
class NodeType_Original {

	/**
	 * Name of this node type. Example: "TYPO3CR:Folder"
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Configuration for this node type, can be an arbitrarily nested array.
	 *
	 * @var array
	 */
	protected $configuration;

	/**
	 * Is this node type marked abstract
	 *
	 * @var boolean
	 */
	protected $abstract = FALSE;

	/**
	 * Is this node type marked final
	 *
	 * @var boolean
	 */
	protected $final = FALSE;

	/**
	 * node types this node type directly inherits from
	 *
	 * @var array<\TYPO3\TYPO3CR\Domain\Model\NodeType>
	 */
	protected $declaredSuperTypes;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Object\ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Service\NodeTypeManager
	 */
	protected $nodeTypeManager;

	/**
	 * Whether or not this node type has been initialized (e.g. if it has been postprocessed)
	 *
	 * @var boolean
	 */
	protected $initialized = FALSE;

	/**
	 * Constructs this node type
	 *
	 * @param string $name Name of the node type
	 * @param array $declaredSuperTypes Parent types of this node type
	 * @param array $configuration the configuration for this node type which is defined in the schema
	 * @throws \InvalidArgumentException
	 */
	public function __construct($name, array $declaredSuperTypes, array $configuration) {
		$this->name = $name;

		foreach ($declaredSuperTypes as $type) {
			if (!$type instanceof NodeType) {
				throw new \InvalidArgumentException('$declaredSuperTypes must be an array of NodeType objects', 1291300950);
			}
		}
		$this->declaredSuperTypes = $declaredSuperTypes;

		if (isset($configuration['abstract']) && $configuration['abstract'] === TRUE) {
			$this->abstract = TRUE;
			unset($configuration['abstract']);
		}

		if (isset($configuration['final']) && $configuration['final'] === TRUE) {
			$this->final = TRUE;
			unset($configuration['final']);
		}

		$this->configuration = $configuration;
	}

	/**
	 * Initializes this node type
	 *
	 * @return void
	 */
	protected function initialize() {
		if ($this->initialized === TRUE) {
			return;
		}
		$this->initialized = TRUE;
		$this->applyPostprocessing();
	}

	/**
	 * Iterates through configured postprocessors and invokes them
	 *
	 * @return void
	 * @throws \TYPO3\TYPO3CR\Exception\InvalidNodeTypePostprocessorException
	 */
	protected function applyPostprocessing() {
		if (!isset($this->configuration['postprocessors'])) {
			return;
		}
		foreach ($this->configuration['postprocessors'] as $postprocessorConfiguration) {
			$postprocessor = new $postprocessorConfiguration['postprocessor']();
			if (!$postprocessor instanceof NodeTypePostprocessorInterface) {
				throw new InvalidNodeTypePostprocessorException(sprintf('Expected NodeTypePostprocessorInterface but got "%s"', get_class($postprocessor)), 1364759955);
			}
			$postprocessorOptions = array();
			if (isset($postprocessorConfiguration['postprocessorOptions'])) {
				$postprocessorOptions = $postprocessorConfiguration['postprocessorOptions'];
			}
			$postprocessor->process($this, $this->configuration, $postprocessorOptions);
		}
	}

	/**
	 * Returns the name of this node type
	 *
	 * @return string
	 * @api
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Return boolean TRUE if marked abstract
	 *
	 * @return boolean
	 */
	public function isAbstract() {
		return $this->abstract;
	}

	/**
	 * Return boolean TRUE if marked final
	 *
	 * @return boolean
	 */
	public function isFinal() {
		return $this->final;
	}

	/**
	 * Returns the direct, explicitly declared super types
	 * of this node type.
	 *
	 * @return array<\TYPO3\TYPO3CR\Domain\Model\NodeType>
	 * @api
	 */
	public function getDeclaredSuperTypes() {
		return $this->declaredSuperTypes;
	}

	/**
	 * If this node type or any of the direct or indirect super types
	 * has the given name.
	 *
	 * @param string $nodeType
	 * @return boolean TRUE if this node type is of the given kind, otherwise FALSE
	 * @api
	 */
	public function isOfType($nodeType) {
		if ($nodeType === $this->name) {
			return TRUE;
		}
		foreach ($this->declaredSuperTypes as $superType) {
			if ($superType->isOfType($nodeType) === TRUE) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * Get the full configuration of the node type. Should only be used internally.
	 *
	 * Instead, use the hasConfiguration()/getConfiguration() methods to check/retrieve single configuration values.
	 *
	 * @return array
	 */
	public function getFullConfiguration() {
		$this->initialize();
		return $this->configuration;
	}

	/**
	 * Checks if the configuration of this node type contains a setting for the given $configurationPath
	 *
	 * @param string $configurationPath The name of the configuration option to verify
	 * @return boolean
	 * @api
	 */
	public function hasConfiguration($configurationPath) {
		return $this->getConfiguration($configurationPath) !== NULL;
	}

	/**
	 * Returns the configuration option with the specified $configurationPath or NULL if it does not exist
	 *
	 * @param string $configurationPath The name of the configuration option to retrieve
	 * @return mixed
	 * @api
	 */
	public function getConfiguration($configurationPath) {
		$this->initialize();
		return ObjectAccess::getPropertyPath($this->configuration, $configurationPath);
	}

	/**
	 * Get the human-readable label of this node type
	 *
	 * @return string
	 * @api
	 */
	public function getLabel() {
		$this->initialize();
		return isset($this->configuration['ui']) && isset($this->configuration['ui']['label']) ? $this->configuration['ui']['label'] : '';
	}

	/**
	 * Get additional options (if specified)
	 *
	 * @return array
	 * @api
	 */
	public function getOptions() {
		$this->initialize();
		return (isset($this->configuration['options']) ? $this->configuration['options'] : array());
	}

	/**
	 * Return the node label generator class for the given node
	 *
	 * @return NodeLabelGeneratorInterface
	 */
	public function getNodeLabelGenerator() {
		$this->initialize();
		if (isset($this->configuration['nodeLabelGenerator'])) {
			$nodeLabelGeneratorClassName = $this->configuration['nodeLabelGenerator'];
		} else {
			$nodeLabelGeneratorClassName = 'TYPO3\TYPO3CR\Domain\Model\DefaultNodeLabelGenerator';
		}
		return $this->objectManager->get($nodeLabelGeneratorClassName);
	}

	/**
	 * Return the array with the defined properties. The key is the property name,
	 * the value the property configuration. There are no guarantees on how the
	 * property configuration looks like.
	 *
	 * @return array
	 * @api
	 */
	public function getProperties() {
		$this->initialize();
		return (isset($this->configuration['properties']) ? $this->configuration['properties'] : array());
	}

	/**
	 * Returns the configured type of the specified property
	 *
	 * @param string $propertyName Name of the property
	 * @return string
	 */
	public function getPropertyType($propertyName) {
		if (!isset($this->configuration['properties']) || !isset($this->configuration['properties'][$propertyName]) || !isset($this->configuration['properties'][$propertyName]['type'])) {
			return 'string';
		}
		return $this->configuration['properties'][$propertyName]['type'];
	}

	/**
	 * Return an array with the defined default values for each property, if any.
	 *
	 * The default value is configured for each property under the "default" key.
	 *
	 * @return array
	 * @api
	 */
	public function getDefaultValuesForProperties() {
		$this->initialize();
		if (!isset($this->configuration['properties'])) {
			return array();
		}

		$defaultValues = array();
		foreach ($this->configuration['properties'] as $propertyName => $propertyConfiguration) {
			if (isset($propertyConfiguration['defaultValue'])) {
				$defaultValues[$propertyName] = $propertyConfiguration['defaultValue'];
			}
		}

		return $defaultValues;
	}

	/**
	 * Return an array with child nodes which should be automatically created
	 *
	 * @return array the key of this array is the name of the child, and the value its NodeType.
	 * @api
	 */
	public function getAutoCreatedChildNodes() {
		$this->initialize();
		if (!isset($this->configuration['childNodes'])) {
			return array();
		}

		$autoCreatedChildNodes = array();
		foreach ($this->configuration['childNodes'] as $childNodeName => $childNodeConfiguration) {
			if (isset($childNodeConfiguration['type'])) {
				$autoCreatedChildNodes[$childNodeName] = $this->nodeTypeManager->getNodeType($childNodeConfiguration['type']);
			}
		}

		return $autoCreatedChildNodes;
	}

	/**
	 * Alias for getName().
	 *
	 * @return string
	 * @api
	 */
	public function __toString() {
		return $this->getName();
	}

	/**
	 * Magic get* and has* method for all properties inside $configuration.
	 *
	 * @param string $methodName
	 * @param array $arguments
	 * @return mixed
	 * @deprecated Use hasConfiguration() or getConfiguration() instead
	 */
	public function __call($methodName, array $arguments) {
		if (substr($methodName, 0, 3) === 'get') {
			$configurationKey = lcfirst(substr($methodName, 3));
			return $this->getConfiguration($configurationKey);
		} elseif (substr($methodName, 0, 3) === 'has') {
			$configurationKey = lcfirst(substr($methodName, 3));
			return $this->hasConfiguration($configurationKey);
		}

		trigger_error('Call to undefined method ' . get_class($this) . '::' . $methodName, E_USER_ERROR);
	}
}
namespace TYPO3\TYPO3CR\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A Node Type
 * 
 * Although methods contained in this class belong to the public API, you should
 * not need to deal with creating or managing node types manually. New node types
 * should be defined in a NodeTypes.yaml file.
 */
class NodeType extends NodeType_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $name Name of the node type
	 * @param array $declaredSuperTypes Parent types of this node type
	 * @param array $configuration the configuration for this node type which is defined in the schema
	 * @throws \InvalidArgumentException
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $name in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		if (!array_key_exists(1, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $declaredSuperTypes in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		if (!array_key_exists(2, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $configuration in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\TYPO3CR\Domain\Model\NodeType' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

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
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\TYPO3CR\Domain\Model\NodeType');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\TYPO3CR\Domain\Model\NodeType', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\TYPO3CR\Domain\Model\NodeType', $propertyName, 'var');
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
		$objectManager_reference = &$this->objectManager;
		$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Object\ObjectManagerInterface');
		if ($this->objectManager === NULL) {
			$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('0c3c44be7be16f2a287f1fb2d068dde4', $objectManager_reference);
			if ($this->objectManager === NULL) {
				$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('0c3c44be7be16f2a287f1fb2d068dde4',  $objectManager_reference, 'TYPO3\Flow\Object\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'); });
			}
		}
		$nodeTypeManager_reference = &$this->nodeTypeManager;
		$this->nodeTypeManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Service\NodeTypeManager');
		if ($this->nodeTypeManager === NULL) {
			$this->nodeTypeManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('478a517efacb3d47415a96d9caded2e9', $nodeTypeManager_reference);
			if ($this->nodeTypeManager === NULL) {
				$this->nodeTypeManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('478a517efacb3d47415a96d9caded2e9',  $nodeTypeManager_reference, 'TYPO3\TYPO3CR\Domain\Service\NodeTypeManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Service\NodeTypeManager'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'objectManager',
  1 => 'nodeTypeManager',
);
	}
}
#