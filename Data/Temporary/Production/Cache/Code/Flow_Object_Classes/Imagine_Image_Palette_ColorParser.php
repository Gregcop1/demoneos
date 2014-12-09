<?php 

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Image\Palette;

use Imagine\Exception\InvalidArgumentException;

class ColorParser_Original
{
    /**
     * Parses a color to a RGB tuple
     *
     * @param string|array|integer $color
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function parseToRGB($color)
    {
        $color = $this->parse($color);

        if (4 === count($color)) {
            $color = array(
                255 * (1 - $color[0] / 100) * (1 - $color[3] / 100),
                255 * (1 - $color[1] / 100) * (1 - $color[3] / 100),
                255 * (1 - $color[2] / 100) * (1 - $color[3] / 100),
            );
        }

        return $color;
    }

    /**
     * Parses a color to a CMYK tuple
     *
     * @param string|array|integer $color
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function parseToCMYK($color)
    {
        $color = $this->parse($color);

        if (3 === count($color)) {
            $r = $color[0] / 255;
            $g = $color[1] / 255;
            $b = $color[2] / 255;

            $k = 1 - max($r, $g, $b);

            $color = array(
                1 === $k ? 0 : round((1 - $r - $k) / (1- $k) * 100),
                1 === $k ? 0 : round((1 - $g - $k) / (1- $k) * 100),
                1 === $k ? 0 : round((1 - $b - $k) / (1- $k) * 100),
                round($k * 100)
            );
        }

        return $color;
    }

    /**
     * Parses a color to a grayscale value
     *
     * @param string|array|integer $color
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function parseToGrayscale($color)
    {
        if (is_array($color) && 1 === count($color)) {
            return array_values($color);
        }

        $color = array_unique($this->parse($color));

        if (1 !== count($color)) {
            throw new InvalidArgumentException('The provided color has different values of red, green and blue components. Grayscale colors must have the same values for these.');
        }

        return $color;
    }

    /**
     * Parses a color
     *
     * @param string|array|integer $color
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    private function parse($color)
    {
        if (!is_string($color) && !is_array($color) && !is_int($color)) {
            throw new InvalidArgumentException(sprintf('Color must be specified as a hexadecimal string, array or integer, %s given', gettype($color)));
        }

        if (is_array($color)) {
            if (3 === count($color) || 4 === count($color)) {
                return array_values($color);
            }
            throw new InvalidArgumentException('Color argument if array, must look like array(R, G, B), or array(C, M, Y, K) where R, G, B are the integer values between 0 and 255 for red, green and blue or cyan, magenta, yellow and black color indexes accordingly');
        }

        if (is_string($color)) {
            if (0 === strpos($color, 'cmyk(')) {
                $substrColor = substr($color, 5, strlen($color) - 6);

                $components = array_map(function ($component) {
                    return round(trim($component, ' %'));
                }, explode(',', $substrColor));

                if (count($components) !== 4) {
                    throw new InvalidArgumentException(sprintf('Unable to parse color %s', $color));
                }

                return $components;
            } else {
                $color = ltrim($color, '#');

                if (strlen($color) !== 3 && strlen($color) !== 6) {
                    throw new InvalidArgumentException(sprintf('Color must be a hex value in regular (6 characters) or short (3 characters) notation, "%s" given', $color));
                }

                if (strlen($color) === 3) {
                    $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
                }

                $color = array_map('hexdec', str_split($color, 2));
            }
        }

        if (is_int($color)) {
            $color = array(255 & ($color >> 16), 255 & ($color >> 8), 255 & $color);
        }

        return $color;
    }
}
namespace Imagine\Image\Palette;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * 
 */
class ColorParser extends ColorParser_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('Imagine\Image\Palette\ColorParser');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('Imagine\Image\Palette\ColorParser', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('Imagine\Image\Palette\ColorParser', $propertyName, 'var');
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
}
#