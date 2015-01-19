<?php

class Order extends Eloquent {
	
	protected $table = 'orders';
	protected $fillable = ['id','order_id','user_id','print_id','price','status'];
	
	public function User(){
		return $this->belongsTo('User');
	}

}