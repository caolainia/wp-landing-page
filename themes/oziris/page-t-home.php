<?php
/**
Template Name: Homepage
 */
 
$detect = new Mobile_Detect;
$id = get_the_ID();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php wp_head(); ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '800884093350722');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=800884093350722&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript">(function(o){var b="https://api.autopilothq.com/anywhere/",t="b320c26f52734fbeaa5541ff79cf958ac1e5f2d0215940a19c603113a6fa8acd",a=window.AutopilotAnywhere={_runQueue:[],run:function(){this._runQueue.push(arguments);}},c=encodeURIComponent,s="SCRIPT",d=document,l=d.getElementsByTagName(s)[0],p="t="+c(d.title||"")+"&u="+c(d.location.href||"")+"&r="+c(d.referrer||""),j="text/javascript",z,y;if(!window.Autopilot) window.Autopilot=a;if(o.app) p="devmode=true&"+p;z=function(src,asy){var e=d.createElement(s);e.src=src;e.type=j;e.async=asy;l.parentNode.insertBefore(e,l);};if(!o.noaa){z(b+"aa/"+t+'?'+p,false)};y=function(){z(b+t+'?'+p,true);};if(window.attachEvent){window.attachEvent("onload",y);}else{window.addEventListener("load",y,false);}})({"app":true});</script>

</head>

<body <?php body_class(); ?>>
<?php // START BODY HOMEPAGE ?>


<div class="preloader">
	<div class="preload-bg"></div>
	<div class="preload-spin animated rotate infinite linear"></div>
	<div class="preload-text">Oziris Is Loading</div>
</div>
<div id="page-wrapper">
	<div class="welcome-container background-cover"
data-0="transform:translate(0%,0%); background-position:50% 0px" 
data-100p="transform:translate(0%,-100%); background-position:50% 500px">

<?php if( !$detect->isMobile() || $detect->isTablet() ){ ?>

<section id="welcome-video">
	<video id="movie" poster="<?php bloginfo('template_url') ?>/img/scene-1-bg-new.jpg" preload="auto" autoplay loop>
		<source src="<?php bloginfo('template_url') ?>/img/loop.mp4" type="video/mp4">
	</video>
</section>
<?php } ?>

		<div class="welcome">
			<h1><?php echo get_post_meta($id,'main_heading',true); ?></h1>
			<p class="teaser"><?php echo get_post_meta($id,'sub_heading',true); ?></p>
			<div class="fading-text">
				<?php
				
				$sentence = get_post_meta($id,'fade_in_text',true);
				$sentence_arr = explode("\n",$sentence);
				if(is_array($sentence_arr) && sizeof($sentence_arr)>0){
					echo '<ul>';
					$i=0;
					foreach($sentence_arr as $text){
						$i++;
						echo '<li class="text-fade fade-'.$i.'">'.$text.'</li>';
					}
					echo '</ul>';
				} // end if array
				 ?>
			</div>
		</div>
		
		<div class="hand-mobile show-mobile"><img src="<?php bloginfo('template_url') ?>/img/hand-mobile.png" width="400" height="364" alt="" /></div>
		
	</div>

