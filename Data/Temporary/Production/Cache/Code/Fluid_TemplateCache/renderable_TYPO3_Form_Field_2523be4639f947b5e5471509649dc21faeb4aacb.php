<?php class FluidCache_renderable_TYPO3_Form_Field_2523be4639f947b5e5471509649dc21faeb4aacb extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\ValidationResultsViewHelper
$arguments1 = array();
$arguments1['for'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.identifier', $renderingContext);
$arguments1['as'] = 'validationResults';
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
	<div class="form-group';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments4 = array();
// Rendering Boolean node
$arguments4['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'validationResults.flattenedErrors', $renderingContext));
$arguments4['then'] = ' has-error';
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments7 = array();
// Rendering Boolean node
$arguments7['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.rootForm.renderingOptions.previewMode', $renderingContext));
$arguments7['then'] = NULL;
$arguments7['else'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= ' data-element="';
// Rendering ViewHelper TYPO3\Form\ViewHelpers\Form\FormElementRootlinePathViewHelper
$arguments10 = array();
$arguments10['renderable'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element', $renderingContext);
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Form\ViewHelpers\Form\FormElementRootlinePathViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Form\ViewHelpers\Form\FormElementRootlinePathViewHelper

$output9 .= $viewHelper12->initializeArgumentsAndRender();

$output9 .= '"';
return $output9;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper13->setArguments($arguments7);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper13->initializeArgumentsAndRender();

$output3 .= '>
		<label class="control-label" for="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments14 = array();
$arguments14['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.uniqueIdentifier', $renderingContext);
$arguments14['keepQuotes'] = false;
$arguments14['encoding'] = 'UTF-8';
$arguments14['doubleEncode'] = true;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$value16 = ($arguments14['value'] !== NULL ? $arguments14['value'] : $renderChildrenClosure15());

$output3 .= !is_string($value16) && !(is_object($value16) && method_exists($value16, '__toString')) ? $value16 : htmlspecialchars($value16, ($arguments14['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments14['encoding'], $arguments14['doubleEncode']);

$output3 .= '">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper
$arguments17 = array();
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments19 = array();
$arguments19['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.label', $renderingContext);
$arguments19['keepQuotes'] = false;
$arguments19['encoding'] = 'UTF-8';
$arguments19['doubleEncode'] = true;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$value21 = ($arguments19['value'] !== NULL ? $arguments19['value'] : $renderChildrenClosure20());
return !is_string($value21) && !(is_object($value21) && method_exists($value21, '__toString')) ? $value21 : htmlspecialchars($value21, ($arguments19['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments19['encoding'], $arguments19['doubleEncode']);
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper');
$viewHelper22->setArguments($arguments17);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\Nl2brViewHelper

$output3 .= $viewHelper22->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments23 = array();
// Rendering Boolean node
$arguments23['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.required', $renderingContext));
$arguments23['then'] = NULL;
$arguments23['else'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments25 = array();
$arguments25['partial'] = 'TYPO3.Form:Field/Required';
$arguments25['section'] = NULL;
$arguments25['arguments'] = array (
);
$arguments25['optional'] = false;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper27->setArguments($arguments25);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
return $viewHelper27->initializeArgumentsAndRender();
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper28->setArguments($arguments23);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper28->initializeArgumentsAndRender();

$output3 .= '</label>
		<div class="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments29 = array();
$arguments29['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.containerClassAttribute', $renderingContext);
$arguments29['keepQuotes'] = false;
$arguments29['encoding'] = 'UTF-8';
$arguments29['doubleEncode'] = true;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return NULL;
};
$value31 = ($arguments29['value'] !== NULL ? $arguments29['value'] : $renderChildrenClosure30());

$output3 .= !is_string($value31) && !(is_object($value31) && method_exists($value31, '__toString')) ? $value31 : htmlspecialchars($value31, ($arguments29['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments29['encoding'], $arguments29['doubleEncode']);

$output3 .= '">
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments32 = array();
$arguments32['section'] = 'field';
$arguments32['partial'] = NULL;
$arguments32['arguments'] = array (
);
$arguments32['optional'] = false;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper34->setArguments($arguments32);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output3 .= $viewHelper34->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments35 = array();
// Rendering Boolean node
$arguments35['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'validationResults.flattenedErrors', $renderingContext));
$arguments35['then'] = NULL;
$arguments35['else'] = NULL;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
				<span class="help-inline">
					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments38 = array();
$arguments38['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'validationResults.errors', $renderingContext);
$arguments38['as'] = 'error';
$arguments38['key'] = '';
$arguments38['reverse'] = false;
$arguments38['iteration'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
$output40 = '';

$output40 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\TranslateViewHelper
$arguments41 = array();
$arguments41['id'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.code', $renderingContext);
$arguments41['arguments'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.arguments', $renderingContext);
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.renderingOptions.translationPackage', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = 'UTF-8';
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());
$arguments41['package'] = !is_string($value44) && !(is_object($value44) && method_exists($value44, '__toString')) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments42['encoding'], $arguments42['doubleEncode']);
$arguments41['source'] = 'ValidationErrors';
$arguments41['value'] = NULL;
$arguments41['quantity'] = NULL;
$arguments41['locale'] = NULL;
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments46 = array();
$arguments46['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error', $renderingContext);
$arguments46['keepQuotes'] = false;
$arguments46['encoding'] = 'UTF-8';
$arguments46['doubleEncode'] = true;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$value48 = ($arguments46['value'] !== NULL ? $arguments46['value'] : $renderChildrenClosure47());
return !is_string($value48) && !(is_object($value48) && method_exists($value48, '__toString')) ? $value48 : htmlspecialchars($value48, ($arguments46['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments46['encoding'], $arguments46['doubleEncode']);
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper49->setArguments($arguments41);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\TranslateViewHelper

$output40 .= $viewHelper49->initializeArgumentsAndRender();

$output40 .= '
						<br />
					';
return $output40;
};

$output37 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments38, $renderChildrenClosure39, $renderingContext);

$output37 .= '
				</span>
			';
return $output37;
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper50->setArguments($arguments35);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper50->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments51 = array();
// Rendering Boolean node
$arguments51['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementDescription', $renderingContext));
$arguments51['then'] = NULL;
$arguments51['else'] = NULL;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
				<span class="help-block">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments54 = array();
$arguments54['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'element.properties.elementDescription', $renderingContext);
$arguments54['keepQuotes'] = false;
$arguments54['encoding'] = 'UTF-8';
$arguments54['doubleEncode'] = true;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$value56 = ($arguments54['value'] !== NULL ? $arguments54['value'] : $renderChildrenClosure55());

$output53 .= !is_string($value56) && !(is_object($value56) && method_exists($value56, '__toString')) ? $value56 : htmlspecialchars($value56, ($arguments54['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments54['encoding'], $arguments54['doubleEncode']);

$output53 .= '</span>
			';
return $output53;
};
$viewHelper57 = $self->getViewHelper('$viewHelper57', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper57->setArguments($arguments51);
$viewHelper57->setRenderingContext($renderingContext);
$viewHelper57->setRenderChildrenClosure($renderChildrenClosure52);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper57->initializeArgumentsAndRender();

$output3 .= '
		</div>
	</div>
';
return $output3;
};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\ValidationResultsViewHelper');
$viewHelper58->setArguments($arguments1);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\ValidationResultsViewHelper

$output0 .= $viewHelper58->initializeArgumentsAndRender();

return $output0;
}


}
#0             16479     