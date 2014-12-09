<?php 
namespace TYPO3\Eel\Helper;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Eel".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Eel\ProtectedContextAwareInterface;

/**
 * Math helpers for Eel contexts
 *
 * The implementation sticks to the JavaScript specificiation including EcmaScript 6 proposals.
 *
 * See https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math for a documentation and
 * specification of the JavaScript implementation.
 */
class MathHelper_Original implements ProtectedContextAwareInterface {

	/**
	 * @return float Euler's constant and the base of natural logarithms, approximately 2.718
	 */
	public function getE() {
		return exp(1);
	}

	/**
	 * @return float Natural logarithm of 2, approximately 0.693
	 */
	public function getLN2() {
		return log(2);
	}

	/**
	 * @return float Natural logarithm of 10, approximately 2.303
	 */
	public function getLN10() {
		return log(10);
	}

	/**
	 * @return float Base 2 logarithm of E, approximately 1.443
	 */
	public function getLOG2E() {
		return log(exp(1), 2);
	}

	/**
	 * @return float Base 10 logarithm of E, approximately 0.434
	 */
	public function getLOG10E() {
		return log(exp(1), 10);
	}

	/**
	 * @return float Ratio of the circumference of a circle to its diameter, approximately 3.14159
	 */
	public function getPI() {
		return pi();
	}

	/**
	 * @return float Square root of 1/2; equivalently, 1 over the square root of 2, approximately 0.707
	 */
	public function getSQRT1_2() {
		return sqrt(0.5);
	}

	/**
	 * @return float Square root of 2, approximately 1.414
	 */
	public function getSQRT2() {
		return sqrt(2);
	}

	/**
	 * @param float $x A number
	 * @return float The absolute value of the given value
	 */
	public function abs($x = 'NAN') {
		if (!is_numeric($x) && $x !== NULL) {
			return NAN;
		}
		return abs($x);
	}

