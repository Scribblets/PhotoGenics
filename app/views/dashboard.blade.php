@extends('layouts.default')

@section('body')
	@include('layouts.header')
	
	<div class="wrapper">
	<div class="alert alert-info" role="alert"><p>Your URL is: <b>http://photogenics.designby.fish/lrroberts0122</b></p></div>
	
	<div class="panel panel-default db-panel" id="db-items">
		<div class="panel-heading">My Items <button class="btn btn-success btn-make-item btn-xs" type="button" data-toggle="modal" data-target="#printModal"><i class="fa fa-plus fa-xsmall"></i> <b>Create Print</b></button></div>
		<div class="panel-body">
			<!-- If there are items, display them, otherwise: <p>You don't have any! <button>Add some!</button></p> -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Preview</th>
						<th>Item ID</th>
						<th>Item Title</th>
						<th>Category</th>
						<th>Price</th>
						<th class="text-right">Make Changes</th>
					</tr>
				</thead>
				<tbody >
					<tr>
						<td><img src="http://placekitten.com/g/30/30" /></td>
						<td>#12345</td>
						<td>Kitty</td>
						<td>Jebus Krist</td>
						<td>$9.99</td>
						<td class="qty-td text-right">
							<button class="btn btn-primary btn-edit-item" type="button" data-toggle="modal" data-target="#printModal"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-remove-item" type="button"><i class="fa fa-times"></i></button>
						</td>
					</tr>
					<tr>
						<td><img src="http://placekitten.com/g/30/30" /></td>
						<td>#12345</td>
						<td>Kitty</td>
						<td>Jebus Krist</td>
						<td>$9.99</td>
						<td class="qty-td text-right">
							<button class="btn btn-primary btn-edit-item" type="button" data-toggle="modal" data-target="#printModal"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-remove-item" type="button"><i class="fa fa-times"></i></button>
						</td>
					</tr>
					<tr>
						<td><img src="http://placekitten.com/g/30/30" /></td>
						<td>#12345</td>
						<td>Kitty</td>
						<td>Jebus Krist</td>
						<td>$9.99</td>
						<td class="qty-td text-right">
							<button class="btn btn-primary btn-edit-item" type="button" data-toggle="modal" data-target="#printModal"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-remove-item" type="button"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
    <div class="panel panel-default db-panel">
		<div class="panel-heading">Incoming Orders</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th>Order #</th>
					<th>Date</th>
					<th>Name</th>
					<th>Status</th>
					<th>Total</th>
					<th class="text-right">Details</th>
				</thead>
				<tbody>
					<tr>
						<td>#421621</td>
						<td>01/11/2015</td>
						<td>Lindsay Roberts</td>
						<td>Approved</td>
						<td>$19.98</td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#orderModal" data-orderID="421621">Order Details</a></td>
					</tr>
					<tr>
						<td>#589172</td>
						<td>01/11/2015</td>
						<td>Mark Lyck</td>
						<td>Processing</td>
						<td>$29.97</td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#orderModal" data-orderID="589172">Order Details</a></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
	</div>
	
	@include('layouts.print')
	@include('layouts.order')
@stop