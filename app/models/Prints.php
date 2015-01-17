<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Prints extends Eloquent implements UserInterface, RemindableInterface {
	
	// Do we need this for the Prints class?
	use UserTrait, RemindableTrait;
	
	protected $table = 'prints';
}