<?php return array (
  'Settings' => 
  array (
    'TYPO3' => 
    array (
      'Flow' => 
      array (
        'aop' => 
        array (
          'globalObjects' => 
          array (
            'securityContext' => 'TYPO3\\Flow\\Security\\Context',
            'userInformation' => 'TYPO3\\Neos\\Service\\UserService',
          ),
        ),
        'compatibility' => 
        array (
          'uriBuilder' => 
          array (
            'createRelativePaths' => false,
          ),
        ),
        'configuration' => 
        array (
          'compileConfigurationFiles' => true,
        ),
        'core' => 
        array (
          'context' => 'Production',
          'phpBinaryPathAndFilename' => '/usr/bin/php',
          'subRequestEnvironmentVariables' => 
          array (
          ),
          'subRequestPhpIniPathAndFilename' => NULL,
        ),
        'error' => 
        array (
          'exceptionHandler' => 
          array (
            'className' => 'TYPO3\\Flow\\Error\\ProductionExceptionHandler',
            'defaultRenderingOptions' => 
            array (
              'renderTechnicalDetails' => false,
              'logException' => true,
            ),
            'renderingGroups' => 
            array (
              'notFoundExceptions' => 
              array (
                'matchingStatusCodes' => 
                array (
                  0 => 404,
                ),
                'options' => 
                array (
                  'logException' => false,
                  'templatePathAndFilename' => 'resource://TYPO3.Neos/Private/Templates/Error/Index.html',
                  'variables' => 
                  array (
                    'errorDescription' => 'Sorry, the page you requested was not found.',
                    'errorTitle' => 'Page Not Found',
                  ),
                  'layoutRootPath' => 'resource://TYPO3.Neos/Private/Layouts/',
                  'format' => 'html',
                ),
              ),
              'databaseConnectionExceptions' => 
              array (
                'matchingExceptionClassNames' => 
                array (
                  0 => 'TYPO3\\Flow\\Persistence\\Doctrine\\Exception\\DatabaseException',
                ),
                'options' => 
                array (
                  'templatePathAndFilename' => 'resource://TYPO3.Neos/Private/Templates/Error/Index.html',
                  'variables' => 
                  array (
                    'errorDescription' => 'Sorry, we detected an error with your database. Check your logfiles in Data/Logs/* for more information.',
                    'errorTitle' => 'Database Error',
                    'setupMessage' => 'You might want to configure or check your database configuration in the setup.',
                  ),
                  'layoutRootPath' => 'resource://TYPO3.Neos/Private/Layouts/',
                  'format' => 'html',
                ),
              ),
              'noHomepageException' => 
              array (
                'matchingExceptionClassNames' => 
                array (
                  0 => 'TYPO3\\Neos\\Routing\\Exception\\NoHomepageException',
                ),
                'options' => 
                array (
                  'templatePathAndFilename' => 'resource://TYPO3.Neos/Private/Templates/Error/Index.html',
                  'layoutRootPath' => 'resource://TYPO3.Neos/Private/Layouts/',
                  'format' => 'html',
                  'variables' => 
                  array (
                    'errorTitle' => 'Missing Homepage',
                    'errorDescription' => 'Either no site has been defined yet or the site does not contain a homepage.',
                    'setupMessage' => 'You might want to create or import a site in the setup.',
                  ),
                ),
              ),
            ),
          ),
          'errorHandler' => 
          array (
            'exceptionalErrors' => 
            array (
              0 => 256,
              1 => 4096,
            ),
          ),
        ),
        'http' => 
        array (
          'baseUri' => NULL,
        ),
        'log' => 
        array (
          'systemLogger' => 
          array (
            'logger' => 'TYPO3\\Flow\\Log\\Logger',
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/home/gcopin/www/neos/demoneos/Data/Logs/System.log',
              'createParentDirectories' => true,
              'severityThreshold' => 6,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
              'logMessageOrigin' => false,
            ),
          ),
          'securityLogger' => 
          array (
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/home/gcopin/www/neos/demoneos/Data/Logs/Security.log',
              'createParentDirectories' => true,
              'severityThreshold' => 6,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
              'logIpAddress' => true,
            ),
          ),
          'sqlLogger' => 
          array (
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/home/gcopin/www/neos/demoneos/Data/Logs/Query.log',
              'createParentDirectories' => true,
              'severityThreshold' => 6,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
            ),
          ),
        ),
        'i18n' => 
        array (
          'defaultLocale' => 'en',
          'fallbackRule' => 
          array (
            'strict' => false,
            'order' => 
            array (
            ),
          ),
        ),
        'object' => 
        array (
          'registerFunctionalTestClasses' => false,
          'excludeClasses' => 
          array (
            'Doctrine.*' => 
            array (
              0 => '.*',
            ),
            'doctrine.*' => 
            array (
              0 => '.*',
            ),
            'symfony.*' => 
            array (
              0 => '.*',
            ),
            'phpunit.*' => 
            array (
              0 => '.*',
            ),
            'mikey179.vfsStream' => 
            array (
              0 => '.*',
            ),
            'Composer.Installers' => 
            array (
              0 => '.*',
            ),
            'imagine.imagine' => 
            array (
              0 => 'Imagine\\\\Test\\\\.*',
            ),
          ),
        ),
        'package' => 
        array (
          'inactiveByDefault' => 
          array (
            0 => 'Composer.Installers',
          ),
          'packagesPathByType' => 
          array (
            'typo3-flow-package' => 'Application',
            'typo3-flow-framework' => 'Framework',
            'typo3-flow-site' => 'Sites',
            'typo3-flow-plugin' => 'Plugins',
          ),
        ),
        'persistence' => 
        array (
          'backendOptions' => 
          array (
            'driver' => 'pdo_mysql',
            'host' => '127.0.0.1',
            'dbname' => 'local_neos_demoneos',
            'user' => 'github',
            'password' => 'github*46',
            'charset' => 'utf8',
          ),
          'cacheAllQueryResults' => false,
          'doctrine' => 
          array (
            'enable' => true,
            'sqlLogger' => NULL,
            'eventListeners' => 
            array (
              'TYPO3\\Media\\Domain\\EventListener\\ImageEventListener' => 
              array (
                'events' => 
                array (
                  0 => 'prePersist',
                  1 => 'preUpdate',
                  2 => 'postRemove',
                ),
                'listener' => 'TYPO3\\Media\\Domain\\EventListener\\ImageEventListener',
              ),
              'TYPO3\\Neos\\Domain\\EventListener\\AccountPostEventListener' => 
              array (
                'events' => 
                array (
                  0 => 'postPersist',
                  1 => 'postUpdate',
                  2 => 'postRemove',
                ),
                'listener' => 'TYPO3\\Neos\\Domain\\EventListener\\AccountPostEventListener',
              ),
            ),
          ),
        ),
        'reflection' => 
        array (
          'ignoredTags' => 
          array (
            0 => 'api',
            1 => 'package',
            2 => 'subpackage',
            3 => 'license',
            4 => 'copyright',
            5 => 'author',
            6 => 'const',
            7 => 'see',
            8 => 'todo',
            9 => 'scope',
            10 => 'fixme',
            11 => 'test',
            12 => 'expectedException',
            13 => 'expectedExceptionCode',
            14 => 'depends',
            15 => 'dataProvider',
            16 => 'group',
            17 => 'codeCoverageIgnore',
          ),
          'logIncorrectDocCommentHints' => false,
        ),
        'resource' => 
        array (
          'publishing' => 
          array (
            'detectPackageResourceChanges' => false,
            'fileSystem' => 
            array (
              'mirrorMode' => 'link',
            ),
          ),
        ),
        'security' => 
        array (
          'enable' => true,
          'firewall' => 
          array (
            'rejectAll' => false,
            'filters' => 
            array (
              0 => 
              array (
                'patternType' => 'CsrfProtection',
                'patternValue' => NULL,
                'interceptor' => 'AccessDeny',
              ),
            ),
          ),
          'authentication' => 
          array (
            'providers' => 
            array (
              'Typo3SetupProvider' => 
              array (
                'provider' => 'FileBasedSimpleKeyProvider',
                'providerOptions' => 
                array (
                  'keyName' => 'SetupKey',
                  'authenticateRoles' => 
                  array (
                    0 => 'TYPO3.Setup:Administrator',
                  ),
                ),
                'requestPatterns' => 
                array (
                  'controllerObjectName' => 'TYPO3\\Setup\\Controller\\.*|TYPO3\\Setup\\ViewHelpers\\Widget\\Controller\\.*',
                ),
                'entryPoint' => 'WebRedirect',
                'entryPointOptions' => 
                array (
                  'uri' => 'setup/login',
                ),
              ),
              'Typo3BackendProvider' => 
              array (
                'provider' => 'PersistedUsernamePasswordProvider',
                'requestPatterns' => 
                array (
                  'controllerObjectName' => 'TYPO3\\Neos\\Controller\\.*|TYPO3\\Neos\\Service\\.*|TYPO3\\Media\\Controller\\.*',
                ),
                'entryPoint' => 'WebRedirect',
                'entryPointOptions' => 
                array (
                  'routeValues' => 
                  array (
                    '@package' => 'TYPO3.Neos',
                    '@controller' => 'Login',
                    '@action' => 'index',
                    '@format' => 'html',
                  ),
                ),
              ),
            ),
            'authenticationStrategy' => 'oneToken',
          ),
          'authorization' => 
          array (
            'accessDecisionVoters' => 
            array (
              0 => 'TYPO3\\Flow\\Security\\Authorization\\Voter\\Policy',
            ),
            'allowAccessIfAllVotersAbstain' => false,
          ),
          'csrf' => 
          array (
            'csrfStrategy' => 'onePerSession',
          ),
          'cryptography' => 
          array (
            'hashingStrategies' => 
            array (
              'default' => 'bcrypt',
              'fallback' => 'pbkdf2',
              'pbkdf2' => 'TYPO3\\Flow\\Security\\Cryptography\\Pbkdf2HashingStrategy',
              'bcrypt' => 'TYPO3\\Flow\\Security\\Cryptography\\BCryptHashingStrategy',
              'saltedmd5' => 'TYPO3\\Flow\\Security\\Cryptography\\SaltedMd5HashingStrategy',
            ),
            'Pbkdf2HashingStrategy' => 
            array (
              'dynamicSaltLength' => 8,
              'iterationCount' => 10000,
              'derivedKeyLength' => 64,
              'algorithm' => 'sha256',
            ),
            'BCryptHashingStrategy' => 
            array (
              'cost' => 14,
            ),
            'RSAWalletServicePHP' => 
            array (
              'keystorePath' => '/home/gcopin/www/neos/demoneos/Data/Persistent/RsaWalletData',
              'openSSLConfiguration' => 
              array (
              ),
            ),
          ),
        ),
        'session' => 
        array (
          'inactivityTimeout' => 3600,
          'name' => 'TYPO3_Flow_Session',
          'garbageCollection' => 
          array (
            'probability' => 30,
            'maximumPerRun' => 1000,
          ),
          'cookie' => 
          array (
            'lifetime' => 0,
            'path' => '/',
            'secure' => false,
            'httponly' => true,
            'domain' => NULL,
          ),
        ),
        'utility' => 
        array (
          'environment' => 
          array (
            'temporaryDirectoryBase' => '/home/gcopin/www/neos/demoneos/Data/Temporary/',
          ),
        ),
      ),
      'Fluid' => 
      array (
      ),
      'Eel' => 
      array (
      ),
      'Party' => 
      array (
      ),
      'TYPO3CR' => 
      array (
        'contentDimensions' => 
        array (
        ),
      ),
      'Imagine' => 
      array (
        'driver' => 'Gd',
        'profile' => 
        array (
          'RGB' => 'color.org/sRGB_IEC61966-2-1_black_scaled.icc',
          'CMYK' => 'Adobe/CMYK/USWebUncoated.icc',
          'Grayscale' => 'colormanagement.org/ISOcoated_v2_grey1c_bas.ICC',
        ),
      ),
      'Form' => 
      array (
        'yamlPersistenceManager' => 
        array (
          'savePath' => 'resource://TYPO3.NeosDemoTypo3Org/Private/Form/',
        ),
        'supertypeResolver' => 
        array (
          'hiddenProperties' => 
          array (
          ),
        ),
        'presets' => 
        array (
          'default' => 
          array (
            'title' => 'Default',
            'stylesheets' => 
            array (
            ),
            'javaScripts' => 
            array (
            ),
            'formElementTypes' => 
            array (
              'TYPO3.Form:Base' => 
              array (
                'renderingOptions' => 
                array (
                  'templatePathPattern' => 'resource://{@package}/Private/Form/{@type}.html',
                  'partialPathPattern' => 'resource://{@package}/Private/Form/Partials/{@type}.html',
                  'layoutPathPattern' => 'resource://{@package}/Private/Form/Layouts/{@type}.html',
                  'skipUnknownElements' => false,
                  'translationPackage' => 'TYPO3.Flow',
                ),
              ),
              'TYPO3.Form:Form' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Base',
                ),
                'rendererClassName' => 'TYPO3\\Form\\Core\\Renderer\\FluidFormRenderer',
                'renderingOptions' => 
                array (
                  'renderableNameInTemplate' => 'form',
                ),
              ),
              'TYPO3.Form:RemovableMixin' => 
              array (
              ),
              'TYPO3.Form:ReadOnlyFormElement' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Base',
                  1 => 'TYPO3.Form:RemovableMixin',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\GenericFormElement',
                'renderingOptions' => 
                array (
                  'renderableNameInTemplate' => 'element',
                ),
              ),
              'TYPO3.Form:FormElement' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Base',
                  1 => 'TYPO3.Form:RemovableMixin',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\GenericFormElement',
                'properties' => 
                array (
                  'containerClassAttribute' => 'input',
                  'elementClassAttribute' => '',
                  'elementErrorClassAttribute' => 'error',
                ),
                'renderingOptions' => 
                array (
                  'renderableNameInTemplate' => 'element',
                ),
              ),
              'TYPO3.Form:Page' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Base',
                  1 => 'TYPO3.Form:RemovableMixin',
                ),
                'implementationClassName' => 'TYPO3\\Form\\Core\\Model\\Page',
                'renderingOptions' => 
                array (
                  'renderableNameInTemplate' => 'page',
                ),
              ),
              'TYPO3.Form:PreviewPage' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Page',
                ),
              ),
              'TYPO3.Form:Section' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\Section',
                'renderingOptions' => 
                array (
                  'renderableNameInTemplate' => 'section',
                ),
              ),
              'TYPO3.Form:TextMixin' => 
              array (
              ),
              'TYPO3.Form:SingleLineText' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:TextMixin',
                ),
              ),
              'TYPO3.Form:Password' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:TextMixin',
                ),
              ),
              'TYPO3.Form:PasswordWithConfirmation' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:Password',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\PasswordWithConfirmation',
                'properties' => 
                array (
                  'elementClassAttribute' => 'input-medium',
                  'confirmationLabel' => 'Confirmation',
                  'confirmationClassAttribute' => 'input-medium',
                ),
              ),
              'TYPO3.Form:MultiLineText' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:TextMixin',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'xxlarge',
                ),
              ),
              'TYPO3.Form:SelectionMixin' => 
              array (
              ),
              'TYPO3.Form:SingleSelectionMixin' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:SelectionMixin',
                ),
              ),
              'TYPO3.Form:MultiSelectionMixin' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:SelectionMixin',
                ),
              ),
              'TYPO3.Form:Checkbox' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'add-on',
                  'value' => 1,
                ),
              ),
              'TYPO3.Form:MultipleSelectCheckboxes' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:MultiSelectionMixin',
                ),
              ),
              'TYPO3.Form:MultipleSelectDropdown' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:MultiSelectionMixin',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'xlarge',
                ),
              ),
              'TYPO3.Form:SingleSelectRadiobuttons' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:SingleSelectionMixin',
                ),
              ),
              'TYPO3.Form:SingleSelectDropdown' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                  1 => 'TYPO3.Form:SingleSelectionMixin',
                ),
              ),
              'TYPO3.Form:DatePicker' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\DatePicker',
                'properties' => 
                array (
                  'elementClassAttribute' => 'small',
                  'timeSelectorClassAttribute' => 'mini',
                  'dateFormat' => 'Y-m-d',
                  'enableDatePicker' => true,
                  'displayTimeSelector' => false,
                ),
              ),
              'TYPO3.Form:FileUpload' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\FileUpload',
                'properties' => 
                array (
                  'allowedExtensions' => 
                  array (
                    0 => 'pdf',
                    1 => 'doc',
                  ),
                ),
              ),
              'TYPO3.Form:ImageUpload' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'implementationClassName' => 'TYPO3\\Form\\FormElements\\ImageUpload',
                'properties' => 
                array (
                  'allowedTypes' => 
                  array (
                    0 => 'jpeg',
                    1 => 'png',
                    2 => 'bmp',
                  ),
                ),
              ),
              'TYPO3.Form:StaticText' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:ReadOnlyFormElement',
                ),
                'properties' => 
                array (
                  'text' => '',
                ),
              ),
              'TYPO3.Form:HiddenField' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
              ),
            ),
            'finisherPresets' => 
            array (
              'TYPO3.Form:Closure' => 
              array (
                'implementationClassName' => 'TYPO3\\Form\\Finishers\\ClosureFinisher',
                'options' => 
                array (
                ),
              ),
              'TYPO3.Form:Confirmation' => 
              array (
                'implementationClassName' => 'TYPO3\\Form\\Finishers\\ConfirmationFinisher',
                'options' => 
                array (
                ),
              ),
              'TYPO3.Form:Email' => 
              array (
                'implementationClassName' => 'TYPO3\\Form\\Finishers\\EmailFinisher',
                'options' => 
                array (
                ),
              ),
              'TYPO3.Form:FlashMessage' => 
              array (
                'implementationClassName' => 'TYPO3\\Form\\Finishers\\FlashMessageFinisher',
                'options' => 
                array (
                ),
              ),
              'TYPO3.Form:Redirect' => 
              array (
                'implementationClassName' => 'TYPO3\\Form\\Finishers\\RedirectFinisher',
                'options' => 
                array (
                ),
              ),
            ),
            'validatorPresets' => 
            array (
              'TYPO3.Flow:NotEmpty' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\NotEmptyValidator',
              ),
              'TYPO3.Flow:DateTimeRange' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\DateTimeRangeValidator',
              ),
              'TYPO3.Flow:Alphanumeric' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\AlphanumericValidator',
              ),
              'TYPO3.Flow:Text' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\TextValidator',
              ),
              'TYPO3.Flow:StringLength' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\StringLengthValidator',
              ),
              'TYPO3.Flow:EmailAddress' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\EmailAddressValidator',
              ),
              'TYPO3.Flow:Integer' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\IntegerValidator',
              ),
              'TYPO3.Flow:Float' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\FloatValidator',
              ),
              'TYPO3.Flow:NumberRange' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\NumberRangeValidator',
              ),
              'TYPO3.Flow:RegularExpression' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\RegularExpressionValidator',
              ),
              'TYPO3.Flow:Count' => 
              array (
                'implementationClassName' => 'TYPO3\\Flow\\Validation\\Validator\\CountValidator',
              ),
            ),
          ),
          'typo3.setup' => 
          array (
            'title' => 'Setup Elements',
            'parentPreset' => 'default',
            'formElementTypes' => 
            array (
              'TYPO3.Form:Base' => 
              array (
                'renderingOptions' => 
                array (
                  'layoutPathPattern' => 'resource://TYPO3.Setup/Private/Form/Layouts/{@type}.html',
                ),
              ),
              'TYPO3.Form:Form' => 
              array (
                'renderingOptions' => 
                array (
                  'templatePathPattern' => 'resource://TYPO3.Setup/Private/Form/{@type}.html',
                ),
              ),
              'TYPO3.Setup:LinkElement' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:ReadOnlyFormElement',
                ),
                'properties' => 
                array (
                  'text' => '',
                  'class' => 'btn',
                  'href' => '',
                ),
              ),
              'TYPO3.Setup:DatabaseSelector' => 
              array (
                'superTypes' => 
                array (
                  0 => 'TYPO3.Form:FormElement',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:SingleLineText' => 
              array (
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:Password' => 
              array (
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:PasswordWithConfirmation' => 
              array (
                'renderingOptions' => 
                array (
                  'templatePathPattern' => 'resource://TYPO3.Setup/Private/Form/{@type}.html',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                  'confirmationClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:Checkbox' => 
              array (
                'renderingOptions' => 
                array (
                  'templatePathPattern' => 'resource://TYPO3.Setup/Private/Form/{@type}.html',
                ),
                'properties' => 
                array (
                  'elementClassAttribute' => 'checkbox',
                ),
              ),
              'TYPO3.Form:MultipleSelectDropdown' => 
              array (
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:SingleSelectDropdown' => 
              array (
                'renderingOptions' => 
                array (
                  'templatePathPattern' => 'resource://TYPO3.Setup/Private/Form/{@type}.html',
                ),
              ),
            ),
          ),
          'bootstrap' => 
          array (
            'title' => 'Twitter bootstrap',
            'parentPreset' => 'default',
            'formElementTypes' => 
            array (
              'TYPO3.Form:Base' => 
              array (
                'renderingOptions' => 
                array (
                  'layoutPathPattern' => 'resource://TYPO3.NeosDemoTypo3Org/Private/Templates/ContactForm/{@type}.html',
                ),
              ),
              'TYPO3.Form:FormElement' => 
              array (
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
              'TYPO3.Form:MultiLineText' => 
              array (
                'properties' => 
                array (
                  'elementClassAttribute' => 'form-control',
                ),
              ),
            ),
          ),
        ),
      ),
      'DocTools' => 
      array (
        'bundles' => 
        array (
          'Form' => 
          array (
            'documentationRootPath' => '/home/gcopin/www/neos/demoneos/Packages/Application/TYPO3.Form/Documentation/Guide/source',
            'renderedDocumentationRootPath' => '/home/gcopin/www/neos/demoneos/Data/Temporary/Documentation/Form',
            'configurationRootPath' => '/home/gcopin/www/neos/demoneos/Packages/Application/TYPO3.Form/Documentation/Guide/source',
            'imageRootPath' => '/home/gcopin/www/neos/demoneos/Packages/Application/TYPO3.Form/Documentation/Guide/Images/',
          ),
          'Neos' => 
          array (
            'documentationRootPath' => '/home/gcopin/www/neos/demoneos/Packages/Application/TYPO3.Neos/Documentation/',
            'configurationRootPath' => '/home/gcopin/www/neos/demoneos/Packages/Application/TYPO3.DocTools/Resources/Private/Themes/TYPO3/',
            'renderedDocumentationRootPath' => '/home/gcopin/www/neos/demoneos/Data/Temporary/Documentation/TYPO3.Neos/',
            'renderingOutputFormat' => 'html',
            'renderByDefault' => false,
          ),
        ),
      ),
      'Media' => 
      array (
        'image' => 
        array (
          'defaultOptions' => 
          array (
            'quality' => 90,
          ),
        ),
        'bodyClasses' => 'neos neos-module media-browser',
        'scripts' => 
        array (
          0 => 'resource://TYPO3.Neos/Public/Library/jquery/jquery-2.0.3.js',
          1 => 'resource://TYPO3.Neos/Public/Library/bootstrap-components.js',
        ),
        'styles' => 
        array (
          0 => 'resource://TYPO3.Media/Public/Libraries/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css',
          1 => 'resource://TYPO3.Media/Public/Styles/Main.css',
          2 => 'resource://TYPO3.Neos/Public/Styles/Neos.css',
          3 => 'resource://TYPO3.Media/Public/Styles/Main.css',
        ),
      ),
      'Twitter' => 
      array (
        'Bootstrap' => 
        array (
          'viewHelpers' => 
          array (
            'partialRootPath' => 'resource://TYPO3.Twitter.Bootstrap/Private/Partials/',
            'templates' => 
            array (
              'TYPO3\\Twitter\\Bootstrap\\ViewHelpers\\Navigation\\MenuViewHelper' => 'resource://TYPO3.Twitter.Bootstrap/Private/Templates/Navigation/Menu.html',
            ),
          ),
        ),
      ),
      'Setup' => 
      array (
        'initialPasswordFile' => '/home/gcopin/www/neos/demoneos/Data/SetupPassword.txt',
        'stepOrder' => 
        array (
          0 => 'database',
          1 => 'administrator',
          2 => 'siteimport',
          3 => 'final',
        ),
        'steps' => 
        array (
          'database' => 
          array (
            'className' => 'TYPO3\\Setup\\Step\\DatabaseStep',
            'requiredConditions' => 
            array (
              0 => 
              array (
                'className' => 'TYPO3\\Setup\\Condition\\PdoDriverCondition',
              ),
            ),
          ),
          'final' => 
          array (
            'className' => 'TYPO3\\Neos\\Setup\\Step\\FinalStep',
          ),
          'administrator' => 
          array (
            'className' => 'TYPO3\\Neos\\Setup\\Step\\AdministratorStep',
            'requiredConditions' => 
            array (
              0 => 
              array (
                'className' => 'TYPO3\\Setup\\Condition\\DatabaseConnectionCondition',
              ),
            ),
          ),
          'siteimport' => 
          array (
            'className' => 'TYPO3\\Neos\\Setup\\Step\\SiteImportStep',
            'requiredConditions' => 
            array (
              0 => 
              array (
                'className' => 'TYPO3\\Setup\\Condition\\DatabaseConnectionCondition',
              ),
            ),
          ),
        ),
        'view' => 
        array (
          'title' => 'TYPO3 Neos Setup',
        ),
      ),
      'TypoScript' => 
      array (
        'rendering' => 
        array (
          'exceptionHandler' => 'TYPO3\\TypoScript\\Core\\ExceptionHandlers\\ThrowingHandler',
        ),
        'debugMode' => false,
        'enableContentCache' => true,
        'defaultContext' => 
        array (
          'String' => 'TYPO3\\Eel\\Helper\\StringHelper',
          'Array' => 'TYPO3\\Eel\\Helper\\ArrayHelper',
          'Date' => 'TYPO3\\Eel\\Helper\\DateHelper',
          'Configuration' => 'TYPO3\\Eel\\Helper\\ConfigurationHelper',
          'Math' => 'TYPO3\\Eel\\Helper\\MathHelper',
          'Neos.Node' => 'TYPO3\\Neos\\TypoScript\\Helper\\NodeHelper',
        ),
      ),
      'Neos' => 
      array (
        'typoScript' => 
        array (
          'enableObjectTreeCache' => true,
          'autoInclude' => 
          array (
            'TYPO3.TypoScript' => true,
            'TYPO3.Neos' => true,
            'TYPO3.Neos.NodeTypes' => true,
          ),
        ),
        'nodeTypes' => 
        array (
          'groups' => 
          array (
            'general' => 
            array (
              'position' => 'start',
              'label' => 'General',
            ),
            'structure' => 
            array (
              'position' => 100,
              'label' => 'Structure',
            ),
            'plugins' => 
            array (
              'position' => 200,
              'label' => 'Plugins',
            ),
          ),
        ),
        'userInterface' => 
        array (
          'loadMinifiedJavascript' => true,
          'requireJsPathMapping' => 
          array (
            'TYPO3.Neos/Validation' => 'resource://TYPO3.Neos/Public/JavaScript/Shared/Validation/',
            'TYPO3.Neos/Inspector/Editors' => 'resource://TYPO3.Neos/Public/JavaScript/Content/Inspector/Editors/',
          ),
          'navigateComponent' => 
          array (
            'nodeTree' => 
            array (
              'loadingDepth' => 4,
            ),
          ),
          'inspector' => 
          array (
            'dataTypes' => 
            array (
              'string' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/TextFieldEditor',
              ),
              'integer' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/TextFieldEditor',
              ),
              'boolean' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/BooleanEditor',
              ),
              'TYPO3\\Media\\Domain\\Model\\ImageVariant' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/ImageEditor',
              ),
              'TYPO3\\Media\\Domain\\Model\\Asset' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/AssetEditor',
              ),
              'array<TYPO3\\Media\\Domain\\Model\\Asset>' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/AssetEditor',
                'editorOptions' => 
                array (
                  'multiple' => true,
                ),
              ),
              'date' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/DateTimeEditor',
              ),
              'reference' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/ReferenceEditor',
              ),
              'references' => 
              array (
                'editor' => 'TYPO3.Neos/Inspector/Editors/ReferencesEditor',
              ),
            ),
          ),
          'editPreviewModes' => 
          array (
            'inPlace' => 
            array (
              'isEditingMode' => true,
              'isPreviewMode' => false,
              'typoScriptRenderingPath' => '',
              'title' => 'In-Place',
              'position' => 100,
            ),
            'rawContent' => 
            array (
              'isEditingMode' => true,
              'isPreviewMode' => false,
              'typoScriptRenderingPath' => 'rawContent',
              'title' => 'Raw Content',
              'position' => 200,
            ),
            'desktop' => 
            array (
              'isEditingMode' => false,
              'isPreviewMode' => true,
              'typoScriptRenderingPath' => '',
              'title' => 'Desktop',
              'position' => 100,
            ),
            'print' => 
            array (
              'isEditingMode' => false,
              'isPreviewMode' => true,
              'typoScriptRenderingPath' => 'print',
              'title' => 'Print',
              'position' => 200,
            ),
          ),
        ),
        'contentDimensions' => 
        array (
          'dimensions' => 
          array (
            'languages' => 
            array (
              'defaultPreset' => 'all',
              'label' => 'Languages',
              'icon' => 'icon-language',
              'presets' => 
              array (
                'all' => 
                array (
                  'label' => 'All languages',
                  'values' => 
                  array (
                    0 => 'mul_ZZ',
                  ),
                  'uriSegment' => 'all',
                ),
              ),
            ),
          ),
        ),
        'moduleConfiguration' => 
        array (
          'widgetTemplatePathAndFileName' => 'resource://TYPO3.Neos/Private/Templates/Module/Widget.html',
        ),
        'modules' => 
        array (
          'management' => 
          array (
            'label' => 'Management',
            'controller' => '\\TYPO3\\Neos\\Controller\\Module\\ManagementController',
            'description' => 'Contains multiple modules related to management of content',
            'icon' => 'icon-briefcase',
            'resource' => 'TYPO3_Neos_Backend_Module_Management',
            'submodules' => 
            array (
              'workspaces' => 
              array (
                'label' => 'Workspaces',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\Management\\WorkspacesController',
                'description' => 'This module contains the overview of all elements within the current workspace and it enables to continue the review and publishing workflow for them.',
                'icon' => 'icon-th-large',
                'resource' => 'TYPO3_Neos_Backend_Module_Management_Workspaces',
              ),
              'media' => 
              array (
                'label' => 'Media',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\Management\\AssetController',
                'description' => 'This module allows managing of media assets including pictures, videos, audio and documents.',
                'icon' => 'icon-camera',
                'resource' => 'TYPO3_Neos_Backend_Module_Media_ManageAssets',
              ),
            ),
          ),
          'administration' => 
          array (
            'label' => 'Administration',
            'controller' => '\\TYPO3\\Neos\\Controller\\Module\\AdministrationController',
            'description' => 'Contains multiple modules related to administration',
            'icon' => 'icon-gears',
            'resource' => 'TYPO3_Neos_Backend_Module_Administration',
            'submodules' => 
            array (
              'users' => 
              array (
                'label' => 'User Management',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\Administration\\UsersController',
                'description' => 'The User Management module provides you with an overview of all backend users. You can group them by their properties so you are able to monitor their permissions, filemounts, member groups etc.. This module is an indispensable tool in order to make sure the users are correctly configured.',
                'icon' => 'icon-group',
                'actions' => 
                array (
                  'new' => 
                  array (
                    'label' => 'Create user',
                    'title' => 'Create a new user',
                  ),
                ),
                'resource' => 'TYPO3_Neos_Backend_Module_Administration_Users',
              ),
              'packages' => 
              array (
                'label' => 'Package Management',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\Administration\\PackagesController',
                'description' => 'The Package Management module provides you with an overview of all packages. You can activate and deactivate individual packages, import new packages and delete existing packages. It also provides you with the ability to freeze and unfreeze packages in development context.',
                'icon' => 'icon-archive',
                'resource' => 'TYPO3_Neos_Backend_Module_Administration_Packages',
              ),
              'sites' => 
              array (
                'label' => 'Sites Management',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\Administration\\SitesController',
                'description' => 'The Sites Management module provides you with an overview of all sites. You can edit, add and delete information about your sites, such as adding a new domain.',
                'icon' => 'icon-globe',
                'actions' => 
                array (
                  'newSite' => 
                  array (
                    'label' => 'Create site',
                    'title' => 'Create a new site',
                  ),
                ),
                'resource' => 'TYPO3_Neos_Backend_Module_Administration_Sites',
              ),
            ),
          ),
          'user' => 
          array (
            'label' => 'User',
            'controller' => '\\TYPO3\\Neos\\Controller\\Module\\UserController',
            'hideInMenu' => true,
            'resource' => 'TYPO3_Neos_Backend_Module_User',
            'submodules' => 
            array (
              'usersettings' => 
              array (
                'label' => 'User Settings',
                'controller' => '\\TYPO3\\Neos\\Controller\\Module\\User\\UserSettingsController',
                'description' => 'This module allows you to customize your backend user profile. Here you can change your active system language, name and email address. You may also configure other general features in the system.',
                'icon' => 'icon-user',
                'resource' => 'TYPO3_Neos_Backend_Module_User_UserSettings',
              ),
            ),
          ),
        ),
        'NodeTypes' => 
        array (
        ),
        'Kickstarter' => 
        array (
        ),
      ),
      'Kickstart' => 
      array (
      ),
      'NeosDemoTypo3Org' => 
      array (
        'flickr' => 
        array (
          'tagStreamUriPattern' => 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&nojsoncallback=1&tags=%s',
          'userStreamUriPattern' => 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&nojsoncallback=1&id=%s',
        ),
      ),
    ),
    'doctrine' => 
    array (
      'inflector' => 
      array (
      ),
      'cache' => 
      array (
      ),
      'collections' => 
      array (
      ),
      'lexer' => 
      array (
      ),
      'annotations' => 
      array (
      ),
      'migrations' => 
      array (
      ),
    ),
    'Doctrine' => 
    array (
      'Common' => 
      array (
      ),
      'DBAL' => 
      array (
      ),
      'ORM' => 
      array (
      ),
    ),
    'symfony' => 
    array (
      'console' => 
      array (
      ),
      'yaml' => 
      array (
      ),
      'domcrawler' => 
      array (
      ),
    ),
    'Composer' => 
    array (
      'Installers' => 
      array (
      ),
    ),
    'imagine' => 
    array (
      'imagine' => 
      array (
      ),
    ),
    'Inouit' => 
    array (
      'Carvin' => 
      array (
      ),
    ),
  ),
  'Caches' => 
  array (
    'Fluid_TemplateCache' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Eel_Expression_Code' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Default' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\VariableFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
      'backendOptions' => 
      array (
        'defaultLifetime' => 0,
      ),
    ),
    'Flow_Cache_ResourceFiles' => 
    array (
    ),
    'Flow_Core' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_I18n_AvailableLocalesCache' => 
    array (
    ),
    'Flow_I18n_XmlModelCache' => 
    array (
    ),
    'Flow_I18n_Cldr_CldrModelCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_DatesReaderCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_NumbersReaderCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_PluralsReaderCache' => 
    array (
    ),
    'Flow_Monitor' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
    ),
    'Flow_Mvc_Routing_FindMatchResults' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Mvc_Routing_Resolve' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Mvc_ViewConfigurations' => 
    array (
    ),
    'Flow_Object_Classes' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Object_Configuration' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Persistence_Doctrine' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Persistence_Doctrine_Results' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
      'backendOptions' => 
      array (
        'defaultLifetime' => 60,
      ),
    ),
    'Flow_Reflection_Status' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Reflection_CompiletimeData' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Reflection_RuntimeData' => 
    array (
    ),
    'Flow_Reflection_RuntimeClassSchemata' => 
    array (
    ),
    'Flow_Resource_Status' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
    ),
    'Flow_Security_Policy' => 
    array (
    ),
    'Flow_Security_Cryptography_RSAWallet' => 
    array (
      'backendOptions' => 
      array (
        'defaultLifetime' => 30,
      ),
    ),
    'Flow_Session_MetaData' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Session_Storage' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'TYPO3_Media_ImageSize' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\VariableFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
      'backendOptions' => 
      array (
        'defaultLifetime' => 0,
      ),
    ),
    'TYPO3_TypoScript_Content' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'TYPO3_Neos_Configuration_Version' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'TYPO3_Neos_TypoScript' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\VariableFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
  ),
  'Policy' => 
  array (
    'resources' => 
    array (
      'entities' => 
      array (
        'TYPO3\\TYPO3CR\\Domain\\Model\\Node' => 
        array (
          'TYPO3_TYPO3CR_Domain_Model_Node_NotInLiveWorkspace' => 'this.workspace.name != \'live\'',
        ),
      ),
      'methods' => 
      array (
        'TYPO3_Media_ManageAssets' => 'method(TYPO3\\Media\\Controller\\AssetController->(index|new|edit|update|initializeCreate|create|initializeUpload|upload|tagAsset|delete|createTag|deleteTag)Action())',
        'TYPO3_Setup_LoginController' => 'method(TYPO3\\Setup\\Controller\\LoginController->(login|authenticate)Action())',
        'TYPO3_Setup_SetupController' => 'method(TYPO3\\Setup\\Controller\\SetupController->indexAction()) || method(TYPO3\\Setup\\Controller\\LoginController->logoutAction())',
        'TYPO3_Setup_WidgetControllers' => 'method(public TYPO3\\Setup\\ViewHelpers\\Widget\\Controller\\.+Controller->.+Action())',
        'TYPO3_Neos_AllControllerActions' => 'within(TYPO3\\Flow\\Mvc\\Controller\\AbstractController) && method(public .*->(?!initialize).*Action())',
        'TYPO3_Neos_WidgetControllers' => 'method(TYPO3\\Fluid\\ViewHelpers\\Widget\\Controller\\AutocompleteController->(index|autocomplete)Action()) || method(TYPO3\\Fluid\\ViewHelpers\\Widget\\Controller\\PaginateController->indexAction()) || method(TYPO3\\TYPO3CR\\ViewHelpers\\Widget\\Controller\\PaginateController->indexAction()) || method(TYPO3\\Neos\\ViewHelpers\\Widget\\Controller\\LinkRepositoryController->(index|search|lookup)Action())',
        'TYPO3_Neos_PublicFrontendAccess' => 'method(TYPO3\\Neos\\Controller\\Frontend\\NodeController->showAction())',
        'TYPO3_Neos_BackendLogin' => 'method(TYPO3\\Neos\\Controller\\LoginController->(index|authenticate)Action()) || method(TYPO3\\Flow\\Security\\Authentication\\Controller\\AbstractAuthenticationController->authenticateAction())',
        'TYPO3_Neos_Backend_GeneralAccess' => 'method(TYPO3\\Neos\\Controller\\Backend\\BackendController->indexAction()) || method(TYPO3\\Neos\\Controller\\Backend\\ModuleController->indexAction()) || method(TYPO3\\Neos\\Controller\\LoginController->logoutAction()) || method(TYPO3\\Flow\\Security\\Authentication\\Controller\\AbstractAuthenticationController->logoutAction()) || method(TYPO3\\Neos\\Controller\\Module\\AbstractModuleController->indexAction())',
        'TYPO3_Neos_Backend_Module_Content' => 'method(TYPO3\\Neos\\Controller\\Backend\\SchemaController->(nodeTypeSchema|vieSchema)Action()) || method(TYPO3\\Neos\\Controller\\Backend\\MenuController->indexAction()) || method(TYPO3\\Neos\\Controller\\Backend\\SettingsController->editPreviewAction())',
        'TYPO3_Neos_Backend_EditContent' => 'method(TYPO3\\Neos\\Service\\Controller\\NodeController->(show|getPrimaryChildNode|getChildNodesForTree|filterChildNodesForTree|getChildNodes|getChildNodesFromParent|create|createAndRender|createNodeForTheTree|move|moveBefore|moveAfter|moveInto|copy|copyBefore|copyAfter|copyInto|update|delete|searchPage|getPageByNodePath|error)Action()) || method(TYPO3\\Neos\\Controller\\Backend\\ContentController->(uploadAsset|assetsWithMetadata|imageWithMetadata|pluginViews|masterPlugins|error)Action()) || method(TYPO3\\Neos\\Service\\Controller\\AssetController->(index|show|error)Action()) || method(TYPO3\\Neos\\Controller\\Service\\NodeController->(index|show|error)Action()) || method(TYPO3\\Neos\\Controller\\Backend\\(Media|Image)BrowserController->(initialize|index|new|edit|update|initializeCreate|create|initializeUpload|upload|tagAsset|delete|createTag|deleteTag|error)Action())',
        'TYPO3_Neos_Backend_AccessContentInOwnOrLiveWorkspace' => 'method(TYPO3\\Neos\\TypeConverter\\NodeConverter->createNode(workspaceName == current.userInformation.currentWorkspaceName)) || method(TYPO3\\Neos\\TypeConverter\\NodeConverter->createNode(workspaceName == "live"))',
        'TYPO3_Neos_Backend_AccessContentInOthersWorkspace' => 'method(TYPO3\\Neos\\TypeConverter\\NodeConverter->createNode(workspaceName != current.userInformation.currentWorkspaceName)) && method(TYPO3\\Neos\\TypeConverter\\NodeConverter->createNode(workspaceName != "live"))',
        'TYPO3_Neos_Backend_PublishOwnWorkspaceContent' => 'method(TYPO3\\Neos\\Service\\Controller\\WorkspaceController->(publishNode|publishNodes|error)Action()) || method(TYPO3\\Neos\\Service\\Controller\\WorkspaceController->publishAllAction(workspaceName = current.userInformation.currentWorkspaceName)) || method(TYPO3\\Neos\\Service\\Controller\\WorkspaceController->getWorkspaceWideUnpublishedNodesAction(workspace.name = current.userInformation.currentWorkspaceName))',
        'TYPO3_Neos_Backend_DiscardOwnWorkspaceContent' => 'method(TYPO3\\Neos\\Service\\Controller\\WorkspaceController->(discardNode|discardNodes|error)Action()) || method(TYPO3\\Neos\\Service\\Controller\\WorkspaceController->discardAllAction(workspace.name == current.userInformation.currentWorkspaceName))',
        'TYPO3_Neos_Backend_Module_User' => 'method(TYPO3\\Neos\\Controller\\Module\\UserController->indexAction())',
        'TYPO3_Neos_Backend_Module_User_UserSettings' => 'method(TYPO3\\Neos\\Controller\\Module\\User\\UserSettingsController->(index|newElectronicAddress|createElectronicAddress|deleteElectronicAddress)Action())',
        'TYPO3_Neos_Backend_Module_User_UserSettings_UpdateOwnSettings' => 'method(TYPO3\\Neos\\Controller\\Module\\User\\UserSettingsController->updateAction(account == current.securityContext.account)) && method(TYPO3\\Neos\\Controller\\Module\\User\\UserSettingsController->updateAction(person == current.securityContext.party))',
        'TYPO3_Neos_Backend_EditUserPreferences' => 'method(TYPO3\\Neos\\Service\\Controller\\UserPreferenceController->(index|update|error)Action())',
        'TYPO3_Neos_Backend_Module_Management' => 'method(TYPO3\\Neos\\Controller\\Module\\ManagementController->indexAction())',
        'TYPO3_Neos_Backend_Module_Management_Workspaces' => 'method(TYPO3\\Neos\\Controller\\Module\\Management\\WorkspacesController->(publishNode|discardNode|publishOrDiscardNodes)Action())',
        'TYPO3_Neos_Backend_Module_Management_Workspaces_ManageOwnWorkspace' => 'method(TYPO3\\Neos\\Controller\\Module\\Management\\WorkspacesController->(index|publishWorkspace|discardWorkspace)Action(workspace.name == current.userInformation.currentWorkspaceName)) || method(TYPO3\\Neos\\Controller\\Module\\Management\\WorkspacesController->(index|publishWorkspace|discardWorkspace)Action(workspace == NULL))',
        'TYPO3_Neos_Backend_Module_Media_ManageAssets' => 'method(TYPO3\\Neos\\Controller\\Module\\Management\\AssetController->(index|new|edit|update|initializeCreate|create|initializeUpload|upload|tagAsset|delete|createTag|deleteTag)Action())',
        'TYPO3_Neos_Backend_Module_Administration' => 'method(TYPO3\\Neos\\Controller\\Module\\AdministrationController->indexAction())',
        'TYPO3_Neos_Backend_Module_Administration_Users' => 'method(TYPO3\\Neos\\Controller\\Module\\Administration\\UsersController->(index|show|new|create|edit|update|delete|newElectronicAddress|createElectronicAddress|deleteElectronicAddress|)Action())',
        'TYPO3_Neos_Backend_Module_Administration_Packages' => 'method(TYPO3\\Neos\\Controller\\Module\\Administration\\PackagesController->(index|activate|deactivate|delete|freeze|unfreeze|batch)Action())',
        'TYPO3_Neos_Backend_Module_Administration_Sites' => 'method(TYPO3\\Neos\\Controller\\Module\\Administration\\SitesController->(index|edit|updateSite|newSite|createSite|deleteSite|activateSite|deactivateSite|editDomain|updateDomain|newDomain|createDomain|deleteDomain|activateDomain|deactivateDomain)Action())',
        'TYPO3_NeosDemoTypo3Org_RegistrationAccess' => 'method(TYPO3\\NeosDemoTypo3Org\\Controller\\RegistrationController->(index|newAccount|createAccount|createTemporaryAccount)Action())',
        'TYPO3_NeosDemoTypo3Org_FlickrAccess' => 'method(TYPO3\\NeosDemoTypo3Org\\Controller\\FlickrController->(tagStream|userStream)Action())',
      ),
    ),
    'roles' => 
    array (
      'TYPO3.TYPO3CR:Administrator' => 
      array (
      ),
      'TYPO3.Setup:Administrator' => 
      array (
      ),
      'TYPO3.Neos:Editor' => 
      array (
        0 => 'TYPO3.TYPO3CR:Administrator',
      ),
      'TYPO3.Neos:Administrator' => 
      array (
        0 => 'TYPO3.Neos:Editor',
      ),
    ),
    'acls' => 
    array (
      'TYPO3.TYPO3CR:Administrator' => 
      array (
        'entities' => 
        array (
          'TYPO3_TYPO3CR_Domain_Model_Node_NotInLiveWorkspace' => 'GRANT',
        ),
      ),
      'Everybody' => 
      array (
        'methods' => 
        array (
          'TYPO3_Setup_LoginController' => 'GRANT',
          'TYPO3_Neos_PublicFrontendAccess' => 'GRANT',
          'TYPO3_Neos_Backend_AccessContentInOthersWorkspace' => 'DENY',
          'TYPO3_Neos_Backend_AccessContentInOwnOrLiveWorkspace' => 'GRANT',
          'TYPO3_Neos_BackendLogin' => 'GRANT',
          'TYPO3_Neos_WidgetControllers' => 'GRANT',
          'TYPO3_NeosDemoTypo3Org_RegistrationAccess' => 'GRANT',
          'TYPO3_NeosDemoTypo3Org_FlickrAccess' => 'GRANT',
        ),
      ),
      'TYPO3.Setup:Administrator' => 
      array (
        'methods' => 
        array (
          'TYPO3_Setup_SetupController' => 'GRANT',
          'TYPO3_Setup_WidgetControllers' => 'GRANT',
        ),
      ),
      'TYPO3.Neos:Editor' => 
      array (
        'methods' => 
        array (
          'TYPO3_Neos_Backend_GeneralAccess' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Content' => 'GRANT',
          'TYPO3_Neos_Backend_EditContent' => 'GRANT',
          'TYPO3_Neos_Backend_PublishOwnWorkspaceContent' => 'GRANT',
          'TYPO3_Neos_Backend_DiscardOwnWorkspaceContent' => 'GRANT',
          'TYPO3_Media_ManageAssets' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Media_ManageAssets' => 'GRANT',
          'TYPO3_Neos_Backend_Module_User' => 'GRANT',
          'TYPO3_Neos_Backend_Module_User_UserSettings' => 'GRANT',
          'TYPO3_Neos_Backend_Module_User_UserSettings_UpdateOwnSettings' => 'GRANT',
          'TYPO3_Neos_Backend_EditUserPreferences' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Management' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Management_Workspaces' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Management_Workspaces_ManageOwnWorkspace' => 'GRANT',
        ),
      ),
      'TYPO3.Neos:Administrator' => 
      array (
        'methods' => 
        array (
          'TYPO3_Neos_Backend_Module_Administration' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Administration_Users' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Administration_Packages' => 'GRANT',
          'TYPO3_Neos_Backend_Module_Administration_Sites' => 'GRANT',
        ),
      ),
    ),
  ),
  'Routes' => 
  array (
    0 => 
    array (
      'name' => 'TYPO3 Neos :: Authentication :: Login form',
      'uriPattern' => 'neos/login',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Login',
        '@action' => 'index',
        '@format' => 'html',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
      'appendExceedingArguments' => true,
    ),
    1 => 
    array (
      'name' => 'TYPO3 Neos :: Authentication :: Authenticate',
      'uriPattern' => 'neos/login',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Login',
        '@action' => 'authenticate',
        '@format' => 'html',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    2 => 
    array (
      'name' => 'TYPO3 Neos :: Authentication :: Logout',
      'uriPattern' => 'neos/logout',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Login',
        '@action' => 'logout',
        '@format' => 'html',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    3 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Overview',
      'uriPattern' => 'neos',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\Backend',
      ),
    ),
    4 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Media Browser',
      'uriPattern' => 'neos/content/assets(/{@action})',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\MediaBrowser',
      ),
      'appendExceedingArguments' => true,
    ),
    5 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Image Browser',
      'uriPattern' => 'neos/content/images(/{@action})',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\ImageBrowser',
      ),
      'appendExceedingArguments' => true,
    ),
    6 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Asset upload',
      'uriPattern' => 'neos/content/upload-asset',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'uploadAsset',
        '@format' => 'html',
        '@controller' => 'Backend\\Content',
      ),
      'appendExceedingArguments' => true,
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    7 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Image metadata',
      'uriPattern' => 'neos/content/image-with-metadata',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'imageWithMetadata',
        '@format' => 'html',
        '@controller' => 'Backend\\Content',
      ),
      'appendExceedingArguments' => true,
    ),
    8 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Asset metadata',
      'uriPattern' => 'neos/content/asset-with-metadata',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'assetsWithMetadata',
        '@format' => 'html',
        '@controller' => 'Backend\\Content',
      ),
    ),
    9 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Plugin Views',
      'uriPattern' => 'neos/content/plugin-views',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'pluginViews',
        '@format' => 'html',
        '@controller' => 'Backend\\Content',
      ),
    ),
    10 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Content Module - Master Plugins',
      'uriPattern' => 'neos/content/master-plugins',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'masterPlugins',
        '@format' => 'html',
        '@controller' => 'Backend\\Content',
      ),
    ),
    11 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Schema - VIE',
      'uriPattern' => 'neos/schema/vie',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'vieSchema',
        '@format' => 'html',
        '@controller' => 'Backend\\Schema',
      ),
      'appendExceedingArguments' => true,
    ),
    12 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Schema - NodeType',
      'uriPattern' => 'neos/schema/node-type',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'nodeTypeSchema',
        '@format' => 'html',
        '@controller' => 'Backend\\Schema',
      ),
      'appendExceedingArguments' => true,
    ),
    13 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Menu',
      'uriPattern' => 'neos/menu',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\Menu',
      ),
      'appendExceedingArguments' => true,
    ),
    14 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Settings',
      'uriPattern' => 'neos/settings/{@action}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\Settings',
      ),
      'appendExceedingArguments' => true,
    ),
    15 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Modules',
      'uriPattern' => 'neos/{module}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\Module',
      ),
      'routeParts' => 
      array (
        'module' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\BackendModuleRoutePartHandler',
        ),
      ),
    ),
    16 => 
    array (
      'name' => 'TYPO3 Neos :: Backend :: Modules & arguments',
      'uriPattern' => 'neos/{module}/{moduleArguments}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Backend\\Module',
      ),
      'routeParts' => 
      array (
        'module' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\BackendModuleRoutePartHandler',
        ),
        'moduleArguments' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\BackendModuleArgumentsRoutePartHandler',
        ),
      ),
      'toLowerCase' => false,
      'appendExceedingArguments' => true,
    ),
    17 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Nodes - index',
      'uriPattern' => 'neos/service/nodes',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@controller' => 'Service\\Node',
      ),
      'appendExceedingArguments' => true,
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    18 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Nodes - single node',
      'uriPattern' => 'neos/service/nodes/{identifier}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'show',
        '@format' => 'html',
        '@controller' => 'Service\\Node',
      ),
      'appendExceedingArguments' => true,
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    19 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - UserPreferencesController->index',
      'uriPattern' => 'neos/service/user-preferences',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'UserPreference',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    20 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - UserPreferencesController->update',
      'uriPattern' => 'neos/service/user-preferences',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'update',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'UserPreference',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    21 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - AssetController->index',
      'uriPattern' => 'neos/service/asset',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'index',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Asset',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    22 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - AssetController->show',
      'uriPattern' => 'neos/service/asset/{identifier}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'show',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Asset',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    23 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->getWorkspaceWideUnpublishedNodes',
      'uriPattern' => 'neos/service/workspaces/get-workspace-wide-unpublished-nodes',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'getWorkspaceWideUnpublishedNodes',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'appendExceedingArguments' => true,
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    24 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->publishNode',
      'uriPattern' => 'neos/service/workspaces/publish-node',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'publishNode',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    25 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->publishNodes',
      'uriPattern' => 'neos/service/workspaces/publish-nodes',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'publishNodes',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    26 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->discardNode',
      'uriPattern' => 'neos/service/workspaces/discard-node',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'discardNode',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    27 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->discardNodes',
      'uriPattern' => 'neos/service/workspaces/discard-nodes',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'discardNodes',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    28 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->publishAll',
      'uriPattern' => 'neos/service/workspaces/publish-all',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'publishAll',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    29 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - WorkspaceController->discardAll',
      'uriPattern' => 'neos/service/workspaces/discard-all',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'discardAll',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Workspace',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    30 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->getChildNodesForTree',
      'uriPattern' => 'neos/service/node/get-child-nodes-for-tree',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'getChildNodesForTree',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    31 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->filterChildNodesForTree',
      'uriPattern' => 'neos/service/node/filter-child-nodes-for-tree',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'filterChildNodesForTree',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    32 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->searchPage',
      'uriPattern' => 'neos/service/node/search-page',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'searchPage',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    33 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->getPageByNodePath',
      'uriPattern' => 'neos/service/node/get-page-by-node-path',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'getPageByNodePath',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'GET',
      ),
    ),
    34 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->create',
      'uriPattern' => 'neos/service/node/create',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'create',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    35 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->createAndRender',
      'uriPattern' => 'neos/service/node/create-and-render',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'createAndRender',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    36 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->createNodeForTheTree',
      'uriPattern' => 'neos/service/node/create-node-for-the-tree',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'createNodeForTheTree',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    37 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->discardNode',
      'uriPattern' => 'neos/service/node/discard-node',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'discardNode',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    38 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->move',
      'uriPattern' => 'neos/service/node/move',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'move',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    39 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->copy',
      'uriPattern' => 'neos/service/node/copy',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'copy',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    40 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->update',
      'uriPattern' => 'neos/service/node/update',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'update',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'PUT',
      ),
    ),
    41 => 
    array (
      'name' => 'TYPO3 Neos :: Service :: Services - NodeController->delete',
      'uriPattern' => 'neos/service/node/delete',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@action' => 'delete',
        '@format' => 'html',
        '@subpackage' => 'Service',
        '@controller' => 'Node',
      ),
      'httpMethods' => 
      array (
        0 => 'POST',
      ),
    ),
    42 => 
    array (
      'name' => 'TYPO3 Neos :: Frontend :: Homepage',
      'uriPattern' => '{node}',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Frontend\\Node',
        '@action' => 'show',
        '@format' => 'html',
      ),
      'routeParts' => 
      array (
        'node' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\FrontendNodeRoutePartHandlerInterface',
          'options' => 
          array (
            'onlyMatchSiteNodes' => true,
          ),
        ),
      ),
      'appendExceedingArguments' => true,
    ),
    43 => 
    array (
      'name' => 'TYPO3 Neos :: Frontend :: content with URI suffix',
      'uriPattern' => '{node}.html',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Frontend\\Node',
        '@action' => 'show',
        '@format' => 'html',
      ),
      'routeParts' => 
      array (
        'node' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\FrontendNodeRoutePartHandlerInterface',
        ),
      ),
      'appendExceedingArguments' => true,
    ),
    44 => 
    array (
      'name' => 'TYPO3 Neos :: Frontend :: Dummy wireframe route to enable uri resolution while in wireframe mode.',
      'uriPattern' => '{node}.html',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Neos',
        '@controller' => 'Frontend\\Node',
        '@action' => 'showWireframe',
        '@format' => 'html',
      ),
      'routeParts' => 
      array (
        'node' => 
        array (
          'handler' => 'TYPO3\\Neos\\Routing\\FrontendNodeRoutePartHandlerInterface',
        ),
      ),
      'appendExceedingArguments' => true,
    ),
  ),
  'NodeTypes' => 
  array (
    'unstructured' => 
    array (
      'abstract' => false,
    ),
    'TYPO3.Neos:Node' => 
    array (
      'abstract' => true,
      'properties' => 
      array (
        '_removed' => 
        array (
          'type' => 'boolean',
        ),
      ),
    ),
    'TYPO3.Neos:Hidable' => 
    array (
      'abstract' => true,
      'ui' => 
      array (
        'inspector' => 
        array (
          'groups' => 
          array (
            'visibility' => 
            array (
              'label' => 'Visibility',
              'position' => 100,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        '_hidden' => 
        array (
          'type' => 'boolean',
          'ui' => 
          array (
            'label' => 'Hide',
            'inspector' => 
            array (
              'group' => 'visibility',
              'position' => 30,
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Timable' => 
    array (
      'abstract' => true,
      'ui' => 
      array (
        'inspector' => 
        array (
          'groups' => 
          array (
            'visibility' => 
            array (
              'label' => 'Visibility',
              'position' => 100,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        '_hiddenBeforeDateTime' => 
        array (
          'type' => 'date',
          'ui' => 
          array (
            'label' => 'Hide before',
            'inspector' => 
            array (
              'group' => 'visibility',
              'position' => 10,
            ),
          ),
          'validation' => 
          array (
            'TYPO3.Neos/Validation/DateTimeValidator' => 
            array (
            ),
          ),
        ),
        '_hiddenAfterDateTime' => 
        array (
          'type' => 'date',
          'ui' => 
          array (
            'label' => 'Hide after',
            'inspector' => 
            array (
              'group' => 'visibility',
              'position' => 20,
            ),
          ),
          'validation' => 
          array (
            'TYPO3.Neos/Validation/DateTimeValidator' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Document' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Node',
        1 => 'TYPO3.Neos:Hidable',
        2 => 'TYPO3.Neos:Timable',
      ),
      'abstract' => true,
      'ui' => 
      array (
        'label' => 'Document',
        'search' => 
        array (
          'searchCategory' => 'Documents',
        ),
        'inspector' => 
        array (
          'groups' => 
          array (
            'document' => 
            array (
              'label' => 'Document options',
              'position' => 10,
            ),
            'type' => 
            array (
              'label' => 'Change type',
              'position' => 1000,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        '_nodeType' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Type',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'type',
              'position' => 100,
              'editor' => 'Content/Inspector/Editors/NodeTypeEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Loading ...',
                'baseNodeType' => 'TYPO3.Neos:Document',
              ),
            ),
          ),
        ),
        'title' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Title',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'document',
            ),
          ),
          'validation' => 
          array (
            'TYPO3.Neos/Validation/NotEmptyValidator' => 
            array (
            ),
            'TYPO3.Neos/Validation/StringLengthValidator' => 
            array (
              'minimum' => 1,
              'maximum' => 255,
            ),
          ),
        ),
        '_name' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Name (URL)',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'document',
            ),
          ),
          'validation' => 
          array (
            'TYPO3.Neos/Validation/NotEmptyValidator' => 
            array (
            ),
            'TYPO3.Neos/Validation/StringLengthValidator' => 
            array (
              'minimum' => 1,
              'maximum' => 255,
            ),
            'regularExpression' => 
            array (
              'regularExpression' => '/^[a-z0-9\\-]+$/i',
            ),
          ),
        ),
        '_hidden' => 
        array (
          'ui' => 
          array (
            'reloadIfChanged' => true,
          ),
        ),
        '_hiddenInIndex' => 
        array (
          'type' => 'boolean',
          'ui' => 
          array (
            'label' => 'Hide in menus',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'visibility',
              'position' => 40,
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Shortcut' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Document',
      ),
      'ui' => 
      array (
        'label' => 'Shortcut',
        'icon' => 'icon-share',
        'inspector' => 
        array (
          'groups' => 
          array (
            'document' => 
            array (
              'label' => 'Shortcut options',
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'targetMode' => 
        array (
          'type' => 'string',
          'defaultValue' => 'firstChildNode',
          'ui' => 
          array (
            'label' => 'Target mode',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'document',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'values' => 
                array (
                  'firstChildNode' => 
                  array (
                    'label' => 'First child node',
                  ),
                  'parentNode' => 
                  array (
                    'label' => 'Parent node',
                  ),
                  'selectedNode' => 
                  array (
                    'label' => 'Selected node',
                  ),
                ),
              ),
            ),
          ),
        ),
        'targetNode' => 
        array (
          'type' => 'reference',
          'ui' => 
          array (
            'label' => 'Target node',
            'inspector' => 
            array (
              'group' => 'document',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Plugin' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'abstract' => true,
      'ui' => 
      array (
        'label' => 'Plugin',
        'group' => 'plugins',
        'icon' => 'icon-puzzle-piece',
        'inspector' => 
        array (
          'groups' => 
          array (
            'pluginSettings' => 
            array (
              'label' => 'Plugin Settings',
            ),
          ),
        ),
      ),
      'postprocessors' => 
      array (
        'PluginPostprocessor' => 
        array (
          'postprocessor' => 'TYPO3\\Neos\\NodeTypePostprocessor\\PluginNodeTypePostprocessor',
        ),
      ),
    ),
    'TYPO3.Neos:PluginView' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Plugin View',
        'group' => 'plugins',
        'inspector' => 
        array (
          'groups' => 
          array (
            'pluginViews' => 
            array (
              'label' => 'Plugin Views',
              'position' => 100,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'plugin' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Master View',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'pluginViews',
              'position' => 20,
              'editor' => 'TYPO3.Neos/Inspector/Editors/MasterPluginEditor',
            ),
          ),
        ),
        'view' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Plugin View',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'pluginViews',
              'position' => 20,
              'editor' => 'TYPO3.Neos/Inspector/Editors/PluginViewEditor',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Content' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Node',
        1 => 'TYPO3.Neos:Hidable',
        2 => 'TYPO3.Neos:Timable',
      ),
      'abstract' => true,
      'ui' => 
      array (
        'label' => 'Content',
        'icon' => 'icon-unchecked',
        'group' => 'general',
        'search' => 
        array (
          'searchCategory' => 'Content',
        ),
        'inspector' => 
        array (
          'groups' => 
          array (
            'type' => 
            array (
              'label' => 'Change type',
              'position' => 100,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        '_nodeType' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Type',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'type',
              'editor' => 'Content/Inspector/Editors/NodeTypeEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Loading ...',
                'baseNodeType' => 'TYPO3.Neos:Content',
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:ContentCollection' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Node',
      ),
      'ui' => 
      array (
        'label' => 'Content Collection',
        'icon' => 'icon-unchecked',
      ),
    ),
    'TYPO3.Neos.NodeTypes:Headline' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Headline',
        'icon' => 'icon-file-text',
      ),
      'properties' => 
      array (
        'title' => 
        array (
          'type' => 'string',
          'defaultValue' => '<h1>Enter headline here</h1>',
          'ui' => 
          array (
            'inlineEditable' => true,
            'aloha' => 
            array (
              'format' => 
              array (
                'sub' => true,
                'sup' => true,
                'p' => false,
                'h1' => true,
                'h2' => true,
                'h3' => true,
                'removeFormat' => true,
                'h4' => true,
                'h5' => true,
              ),
              'link' => 
              array (
                'a' => true,
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Text' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Text',
        'icon' => 'icon-file-text',
      ),
      'properties' => 
      array (
        'text' => 
        array (
          'type' => 'string',
          'defaultValue' => '<p>Enter text here</p>',
          'ui' => 
          array (
            'inlineEditable' => true,
            'aloha' => 
            array (
              'format' => 
              array (
                'b' => true,
                'i' => true,
                'u' => true,
                'sub' => true,
                'sup' => true,
                'p' => true,
                'h1' => true,
                'h2' => true,
                'h3' => true,
                'pre' => true,
                'removeFormat' => true,
              ),
              'table' => 
              array (
                'table' => true,
              ),
              'list' => 
              array (
                'ol' => true,
                'ul' => true,
              ),
              'link' => 
              array (
                'a' => true,
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Image' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Image',
        'icon' => 'icon-picture',
        'inspector' => 
        array (
          'groups' => 
          array (
            'image' => 
            array (
              'label' => 'Image',
              'position' => 5,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'image' => 
        array (
          'type' => 'TYPO3\\Media\\Domain\\Model\\ImageVariant',
          'ui' => 
          array (
            'label' => 'Image',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
            ),
          ),
        ),
        'alignment' => 
        array (
          'type' => 'string',
          'defaultValue' => '',
          'ui' => 
          array (
            'label' => 'Alignment',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Default',
                'values' => 
                array (
                  '' => 
                  array (
                    'label' => '',
                  ),
                  'center' => 
                  array (
                    'label' => 'Center',
                  ),
                  'left' => 
                  array (
                    'label' => 'Left',
                  ),
                  'right' => 
                  array (
                    'label' => 'Right',
                  ),
                ),
              ),
            ),
          ),
        ),
        'alternativeText' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Alternative text',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
            ),
          ),
        ),
        'title' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Title',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
            ),
          ),
        ),
        'link' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Link',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
            ),
          ),
        ),
        'hasCaption' => 
        array (
          'type' => 'boolean',
          'ui' => 
          array (
            'label' => 'Enable caption',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'image',
            ),
          ),
        ),
        'caption' => 
        array (
          'type' => 'string',
          'defaultValue' => '<p>Enter caption here</p>',
          'ui' => 
          array (
            'inlineEditable' => true,
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:TextWithImage' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Image',
        1 => 'TYPO3.Neos.NodeTypes:Text',
      ),
      'ui' => 
      array (
        'label' => 'Text with Image',
        'icon' => 'icon-picture',
      ),
    ),
    'TYPO3.Neos.NodeTypes:Html' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'HTML',
        'icon' => 'icon-code',
        'inspector' => 
        array (
          'groups' => 
          array (
            'html' => 
            array (
              'label' => 'HTML',
              'position' => 10,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'source' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'HTML Content',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'html',
              'editor' => 'TYPO3.Neos/Inspector/Editors/HtmlEditor',
            ),
          ),
          'defaultValue' => '<p>Enter HTML here</p>',
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Menu' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Menu',
        'group' => 'structure',
        'icon' => 'icon-sitemap',
        'inspector' => 
        array (
          'groups' => 
          array (
            'options' => 
            array (
              'label' => 'Options',
              'position' => 30,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'startLevel' => 
        array (
          'type' => 'string',
          'defaultValue' => '0',
          'ui' => 
          array (
            'reloadIfChanged' => true,
            'label' => 'Starting Level',
            'inspector' => 
            array (
              'group' => 'options',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'values' => 
                array (
                  -4 => 
                  array (
                    'label' => 'Four Levels Above Current Page',
                  ),
                  -3 => 
                  array (
                    'label' => 'Three Levels Above Current Page',
                  ),
                  -2 => 
                  array (
                    'label' => 'Two Levels Above Current Page',
                  ),
                  -1 => 
                  array (
                    'label' => 'One Level Above Current Page',
                  ),
                  0 => 
                  array (
                    'label' => 'Same Level As Current Page',
                  ),
                  1 => 
                  array (
                    'label' => 'First Level Of Website',
                  ),
                  2 => 
                  array (
                    'label' => 'Second Level Of Website',
                  ),
                  3 => 
                  array (
                    'label' => 'Third Level Of Website',
                  ),
                  4 => 
                  array (
                    'label' => 'Fourth Level Of Website',
                  ),
                  5 => 
                  array (
                    'label' => 'Fifth Level Of Website',
                  ),
                  6 => 
                  array (
                    'label' => 'Sixth Level Of Website',
                  ),
                ),
              ),
            ),
          ),
        ),
        'maximumLevels' => 
        array (
          'type' => 'string',
          'defaultValue' => '1',
          'ui' => 
          array (
            'reloadIfChanged' => true,
            'label' => 'Maximum Levels',
            'inspector' => 
            array (
              'group' => 'options',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'values' => 
                array (
                  1 => 
                  array (
                    'label' => '1',
                  ),
                  2 => 
                  array (
                    'label' => '2',
                  ),
                  3 => 
                  array (
                    'label' => '3',
                  ),
                  4 => 
                  array (
                    'label' => '4',
                  ),
                  5 => 
                  array (
                    'label' => '5',
                  ),
                  6 => 
                  array (
                    'label' => '6',
                  ),
                  7 => 
                  array (
                    'label' => '7',
                  ),
                  8 => 
                  array (
                    'label' => '8',
                  ),
                  9 => 
                  array (
                    'label' => '9',
                  ),
                  10 => 
                  array (
                    'label' => '10',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Column' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'abstract' => true,
      'ui' => 
      array (
        'group' => 'structure',
        'label' => 'Column',
        'icon' => 'icon-columns',
        'inlineEditable' => true,
        'inspector' => 
        array (
          'groups' => 
          array (
            'column' => 
            array (
              'label' => 'Columns',
              'position' => 10,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Layout',
            'inspector' => 
            array (
              'group' => 'column',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:TwoColumn' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Column',
      ),
      'ui' => 
      array (
        'label' => 'Two column content',
      ),
      'childNodes' => 
      array (
        'column0' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column1' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'defaultValue' => '6-6',
          'ui' => 
          array (
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'editorOptions' => 
              array (
                'values' => 
                array (
                  '50-50' => NULL,
                  '75-25' => NULL,
                  '25-75' => NULL,
                  '66-33' => NULL,
                  '33-66' => NULL,
                  '6-6' => 
                  array (
                    'label' => '50% / 50%',
                  ),
                  '8-4' => 
                  array (
                    'label' => '66% / 33%',
                  ),
                  '4-8' => 
                  array (
                    'label' => '33% / 66%',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:ThreeColumn' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Column',
      ),
      'ui' => 
      array (
        'label' => 'Three column content',
      ),
      'childNodes' => 
      array (
        'column0' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column1' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column2' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'defaultValue' => '4-4-4',
          'ui' => 
          array (
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'editorOptions' => 
              array (
                'values' => 
                array (
                  '33-33-33' => NULL,
                  '50-25-25' => NULL,
                  '25-50-25' => NULL,
                  '25-25-50' => NULL,
                  '4-4-4' => 
                  array (
                    'label' => '33% / 33% / 33%',
                  ),
                  '6-3-3' => 
                  array (
                    'label' => '50% / 25% / 33%',
                  ),
                  '3-6-3' => 
                  array (
                    'label' => '25% / 50% / 25%',
                  ),
                  '3-3-6' => 
                  array (
                    'label' => '25% / 25% / 50%',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:FourColumn' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Column',
      ),
      'ui' => 
      array (
        'label' => 'Four column content',
      ),
      'childNodes' => 
      array (
        'column0' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column1' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column2' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'column3' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'defaultValue' => '3-3-3-3',
          'ui' => 
          array (
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'editorOptions' => 
              array (
                'values' => 
                array (
                  '25-25-25-25' => NULL,
                  '3-3-3-3' => 
                  array (
                    'label' => '25% / 25% / 25% / 25%',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Form' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Form',
        'group' => 'general',
        'icon' => 'icon-envelope-alt',
        'inspector' => 
        array (
          'groups' => 
          array (
            'form' => 
            array (
              'label' => 'Form',
              'position' => 30,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'formIdentifier' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Form identifier',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'form',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Select the Form identifier',
                'values' => 
                array (
                  '' => NULL,
                  'contact-form' => 
                  array (
                    'label' => 'Contact form',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:AssetList' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'Asset list',
        'icon' => 'icon-folder-open-alt',
        'inspector' => 
        array (
          'groups' => 
          array (
            'resources' => 
            array (
              'label' => 'Resources',
              'position' => 5,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'assets' => 
        array (
          'type' => 'array<TYPO3\\Media\\Domain\\Model\\Asset>',
          'ui' => 
          array (
            'inspector' => 
            array (
              'group' => 'resources',
            ),
            'label' => 'Assets',
            'reloadIfChanged' => true,
          ),
        ),
      ),
    ),
    'TYPO3.Neos.NodeTypes:Page' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Document',
      ),
      'childNodes' => 
      array (
        'main' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
        'teaser' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Layout for this page only',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'layout',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Inherit from parent',
                'values' => 
                array (
                  '' => 
                  array (
                    'label' => '',
                  ),
                  'default' => 
                  array (
                    'label' => 'Default',
                  ),
                  'landingPage' => 
                  array (
                    'label' => 'Landing page',
                  ),
                ),
              ),
            ),
          ),
        ),
        'subpageLayout' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Layout for subpages of this page',
            'inspector' => 
            array (
              'group' => 'layout',
              'editor' => 'TYPO3.Neos/Inspector/Editors/SelectBoxEditor',
              'editorOptions' => 
              array (
                'placeholder' => 'Inherit from parent',
                'values' => 
                array (
                  '' => 
                  array (
                    'label' => '',
                  ),
                  'default' => 
                  array (
                    'label' => 'Default',
                  ),
                  'landingPage' => 
                  array (
                    'label' => 'Landing page',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'ui' => 
      array (
        'label' => 'Page',
        'icon' => 'icon-file',
        'inspector' => 
        array (
          'groups' => 
          array (
            'document' => 
            array (
              'label' => 'Title',
            ),
            'layout' => 
            array (
              'label' => 'Layout',
              'position' => 150,
            ),
          ),
        ),
      ),
    ),
    'TYPO3.Neos:Page' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Page',
      ),
      'abstract' => true,
    ),
    'TYPO3.NeosDemoTypo3Org:Chapter' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Document',
      ),
      'childNodes' => 
      array (
        'main' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'ui' => 
      array (
        'label' => 'Chapter',
        'icon' => 'icon-book',
        'inspector' => 
        array (
          'groups' => 
          array (
            'document' => 
            array (
              'label' => 'Chapter details',
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'layout' => 
        array (
          'type' => 'string',
          'defaultValue' => 'chapter',
        ),
        'chapterDescription' => 
        array (
          'type' => 'string',
          'ui' => 
          array (
            'label' => 'Chapter description',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'document',
            ),
          ),
        ),
        'chapterImage' => 
        array (
          'type' => 'TYPO3\\Media\\Domain\\Model\\ImageVariant',
          'ui' => 
          array (
            'label' => 'Chapter image',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'document',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.NeosDemoTypo3Org:ChapterMenu' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos.NodeTypes:Menu',
      ),
      'ui' => 
      array (
        'label' => 'Chapter menu',
      ),
    ),
    'TYPO3.NeosDemoTypo3Org:Registration' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Plugin',
      ),
      'ui' => 
      array (
        'label' => 'Editor Registration Plugin',
        'icon' => 'icon-user',
      ),
    ),
    'TYPO3.NeosDemoTypo3Org:Flickr' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Plugin',
      ),
      'ui' => 
      array (
        'label' => 'Flickr photo feed',
        'icon' => 'icon-rss',
        'inspector' => 
        array (
          'groups' => 
          array (
            'feed' => 
            array (
              'label' => 'Feed',
            ),
          ),
        ),
      ),
      'options' => 
      array (
        'pluginViews' => 
        array (
          'UserFeed' => 
          array (
            'label' => 'User feed',
            'controllerActions' => 
            array (
              'TYPO3\\NeosDemoTypo3Org\\Controller\\FlickrController' => 
              array (
                0 => 'userStream',
              ),
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'tags' => 
        array (
          'type' => 'string',
          'defaultValue' => '',
          'ui' => 
          array (
            'label' => 'Tag(s) for the flickr feed',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'feed',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.NeosDemoTypo3Org:YouTube' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'ui' => 
      array (
        'label' => 'YouTube',
        'icon' => 'icon-youtube',
        'inspector' => 
        array (
          'groups' => 
          array (
            'video' => 
            array (
              'label' => 'Video',
              'position' => 50,
            ),
          ),
        ),
      ),
      'properties' => 
      array (
        'video' => 
        array (
          'type' => 'string',
          'defaultValue' => '',
          'ui' => 
          array (
            'label' => 'Youtube video ID',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'video',
            ),
          ),
        ),
        'width' => 
        array (
          'type' => 'integer',
          'defaultValue' => 400,
          'ui' => 
          array (
            'label' => 'Width',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'video',
            ),
          ),
        ),
        'height' => 
        array (
          'type' => 'integer',
          'defaultValue' => 300,
          'ui' => 
          array (
            'label' => 'Height',
            'reloadIfChanged' => true,
            'inspector' => 
            array (
              'group' => 'video',
            ),
          ),
        ),
      ),
    ),
    'TYPO3.NeosDemoTypo3Org:Carousel' => 
    array (
      'superTypes' => 
      array (
        0 => 'TYPO3.Neos:Content',
      ),
      'childNodes' => 
      array (
        'carouselItems' => 
        array (
          'type' => 'TYPO3.Neos:ContentCollection',
        ),
      ),
      'ui' => 
      array (
        'label' => 'Carousel',
        'group' => 'plugins',
        'icon' => 'icon-picture',
        'inlineEditable' => true,
      ),
    ),
  ),
);