<?php class FluidCache_TYPO3_Neos_Login_action_index_aafba35c2f2792ea51fcc1c1089e1c4e561689c8 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section head
 */
public function section_1a954628a960aaef81d7b2d4521929579f3541e6(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	<title>TYPO3 Neos Login</title>
	<link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments1 = array();
$arguments1['path'] = 'Styles/Login.css';
$arguments1['package'] = NULL;
$arguments1['resource'] = NULL;
$arguments1['localize'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '" />
	<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments4 = array();
$arguments4['path'] = 'Library/jquery/jquery-2.0.3.js';
$arguments4['package'] = NULL;
$arguments4['resource'] = NULL;
$arguments4['localize'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper6->initializeArgumentsAndRender();

$output0 .= '"></script>
	<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments7 = array();
$arguments7['path'] = 'Library/jquery-ui/js/jquery-ui-1.10.3.custom.js';
$arguments7['package'] = NULL;
$arguments7['resource'] = NULL;
$arguments7['localize'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper9->initializeArgumentsAndRender();

$output0 .= '"></script>
';

return $output0;
}
/**
 * section body
 */
public function section_02083f4579e08a612425c0c1a17ee47add783b94(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output10 = '';

$output10 .= '
	<body class="neos">
		<div id="neos-login-box">
			<div class="neos-login-logo">
				<img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments11 = array();
$arguments11['path'] = 'Images/Login/ApplicationLogo.png';
$arguments11['package'] = NULL;
$arguments11['resource'] = NULL;
$arguments11['localize'] = true;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper13->setArguments($arguments11);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output10 .= $viewHelper13->initializeArgumentsAndRender();

$output10 .= '" alt="TYPO3 Neos" />
			</div>
			<div class="neos-login-body neos">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments14 = array();
$arguments14['name'] = 'login';
$arguments14['action'] = 'authenticate';
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['arguments'] = array (
);
$arguments14['controller'] = NULL;
$arguments14['package'] = NULL;
$arguments14['subpackage'] = NULL;
$arguments14['object'] = NULL;
$arguments14['section'] = '';
$arguments14['format'] = '';
$arguments14['additionalParams'] = array (
);
$arguments14['absolute'] = false;
$arguments14['addQueryString'] = false;
$arguments14['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments14['fieldNamePrefix'] = NULL;
$arguments14['actionUri'] = NULL;
$arguments14['objectName'] = NULL;
$arguments14['useParentRequest'] = false;
$arguments14['enctype'] = NULL;
$arguments14['method'] = NULL;
$arguments14['onreset'] = NULL;
$arguments14['onsubmit'] = NULL;
$arguments14['class'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['id'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
$output16 = '';

$output16 .= '
					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments17 = array();
$arguments17['name'] = 'lastVisitedNode';
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['value'] = NULL;
$arguments17['property'] = NULL;
$arguments17['class'] = NULL;
$arguments17['dir'] = NULL;
$arguments17['id'] = NULL;
$arguments17['lang'] = NULL;
$arguments17['style'] = NULL;
$arguments17['title'] = NULL;
$arguments17['accesskey'] = NULL;
$arguments17['tabindex'] = NULL;
$arguments17['onclick'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper19->setArguments($arguments17);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output16 .= $viewHelper19->initializeArgumentsAndRender();

$output16 .= '
					<fieldset>
						<div class="neos-controls">
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments20 = array();
$arguments20['id'] = 'username';
$arguments20['type'] = 'text';
$arguments20['placeholder'] = 'Username';
$arguments20['class'] = 'neos-span12';
$arguments20['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
// Rendering Array
$array21 = array();
$array21['autofocus'] = 'autofocus';
$arguments20['additionalAttributes'] = $array21;
$arguments20['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'username', $renderingContext);
$arguments20['data'] = NULL;
$arguments20['required'] = false;
$arguments20['property'] = NULL;
$arguments20['disabled'] = NULL;
$arguments20['maxlength'] = NULL;
$arguments20['readonly'] = NULL;
$arguments20['size'] = NULL;
$arguments20['autofocus'] = NULL;
$arguments20['errorClass'] = 'f3-form-error';
$arguments20['dir'] = NULL;
$arguments20['lang'] = NULL;
$arguments20['style'] = NULL;
$arguments20['title'] = NULL;
$arguments20['accesskey'] = NULL;
$arguments20['tabindex'] = NULL;
$arguments20['onclick'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper23->setArguments($arguments20);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output16 .= $viewHelper23->initializeArgumentsAndRender();

$output16 .= '
						</div>
						<div class="neos-controls">
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments24 = array();
$arguments24['id'] = 'password';
$arguments24['type'] = 'password';
$arguments24['placeholder'] = 'Password';
$arguments24['class'] = 'neos-span12';
$arguments24['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments24['additionalAttributes'] = NULL;
$arguments24['data'] = NULL;
$arguments24['required'] = false;
$arguments24['value'] = NULL;
$arguments24['property'] = NULL;
$arguments24['disabled'] = NULL;
$arguments24['maxlength'] = NULL;
$arguments24['readonly'] = NULL;
$arguments24['size'] = NULL;
$arguments24['autofocus'] = NULL;
$arguments24['errorClass'] = 'f3-form-error';
$arguments24['dir'] = NULL;
$arguments24['lang'] = NULL;
$arguments24['style'] = NULL;
$arguments24['title'] = NULL;
$arguments24['accesskey'] = NULL;
$arguments24['tabindex'] = NULL;
$arguments24['onclick'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper26 = $self->getViewHelper('$viewHelper26', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper26->setArguments($arguments24);
$viewHelper26->setRenderingContext($renderingContext);
$viewHelper26->setRenderChildrenClosure($renderChildrenClosure25);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output16 .= $viewHelper26->initializeArgumentsAndRender();

$output16 .= '
						</div>
						<div class="neos-actions">
							<!-- Forgot password link will be here -->
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper
$arguments27 = array();
$arguments27['type'] = 'submit';
$arguments27['class'] = 'neos-span5 neos-pull-right neos-button neos-button-primary neos-button-warning neos-login-btn';
$arguments27['additionalAttributes'] = NULL;
$arguments27['data'] = NULL;
$arguments27['name'] = NULL;
$arguments27['value'] = NULL;
$arguments27['property'] = NULL;
$arguments27['autofocus'] = NULL;
$arguments27['disabled'] = NULL;
$arguments27['form'] = NULL;
$arguments27['formaction'] = NULL;
$arguments27['formenctype'] = NULL;
$arguments27['formmethod'] = NULL;
$arguments27['formnovalidate'] = NULL;
$arguments27['formtarget'] = NULL;
$arguments27['dir'] = NULL;
$arguments27['id'] = NULL;
$arguments27['lang'] = NULL;
$arguments27['style'] = NULL;
$arguments27['title'] = NULL;
$arguments27['accesskey'] = NULL;
$arguments27['tabindex'] = NULL;
$arguments27['onclick'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return '
								Login
							';
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper

$output16 .= $viewHelper29->initializeArgumentsAndRender();

$output16 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments30 = array();
$arguments30['as'] = 'flashMessages';
$arguments30['additionalAttributes'] = NULL;
$arguments30['data'] = NULL;
$arguments30['severity'] = NULL;
$arguments30['class'] = NULL;
$arguments30['dir'] = NULL;
$arguments30['id'] = NULL;
$arguments30['lang'] = NULL;
$arguments30['style'] = NULL;
$arguments30['title'] = NULL;
$arguments30['accesskey'] = NULL;
$arguments30['tabindex'] = NULL;
$arguments30['onclick'] = NULL;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
$output32 = '';

$output32 .= '
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments33 = array();
$arguments33['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessages', $renderingContext);
$arguments33['as'] = 'flashMessage';
$arguments33['key'] = '';
$arguments33['reverse'] = false;
$arguments33['iteration'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
$output35 = '';

$output35 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments36 = array();
// Rendering Boolean node
$arguments36['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'OK');
$arguments36['then'] = NULL;
$arguments36['else'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-success">
									';
};
$viewHelper38 = $self->getViewHelper('$viewHelper38', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper38->setArguments($arguments36);
$viewHelper38->setRenderingContext($renderingContext);
$viewHelper38->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper38->initializeArgumentsAndRender();

$output35 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments39 = array();
// Rendering Boolean node
$arguments39['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Notice');
$arguments39['then'] = NULL;
$arguments39['else'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-notice">
									';
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper41->setArguments($arguments39);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper41->initializeArgumentsAndRender();

$output35 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments42 = array();
// Rendering Boolean node
$arguments42['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Warning');
$arguments42['then'] = NULL;
$arguments42['else'] = NULL;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-warning">
									';
};
$viewHelper44 = $self->getViewHelper('$viewHelper44', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper44->setArguments($arguments42);
$viewHelper44->setRenderingContext($renderingContext);
$viewHelper44->setRenderChildrenClosure($renderChildrenClosure43);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper44->initializeArgumentsAndRender();

$output35 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments45 = array();
// Rendering Boolean node
$arguments45['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Error');
$arguments45['then'] = NULL;
$arguments45['else'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
$output47 = '';

$output47 .= '
										<script>
											$(function() {
												$(\'fieldset\').effect(\'shake\', ';

$output47 .= '{times: 1}';

$output47 .= ', 60);
											});
										</script>
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-error">
									';
return $output47;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper48->setArguments($arguments45);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper48->initializeArgumentsAndRender();

$output35 .= '
										<div class="neos-tooltip-arrow"></div>
										<div class="neos-tooltip-inner">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper
$arguments49 = array();
$arguments49['value'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.message', $renderingContext);
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\RawViewHelper');
$viewHelper51->setArguments($arguments49);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper

$output35 .= $viewHelper51->initializeArgumentsAndRender();

$output35 .= '</div>
									</div>
								';
return $output35;
};

$output32 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments33, $renderChildrenClosure34, $renderingContext);

$output32 .= '
							';
return $output32;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper52->setArguments($arguments30);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output16 .= $viewHelper52->initializeArgumentsAndRender();

$output16 .= '
						</div>
					</fieldset>
				';
return $output16;
};
$viewHelper53 = $self->getViewHelper('$viewHelper53', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper53->setArguments($arguments14);
$viewHelper53->setRenderingContext($renderingContext);
$viewHelper53->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output10 .= $viewHelper53->initializeArgumentsAndRender();

$output10 .= '
			</div>
		</div>
		<div id="neos-login-footer">
			<p>
				<a href="http://neos.typo3.org" target="_blank">TYPO3 Neos</a> – © 2006-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\DateViewHelper
$arguments54 = array();
$arguments54['format'] = 'Y';
$arguments54['date'] = 'now';
$arguments54['forceLocale'] = NULL;
$arguments54['localeFormatType'] = NULL;
$arguments54['localeFormatLength'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\DateViewHelper');
$viewHelper56->setArguments($arguments54);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\DateViewHelper

$output10 .= $viewHelper56->initializeArgumentsAndRender();

$output10 .= '
				This is free software, licensed under GPL3 or higher, and you are welcome to redistribute it under certain conditions; <a href="http://typo3.org/licenses" target="_blank">click for details.</a>
				TYPO3 Neos comes with ABSOLUTELY NO WARRANTY; <a href="http://typo3.org/licenses" target="_blank">click for details.</a>
				See <a href="http://neos.typo3.org" target="_blank">neos.typo3.org</a> for more details.
				Obstructing the appearance of this notice is prohibited by law.
			</p>
		</div>
		<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments57 = array();
$arguments57['path'] = '2/js/bootstrap.min.js';
$arguments57['package'] = 'TYPO3.Twitter.Bootstrap';
$arguments57['resource'] = NULL;
$arguments57['localize'] = true;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper59->setArguments($arguments57);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output10 .= $viewHelper59->initializeArgumentsAndRender();

$output10 .= '"></script>
		<script>
			if ($(\'#username\').val()) {
				$(\'#password\').focus();
			}
			try {
				$(\'form[name="login"] input[name="lastVisitedNode"]\').val(sessionStorage.getItem(\'TYPO3.Neos.lastVisitedNode\'));
			} catch(e) {}
		</script>
	</body>
';

return $output10;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output60 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments61 = array();
$arguments61['name'] = 'Default';
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper63 = $self->getViewHelper('$viewHelper63', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper63->setArguments($arguments61);
$viewHelper63->setRenderingContext($renderingContext);
$viewHelper63->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output60 .= $viewHelper63->initializeArgumentsAndRender();

$output60 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments64 = array();
$arguments64['name'] = 'head';
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$output66 = '';

$output66 .= '
	<title>TYPO3 Neos Login</title>
	<link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments67 = array();
$arguments67['path'] = 'Styles/Login.css';
$arguments67['package'] = NULL;
$arguments67['resource'] = NULL;
$arguments67['localize'] = true;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper69 = $self->getViewHelper('$viewHelper69', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper69->setArguments($arguments67);
$viewHelper69->setRenderingContext($renderingContext);
$viewHelper69->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output66 .= $viewHelper69->initializeArgumentsAndRender();

$output66 .= '" />
	<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments70 = array();
$arguments70['path'] = 'Library/jquery/jquery-2.0.3.js';
$arguments70['package'] = NULL;
$arguments70['resource'] = NULL;
$arguments70['localize'] = true;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper72->setArguments($arguments70);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output66 .= $viewHelper72->initializeArgumentsAndRender();

$output66 .= '"></script>
	<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments73 = array();
$arguments73['path'] = 'Library/jquery-ui/js/jquery-ui-1.10.3.custom.js';
$arguments73['package'] = NULL;
$arguments73['resource'] = NULL;
$arguments73['localize'] = true;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper75->setArguments($arguments73);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure74);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output66 .= $viewHelper75->initializeArgumentsAndRender();

$output66 .= '"></script>
';
return $output66;
};

$output60 .= '';

$output60 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments76 = array();
$arguments76['name'] = 'body';
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
$output78 = '';

$output78 .= '
	<body class="neos">
		<div id="neos-login-box">
			<div class="neos-login-logo">
				<img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments79 = array();
$arguments79['path'] = 'Images/Login/ApplicationLogo.png';
$arguments79['package'] = NULL;
$arguments79['resource'] = NULL;
$arguments79['localize'] = true;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper81 = $self->getViewHelper('$viewHelper81', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper81->setArguments($arguments79);
$viewHelper81->setRenderingContext($renderingContext);
$viewHelper81->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output78 .= $viewHelper81->initializeArgumentsAndRender();

$output78 .= '" alt="TYPO3 Neos" />
			</div>
			<div class="neos-login-body neos">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments82 = array();
$arguments82['name'] = 'login';
$arguments82['action'] = 'authenticate';
$arguments82['additionalAttributes'] = NULL;
$arguments82['data'] = NULL;
$arguments82['arguments'] = array (
);
$arguments82['controller'] = NULL;
$arguments82['package'] = NULL;
$arguments82['subpackage'] = NULL;
$arguments82['object'] = NULL;
$arguments82['section'] = '';
$arguments82['format'] = '';
$arguments82['additionalParams'] = array (
);
$arguments82['absolute'] = false;
$arguments82['addQueryString'] = false;
$arguments82['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments82['fieldNamePrefix'] = NULL;
$arguments82['actionUri'] = NULL;
$arguments82['objectName'] = NULL;
$arguments82['useParentRequest'] = false;
$arguments82['enctype'] = NULL;
$arguments82['method'] = NULL;
$arguments82['onreset'] = NULL;
$arguments82['onsubmit'] = NULL;
$arguments82['class'] = NULL;
$arguments82['dir'] = NULL;
$arguments82['id'] = NULL;
$arguments82['lang'] = NULL;
$arguments82['style'] = NULL;
$arguments82['title'] = NULL;
$arguments82['accesskey'] = NULL;
$arguments82['tabindex'] = NULL;
$arguments82['onclick'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
$output84 = '';

$output84 .= '
					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments85 = array();
$arguments85['name'] = 'lastVisitedNode';
$arguments85['additionalAttributes'] = NULL;
$arguments85['data'] = NULL;
$arguments85['value'] = NULL;
$arguments85['property'] = NULL;
$arguments85['class'] = NULL;
$arguments85['dir'] = NULL;
$arguments85['id'] = NULL;
$arguments85['lang'] = NULL;
$arguments85['style'] = NULL;
$arguments85['title'] = NULL;
$arguments85['accesskey'] = NULL;
$arguments85['tabindex'] = NULL;
$arguments85['onclick'] = NULL;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper87->setArguments($arguments85);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output84 .= $viewHelper87->initializeArgumentsAndRender();

$output84 .= '
					<fieldset>
						<div class="neos-controls">
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments88 = array();
$arguments88['id'] = 'username';
$arguments88['type'] = 'text';
$arguments88['placeholder'] = 'Username';
$arguments88['class'] = 'neos-span12';
$arguments88['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
// Rendering Array
$array89 = array();
$array89['autofocus'] = 'autofocus';
$arguments88['additionalAttributes'] = $array89;
$arguments88['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'username', $renderingContext);
$arguments88['data'] = NULL;
$arguments88['required'] = false;
$arguments88['property'] = NULL;
$arguments88['disabled'] = NULL;
$arguments88['maxlength'] = NULL;
$arguments88['readonly'] = NULL;
$arguments88['size'] = NULL;
$arguments88['autofocus'] = NULL;
$arguments88['errorClass'] = 'f3-form-error';
$arguments88['dir'] = NULL;
$arguments88['lang'] = NULL;
$arguments88['style'] = NULL;
$arguments88['title'] = NULL;
$arguments88['accesskey'] = NULL;
$arguments88['tabindex'] = NULL;
$arguments88['onclick'] = NULL;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper91->setArguments($arguments88);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure90);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output84 .= $viewHelper91->initializeArgumentsAndRender();

$output84 .= '
						</div>
						<div class="neos-controls">
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments92 = array();
$arguments92['id'] = 'password';
$arguments92['type'] = 'password';
$arguments92['placeholder'] = 'Password';
$arguments92['class'] = 'neos-span12';
$arguments92['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments92['additionalAttributes'] = NULL;
$arguments92['data'] = NULL;
$arguments92['required'] = false;
$arguments92['value'] = NULL;
$arguments92['property'] = NULL;
$arguments92['disabled'] = NULL;
$arguments92['maxlength'] = NULL;
$arguments92['readonly'] = NULL;
$arguments92['size'] = NULL;
$arguments92['autofocus'] = NULL;
$arguments92['errorClass'] = 'f3-form-error';
$arguments92['dir'] = NULL;
$arguments92['lang'] = NULL;
$arguments92['style'] = NULL;
$arguments92['title'] = NULL;
$arguments92['accesskey'] = NULL;
$arguments92['tabindex'] = NULL;
$arguments92['onclick'] = NULL;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper94 = $self->getViewHelper('$viewHelper94', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper94->setArguments($arguments92);
$viewHelper94->setRenderingContext($renderingContext);
$viewHelper94->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output84 .= $viewHelper94->initializeArgumentsAndRender();

$output84 .= '
						</div>
						<div class="neos-actions">
							<!-- Forgot password link will be here -->
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper
$arguments95 = array();
$arguments95['type'] = 'submit';
$arguments95['class'] = 'neos-span5 neos-pull-right neos-button neos-button-primary neos-button-warning neos-login-btn';
$arguments95['additionalAttributes'] = NULL;
$arguments95['data'] = NULL;
$arguments95['name'] = NULL;
$arguments95['value'] = NULL;
$arguments95['property'] = NULL;
$arguments95['autofocus'] = NULL;
$arguments95['disabled'] = NULL;
$arguments95['form'] = NULL;
$arguments95['formaction'] = NULL;
$arguments95['formenctype'] = NULL;
$arguments95['formmethod'] = NULL;
$arguments95['formnovalidate'] = NULL;
$arguments95['formtarget'] = NULL;
$arguments95['dir'] = NULL;
$arguments95['id'] = NULL;
$arguments95['lang'] = NULL;
$arguments95['style'] = NULL;
$arguments95['title'] = NULL;
$arguments95['accesskey'] = NULL;
$arguments95['tabindex'] = NULL;
$arguments95['onclick'] = NULL;
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
return '
								Login
							';
};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper');
$viewHelper97->setArguments($arguments95);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure96);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\ButtonViewHelper

$output84 .= $viewHelper97->initializeArgumentsAndRender();

$output84 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments98 = array();
$arguments98['as'] = 'flashMessages';
$arguments98['additionalAttributes'] = NULL;
$arguments98['data'] = NULL;
$arguments98['severity'] = NULL;
$arguments98['class'] = NULL;
$arguments98['dir'] = NULL;
$arguments98['id'] = NULL;
$arguments98['lang'] = NULL;
$arguments98['style'] = NULL;
$arguments98['title'] = NULL;
$arguments98['accesskey'] = NULL;
$arguments98['tabindex'] = NULL;
$arguments98['onclick'] = NULL;
$renderChildrenClosure99 = function() use ($renderingContext, $self) {
$output100 = '';

$output100 .= '
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments101 = array();
$arguments101['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessages', $renderingContext);
$arguments101['as'] = 'flashMessage';
$arguments101['key'] = '';
$arguments101['reverse'] = false;
$arguments101['iteration'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments104 = array();
// Rendering Boolean node
$arguments104['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'OK');
$arguments104['then'] = NULL;
$arguments104['else'] = NULL;
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-success">
									';
};
$viewHelper106 = $self->getViewHelper('$viewHelper106', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper106->setArguments($arguments104);
$viewHelper106->setRenderingContext($renderingContext);
$viewHelper106->setRenderChildrenClosure($renderChildrenClosure105);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output103 .= $viewHelper106->initializeArgumentsAndRender();

$output103 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments107 = array();
// Rendering Boolean node
$arguments107['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Notice');
$arguments107['then'] = NULL;
$arguments107['else'] = NULL;
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-notice">
									';
};
$viewHelper109 = $self->getViewHelper('$viewHelper109', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper109->setArguments($arguments107);
$viewHelper109->setRenderingContext($renderingContext);
$viewHelper109->setRenderChildrenClosure($renderChildrenClosure108);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output103 .= $viewHelper109->initializeArgumentsAndRender();

$output103 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments110 = array();
// Rendering Boolean node
$arguments110['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Warning');
$arguments110['then'] = NULL;
$arguments110['else'] = NULL;
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
return '
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-warning">
									';
};
$viewHelper112 = $self->getViewHelper('$viewHelper112', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper112->setArguments($arguments110);
$viewHelper112->setRenderingContext($renderingContext);
$viewHelper112->setRenderChildrenClosure($renderChildrenClosure111);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output103 .= $viewHelper112->initializeArgumentsAndRender();

$output103 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments113 = array();
// Rendering Boolean node
$arguments113['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.severity', $renderingContext), 'Error');
$arguments113['then'] = NULL;
$arguments113['else'] = NULL;
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
$output115 = '';

$output115 .= '
										<script>
											$(function() {
												$(\'fieldset\').effect(\'shake\', ';

$output115 .= '{times: 1}';

$output115 .= ', 60);
											});
										</script>
										<div class="neos-tooltip neos-bottom neos-in neos-tooltip-error">
									';
return $output115;
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper116->setArguments($arguments113);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure114);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output103 .= $viewHelper116->initializeArgumentsAndRender();

$output103 .= '
										<div class="neos-tooltip-arrow"></div>
										<div class="neos-tooltip-inner">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper
$arguments117 = array();
$arguments117['value'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'flashMessage.message', $renderingContext);
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\RawViewHelper');
$viewHelper119->setArguments($arguments117);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\RawViewHelper

$output103 .= $viewHelper119->initializeArgumentsAndRender();

$output103 .= '</div>
									</div>
								';
return $output103;
};

$output100 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments101, $renderChildrenClosure102, $renderingContext);

$output100 .= '
							';
return $output100;
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper120->setArguments($arguments98);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure99);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output84 .= $viewHelper120->initializeArgumentsAndRender();

$output84 .= '
						</div>
					</fieldset>
				';
return $output84;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper121->setArguments($arguments82);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output78 .= $viewHelper121->initializeArgumentsAndRender();

$output78 .= '
			</div>
		</div>
		<div id="neos-login-footer">
			<p>
				<a href="http://neos.typo3.org" target="_blank">TYPO3 Neos</a> – © 2006-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\DateViewHelper
$arguments122 = array();
$arguments122['format'] = 'Y';
$arguments122['date'] = 'now';
$arguments122['forceLocale'] = NULL;
$arguments122['localeFormatType'] = NULL;
$arguments122['localeFormatLength'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper124 = $self->getViewHelper('$viewHelper124', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Format\DateViewHelper');
$viewHelper124->setArguments($arguments122);
$viewHelper124->setRenderingContext($renderingContext);
$viewHelper124->setRenderChildrenClosure($renderChildrenClosure123);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Format\DateViewHelper

$output78 .= $viewHelper124->initializeArgumentsAndRender();

$output78 .= '
				This is free software, licensed under GPL3 or higher, and you are welcome to redistribute it under certain conditions; <a href="http://typo3.org/licenses" target="_blank">click for details.</a>
				TYPO3 Neos comes with ABSOLUTELY NO WARRANTY; <a href="http://typo3.org/licenses" target="_blank">click for details.</a>
				See <a href="http://neos.typo3.org" target="_blank">neos.typo3.org</a> for more details.
				Obstructing the appearance of this notice is prohibited by law.
			</p>
		</div>
		<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments125 = array();
$arguments125['path'] = '2/js/bootstrap.min.js';
$arguments125['package'] = 'TYPO3.Twitter.Bootstrap';
$arguments125['resource'] = NULL;
$arguments125['localize'] = true;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper127 = $self->getViewHelper('$viewHelper127', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper127->setArguments($arguments125);
$viewHelper127->setRenderingContext($renderingContext);
$viewHelper127->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output78 .= $viewHelper127->initializeArgumentsAndRender();

$output78 .= '"></script>
		<script>
			if ($(\'#username\').val()) {
				$(\'#password\').focus();
			}
			try {
				$(\'form[name="login"] input[name="lastVisitedNode"]\').val(sessionStorage.getItem(\'TYPO3.Neos.lastVisitedNode\'));
			} catch(e) {}
		</script>
	</body>
';
return $output78;
};

$output60 .= '';

$output60 .= '
';

return $output60;
}


}
#0             43879     