<?php
/**
* This PHPUnit test tests the public functions of model/PostModel.php
* @author Jonathan Roscoe <vcbnxn@alt42.co.uk>
*/

class PostModelTest extends PHPUnit_Framework_TestCase
{
    public function testSetAndGetUser()
    {
	//create an instance of Post
	
	//set the User
	
	//Confirm getUser() returns the same value
    }

    public function testGetTimestamp()
    {
	//create an instance of Post
	
	//create an instance of PostManager
	
	//Confirm getTimestamp() returns a null value before saved
	
	//save Post
	
	//Confirm getTimestamp() returns a unix time stamp that matche's today's day/month/year
    }    
	
	public function testSetAndGetContents()
    {	
	//create an instance of Post
	
	//set the Contents
	
	//Confirm getContents() returns the same value	
    }
}