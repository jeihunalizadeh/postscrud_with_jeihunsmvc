<?php 
//require config file
require_once 'config/config.php';
//require helpers
require_once 'helpers/url_helper.php';

//autoload for libraries
spl_autoload_register(function($className){
	require_once 'libraries/' . $className . '.php';
});







 ?>