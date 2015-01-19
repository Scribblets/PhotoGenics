(function(jQuery) {
/***************************************
 * Masonry and Isotope
 *--------------------------------------
 */
	var $container = $('#container');
	$container.masonry();
	$container.isotope();

	$container.imagesLoaded(function() {
		$container.masonry({
			itemSelector: '.item',
			isResizable: true,
			isAnimated: true
		});
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
 * Flash Modal
 *--------------------------------------
 */	
 	console.log($('#flashModal').length);
 	if($('#flashModal').length > 0) {
	 	$('#flashModal').modal('show');
 	}
	
/***************************************
 * Print Modal
 *--------------------------------------
 * -> Create Prints
 * -> Edit Prints
 *--------------------------------------
 */
    $('.btn-make-item').on('click', function(e) {	    
	    // Change action for Create Form
	    $("#printForm").attr("action", "/print/create");
	    
	    // File Input HTML
 	    html = '<div id="file-image" class="fileinput fileinput-new" data-provides="fileinput"><label for="tf_file">Upload Image:</label><br/><div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 130px;"></div><div><span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="tf_file" name="tf_file"></span><a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div></div>';
	    
	    $("#end-of-form").before(html);
    });
    
    $('.btn-edit-item').on('click', function(e) {
	    id			= $(e.currentTarget).data('print-id');
	    title 		= $(e.currentTarget).data('print-title');
	    category	= $(e.currentTarget).data('print-category');
	    price		= $(e.currentTarget).data('print-price');
	    dimensions	= $(e.currentTarget).data('print-dimensions');
	    description	= $(e.currentTarget).data('print-description');
	    
	    var action = "/print/update/" + id;
	    $("#printForm").attr("action", action);
	    
	    $("#tf_title").val(title);
	    $("#tf_price").val(price);
	    $("#tf_dimensions").val(dimensions);
	    $('.selectpicker').selectpicker('val', category);
	    $("#tf_description").val(description);
	    
	    $("#printModal").modal('show');
    });
    
    // Resets the Modal on Close
    $('#printModal').on('hidden.bs.modal', function () {
	    if($("#file-image").length > 0) {
		    $("#file-image").remove();
	    }
	    
	    if($("#user-id").length > 0) {
		    $("#user-id").remove();
	    }
	    $('.selectpicker').selectpicker('val', 'people');
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
	
	/* Numbers Only Input */
	$('#tf_checkout_zip, #tf_checkout_ccNumber, #tf_checkout_ccExpMonth, #tf_checkout_ccExpYear, #tf_checkout_ccCode').keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
	
	/* Capital Letters Only Input */
	$('#tf_checkout_state').keypress(function(e) {
		if(e.which < 65 || e.which > 90) {
			return false;
		}
	});

	/* Required Fields Button Enabling */
	$('#tf_checkout_firstname, #tf_checkout_lastname, #tf_checkout_email, #tf_checkout_address, #tf_checkout_city, #tf_checkout_state, #tf_checkout_zip, #tf_checkout_ccNumber, #tf_checkout_ccExpMonth, #tf_checkout_ccExpYear, #tf_checkout_ccCode').bind('keyup', function() {
		if(allFilled($('#checkout-form input'))) {
			$('#placeOrder').removeAttr('disabled');
		} else {
			$('#placeOrder').attr('disabled', true);
		}
	});
	
	/* Stripe Functionality */
	Stripe.setPublishableKey('pk_test_byl39OOJq9GcVZZSanaY9aUv');

	$('#placeOrder').on('click', function(e){
		e.preventDefault();
		var $form = $('#checkout-form');
		$form.find('#payment-errors').hide();
		$form.find('#placeOrder').prop('disabled', true);
		Stripe.createToken($form, stripeResponseHandler);
		
		return false;
	});
	
	function stripeResponseHandler(status, response){
		var $form = $('#checkout-form');
		
		if(response.error){
			console.log(response.error);
			$('#checkout-form .alert-danger').html('<b><i class="fa fa-exclamation"></i></b> ' + response.error.message).show();
		} else {
			var token = response.id;
			var order_id = response.card.id.slice(5);
			var route = '/order/process/' + order_id;
			$form.attr('action', route);
			$('#checkout-form .credit-card-information .button-group').prepend('<input type="hidden" name="tf_token" value="' + token + '" />');
			$form.submit();
			//$('#collapseTwo').collapse('toggle');
			// $('#collapseThree').collapse('toggle');
			// $form.get(0).submit();
		}		
	}
	
	
	// /* Print Confirmation */
	$('#print-confirmation').on('click', function(e) {
		window.print();
	});
	
	function allFilled(formInput) {
	    var filled = true;
	    formInput.each(function() {
	        if($(this).val() == '') {
		        filled = false;
		    }
	    });
	    return filled;
	}
})($);