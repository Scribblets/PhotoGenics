@extends('layouts.default')

@section('body')
	@include('layouts.header')
	@include('layouts.logo')
	@include('layouts.navigation')
    <!-- GIANT IMAGE AND CALL TO ACTION -->
    @if(Auth::check())
    
    @else
    <div id="landingCTA">
	    <div id="CTA">
		    <h1>A marketplace for the enthusiast.</h1>
		    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#registerModal">Create an Account - It's FREE</button>
	    </div>
    </div>
    @endif
	@include('layouts.login')
	@include('layouts.register')
@stop