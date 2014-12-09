<?php 
namespace TYPO3\Neos\Domain\Service;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Neos".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Utility\Files;
use TYPO3\Media\Domain\Model\Asset;
use TYPO3\Media\Domain\Model\Image;
use TYPO3\Media\Domain\Model\ImageVariant;
use TYPO3\Media\Domain\Repository\AssetRepository;
use TYPO3\Media\Domain\Repository\ImageRepository;
use TYPO3\Neos\Domain\Exception as DomainException;
use TYPO3\Neos\Domain\Model\Site;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface;

/**
 * The Site Export Service
 *
 * @Flow\Scope("singleton")
 */
class SiteExportService_Original {

	/**
	 * @Flow\Inject
	 * @var ContextFactoryInterface
	 */
	protected $contextFactory;

	/**
	 * Absolute path to exported resources, or NULL if resources should be inlined in the exported XML
	 *
	 * @var string
	 */
	protected $resourcesPath = NULL;

	/**
	 * The XMLWriter that is used to construct the export.
	 *
	 * @var \XMLWriter
	 */
	protected $xmlWriter;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @Flow\Inject
	 * @var ImageRepository
	 */
	protected $imageRepository;

	/**
	 * @Flow\Inject
	 * @var AssetRepository
	 */
	protected $assetRepository;

	/**
	 * Fetches the site with the given name and exports it into XML.
	 *
	 * @param array<Site> $sites
	 * @param ContentContext $contentContext
	 * @param boolean $tidy Whether to export formatted XML
	 * @return string
	 */
	public function export(array $sites, ContentContext $contentContext, $tidy = FALSE) {
		$this->xmlWriter = new \XMLWriter();
		$this->xmlWriter->openMemory();

		if ($tidy) {
			$this->xmlWriter->setIndent(TRUE);
		}
		$this->exportSites($sites, $contentContext);

		return $this->xmlWriter->outputMemory(TRUE);
	}

	/**
	 * Fetches the site with the given name and exports it into XML.
	 *
	 * @param array<Site> $sites
	 * @param ContentContext $contentContext
	 * @param boolean $tidy Whether to export formatted XML
	 * @param string $pathAndFilename Path to where the export output should be saved to
	 * @return void
	 */
	public function exportToFile(array $sites, ContentContext $contentContext, $tidy = FALSE, $pathAndFilename) {
		$this->resourcesPath = Files::concatenatePaths(array(dirname($pathAndFilename), 'Resources'));
		Files::createDirectoryRecursively($this->resourcesPath);

		$this->xmlWriter = new \XMLWriter();
		$this->xmlWriter->openUri($pathAndFilename);

		if ($tidy) {
			$this->xmlWriter->setIndent(TRUE);
		}
		$this->exportSites($sites, $contentContext);
		$this->xmlWriter->flush();
	}

	/**
	 * Exports the given sites to the XMLWriter
	 *
	 * @param array<Site> $sites
	 * @param ContentContext $contentContext
	 * @return void
	 */
	protected function exportSites(array $sites, ContentContext $contentContext) {
		$this->xmlWriter->startDocument('1.0', 'UTF-8');
		$this->xmlWriter->startElement('root');

		foreach ($sites as $site) {
			$this->exportSite($site, $contentContext);
		}
		$this->xmlWriter->endElement();
		$this->xmlWriter->endDocument();
	}

	/**
	 * Export the given $site to the XMLWriter
	 *
	 * @param Site $site
	 * @param ContentContext $contentContext
	 * @return void
	 */
	protected function exportSite(Site $site, ContentContext $contentContext) {
		$contextProperties = $contentContext->getProperties();
		$contextProperties['currentSite'] = $site;
		/** @var \TYPO3\Neos\Domain\Service\ContentContext $contentContext */
		$contentContext = $this->contextFactory->create($contextProperties);

		$siteNode = $contentContext->getCurrentSiteNode();
		$this->xmlWriter->startElement('site');

		$this->exportNodeAttributes($siteNode);
		$this->exportNodeAccessRoles($siteNode);
		$siteProperties = array(
			'name' => $site->getName(),
			'state' => $site->getState(),
			'siteResourcesPackageKey' => $site->getSiteResourcesPackageKey()
		);
		if ($siteNode->getContentObject() !== NULL) {
			$this->xmlWriter->startElement('properties');
			foreach ($siteProperties as $propertyName => $propertyValue) {
				$this->exportNodeProperty($siteNode, $propertyName, $propertyValue);
			}
			$this->xmlWriter->endElement();
		} else {
			$this->exportNodeProperties($siteNode, $siteProperties);
		}

		foreach ($siteNode->getChildNodes() as $childNode) {
			$this->exportNode($childNode);
		}

		$this->xmlWriter->endElement();
	}

