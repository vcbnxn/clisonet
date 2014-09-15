<?php
/**
 * AbstractManager.php
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */

/**
 * This class defines the mandatory elements of all Manager classes.
 * These classes are used for interacting with the model.
 * In reality we would expect full CRUD and powerful searching options, authentication, etc. But for demonstrative purposes we are only concerned with creation and retrieval.
 */
abstract class AbstractManager
{
	/**
	* A function that stores a new object (such as a Post or User).
	* @param $object - the data to be stored
	* @return int - 1 for success
	*/
	abstract public function create($object);
	
	/**
	* A function to retrieve all of the objects held for a specific user.
	* @param $object - the data to be stored
	* @return int - 1 for success
	*/
	abstract public function retrieveAllForUser($user);
}