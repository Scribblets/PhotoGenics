<?php

class Prints extends Eloquent {
	
	protected $table = 'prints';
	protected $fillable = ['path','user_id','title','category','price','dimensions','description'];
	
	public function User(){
		return $this->belongsTo('User');
	}
}