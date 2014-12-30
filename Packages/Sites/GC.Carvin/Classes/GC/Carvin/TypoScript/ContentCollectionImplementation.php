<?php
namespace GC\Carvin\TypoScript;

use TYPO3\TypoScript\TypoScriptObjects\AbstractCollectionImplementation;

class ContentCollectionImplementation extends \TYPO3\Neos\TypoScript\ContentCollectionImplementation {

  /**
   * {@inheritdoc}
   *
   * @var string
   */
  public function evaluate() {
    $contentCollectionNode = $this->getContentCollectionNode();
    if ($contentCollectionNode !== NULL && $contentCollectionNode->getContext()->getWorkspaceName() === 'live') {
      return AbstractCollectionImplementation::evaluate();
    }
    return parent::evaluate();
  }

}