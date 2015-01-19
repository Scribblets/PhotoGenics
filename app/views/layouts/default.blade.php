<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotoGenics</title>
        
    @section('style')
        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="/assets/stylesheets/application.css">
    @show
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>
<body>
    @yield('body')
    
    @if ( Session::has('flash_message'))    
		<div class="modal fade" id="flashModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="alert {{ Session::get('flash_type') }} alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p>{{ Session::get('flash_message') }}</p>
				</div>
			</div>
		</div>
	@endif
    
    @section('footer')
        <!-- Javascript -->
        <script src="/assets/javascripts/application.js"></script>
        <script src="/assets/javascripts/bootstrap-select.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="https://js.stripe.com/v2/"></script>
        <script src="/assets/javascripts/main.js"></script>
    @show
</body>
</html>