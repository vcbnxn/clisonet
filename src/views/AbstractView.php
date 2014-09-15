<?php
/**
 * AbstractView.php
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */

/**
 * This class defines the mandatory elements of all View classes.
 * They are used to take user input and return it in appropriate format.
 */
abstract class AbstractView{
	/**
	* The parseCommand() function must parse user input and remove irrelvant details such as whitespace, and translate user conventions into appropriate method functions (such as turning -> into NewStatus).
	* Before returning values, everything should be parsed through formatOutput().
	* @param $command - the command as given by the user
	*/
	abstract public function parseCommand($user_input){
		$user = array_shift($user_input); //the first word in the string will be the  user
		$command = array_shift(strtolower($user_input[1])); //the second word in the string command, e.g. ->, wall, help
		$params = $user_input;
	
	}
	
	/**
	* Inteprets results from the execuation of a command and returns them to the caller in an appropriate format for delivery to end users.
	* @param $output - the information to be delivered to the user
	*/
	abstract protected function formatOutput($output);
	
	/**
	* Requests a single value form the user.
	* @param string - a display message
	* @param string
	*/
	abstract public function getUserInput($message){
		sprintf($message);
		$user_input = trim(fgets($handle)); //use trim to get rid of whitespace
		return $user_input; 
	}
}