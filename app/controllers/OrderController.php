<?php

class OrderController extends BaseController {
	
	public function create_order() {

	}
	
	public function read_order() {
		
	}

	public function process_stripe($id){		
		// Set the API key
		Stripe::setApiKey('sk_test_B7Lr5iLGyZNSP7Zv6bapH1ZV');

		// $download = Download::find($id);

        // Get the credit card details submitted by the form
		$token = Input::get('tf_token');
		$amount = Session::get('cart.total') * 100;

        // Charge the card
		try {
			$charge = Stripe_Charge::create(array(
				"amount" => $amount,
				"currency" => "usd",
				"card" => $token,
				"description" => 'Order: ' . $id)
			);
			
			$order = array(
				'order_id' => $id,
				'total' => Session::get('cart.total'),
				'status' => 0,
				'firstname' => Input::get('tf_checkout_firstname'),
				'lastname' => Input::get('tf_checkout_lastname'),
				'email' => Input::get('tf_checkout_email'),
				'address' => Input::get('tf_checkout_address'),
				'city' => Input::get('tf_checkout_city'),
				'state' => Input::get('tf_checkout_state'),
				'zip' => Input::get('tf_checkout_zip'),
				'card' => Input::get('tf_lastFour')
			);
			
			$new_order = Orders::create($order);
			
			$order['date'] = date("F j, Y, g:i a"); 
			
			$order_items = array();
			foreach(Session::get('cart.prints') as $session_print) {
				$order_item = array(
					'order_id'	=> $id,
					'user_id'	=> $session_print['user_id'],
					'print_id'	=> $session_print['id'],
					'price'		=> $session_print['price']
				);
				
				$new_order_item = OrderItems::create($order_item);
				
				$print = Prints::whereId($session_print['id'])->first();
				$user  = User::whereId($print->user_id)->first();
				
				$order_item['artist'] = $user->firstname . " " . $user->lastname;
				$order_item['title'] = $print->title;
				
				array_push($order_items, $order_item);
			}
			
			$data['order'] = $order;
			$data['order_items'] = $order_items;
			
			Session::forget('cart.prints');
			Session::forget('cart.count');
			Session::forget('cart.total');

			return View::make('confirmation')->with($data);

		} catch(Stripe_CardError $e) {
        	// Payment failed
        	Session::put('order.error', true);
        	var_dump($e);
			return Redirect::to('/checkout');
		}
	}

}