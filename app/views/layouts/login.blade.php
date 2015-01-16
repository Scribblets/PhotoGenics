<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login</h4>
			</div>
			
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="username" class="control-label">Username:</label>
						<input type="text" class="form-control" id="username">
					</div>
					
					<div class="form-group">
						<label for="password" class="control-label">Password:</label>
						<input type="password" class="form-control" id="password">
					</div>
				</form>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="/dashboard/12345" type="button" class="btn btn-primary" id="btn-login">Login</a>
			</div>
		</div>
	</div>
</div>