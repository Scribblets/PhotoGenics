@extends('layouts.default')

@section('body')
	@include('layouts.header')
	
	<div class="wrapper">
		<div class="print_info">
			<h3>PRINT DETAILS</h3>
			
			<div class="product_image">
				<img src="{{ $item['source'] }}" />
			</div>
			
			<div class="product_details">
				<p><span class="info_label">Title:</span> {{ $item['title'] }}</p>
				<p><span class="info_label">Artist:</span> {{ $item['artist'] }}</p>
				<p><span class="info_label">Dimensions:</span> {{ $item['size'] }}</p>
				<p><span class="info_label">Price:</span> ${{ $item['price'] }}</p>
				<p><span class="info_label">ID:</span> #{{ $item['id'] }}</p>
				<p><span class="info_label">Description:</span><br /> {{ $item['description'] }}</p>
				
				<button type="button" class="btn btn-success btn-addtocart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="more">
			<h3>MORE SIMILAR TO {{ $item['title'] }}</h3>
			@foreach ($related as $related_item)
				<a href="{{ $related_item['link'] }}"><img src="{{ $related_item['source'] }}" /></a>
			@endforeach
		</div>
	</div>
	
	@include('layouts.login')
	@include('layouts.register')
@stop