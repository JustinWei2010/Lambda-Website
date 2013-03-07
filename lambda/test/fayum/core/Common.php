<?php if ( ! defined('FAYUM_BASE_PATH')) exit('No direct script access allowed');

/**
 * Autoloader
 *
 * auto load control, model, or view files
 *
 * @param	[string] ex. areas_controller, areas_view, areas_model
 * @return	[void]
 */
/*function __autoload($class) 
{

	//position of '_'
	$pos = strpos($class, '_');
	
	//find type of file
	$type = substr($class, $pos+1) . 's'; //return either controller, view, or model
	
	//find file name (omit the type name)
	$className = substr($class, 0, $pos);

	$fullPathName = FAYUM_BASE_PATH . '/application/'. $type . '/' . strtolower($className) . '.php';
	if (file_exists($fullPathName)){
		require_once($fullPathName);
	}else{
		echo $class . " is not found!";
	}

}*/

/**
 * Load Class
 *
 * Retrieve the class in the registry
 *
 * @param	[string] class name
 * @param	[string] class directory
 * @return	class object
 * 
 * Idea came from Codeigniter source code
 */

if ( ! function_exists('load_class'))
{
	function &load_class($class, $directory=''){
		$r = Class_Registry::getInstance();
		
		//if the object already exists in the registry
		if($r->getObject($class) != NULL){
			$object = $r->getObject($class);
			return $object;
		}
		
		//if not, load the files
		$fullPathName = FAYUM_BASE_PATH .'/'. $directory . '/' . strtolower($class) . '.php';
		
		
		if (file_exists($fullPathName)){
			require_once($fullPathName);
		}else{
			die($class . " is not found!");
		}
		$className = ucfirst(strtolower($class));
		
		//put it in the registry
		$r->storeObject($class, new $className());
		
		$object = $r->getObject($class);
		return $object;
	}
}