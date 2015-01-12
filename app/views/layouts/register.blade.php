<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="registerModalLabel">Register Account</h4>
			</div>
			
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="firstname" class="control-label">First Name:</label>
						<input type="text" class="form-control" id="firstname">
					</div>
					<div class="form-group">
						<label for="lastname" class="control-label">Last Name:</label>
						<input type="text" class="form-control" id="lastname">
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
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="btn-register">Sign Up!</button>
			</div>
		</div>
	</div>
</div>