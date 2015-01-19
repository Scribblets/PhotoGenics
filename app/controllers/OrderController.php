<?php

class OrderController extends BaseController {
	
	public function create_order() {

	}
	
	public function read_order() {
		
	}

	public function process_stripe($id){
		// Set the API key    
		Stripe::setApiKey(Config::get('laravel-stripe::stripe.api_key'));

		$download = Download::find($id);

        // Get the credit card details submitted by the form
		$token = Input::get('stripeToken');

        // Charge the card
		try {
			$charge = Stripe_Charge::create(array(
				"amount" => $download->price,
				"currency" => "usd",
				"card" => $token,
				"description" => 'Order: ' . $download->name)
			);

            // If we get this far, we've charged the user successfully

			Session::put('order_complete_id', $download->id);
			return Redirect::to('/checkout');

		} catch(Stripe_CardError $e) {
        	// Payment failed
        	Session::put('order_complete_id', 'error';
			return Redirect::to('/checkout')
		}
	}

}