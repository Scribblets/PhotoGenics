<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="registerModalLabel">Register Account</h4>
			</div>
			
				{{ Form::open(array('url' => '/register')) }}
				<div class="modal-body">
					<div class="form-group">
						<label for="tf_firstname" class="control-label">First Name:</label>
						<input type="text" class="form-control" id="tf_firstname" name="tf_firstname">
					</div>
					<div class="form-group">
						<label for="tf_lastname" class="control-label">Last Name:</label>
						<input type="text" class="form-control" id="tf_lastname" name="tf_lastname">
					</div>
					<div class="form-group">
						<label for="tf_username" class="control-label">Username:</label>
						<input type="text" class="form-control" id="tf_username" name="tf_username">
					</div>
					<div class="form-group">
						<label for="tf_email" class="control-label">Email:</label>
						<input type="email" class="form-control" id="tf_email" name="tf_email">
					</div>
					<div class="form-group">
						<label for="tf_password" class="control-label">Password:</label>
						<input type="password" class="form-control" id="tf_password" name="tf_password">
					</div>
					<div class="form-group">
						<label for="tf_ver_password" class="control-label">Verify Password:</label>
						<input type="password" class="form-control" id="tf_ver_password" name="tf_ver_password">
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" id="btn-register" value="Sign Up!" />
				</div>
			</form>
		</div>
	</div>
</div>