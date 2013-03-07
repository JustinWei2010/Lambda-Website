<?php	

require_once('Config.php');

//Set error report
if (defined('DEBUG_ON'))
{
	switch (DEBUG_ON)
	{
		case true:
			error_reporting(E_ALL);
		break;
	
		case false:
			error_reporting(0);
		break;

		default:
			die('The debug environment is not set correctly.');
	}
}

require_once (FAYUM_BASE_PATH . '/'. SYSTAM_PATH. '/Fayum.php');