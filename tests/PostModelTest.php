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
	$post = new Post();
	
	//set the User
	$post->setUser('Bob');
	
	//Confirm getUser() returns the same value
	$this->assertEquals('Bob', $post->getUser());
    }

    public function testGetTimestamp()
    {
	//create an instance of Post
	$post = new Post();
	
	//create an instance of PostManager
	$post_manager = new PostManager();
	
	//give post essentil values
	$post->setUser('Bob');
	$post->setContents('Hello World!');
	
	//Confirm getTimestamp() returns a null value before saved
	assertEquals($post->getTimestamp(), null);
	
	//save Post
	$post_manager->create($post);
	
	//Confirm getTimestamp() returns a unix time stamp that matche's today's day/month/year
	$returned_timestamp = $post->getTimestamp();
	
	$current_timestamp = time();
	
	assertEquals(date('d-m-Y', $current_timestamp), date('d-m-Y', $timestamp_timestamp));
    }    
	
	public function testSetAndGetContents()
    {	
	//create an instance of Post
	$post = new Post();
	
	//set the Contents
	$post->setContents('Hello World!')
	
	//Confirm getContents() returns the same value	
	assertEquals($post->getContents(), 'Hello World!');
    }
}