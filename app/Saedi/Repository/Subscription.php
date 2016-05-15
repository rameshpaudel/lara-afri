<?php 

namespace App\Saedi\Repository;

interface Subscription
{

	/**
	* Adding a subscription to User
	*
	*/
	public function add($plan,$time)
	/**
	* Removing a subscription form a user
	*
	**/
	public function remove($plan)
	/**
	* Extending the time for the subscription
	*
	**/
	public function extend($time)
	
	/**
	* 
	* Upgrade to another subscription 
	*/
	public function upgrade($plan)
	
}