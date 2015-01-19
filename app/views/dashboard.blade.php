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
						<td>
						<p style="display:none">{{ $tmp_total_price = 0 }}</p>
						@foreach ($order_items as $o_item)
							@if($o_item['order_id'] == $order['order_id'])
								<p style="display:none">{{ $tmp_total_price += $o_item['price'] }}</p>
							@endif
						@endforeach
						${{ $tmp_total_price }}</td>
						<td class="text-right">
							<a href="#" data-toggle="modal" data-target="#orderModal" data-orderID="{{$order['order_id']}}">Order Details</a>
							<div class="{{$order['order_id']}}" style="display:none;">
								<div class="order_info" data-status="{{$order['status']}}" data-date="{{$order['created_at']}}" data-total="{{$tmp_total_price}}" data-name="{{$order['firstname']}} {{$order['lastname']}}" data-email="{{$order['email']}}" data-address="{{$order['address']}}, {{$order['city']}}, {{$order['state']}} {{$order['zip']}}" data-card="{{$order['card']}}">
								</div>
								<div class="order_items">
								@foreach ($order_items as $order_item)
									@if($order_item['order_id'] == $order['order_id'])
										@foreach($prints as $p)
											@if($p['id'] == $order_item['print_id'])
											<div class="order_item" data-print-id="{{$order_item['print_id']}}" data-print-title="{{$p['title']}}" data-price="{{$order_item['price']}}" style="display: none;"></div>
											@endif
										@endforeach
									@endif
								@endforeach
								</div>
							</div>
						</td>
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