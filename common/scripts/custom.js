jQuery(function() {

jQuery('#test td').click(function(event) {
		$('#test td').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
	jQuery('#test2 td').click(function(event) {
		$('#test2 td').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
	
	
	
	jQuery('#test3 li').click(function(event) {
		$('#test3 li').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
});	