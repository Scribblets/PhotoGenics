<?php

class Order extends Eloquent {
	
	protected $table = 'orders';
	protected $fillable = ['order_id',
							'user_id',
							'firstname',
							'lastname',
							'email',
							'address',
							'city',
							'state',
							'zip',
							'total',
							'status'];
	
	public function User(){
		return $this->belongsTo('User');
	}

	public function Orders(){
		return $this->hasMany('OrderItems');
	}

}