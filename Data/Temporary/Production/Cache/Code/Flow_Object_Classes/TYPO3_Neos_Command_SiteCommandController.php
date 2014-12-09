<?php 
namespace TYPO3\Neos\Command;

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
use TYPO3\Neos\Domain\Model\Site;

/**
 * The Site Command Controller
 *
 * @Flow\Scope("singleton")
 */
class SiteCommandController_Original extends \TYPO3\Flow\Cli\CommandController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Neos\Domain\Repository\SiteRepository
	 */
	protected $siteRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Neos\Domain\Service\SiteImportService
	 */
	protected $siteImportService;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Neos\Domain\Repository\DomainRepository
	 */
	protected $domainRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository
	 */
	protected $nodeDataRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Repository\WorkspaceRepository
	 */
	protected $workspaceRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Neos\Domain\Service\SiteExportService
	 */
	protected $siteExportService;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface
	 */
	protected $contextFactory;

	/**
	 * Import sites content
	 *
	 * This command allows for importing one or more sites or partial content from an XML source. The format must
	 * be identical to that produced by the export command.
	 *
	 * If a filename is specified, this command expects the corresponding file to contain the XML structure
	 *
	 * If a package key is specified, this command expects a Sites.xml file to be located in the private resources
	 * directory of the given package:
	 * .../Resources/Private/Content/Sites.xml
	 *
	 * @param string $packageKey Package key specifying the package containing the sites content
	 * @param string $filename relative path and filename to the XML file containing the sites content
	 * @return void
	 */
	public function importCommand($packageKey = NULL, $filename = NULL) {
		$contentContext = $this->createContext();

		if ($filename !== NULL) {
			try {
				$this->siteImportService->importSitesFromFile($filename, $contentContext);
			} catch (\Exception $exception) {
				$this->outputLine('Error: During the import of the file "%s" an exception occurred: %s', array($filename, $exception->getMessage()));
				$this->quit(1);
			}
		} elseif ($packageKey !== NULL) {
			try {
				$this->siteImportService->importFromPackage($packageKey, $contentContext);
			} catch (\Exception $exception) {
				$this->outputLine('Error: During the import of the "Sites.xml" from the package "%s" an exception occurred: %s', array($packageKey, $exception->getMessage()));
				$this->quit(1);
			}
		} else {
			$this->outputLine('You have to specify either "--package-key" or "--filename"');
			$this->quit(1);
		}
		$this->outputLine('Import finished.');
	}

	/**
	 * Export sites content
	 *
	 * This command exports all or one specific site with all its content into an XML
	 * format.
	 *
	 * If the filename option is given, any resources will be exported
	 * to files in a folder named "Resources" alongside the XML file.
	 *
	 * If not given, the XML will be printed to standard output and assets will be embedded
	 * into the XML in base64 encoded form.
	 *
	 * @param string $siteNode the node name of the site to be exported; if none given will export all sites
	 * @param boolean $tidy Whether to export formatted XML
	 * @param string $filename relative path and filename to the XML file to create. Any resource will be stored in a sub folder "Resources". If omitted the export will be printed to standard output
	 * @return void
	 */
	public function exportCommand($siteNode = NULL, $tidy = FALSE, $filename = NULL) {
		$contentContext = $this->createContext();

		if ($siteNode === NULL) {
			$sites = $this->siteRepository->findAll()->toArray();
		} else {
			$sites = $this->siteRepository->findByNodeName($siteNode)->toArray();
		}
		if (count($sites) === 0) {
			$this->outputLine('Error: No site for exporting found');
			$this->quit(1);
		}
		if ($filename === NULL) {
			$this->output($this->siteExportService->export($sites, $contentContext, $tidy));
		} else {
			$this->siteExportService->exportToFile($sites, $contentContext, $tidy, $filename);
			if ($siteNode !== NULL) {
				$this->outputLine('The site "%s" has been exported to "%s".', array($siteNode, $filename));
			} else {
				$this->outputLine('All sites have been exported to "%s".', array($filename));
			}
		}
	}

	/**
	 * Remove all content and related data - for now. In the future we need some more sophisticated cleanup.
	 *
	 * @param boolean $confirmation
	 * @param string $siteNodeName Name of a site root node to clear only content of this site.
	 * @return void
	 */
	public function pruneCommand($confirmation = FALSE, $siteNodeName = NULL) {
		if ($confirmation === FALSE) {
			$this->outputLine('Please confirm that you really want to remove all content from the database.');
			$this->outputLine('');
			$this->outputLine('Syntax:');
			$this->outputLine('  ./flow site:prune --confirmation TRUE');
			$this->quit(1);
		}

		if ($siteNodeName !== NULL) {
			$possibleSite = $this->siteRepository->findOneByNodeName($siteNodeName);
			if ($possibleSite === NULL) {
				$this->outputLine('The given site site node did not match an existing site.');
				$this->quit(1);
			}
			$this->pruneSite($possibleSite);
			$this->outputLine('Site with root "' . $siteNodeName . '" has been removed.');
		} else {
			$this->pruneAll();
			$this->outputLine('All sites and content have been removed.');
		}
	}

	/**
	 * Remove given site all nodes for that site and all domains associated.
	 *
	 * @param Site $site
	 * @return void
	 */
	protected function pruneSite(Site $site) {
		$siteNodePath = '/sites/' . $site->getNodeName();
		$this->nodeDataRepository->removeAllInPath($siteNodePath);
		$siteNodes = $this->nodeDataRepository->findByPath($siteNodePath);
		foreach ($siteNodes as $siteNode) {
			$this->nodeDataRepository->remove($siteNode);
		}

		$domainsForSite = $this->domainRepository->findBySite($site);
		foreach ($domainsForSite as $domain) {
			$this->domainRepository->remove($domain);
		}
		$this->siteRepository->remove($site);
	}

	/**
	 * Remove all nodes, workspaces, domains and sites.
	 *
	 * @return void
	 */
	protected function pruneAll() {
		$this->nodeDataRepository->removeAll();
		$this->workspaceRepository->removeAll();
		$this->domainRepository->removeAll();
		$this->siteRepository->removeAll();
	}

	/**
	 * Display a list of available sites
	 *
	 * @return void
	 */
	public function listCommand() {
		$sites = $this->siteRepository->findAll();

		if ($sites->count() === 0) {
			$this->outputLine('No sites available');
			$this->quit(0);
		}

		$longestSiteName = 4;
		$longestNodeName = 9;
		$longestSiteResource = 17;
		$availableSites = array();

		foreach ($sites as $site) {
			/** @var \TYPO3\Neos\Domain\Model\Site $site */
			array_push($availableSites, array(
				'name' => $site->getName(),
				'nodeName' => $site->getNodeName(),
				'siteResourcesPackageKey' => $site->getSiteResourcesPackageKey()
			));
			if (strlen($site->getName()) > $longestSiteName) {
				$longestSiteName = strlen($site->getName());
			}
			if (strlen($site->getNodeName()) > $longestNodeName) {
				$longestNodeName = strlen($site->getNodeName());
			}
			if (strlen($site->getSiteResourcesPackageKey()) > $longestSiteResource) {
				$longestSiteResource = strlen($site->getSiteResourcesPackageKey());
			}
		}

		$this->outputLine();
		$this->outputLine(' ' . str_pad('Name', $longestSiteName + 15) . str_pad('Node name', $longestNodeName + 15) . 'Resources package');
		$this->outputLine(str_repeat('-', $longestSiteName + $longestNodeName + $longestSiteResource + 15 + 15 + 2));
		foreach ($availableSites as $site) {
			$this->outputLine(' ' . str_pad($site['name'], $longestSiteName + 15) . str_pad($site['nodeName'], $longestNodeName + 15) . $site['siteResourcesPackageKey']);
		}
		$this->outputLine();
	}

	/**
	 * @return \TYPO3\TYPO3CR\Domain\Service\Context
	 */
	protected function createContext() {
		return $this->contextFactory->create(array(
			'workspaceName' => 'live',
			'invisibleContentShown' => TRUE,
			'inaccessibleContentShown' => TRUE
		));
	}
}
namespace TYPO3\Neos\Command;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The Site Command Controller
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class SiteCommandController extends SiteCommandController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Neos\Command\SiteCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Neos\Command\SiteCommandController', $this);
		parent::__construct();
		if ('TYPO3\Neos\Command\SiteCommandController' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Neos\Command\SiteCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Neos\Command\SiteCommandController', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Neos\Command\SiteCommandController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Neos\Command\SiteCommandController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Neos\Command\SiteCommandController', $propertyName, 'var');
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
		$this->injectReflectionService(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'));
		$siteRepository_reference = &$this->siteRepository;
		$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Repository\SiteRepository');
		if ($this->siteRepository === NULL) {
			$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('5c3f2ab0e14ff0be3090c1f3efe77d7a', $siteRepository_reference);
			if ($this->siteRepository === NULL) {
				$this->siteRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('5c3f2ab0e14ff0be3090c1f3efe77d7a',  $siteRepository_reference, 'TYPO3\Neos\Domain\Repository\SiteRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Repository\SiteRepository'); });
			}
		}
		$siteImportService_reference = &$this->siteImportService;
		$this->siteImportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Service\SiteImportService');
		if ($this->siteImportService === NULL) {
			$this->siteImportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('a382bdbc7e75d00f0510a58eb9dd5b14', $siteImportService_reference);
			if ($this->siteImportService === NULL) {
				$this->siteImportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('a382bdbc7e75d00f0510a58eb9dd5b14',  $siteImportService_reference, 'TYPO3\Neos\Domain\Service\SiteImportService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Service\SiteImportService'); });
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
		$nodeDataRepository_reference = &$this->nodeDataRepository;
		$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository');
		if ($this->nodeDataRepository === NULL) {
			$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d8e58e235099c88f352e23317321129', $nodeDataRepository_reference);
			if ($this->nodeDataRepository === NULL) {
				$this->nodeDataRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d8e58e235099c88f352e23317321129',  $nodeDataRepository_reference, 'TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository'); });
			}
		}
		$workspaceRepository_reference = &$this->workspaceRepository;
		$this->workspaceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Repository\WorkspaceRepository');
		if ($this->workspaceRepository === NULL) {
			$this->workspaceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('2e64c564c983af14b47d0c9ae8992997', $workspaceRepository_reference);
			if ($this->workspaceRepository === NULL) {
				$this->workspaceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('2e64c564c983af14b47d0c9ae8992997',  $workspaceRepository_reference, 'TYPO3\TYPO3CR\Domain\Repository\WorkspaceRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Repository\WorkspaceRepository'); });
			}
		}
		$siteExportService_reference = &$this->siteExportService;
		$this->siteExportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Neos\Domain\Service\SiteExportService');
		if ($this->siteExportService === NULL) {
			$this->siteExportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('d54da1208d763f79742013e289d6d34f', $siteExportService_reference);
			if ($this->siteExportService === NULL) {
				$this->siteExportService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('d54da1208d763f79742013e289d6d34f',  $siteExportService_reference, 'TYPO3\Neos\Domain\Service\SiteExportService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Neos\Domain\Service\SiteExportService'); });
			}
		}
		$contextFactory_reference = &$this->contextFactory;
		$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface');
		if ($this->contextFactory === NULL) {
			$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6b6e9d36a8365cb0dccb3d849ae9366e', $contextFactory_reference);
			if ($this->contextFactory === NULL) {
				$this->contextFactory = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6b6e9d36a8365cb0dccb3d849ae9366e',  $contextFactory_reference, 'TYPO3\Neos\Domain\Service\ContentContextFactory', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\TYPO3CR\Domain\Service\ContextFactoryInterface'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'reflectionService',
  1 => 'siteRepository',
  2 => 'siteImportService',
  3 => 'domainRepository',
  4 => 'nodeDataRepository',
  5 => 'workspaceRepository',
  6 => 'siteExportService',
  7 => 'contextFactory',
);
	}
}
#