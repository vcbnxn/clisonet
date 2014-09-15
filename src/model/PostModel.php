<?php
/**
* This class implements AbstractModel to provide Text posts.
* @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
*/
class PostModel extends AbstractModel
{
	private $username;
	private $timestamp;
	private $contents;

	/**
	* Accessor for $username.
	*/
    public function setUser($username){
		$this->username = $username;
	}
    
	/**
	* Accessor for $username.
	*/	
	public function getUser(){
		return $this->username;
	}
	
	/**
	* Accessor for $timestamp.
	*/	
	public function getTimestamp(){
		return $this->tiemstamp;
	}	
	
	/**
	* Accessor for $contents.
	*/
    public function setContents($contents){
		$this->contents = $contents;
	}
    
	/**
	* Accessor for $username.
	*/	
	public function getContents(){
		return $this->contents;
	}	
}

?>