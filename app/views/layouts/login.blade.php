<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login</h4>
			</div>
				
			<form id="loginForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="tf_login_username" class="control-label">Username:</label>
						<input type="text" class="form-control" id="tf_login_username" name="tf_login_username">
					</div>
					
					<div class="form-group">
						<label for="tf_login_password" class="control-label">Password:</label>
						<input type="password" class="form-control" id="tf_login_password" name="tf_login_password">
					</div>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" id="btn-login" value="Login" />
				</div>
			</form>
		</div>
	</div>
</div>