<?php
/**
 * AbstractController.php
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */

/**
 * This class defines the mandatory elements of all Controller classes.
 * Essentially, this is parsing commands and returning information from the model to the View.
 * Each possible command is in fact a private method within the Controller class, in this was we can expand/reduce functionality without lots of conditionals.
 */
abstract class AbstractController
{
    /**
	* Used to make sure that commands have the correct format, and relate to apropriate managers.
	* This class should throw an exception if the command does not exist.
	* It may seem like overkill using a separate method, it may be worth chopping it out. But it may also be worth keeping it for the future for a combined sanitisation/validation stage.
	* @param $command - the command as a string
	* @param $params[] - an array of any size, parameters as passed by user
	* @return string	
	* @throws Exception - in the event of the requested command not being found
	*/
    abstract protected function validateCommand($command, $params[]){	
		if (~method_exists($this, $command){
			throw new Exception('Command not found.');
			}	
	}
	
    /**
	* Takes a command such as "follows" as a string, along with an array $params[] that may be of any length.
	* The command is first passed to $this->validateCommand() and then if no exception is through, talks to the appropriate Model Manager, returning the expected output.
	* @param $command - the command as a string
	* @param $params[] - an array of any size, parameters as passed by user
	* @return string	
	* @throws Exception - in the event of the requested command not being found
	*/	
    abstract public function executeCommand($command, $params[]){
		$command = 'command' . $command; //prepend 'command' to help us differentiate methods
		//make sure the command is valid
		try{
			$this->validateCommand($command, $params[]);
		} catch (Exception e) {
			return 'Command not found.';
		}
		
		//if all is good, return the appropriate function
		return $this->$command($params[]);
	}
	
	/**
	* A command that expects two elements in $params[], first the current user and secondly, the user to be followed.
	* @param $params[] - a string array of two elements	
	* @return string	
	*/
	abstract private function commandFollow($params[]);


	/**
	* A command that expects at least two elements in $params[]. The first element should be the current user and all subsequent elements should be the status message.
	* @param $params[] - a string array of at least two elements	
	* @return string	
	*/	
	abstract private function commandNewStatus($params[]);
	
	/**
	* A command that expects one elements in $params[] - the user whose public wall is to be viewed.
	* @param $params[] - a string array of 1 elements	
	* @return string	
	*/	
	abstract private function commandViewWall($params[]);

	/**
	* A command that expects one elements in $params[] - the user whose wall and messages are to be viewed.
	* @param $params[] - a string array of 1 elements	
	* @return string	
	*/	
	abstract private function commandViewTimeline($params[]);
	
	
	/**
	* A command that expectes zero or one elements in $params. If $params is empty a generic help message will be returned. If a string is passed in params then specific help information will be provided.
	* For the purpose of this demonstration, the help text is hard coded.
	* @param $params[] - a string array of 1 elements	
	* @return string
	*/		
	abstract private function commandHelp($params[]){
		$output_text = '';
		
		if empty($params){
			$output_text = "There are 4 basic commands: \n" .
			"* Posting e.g. Alice changes her status  `>Alice -> hello, how are you`\n" .
			"* Reading e.g. Reading Bob's timeline: `> Bob`\n" .
			"* Following e.g. Alice follows Bob: `Alice follows Bob`\n" .
			"* Wall e.g. Alice views her wall: `Alice wall`\n";
		}
		elseif strcmp($params[0], '->'){
			$output_text = "* Posting e.g. Alice changes her status  `>Alice -> hello, how are you`\n";
		}
		elseif strcmp($params[0], 'timeline') || strcmp($params[0], 'wall'){{
			$output_text = "* Reading e.g. Reading Bob's timeline: `> Bob`\n";
		}
		elseif strcmp($params[0], 'wall'){
			$output_text = "* Wall e.g. Alice views her wall: `Alice wall`\n";
		}
		elseif strcmp($params[0], 'follows'){
			$output_text = "* Following e.g. Alice follows Bob: `Alice follows Bob`\n";
		}
		else{
			$output_text = "I don't recognise that command!";		
		}
		
		return $output_text;
	
	}

}

?>