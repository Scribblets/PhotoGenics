@extends('layouts.default')

@section('body')
	@include('layouts.header')
	@include('layouts.logo')
	@include('layouts.navigation')
	
	<div class="wrapper">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">Order Confirmation</h4>
				</div>
				
				<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<div id="confirmation">
							<div class="alert alert-success" role="alert"><b><i class="fa fa-check"></i></b> Your order number is <b>#{{$order['order_id']}}</b>.</div>
							<h3>Thank You!</h3>
							<p>Thank you for your order. The details are below:</p> 
							<p><b>Order:</b> <code>#{{$order['order_id']}}</code></p>
							<p><b>Date:</b> {{$order['date']}}</p>
							<p><b>Total:</b> ${{$order['total']}}</p>
							<p><b>Items:</b></p>
							<ul>
								@foreach($order_items as $order_item)
									<li>Item #{{$order_item['print_id']}} - {{$order_item['title']}} by {{$order_item['artist']}} - ${{$order_item['price']}}</li>
								@endforeach
							</ul>
							
							<p><b>Billing Information:</b></p>
							<ul>
								<li>Name - {{$order['firstname']}} {{$order['lastname']}}</li>
								<li>Email - {{$order['email']}}</li>
								<li>Address - {{$order['address']}}, {{$order['city']}}, {{$order['state']}} {{$order['zip']}}</li>
								<li>Card - Ending in <code>{{$order['card']}}</code></li>
							</ul>
							<button type="button" class="btn btn-default" id="print-confirmation"><i class="fa fa-print"></i> Print Confirmation</button>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End, Panel Group -->
	</div> <!-- End, Wrapper -->

	@include('layouts.login')
	@include('layouts.register')
@stop