<?php

class Orders extends Eloquent {
	
	protected $table = 'orders';
	protected $fillable = ['order_id','total','status','firstname','lastname','email','address','city','state','zip','card'];
	
	public function OrderItems(){
		return $this->hasMany('OrderItems');
	}

}