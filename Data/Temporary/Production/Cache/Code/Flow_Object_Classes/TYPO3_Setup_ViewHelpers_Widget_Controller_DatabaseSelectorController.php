<?php 
namespace TYPO3\Setup\ViewHelpers\Widget\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Setup".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Configuration\ConfigurationManager;

/**
 * Controller for the DatabaseSelector Fluid Widget
 */
class DatabaseSelectorController_Original extends \TYPO3\Fluid\Core\Widget\AbstractWidgetController {

	/**
	 * @Flow\Inject
	 * @var ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('driverDropdownFieldId', $this->widgetConfiguration['driverDropdownFieldId']);
		$this->view->assign('userFieldId', $this->widgetConfiguration['userFieldId']);
		$this->view->assign('passwordFieldId', $this->widgetConfiguration['passwordFieldId']);
		$this->view->assign('hostFieldId', $this->widgetConfiguration['hostFieldId']);
		$this->view->assign('dbNameTextFieldId', $this->widgetConfiguration['dbNameTextFieldId']);
		$this->view->assign('dbNameDropdownFieldId', $this->widgetConfiguration['dbNameDropdownFieldId']);
		$this->view->assign('statusContainerId', $this->widgetConfiguration['statusContainerId']);
		$this->view->assign('metadataStatusContainerId', $this->widgetConfiguration['metadataStatusContainerId']);
	}

	/**
	 * @param string $driver
	 * @param string $user
	 * @param string $password
	 * @param string $host
	 * @return string
	 */
	public function checkConnectionAction($driver, $user, $password, $host) {
		$this->response->setHeader('Content-Type', 'application/json');
		$connectionSettings = $this->buildConnectionSettingsArray($driver, $user, $password, $host);
		try {
			$connection = $this->getConnectionAndConnect($connectionSettings);
			$databases = $connection->getSchemaManager()->listDatabases();
			$result = array('success' => TRUE, 'databases' => $databases);
		} catch(\PDOException $e) {
			$result = array('success' => FALSE, 'errorMessage' => $e->getMessage(), 'errorCode' => $e->getCode());
		} catch(\Exception $e) {
			$result = array('success' => FALSE, 'errorMessage' => 'Unexpected exception', 'errorCode' => $e->getCode());
		}
		return json_encode($result);
	}

	/**
	 * This fetches information about the database provided, in particular the charset being used.
	 * Depending on whether it is utf8 or not, the (JSON-) response is layed out accordingly.
	 *
	 * @param string $driver
	 * @param string $user
	 * @param string $password
	 * @param string $host
	 * @param string $databaseName
	 * @return string
	 */
	public function getMetadataAction($driver, $user, $password, $host, $databaseName) {
		$this->response->setHeader('Content-Type', 'application/json');
		$connectionSettings = $this->buildConnectionSettingsArray($driver, $user, $password, $host);
		$connectionSettings['dbname'] = $databaseName;
		try {
			$connection = $this->getConnectionAndConnect($connectionSettings);
			$databasePlatform = $connection->getDatabasePlatform();
			if ($databasePlatform instanceof MySqlPlatform) {
				$queryResult = $connection->executeQuery('SHOW VARIABLES LIKE ?', array('character_set_database'))->fetch();
				$databaseCharacterSet = strtolower($queryResult['Value']);
			} elseif ($databasePlatform instanceof PostgreSqlPlatform) {
				$queryResult = $connection->executeQuery('SELECT pg_encoding_to_char(encoding) FROM pg_database WHERE datname = ?', array($databaseName))->fetch();
				$databaseCharacterSet = strtolower($queryResult['pg_encoding_to_char']);
			} else {
				$result = array('level' => 'error', 'message' => sprintf('Only MySQL/MariaDB and PostgreSQL are supported, the selected database is "%s".',  $databasePlatform->getName()));
			}
			if (isset($databaseCharacterSet)) {
				if ($databaseCharacterSet === 'utf8') {
					$result = array('level' => 'notice', 'message' => 'The selected database\'s character set is set to "utf8" which is the recommended setting.');
				} else {
					$result = array(
						'level' => 'warning',
						'message' => sprintf('The selected database\'s character set is "%s", however changing it to "utf8" is urgently recommended. This setup tool won\'t do this up for you.', $databaseCharacterSet)
					);
				}
			}
		} catch(\PDOException $e) {
			$result = array('level' => 'error', 'message' => $e->getMessage(), 'errorCode' => $e->getCode());
		} catch(\Exception $e) {
			$result = array('level' => 'error', 'message' => 'Unexpected exception', 'errorCode' => $e->getCode());
		}
		return json_encode($result);
	}