	/**
	 * Export a single node to the XMLWriter
	 *
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function exportNode(NodeInterface $node) {
		$this->xmlWriter->startElement('node');

		$this->exportNodeAttributes($node);
		$this->exportNodeAccessRoles($node);
		$this->exportNodeProperties($node);

		// and the child nodes recursively
		foreach ($node->getChildNodes() as $childNode) {
			$this->exportNode($childNode);
		}

		$this->xmlWriter->endElement();
	}

	/**
	 * Export all attributes of $node to the XMLWriter
	 *
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function exportNodeAttributes(NodeInterface $node) {
		$this->xmlWriter->writeAttribute('identifier', $node->getIdentifier());
		$this->xmlWriter->writeAttribute('type', $node->getNodeType()->getName());
		$this->xmlWriter->writeAttribute('nodeName', $node->getName());
		if ($node->isHidden() === TRUE) {
			$this->xmlWriter->writeAttribute('hidden', 'true');
		}
		if ($node->isHiddenInIndex() === TRUE) {
			$this->xmlWriter->writeAttribute('hiddenInIndex', 'true');
		}
		$hiddenBeforeDateTime = $node->getHiddenBeforeDateTime();
		if ($hiddenBeforeDateTime !== NULL) {
			$this->xmlWriter->writeAttribute('hiddenBeforeDateTime', $hiddenBeforeDateTime->format(\DateTime::W3C));
		}
		$hiddenAfterDateTime = $node->getHiddenAfterDateTime();
		if ($hiddenAfterDateTime !== NULL) {
			$this->xmlWriter->writeAttribute('hiddenAfterDateTime', $hiddenAfterDateTime->format(\DateTime::W3C));
		}
	}

	/**
	 * Export access roles of $node to the XMLWriter
	 *
	 * @param NodeInterface $node
	 * @return void
	 */
	protected function exportNodeAccessRoles(NodeInterface $node) {
		$accessRoles = $node->getAccessRoles();
		if (count($accessRoles) > 0) {
			$this->xmlWriter->startElement('accessRoles');
			foreach ($accessRoles as $role) {
				$this->xmlWriter->writeElement('role', $role);
			}
			$this->xmlWriter->endElement();
		}
	}

	/**
	 * Export all properties of $node to the XMLWriter
	 *
	 * @param NodeInterface $node
	 * @param array $additionalProperties additional key/value pairs to export as properties
	 * @return void
	 */
	protected function exportNodeProperties(NodeInterface $node, array $additionalProperties = array()) {
		$properties = $node->getProperties(TRUE);
		$properties = array_merge($properties, $additionalProperties);
		if (count($properties) > 0) {
			$this->xmlWriter->startElement('properties');
			foreach ($properties as $propertyName => $propertyValue) {
				$this->exportNodeProperty($node, $propertyName, $propertyValue);
			}
			$this->xmlWriter->endElement();
		}
	}

	/**
	 * Exports the property $propertyName to the the XMLWriter
	 *
	 * @param NodeInterface $node
	 * @param string $propertyName
	 * @param mixed $propertyValue
	 * @return void
	 */
	protected function exportNodeProperty(NodeInterface $node, $propertyName, $propertyValue) {
		$nodeType = $node->getNodeType();
		$propertyType = $nodeType->getPropertyType($propertyName);
		switch ($propertyType) {
			case 'boolean':
				$this->xmlWriter->startElement($propertyName);
				$this->xmlWriter->writeAttribute('__type', 'boolean');
				$this->xmlWriter->writeRaw($propertyValue ? 1 : 0);
				$this->xmlWriter->endElement();
				break;
			case 'reference':
				$this->xmlWriter->startElement($propertyName);
				$this->xmlWriter->writeAttribute('__type', 'reference');
				if (!empty($propertyValue)) {
					$this->xmlWriter->startElement('node');
					$this->xmlWriter->writeAttribute('identifier', is_string($propertyValue) ? $propertyValue : '');
					$this->xmlWriter->endElement();
				}
				$this->xmlWriter->endElement();
				break;
			case 'references':
				$this->xmlWriter->startElement($propertyName);
				$this->xmlWriter->writeAttribute('__type', 'references');
				if (is_array($propertyValue)) {
					foreach ($propertyValue as $referencedTargetNode) {
						$this->xmlWriter->startElement('node');
						$this->xmlWriter->writeAttribute('identifier', is_string($referencedTargetNode) ? $referencedTargetNode : '');
						$this->xmlWriter->endElement();
					}
				}
				$this->xmlWriter->endElement();
				break;
			default:
				if (is_object($propertyValue)) {
					$this->xmlWriter->startElement($propertyName);
					$this->xmlWriter->writeAttribute('__type', 'object');
					$this->xmlWriter->writeAttribute('__classname', get_class($propertyValue));
					$objectIdentifier = $this->persistenceManager->getIdentifierByObject($propertyValue);
					if ($objectIdentifier !== NULL) {
						$this->xmlWriter->writeAttribute('__identifier', $objectIdentifier);
					}
					$this->objectToXml($propertyValue);
					$this->xmlWriter->endElement();
				} elseif (is_array($propertyValue)) {
					$this->xmlWriter->startElement($propertyName);
					$this->xmlWriter->writeAttribute('__type', 'array');
					if (is_array($propertyValue)) {
						foreach ($propertyValue as $propertyArrayValue) {
							if (is_object($propertyArrayValue)) {
								$this->objectToXml($propertyArrayValue);
							}
						}
					}
					$this->xmlWriter->endElement();
				} elseif (is_string($propertyValue) && (strpos($propertyValue, '<') !== FALSE || strpos($propertyValue, '>') !== FALSE || strpos($propertyValue, '&') !== FALSE)) {
					$this->xmlWriter->startElement($propertyName);
					if (strpos($propertyValue, '<![CDATA[') !== FALSE) {
						$this->xmlWriter->writeCdata(str_replace(']]>', ']]]]><![CDATA[>', $propertyValue));
					} else {
						$this->xmlWriter->writeCdata($propertyValue);
					}
					$this->xmlWriter->endElement();
				} else {
					$this->xmlWriter->writeElement($propertyName, is_scalar($propertyValue) ? (string)$propertyValue : '');
				}
				break;
		}
	}

