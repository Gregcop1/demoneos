<?php 
namespace TYPO3\Neos\Routing;

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
use TYPO3\Neos\Domain\Service\ContentContext;
use TYPO3\Neos\Domain\Service\ContentDimensionPresetSourceInterface;
use TYPO3\Neos\Routing\Exception\NoSuchLanguageException;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;

/**
 * A frontend node route part handler that handles a "languages" dimension
 *
 * It always matches a language identifier in the first path segment for now, for example:
 *
 *   "all/features/try-me" matches the node with path "features/try-me" with the languages configured for language chain "all"
 */
class LocalizedFrontendNodeRoutePartHandler_Original extends FrontendNodeRoutePartHandler {

	/**
	 * @Flow\Inject
	 * @var ContentDimensionPresetSourceInterface
	 */
	protected $contentDimensionPresetSource;

	/**
	 * Prepend the Language Chain Identifier to the route path.
	 *
	 * This takes the node's context "languages" dimension value into account.
	 *
	 * @param NodeInterface $siteNode
	 * @param NodeInterface $node
	 * @return string
	 */
	protected function resolveRoutePathForNode($siteNode, $node) {
		$routePath = parent::resolveRoutePathForNode($siteNode, $node);

		$dimensions = $node->getContext()->getDimensions();
		$uriSegment = $this->getUriSegmentForLanguages($dimensions);
		$routePath = $uriSegment . '/' . $routePath;

		return $routePath;
	}

	/**
	 * Get the language locales from the request path and build a context using these locales and the full context information.
	 *
	 * @param string $requestPath
	 * @return ContentContext
	 */
	protected function buildContextFromRequestPath($requestPath) {
		list($locales, $requestPath) = $this->parseLocalesAndNodePathFromRequestPath($requestPath);

		$contextPathParts = array();
		if ($requestPath !== '' && strpos($requestPath, '@') !== FALSE) {
			preg_match(NodeInterface::MATCH_PATTERN_CONTEXTPATH, $requestPath, $contextPathParts);
		}
		$workspaceName = isset($contextPathParts['WorkspaceName']) && $contextPathParts['WorkspaceName'] !== '' ? $contextPathParts['WorkspaceName'] : 'live';
		return $this->buildContextFromWorkspaceNameAndLanguageLocales($workspaceName, $locales);
	}

	/**
	 * Strip off the language chain identifier (which is the first part of $requestPath).
	 *
	 * @param string $requestPath
	 * @return string
	 */
	protected function removeContextFromRequestPath($requestPath) {
		list(, $requestPath) = $this->parseLocalesAndNodePathFromRequestPath($requestPath);
		$requestPath = $this->removeContextFromPath($requestPath);
		return $requestPath;
	}

	/**
	 * @param string $workspaceName
	 * @param array $locales
	 * @return ContentContext
	 */
	protected function buildContextFromWorkspaceNameAndLanguageLocales($workspaceName, array $locales) {
		$contextProperties = array(
			'workspaceName' => $workspaceName,
			'invisibleContentShown' => TRUE,
			'inaccessibleContentShown' => TRUE,
			'dimensions' => array('languages' => $locales)
		);

		$currentDomain = $this->domainRepository->findOneByActiveRequest();

		if ($currentDomain !== NULL) {
			$contextProperties['currentSite'] = $currentDomain->getSite();
			$contextProperties['currentDomain'] = $currentDomain;
		} else {
			$contextProperties['currentSite'] = $this->siteRepository->findOnline()->getFirst();
		}

		return $this->contextFactory->create($contextProperties);
	}

	/**
	 * @param string $requestPath
	 * @return array
	 */
	protected function parseLocalesAndNodePathFromRequestPath($requestPath) {
		preg_match('|^(?<localeIdentifier>[^/]+)?(/(?<nodePath>.*))?|', $requestPath, $matches);
		if (isset($matches['localeIdentifier'])) {
			$locales = $this->getLocalesForUriSegment($matches['localeIdentifier']);
		} else {
			$locales = $this->getLocalesForUriSegment(NULL);
		}
		if (isset($matches['nodePath'])) {
			$requestPath = $matches['nodePath'];
		} else {
			$requestPath = '';
		}

		return array($locales, $requestPath);
	}

