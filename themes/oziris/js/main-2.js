(function($){
	'use strict'
	
	$(window).load(function() {
		if(!$('#gform_wrapper_4').length > 0){
			setTimeout(function() {
				// open popup
				$('body').addClass('open-popup')
			}, 1000);
		}
	})
	
	$(document).ready(function(e) {
		$('.close-oziris-ads').click(function() {
			$('body').removeClass('open-popup')
			$('body').addClass('close-triggered')
		})
		if($('#gform_wrapper_4').length > 0){
			$('.sticky-newsletter').hide()
		}
	});
	
})(jQuery)