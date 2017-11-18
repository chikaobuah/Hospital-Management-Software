jQuery(function($) {
//$.getScript('cvv.js');
jQuery('#test li').click(function(event) {
		
		$('#test li').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
	jQuery('#test2 li').click(function(event) {
		$('#test2 li').each(function() {
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