<?php if( !$detect->isMobile() || $detect->isTablet() ){ ?>
<div class="the-hand">
			<div class="inner-hand"
			data-_scene1-1250p="transform:translate(0,0px)"
			data-_scene1-1300p="transform:translate(0,-70px)"
			data-end="transform:translate(0,-70px)">
			
			<div class="content"
				data-0="display:none"
				data-_scene1-1250p="opacity:0;display:block"
				data-_scene1-1300p="opacity:1;display:block">
				<div class="success-heading"
					data-_scene1-1050p="transform:translate(0,-100%)"
					data-_scene1-1300p="transform:translate(0,0%)"><?php echo get_post_meta($id,'scene_7_heading',true); ?></div>
			
				<div class="left-content"
					data-_scene1-1050p="transform:translate(-100%,0%)"
					data-_scene1-1300p="transform:translate(0%,0%)">
					<?php echo wpautop(get_post_meta($id,'scene_7_description',true)); ?>
				</div>
				
				<div class="right-content"
					data-_scene1-1050p="transform:translate(100%,0%)"
					data-_scene1-1300p="transform:translate(0%,0%)">
					<h2><?php echo get_post_meta($id,'get_now_heading',true); ?></h2>
					<ul>
						<li><a class="apps-store" href="<?php echo get_post_meta($id,'app_store_link',true); ?>"></a></li>
						<li><a class="play-store" href="<?php echo get_post_meta($id,'play_store_link',true); ?>"></a></li>
					</ul>
				</div>
				
				<div class="cta"
					data-_scene1-1050p="transform:translate(0,100%)"
					data-_scene1-1300p="transform:translate(0,0%)">
					<a class="signup ease" href="<?php echo get_post_meta($id,'sign_up_link',true); ?>"><?php echo get_post_meta($id,'sign_up_text',true); ?></a>
					<a class="signup2 ease" href="<?php echo get_post_meta($id,'sign_up_link_2',true); ?>"><?php echo get_post_meta($id,'sign_up_text_2',true); ?></a>
				</div>
				
			</div>
			
			
			<img src="<?php bloginfo('template_url') ?>/img/hand-s.png" width="650" height="736" alt="" />
				<div class="thumb-container">
				<div class="thumb-holder"><img src="<?php bloginfo('template_url')?>/img/thumb-holder.png" width="650" height="391" alt="" />
					<div class="scene-0-thumb thumb ease" 
								data-_scene1-100p="opacity:1" 
								data-_scene1-110p="opacity:0"><img src="<?php bloginfo('template_url') ?>/img/thumb-0.png" width="650" height="391" alt="" />
								<?php /*
								<div class="scroll-text">
									<span class="text">Scroll down to <br/>see OZIRIS in action</span>
									<span class="arrow slideDown animated infinite"></span>
								</div>
								*/ ?>
								</div>
					
					<a href="#" class="trigger-bounce qr-link"
						data-0="display:none"
						data-100="display:block"
						data-_scene1-350p="display:none"
					></a>
					<div class="scene-1-thumb thumb" 
								data-_scene1-100p="transform:translate(0,0%)" 
								data-_scene1-300p="transform:translate(0,0%)" 
								data-_scene1-350p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-1.png" width="650" height="391" alt="" /></div>
					<div class="scene-2-thumb thumb" 
								data-_scene1-300p="transform:translate(0,100%)" 
								data-_scene1-350p="transform:translate(0,0%)" 
								data-_scene1-550p="transform:translate(0,0%)" 
								data-_scene1-650p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-2.png" width="650" height="391" alt="" /></div>
								
					<div class="scene-thumb-fixed thumb" style="z-index:8"
								data-_scene1-300p="transform:translate(0,100%);opacity:1" 
								data-_scene1-350p="transform:translate(0,0%);opacity:1"
								data-_scene1-750p="transform:translate(0,0%);opacity:1" 
								data-_scene1-1150p="transform:translate(0,0%);opacity:1" 
								data-_scene1-1250p="transform:translate(0,0%);opacity:1"><img
																																							data-_scene1-1240p="opacity:1"
																																							data-_scene1-1250p="opacity:0"
																																							class="ease" src="<?php bloginfo('template_url') ?>/img/thumb-stick.png" width="650" height="391" alt="" /></div>
								
								
					<div class="scene-3-thumb thumb" 
								data-_scene1-550p="transform:translate(0,100%)" 
								data-_scene1-650p="transform:translate(0,0%)"
								data-_scene1-750p="transform:translate(0,0%)" 
								data-_scene1-850p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-3.png" width="650" height="391" alt="" /></div>
					<div class="scene-4-thumb thumb" 
								data-_scene1-750p="transform:translate(0,100%)" 
								data-_scene1-850p="transform:translate(0,0%)"
								data-_scene1-950p="transform:translate(0,0%)" 
								data-_scene1-1050p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-4.png" width="650" height="391" alt="" /></div>
					<div class="scene-5-thumb thumb" 
								data-_scene1-950p="transform:translate(0,100%);opacity:1" 
								data-_scene1-1050p="transform:translate(0,0%);opacity:1"
								data-_scene1-1150p="transform:translate(0,0%);opacity:1" 
								data-_scene1-1250p="transform:translate(0,0%);opacity:1"><img
																																							data-_scene1-1240p="opacity:1"
																																							data-_scene1-1250p="opacity:0"
																																							class="ease" src="<?php bloginfo('template_url') ?>/img/thumb-5.png" width="650" height="391" alt="" /></div>
					<div class="scene-6-thumb thumb" 
								data-_scene1-1150p="transform:translate(0,0%)" 
								data-end="transform:translate(0,0%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-6.png" width="650" height="391" alt="" /></div>
				</div>
				</div>
				<div class="scene-1-snap ease" 
								data-0="display:none"
								data-_scene1-100p="opacity:0;display:block" 
								data-_scene1-110p="opacity:1;display:block" 
								data-_scene1-180p="opacity:1;display:block" 
								data-_scene1-200p="opacity:0;display:block"
								data-_scene1-250p="opacity:0;display:none"><div class="animated bounce infinite trigger-bounce"><div><a href="#"><?php echo get_post_meta($id,'phone_text',true); ?></a></div></div><img src="<?php bloginfo('template_url') ?>/img/snap-scan.png" width="650" height="563" alt="" /></div>
			</div>
			
			<div class="oziris-ads-footer">
				<div class="oziris-ads-text">
					<span class="image"><img src="<?php bloginfo('template_url')?>/img/iphone-hero.png" alt="" /></span>
					<span class="text"><?php echo get_post_meta($id,'popup_text',true); ?></span>
					<a href="<?php echo get_post_meta($id,'popup_link',true); ?>"><?php echo get_post_meta($id,'popup_anchor',true); ?></a>
				</div>
				
			</div>
			<div class="oziris-ads-footer-bg"></div>
		</div>
		<div class="close-oziris-ads">&nbsp;</div>
		
		<div class="scroll-trigger"
								data-0="opacity:1"
								data-_scene1-1230p="opacity:1"
								data-_scene1-1240p="opacity:0">
		<img class="animated infinite slidingarrow" src="<?php bloginfo('template_url')?>/img/scroll-down.png" width="44" height="26" alt="" /></div>
		
		

<?php } ?>
	
	
	
	<div id="menu" <?php if($detect->isMobile() && !$detect->isTablet()){ echo 'class="background-cover"'; } ?>
