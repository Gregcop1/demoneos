<?php class FluidCache_renderable_TYPO3_Form_PasswordWithConfirmation_9b7270e0b458737a13ff313fbf6e52d75cfd9e10 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments1 = array();
$output2 = '';

$output2 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);

$output2 .= '.password';
$arguments1['property'] = $output2;
$arguments1['id'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments1['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments1['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments1['additionalAttributes'] = NULL;
$arguments1['data'] = NULL;
$arguments1['name'] = NULL;
$arguments1['value'] = NULL;
$arguments1['disabled'] = NULL;
$arguments1['maxlength'] = NULL;
$arguments1['readonly'] = NULL;
$arguments1['size'] = NULL;
$arguments1['placeholder'] = NULL;
$arguments1['dir'] = NULL;
$arguments1['lang'] = NULL;
$arguments1['style'] = NULL;
$arguments1['title'] = NULL;
$arguments1['accesskey'] = NULL;
$arguments1['tabindex'] = NULL;
$arguments1['onclick'] = NULL;
$renderChildrenClosure3 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper4 = $self->getViewHelper('$viewHelper4', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper4->setArguments($arguments1);
$viewHelper4->setRenderingContext($renderingContext);
$viewHelper4->setRenderChildrenClosure($renderChildrenClosure3);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output0 .= $viewHelper4->initializeArgumentsAndRender();

$output0 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments5 = array();
// Rendering Boolean node
$arguments5['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.passwordDescription', $renderingContext));
$arguments5['then'] = NULL;
$arguments5['else'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
$output7 = '';

$output7 .= '
		<span class="help-block">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments8 = array();
$arguments8['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.passwordDescription', $renderingContext);
$arguments8['keepQuotes'] = false;
$arguments8['encoding'] = 'UTF-8';
$arguments8['doubleEncode'] = true;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$value10 = ($arguments8['value'] !== NULL ? $arguments8['value'] : $renderChildrenClosure9());

$output7 .= !is_string($value10) && !(is_object($value10) && method_exists($value10, '__toString')) ? $value10 : htmlspecialchars($value10, ($arguments8['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments8['encoding'], $arguments8['doubleEncode']);

$output7 .= '</span>
	';
return $output7;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper11->setArguments($arguments5);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure6);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper11->initializeArgumentsAndRender();

$output0 .= '
	<label for="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments12 = array();
$arguments12['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments12['keepQuotes'] = false;
$arguments12['encoding'] = 'UTF-8';
$arguments12['doubleEncode'] = true;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$value14 = ($arguments12['value'] !== NULL ? $arguments12['value'] : $renderChildrenClosure13());

$output0 .= !is_string($value14) && !(is_object($value14) && method_exists($value14, '__toString')) ? $value14 : htmlspecialchars($value14, ($arguments12['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments12['encoding'], $arguments12['doubleEncode']);

$output0 .= '-confirmation" class="control-label">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper
$arguments15 = array();
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments17 = array();
$arguments17['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.confirmationLabel', $renderingContext);
$arguments17['keepQuotes'] = false;
$arguments17['encoding'] = 'UTF-8';
$arguments17['doubleEncode'] = true;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};
$value19 = ($arguments17['value'] !== NULL ? $arguments17['value'] : $renderChildrenClosure18());
return !is_string($value19) && !(is_object($value19) && method_exists($value19, '__toString')) ? $value19 : htmlspecialchars($value19, ($arguments17['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments17['encoding'], $arguments17['doubleEncode']);
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper');
$viewHelper20->setArguments($arguments15);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper

$output0 .= $viewHelper20->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments21 = array();
// Rendering Boolean node
$arguments21['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.required', $renderingContext));
$arguments21['then'] = NULL;
$arguments21['else'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments23 = array();
$arguments23['partial'] = 'TYPO3.Form:Field/Required';
$arguments23['section'] = NULL;
$arguments23['arguments'] = array (
);
$arguments23['optional'] = false;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper25->setArguments($arguments23);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
return $viewHelper25->initializeArgumentsAndRender();
};
$viewHelper26 = $self->getViewHelper('$viewHelper26', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper26->setArguments($arguments21);
$viewHelper26->setRenderingContext($renderingContext);
$viewHelper26->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper26->initializeArgumentsAndRender();

$output0 .= '</label>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments27 = array();
$output28 = '';

$output28 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);

$output28 .= '.confirmation';
$arguments27['property'] = $output28;
$output29 = '';

$output29 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);

$output29 .= '-confirmation';
$arguments27['id'] = $output29;
$arguments27['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.confirmationClassAttribute', $renderingContext);
$arguments27['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments27['additionalAttributes'] = NULL;
$arguments27['data'] = NULL;
$arguments27['name'] = NULL;
$arguments27['value'] = NULL;
$arguments27['disabled'] = NULL;
$arguments27['maxlength'] = NULL;
$arguments27['readonly'] = NULL;
$arguments27['size'] = NULL;
$arguments27['placeholder'] = NULL;
$arguments27['dir'] = NULL;
$arguments27['lang'] = NULL;
$arguments27['style'] = NULL;
$arguments27['title'] = NULL;
$arguments27['accesskey'] = NULL;
$arguments27['tabindex'] = NULL;
$arguments27['onclick'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper31 = $self->getViewHelper('$viewHelper31', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper31->setArguments($arguments27);
$viewHelper31->setRenderingContext($renderingContext);
$viewHelper31->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output0 .= $viewHelper31->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output32 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments33 = array();
$arguments33['name'] = 'TYPO3.Form:Field';
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper35->setArguments($arguments33);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure34);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output32 .= $viewHelper35->initializeArgumentsAndRender();

$output32 .= '
';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments36 = array();
$arguments36['name'] = 'field';
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
$output38 = '';

$output38 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments39 = array();
$output40 = '';

$output40 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);

$output40 .= '.password';
$arguments39['property'] = $output40;
$arguments39['id'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments39['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementClassAttribute', $renderingContext);
$arguments39['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments39['additionalAttributes'] = NULL;
$arguments39['data'] = NULL;
$arguments39['name'] = NULL;
$arguments39['value'] = NULL;
$arguments39['disabled'] = NULL;
$arguments39['maxlength'] = NULL;
$arguments39['readonly'] = NULL;
$arguments39['size'] = NULL;
$arguments39['placeholder'] = NULL;
$arguments39['dir'] = NULL;
$arguments39['lang'] = NULL;
$arguments39['style'] = NULL;
$arguments39['title'] = NULL;
$arguments39['accesskey'] = NULL;
$arguments39['tabindex'] = NULL;
$arguments39['onclick'] = NULL;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper42->setArguments($arguments39);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output38 .= $viewHelper42->initializeArgumentsAndRender();

$output38 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments43 = array();
// Rendering Boolean node
$arguments43['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.passwordDescription', $renderingContext));
$arguments43['then'] = NULL;
$arguments43['else'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
$output45 = '';

$output45 .= '
		<span class="help-block">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments46 = array();
$arguments46['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.passwordDescription', $renderingContext);
$arguments46['keepQuotes'] = false;
$arguments46['encoding'] = 'UTF-8';
$arguments46['doubleEncode'] = true;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$value48 = ($arguments46['value'] !== NULL ? $arguments46['value'] : $renderChildrenClosure47());

$output45 .= !is_string($value48) && !(is_object($value48) && method_exists($value48, '__toString')) ? $value48 : htmlspecialchars($value48, ($arguments46['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments46['encoding'], $arguments46['doubleEncode']);

$output45 .= '</span>
	';
return $output45;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper49->setArguments($arguments43);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output38 .= $viewHelper49->initializeArgumentsAndRender();

$output38 .= '
	<label for="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments50 = array();
$arguments50['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments50['keepQuotes'] = false;
$arguments50['encoding'] = 'UTF-8';
$arguments50['doubleEncode'] = true;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return NULL;
};
$value52 = ($arguments50['value'] !== NULL ? $arguments50['value'] : $renderChildrenClosure51());

$output38 .= !is_string($value52) && !(is_object($value52) && method_exists($value52, '__toString')) ? $value52 : htmlspecialchars($value52, ($arguments50['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments50['encoding'], $arguments50['doubleEncode']);

$output38 .= '-confirmation" class="control-label">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper
$arguments53 = array();
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments55 = array();
$arguments55['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.confirmationLabel', $renderingContext);
$arguments55['keepQuotes'] = false;
$arguments55['encoding'] = 'UTF-8';
$arguments55['doubleEncode'] = true;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
return NULL;
};
$value57 = ($arguments55['value'] !== NULL ? $arguments55['value'] : $renderChildrenClosure56());
return !is_string($value57) && !(is_object($value57) && method_exists($value57, '__toString')) ? $value57 : htmlspecialchars($value57, ($arguments55['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments55['encoding'], $arguments55['doubleEncode']);
};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper');
$viewHelper58->setArguments($arguments53);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper

$output38 .= $viewHelper58->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments59 = array();
// Rendering Boolean node
$arguments59['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.required', $renderingContext));
$arguments59['then'] = NULL;
$arguments59['else'] = NULL;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments61 = array();
$arguments61['partial'] = 'TYPO3.Form:Field/Required';
$arguments61['section'] = NULL;
$arguments61['arguments'] = array (
);
$arguments61['optional'] = false;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper63 = $self->getViewHelper('$viewHelper63', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper63->setArguments($arguments61);
$viewHelper63->setRenderingContext($renderingContext);
$viewHelper63->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
return $viewHelper63->initializeArgumentsAndRender();
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper64->setArguments($arguments59);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure60);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output38 .= $viewHelper64->initializeArgumentsAndRender();

$output38 .= '</label>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments65 = array();
$output66 = '';

$output66 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);

$output66 .= '.confirmation';
$arguments65['property'] = $output66;
$output67 = '';

$output67 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);

$output67 .= '-confirmation';
$arguments65['id'] = $output67;
$arguments65['class'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.confirmationClassAttribute', $renderingContext);
$arguments65['errorClass'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementErrorClassAttribute', $renderingContext);
$arguments65['additionalAttributes'] = NULL;
$arguments65['data'] = NULL;
$arguments65['name'] = NULL;
$arguments65['value'] = NULL;
$arguments65['disabled'] = NULL;
$arguments65['maxlength'] = NULL;
$arguments65['readonly'] = NULL;
$arguments65['size'] = NULL;
$arguments65['placeholder'] = NULL;
$arguments65['dir'] = NULL;
$arguments65['lang'] = NULL;
$arguments65['style'] = NULL;
$arguments65['title'] = NULL;
$arguments65['accesskey'] = NULL;
$arguments65['tabindex'] = NULL;
$arguments65['onclick'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper69 = $self->getViewHelper('$viewHelper69', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper69->setArguments($arguments65);
$viewHelper69->setRenderingContext($renderingContext);
$viewHelper69->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output38 .= $viewHelper69->initializeArgumentsAndRender();

$output38 .= '
';
return $output38;
};

$output32 .= '';

return $output32;
}


}
#0             21878     