	/**
	 * Find the languages dimension values for a URI segment
	 *
	 * If the given URI segment is NULL, the default preset of the "languages" dimension will be used.
	 *
	 * @param string $uriSegment A URI segment of a content dimension preset or NULL if none was given in the route path
	 * @return array A list of locales or NoSuchLanguageException if none could be matched by the given identifier
	 * @throws NoSuchLanguageException
	 */
	protected function getLocalesForUriSegment($uriSegment) {
		if ($uriSegment === NULL) {
			$preset = $this->contentDimensionPresetSource->getDefaultPreset('languages');
		} else {
			$preset = $this->contentDimensionPresetSource->findPresetByUriSegment('languages', $uriSegment);
		}

		if ($preset === NULL) {
			throw new NoSuchLanguageException(sprintf('No content dimension preset for dimension "languages" and uriSegment "%s" found', $uriSegment), 1395827628);
		}
		return $preset['values'];
	}

	/**
	 * Find a URI segment in the content dimension presets for the given "languages" dimension values
	 *
	 * This will do a reverse lookup from actual dimension values to a preset and fall back to the default preset if none
	 * can be found.
	 *
	 * @param array $dimensionValues
	 * @return string
	 * @throws Exception
	 */
	protected function getUriSegmentForLanguages(array $dimensionValues) {
		if (isset($dimensionValues['languages'])) {
			$preset = $this->contentDimensionPresetSource->findPresetByDimensionValues('languages', $dimensionValues['languages']);
			if ($preset === NULL) {
				$preset = $this->contentDimensionPresetSource->getDefaultPreset('languages');
			}
			if (!isset($preset['uriSegment'])) {
				throw new Exception(sprintf('No "uriSegment" configured for content dimension preset "%s" for dimension "languages".', $dimensionValues['identifier']), 1395824520);
			}
			return $preset['uriSegment'];
		}
		throw new Exception('No "languages" dimension found, but it is needed by the LocalizedFrontendNodeRoutePartHandler. Please configure it in Settings.yaml in path "TYPO3.TYPO3CR.contentDimensions".', 1395672860);
	}

}
namespace TYPO3\Neos\Routing;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A frontend node route part handler that handles a "languages" dimension
 * 
 * It always matches a language identifier in the first path segment for now, for example:
 * 
 *   "all/features/try-me" matches the node with path "features/try-me" with the languages configured for language chain "all"
 */
class LocalizedFrontendNodeRoutePartHandler extends LocalizedFrontendNodeRoutePartHandler_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('TYPO3\Neos\Routing\LocalizedFrontendNodeRoutePartHandler' === get_class($this)) {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Neos\Routing\LocalizedFrontendNodeRoutePartHandler');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Neos\Routing\LocalizedFrontendNodeRoutePartHandler', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Neos\Routing\LocalizedFrontendNodeRoutePartHandler', $propertyName, 'var');
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
		$this->contentDimensionPresetSource = new \TYPO3\Neos\Domain\Service\ConfigurationContentDimensionPresetSource();
		$contextFactory_reference = &$this->contextFactory;
		$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Service\ContentContextFactory');
		if ($this->contextFactory === NULL) {
			$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('b0f43d8a69099e5990a8079e0c191fa3', $contextFactory_reference);
			if ($this->contextFactory === NULL) {
				$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('b0f43d8a69099e5990a8079e0c191fa3',  $contextFactory_reference, 'TYPO3\Neos\Domain\Service\ContentContextFactory', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Service\ContentContextFactory'); });
			}
		}
		$domainRepository_reference = &$this->domainRepository;
		$this->domainRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Repository\DomainRepository');
		if ($this->domainRepository === NULL) {
			$this->domainRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6f2987c5f47777b01540a314d984b09c', $domainRepository_reference);
			if ($this->domainRepository === NULL) {
				$this->domainRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6f2987c5f47777b01540a314d984b09c',  $domainRepository_reference, 'TYPO3\Neos\Domain\Repository\DomainRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Repository\DomainRepository'); });
			}
		}
		$siteRepository_reference = &$this->siteRepository;
		$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Repository\SiteRepository');
		if ($this->siteRepository === NULL) {
			$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('5c3f2ab0e14ff0be3090c1f3efe77d7a', $siteRepository_reference);
			if ($this->siteRepository === NULL) {
				$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('5c3f2ab0e14ff0be3090c1f3efe77d7a',  $siteRepository_reference, 'TYPO3\Neos\Domain\Repository\SiteRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Repository\SiteRepository'); });
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
$this->Flow_Injected_Properties = array (
  0 => 'contentDimensionPresetSource',
  1 => 'contextFactory',
  2 => 'domainRepository',
  3 => 'siteRepository',
  4 => 'persistenceManager',
);
	}
}
#