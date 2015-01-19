<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Details for Order #<span class="oNumber"></span></h4>
			</div>
			
			<div class="modal-body">
				<p><b>Order #<span class="oNumber"></span></b></p>
				<p><b>Status:</b> <span id="oStatus"></span></p>
				<p><b>Date:</b> <span id="oDate"></span></p>
				<p><b>Total:</b> $<span id="oTotal"></span></p>
				<p><b>Items:</b></p>
				<ul id="oItems">
				</ul>
				
				<p><b>Billing Information:</b></p>
				<ul>
					<li>Name - <span id="oName"></span></li>
					<li>Email - <span id="oEmail"></span></li>
					<li>Address - <span id="oAddress"></span></li>
					<li>Card - Ending in <code>x<span id="oCard"></span></code></li>
				</ul>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>