<?php class FluidCache_Standalone_template_file_Menu_3dd2246791dc50265d1e26674c9693e3a8ef75a3 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
 * section itemsList
 */
public function section_972aa32a62a3edb2361f354fbe5a593300986184(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments1 = array();
$arguments1['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'items', $renderingContext);
$arguments1['as'] = 'item';
$arguments1['key'] = '';
$arguments1['reverse'] = false;
$arguments1['iteration'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		<li';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper
$arguments4 = array();
$arguments4['value'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\TypoScript\ViewHelpers\RenderViewHelper
$arguments6 = array();
$output7 = '';

$output7 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.state', $renderingContext);

$output7 .= '.attributes';
$arguments6['path'] = $output7;
// Rendering Array
$array8 = array();
$array8['item'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item', $renderingContext);
$arguments6['context'] = $array8;
$arguments6['typoScriptPackageKey'] = NULL;
$arguments6['typoScriptFilePathPattern'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\TypoScript\ViewHelpers\RenderViewHelper');
$viewHelper10->setArguments($arguments6);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\TypoScript\ViewHelpers\RenderViewHelper
return $viewHelper10->initializeArgumentsAndRender();
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\RawViewHelper');
$viewHelper11->setArguments($arguments4);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper

$output3 .= $viewHelper11->initializeArgumentsAndRender();

$output3 .= '>
		';
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Link\NodeViewHelper
$arguments12 = array();
$arguments12['node'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.node', $renderingContext);
$arguments12['additionalAttributes'] = NULL;
$arguments12['data'] = NULL;
$arguments12['format'] = NULL;
$arguments12['absolute'] = false;
$arguments12['baseNodeName'] = 'documentNode';
$arguments12['arguments'] = array (
);
$arguments12['section'] = '';
$arguments12['addQueryString'] = false;
$arguments12['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments12['class'] = NULL;
$arguments12['dir'] = NULL;
$arguments12['id'] = NULL;
$arguments12['lang'] = NULL;
$arguments12['style'] = NULL;
$arguments12['title'] = NULL;
$arguments12['accesskey'] = NULL;
$arguments12['tabindex'] = NULL;
$arguments12['onclick'] = NULL;
$arguments12['name'] = NULL;
$arguments12['rel'] = NULL;
$arguments12['rev'] = NULL;
$arguments12['target'] = NULL;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments14 = array();
$arguments14['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.label', $renderingContext);
$arguments14['keepQuotes'] = false;
$arguments14['encoding'] = 'UTF-8';
$arguments14['doubleEncode'] = true;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$value16 = ($arguments14['value'] !== NULL ? $arguments14['value'] : $renderChildrenClosure15());
return !is_string($value16) && !(is_object($value16) && method_exists($value16, '__toString')) ? $value16 : htmlspecialchars($value16, ($arguments14['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments14['encoding'], $arguments14['doubleEncode']);
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\Neos\ViewHelpers\Link\NodeViewHelper');
$viewHelper17->setArguments($arguments12);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure13);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Link\NodeViewHelper

$output3 .= $viewHelper17->initializeArgumentsAndRender();

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments18 = array();
// Rendering Boolean node
$arguments18['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.subItems', $renderingContext));
$arguments18['then'] = NULL;
$arguments18['else'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
$output20 = '';

$output20 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments21 = array();
$arguments21['section'] = 'itemsList';
// Rendering Array
$array22 = array();
$array22['items'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.subItems', $renderingContext);
$arguments21['arguments'] = $array22;
$arguments21['partial'] = NULL;
$arguments21['optional'] = false;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper24->setArguments($arguments21);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output20 .= $viewHelper24->initializeArgumentsAndRender();

$output20 .= '
			</ul>
		';
return $output20;
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper25->setArguments($arguments18);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper25->initializeArgumentsAndRender();

$output3 .= '
		</li>
	';
return $output3;
};

$output0 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output26 = '';

$output26 .= '

<ul';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper
$arguments27 = array();
$arguments27['value'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'attributes', $renderingContext);
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\RawViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper

$output26 .= $viewHelper29->initializeArgumentsAndRender();

$output26 .= '>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments30 = array();
$arguments30['section'] = 'itemsList';
// Rendering Array
$array31 = array();
$array31['items'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'items', $renderingContext);
$arguments30['arguments'] = $array31;
$arguments30['partial'] = NULL;
$arguments30['optional'] = false;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper33->setArguments($arguments30);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output26 .= $viewHelper33->initializeArgumentsAndRender();

$output26 .= '
</ul>

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments34 = array();
$arguments34['name'] = 'itemsList';
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
$output36 = '';

$output36 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments37 = array();
$arguments37['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'items', $renderingContext);
$arguments37['as'] = 'item';
$arguments37['key'] = '';
$arguments37['reverse'] = false;
$arguments37['iteration'] = NULL;
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
$output39 = '';

$output39 .= '
		<li';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper
$arguments40 = array();
$arguments40['value'] = NULL;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\TypoScript\ViewHelpers\RenderViewHelper
$arguments42 = array();
$output43 = '';

$output43 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.state', $renderingContext);

$output43 .= '.attributes';
$arguments42['path'] = $output43;
// Rendering Array
$array44 = array();
$array44['item'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item', $renderingContext);
$arguments42['context'] = $array44;
$arguments42['typoScriptPackageKey'] = NULL;
$arguments42['typoScriptFilePathPattern'] = NULL;
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'TYPO3\TypoScript\ViewHelpers\RenderViewHelper');
$viewHelper46->setArguments($arguments42);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper TYPO3\TypoScript\ViewHelpers\RenderViewHelper
return $viewHelper46->initializeArgumentsAndRender();
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\RawViewHelper');
$viewHelper47->setArguments($arguments40);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper

$output39 .= $viewHelper47->initializeArgumentsAndRender();

$output39 .= '>
		';
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Link\NodeViewHelper
$arguments48 = array();
$arguments48['node'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.node', $renderingContext);
$arguments48['additionalAttributes'] = NULL;
$arguments48['data'] = NULL;
$arguments48['format'] = NULL;
$arguments48['absolute'] = false;
$arguments48['baseNodeName'] = 'documentNode';
$arguments48['arguments'] = array (
);
$arguments48['section'] = '';
$arguments48['addQueryString'] = false;
$arguments48['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments48['class'] = NULL;
$arguments48['dir'] = NULL;
$arguments48['id'] = NULL;
$arguments48['lang'] = NULL;
$arguments48['style'] = NULL;
$arguments48['title'] = NULL;
$arguments48['accesskey'] = NULL;
$arguments48['tabindex'] = NULL;
$arguments48['onclick'] = NULL;
$arguments48['name'] = NULL;
$arguments48['rel'] = NULL;
$arguments48['rev'] = NULL;
$arguments48['target'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments50 = array();
$arguments50['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.label', $renderingContext);
$arguments50['keepQuotes'] = false;
$arguments50['encoding'] = 'UTF-8';
$arguments50['doubleEncode'] = true;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return NULL;
};
$value52 = ($arguments50['value'] !== NULL ? $arguments50['value'] : $renderChildrenClosure51());
return !is_string($value52) && !(is_object($value52) && method_exists($value52, '__toString')) ? $value52 : htmlspecialchars($value52, ($arguments50['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments50['encoding'], $arguments50['doubleEncode']);
};
$viewHelper53 = $self->getViewHelper('$viewHelper53', $renderingContext, 'TYPO3\Neos\ViewHelpers\Link\NodeViewHelper');
$viewHelper53->setArguments($arguments48);
$viewHelper53->setRenderingContext($renderingContext);
$viewHelper53->setRenderChildrenClosure($renderChildrenClosure49);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Link\NodeViewHelper

$output39 .= $viewHelper53->initializeArgumentsAndRender();

$output39 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments54 = array();
// Rendering Boolean node
$arguments54['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.subItems', $renderingContext));
$arguments54['then'] = NULL;
$arguments54['else'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
$output56 = '';

$output56 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments57 = array();
$arguments57['section'] = 'itemsList';
// Rendering Array
$array58 = array();
$array58['items'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.subItems', $renderingContext);
$arguments57['arguments'] = $array58;
$arguments57['partial'] = NULL;
$arguments57['optional'] = false;
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper60->setArguments($arguments57);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output56 .= $viewHelper60->initializeArgumentsAndRender();

$output56 .= '
			</ul>
		';
return $output56;
};
$viewHelper61 = $self->getViewHelper('$viewHelper61', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper61->setArguments($arguments54);
$viewHelper61->setRenderingContext($renderingContext);
$viewHelper61->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output39 .= $viewHelper61->initializeArgumentsAndRender();

$output39 .= '
		</li>
	';
return $output39;
};

$output36 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments37, $renderChildrenClosure38, $renderingContext);

$output36 .= '
';
return $output36;
};

$output26 .= '';

$output26 .= '
';

return $output26;
}


}
#0             16503     