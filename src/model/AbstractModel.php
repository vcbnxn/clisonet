<?php
/**
 * AbstractModel.php
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */

/**
 * This class defines the mandatory elements of all Model classes.
 * These classes are used for interacting with the model.
 * Since each class has different attributes, there's not a lot 
 */
abstract class AbstractModel
{
	/**
	* Returns a string representation of the current object.
	* By default it is a concatenation of all getters for the class.
	* @return string - 1 for success
	*/
	abstract public function toString(){
		$s = '';
		$methods = get_clas_methods($this);
		
		foreach ($methods as $method_name){
			if strpos($method_name, 'get') == 0){ //begins with 'get', such as 'getUser()'
				$s = $s . '\n' . $this->$method_name;
				}
		}		
		return $s;
	}
}