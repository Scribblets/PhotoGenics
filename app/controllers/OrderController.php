<?php

class OrderController extends BaseController {
	
	public function create_order() {

	}
	
	public function read_order() {
		
	}

	public function process_stripe($id){
		$orders = array();
		
		$customer_data = array(
			'firstname' => Input::get('tf_checkout_firstname'),
			'lastname' => Input::get('tf_checkout_lastname'),
			'email' => Input::get('tf_checkout_email'),
			'address' => Input::get('tf_checkout_address'),
			'city' => Input::get('tf_checkout_city'),
			'state' => Input::get('tf_checkout_state'),
			'zip' => Input::get('tf_checkout_zip')
			// We will need the last four of cards when Stripe is working...
			// 'card' => !!!
		);
		
		echo "CUSTOMER DATA: <br><br>";
		echo "Name: " . $customer_data['firstname'] . " " . $customer_data['lastname'] . "<br>";
		echo "Email: " . $customer_data['email'] . "<br>";
		echo "Address: " . $customer_data['address'] . " " . $customer_data['city'] . " " . $customer_data['state'] . " " . $customer_data['zip'] . "<br><br>";
		
		foreach(Session::get('cart.prints') as $session_print) {
			$order = array(
				'order_id'	=> $id,
				'user_id'	=> $session_print['user_id'],
				'print_id'	=> $session_print['id'],
				'price'		=> $session_print['price'],
				'status'	=> 0
			);
			
			array_push($orders, $order);
			echo "CREATED ORDER: <br><br>";
			echo "Order: #" . $order['order_id'] . "<br>";
			echo "User ID: " . $order['user_id'] . "<br>";
			echo "Print ID: " . $order['print_id'] . "<br>";
			echo "Price: $" . $order['price'] . "<br>";
			echo "Status: " . $order['status'] . "<br><br>";
			// $newOrder = Orders::create($order_data);
		}
		
		var_dump($orders);
		// Set the API key    
		//Stripe::setApiKey(Config::get('laravel-stripe::stripe.api_key'));

		// $download = Download::find($id);

        // Get the credit card details submitted by the form
		//$token = Input::get('stripeToken');

        // Charge the card
/*
		try {
			$charge = Stripe_Charge::create(array(
				"amount" => Session::get('cart.total'),
				"currency" => "usd",
				"card" => $token,
				"description" => 'Order: ' . $id)
			);
*/

            // If we get this far, we've charged the user successfully

			// Session::put('order_complete_id', $id);
			// echo "SUCCESS!";
			//return Redirect::to('/checkout');

			//	For the purposes of notifications, will need to loop through all prints ordered and enter them into the DB....
			/*
foreach(Session::get('cart.prints') as $session_print) {
				$order_data = array(
					'order_id'	=> $id,
					'user_id'	=> $session_print['user_id'],
					'print_id'	=> $session_print['id'],
					'price'		=> $session_print['price'],
					'status'	=> 0
				);
				
				var_dump($order_data);
				echo "<br><br>";
				// $newOrder = Orders::create($order_data);
			}
*/
/*
		} catch(Stripe_CardError $e) {
        	// Payment failed
        	Session::put('order_complete_id', 'error');
        	echo "FAIL!";
			// return Redirect::to('/checkout')
		}
*/
	}

}

// Things to Consider:
// On SUCCESS:
// - Remove Cart from Session
// - Remove 'order_complete_id' from Session
// On ERROR:
// - Add Error to 'order_complete_id'