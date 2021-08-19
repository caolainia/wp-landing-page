jQuery(function($) {
  "use strict"
	

  $(window).resize(function() {
    var winH = $(window).height()
    $('.content-join').css('min-height', winH - $('.site-footer').height())
  })


	$(window).load(function(e) {
    $(window).trigger('resize')
  });

  function add_autocomplete() {
    $('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').each(function(index, element) {
      $(this).attr('autocomplete', 'off')

      var this_label = $(this).parent().siblings('label').text()
      var this_desc = $(this).parent().siblings('.gfield_description:not(.validation_message)').text()
      $(this).attr('placeholder', this_label + ' ' + this_desc + '')
    });

    // disable next
    $('.the-form .gform_next_button, .the-form .gform_wrapper .gform_page_footer .button.gform_button').attr('disabled', 'disabled')
    $('.the-form .gform_page_footer').addClass('clearfix')

    $('.ginput_complex label').each(function(index, element) {
      $(this).siblings('input').attr('placeholder', $(this).text())
    });

    $('.ginput_complex select').select2({
      placeholder: "Country",
    });

  }

  $(document).ready(function(e) {
    add_autocomplete()
    checkempty()
    uploadButton()
  });

  // check empty field
  function checkempty() {
    $('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').on('change blur keyup', function() {

      if ($(this).val().length > 0) {
        $(this).parents('li.gfield').addClass('not-empty')
      }

      var inputReqLength = $(this).parents('.gform_page_fields').find('.gfield_contains_required').length
      var inputNotEmpty = $(this).parents('.gform_page_fields').find('.gfield_contains_required.not-empty').length
      if (inputReqLength == inputNotEmpty) {
        $(this).parents('.gform_page').find('.gform_page_footer').find('.gform_next_button').removeAttr('disabled')
        $(this).parents('.gform_page').find('.gform_page_footer').find('.button.gform_button').removeAttr('disabled')
      } else {
        $(this).parents('.gform_page').find('.gform_page_footer').find('.gform_next_button').attr('disabled', 'disabled')
        $(this).parents('.gform_page').find('.gform_page_footer').find('.button.gform_button').attr('disabled', 'disabled')
      }

    })
  }

  jQuery(document).bind('gform_post_render', function(e, i, a) {
    if (i == 3 && a == 1) {
      $('.join-header,.the-form').removeClass('step-2 step-3');
      $('.join-header,.the-form').addClass('step-1')
      $('body,html').animate({
        scrollTop: $('#join-header').offset().top - 100
      }, 700)
    }

    if (i == 3 && a == 2) {
      $('.join-header,.the-form').removeClass('step-1 step-3');
      $('.join-header,.the-form').addClass('step-2')
      $('body,html').animate({
        scrollTop: $('#join-header').offset().top - 100
      }, 700)
    }

    if (i == 3 && a == 3) {
      $('.join-header,.the-form').removeClass('step-1 step-2');
      $('.join-header,.the-form').addClass('step-3')
      $('body,html').animate({
        scrollTop: $('#join-header').offset().top - 100
      }, 700)
    }
    add_autocomplete()
		uploadButton()
		if( $('.the-form .gform_body ul li.submit-logo .ginput_container_fileupload .ginput_preview').length > 0){
			var filenameGF = $('.the-form .gform_body ul li.submit-logo .ginput_container_fileupload .ginput_preview strong').text()
			$(document).find('.the-form .gform_body ul li.submit-logo .upload-button-helper span').html(filenameGF)
		}

    // re binding check empty
    checkempty()
    $('.the-form .gform_body ul li input[type="text"],.the-form .gform_body ul li input[type="email"],.the-form .gform_body ul li textarea').trigger('blur')



  });

  jQuery(document).bind('gform_confirmation_loaded', function(event, formId) {
    if (formId == 3) {
      $('.content-join').addClass('finish')
    }

    $('body,html').animate({
      scrollTop: 0
    }, 700)
  });

  // input button
  function uploadButton() {
		$('.the-form .gform_body ul li.submit-logo .upload-button-helper').remove()
    $('.the-form .gform_body ul li.submit-logo').append('<div class="upload-button-helper"><strong>Browse</strong><svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 20 17" fill="#fdb816"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Choose a file&hellip;</span></div>')
 
	
	 var inputs = $(document).find('.the-form .gform_body ul li.submit-logo input');
	 
    Array.prototype.forEach.call(inputs, function(input) {
      var label = $(document).find('.the-form .gform_body ul li.submit-logo label'),
        labelVal = label.innerHTML;
				
				


      $(input).on('change', function(e) {
				
        var fileName = '';
        if (this.files && this.files.length > 1){
          fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
				}else{
          fileName = e.target.value.split('\\').pop();
				}
				
        if (fileName){
          $(document).find('.upload-button-helper span').html(fileName);
				}else{
          label.innerHTML = labelVal;

				}
      });

      // Firefox bug fix
      input.addEventListener('focus', function() {
        input.classList.add('has-focus');
      });
      input.addEventListener('blur', function() {
        input.classList.remove('has-focus');
      });
    });
 }
  $(document).on('click', '.upload-button-helper', function() {
    $('.the-form .gform_body ul li.submit-logo label').trigger('click')
  })

  $('.category-dropdown h4').click(function() {
    $(this).parent().siblings('li').removeClass('active')
    $(this).parent().siblings('li').find('.category-list').slideUp()

    if ($(this).parent().hasClass('active')) {
      $(this).siblings('.category-list').slideUp()
      $(this).parent().removeClass('active')
    } else {
      $(this).siblings('.category-list').slideDown()
      $(this).parent().addClass('active')
    }
  })

  $(window).resize(function(e) {
		
		
		var is_landscape = $(window).width() > $(window).height() ? true : false;
		$('body .menu-main-container,.menu-main-container').removeAttr('style')



    if ($('.show-mobile').is(':visible')) {
			if(!is_landscape){
				$('body .menu-main-container').css({
					height: $(window).height() - $('#menu .menu-logo').height(),
					marginTop: -($(window).height() - $('#menu .menu-logo').height())
				})
			}else{
				$('body .menu-main-container').css({
					height: $('body .menu-main-container').height(),
					marginTop: -$('body .menu-main-container').height()
				})
			}
    } else {
      $('body .menu-main-container,.menu-main-container').removeAttr('style')
    }
		
		
		
		

    if ($(window).height() <= 1080) {
      $('.the-hand-footer .inner-hand').css({
        width: ($(window).height() * 0.73) - 104.1
      })
    } else {
      $('.the-hand-footer .inner-hand').removeAttr('style')
    }

  });

  $('body .menu-anchor a').click(function(e) {
		
		var is_landscape = $(window).width() > $(window).height() ? true : false;
		
    e.preventDefault()
    $(this).toggleClass('active')
    $('#menu').toggleClass('active')
    if ($(this).hasClass('active')) {
			if(!is_landscape){
				$('.menu-main-container').css({
					height: $(window).height() - $('#menu .menu-logo').height(),
					marginTop: 0
				})
			}else{
				$('.menu-main-container').css({
					height: $('body .menu-main-container').height(),
					marginTop: 0
				})			
			}
			
			
    } else {
      if(!is_landscape){
				$('body .menu-main-container').css({
					height: $(window).height() - $('#menu .menu-logo').height(),
					marginTop: -($(window).height() - $('#menu .menu-logo').height())
				})
			}else{
				$('body .menu-main-container').css({
					height: $('body .menu-main-container').height(),
					marginTop: -$('body .menu-main-container').outerHeight()
				})
			}
    }

  })


  $('#menu li.menu-appstore.apps').before('<li class="clear-mobile" />')


  $(document).ready(function(e) {
    $(".mainslider ul li").fitVids();
  });


  $(window).load(function() {
    // init Isotope
    var $grid = $('.partner-list .row').isotope({
      itemSelector: '.partner-loop',
      layoutMode: 'fitRows'
    });

    // bind filter button click
    $('.partner-filter ul').on('click', 'a', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({
        filter: filterValue
      });
    });

    $('.partner-filter ul').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });


    /// partner slider
    var slider, // Global slider value to force playing and pausing by direct access of the slider control
      canSlide = true; // Global switch to monitor video state

    // Load the YouTube API. For some reason it's required to load it like this
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // Setup a callback for the YouTube api to attach video event handlers
    window.onYouTubeIframeAPIReady = function() {
      // Iterate through all videos
      $('.flexslider iframe').each(function() {
        // Create a new player pointer; "this" is a DOMElement of the player's iframe
        var player = new YT.Player(this, {
          playerVars: {
            autoplay: 0
          }
        });

        // Watch for changes on the player
        player.addEventListener("onStateChange", function(state) {
          switch (state.data) {
            // If the user is playing a video, stop the slider
            case YT.PlayerState.PLAYING:
              slider.flexslider("stop");
              canSlide = false;
              break;
              // The video is no longer player, give the go-ahead to start the slider back up
            case YT.PlayerState.ENDED:
            case YT.PlayerState.PAUSED:
              slider.flexslider("play");
              canSlide = true;
              break;
          }
        });

        $(this).data('player', player);
      });
    }

    // Setup the slider control
    slider = $(".mainslider").flexslider({
      animation: "slide",
      easing: "swing",
      slideshowSpeed: 6500,
      animationSpeed: 900,
      pauseOnHover: true,
      pauseOnAction: true,
      touch: true,
      video: true,
      controlNav: true,
      animationLoop: true,
      slideshow: true,
      smoothHeight: true,
      useCSS: false,
      // Before you go to change slides, make sure you can!
      before: function() {
        if (!canSlide)
          slider.flexslider("stop");
      }
    });

    slider.on("click", ".flex-prev, .flex-next, .flex-control-paging li a", function() {
      canSlide = true;
      $('.flexslider iframe').each(function() {
        $(this).data('player').pauseVideo();
      });
    });

  })


  $(document).ready(function(e) {

		// LOAD MORE INDEX (BLOG PAGE)
    $('.content-blog .load-more a').on('inview', function(event, isInView) {
        if (isInView) {
          var $this = $('.content-blog .load-more a')
          if (!$this.hasClass('ajax-started')) {
            $.ajax({
              type: 'POST',
              dataType: "json",
              url: loadmore.ajaxurl,
              data: {
                paging: $($this).attr('data-paging'),
                security: loadmore._nonce,
                action: 'dn_load_more_ajax'
              },
              beforeSend: function() {
                $($this).addClass('ajax-started')
                $($this).parent().siblings('.loader').fadeIn()
              },
              success: function(data) {
                $($this).attr('data-paging', data.paging)
                $($this).parent().parent().siblings('.also-post').find('.row.ajax-holder').append(data.content)

                $($this).parent().siblings('.loader').fadeOut()

                if (data.is_last == true) {
                  $($this).parent().siblings('.loader').fadeOut(400, function() {
                    $($this).remove()
                  })

                }

                setTimeout(function() {
                  $($this).removeClass('ajax-started')
                }, 500)


              },
              error: function(a, v, b) {

              }
            });
          } // end if ajax-started
        } // end IF inview
      }) // end inview
			
			
			
			
			
			
			
			
			
			// LOAD MORE ARCHIVE
			$('.content-archive .archive-load-more a').on('inview', function(event, isInView) {
        if (isInView) {
          var $this = $('.content-archive .archive-load-more a')
          if (!$this.hasClass('ajax-started')) {
            $.ajax({
              type: 'POST',
              dataType: "json",
              url: loadmore.ajaxurl,
              data: {
                paging: $($this).attr('data-paging'),
								postperpage: $($this).attr('data-postperpage'),
								cat: $($this).attr('data-category'),
                security: loadmore._nonce,
                action: 'dn_load_more_ajax_archive'
              },
              beforeSend: function() {
                $($this).addClass('ajax-started')
                $($this).parent().siblings('.loader').fadeIn()
              },
              success: function(data) {
                $($this).attr('data-paging', data.paging)
                $($this).parent().parent().siblings('.ajax-holder').append(data.content)

                $($this).parent().siblings('.loader').fadeOut()

                if (data.is_last == true) {
                  $($this).parent().siblings('.loader').fadeOut(400, function() {
                    $($this).remove()
                  })

                }

                setTimeout(function() {
                  $($this).removeClass('ajax-started')
                }, 500)


              },
              error: function(a, v, b) {

              }
            });
          } // end if ajax-started
        } // end IF inview
      }) // end inview

  });

})
