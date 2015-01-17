@extends('layouts.default')

@section('body')
	@include('layouts.header')
    <div id="categories">
	    <ul>
		    <li><a href="#" id="filterAll" class="active">All</a></li>
		    <li><a href="#" id="filterPeople">People</a></li>
		    <li><a href="#" id="filterAnimals">Animals</a></li>
		    <li><a href="#" id="filterNature">Nature</a></li>
		    <li><a href="#" id="filterArt">Art</a></li>
	    </ul>
    </div>
    
    <div id="container">   
		<div class="item people">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item people">
			<img src="http://placekitten.com/g/340/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item animals">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item nature">
			<img src="http://placekitten.com/g/340/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item art">
			<img src="http://placekitten.com/g/160/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item art">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item nature">
			<img src="http://placekitten.com/g/160/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item people">
			<img src="http://placekitten.com/g/340/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item animals">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item art">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item nature">
			<img src="http://placekitten.com/g/160/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item people">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item art">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item animals">
			<img src="http://placekitten.com/g/340/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item people">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item people">
			<img src="http://placekitten.com/g/700/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item nature">
			<img src="http://placekitten.com/g/160/160" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
		<div class="item animals">
			<img src="http://placekitten.com/g/160/340" />
			<div class="thumb-text">
				<p class="printTitle">Print Title</p>
				<p class="printArtist"><i>Author Name</i></p>
				<p class="printPrice">$9.99</p>
			</div>
		</div>
	</div>
	@foreach($sessions as $key => $value)
        <ul>
            <li>{{ $value->id }}</li>
            <li>{{ $value->name }}</li>
            <li>{{ $value->email }}</li>
            <li>{{ $value->nerd_level }}</li>
            <!-- we will also add show, edit, and delete buttons -->
            <li>
                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>
            </li>
        </ul>
    @endforeach
  
	@include('layouts.login')
	@include('layouts.register')
@stop