<?php
if (FLOW_PATH_ROOT !== '/home/gcopin/www/neos/demoneos/' || !file_exists('/home/gcopin/www/neos/demoneos/Data/Temporary/Production/Configuration/ProductionConfigurations.php')) {
	unlink(__FILE__);
	return array();
}
return require '/home/gcopin/www/neos/demoneos/Data/Temporary/Production/Configuration/ProductionConfigurations.php';