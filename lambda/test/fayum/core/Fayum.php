<?php if ( ! defined('FAYUM_BASE_PATH')) exit('No direct script access allowed');

/**
 * Main Fayum Website Initialization File
 *
 * Loads the base classes and executes the request.
 *
 */
 
//parse the parameters...
 
 
// Load the file containing common functions
require_once FAYUM_BASE_PATH.'/core/Common.php';

// Load the registry class
require_once FAYUM_BASE_PATH.'/core/Registry.php';

// Load the base session class
require_once FAYUM_BASE_PATH.'/core/Session.php';

// Load the base controller class
require_once FAYUM_BASE_PATH.'/core/Controller.php';

// Load the base Model class
require_once FAYUM_BASE_PATH.'/core/Model.php';

// Load the DB result class
require_once FAYUM_BASE_PATH.'/database/DB_result.php';

function a()
{

}


// Instantiate the requested constroller
if(isset($_GET["controller"])){
	$controller = $_GET["controller"];
}else{
	$controller = 'home';
}

$controllerPath = FAYUM_BASE_PATH . '/application/controllers/'. strtolower($controller) . '.php';

//The first character of the controller name should always be capitalize
$cName = ucfirst(strtolower($controller));

if (!file_exists($controllerPath)){
	die($cName . " is not found!");
}
require_once($controllerPath);

//declare new controller instance
$FY = new $cName; 


// Call the requested method
if(isset($_GET["method"])){
	$method = $_GET["method"];
}else{
	$method = 'index';
}

if (method_exists($FY, $method)){
	call_user_func_array(array($FY,$method), array());
}

// close the DB connection?