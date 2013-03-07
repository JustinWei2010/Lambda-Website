<?php
/*	File: index.php
	Date: July 03, 2008
	Author: Eddie Lee
	//test
	This page is the "controller" aspect of the MVC. All pages on Fayum are relayed through this page.
*/
	
	session_start();
	require_once('config.php');
	
	// set the default timezone
	date_default_timezone_set('America/Los_Angeles');	
	
	function __autoload($class) {
		// echo $class .'<br />';
		$file = str_replace('_','/',substr($class,5)).'.php';
		$filepath = FAYUM_BASE_PATH.'/includes'.$file;
		if (file_exists($filepath)) {
			require_once($filepath);
		}
	}

	/* 	MODULE
			- Modules are basically the page that you want loaded (for example, we may have a search page module, a view module)
			- If there is no specified module, then it defaults to the "home", which  is sorta like the main or index page
	*/
	if (!isset($_GET['module'])) // if no module inputted, default module is "home"
		$module = 'home';
	else 
		$module = $_GET['module'];
	
	/* 	EVENTS
			- Events are the function that is called by the class/module when it is loaded
			- If there is no specified events, then it defaults to the _default(...) function of the class/module
	*/
	if (isset($_GET['event'])) 
		$event = $_GET['event'];
	else // if no event inputted, default event is "__default()"
		$event = '__default';

	/* 	CLASS
			- Classes are like submodules of a module
			- If there is no specified module, then it defaults to the module name
	*/
	if (isset($_GET['class']))
		$class = $_GET['class'];
	else 
		$class = $module;

	$classDir = FAYUM_BASE_PATH.'/modules/'.$module;
	$classFile = $classDir.'/'.$class.'.php';
	
	if (file_exists($classFile)) {
		require_once($classFile); // load the file that contains the clsas
		
		if (class_exists($class)) {
			$instance = new $class; // create new instance of the class!
			// Does user have permission to view this page?
			if ($instance->authenticate()) {
				try {
					$result = $instance->$event();
					//commenting out to test if changes are made	
					$templateFile = $classDir.'/template/'.$class.'.tpl';
					$instance->templateFile = $templateFile;
					
					if (DEBUG_ON) // print debug info if on
						print_debug($module, $class, $classFile, $event, $templateFile);
					require_once(FAYUM_BASE_PATH.'/header.php'); // print header

					//adding javascript
					$instance->displayErrors();
					
					if (file_exists($instance->templateFile)) {
						$instance->display();
					}
					else {
						die("Template file '$templateFile' not found!");
					}
					
					require_once(FAYUM_BASE_PATH.'/footer.php'); // print footer
				}
				catch (Exception $error) {
					die($error->getMessage());
				}
			}
			else { // no permission to view page
				//echo "You do not have the permission to view this page.";
				header("Location: ?module=user&class=login&event=view");
				exit;
			}
		}
		else {
			die("Could not load class: $class");
		}
	}
	else {
		die("Class file '$classFile' does not exist");
	}
?>
