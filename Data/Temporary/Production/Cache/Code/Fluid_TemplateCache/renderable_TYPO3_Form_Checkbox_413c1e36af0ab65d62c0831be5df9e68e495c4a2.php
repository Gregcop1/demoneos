<?php class FluidCache_renderable_TYPO3_Form_Checkbox_413c1e36af0ab65d62c0831be5df9e68e495c4a2 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'TYPO3.Form:Field';
}
public function hasLayout() {
return TRUE;
}

/**
 * section field
 */
public function section_2da0b68df8841752bb747a76780679bcd87c6215(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	<label class="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = 'UTF-8';
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= !is_string($value3) && !(is_object($value3) && method_exists($value3, '__toString')) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments1['encoding'], $arguments1['doubleEncode']);

$output0 .= '">
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments4 = array();
$arguments4['property'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);
$arguments4['id'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments4['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments4['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.value', $renderingContext);
$arguments4['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments4['additionalAttributes'] = NULL;
$arguments4['data'] = NULL;
$arguments4['checked'] = NULL;
$arguments4['multiple'] = NULL;
$arguments4['name'] = NULL;
$arguments4['disabled'] = NULL;
$arguments4['dir'] = NULL;
$arguments4['lang'] = NULL;
$arguments4['style'] = NULL;
$arguments4['title'] = NULL;
$arguments4['accesskey'] = NULL;
$arguments4['tabindex'] = NULL;
$arguments4['onclick'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output0 .= $viewHelper6->initializeArgumentsAndRender();

$output0 .= '
		<span></span>
	</label>
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output7 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments8 = array();
$arguments8['name'] = 'TYPO3.Form:Field';
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper10->setArguments($arguments8);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output7 .= $viewHelper10->initializeArgumentsAndRender();

$output7 .= '
';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments11 = array();
$arguments11['name'] = 'field';
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
$output13 = '';

$output13 .= '
	<label class="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments14 = array();
$arguments14['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments14['keepQuotes'] = false;
$arguments14['encoding'] = 'UTF-8';
$arguments14['doubleEncode'] = true;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$value16 = ($arguments14['value'] !== NULL ? $arguments14['value'] : $renderChildrenClosure15());

$output13 .= !is_string($value16) && !(is_object($value16) && method_exists($value16, '__toString')) ? $value16 : htmlspecialchars($value16, ($arguments14['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments14['encoding'], $arguments14['doubleEncode']);

$output13 .= '">
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments17 = array();
$arguments17['property'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);
$arguments17['id'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments17['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments17['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.value', $renderingContext);
$arguments17['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['checked'] = NULL;
$arguments17['multiple'] = NULL;
$arguments17['name'] = NULL;
$arguments17['disabled'] = NULL;
$arguments17['dir'] = NULL;
$arguments17['lang'] = NULL;
$arguments17['style'] = NULL;
$arguments17['title'] = NULL;
$arguments17['accesskey'] = NULL;
$arguments17['tabindex'] = NULL;
$arguments17['onclick'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper19->setArguments($arguments17);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output13 .= $viewHelper19->initializeArgumentsAndRender();

$output13 .= '
		<span></span>
	</label>
';
return $output13;
};

$output7 .= '';

return $output7;
}


}
#0             7711      