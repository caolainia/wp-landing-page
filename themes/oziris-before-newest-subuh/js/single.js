jQuery(function($){
	"use strict"
	
	
	$(window).resize(function(){
		var winH = $(window).height()
		$('.content-join').css('min-height',winH - $('.site-footer').height()) 
	})
	
	$(document).ready(function(e) {
		$(window).trigger('resize')
	});
	
	function add_autocomplete(){
		$('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').each(function(index, element) {
			$(this).attr('autocomplete','off')
			
			var this_label = $(this).parent().siblings('label').text()
			var this_desc = $(this).parent().siblings('.gfield_description:not(.validation_message)').text()
			$(this).attr('placeholder',this_label+' '+this_desc+'')
		});
		
		// disable next
		$('.the-form .gform_next_button, .the-form .gform_wrapper .gform_page_footer .button.gform_button').attr('disabled','disabled')
		
		$('.the-form .gform_page_footer').addClass('clearfix')
	}
	
	$(document).ready(function(e) {
		add_autocomplete()
		checkempty()
		 uploadButton()
	});
	
	// check empty field
	function checkempty(){
		$('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').on('change blur keyup',function(){
			
			if($(this).val().length > 0){
				$(this).parents('li.gfield').addClass('not-empty')
			}
			
			var inputReqLength 	= $(this).parents('.gform_page_fields').find('.gfield_contains_required').length
			var inputNotEmpty 	= $(this).parents('.gform_page_fields').find('.gfield_contains_required.not-empty').length
			if(inputReqLength == inputNotEmpty){
				$(this).parents('.gform_page').find('.gform_page_footer').find('.gform_next_button').removeAttr('disabled')
				$(this).parents('.gform_page').find('.gform_page_footer').find('.button.gform_button').removeAttr('disabled')
			}else{
				$(this).parents('.gform_page').find('.gform_page_footer').find('.gform_next_button').attr('disabled','disabled')
				$(this).parents('.gform_page').find('.gform_page_footer').find('.button.gform_button').attr('disabled','disabled')
			}
			
		})
	}
	
	
	
	jQuery(document).bind('gform_post_render', function(e,i,a){
		if(i==3 && a==1){
			$('.join-header,.the-form').removeClass('step-2 step-3');
			$('.join-header,.the-form').addClass('step-1')
			$('body,html').animate({scrollTop:$('#join-header').offset().top-100},700)
		}
		
		if(i==3 && a==2){
			$('.join-header,.the-form').removeClass('step-1 step-3');
			$('.join-header,.the-form').addClass('step-2')
			$('body,html').animate({scrollTop:$('#join-header').offset().top-100},700)
		}
		
		if(i==3 && a==3){
			$('.join-header,.the-form').removeClass('step-1 step-2');
			$('.join-header,.the-form').addClass('step-3')
			$('body,html').animate({scrollTop:$('#join-header').offset().top-100},700)
		}
		add_autocomplete()
		
		// re binding check empty
		checkempty()
		$('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').trigger('blur')
		
		
		
		$(document).find( '.the-form .gform_body ul li.submit-logo').append('<div class="upload-button-helper"><strong>Browse</strong><svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 20 17" fill="#fdb816"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Choose a file&hellip;</span></div>')
				
  });
	
	
	jQuery(document).bind('gform_confirmation_loaded', function(event, formId){
			if(formId == 3){
				$('.content-join').addClass('finish')
			}
			
			$('body,html').animate({scrollTop:0},700)
	});
	


// input button
function uploadButton(){
$( '.the-form .gform_body ul li.submit-logo').append('<div class="upload-button-helper"><strong>Browse</strong><svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 20 17" fill="#fdb816"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Choose a file&hellip;</span></div>')


	var inputs = $(document).find('.the-form .gform_body ul li.submit-logo input' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = $(document).find('.the-form .gform_body ul li.submit-logo label'),
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				 $(document).find('.upload-button-helper span').html(fileName);
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}

$(document).on('click','.upload-button-helper',function(){
	$('.the-form .gform_body ul li.submit-logo label').trigger('click')
})

$('.category-dropdown h4').click(function(){
	$(this).parent().siblings('li').removeClass('active')
	$(this).parent().siblings('li').find('.category-list').slideUp()
	
	if($(this).parent().hasClass('active')){
			$(this).siblings('.category-list').slideUp()
			$(this).parent().removeClass('active')		
		}else{
			$(this).siblings('.category-list').slideDown()
			$(this).parent().addClass('active')
	}
	
	
	
})

})