	/**
	 * @param float $x A number
	 * @return float The arccosine (in radians) of the given value
	 */
	public function acos($x) {
		return acos($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic arccosine (in radians) of the given value
	 */
	public function acosh($x) {
		return acosh($x);
	}

	/**
	 * @param float $x A number
	 * @return float The arcsine (in radians) of the given value
	 */
	public function asin($x) {
		return asin($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic arcsine (in radians) of the given value
	 */
	public function asinh($x) {
		return asinh($x);
	}

	/**
	 * @param float $x A number
	 * @return float The arctangent (in radians) of the given value
	 */
	public function atan($x) {
		return atan($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic arctangent (in radians) of the given value
	 */
	public function atanh($x) {
		return atanh($x);
	}

	/**
	 * @param float $y A number
	 * @param float $x A number
	 * @return float The arctangent of the quotient of its arguments
	 */
	public function atan2($y, $x) {
		return atan2($y, $x);
	}

	/**
	 * @param float $x A number
	 * @return float The cube root of the given value
	 */
	public function cbrt($x) {
		$y = pow(abs($x), 1/3);
		return $x < 0 ? -$y : $y;
	}

	/**
	 * @param float $x A number
	 * @return float The smallest integer greater than or equal to the given value
	 */
	public function ceil($x) {
		return ceil($x);
	}

	/**
	 * @param float $x A number given in radians
	 * @return float The cosine of the given value
	 */
	public function cos($x) {
		return cos($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic cosine of the given value
	 */
	public function cosh($x) {
		return cosh($x);
	}

	/**
	 * @param float $x A number
	 * @return float The power of the Euler's constant with the given value (e^x)
	 */
	public function exp($x) {
		return exp($x);
	}

	/**
	 * @param float $x A number
	 * @return float The power of the Euler's constant with the given value minus 1 (e^x - 1)
	 */
	public function expm1($x) {
		return expm1($x);
	}

	/**
	 * @param float $x A number
	 * @return float The largest integer less than or equal to the given value
	 */
	public function floor($x) {
		return floor($x);
	}

	/**
	 * Test if the given value is a finite number
	 *
	 * This is equivalent to the global isFinite() function in JavaScript.
	 *
	 * @param mixed $x A value
	 * @return boolean TRUE if the value is a finite (not NAN) number
	 */
	public function isFinite($x) {
		return is_numeric($x) && is_finite($x);
	}

	/**
	 * Test if the given value is an infinite number (INF or -INF)
	 *
	 * This function has no direct equivalent in JavaScript.
	 *
	 * @param mixed $x A value
	 * @return boolean TRUE if the value is INF or -INF
	 */
	public function isInfinite($x) {
		return is_numeric($x) && is_infinite($x);
	}

	/**
	 * Test if the given value is not a number (either not numeric or NAN)
	 *
	 * This is equivalent to the global isNaN() function in JavaScript.
	 *
	 * @param mixed $x A value
	 * @return boolean TRUE if the value is not a number
	 */
	public function isNaN($x) {
		return !is_numeric($x) || is_nan($x);
	}

	/**
	 * @param float $x A number
	 * @param float $y A number
	 * @param float $z_ Optional variable list of additional numbers
	 * @return float The square root of the sum of squares of the arguments
	 */
	public function hypot($x, $y, $z_ = NULL) {
		if ($z_ === NULL) {
			return hypot($x, $y);
		}
		$sum = 0;
		foreach (func_get_args() as $value) {
			$sum += $value * $value;
		}
		return sqrt($sum);
	}

	/**
	 * @param float $x A number
	 * @return float The natural logarithm (base e) of the given value
	 */
	public function log($x) {
		return log($x);
	}

	/**
	 * @param float $x A number
	 * @return float The natural logarithm (base e) of 1 + the given value
	 */
	public function log1p($x) {
		return log1p($x);
	}

	/**
	 * @param float $x A number
	 * @return float The base 10 logarithm of the given value
	 */
	public function log10($x) {
		return log10($x);
	}

	/**
	 * @param float $x A number
	 * @return float The base 2 logarithm of the given value
	 */
	public function log2($x) {
		return log($x, 2);
	}

	/**
	 * @param float $x A number
	 * @param float $y_ Optional variable list of additional numbers
	 * @return float The largest of the given numbers (zero or more)
	 */
	public function max($x = NULL, $y_ = NULL) {
		$arguments = func_get_args();
		if ($arguments !== array()) {
			return call_user_func_array('max', func_get_args());
		} else {
			return -INF;
		}
	}

	/**
	 * @param float $x A number
	 * @param float $y_ Optional variable list of additional numbers
	 * @return float The smallest of the given numbers (zero or more)
	 */
	public function min($x = NULL, $y_ = NULL) {
		$arguments = func_get_args();
		if ($arguments !== array()) {
			return call_user_func_array('min', func_get_args());
		} else {
			return INF;
		}
	}

	/**
	 * Calculate the power of x by y
	 *
	 * @param float $x The base
	 * @param float $y The exponent
	 * @return float The base to the exponent power (x^y)
	 */
	public function pow($x, $y) {
		return pow($x, $y);
	}

	/**
	 * Get a random foating point number between 0 (inclusive) and 1 (exclusive)
	 *
	 * That means a result will always be less than 1 and greater or equal to 0, the same way Math.random() works in
	 * JavaScript.
	 *
	 * See Math.randomInt(min, max) for a function that returns random integer numbers from a given interval.
	 *
	 * @return float A random floating point number between 0 (inclusive) and 1 (exclusive), that is from [0, 1)
	 */
	public function random() {
		return mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
	}

	/**
	 * Get a random integer number between a min and max value (inclusive)
	 *
	 * That means a result will always be greater than or equal to min and less than or equal to max.
	 *
	 * @param integer $min The lower bound for the random number (inclusive)
	 * @param integer $max The upper bound for the random number (inclusive)
	 * @return integer A random number between min and max (inclusive), that is from [min, max]
	 */
	public function randomInt($min, $max) {
		return mt_rand($min, $max);
	}

	/**
	 * Rounds the subject to the given precision
	 *
	 * The precision defines the number of digits after the decimal point.
	 * Negative values are also supported (-1 rounds to full 10ths).
	 *
	 * @param float $subject The value to round
	 * @param integer $precision The precision (digits after decimal point) to use, defaults to 0
	 * @return float The rounded value
	 */
	public function round($subject, $precision = 0) {
		if (!is_numeric($subject)) {
			return NAN;
		}
		$subject = floatval($subject);
		if ($precision != NULL && !is_int($precision)) {
			return NAN;
		}
		return round($subject, $precision);
	}

	/**
	 * Get the sign of the given number, indicating whether the number is positive, negative or zero
	 *
	 * @param integer|float $x The value
	 * @return integer -1, 0, 1 depending on the sign or NAN if the given value was not numeric
	 */
	public function sign($x) {
		if ($x < 0) {
			return -1;
		} elseif ($x > 0) {
			return 1;
		} elseif ($x === 0 || $x === 0.0) {
			return 0;
		} else {
			return NAN;
		}
	}

	/**
	 * @param float $x A number given in radians
	 * @return float The sine of the given value
	 */
	public function sin($x) {
		return sin($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic sine of the given value
	 */
	public function sinh($x) {
		return sinh($x);
	}

	/**
	 * @param float $x A number
	 * @return float The square root of the given number
	 */
	public function sqrt($x) {
		return sqrt($x);
	}

	/**
	 * @param float $x A number given in radians
	 * @return float The tangent of the given value
	 */
	public function tan($x) {
		return tan($x);
	}

	/**
	 * @param float $x A number
	 * @return float The hyperbolic tangent of the given value
	 */
	public function tanh($x) {
		return tanh($x);
	}

	/**
	 * Get the integral part of the given number by removing any fractional digits
	 *
	 * This function doesn't round the given number but merely calls ceil(x) or floor(x) depending
	 * on the sign of the number.
	 *
	 * @param float $x A number
	 * @return integer The integral part of the given number
	 */
	public function trunc($x) {
		$sign = $this->sign($x);
		switch ($sign) {
			case -1:
				return ceil($x);
			case 1:
				return floor($x);
			default:
				return $sign;
		}
	}

	/**
	 * All methods are considered safe
	 *
	 * @param string $methodName
	 * @return boolean
	 */
	public function allowsCallOfMethod($methodName) {
		return TRUE;
	}

}
namespace TYPO3\Eel\Helper;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Math helpers for Eel contexts
 * 
 * The implementation sticks to the JavaScript specificiation including EcmaScript 6 proposals.
 * 
 * See https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math for a documentation and
 * specification of the JavaScript implementation.
 */
class MathHelper extends MathHelper_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\Helper\MathHelper');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\Helper\MathHelper', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\Helper\MathHelper', $propertyName, 'var');
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