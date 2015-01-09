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
})($);