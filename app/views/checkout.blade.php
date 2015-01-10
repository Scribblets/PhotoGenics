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
										<form class="qty-form">
											<div class="input-group">
												<input type="number" max="10" min="1" value="1" class="form-control input-qty" placeholder="Qty." />
												<span class="input-group-btn">
													<button class="btn btn-primary" type="button"><i class="fa fa-check"></i></button>
												</span>
											</div>
										</form>
										
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
										<form class="qty-form">
											<div class="input-group">
												<input type="number" max="10" min="1" value="1" class="form-control input-qty" placeholder="Qty." />
												<span class="input-group-btn">
													<button class="btn btn-primary" type="button"><i class="fa fa-check"></i></button>
												</span>
											</div>
										</form>
										
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="button-group">
							<button type="button" class="btn btn-default prev-next">Edit Cart</button>
							<button id="placeOrder" type="button" class="btn btn-success" disabled="true">Place Order</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">Order Confirmation</h4>
				</div>
				
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<h3>Thank you!</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
			</div>
		</div> <!-- End, Panel Group -->
	</div> <!-- End, Wrapper -->
	
	@include('layouts.login')
	@include('layouts.register')
@stop