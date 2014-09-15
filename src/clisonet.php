#!/usr/bin/php
<?php
/**
 * clisonet.php
 * This script insantiates a command line version of the social network demo. It is the main entry point of the program.
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */
 
 require_once('autoload.php');
  
 
//setup
$input_handle = fopen("php://stdin","r");
cli = new CliView();


 /**
 * This function asks the user some questions and creates a new user.
 */
 function makeNewUser(){
	$username = getUserInput('Name: \n');
 }
 
 
 
 //begin
 sprintf('Welcome to clisonet.\n As the program has just started, please create a new user..\n');
 makeNewUser();
 
 //main executation loop
 //PHP allows the use of strings in switches, so this is a straightforward way of making menus
	 while TRUE{
		//display a cursor > to let user know we're waiting for input
		$user_input = getUserInput('> ');
		
		//send the command to the View class, which will return it nicely formatted
		$result = $cli->parseCommand($user_input);
		
		//print the result
		sprintf($result);
		
	}	
 }
 
?>