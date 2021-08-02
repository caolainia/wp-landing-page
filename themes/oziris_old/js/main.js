jQuery(function($){
	"use strict"
	
	$(window).load(function(){
		
		setTimeout(function(){
			$('.preloader').fadeOut()
		},400)
		
		skrollr.init({
		smoothScrolling: false,
		mobileDeceleration: 0.004
	})
	})
	
	$(window).resize(function(){
		var winH = $(window).height()
		$('.background-cover').css({height:winH})
	})
	
	$(document).ready(function(e) {
		$(window).trigger('resize')
	});
	
	function do_type($el){
		$($el).typed({
            strings: $($el).attr('data-text'),
            typeSpeed: 0
        });
	}
	
	

	
	$(window).on('scroll touchmove mousewheel',function(e){
		
		
		$('.typewriter').each(function(index, element) {
			if( $(this).css('opacity') ==1){
				var title = $(this).find('.title')
				var desc = $(this).find('.desc')
				
				
				
				$(title).typed({
            strings: [$(title).attr('data-text')],
            typeSpeed: 50,
						showCursor: false,
						preStringTyped: function() {
							//$('body').addClass('stop-scrolling')
						},
						callback: function() {
										$(desc).typed({
												strings: [$(desc).attr('data-text')],
												typeSpeed: 10,
												showCursor: false,
												callback:function(){
													//$('body').removeClass('stop-scrolling')
												}
										});
						},
        });
			}
		});
		
		
	})

})