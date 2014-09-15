<?php
/**
 * PostManager.php
 * @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
 */

/**
 * This class defines the mandatory elements of all Manager classes.
 * These classes are used for interacting with the model.
 * In reality we would expect full CRUD and powerful searching options, authentication, etc. But for demonstrative purposes we are only concerned with creation and retrieval.
 */
abstract class AbstractManager
{
	private $posts[];

	/**
	* A function that stores a new Post.
	* We might choose to store this in a database or similar, but in this case we just put it into an array.
	* @param $object - the Post to be stored
	* @return int - 1 for success
	*/
	public function create(Post $p){
		return array_push($this->posts, $p) > 0;
	}
	
	/**
	* A function to retrieve all of the Posts held for a specific user.
	* @param $object - the data to be stored
	* @return int - 1 for success
	*/
	public function retrieveAllForUser(User $user){
		$return_arr[];

		//loop through every post
		foreach($this->posts as $post){
			if ($post->getUser()->getUsername() === $user->getUsername()){
				array_push($return_arr, $post); //append to output array
			}
		}
		return $return_array;
	}
}
