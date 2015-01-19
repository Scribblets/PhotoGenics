<?php

class OrderItems extends Eloquent {
	
	protected $table = 'order_items';
	protected $fillable = ['order_id','user_id','print_id','price'];
	
	public function Orders(){
		return $this->belongsTo('Orders');
	}

}