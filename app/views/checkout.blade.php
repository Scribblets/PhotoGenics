@extends('layouts.default')

@section('body')
	@include('layouts.header')
	@include('layouts.logo')
	@include('layouts.navigation')
	
	<div class="wrapper">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">View Cart</h4>
				</div>
				<!-- Delete = Index... Delete from session at index ... -->
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						@if (Session::has('cart.prints'))
							@if (Session::get('cart.count') > 0)
								<table class="table">
									<thead>
										<tr>
											<th>Preview</th>
											<th>ID#</th>
											<th>Title</th>
											<th>Artist</th>
											<th>Dimensions</th>
											<th>Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@for($i = 0; $i < Session::get('cart.count'); $i++)
											<tr>
												<td><img src="{{ $prints[$i]['path'] }}" /></td>
												<td>#{{ $prints[$i]['id'] }}</td>
												<td>{{ $prints[$i]['title'] }}</td>
												<td>{{ $prints[$i]['artist'] }}</td>
												<td>{{ $prints[$i]['dimensions'] }}</td>
												<td>{{ $prints[$i]['price'] }}</td>
												<td class="qty-td"><a href="/cart/delete/{{ $i }}"><button class="btn btn-danger btn-delete-item" type="button"><i class="fa fa-times"></i></button></a></td>
											</tr>
										@endfor
									</tbody>
								</table>
								
								<div class="total">
									<h3>Total: ${{ Session::get('cart.total') }}</h3>
									<div class="button-group">
										<button type="button" class="btn btn-success prev-next">Proceed to Checkout</button>
									</div>
								</div>
							@else
								<p class="cartEmpty">You don't have any items in your cart!</p>
							@endif
						@else
							<p class="cartEmpty">You don't have any items in your cart!</p>
						@endif
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">Billing &amp; Shipping Information</h4>
				</div>
				
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">						
						<form id="checkout-form">
							
							<div class="alert alert-danger" role="alert"><b>Oops!</b> There was an error processing your order! Please try again.</div>
							
							<!-- Shipping Information -->
							<div class="shipping-information">
								<p><b>Shipping Information</b></p>
								
								<div>
									<div class="form-group fname">
										<label for="tf_checkout_firstname">First Name:</label>
										<input type="text" class="form-control" id="tf_checkout_firstname" name="tf_checkout_firstname" placeholder="First Name" val="">
									</div>
									
									<div class="form-group fname">
										<label for="tf_checkout_lastname">Last Name:</label>
										<input type="text" class="form-control" id="tf_checkout_lastname" name="tf_checkout_lastname" placeholder="Last Name" val="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="tf_checkout_email">Email:</label>
									<input type="email" class="form-control" id="tf_checkout_email" name="tf_checkout_email" placeholder="Email" val="">
								</div>
								
								<div class="form-group">
									<label for="tf_checkout_address">Address:</label>
									<input type="text" class="form-control" id="tf_checkout_address" name="tf_checkout_address" placeholder="Address" val="">
								</div>
								
								<div class="form-group">
									<div class="form-group city">
										<label for="tf_checkout_city">City:</label>
										<input type="text" class="form-control" id="tf_checkout_city" name="tf_checkout_city" placeholder="City" val="">
									</div>
									
									<div class="form-group state">
										<label for="tf_checkout_state">State:</label>
										<input type="text" class="form-control" id="tf_checkout_state" name="tf_checkout_state" placeholder="XX" maxlength="2" val="">
									</div>
									
									<div class="form-group zip">
										<label for="tf_checkout_zip">Zip Code:</label>
										<input type="text" class="form-control" id="tf_checkout_zip" name="tf_checkout_zip" placeholder="XXXXX" maxlength="5" val="">
									</div>
								</div>
							</div>
							
							
							
							<!-- Credit Card Information -->
							<div class="credit-card-information">
								<p><b>Credit Card Information</b></p>
								
								<div class="form-group">
									<label for="tf_checkout_ccNumber">Card Number:</label>
									<input type="text" data-stripe="number" class="form-control" id="tf_checkout_ccNumber" placeholder="Credit Card Number" maxlength="16" val="">
								</div>
								
								<div class="form-group">
									<div class="form-group cc-exp-date">
										<label for="tf_checkout_ccExpMonth" class="cc-exp-date-label">Expiration Date:</label>
										<input type="text" data-stripe="exp-month" class="form-control" id="tf_checkout_ccExpMonth" placeholder="MM" maxlength="2" val=""> / 
										<input type="text" data-stripe="exp-year" class="form-control" id="tf_checkout_ccExpYear" placeholder="YYYY" maxlength="4" val="">
									</div>
									
									<div class="form-group cc-code">
										<label for="tf_checkout_ccCode">CVC:</label>
										<input type="text" data-stripe="cvc" class="form-control" id="tf_checkout_ccCode" placeholder="123" maxlength="3" val="">
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="form-group cc-total">
									<p>*A total of <b>${{ Session::get('cart.total') }}</b> will be charged to your credit card.</p>
								</div>
								
								<div class="button-group">
									<button type="button" class="btn btn-default prev-next">Edit Cart</button>
									<button type="submit" id="placeOrder" class="btn btn-success" disabled="true">Place Order</button>
								</div>
							</div>
						</form>						
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">Order Confirmation</h4>
				</div>
				
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<div id="confirmation">
							<div class="alert alert-success" role="alert"><b>Success!</b> Your order number is <b>#591392</b>.</div>
							<h3>Thank You!</h3>
							<p>Thank you for your order. The details are below:</p> 
							<p><b>Order ID:</b> <code>#591392</code></p>
							<p><b>Date:</b> 01/10/2015</p>
							<p><b>Total:</b> $19.98</p>
							<p><b>Items:</b></p>
							<ul>
								<li>Item #214121 - Kitty Print by Jebus Krist Qty. 1 - $9.99</li>
								<li>Item #612510 - Cats Print by Jebus Krist Qty. 1 - $9.99</li>
							</ul>
							
							<p><b>Billing Information:</b></p>
							<ul>
								<li>Name - Lindsay Roberts</li>
								<li>Email - lrroberts0122@gmail.com</li>
								<li>Address - 5584 Century 21 Blvd. #121, Orlando, FL 32807</li>
								<li>Card - Ending in <code>x1001</code></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End, Panel Group -->
	</div> <!-- End, Wrapper -->

	@include('layouts.login')
	@include('layouts.register')

	@section('footer')
	@parent
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script>
			Stripe.setPublishableKey('pk_test_byl39OOJq9GcVZZSanaY9aUv');

			function stripeResponseHandler(status, response){

				var $form = $('#checkout-form');

				console.log("Second step happened.");

				if(response.error){
					$form.find('#payment-errors').text(response.error.message).show();
					$form.find('#placeOrder').prop('disabled', false);
				} else {
					var token = response.id;
					$form.append($('<input type="hidden" name="stripeToken" />').val(token));
					$form.get(0).submit();

					console.log(token);
				}
			}

			$('#placeOrder').on('click', function(e){
				e.preventDefault();
				var $form = $('#checkout-form');
				$form.find('#payment-errors').hide();
				$form.find('#placeOrder').prop('disabled', true);
				Stripe.createToken($form, stripeResponseHandler);
				return false;
				console.log("First step happened.");

			});


		</script>
	@stop

@stop