data-0="transform:translate(0,-100%);top:0%;z-index:90"
data-_scene1-80p="transform:translate(0,-100%);top:0%;z-index:90"
data-_scene1-100p="transform:translate(0,0%);top:0%;z-index:90"
data-_scene1-950p="ttransform:translate(0,0%);op:0%;z-index:90"
data-_scene1-951p="transform:translate(0,0%);top:0%;z-index:101">

		<header id="masthead" class="site-header" role="banner">

         
						
						
						
						
						
		<div class="menu-inner clearfix">
			<div class="menu-logo"> <a href="<?php echo home_url()?>"><img src="<?php bloginfo('template_url') ?>/img/menu-logo.png" width="105" height="53" alt="" /> </a></div>
			<div class="menu-items">
				 <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</div>
		
		
						<div class="show-mobile menu-anchor"><a href="#">&nbsp;</a></div>					

	</header><!-- #masthead -->

	</div>
	
	
	
	<div class="scene1 background-cover"
							data-0p="transform:translate(0%,100%);" 
							data-_scene1-100p="transform:translate(0,0%)" 
							data-_scene1-250p="transform:translate(0,0%)" 
							data-_scene1-350p="transform:translate(0,-100%)">
		<div class="grad"></div>
		<div class="product" 
								data-_scene1-0p="background-position:0% 50%" 
								data-_scene1-100p="background-position:50% 50%" 
								data-_scene1-250p="background-position:50% 50%" 
								data-_scene1-350p="background-position:100% 50%"></div>
		<div class="fog animated long infinite slidingleft"></div>
		
		<div class="capture-mobile show-mobile">
			<div class="capture-text">Find a Beston product & open <br><strong>OZIRIS</strong> on your mobile devices</div>
			<div class="capture-infos"><?php echo get_post_meta($id,'phone_text',true); ?></div>
			<div class="capture-image">
				<img src="<?php bloginfo('template_url') ?>/img/capture-mobile.png" alt="" width="400" height="674" />
				</div>
		</div>
	</div><!-- .scene1 -->
	
	<?php if( !$detect->isMobile() || $detect->isTablet() ){ ?>
	<div class="scene2 background-cover" 
							data-_scene1-250p="transform:translate(0,100%)" 
							data-_scene1-350p="transform:translate(0,0%)" 
							data-_scene1-550p="transform:translate(0,0%);background-position: 50% 50%;" 
							data-_scene1-650p="transform:translate(0,-100%);background-position: 50% 120%;" 
							data-_scene1-750p="transform:translate(0,-100%)" 
							data-_scene1-850p="transform:translate(0,-200%)" 
							data-end="transform:translate(0,-200%);background-position: 50% 120%;">
		<div class="line-container line-container-1" 
								data-_scene1-350p="opacity:0" 
								data-_scene1-390p="opacity:1">
			<div class="line line-1"><img src="<?php bloginfo('template_url') ?>/img/line-1.png" width="1284" height="271" alt=""></div>
		</div>
		<div class="typer-container">
			<div class="typewriter typewriter-1" 
									data-_scene1-400p="opacity:0" 
									data-_scene1-450p="opacity:1" >
				<div class="title" data-text="<?php echo get_post_meta($id,'scene_3_title',true); ?>"></div>
				<div class="desc" data-text="<?php echo get_post_meta($id,'scene_3_desc',true); ?>"></div>
			</div>
		</div>
		<div class="image-entity forklisft" 
					data-_scene1-250p="transform:translate(0%,-70%)" 
					data-_scene1-350p="transform:translate(0%,20%)" ><img src="<?php bloginfo('template_url') ?>/img/forklisft.png" width="446" height="264" alt="" />
					</div>
		<div class="image-entity box" 
					data-_scene1-250p="transform:translate(-50%,-90%)" 
					data-_scene1-350p="transform:translate(-50%,20%)"><img src="<?php bloginfo('template_url') ?>/img/box.png" width="321" height="242" alt="" />
					</div>
		<div class="line-container line-container-2" 
					data-_scene1-550p="opacity:0" 
					data-_scene1-650p="opacity:1">
			<div class="line line-2">
				<img src="<?php bloginfo('template_url') ?>/img/line-2.png" width="1284" height="870" alt="">
			</div>
		</div>
	</div><!-- .scene2 -->
	
	
	<div class="scene3 background-cover" 
					data-_scene1-550p="transform:translate(0,100%)" 
					data-_scene1-650p="transform:translate(0,0%)" 
					data-_scene1-750p="transform:translate(0,0%);background-position: 50% 50%;" 
					data-_scene1-850p="transform:translate(0,-100%);background-position: 50% -1200%;" 
					data-_scene1-950p="transform:translate(0,-100%);" 
					data-_scene1-1050p="transform:translate(0,-200%);" 
					data-end="transform:translate(0,-200%);background-position: 50% -1200%;">

		<div class="typer-container">
			<div class="typewriter typewriter-2" 
						data-_scene1-600p="opacity:0" 
						data-_scene1-650p="opacity:1" >
				<div class="title" data-text="<?php echo get_post_meta($id,'scene_4_title',true); ?>"></div>
				<div class="desc" data-text="<?php echo get_post_meta($id,'scene_4_desc',true); ?>"></div>
			</div>
		</div>
		
		<div class="image-entity airplane" 
					data-_scene1-550p="transform:translate(0%,-30%)" 
					data-_scene1-650p="transform:translate(0%,0%)"><img src="<?php bloginfo('template_url') ?>/img/airplane.png" width="1376" height="551" alt="" />
					</div>
		
		<div class="image-entity car" 
					data-_scene1-550p="transform:translate(0%,-30%)" 
					data-_scene1-650p="transform:translate(0%,10%)"><img src="<?php bloginfo('template_url') ?>/img/car.png" width="160" height="71" alt="" />
					</div>
		
		<div class="image-entity box-2" 
					data-_scene1-550p="transform:translate(0%,-100%)" 
					data-_scene1-650p="transform:translate(0%,0%)"><img src="<?php bloginfo('template_url') ?>/img/box-2.png" width="392" height="185" alt="" />
					</div>
					
		<div class="line-container line-container-3" 
					data-_scene1-650p="opacity:0" 
					data-_scene1-750p="opacity:1">
			<div class="line line-3">
				<img src="<?php bloginfo('template_url') ?>/img/line-3.png" width="1284" height="466" alt="">
			</div>
		</div>
		
		
	</div><!-- .scene3 -->
	
	
	
	
	
	
	
	<div class="scene4 background-cover" 
					data-_scene1-750p="transform:translate(0,100%)" 
					data-_scene1-850p="transform:translate(0,0%)" 
					data-_scene1-950p="transform:translate(0,0%)" 
					data-_scene1-1050p="transform:translate(0,-100%)" 
					data-_scene1-1150p="transform:translate(0,-100%)" 
					data-_scene1-1250p="transform:translate(0,-200%)" 
				
					data-end="transform:translate(0,-100%)">
		
		<div class="typer-container">
			<div class="typewriter typewriter-3" 
						data-_scene1-800p="opacity:0" 
						data-_scene1-850p="opacity:1" >
				<div class="title" data-text="<?php echo get_post_meta($id,'scene_5_title',true); ?>"></div>
				<div class="desc" data-text="<?php echo get_post_meta($id,'scene_5_desc',true); ?>"></div>
			</div>
		</div>
					
		
		<div class="machine-container"
		data-_scene1-850p="opacity:1"
		data-_scene1-950p="opacity:1"
		data-_scene1-1030p="opacity:0" >
		
		
			<div class="mountain"
					data-_scene1-750p="background-position:0% -50px"
					data-_scene1-850p="background-position:0% 0px"
					data-_scene1-950p="background-position:0% 0px"
					data-_scene1-1050p="background-position:0% -150px" >
			</div>
			<div class="machine">
			</div>
		</div>

		
	
		<div class="line-container line-container-4" 
					data-_scene1-950p="opacity:0" 
					data-_scene1-1050p="opacity:1">
			<div class="line line-4">
				<img src="<?php bloginfo('template_url') ?>/img/line-4.png" width="1284" height="558" alt="">
			</div>
		</div>
	
		
	</div><!-- .scene4 -->
	
	
	<div class="scene5 background-cover" 
					data-_scene1-950p="transform:translate(0,100%)" 
					data-_scene1-1050p="transform:translate(0,0%)" 
					data-_scene1-1150p="transform:translate(0,0%)" 
					data-_scene1-1250p="transform:translate(0,-100%)" 
					data-end="transform:translate(0,-100%)">
		
		<div class="typer-container">
			<div class="typewriter typewriter-4" 
						data-_scene1-1000p="opacity:0" 
						data-_scene1-1050p="opacity:1" >
				<div class="title" data-text="<?php echo get_post_meta($id,'scene_6_title',true); ?>"></div>
				<div class="desc" data-text="<?php echo get_post_meta($id,'scene_6_desc',true); ?>"></div>
			</div>
		</div>
		
		
		<div class="image-entity cow" 
					data-_scene1-950p="transform:translate(0%,-70%)" 
					data-_scene1-1050p="transform:translate(0%,0%)"
					data-_scene1-1150p="transform:translate(0%,0%)"
					data-_scene1-1250p="transform:translate(0%,50%)"><img src="<?php bloginfo('template_url') ?>/img/cow.png" width="458" height="413" alt="" />
					</div>
	
	</div><!-- scene5 -->
	
	<?php } // end if not mobile ?>
	
	<div class="show-mobile app-screenshot">
		<img src="<?php bloginfo('template_url')?>/img/app-screenshot-2.png" alt="" />
	</div>
	
	
	
	
	
	<div class="scene6 background-cover" 
					data-_scene1-1150p="transform:translate(0,100%)" 
					data-_scene1-1250p="transform:translate(0,0%)" 
					data-_scene1-1350p="transform:translate(0,0%);"
					data-end="transform:translate(0,0%);">
					
			<div class="content-mobile show-mobile">
				<div class="finish-heading"><span><?php echo get_post_meta($id,'scene_7_heading',true); ?></span></div>
				<div class="finish-image"><img src="<?php bloginfo('template_url') ?>/img/success-hand.png" width="400" height="561" alt="" ></div>
				<div class="finish-info">
					<div class="finish-info-inner">
				<?php echo wpautop(get_post_meta($id,'scene_7_description',true)); ?>
				</div>
				</div>
				<div class="finish-link">
					<h3><?php echo get_post_meta($id,'get_now_heading',true); ?></h3>
					<ul>
						<li><a class="apps-store" href="<?php echo get_post_meta($id,'app_store_link',true); ?>"></a></li>
						<li><a class="play-store" href="<?php echo get_post_meta($id,'play_store_link',true); ?>"></a></li>
					</ul>
				</div>
			
			<div class="finish-cta">
			<a class="signup" href="<?php echo get_post_meta($id,'sign_up_link',true); ?>"><?php echo get_post_meta($id,'sign_up_text',true); ?></a>
			<a class="signup2" href="<?php echo get_post_meta($id,'sign_up_link_2',true); ?>"><?php echo get_post_meta($id,'sign_up_text_2',true); ?></a></div>

			</div>
	
	</div><!-- .scene6 -->
	
	
	
	<div class="footer" style="z-index:500"
					data-_scene1-1250p="transform:translate(0,0%)" 
					data-_scene1-1300p="transform:translate(0,-100%)">
						<div class="inner">
						&copy; <?php echo date('Y') ?> oziris Beston Global Food Company Ltd<br>
						ACN 603 023 383
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
						</div>
	
	</div><!-- .footer -->
	
	
	<div class="show-mobile app-ads-mobile">
		<div class="mobile-ads-inner">
			<div class="mobile-ads-snap"><img src="<?php bloginfo('template_url')?>/img/iphone-hero.png" alt="" /></div>
			<div class="menu-ads">
				<ul>
						<li><a class="apps-store" href="<?php echo get_post_meta($id,'app_store_link',true); ?>"></a></li>
						<li><a class="play-store" href="<?php echo get_post_meta($id,'play_store_link',true); ?>"></a></li>
					</ul>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	

<div class="hide-mobile menu-trigger"><a href="#">&nbsp;</a></div>
</div>











<?php // END BODY HOMEPAGE ?>
<?php wp_footer(); ?>
</body>
</html>