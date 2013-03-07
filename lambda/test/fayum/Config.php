<?php
	define('FAYUM_BASE_PATH', dirname(__FILE__));
	define('SYSTAM_PATH', 'core');
	define('DEBUG_ON',true); // toggles if you want debug mode on/off
	define('CASCADING_LOGIN', False); 	// toggle if you want to be able to freely move within various "modes" withou
										// having to login each time (assuming you have logged in higher mode)
	
	// 1 - all queries
	// 2 - write-only
	define('FAYUM_QUERY_LOGGING', 2);
	
	// Passwords for the login
	// temporary disable for maintenance **
	define('PASSWORD_VIEW', 'dig4Bones');
	define('PASSWORD_INPUT', 'add2Pottery');
	// define('PASSWORD_INPUT', 'CANTTOUCHTHIS');
	define('PASSWORD_ADMIN', 'move1Earth');
	// define('PASSWORD_ADMIN', 'SUPERNOVA');
	define('PASSWORD_BROWSE', '12435'); // we don't use this one
	
	// authentication status
	define('AUTH_BROWSE', 1);
	define('AUTH_VIEW', 2);
	define('AUTH_INPUT', 3);
	define('AUTH_ADMIN', 4);
	
	// disable DB login for now
	
	// DB login info
/*testing 
	define('DB_HOST', 'localhost');
	define('DB_USER', 'fayumweb');
	define('DB_PASSWORD', 'Find-Bones');
	define('DB_DBASE', 'fayum');

*/

//testing use lalambdas
	define('DB_HOST', 'lambdas.db');
	define('DB_USER', 'lalambdas');
	define('DB_PASSWORD', 'apiteoda');
	define('DB_DBASE', 'lambdas');