	/**
	 * Handles conversion of objects into a string format that can be exported in our
	 * XML format.
	 * Note: currently only ImageVariant instances are supported.
	 *
	 * @param object $object
	 * @return void
	 * @throws DomainException
	 */
	protected function objectToXml($object) {
		if ($object instanceof ImageVariant) {
			$this->exportImageVariant($object);
			return;
		}

		if ($object instanceof Asset) {
			$this->exportAsset($object);
			return;
		}

		if ($object instanceof \DateTime) {
			$this->xmlWriter->writeElement('dateTime', $object->format(\DateTime::W3C));
			return;
		}
		throw new DomainException(sprintf('Unsupported object of type "%s" hit during XML export.', get_class($object)), 1347144928);
	}

	/**
	 * Export an asset object and adds it to the xmlWriter
	 *
	 * @param Asset $asset
	 * @return void
	 */
	protected function exportAsset(Asset $asset) {
		$tagName = $asset instanceof Image ? 'image' : 'asset';
		$this->xmlWriter->startElement($tagName);
		$this->xmlWriter->writeAttribute('__classname', get_class($asset));
		$this->xmlWriter->writeAttribute('__identifier', $this->persistenceManager->getIdentifierByObject($asset));

		$this->xmlWriter->startElement('properties');
		if ($asset instanceof Image) {
			$this->xmlWriter->writeElement('width', $asset->getWidth());
			$this->xmlWriter->writeElement('height', $asset->getHeight());
			$this->xmlWriter->writeElement('type', $asset->getType());
		}

		if ($asset->getCaption() !== '') {
			$this->xmlWriter->writeElement('caption', $asset->getCaption());
		}
		if ($asset->getTitle() !== '') {
			$this->xmlWriter->writeElement('title', $asset->getTitle());
		}
		$this->xmlWriter->endElement();

		$resource = $asset->getResource();

		$this->xmlWriter->startElement('resource');
		$this->xmlWriter->writeAttribute('__type', 'object');
		$this->xmlWriter->writeAttribute('__classname', 'TYPO3\Flow\Resource\Resource');

		/*
		 * In the site import command we load images and assets and Doctrine
		 * serializes them in when we store the node properties as ObjectArray.
		 *
		 * This serialize removes the resource property without a clear reason
		 * and there's no solution for this issue available yet. THIS IS A WORKAROUND!
		 * @see NEOS-121
		 */
		if ($resource === NULL) {
			if ($asset instanceof Image) {
				$asset = $this->imageRepository->findByIdentifier($asset->getIdentifier());
			} elseif ($asset instanceof Asset) {
				$asset = $this->assetRepository->findByIdentifier($asset->getIdentifier());
			}
			$resource = $asset->getResource();
		}

		$this->xmlWriter->writeAttribute('__identifier', $this->persistenceManager->getIdentifierByObject($resource));
		$this->xmlWriter->writeElement('filename', $resource->getFilename());

		if ($this->resourcesPath === NULL) {
			$this->xmlWriter->writeElement('content', base64_encode(file_get_contents($resource->getUri())));
		} else {
			$hash = $resource->getResourcePointer()->getHash();
			copy($resource->getUri(), Files::concatenatePaths(array($this->resourcesPath, $hash)));
			$this->xmlWriter->writeElement('hash', $hash);
		}

		$this->xmlWriter->endElement();
		$this->xmlWriter->endElement();
	}

