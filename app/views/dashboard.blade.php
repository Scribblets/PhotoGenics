@extends('layouts.default')

@section('body')
	@include('layouts.header')
	@include('layouts.logo')
	@include('layouts.navigation')
	
	<div class="wrapper">
	<div class="alert alert-info" role="alert"><p>Your URL is: <b><a href="/u/{{Auth::user()->username}}">http://photogenics.designby.fish/u/{{Auth::user()->username}}</a></b></p></div>
	
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
				<tbody>
					<!-- For Each... -->
					@foreach ($prints as $print)
						<tr>
							<td><img src="{{$print['path']}}" /></td>
							<td>#{{$print['id']}}</td>
							<td>{{$print['title']}}</td>
							<td>{{$print['category']}}</td>
							<td>${{$print['price']}}</td>
							<td class="qty-td text-right">
								<button 
								class="btn btn-primary btn-edit-item" 
								type="button" 
								data-print-id="{{$print['id']}}" 
								data-print-title="{{$print['title']}}"
								data-print-category="{{$print['category']}}"
								data-print-price="{{$print['price']}}"
								data-print-dimensions='{{$print['dimensions']}}'
								data-print-description="{{$print['description']}}"><i class="fa fa-pencil"></i></button>
								<a href="/print/delete/{{$print['id']}}"><button class="btn btn-danger btn-remove-item" type="button"><i class="fa fa-times"></i></button></a>
							</td>
						</tr>
					@endforeach
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

					<!-- For Each... -->
					@foreach ($orders as $order)
					<tr>
						<td>{{$order['order_id']}}</td>
						<td>{{$order['created_at']}}</td>
						<td>{{$order['firstname']}} {{$order['lastname']}}</td>
						<td>{{$order['status']}}</td>
						<td>${{$order['total']}}</td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#orderModal" data-orderID="421621">Order Details</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
	</div>
	
	@include('layouts.print')
	@include('layouts.order')
@stop