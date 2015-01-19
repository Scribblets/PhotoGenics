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
			console.log(response);
			var route = '/order/' + order_id;
			$form.attr('action', route);
			$('#checkout-form .credit-card-information .button-group').prepend('<input type="hidden" id="tf_lastFour" name="tf_lastFour" value="' + response.card.last4 + '" />');
			$('#checkout-form .credit-card-information .button-group').prepend('<input type="hidden" id="tf_token" name="tf_token" value="' + token + '" />');
			$('#collapseTwo').collapse('toggle');
			$('.spin').show();
		}		
	}
	
	$('#collapseTwo').on('hide.bs.collapse', function (e) {
		if($("#tf_token").length > 0) {
			$('#checkout-form').submit();
		}
	});
	
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
	
/***************************************
 * Order Modal
 *--------------------------------------
 */
	$('.text-right a').on('click', function(e) {
		var order_id = $(e.currentTarget).data('orderid');
		var order_items_array = [];
		$('.' + order_id + ' .order_items .order_item').each(function() {
			console.log($(this).data('print-id'));

			var print = {
				'id' : $(this).data('print-id'),
				'title' : $(this).data('print-title'),
				'price' : $(this).data('price')
			}
			
			order_items_array.push(print);
		});
		
		var status = $('.' + order_id + ' .order_info').data('status');
		
		if(status == 0 || status == '0') {
			status = "PROCESSING";
		}
		
		var order = {
			'id' : order_id,
			'status' : status,
			'date' : $('.' + order_id + ' .order_info').data('date'),
			'total' : $('.' + order_id + ' .order_info').data('total'),
			'items' : order_items_array,
			'name' : $('.' + order_id + ' .order_info').data('name'),
			'email' : $('.' + order_id + ' .order_info').data('email'),
			'address' : $('.' + order_id + ' .order_info').data('address'),
			'card' : $('.' + order_id + ' .order_info').data('card')
		}
		
		$('.oNumber').html(order.id);
		$('#oStatus').html(order.status);
		$('#oDate').html(order.date);
		$('#oTotal').html(order.total);
		
		$(order.items).each(function() {
			$('#oItems').append('<li>Item <code>#' + this.id + '</code> - ' + this.title + ' - $' + this.price + '</li>');
		});
		
		$('#oName').html(order.name);
		$('#oEmail').html(order.email);
		$('#oAddress').html(order.address);
		$('#oCard').html(order.card);
	});
	
	$('#orderModal').on('hidden.bs.modal', function() {
		$("#oItems").html('');
	});
})($);