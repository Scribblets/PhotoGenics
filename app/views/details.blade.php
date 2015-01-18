@extends('layouts.default')

@section('body')
	@include('layouts.header')
	<a class="brand" href="/"><h1>{{ $user['firstname'] }}<span class="logo-color"><i class="fa fa-camera-retro"></i>{{ $user['lastname'] }}</span></h1></a>
	@include('layouts.navigation')
	
	<div class="wrapper">
		<div class="print_info">
			<h3>PRINT DETAILS <button type="button" class="btn btn-success btn-addtocart"><i class="fa fa-shopping-cart"></i> Add to Cart</button></h3>
			<div class="product_image">
				<img src="{{ $print['path'] }}" />
			</div>
			
			<div class="product_details">
				<p><span class="info_label">Title:</span> {{ $print['title'] }}</p>
				<p><span class="info_label">Artist:</span> {{ $user['firstname'] }} {{ $user['lastname'] }}</p>
				<p><span class="info_label">Dimensions:</span> {{ $print['dimensions'] }}</p>
				<p><span class="info_label">Price:</span> ${{ $print['price'] }}</p>
				<p><span class="info_label">ID:</span> #{{ $print['id'] }}</p>
				<p><span class="info_label">Description:</span></p> 
				<p>{{ $print['description'] }}</p>
			</div>
			
			<div class="clear">
		</div>
		
		<div class="more">
			@if ($random['enough'])
				<h3>MORE FROM {{ $user['firstname'] }}</h3>
				
				@foreach ($random['prints'] as $p)
					<a href="/u/{{$user['username']}}/{{$p['id']}}">
						<img src="{{$p['path']}}" />
					</a>
				@endforeach
			@endif
		</div>
	</div>
	@include('layouts.login')
	@include('layouts.register')
@stop