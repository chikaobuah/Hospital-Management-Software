jQuery(function($) {
jQuery('#linker').click(function(event) {
	$.getScript('custom.js');
	alert('Hello');
});
});	