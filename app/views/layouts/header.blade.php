<div id="header">
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="#"><h1>Photo<span class="logo-color"><i class="fa fa-camera-retro"></i>Genics</span></h1></a>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="fa fa-shopping-cart fa-2x">
						<div id="cartCount"><p>{{ $cartCount }}</p></div>
					</i></a></li>
					<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button></li>
					<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Register</button></li>
				</ul>
			</div>
		</div>
	</div>
</div>