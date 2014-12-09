<?php class FluidCache_Standalone_template_file_NeosBackendContainer_f8437ec3a1f9d337544e6b49cabba40994221b9c extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('!=', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node.context.workspace.name', $renderingContext), 'live');
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
	';
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Backend\ContainerViewHelper
$arguments4 = array();
$arguments4['node'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node', $renderingContext);
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Neos\ViewHelpers\Backend\ContainerViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Backend\ContainerViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '
';
return $output3;
};
$viewHelper7 = $self->getViewHelper('$viewHelper7', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper7->setArguments($arguments1);
$viewHelper7->setRenderingContext($renderingContext);
$viewHelper7->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper7->initializeArgumentsAndRender();

return $output0;
}


}
#0             2436      