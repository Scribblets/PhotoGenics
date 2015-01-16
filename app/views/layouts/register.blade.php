<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="registerModalLabel">Register Account</h4>
			</div>
			
			{{ Form::open(array('url' => '')) }}
				<div class="modal-body">
					<div class="form-group">
						{{ Form::label('firstname', 'First Name:', array('class' => 'control-label')) }}
						{{ Form::text('firstname', '', array('class' => 'form-control')) }}						
					</div>
					<div class="form-group">
						{{ Form::label('lastname', 'Last Name:', array('class' => 'control-label')) }}
						{{ Form::text('lastname', '', array('class' => 'form-control')) }}						
					</div>
					<div class="form-group">
						{{ Form::label('username', 'Username:', array('class' => 'control-label')) }}
						{{ Form::text('username', '', array('class' => 'form-control')) }}						
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email:', array('class' => 'control-label')) }}
						{{ Form::email('email', '', array('class' => 'form-control')) }}						
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password:', array('class' => 'control-label')) }}
						{{ Form::password('password', array('class' => 'form-control')) }}						
					</div>
					<div class="form-group">
						{{ Form::label('ver_password', 'Verify Password:', array('class' => 'control-label')) }}
						{{ Form::password('ver_password', array('class' => 'form-control')) }}						
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{{ Form::submit('Sign up!', array('class' => 'btn btn-success')) }}
				</div>
			{{ Form::close() }}
<!--
			<form>
				<div class="modal-body">
					<div class="form-group">
						<label for="firstname" class="control-label">First Name:</label>
						<input type="text" class="form-control" id="firstname">
					</div>
					<div class="form-group">
						<label for="lastname" class="control-label">Last Name:</label>
						<input type="text" class="form-control" id="lastname">
					</div>
					<div class="form-group">
						<label for="username" class="control-label">Username:</label>
						<input type="text" class="form-control" id="username">
					</div>
					<div class="form-group">
						<label for="email" class="control-label">Email:</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password:</label>
						<input type="password" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label for="ver_password" class="control-label">Verify Password:</label>
						<input type="password" class="form-control" id="ver_password">
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" id="btn-register" value="Sign Up!" />
				</div>
			</form>
-->
		</div>
	</div>
</div>