<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="printModalLabel">Print Details</h4>
			</div>
			
			<!-- CREATE / EDIT PRINT FORM -->
			<form action="" method="POST" enctype="multipart/form-data" id="printForm">
				<div class="modal-body">
					<div class="form-group print-info-group">
						<div class="form-group">
							<label for="tf_title" class="control-label">Title:</label>
							<input type="text" class="form-control" id="tf_title">
						</div>
						
						<div class="form-group">
							<div class="form-group category-group">
								<label for="tf_category" class="control-label">Category:</label><br />
								<select id="tf_category" name="tf_category" class="selectpicker">
									<option value="people">People</option>
									<option value="animals">Animals</option>
									<option value="nature">Nature</option>
									<option value="art">Art</option>
								</select>
							</div>
							
							<div class="form-group price-group">
								<label for="tf_price" class="control-label">Price:</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" class="form-control" id="tf_price" name="tf_price">
								</div>
							</div>
							
							<div class="form-group dimensions-group">
								<label for="tf_dimensions">Dimensions:</label>
								<input type="text" class="form-control" id="tf_dimensions" name="tf_price" data-mask='99" x 99"' placeholder='__" x __"'>
							</div>
						</div>
						
						<div class="form-group">
							<label for="tf_description">Description:</label>
							<textarea id="tf_description" name="tf_description" class="form-control"></textarea>
						</div>
						
						<div id="end-of-form" class="clear"></div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" type="button" class="btn btn-primary" id="btn-save" value="Save" />
				</div>
			</form>
		</div>
	</div>
</div>