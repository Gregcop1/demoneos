<?php class FluidCache_Standalone_template_file_Container_4b9a96e3df0971cabb843512e4fb2af0bbbb3a6b extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('!=', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node.context.workspace.name', $renderingContext), 'live');
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
	<!-- TODO: remove this from HTML as it should not be shown in preview mode for example, this causes \'flickering\' -->
	<div id="neos-application" class="neos" role="application">
		<div id="neos-top-bar">
			<div id="neos-top-bar-right">
				<div id="neos-user-actions">
					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments4 = array();
$arguments4['partial'] = 'Backend/UserMenu';
$arguments4['arguments'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), '_all', $renderingContext);
$arguments4['section'] = NULL;
$arguments4['optional'] = false;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '
				</div>
			</div>
		</div>
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments7 = array();
$arguments7['partial'] = 'Backend/Menu';
$arguments7['arguments'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), '_all', $renderingContext);
$arguments7['section'] = NULL;
$arguments7['optional'] = false;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output3 .= $viewHelper9->initializeArgumentsAndRender();

$output3 .= '
	</div>
';
return $output3;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper10->setArguments($arguments1);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper10->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}


}
#0             3704      