			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					
					@if (Auth::check())
						<li><span class="welcomeMessage">Welcome, <b>{{Auth::user()->firstname}}</b>!</span></li>
						<li><a href="/store/checkout"><i class="fa fa-shopping-cart fa-2x">
							<div id="cartCount"><p>0</p></div>
						</i></a></li>
						<li><a class="anchor-button" href="/dashboard"><button type="button" class="btn btn-primary">Dashboard</button></a></li>
						<li><a class="anchor-button" href="/logout"><button type="button" class="btn btn-default">Logout</button></a></li>
					@else
						<li><a href="/store/checkout"><i class="fa fa-shopping-cart fa-2x">
							<div id="cartCount"><p>0</p></div>
						</i></a></li>
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button></li>
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Register</button></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>