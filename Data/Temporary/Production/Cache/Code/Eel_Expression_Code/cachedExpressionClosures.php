<?php function expression_e114d6e77d2d8e75e5210e5f872c51c0($context){return $context->getAndWrap('String')->callAndWrap('toLowerCase', array($context->getAndWrap('String')->callAndWrap('pregReplace', array($context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('_nodeType.name')),'/[[:^alnum:]]/','-'))));}
function expression_9441a4db63adc42a9d7ccc7a785e6ffc($context){return ((($_0=$context->callAndWrap('q', array($context->getAndWrap('value')))->callAndWrap('count', array())) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))===((($_1=1) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1));}
function expression_fa90be3678b992fcf3b71c0b31ace969($context){return $context->getAndWrap('String')->callAndWrap('trim', array((is_string($_x_6=(($_5=(is_string($_x_2=(($_1=$context->getAndWrap('value')) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=' ') instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3)) instanceof \TYPO3\Eel\Context?$_5->unwrap():$_5))|is_string($_y_7=(($_4=$context->getAndWrap('nodeTypeClassName')) instanceof \TYPO3\Eel\Context?$_4->unwrap():$_4)))?($_x_6 . $_y_7):($_x_6+$_y_7)));}
function expression_87690ea91f1a1500b590fb706665640d($context){return $context->getAndWrap('node')->getAndWrap('properties')->getAndWrap('text');}
function expression_8883f4000ba920ca0af80617f99b1cdd($context){return (is_string($_x_2=(($_1='DescendantOf_') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('contentCollectionNode')->getAndWrap('identifier')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}
function expression_1b17ef1772fb7b4c0e7639729d5035cb($context){return (is_string($_x_2=(($_1='Node_') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('contentCollectionNode')->getAndWrap('identifier')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}
function expression_b4c1bad45f622e951e823579048df8a4($context){return (is_string($_x_2=(($_1=$context->getAndWrap('value')) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('this')->getAndWrap('javascripts')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}
function expression_85e67a38f63b6d3cc6edb7e67623669b($context){return $context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('_identifier'));}
function expression_aa214bf4d607555ee9fa5d35457f3679($context){return (is_string($_x_2=(($_1='Node_') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('node')->getAndWrap('identifier')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}
function expression_e0254dba9a6adc9cb3df4854874e9f9e($context){return (is_string($_x_2=(($_1='Node_') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('documentNode')->getAndWrap('identifier')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}
function expression_aaa86b7149ab928634624c4369b741c2($context){return (is_string($_x_2=(($_1='DescendantOf_') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('documentNode')->getAndWrap('identifier')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}

function expression_2eda30ec54f1f9cd8b73e9adb3cad595($context){return (($_9=(($_10=(($_3=(($_4=$context->getAndWrap('parentRequest')->callAndWrap('isPackage', array('TYPO3.Neos'))) instanceof \TYPO3\Eel\Context?$_4->unwrap():$_4))?((($_5=((($_0=(($_1=$context->callAndWrap('isPackage', array('TYPO3.Neos'))) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))?((($_2=$context->callAndWrap('isController', array('Module\Management\Asset'))) instanceof \TYPO3\Eel\Context?$_2->unwrap():$_2)):$_0))) instanceof \TYPO3\Eel\Context?$_5->unwrap():$_5)):$_3)) instanceof \TYPO3\Eel\Context?$_10->unwrap():$_10))?$_9:(($_11=((($_6=(($_7=$context->callAndWrap('isPackage', array('TYPO3.Media'))) instanceof \TYPO3\Eel\Context?$_7->unwrap():$_7))?((($_8=$context->callAndWrap('isController', array('Asset'))) instanceof \TYPO3\Eel\Context?$_8->unwrap():$_8)):$_6))) instanceof \TYPO3\Eel\Context?$_11->unwrap():$_11));}

function expression_8b7144106696597e5f7a9781f01907f5($context){return (($_3=(($_4=$context->callAndWrap('isPackage', array('TYPO3.Neos'))) instanceof \TYPO3\Eel\Context?$_4->unwrap():$_4))?((($_5=((($_0=(($_1=$context->callAndWrap('isController', array('Backend\MediaBrowser'))) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))?$_0:(($_2=$context->callAndWrap('isController', array('Backend\ImageBrowser'))) instanceof \TYPO3\Eel\Context?$_2->unwrap():$_2)))) instanceof \TYPO3\Eel\Context?$_5->unwrap():$_5)):$_3);}

function expression_0d5b4a3b64af40e1bfc92e125e9954dc($context){return (is_string($_x_2=(($_1='/') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))|is_string($_y_3=(($_0=$context->getAndWrap('this')->getAndWrap('layout')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0)))?($_x_2 . $_y_3):($_x_2+$_y_3);}

function expression_36c4536996ca5615dcf9911f068786dc($context){return $context->getAndWrap('node');}

function expression_3b0c68c07eab90da0847b8f5baada784($context){return $context->getAndWrap('editPreviewMode');}

function expression_5262be68e3a94d3605a54cfecd462cba($context){return $context->getAndWrap('request')->getAndWrap('format');}

function expression_8f4841876bfd3137e6fb70859d563139($context){return $context->getAndWrap('site')->getAndWrap('context')->getAndWrap('currentDomain');}

function expression_a065b459bfad16a6816b1d3902b26777($context){return $context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('is', array('[instanceof TYPO3.Neos:Shortcut]'));}

function expression_b99b69c122a397a3f118d850f38ff139($context){return ((($_0=$context->getAndWrap('editPreviewMode')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))!==((($_1=$context->getAndWrap('null')) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1));}

function expression_25ed24fbe52ab820cd61d9a5399a9399($context){return (($_4=(($_5=((($_0=$context->getAndWrap('this')->getAndWrap('layout')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))!==((($_1=$context->getAndWrap('null')) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))) instanceof \TYPO3\Eel\Context?$_5->unwrap():$_5))?((($_6=((($_2=$context->getAndWrap('this')->getAndWrap('layout')) instanceof \TYPO3\Eel\Context?$_2->unwrap():$_2))!==((($_3='') instanceof \TYPO3\Eel\Context?$_3->unwrap():$_3))) instanceof \TYPO3\Eel\Context?$_6->unwrap():$_6)):$_4);}

function expression_e61d697db77c40c81a8057e2b7eaf3d4($context){return ((($_7=(($_4=(($_5=((($_0=$context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('layout'))) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))!==((($_1=$context->getAndWrap('null')) instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))) instanceof \TYPO3\Eel\Context?$_5->unwrap():$_5))?((($_6=((($_2=$context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('layout'))) instanceof \TYPO3\Eel\Context?$_2->unwrap():$_2))!==((($_3='') instanceof \TYPO3\Eel\Context?$_3->unwrap():$_3))) instanceof \TYPO3\Eel\Context?$_6->unwrap():$_6)):$_4)) instanceof \TYPO3\Eel\Context?$_7->unwrap():$_7)?($context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('layout'))):($context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('parents', array('[subpageLayout]'))->callAndWrap('first', array())->callAndWrap('property', array('subpageLayout'))));}

function expression_34bf4bb5da4b0eb66a409264ce08cc96($context){return ((($_0=$context->getAndWrap('request')->getAndWrap('format')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))!==((($_1='html') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1));}

function expression_3db75e7b6dda05ef5ceb3ce17308b510($context){return $context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('property', array('title'));}

function expression_2063c1608d6e0baf80249c42e2be5804($context){return $context->getAndWrap('value');}

function expression_3c8f9d73f75baea3a12c2e602b22246f($context){return ((($_2=((($_0=$context->getAndWrap('node')->getAndWrap('context')->getAndWrap('workspace')->getAndWrap('name')) instanceof \TYPO3\Eel\Context?$_0->unwrap():$_0))!==((($_1='live') instanceof \TYPO3\Eel\Context?$_1->unwrap():$_1))) instanceof \TYPO3\Eel\Context?$_2->unwrap():$_2)?($context->getAndWrap('value')):(''));}

function expression_532243ce9773a9102eaa3dc7507042ed($context){return $context->getAndWrap('documentNode');}

function expression_75e1bc7419e703a1ac8728fa9c7e7c38($context){return $context->getAndWrap('this')->getAndWrap('items');}

function expression_bf8fae2511d792116a7e656f5b9856f4($context){return $context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('add', array($context->callAndWrap('q', array($context->getAndWrap('node')))->callAndWrap('parents', array('[instanceof TYPO3.Neos:Document]'))))->callAndWrap('get', array());}

function expression_73ed58ab838624c7d78f8a2d8951d4d7($context){return $context->getAndWrap('this')->getAndWrap('nodePath');}

function expression_461282bf9494257970753847ff5f9eb8($context){return $context->wrap(array())->push('nodePath');}

function expression_fafb21ea483d64823f4b39b4f77b48ad($context){return $context->getAndWrap('Neos')->getAndWrap('Node')->callAndWrap('nearestContentCollection', array($context->getAndWrap('node'),$context->getAndWrap('this')->getAndWrap('nodePath')));}

function expression_e577e1c3a840325965a946c65c2bca62($context){return $context->getAndWrap('nodePath');}

function expression_6fe8f2030e879b2d6f586dedb395e2dd($context){return $context->getAndWrap('contentCollectionNode');}

function expression_5ee8002c6bc5ce6f8ae8e59f7db3b7f9($context){return $context->callAndWrap('q', array($context->getAndWrap('contentCollectionNode')))->callAndWrap('context', array($context->wrap(array())->push(TRUE,'invisibleContentShown')))->callAndWrap('children', array())->callAndWrap('cacheLifetime', array());}

#