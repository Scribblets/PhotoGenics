<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login</h4>
			</div>
			
			{{ Form::open(array('url' => '')) }}
				<div class="modal-body">
					<div class="form-group">
						{{ Form::label('username', 'Username:', array('class' => 'control-label')) }}
						{{ Form::text('username', '', array('class' => 'form-control')) }}
					</div>
					
					<div class="form-group">
						{{ Form::label('password', 'Password:', array('class' => 'control-label')) }}
						{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
			
<!--
			<form>
				<div class="modal-body">
					<div class="form-group">
						<label for="username" class="control-label">Username:</label>
						<input type="text" class="form-control" id="username">
					</div>
					
					<div class="form-group">
						<label for="password" class="control-label">Password:</label>
						<input type="password" class="form-control" id="password">
					</div>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" id="btn-login" value="Login" />
				</div>
			</form>
-->
		</div>
	</div>
</div>