(function(jQuery) {		
	var $container = $('#container');
	
	$container.imagesLoaded(function() {
		$container.masonry({
			itemSelector: '.item',
			columnWidth: 180,
			isResizable: true,
			isAnimated: true
		});
	});
	
	$('#btn-register').on('click', function() {
		console.log("SUBMIT REGISTER FORM!");
	});
	
	/* Checkout Alert */
	$('#checkout-form .alert').hide();
	
	/* Checkout Buttons */
	$('.prev-next').on('click', function(e) {
		$('#collapseOne').collapse('toggle');
		$('#collapseTwo').collapse('toggle');
	});
	
	$('#placeOrder').on('click', function(e) {
		// Submit Form via AJAX
		$('#collapseTwo').collapse('toggle');
		$('#collapseThree').collapse('toggle');
	});
	
	/* Numbers Only Input */
	$('#zip, #cc-exp-month, #cc-exp-year, #cc-code').keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
	
	$('#firstname, #lastname, #email, #address, #city, #state, #zip, #cc-exp-month, #cc-exp-year, #cc-code').bind('keyup', function() {
		if(allFilled()) {
			$('#placeOrder').removeAttr('disabled');
		} else {
			$('#placeOrder').attr('disabled', true);
		}
	});
	
	function allFilled() {
	    var filled = true;
	    $('#checkout-form input').each(function() {
	        if($(this).val() == '') {
		        filled = false;
		    }
	    });
	    return filled;
	}
})($);