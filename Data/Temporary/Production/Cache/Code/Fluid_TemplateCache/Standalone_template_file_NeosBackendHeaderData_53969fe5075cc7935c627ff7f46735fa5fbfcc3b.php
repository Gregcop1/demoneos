<?php class FluidCache_Standalone_template_file_NeosBackendHeaderData_53969fe5075cc7935c627ff7f46735fa5fbfcc3b extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfAccessViewHelper
$arguments4 = array();
$arguments4['resource'] = 'TYPO3_Neos_Backend_GeneralAccess';
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
		<script type="text/javascript">
					// TODO Get rid of those global variables
				';
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Backend\JavascriptConfigurationViewHelper
$arguments7 = array();
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Neos\ViewHelpers\Backend\JavascriptConfigurationViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Backend\JavascriptConfigurationViewHelper

$output6 .= $viewHelper9->initializeArgumentsAndRender();

$output6 .= '
				var Aloha,
					alohaBaseUrl = \'';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments10 = array();
$arguments10['path'] = 'Library/aloha';
$arguments10['package'] = 'TYPO3.Neos';
$arguments10['resource'] = NULL;
$arguments10['localize'] = true;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output6 .= $viewHelper12->initializeArgumentsAndRender();

$output6 .= '\';
		</script>

		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments13 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Backend\ShouldLoadMinifiedJavascriptViewHelper
$arguments14 = array();
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\Neos\ViewHelpers\Backend\ShouldLoadMinifiedJavascriptViewHelper');
$viewHelper16->setArguments($arguments14);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Backend\ShouldLoadMinifiedJavascriptViewHelper
$arguments13['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper16->initializeArgumentsAndRender());
$arguments13['then'] = NULL;
$arguments13['else'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
$output18 = '';

$output18 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments19 = array();
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
$output21 = '';

$output21 .= '
				<link rel="stylesheet" type="text/css" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments22 = array();
$arguments22['path'] = 'Styles/Includes-built.css';
$arguments22['package'] = 'TYPO3.Neos';
$arguments22['resource'] = NULL;
$arguments22['localize'] = true;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper24->setArguments($arguments22);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output21 .= $viewHelper24->initializeArgumentsAndRender();

$output21 .= '" />
			';
return $output21;
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper25->setArguments($arguments19);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output18 .= $viewHelper25->initializeArgumentsAndRender();

$output18 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments26 = array();
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
				<link rel="stylesheet" type="text/css" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments29 = array();
$arguments29['path'] = 'Styles/Includes.css';
$arguments29['package'] = 'TYPO3.Neos';
$arguments29['resource'] = NULL;
$arguments29['localize'] = true;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper31 = $self->getViewHelper('$viewHelper31', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper31->setArguments($arguments29);
$viewHelper31->setRenderingContext($renderingContext);
$viewHelper31->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output28 .= $viewHelper31->initializeArgumentsAndRender();

$output28 .= '" />
			';
return $output28;
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper32->setArguments($arguments26);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output18 .= $viewHelper32->initializeArgumentsAndRender();

$output18 .= '
		';
return $output18;
};
$arguments13['__thenClosure'] = function() use ($renderingContext, $self) {
$output33 = '';

$output33 .= '
				<link rel="stylesheet" type="text/css" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments34 = array();
$arguments34['path'] = 'Styles/Includes-built.css';
$arguments34['package'] = 'TYPO3.Neos';
$arguments34['resource'] = NULL;
$arguments34['localize'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper36 = $self->getViewHelper('$viewHelper36', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper36->setArguments($arguments34);
$viewHelper36->setRenderingContext($renderingContext);
$viewHelper36->setRenderChildrenClosure($renderChildrenClosure35);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output33 .= $viewHelper36->initializeArgumentsAndRender();

$output33 .= '" />
			';
return $output33;
};
$arguments13['__elseClosure'] = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
				<link rel="stylesheet" type="text/css" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments38 = array();
$arguments38['path'] = 'Styles/Includes.css';
$arguments38['package'] = 'TYPO3.Neos';
$arguments38['resource'] = NULL;
$arguments38['localize'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper40 = $self->getViewHelper('$viewHelper40', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper40->setArguments($arguments38);
$viewHelper40->setRenderingContext($renderingContext);
$viewHelper40->setRenderChildrenClosure($renderChildrenClosure39);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output37 .= $viewHelper40->initializeArgumentsAndRender();

$output37 .= '" />
			';
return $output37;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper41->setArguments($arguments13);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output6 .= $viewHelper41->initializeArgumentsAndRender();

$output6 .= '
	';
return $output6;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfAccessViewHelper');
$viewHelper42->setArguments($arguments4);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfAccessViewHelper

$output3 .= $viewHelper42->initializeArgumentsAndRender();

$output3 .= '
';
return $output3;
};
$viewHelper43 = $self->getViewHelper('$viewHelper43', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper43->setArguments($arguments1);
$viewHelper43->setRenderingContext($renderingContext);
$viewHelper43->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper43->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}


}
#0             10340     