@extends('layouts.default')

@section('body')
	@include('layouts.header')
	@include('layouts.logo')
	@include('layouts.navigation')
	
    <div id="categories">
	    <ul>
		    <li><a href="#" id="filterAll" data-filter="*" class="filters active">All</a></li>
		    <li><a href="#" id="filterPeople" data-filter="people" class="filters">People</a></li>
		    <li><a href="#" id="filterAnimals" data-filter="animals" class="filters">Animals</a></li>
		    <li><a href="#" id="filterNature" data-filter="nature" class="filters">Nature</a></li>
		    <li><a href="#" id="filterArt" data-filter="art" class="filters">Art</a></li>
	    </ul>
    </div>
    
    <div id="container">
		
		@foreach($prints as $print)
			<div class="item {{ $print['category'] }}">
				<a href="/u/{{$print['artist_username']}}/{{$print['id']}}">
					<img src="{{$print['path']}}" />
					<div class="thumb-text">
						<p class="printTitle">{{$print['title']}}</p>
						<p class="printArtist"><i>{{$print['artist']}}</i></p>
						<p class="printPrice">${{$print['price']}}</p>
					</div>
				</a>
			</div>
		@endforeach
    </div>
	
	@include('layouts.login')
	@include('layouts.register')
@stop