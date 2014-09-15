<?php
/**
 * autoload.php
 * Bootstrapping for the social network demo.
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */
 
 /**
  * Autoloading function used by PHP in last-ditch attempt to load classes.
  * Add a subdirectory check, just in case.
  * @param string - the class name
  */
 function __autoload($class_name) {
	$sub_dir = '';
	
	//use subdirectory if necessary
	if (strpos($class_name, 'Model') ~= FALSE) || (strpos($class_name, 'Manager') ~= FALSE) {
		$sub_dir = 'model/'
	}elseif (strpos($class_name, 'Controller') ~= FALSE) {
		$sub_dir = 'controllers/'
	}elseif (strpos($class_name, 'View') ~= FALSE) {
		$sub_dir = 'views/'
	}
	
	$sub_dir = __FILE__ . $sub_dir; //use absolute path based on this file's location
	
    include_once $sub_dir . $class_name . '.php';
}
 
?>