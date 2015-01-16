<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<!-- Set the route on the form here -->
		<?php echo Form::open(array('url' => '/login')); ?>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login</h4>
			</div>
			
			<div class="modal-body">
				<div class="form-group">
					<label for="username" class="control-label">Username:</label>
					<input type="text" tabindex="1" name="username" class="form-control" id="username" required>
				</div>

				<div class="form-group">
					<label for="password" class="control-label">Password:</label>
					<input type="password" name="password" tabindex="2" class="form-control" id="password" required>
				</div>
				<div class="form-group">
					<label class="form-control"><input type="checkbox" name="persist" tabindex="3">&nbsp;Remember me?</label>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" tabindex="5">Close</button>
				<input type="submit" class="btn btn-primary" id="btn-login" value="Login" tabindex="4" />
			</div>
		</div>

	</div>
</form>
</div>