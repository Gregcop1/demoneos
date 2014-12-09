<?php class FluidCache_Standalone_template_file_NeosBackendEndpoints_efc0f5eef2b595c258f779608ade125f404dd2e0 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
		<meta name="neos-workspace" content="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments7 = array();
$arguments7['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node.context.workspace.name', $renderingContext);
$arguments7['keepQuotes'] = false;
$arguments7['encoding'] = 'UTF-8';
$arguments7['doubleEncode'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$value9 = ($arguments7['value'] !== NULL ? $arguments7['value'] : $renderChildrenClosure8());

$output6 .= !is_string($value9) && !(is_object($value9) && method_exists($value9, '__toString')) ? $value9 : htmlspecialchars($value9, ($arguments7['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments7['encoding'], $arguments7['doubleEncode']);

$output6 .= '" />
		<meta name="neos-csrf-token" content="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\CsrfTokenViewHelper
$arguments10 = array();
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\CsrfTokenViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\CsrfTokenViewHelper

$output6 .= $viewHelper12->initializeArgumentsAndRender();

$output6 .= '" />

		<link rel="neos-site" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments13 = array();
$arguments13['action'] = 'show';
$arguments13['controller'] = 'Frontend\\Node';
$arguments13['package'] = 'TYPO3.Neos';
$arguments13['format'] = 'html';
// Rendering Array
$array14 = array();
$array14['node'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node.context.currentSiteNode', $renderingContext);
$arguments13['arguments'] = $array14;
// Rendering Boolean node
$arguments13['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments13['subpackage'] = NULL;
$arguments13['section'] = '';
$arguments13['additionalParams'] = array (
);
$arguments13['addQueryString'] = false;
$arguments13['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments13['useParentRequest'] = false;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper16->setArguments($arguments13);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper16->initializeArgumentsAndRender();

$output6 .= '" />
		<link type="application/vnd.typo3.neos.nodes" data-current-workspace="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments17 = array();
$arguments17['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'node.context.workspace.name', $renderingContext);
$arguments17['keepQuotes'] = false;
$arguments17['encoding'] = 'UTF-8';
$arguments17['doubleEncode'] = true;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};
$value19 = ($arguments17['value'] !== NULL ? $arguments17['value'] : $renderChildrenClosure18());

$output6 .= !is_string($value19) && !(is_object($value19) && method_exists($value19, '__toString')) ? $value19 : htmlspecialchars($value19, ($arguments17['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments17['encoding'], $arguments17['doubleEncode']);

$output6 .= '" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments20 = array();
$arguments20['action'] = 'index';
$arguments20['controller'] = 'Service\\Node';
$arguments20['package'] = 'TYPO3.Neos';
$arguments20['format'] = 'html';
// Rendering Boolean node
$arguments20['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments20['arguments'] = array (
);
$arguments20['subpackage'] = NULL;
$arguments20['section'] = '';
$arguments20['additionalParams'] = array (
);
$arguments20['addQueryString'] = false;
$arguments20['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments20['useParentRequest'] = false;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper22->setArguments($arguments20);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure21);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper22->initializeArgumentsAndRender();

$output6 .= '" />

		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\AliasViewHelper
$arguments23 = array();
// Rendering Array
$array24 = array();
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Backend\ConfigurationCacheVersionViewHelper
$arguments25 = array();
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Neos\ViewHelpers\Backend\ConfigurationCacheVersionViewHelper');
$viewHelper27->setArguments($arguments25);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Backend\ConfigurationCacheVersionViewHelper
$array24['configurationCacheIdentifier'] = $viewHelper27->initializeArgumentsAndRender();
$arguments23['map'] = $array24;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
$output29 = '';

$output29 .= '
			<link rel="neos-vieschema" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments30 = array();
$arguments30['action'] = 'vieSchema';
$arguments30['controller'] = 'Backend\\Schema';
$arguments30['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments30['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
// Rendering Array
$array31 = array();
$array31['version'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configurationCacheIdentifier', $renderingContext);
$arguments30['arguments'] = $array31;
$arguments30['subpackage'] = NULL;
$arguments30['section'] = '';
$arguments30['format'] = '';
$arguments30['additionalParams'] = array (
);
$arguments30['addQueryString'] = false;
$arguments30['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments30['useParentRequest'] = false;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper33->setArguments($arguments30);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output29 .= $viewHelper33->initializeArgumentsAndRender();

$output29 .= '" />
			<link rel="neos-nodetypeschema" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments34 = array();
$arguments34['action'] = 'nodeTypeSchema';
$arguments34['controller'] = 'Backend\\Schema';
$arguments34['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments34['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
// Rendering Array
$array35 = array();
$array35['version'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configurationCacheIdentifier', $renderingContext);
$arguments34['arguments'] = $array35;
$arguments34['subpackage'] = NULL;
$arguments34['section'] = '';
$arguments34['format'] = '';
$arguments34['additionalParams'] = array (
);
$arguments34['addQueryString'] = false;
$arguments34['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments34['useParentRequest'] = false;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper37->setArguments($arguments34);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output29 .= $viewHelper37->initializeArgumentsAndRender();

$output29 .= '" />
			<link rel="neos-menudata" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments38 = array();
$arguments38['action'] = 'index';
$arguments38['controller'] = 'Backend\\Menu';
$arguments38['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments38['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
// Rendering Array
$array39 = array();
$array39['version'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configurationCacheIdentifier', $renderingContext);
$arguments38['arguments'] = $array39;
$arguments38['subpackage'] = NULL;
$arguments38['section'] = '';
$arguments38['format'] = '';
$arguments38['additionalParams'] = array (
);
$arguments38['addQueryString'] = false;
$arguments38['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments38['useParentRequest'] = false;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper41->setArguments($arguments38);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output29 .= $viewHelper41->initializeArgumentsAndRender();

$output29 .= '" />
			<link rel="neos-editpreviewdata" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments42 = array();
$arguments42['action'] = 'editPreview';
$arguments42['controller'] = 'Backend\\Settings';
$arguments42['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments42['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
// Rendering Array
$array43 = array();
$array43['version'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configurationCacheIdentifier', $renderingContext);
$arguments42['arguments'] = $array43;
$arguments42['subpackage'] = NULL;
$arguments42['section'] = '';
$arguments42['format'] = '';
$arguments42['additionalParams'] = array (
);
$arguments42['addQueryString'] = false;
$arguments42['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments42['useParentRequest'] = false;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper45 = $self->getViewHelper('$viewHelper45', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper45->setArguments($arguments42);
$viewHelper45->setRenderingContext($renderingContext);
$viewHelper45->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output29 .= $viewHelper45->initializeArgumentsAndRender();

$output29 .= '" />
			<link rel="neos-dimensionpresetsdata" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments46 = array();
$arguments46['action'] = 'dimensionPresets';
$arguments46['controller'] = 'Backend\\Settings';
$arguments46['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments46['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
// Rendering Array
$array47 = array();
$array47['version'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configurationCacheIdentifier', $renderingContext);
$arguments46['arguments'] = $array47;
$arguments46['subpackage'] = NULL;
$arguments46['section'] = '';
$arguments46['format'] = '';
$arguments46['additionalParams'] = array (
);
$arguments46['addQueryString'] = false;
$arguments46['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments46['useParentRequest'] = false;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper49->setArguments($arguments46);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure48);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output29 .= $viewHelper49->initializeArgumentsAndRender();

$output29 .= '" />
		';
return $output29;
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\AliasViewHelper');
$viewHelper50->setArguments($arguments23);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\AliasViewHelper

$output6 .= $viewHelper50->initializeArgumentsAndRender();

$output6 .= '

		<!-- Temporary URL endpoints, will be removed / grouped when a REST interface is fully implemented -->
		<link rel="neos-service-workspace-publishNode" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments51 = array();
$arguments51['action'] = 'publishNode';
$arguments51['controller'] = 'Workspace';
$arguments51['package'] = 'TYPO3.Neos';
$arguments51['subpackage'] = 'Service';
// Rendering Boolean node
$arguments51['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments51['arguments'] = array (
);
$arguments51['section'] = '';
$arguments51['format'] = '';
$arguments51['additionalParams'] = array (
);
$arguments51['addQueryString'] = false;
$arguments51['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments51['useParentRequest'] = false;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper53 = $self->getViewHelper('$viewHelper53', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper53->setArguments($arguments51);
$viewHelper53->setRenderingContext($renderingContext);
$viewHelper53->setRenderChildrenClosure($renderChildrenClosure52);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper53->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-publishNodes" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments54 = array();
$arguments54['action'] = 'publishNodes';
$arguments54['controller'] = 'Workspace';
$arguments54['package'] = 'TYPO3.Neos';
$arguments54['subpackage'] = 'Service';
// Rendering Boolean node
$arguments54['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments54['arguments'] = array (
);
$arguments54['section'] = '';
$arguments54['format'] = '';
$arguments54['additionalParams'] = array (
);
$arguments54['addQueryString'] = false;
$arguments54['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments54['useParentRequest'] = false;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper56->setArguments($arguments54);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper56->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-publishAll" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments57 = array();
$arguments57['action'] = 'publishAll';
$arguments57['controller'] = 'Workspace';
$arguments57['package'] = 'TYPO3.Neos';
$arguments57['subpackage'] = 'Service';
// Rendering Boolean node
$arguments57['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments57['arguments'] = array (
);
$arguments57['section'] = '';
$arguments57['format'] = '';
$arguments57['additionalParams'] = array (
);
$arguments57['addQueryString'] = false;
$arguments57['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments57['useParentRequest'] = false;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper59->setArguments($arguments57);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper59->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-discardNode" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments60 = array();
$arguments60['action'] = 'discardNode';
$arguments60['controller'] = 'Workspace';
$arguments60['package'] = 'TYPO3.Neos';
$arguments60['subpackage'] = 'Service';
// Rendering Boolean node
$arguments60['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments60['arguments'] = array (
);
$arguments60['section'] = '';
$arguments60['format'] = '';
$arguments60['additionalParams'] = array (
);
$arguments60['addQueryString'] = false;
$arguments60['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments60['useParentRequest'] = false;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper62->setArguments($arguments60);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure61);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper62->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-discardNodes" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments63 = array();
$arguments63['action'] = 'discardNodes';
$arguments63['controller'] = 'Workspace';
$arguments63['package'] = 'TYPO3.Neos';
$arguments63['subpackage'] = 'Service';
// Rendering Boolean node
$arguments63['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments63['arguments'] = array (
);
$arguments63['section'] = '';
$arguments63['format'] = '';
$arguments63['additionalParams'] = array (
);
$arguments63['addQueryString'] = false;
$arguments63['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments63['useParentRequest'] = false;
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper65->setArguments($arguments63);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure64);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper65->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-discardAll" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments66 = array();
$arguments66['action'] = 'discardAll';
$arguments66['controller'] = 'Workspace';
$arguments66['package'] = 'TYPO3.Neos';
$arguments66['subpackage'] = 'Service';
// Rendering Boolean node
$arguments66['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments66['arguments'] = array (
);
$arguments66['section'] = '';
$arguments66['format'] = '';
$arguments66['additionalParams'] = array (
);
$arguments66['addQueryString'] = false;
$arguments66['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments66['useParentRequest'] = false;
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper68 = $self->getViewHelper('$viewHelper68', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper68->setArguments($arguments66);
$viewHelper68->setRenderingContext($renderingContext);
$viewHelper68->setRenderChildrenClosure($renderChildrenClosure67);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper68->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-workspace-getWorkspaceWideUnpublishedNodes" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments69 = array();
$arguments69['action'] = 'getWorkspaceWideUnpublishedNodes';
$arguments69['controller'] = 'Workspace';
$arguments69['package'] = 'TYPO3.Neos';
$arguments69['subpackage'] = 'Service';
// Rendering Boolean node
$arguments69['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments69['arguments'] = array (
);
$arguments69['section'] = '';
$arguments69['format'] = '';
$arguments69['additionalParams'] = array (
);
$arguments69['addQueryString'] = false;
$arguments69['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments69['useParentRequest'] = false;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper71->setArguments($arguments69);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper71->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-getChildNodesForTree" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments72 = array();
$arguments72['action'] = 'getChildNodesForTree';
$arguments72['controller'] = 'Node';
$arguments72['package'] = 'TYPO3.Neos';
$arguments72['subpackage'] = 'Service';
// Rendering Boolean node
$arguments72['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments72['arguments'] = array (
);
$arguments72['section'] = '';
$arguments72['format'] = '';
$arguments72['additionalParams'] = array (
);
$arguments72['addQueryString'] = false;
$arguments72['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments72['useParentRequest'] = false;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper74 = $self->getViewHelper('$viewHelper74', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper74->setArguments($arguments72);
$viewHelper74->setRenderingContext($renderingContext);
$viewHelper74->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper74->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-createNodeForTheTree" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments75 = array();
$arguments75['action'] = 'createNodeForTheTree';
$arguments75['controller'] = 'Node';
$arguments75['package'] = 'TYPO3.Neos';
$arguments75['subpackage'] = 'Service';
// Rendering Boolean node
$arguments75['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments75['arguments'] = array (
);
$arguments75['section'] = '';
$arguments75['format'] = '';
$arguments75['additionalParams'] = array (
);
$arguments75['addQueryString'] = false;
$arguments75['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments75['useParentRequest'] = false;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper77 = $self->getViewHelper('$viewHelper77', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper77->setArguments($arguments75);
$viewHelper77->setRenderingContext($renderingContext);
$viewHelper77->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper77->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-filterChildNodesForTree" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments78 = array();
$arguments78['action'] = 'filterChildNodesForTree';
$arguments78['controller'] = 'Node';
$arguments78['package'] = 'TYPO3.Neos';
$arguments78['subpackage'] = 'Service';
// Rendering Boolean node
$arguments78['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments78['arguments'] = array (
);
$arguments78['section'] = '';
$arguments78['format'] = '';
$arguments78['additionalParams'] = array (
);
$arguments78['addQueryString'] = false;
$arguments78['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments78['useParentRequest'] = false;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper80 = $self->getViewHelper('$viewHelper80', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper80->setArguments($arguments78);
$viewHelper80->setRenderingContext($renderingContext);
$viewHelper80->setRenderChildrenClosure($renderChildrenClosure79);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper80->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-create" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments81 = array();
$arguments81['action'] = 'create';
$arguments81['controller'] = 'Node';
$arguments81['package'] = 'TYPO3.Neos';
$arguments81['subpackage'] = 'Service';
// Rendering Boolean node
$arguments81['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments81['arguments'] = array (
);
$arguments81['section'] = '';
$arguments81['format'] = '';
$arguments81['additionalParams'] = array (
);
$arguments81['addQueryString'] = false;
$arguments81['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments81['useParentRequest'] = false;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper83 = $self->getViewHelper('$viewHelper83', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper83->setArguments($arguments81);
$viewHelper83->setRenderingContext($renderingContext);
$viewHelper83->setRenderChildrenClosure($renderChildrenClosure82);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper83->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-createAndRender" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments84 = array();
$arguments84['action'] = 'createAndRender';
$arguments84['controller'] = 'Node';
$arguments84['package'] = 'TYPO3.Neos';
$arguments84['subpackage'] = 'Service';
// Rendering Boolean node
$arguments84['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments84['arguments'] = array (
);
$arguments84['section'] = '';
$arguments84['format'] = '';
$arguments84['additionalParams'] = array (
);
$arguments84['addQueryString'] = false;
$arguments84['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments84['useParentRequest'] = false;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper86 = $self->getViewHelper('$viewHelper86', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper86->setArguments($arguments84);
$viewHelper86->setRenderingContext($renderingContext);
$viewHelper86->setRenderChildrenClosure($renderChildrenClosure85);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper86->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-move" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments87 = array();
$arguments87['action'] = 'move';
$arguments87['controller'] = 'Node';
$arguments87['package'] = 'TYPO3.Neos';
$arguments87['subpackage'] = 'Service';
// Rendering Boolean node
$arguments87['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments87['arguments'] = array (
);
$arguments87['section'] = '';
$arguments87['format'] = '';
$arguments87['additionalParams'] = array (
);
$arguments87['addQueryString'] = false;
$arguments87['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments87['useParentRequest'] = false;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper89->setArguments($arguments87);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure88);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper89->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-copy" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments90 = array();
$arguments90['action'] = 'copy';
$arguments90['controller'] = 'Node';
$arguments90['package'] = 'TYPO3.Neos';
$arguments90['subpackage'] = 'Service';
// Rendering Boolean node
$arguments90['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments90['arguments'] = array (
);
$arguments90['section'] = '';
$arguments90['format'] = '';
$arguments90['additionalParams'] = array (
);
$arguments90['addQueryString'] = false;
$arguments90['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments90['useParentRequest'] = false;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper92->setArguments($arguments90);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper92->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-update" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments93 = array();
$arguments93['action'] = 'update';
$arguments93['controller'] = 'Node';
$arguments93['package'] = 'TYPO3.Neos';
$arguments93['subpackage'] = 'Service';
// Rendering Boolean node
$arguments93['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments93['arguments'] = array (
);
$arguments93['section'] = '';
$arguments93['format'] = '';
$arguments93['additionalParams'] = array (
);
$arguments93['addQueryString'] = false;
$arguments93['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments93['useParentRequest'] = false;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper95 = $self->getViewHelper('$viewHelper95', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper95->setArguments($arguments93);
$viewHelper95->setRenderingContext($renderingContext);
$viewHelper95->setRenderChildrenClosure($renderChildrenClosure94);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper95->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-delete" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments96 = array();
$arguments96['action'] = 'delete';
$arguments96['controller'] = 'Node';
$arguments96['package'] = 'TYPO3.Neos';
$arguments96['subpackage'] = 'Service';
// Rendering Boolean node
$arguments96['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments96['arguments'] = array (
);
$arguments96['section'] = '';
$arguments96['format'] = '';
$arguments96['additionalParams'] = array (
);
$arguments96['addQueryString'] = false;
$arguments96['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments96['useParentRequest'] = false;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper98 = $self->getViewHelper('$viewHelper98', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper98->setArguments($arguments96);
$viewHelper98->setRenderingContext($renderingContext);
$viewHelper98->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper98->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-searchPage" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments99 = array();
$arguments99['action'] = 'searchPage';
$arguments99['controller'] = 'Node';
$arguments99['package'] = 'TYPO3.Neos';
$arguments99['subpackage'] = 'Service';
// Rendering Boolean node
$arguments99['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments99['arguments'] = array (
);
$arguments99['section'] = '';
$arguments99['format'] = '';
$arguments99['additionalParams'] = array (
);
$arguments99['addQueryString'] = false;
$arguments99['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments99['useParentRequest'] = false;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper101->setArguments($arguments99);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper101->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-service-node-getPageByNodePath" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments102 = array();
$arguments102['action'] = 'getPageByNodePath';
$arguments102['controller'] = 'Node';
$arguments102['package'] = 'TYPO3.Neos';
$arguments102['subpackage'] = 'Service';
// Rendering Boolean node
$arguments102['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments102['arguments'] = array (
);
$arguments102['section'] = '';
$arguments102['format'] = '';
$arguments102['additionalParams'] = array (
);
$arguments102['addQueryString'] = false;
$arguments102['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments102['useParentRequest'] = false;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper104->setArguments($arguments102);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure103);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper104->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-images" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments105 = array();
$arguments105['action'] = 'imageWithMetadata';
$arguments105['controller'] = 'Backend\\Content';
$arguments105['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments105['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments105['arguments'] = array (
);
$arguments105['subpackage'] = NULL;
$arguments105['section'] = '';
$arguments105['format'] = '';
$arguments105['additionalParams'] = array (
);
$arguments105['addQueryString'] = false;
$arguments105['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments105['useParentRequest'] = false;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper107 = $self->getViewHelper('$viewHelper107', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper107->setArguments($arguments105);
$viewHelper107->setRenderingContext($renderingContext);
$viewHelper107->setRenderChildrenClosure($renderChildrenClosure106);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper107->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-asset-upload" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments108 = array();
$arguments108['action'] = 'uploadAsset';
$arguments108['controller'] = 'Backend\\Content';
$arguments108['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments108['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments108['arguments'] = array (
);
$arguments108['subpackage'] = NULL;
$arguments108['section'] = '';
$arguments108['format'] = '';
$arguments108['additionalParams'] = array (
);
$arguments108['addQueryString'] = false;
$arguments108['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments108['useParentRequest'] = false;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper110->setArguments($arguments108);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure109);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper110->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-asset-metadata" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments111 = array();
$arguments111['action'] = 'assetsWithMetadata';
$arguments111['controller'] = 'Backend\\Content';
$arguments111['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments111['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments111['arguments'] = array (
);
$arguments111['subpackage'] = NULL;
$arguments111['section'] = '';
$arguments111['format'] = '';
$arguments111['additionalParams'] = array (
);
$arguments111['addQueryString'] = false;
$arguments111['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments111['useParentRequest'] = false;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper113->setArguments($arguments111);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper113->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-pluginviews" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments114 = array();
$arguments114['action'] = 'pluginViews';
$arguments114['controller'] = 'Backend\\Content';
$arguments114['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments114['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments114['arguments'] = array (
);
$arguments114['subpackage'] = NULL;
$arguments114['section'] = '';
$arguments114['format'] = '';
$arguments114['additionalParams'] = array (
);
$arguments114['addQueryString'] = false;
$arguments114['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments114['useParentRequest'] = false;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper116->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-masterplugins" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments117 = array();
$arguments117['action'] = 'masterPlugins';
$arguments117['controller'] = 'Backend\\Content';
$arguments117['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments117['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments117['arguments'] = array (
);
$arguments117['subpackage'] = NULL;
$arguments117['section'] = '';
$arguments117['format'] = '';
$arguments117['additionalParams'] = array (
);
$arguments117['addQueryString'] = false;
$arguments117['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments117['useParentRequest'] = false;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper119->setArguments($arguments117);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper119->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-user-preferences" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments120 = array();
$arguments120['action'] = 'index';
$arguments120['controller'] = 'UserPreference';
$arguments120['package'] = 'TYPO3.Neos';
$arguments120['subpackage'] = 'Service';
// Rendering Boolean node
$arguments120['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments120['arguments'] = array (
);
$arguments120['section'] = '';
$arguments120['format'] = '';
$arguments120['additionalParams'] = array (
);
$arguments120['addQueryString'] = false;
$arguments120['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments120['useParentRequest'] = false;
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper122 = $self->getViewHelper('$viewHelper122', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper122->setArguments($arguments120);
$viewHelper122->setRenderingContext($renderingContext);
$viewHelper122->setRenderChildrenClosure($renderChildrenClosure121);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper122->initializeArgumentsAndRender();

$output6 .= '" />
		<!-- /Temporary URL endpoints -->

		<link rel="neos-nodes" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments123 = array();
$arguments123['action'] = 'index';
$arguments123['controller'] = 'Service\\Node';
$arguments123['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments123['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments123['arguments'] = array (
);
$arguments123['subpackage'] = NULL;
$arguments123['section'] = '';
$arguments123['format'] = '';
$arguments123['additionalParams'] = array (
);
$arguments123['addQueryString'] = false;
$arguments123['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments123['useParentRequest'] = false;
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper125 = $self->getViewHelper('$viewHelper125', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper125->setArguments($arguments123);
$viewHelper125->setRenderingContext($renderingContext);
$viewHelper125->setRenderChildrenClosure($renderChildrenClosure124);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper125->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-assets" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments126 = array();
$arguments126['action'] = 'index';
$arguments126['controller'] = 'Asset';
$arguments126['package'] = 'TYPO3.Neos';
$arguments126['subpackage'] = 'Service';
// Rendering Boolean node
$arguments126['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments126['arguments'] = array (
);
$arguments126['section'] = '';
$arguments126['format'] = '';
$arguments126['additionalParams'] = array (
);
$arguments126['addQueryString'] = false;
$arguments126['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments126['useParentRequest'] = false;
$renderChildrenClosure127 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper128 = $self->getViewHelper('$viewHelper128', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper128->setArguments($arguments126);
$viewHelper128->setRenderingContext($renderingContext);
$viewHelper128->setRenderChildrenClosure($renderChildrenClosure127);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper128->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-public-resources" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments129 = array();
$arguments129['path'] = '';
$arguments129['package'] = 'TYPO3.Neos';
$arguments129['resource'] = NULL;
$arguments129['localize'] = true;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper131 = $self->getViewHelper('$viewHelper131', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper131->setArguments($arguments129);
$viewHelper131->setRenderingContext($renderingContext);
$viewHelper131->setRenderChildrenClosure($renderChildrenClosure130);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output6 .= $viewHelper131->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-module-workspacesmanagement" href="';
// Rendering ViewHelper TYPO3\Neos\ViewHelpers\Uri\ModuleViewHelper
$arguments132 = array();
$arguments132['path'] = 'management/workspaces';
$arguments132['action'] = NULL;
$arguments132['arguments'] = array (
);
$arguments132['section'] = '';
$arguments132['format'] = '';
$arguments132['additionalParams'] = array (
);
$arguments132['addQueryString'] = false;
$arguments132['argumentsToBeExcludedFromQueryString'] = array (
);
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper134 = $self->getViewHelper('$viewHelper134', $renderingContext, 'TYPO3\Neos\ViewHelpers\Uri\ModuleViewHelper');
$viewHelper134->setArguments($arguments132);
$viewHelper134->setRenderingContext($renderingContext);
$viewHelper134->setRenderChildrenClosure($renderChildrenClosure133);
// End of ViewHelper TYPO3\Neos\ViewHelpers\Uri\ModuleViewHelper

$output6 .= $viewHelper134->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-media-browser" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments135 = array();
$arguments135['action'] = 'index';
$arguments135['controller'] = 'Backend\\MediaBrowser';
$arguments135['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments135['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments135['arguments'] = array (
);
$arguments135['subpackage'] = NULL;
$arguments135['section'] = '';
$arguments135['format'] = '';
$arguments135['additionalParams'] = array (
);
$arguments135['addQueryString'] = false;
$arguments135['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments135['useParentRequest'] = false;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper137 = $self->getViewHelper('$viewHelper137', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper137->setArguments($arguments135);
$viewHelper137->setRenderingContext($renderingContext);
$viewHelper137->setRenderChildrenClosure($renderChildrenClosure136);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper137->initializeArgumentsAndRender();

$output6 .= '" />
		<link rel="neos-image-browser" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments138 = array();
$arguments138['action'] = 'index';
$arguments138['controller'] = 'Backend\\ImageBrowser';
$arguments138['package'] = 'TYPO3.Neos';
// Rendering Boolean node
$arguments138['absolute'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'true', $renderingContext));
$arguments138['arguments'] = array (
);
$arguments138['subpackage'] = NULL;
$arguments138['section'] = '';
$arguments138['format'] = '';
$arguments138['additionalParams'] = array (
);
$arguments138['addQueryString'] = false;
$arguments138['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments138['useParentRequest'] = false;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper140 = $self->getViewHelper('$viewHelper140', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper140->setArguments($arguments138);
$viewHelper140->setRenderingContext($renderingContext);
$viewHelper140->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ActionViewHelper

$output6 .= $viewHelper140->initializeArgumentsAndRender();

$output6 .= '" />
	';
return $output6;
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfAccessViewHelper');
$viewHelper141->setArguments($arguments4);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfAccessViewHelper

$output3 .= $viewHelper141->initializeArgumentsAndRender();

$output3 .= '
';
return $output3;
};
$viewHelper142 = $self->getViewHelper('$viewHelper142', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper142->setArguments($arguments1);
$viewHelper142->setRenderingContext($renderingContext);
$viewHelper142->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper142->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}


}
#0             58477     