	/**
	 * @param string $driver
	 * @param string $user
	 * @param string $password
	 * @param string $host
	 * @return mixed
	 */
	protected function buildConnectionSettingsArray($driver, $user, $password, $host) {
		$settings = $this->configurationManager->getConfiguration(ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.Flow');
		$connectionSettings = $settings['persistence']['backendOptions'];
		$connectionSettings['driver'] = $driver;
		$connectionSettings['user'] = $user;
		$connectionSettings['password'] = $password;
		$connectionSettings['host'] = $host;
		if ($connectionSettings['driver'] === 'pdo_pgsql') {
			$connectionSettings['dbname'] = 'template1';
			return $connectionSettings;
		} else {
			unset($connectionSettings['dbname']);
			return $connectionSettings;
		}
	}

	/**
	 * @param array $connectionSettings
	 * @return \Doctrine\DBAL\Connection
	 */
	protected function getConnectionAndConnect(array $connectionSettings) {
		$connection = \Doctrine\DBAL\DriverManager::getConnection($connectionSettings);
		$connection->connect();
		return $connection;
	}
}
namespace TYPO3\Setup\ViewHelpers\Widget\Controller;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Controller for the DatabaseSelector Fluid Widget
 */
class DatabaseSelectorController extends DatabaseSelectorController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if ('TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController' === get_class($this)) {
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
			'indexAction' => array(
				'TYPO3\Flow\Aop\Advice\AroundAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AroundAdvice('TYPO3\Flow\Security\Aspect\PolicyEnforcementAspect', 'enforcePolicy', $objectManager, NULL),
				),
			),
			'checkConnectionAction' => array(
				'TYPO3\Flow\Aop\Advice\AroundAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AroundAdvice('TYPO3\Flow\Security\Aspect\PolicyEnforcementAspect', 'enforcePolicy', $objectManager, NULL),
				),
			),
			'getMetadataAction' => array(
				'TYPO3\Flow\Aop\Advice\AroundAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AroundAdvice('TYPO3\Flow\Security\Aspect\PolicyEnforcementAspect', 'enforcePolicy', $objectManager, NULL),
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
	 * @return void
	 */
	 public function indexAction() {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['indexAction'])) {
		$result = parent::indexAction();

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['indexAction'] = TRUE;
			try {
			
					$methodArguments = array();

					$adviceChains = $this->Flow_Aop_Proxy_getAdviceChains('indexAction');
					$adviceChain = $adviceChains['TYPO3\Flow\Aop\Advice\AroundAdvice'];
					$adviceChain->rewind();
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController', 'indexAction', $methodArguments, $adviceChain);
					$result = $adviceChain->proceed($joinPoint);

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['indexAction']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['indexAction']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param string $driver
	 * @param string $user
	 * @param string $password
	 * @param string $host
	 * @return string
	 */
	 public function checkConnectionAction($driver, $user, $password, $host) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['checkConnectionAction'])) {
		$result = parent::checkConnectionAction($driver, $user, $password, $host);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['checkConnectionAction'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['driver'] = $driver;
				$methodArguments['user'] = $user;
				$methodArguments['password'] = $password;
				$methodArguments['host'] = $host;
			
					$adviceChains = $this->Flow_Aop_Proxy_getAdviceChains('checkConnectionAction');
					$adviceChain = $adviceChains['TYPO3\Flow\Aop\Advice\AroundAdvice'];
					$adviceChain->rewind();
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController', 'checkConnectionAction', $methodArguments, $adviceChain);
					$result = $adviceChain->proceed($joinPoint);

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['checkConnectionAction']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['checkConnectionAction']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param string $driver
	 * @param string $user
	 * @param string $password
	 * @param string $host
	 * @param string $databaseName
	 * @return string
	 */
	 public function getMetadataAction($driver, $user, $password, $host, $databaseName) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['getMetadataAction'])) {
		$result = parent::getMetadataAction($driver, $user, $password, $host, $databaseName);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['getMetadataAction'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['driver'] = $driver;
				$methodArguments['user'] = $user;
				$methodArguments['password'] = $password;
				$methodArguments['host'] = $host;
				$methodArguments['databaseName'] = $databaseName;
			
					$adviceChains = $this->Flow_Aop_Proxy_getAdviceChains('getMetadataAction');
					$adviceChain = $adviceChains['TYPO3\Flow\Aop\Advice\AroundAdvice'];
					$adviceChain->rewind();
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController', 'getMetadataAction', $methodArguments, $adviceChain);
					$result = $adviceChain->proceed($joinPoint);

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['getMetadataAction']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['getMetadataAction']);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Setup\ViewHelpers\Widget\Controller\DatabaseSelectorController', $propertyName, 'var');
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
		$this->injectSettings(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager')->getConfiguration(\TYPO3\Flow\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.Setup'));
		$configurationManager_reference = &$this->configurationManager;
		$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Configuration\ConfigurationManager');
		if ($this->configurationManager === NULL) {
			$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('13edcae8fd67699bb78dadc8c1eac29c', $configurationManager_reference);
			if ($this->configurationManager === NULL) {
				$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('13edcae8fd67699bb78dadc8c1eac29c',  $configurationManager_reference, 'TYPO3\Flow\Configuration\ConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager'); });
			}
		}
		$objectManager_reference = &$this->objectManager;
		$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Object\ObjectManagerInterface');
		if ($this->objectManager === NULL) {
			$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('0c3c44be7be16f2a287f1fb2d068dde4', $objectManager_reference);
			if ($this->objectManager === NULL) {
				$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('0c3c44be7be16f2a287f1fb2d068dde4',  $objectManager_reference, 'TYPO3\Flow\Object\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'); });
			}
		}
		$reflectionService_reference = &$this->reflectionService;
		$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Reflection\ReflectionService');
		if ($this->reflectionService === NULL) {
			$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('921ad637f16d2059757a908fceaf7076', $reflectionService_reference);
			if ($this->reflectionService === NULL) {
				$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('921ad637f16d2059757a908fceaf7076',  $reflectionService_reference, 'TYPO3\Flow\Reflection\ReflectionService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'); });
			}
		}
		$mvcPropertyMappingConfigurationService_reference = &$this->mvcPropertyMappingConfigurationService;
		$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService');
		if ($this->mvcPropertyMappingConfigurationService === NULL) {
			$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('35acb49fbe78f28099d45aa647797c83', $mvcPropertyMappingConfigurationService_reference);
			if ($this->mvcPropertyMappingConfigurationService === NULL) {
				$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('35acb49fbe78f28099d45aa647797c83',  $mvcPropertyMappingConfigurationService_reference, 'TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService'); });
			}
		}
		$viewConfigurationManager_reference = &$this->viewConfigurationManager;
		$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\ViewConfigurationManager');
		if ($this->viewConfigurationManager === NULL) {
			$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('5a345bfd515fdb9f0c97080ff13c7079', $viewConfigurationManager_reference);
			if ($this->viewConfigurationManager === NULL) {
				$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('5a345bfd515fdb9f0c97080ff13c7079',  $viewConfigurationManager_reference, 'TYPO3\Flow\Mvc\ViewConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\ViewConfigurationManager'); });
			}
		}
		$systemLogger_reference = &$this->systemLogger;
		$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Log\SystemLoggerInterface');
		if ($this->systemLogger === NULL) {
			$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d57d95a1c3cd7528e3e6ea15012dac8', $systemLogger_reference);
			if ($this->systemLogger === NULL) {
				$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d57d95a1c3cd7528e3e6ea15012dac8',  $systemLogger_reference, 'TYPO3\Flow\Log\SystemLoggerInterface', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'); });
			}
		}
		$validatorResolver_reference = &$this->validatorResolver;
		$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Validation\ValidatorResolver');
		if ($this->validatorResolver === NULL) {
			$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('b457db29305ddeae13b61d92da000ca0', $validatorResolver_reference);
			if ($this->validatorResolver === NULL) {
				$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('b457db29305ddeae13b61d92da000ca0',  $validatorResolver_reference, 'TYPO3\Flow\Validation\ValidatorResolver', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Validation\ValidatorResolver'); });
			}
		}
		$flashMessageContainer_reference = &$this->flashMessageContainer;
		$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\FlashMessageContainer');
		if ($this->flashMessageContainer === NULL) {
			$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('e4fd26f8afd3994317304b563b2a9561', $flashMessageContainer_reference);
			if ($this->flashMessageContainer === NULL) {
				$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('e4fd26f8afd3994317304b563b2a9561',  $flashMessageContainer_reference, 'TYPO3\Flow\Mvc\FlashMessageContainer', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\FlashMessageContainer'); });
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
  0 => 'settings',
  1 => 'configurationManager',
  2 => 'objectManager',
  3 => 'reflectionService',
  4 => 'mvcPropertyMappingConfigurationService',
  5 => 'viewConfigurationManager',
  6 => 'systemLogger',
  7 => 'validatorResolver',
  8 => 'flashMessageContainer',
  9 => 'persistenceManager',
);
	}

	/**
	 * Autogenerated Proxy Method
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of method parameters by action name
	 * @\TYPO3\Flow\Annotations\CompileStatic
	 */
	static public function getActionMethodParameters($objectManager) {

return array (
  'indexAction' => 
  array (
  ),
  'checkConnectionAction' => 
  array (
    'driver' => 
    array (
      'position' => 0,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'user' => 
    array (
      'position' => 1,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'password' => 
    array (
      'position' => 2,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'host' => 
    array (
      'position' => 3,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
  ),
  'getMetadataAction' => 
  array (
    'driver' => 
    array (
      'position' => 0,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'user' => 
    array (
      'position' => 1,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'password' => 
    array (
      'position' => 2,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'host' => 
    array (
      'position' => 3,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
    'databaseName' => 
    array (
      'position' => 4,
      'optional' => false,
      'type' => 'string',
      'class' => NULL,
      'array' => false,
      'byReference' => false,
      'allowsNull' => true,
      'defaultValue' => NULL,
    ),
  ),
  'initializeAction' => 
  array (
  ),
  'errorAction' => 
  array (
  ),
);
	}

	/**
	 * Autogenerated Proxy Method
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of validation groups by action method name
	 * @\TYPO3\Flow\Annotations\CompileStatic
	 */
	static public function getActionValidationGroups($objectManager) {

return array (
);
	}

	/**
	 * Autogenerated Proxy Method
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of validate annotation parameters by action method name
	 * @\TYPO3\Flow\Annotations\CompileStatic
	 */
	static public function getActionValidateAnnotationData($objectManager) {

return array (
  'indexAction' => 
  array (
  ),
  'checkConnectionAction' => 
  array (
  ),
  'getMetadataAction' => 
  array (
  ),
  'initializeAction' => 
  array (
  ),
  'errorAction' => 
  array (
  ),
);
	}

	/**
	 * Autogenerated Proxy Method
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of argument names as key by action method name
	 * @\TYPO3\Flow\Annotations\CompileStatic
	 */
	static public function getActionIgnoredValidationArguments($objectManager) {

return array (
);
	}
}
#