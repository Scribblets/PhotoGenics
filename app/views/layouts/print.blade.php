<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="printModalLabel">Print Details</h4>
			</div>
			
			<form action="" method="POST" enctype="multipart/form-data" id="printForm">
				<div class="modal-body">
					<div class="form-group print-info-group">
						<div class="form-group">
							<label for="printTitle" class="control-label">Title:</label>
							<input type="text" class="form-control" id="printTitle">
						</div>
						
						<div class="form-group">
							<div class="form-group category-group">
								<label for="printCategory" class="control-label">Category:</label><br />
								<select class="selectpicker">
									<option>People</option>
									<option>Animals</option>
									<option>Nature</option>
									<option>Art</option>
								</select>
							</div>
							
							<div class="form-group price-group">
								<label for="printPrice" class="control-label">Price:</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" class="form-control" id="printPrice">
								</div>
							</div>
							
							<div class="form-group dimensions-group">
								<label for="printDescription">Dimensions:</label>
								<input type="text" class="form-control" id="printDimensions" data-mask='99" x 99"' placeholder='__" x __"'>
							</div>
						</div>
						
						<div class="form-group">
							<label for="printDescription">Description:</label>
							<textarea class="form-control"></textarea>
						</div>
						
						
						
						<!-- jQuery will insert Create / Edit fields -->
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