<?php

class CartController extends BaseController {	
	public function add_to_cart($print_id) {
		$print = Prints::whereId($print_id)->first();
		$user  = User::whereId($print->user_id)->first();
		
		$new_print = array(
			'id'		  => $print->id,
			'path'		  => $print->path,
			'user_id'	  => $print->user_id,
			'artist'	  => $user->firstname . " " . $user->lastname,
			'title'		  => $print->title,
			'dimensions'  => $print->dimensions,
			'price'		  => $print->price
		);
				
		Session::push('cart.prints', $new_print);
		$session = Session::get('cart.prints');
		$count = count($session);
		Session::put('cart.count', $count);
		
		if(Session::has('cart.total')) {
			$total = Session::get('cart.total');
			$total += $print->price;
		} else {
			$total = $print->price;
		}
		Session::put('cart.total', $total);
		return Redirect::to('/checkout');
	}
	
	public function delete_from_cart_by_index($index) {
		$index = intval($index);
		
		$prints = Session::get('cart.prints');
		$count = Session::get('cart.count');
		$total = Session::get('cart.total');
		
		$count = $count - 1;
		$total = $total - $prints[$index]['price'];
		
		unset($prints[$index]);
		Session::forget('cart.prints');
		
		foreach($prints as $print) {
			Session::push('cart.prints', $print);
		}
		
		$new_prints = Session::get('cart.prints');
		Session::put('cart.count', $count);
		Session::put('cart.total', $total);
		
		return Redirect::to('/checkout');
	}
	
	public function read_all() {
		$prints = Session::get('cart.prints');
		$data['prints'] = $prints;	
		return View::make('checkout')->with($data);
	}
}