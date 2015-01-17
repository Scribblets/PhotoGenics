(function(jQuery) {
/***************************************
 * Masonry and Isotope
 *--------------------------------------
 */
	var $container = $('#container');

	$container.imagesLoaded(function() {
		$container.masonry({
			itemSelector: '.item',
			columnWidth: 180,
			isResizable: true,
			isAnimated: true
		});
		
		$container.isotope();
	});
	
	$(".filters").click(function() {
		var selector = $(this).attr('data-filter');
		if(selector != "*") {
			selector = "." + selector;
		}
		
		$container.isotope({filter: selector});
 		$('.active').attr('class', 'filters');
		$(this).attr('class', 'filters active');
		return false;
	});
/***************************************
 * Print Modal
 *--------------------------------------
 * -> Create Prints
 * -> Edit Prints
 *--------------------------------------
 */
    $('.btn-make-item').on('click', function(e) {
	    
	    // #Studnicky
	    // Change action for Create Form
	    $("#printForm").attr("action", "");
	    
	    // File Input HTML
 	    html = '<div id="file-image" class="fileinput fileinput-new" data-provides="fileinput"><label for="tf_file">Upload Image:</label><br/><div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 130px;"></div><div><span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="tf_file" name="tf_file"></span><a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div></div>';
	    
	    $("#end-of-form").before(html);
    });
    
    $('.btn-edit-item').on('click', function(e) {
	    // Change action for Edit Form
	    $("#printForm").attr("action", "");
	    
	    // User ID Hidden Input (For Edits)
	   html = '<input type="hidden" name="tf_print_id" id="tf_print_id" value="12345" />';
	   $("#end-of-form").before(html);
    });
    
    // Resets the Modal on Close
    $('#printModal').on('hidden.bs.modal', function () {
	    if($("#file-image").length > 0) {
		    $("#file-image").remove();
	    }
	    
	    if($("#user-id").length > 0) {
		    $("#user-id").remove();
	    }
	    
	    $("#printForm")[0].reset();
	});
    	
	/* Select Picker */
	$('.selectpicker').selectpicker();
	
	/* Register Button */
	$('#btn-register').on('click', function() {
		console.log("SUBMIT REGISTER FORM!");
	});

/***************************************
 * Checkout Page
 *--------------------------------------
 */
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
	$('#tf_checkout_zip, #tf_checkout_ccNumber, #tf_checkout_ccExpMonth, #tf_checkout_ccExpYear, #tf_checkout_ccCode').keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
	
	/* Required Fields Button Enabling */
	$('#tf_checkout_firstname, #tf_checkout_lastname, #tf_checkout_email, #tf_checkout_address, #tf_checkout_city, #tf_checkout_state, #tf_checkout_zip, #tf_checkout_ccNumber, #tf_checkout_ccExpMonth, #tf_checkout_ccExpYear, #tf_checkout_ccCode').bind('keyup', function() {
		if(allFilled()) {
			$('#placeOrder').removeAttr('disabled');
		} else {
			$('#placeOrder').attr('disabled', true);
		}
	});
	
	/* Print Confirmation */
	$('#print-confirmation').on('click', function(e) {
		window.print();
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