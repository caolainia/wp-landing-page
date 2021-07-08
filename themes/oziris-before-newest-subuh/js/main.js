jQuery(function($){
	"use strict"
	
	$(window).load(function(){
		
		setTimeout(function(){
			$('.preloader').fadeOut()
		},400)
		
		setTimeout(function(){
			$('.text-fade.fade-1').fadeIn()
		},800)
		
		setTimeout(function(){
			$('.text-fade.fade-1').fadeOut(function(){
				$('.text-fade.fade-2').fadeIn()
				$('.scroll-trigger').addClass('bottom')
			})
		},3000)
		
		
		if(!$('.show-mobile').is(':visible')){
			skrollr.init({
				smoothScrolling: true,
			});
		}else{
			skrollr.init().destroy();
		}
		

	
	
	})
	
	$('.scroll-trigger').click(function(e){
		var winH = $(window).height()
		var scrolltop = $(window).scrollTop()
		
		if(0 < winH && scrolltop < winH ){
			$('body,html').animate({scrollTop: (winH + 100) },winH)
		}
		
		if( winH < scrolltop && scrolltop <= (winH * 2) ){
			$('body,html').animate({scrollTop: ((winH * 5)) },winH*3)
		}
		
		if( (winH * 2) < scrolltop && scrolltop <= (winH * 5) ){
			$('body,html').animate({scrollTop: ((winH * 7)) },winH*3)
		}
		
		if( (winH * 5) < scrolltop && scrolltop <= (winH * 8) ){
			$('body,html').animate({scrollTop: ((winH * 9)) },winH*3)
		}
		
		if( (winH * 8) < scrolltop && scrolltop <= (winH * 11) ){
			$('body,html').animate({scrollTop: ((winH * 11.5)) },winH*3)
		}
		
		if( (winH * 11) < scrolltop && scrolltop <= (winH * 14) ){
			$('body,html').animate({scrollTop: ((winH * 13.5)) },winH*3)
		}
		
		console.log(winH,scrolltop)
	
	})
	
	
	function recalculate_element(){
			var winH = $(window).height()
			var winW = $(window).width()
			
			// logo
			$('.welcome-container .logo img').css({width:winW*0.108333333333333})
			
			// hand
			//$('.the-hand .inner-hand').css({width:(winW*0.373) - 123.1})
			$('.the-hand .inner-hand').css({width:(winH*0.73) - 104.1})
			

			
			// product
			$('.scene1 .product').css("background-size",(0.356*winW) - 138.7)
			
			// green line
			var $linewidth = (0.305*winW) + 698.3
			var $linemargin = (winW - ((0.305*winW) + 698.3)) / 2
			$('.line').css({width:$linewidth,marginLeft: $linemargin })
			
			$('.typer-container').css({width:$linewidth })
			
			// entity-box image
			$('.image-entity.box').css({left:(0.393*winW) - 284.5,top:(0.666 *winH)- 71.6 })
			$('.image-entity.box img').css({width:(0.173*winW) - 11.7})
			
			// entity-box image
			$('.image-entity.forklisft').css({top:(0.45*winH) + 42.25})
			$('.image-entity.forklisft img').css({width:(0.263*winW) - 60})
			
			
			// entity-box airplane
			//$('.image-entity.airplane').css({top:(0.45*winH) + 42.25})
			$('.image-entity.airplane img').css({width:(0.835*winW) - 227.3})
			$('.image-entity.box-2 img').css({width:(0.17*winW) + 65.26})
			
			// entity-box cow
			$('.image-entity.cow').css({top:(0.233* winH) + 137.1})
			$('.image-entity.cow img').css({width:(0.294 * winW )- 107.8})
			
			
			
			// machine top
			$('.machine-container').css({top:(0.233 * winH )+ 97.16,height: (0.766*winH) + 47.83})
			
			if(winW <= 1920){
				$('.typewriter .title').css('font-size',(0.014*winW)+10.5+'px')
				$('.typewriter .desc').css('font-size',(0.005*winW)+9.894+'px')
				$('.typewriter-1').css({top:(0.076*winH)+21.78})
				$('.typewriter-2').css({top:(0.1*winH) - 15.5})
				$('.typewriter-3').css({top:(0.083*winH) - 9.583})
				$('.typewriter-4').css({top:(0.066*winH) - 3.666})
				
				$('.home h1').css('font-size',((0.029*winW) + 4.736)+'px')
				$('.home p.teaser').css('font-size',((0.017*winW) + 6.315)+'px')
				$('.home .welcome-container .fading-text ul').css('font-size',((0.014*winW) + 1.052)+'px')
				

			}else{
			
			}
			
			
			
		
	}
	
	$(window).resize(function(){
		var winH = $(window).height()
		if(!$('.show-mobile').is(':visible')){
			recalculate_element()
			$('.background-cover').css({height:winH})
		}else{
			$('.background-cover').css({height:'auto','min-height':winH})
			$('.the-hand .inner-hand').css({width:(winH*0.73) - 104.1})
			
			var welcomeH = $('.welcome-container .welcome').height() + $('.welcome-container .hand-mobile').height()
			if(winH > welcomeH){
				$('.welcome-container .hand-mobile').addClass('fixed-bottom')
			}else{
				$('.welcome-container .hand-mobile').removeClass('fixed-bottom')
			}
		}
		vidBg();
	})
	
	$(document).ready(function(e) {
		$(window).trigger('resize')
		
		$('.menu-anchor a').click(function(e){
			e.preventDefault()
			$(this).toggleClass('active')
			$('#menu').toggleClass('active')
		})
		
	});
	
	function do_type($el){
		$($el).typed({
            strings: $($el).attr('data-text'),
            typeSpeed: 0
        });
	}
	
	$('.trigger-bounce').click(function(e){
		e.preventDefault()
		$('body,html').animate({scrollTop: ($(window).height() * 5) },1000)
	})
	
	$('.menu-trigger a').click(function(e){
	e.preventDefault()
	$('body,html').animate({scrollTop: ($(window).height() * 1.5) },1000)
	
})
	
	

	
	$(window).on('scroll touchmove mousewheel',function(e){
		

		$('.typewriter').each(function(index, element) {
			var title = $(this).find('.title')
				var desc = $(this).find('.desc')
			if(!$('.show-mobile').is(':visible')){
			if( $(this).css('opacity') == 1){
				
				
				
				
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
		
		
		}else{
			$(title).html($(title).attr('data-text'))
			$(desc).html($(desc).attr('data-text'))
		}
		
		});
	})

function vidBg(){
	var windowWidth = $(window).width()
	var windowHeight = $(window).height()
	var rat =  windowWidth / windowHeight;
	if (rat > (16/9)) {

		var v = windowWidth * (16/9);
		jQuery("#welcome-video video").css('width', windowWidth);
		jQuery("#welcome-video video").css('height', v);

		var vc = (jQuery("#welcome-video video").height() - windowHeight) / 2;
		jQuery("#welcome-video video").css('margin-top', '-'+vc+'px');
		jQuery("#welcome-video video").css('margin-left', '0px');

	} else {

		var v = windowHeight * (16/9);
		jQuery("#welcome-video video").css('height', windowHeight);
		jQuery("#welcome-video video").css('width', v);

		var vc = (jQuery("#welcome-video video").width() - windowWidth) / 2;
		jQuery("#welcome-video video").css('margin-top', '0px');
		jQuery("#welcome-video video").css('margin-left', '-'+vc+'px');

	}
}



})