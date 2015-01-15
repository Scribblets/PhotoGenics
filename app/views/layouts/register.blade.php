<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="registerModalLabel">Register Account</h4>
			</div>
			
			<div class="modal-body">
				<!-- Set the route on the form here -->
				<?php echo Form::open(array('url' => '/register')); ?>
				<div class="form-group">
					<label for="firstname" class="control-label">First Name:</label>
					<input type="text" class="form-control" name="firstname" id="firstname">
				</div>
				<div class="form-group">
					<label for="lastname" class="control-label">Last Name:</label>
					<input type="text" class="form-control" name="lastname" id="lastname">
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email:</label>
					<input type="email" class="form-control" name="email" id="email">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Username:</label>
					<input type="text" class="form-control" name="username" id="username">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Password:</label>
					<input type="password" class="form-control" name="password" id="password">
				</div>
				<div class="form-group">
					<label for="ver_password" class="control-label">Verify Password:</label>
					<input type="password" class="form-control" name="ver_password" id="ver_password">
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