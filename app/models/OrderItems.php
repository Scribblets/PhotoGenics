<?php

class OrderItems extends Eloquent {
	
	protected $table = 'ordersitems';
	protected $fillable = ['order_id','print_id','price'];
	
	public function User(){
		return $this->belongsTo('Order');
	}

}