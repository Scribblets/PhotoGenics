@extends('layouts.default')

@section('body')
	@include('layouts.header')
	
	<div class="wrapper">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">View Cart</h4>
				</div>
				
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Preview</th>
									<th>Item ID</th>
									<th>Item Title</th>
									<th>Item Artist</th>
									<th>Qty.</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="http://placekitten.com/g/30/30" /></td>
									<td>#12345</td>
									<td>Kitty</td>
									<td>Jebus Krist</td>
									<td class="qty-td">
										<input type="number" max="10" min="1" value="1" class="form-control input-qty" placeholder="Qty." />
										<button class="btn btn-danger btn-delete-item" type="button"><i class="fa fa-times"></i></button>
									</td>
									<td>$9.99</td>
								</tr>
								
								<tr>
									<td><img src="http://placekitten.com/g/30/30" /></td>
									<td>#12345</td>
									<td>Kitty</td>
									<td>Jebus Krist</td>
									<td class="qty-td">
										<input type="number" max="10" min="1" value="1" class="form-control input-qty" placeholder="Qty." />
										<button class="btn btn-danger btn-delete-item" type="button"><i class="fa fa-times"></i></button>
									</td>
									<td>$9.99</td>
								</tr>
							</tbody>
						</table>
						
						<div class="total">
							<h3>Total: $19.98</h3>
							<div class="button-group">
								<button type="button" class="btn btn-success prev-next">Proceed to Checkout</button>
							</div>
						</div>
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
										<label for="firstname">First Name:</label>
										<input type="text" class="form-control" id="firstname" placeholder="First Name" val="">
									</div>
									
									<div class="form-group fname">
										<label for="lastname">Last Name:</label>
										<input type="text" class="form-control" id="lastname" placeholder="Last Name" val="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" class="form-control" id="email" placeholder="Email" val="">
								</div>
								
								<div class="form-group">
									<label for="address">Address:</label>
									<input type="text" class="form-control" id="address" placeholder="Address" val="">
								</div>
								
								<div class="form-group">
									<div class="form-group city">
										<label for="city">City:</label>
										<input type="text" class="form-control" id="city" placeholder="City" val="">
									</div>
									
									<div class="form-group state">
										<label for="state">State:</label>
										<input type="text" class="form-control" id="state" placeholder="XX" maxlength="2" val="">
									</div>
									
									<div class="form-group zip">
										<label for="zip">Zip Code:</label>
										<input type="text" class="form-control" id="zip" placeholder="XXXXX" maxlength="5" val="">
									</div>
								</div>
							</div>
							
							
							
							<!-- Credit Card Information -->
							<div class="credit-card-information">
								<p><b>Credit Card Information</b></p>
								
								<div class="form-group">
									<label for="cc-number">Card Number:</label>
									<input type="text" class="form-control" id="cc-number" placeholder="Credit Card Number" maxlength="16" val="">
								</div>
								
								<div class="form-group">
									<div class="form-group cc-exp-date">
										<label for="cc-exp-month" class="cc-exp-date-label">Expiration Date:</label>
										<input type="text" class="form-control" id="cc-exp-month" placeholder="MM" maxlength="2" val=""> / 
										<input type="text" class="form-control" id="cc-exp-year" placeholder="YYYY" maxlength="4" val="">
									</div>
									
									<div class="form-group cc-code">
										<label for="cc-code">CSC:</label>
										<input type="text" class="form-control" id="cc-code" placeholder="123" maxlength="3" val="">
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="form-group cc-total">
									<p>*A total of <b>$19.98</b> will be charged to your credit card.</p>
								</div>
								
								<div class="button-group">
									<button type="button" class="btn btn-default prev-next">Edit Cart</button>
									<button id="placeOrder" type="button" class="btn btn-success" disabled="true">Place Order</button>
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
							<div id="confirmation-content">
								<h3>Order Receipt!</h3>
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
							<button type="button" class="btn btn-default" id="print-confirmation"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End, Panel Group -->
	</div> <!-- End, Wrapper -->
	
	@include('layouts.login')
	@include('layouts.register')
@stop