	/**
	 * Exports the given $imageVariant to the XMLWriter
	 *
	 * @param ImageVariant $imageVariant
	 * @return void
	 */
	protected function exportImageVariant(ImageVariant $imageVariant) {
		$this->xmlWriter->startElement('processingInstructions');
		$this->xmlWriter->writeCdata(serialize($imageVariant->getProcessingInstructions()));
		$this->xmlWriter->endElement();

		$this->xmlWriter->startElement('originalImage');
		$this->xmlWriter->writeAttribute('__type', 'object');
		$this->xmlWriter->writeAttribute('__classname', 'TYPO3\Media\Domain\Model\Image');
		$objectIdentifier = $this->persistenceManager->getIdentifierByObject($imageVariant->getOriginalImage());
		if ($objectIdentifier !== NULL) {
			$this->xmlWriter->writeAttribute('__identifier', $objectIdentifier);
		}

		$this->xmlWriter->startElement('resource');
		$this->xmlWriter->writeAttribute('__type', 'object');
		$this->xmlWriter->writeAttribute('__classname', 'TYPO3\Flow\Resource\Resource');
		$resource = $imageVariant->getOriginalImage()->getResource();
		$objectIdentifier = $this->persistenceManager->getIdentifierByObject($resource);
		if ($objectIdentifier !== NULL) {
			$this->xmlWriter->writeAttribute('__identifier', $objectIdentifier);
		}
		$this->xmlWriter->writeElement('filename', $resource->getFilename());
		if ($this->resourcesPath === NULL) {
			$this->xmlWriter->writeElement('content', base64_encode(file_get_contents($resource->getUri())));
		} else {
			$hash = $resource->getResourcePointer()->getHash();
			copy($resource->getUri(), Files::concatenatePaths(array($this->resourcesPath, $hash)));
			$this->xmlWriter->writeElement('hash', $hash);
		}
		$this->xmlWriter->endElement();
		$this->xmlWriter->endElement();
	}
}
namespace TYPO3\Neos\Domain\Service;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The Site Export Service
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class SiteExportService extends SiteExportService_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Neos\Domain\Service\SiteExportService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Neos\Domain\Service\SiteExportService', $this);
		if ('TYPO3\Neos\Domain\Service\SiteExportService' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Neos\Domain\Service\SiteExportService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Neos\Domain\Service\SiteExportService', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Neos\Domain\Service\SiteExportService');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Neos\Domain\Service\SiteExportService', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Neos\Domain\Service\SiteExportService', $propertyName, 'var');
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
		$contextFactory_reference = &$this->contextFactory;
		$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface');
		if ($this->contextFactory === NULL) {
			$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6b6e9d36a8365cb0dccb3d849ae9366e', $contextFactory_reference);
			if ($this->contextFactory === NULL) {
				$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6b6e9d36a8365cb0dccb3d849ae9366e',  $contextFactory_reference, 'TYPO3\Neos\Domain\Service\ContentContextFactory', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface'); });
			}
		}
		$persistenceManager_reference = &$this->persistenceManager;
		$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('f1bc82ad47156d95485678e33f27c110', $persistenceManager_reference);
			if ($this->persistenceManager === NULL) {
				$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('f1bc82ad47156d95485678e33f27c110',  $persistenceManager_reference, 'TYPO3\Flow\Persistence\Doctrine\PersistenceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface'); });
			}
		}
		$imageRepository_reference = &$this->imageRepository;
		$this->imageRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Media\Domain\Repository\ImageRepository');
		if ($this->imageRepository === NULL) {
			$this->imageRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('329e1158c41cf5715d74ae55bb1e2310', $imageRepository_reference);
			if ($this->imageRepository === NULL) {
				$this->imageRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('329e1158c41cf5715d74ae55bb1e2310',  $imageRepository_reference, 'TYPO3\Media\Domain\Repository\ImageRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Media\Domain\Repository\ImageRepository'); });
			}
		}
		$assetRepository_reference = &$this->assetRepository;
		$this->assetRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Media\Domain\Repository\AssetRepository');
		if ($this->assetRepository === NULL) {
			$this->assetRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('f32c311dcec701178d68823855159b62', $assetRepository_reference);
			if ($this->assetRepository === NULL) {
				$this->assetRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('f32c311dcec701178d68823855159b62',  $assetRepository_reference, 'TYPO3\Media\Domain\Repository\AssetRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Media\Domain\Repository\AssetRepository'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'contextFactory',
  1 => 'persistenceManager',
  2 => 'imageRepository',
  3 => 'assetRepository',
);
	}
}
#