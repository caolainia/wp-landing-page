<?php
/**
Template Name: Homepage
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php // START BODY HOMEPAGE ?>


<div class="preloader">
</div>
<div id="page-wrapper">
	<div class="welcome-container background-cover" 
data-0="background-position:50% 0px" 
data-100p="background-position:50% -100px">
		<div class="welcome">
			<div class="logo"><img src="<?php bloginfo('template_url') ?>/img/oziris-logo.png" alt="" width="427" height="327" /></div>
			<h1>Intelligently Securing <strong>Your Food & Drinks</strong></h1>
			<p class="teaser">Oziris ensures the products you purchase are true to their origin both in quality & authenticity.</p>
		</div>
		<div class="the-hand">
			<div class="inner-hand"
			data-_scene1-1300p="transform:translate(0,0px)"
			data-end="transform:translate(0,-70px)">
			
			<div class="content"
				data-0="display:none"
				data-_scene1-1250p="opacity:0;display:block"
				data-_scene1-1300p="opacity:1;display:block">
				<div class="success-heading"
					data-_scene1-1050p="transform:translate(0,-100%)"
					data-_scene1-1300p="transform:translate(0,0%)">Your OZiris scan has been successfull</div>
			
				<div class="left-content"
					data-_scene1-1050p="transform:translate(-100%,0%)"
					data-_scene1-1300p="transform:translate(0%,0%)"
				>
					<h2><strong>Oziris</strong> aims to eliminate<br> Counterfeit products from<br> the food industry</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				
				<div class="right-content"
					data-_scene1-1050p="transform:translate(100%,0%)"
					data-_scene1-1300p="transform:translate(0%,0%)"
				>
					<h2><strong>Get it now</strong> on your favourite App Store</h2>
					<ul>
						<li><a class="apps-store" href="#"></a></li>
						<li><a class="play-store" href="#"></a></li>
					</ul>
				</div>
				
				<div class="cta"
					data-_scene1-1050p="transform:translate(0,100%)"
					data-_scene1-1300p="transform:translate(0,0%)"><a href="#" class="ease">Interested in joining? <strong>Sign Up</strong></a></div>
				
			</div>
			
			
			<img src="<?php bloginfo('template_url') ?>/img/hand-s.png" width="650" height="736" alt="" />
				<div class="thumb-container">
					<div class="scene-0-thumb thumb ease" 
								data-_scene1-100p="opacity:1" 
								data-_scene1-110p="opacity:0"><img src="<?php bloginfo('template_url') ?>/img/thumb-0.png" width="650" height="391" alt="" /></div>
					<div class="scene-1-thumb thumb" 
								data-_scene1-100p="transform:translate(0,0%)" 
								data-_scene1-300p="transform:translate(0,0%)" 
								data-_scene1-350p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-1.png" width="650" height="391" alt="" /></div>
					<div class="scene-2-thumb thumb" 
								data-_scene1-350p="transform:translate(0,0%)" 
								data-_scene1-550p="transform:translate(0,0%)" 
								data-_scene1-650p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-2.png" width="650" height="391" alt="" /></div>
					<div class="scene-3-thumb thumb" 
								data-_scene1-550p="transform:translate(0,0%)" 
								data-_scene1-750p="transform:translate(0,0%)" 
								data-_scene1-850p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-3.png" width="650" height="391" alt="" /></div>
					<div class="scene-4-thumb thumb" 
								data-_scene1-750p="transform:translate(0,0%)" 
								data-_scene1-950p="transform:translate(0,0%)" 
								data-_scene1-1050p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-4.png" width="650" height="391" alt="" /></div>
					<div class="scene-5-thumb thumb" 
								data-_scene1-950p="transform:translate(0,0%)" 
								data-_scene1-1150p="transform:translate(0,0%)" 
								data-_scene1-1250p="transform:translate(0,-100%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-5.png" width="650" height="391" alt="" /></div>
					<div class="scene-6-thumb thumb" 
								data-_scene1-1150p="transform:translate(0,0%)" 
								data-end="transform:translate(0,0%)"><img src="<?php bloginfo('template_url') ?>/img/thumb-6.png" width="650" height="391" alt="" /></div>
				</div>
				<div class="scene-1-snap ease" 
								data-_scene1-100p="opacity:0" 
								data-_scene1-110p="opacity:1" 
								data-_scene1-180p="opacity:1" 
								data-_scene1-200p="opacity:0"><span>Scan To Trace The Origin <br>
					of the Product</span><img src="<?php bloginfo('template_url') ?>/img/snap-scan.png" width="650" height="563" alt="" /></div>
			</div>
		</div>
	</div>
	<div id="menu" 
data-_scene1-100p="position:fixed;top:0%">
		<div class="menu-inner clearfix">
			<div class="menu-logo"> <img src="<?php bloginfo('template_url') ?>/img/menu-logo.png" width="105" height="52" alt="" /> </div>
			<div class="menu-item">
				<ul>
					<li><a href="<?php echo home_url()?>">Home</a></li>
          <li><a href="<?php echo get_permalink(2) ?>">About Us</a></li>
					<li><a href="<?php echo get_permalink(22) ?>">Sign Up</a></li>
					<li><a href="<?php echo get_permalink(17) ?>">Contact Us</a></li>
					<li class="menu-icon"><a class="icon-facebook" href="#"></a></li>
					<li class="menu-icon"><a class="icon-instagram" href="#"></a></li>
					<li class="apps menu-appstore"><a href="#"></a></li>
					<li class="apps menu-playstore"><a href="#"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="scene1 background-cover" 
							data-0="position:relative" 
							data-top="position:fixed;transform:translate(0,0%)" 
							data-_scene1-250p="position:fixed;transform:translate(0,0%)" 
							data-_scene1-350p="transform:translate(0,-100%)">
		<div class="grad"></div>
		<div class="product" 
								data-_scene1-0p="background-position:0% 100%" 
								data-_scene1-100p="background-position:50% 100%" 
								data-_scene1-250p="background-position:50% 100%" 
								data-_scene1-350p="background-position:100% 100%"></div>
		<div class="fog" 
								data-_scene1-0p="background-position:0% 0%" 
								data-_scene1-100p="background-position:-50% 0%" 
								data-_scene1-250p="background-position:-50% 0%" 
								data-_scene1-350p="background-position:-100% 0%"></div>
	</div>
	
	
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
		<div class="typewriter typewriter-1" 
								data-_scene1-400p="opacity:0" 
								data-_scene1-450p="opacity:1" >
			<div class="title" data-text="Yesterday at 6:00am"></div>
			<div class="desc" data-text="The product was distributed from Shenzen Warehouse"></div>
		</div>
		<div class="image-entity forklisft" 
					data-_scene1-250p="transform:translate(0%,-100%)" 
					data-_scene1-370p="transform:translate(0%,0%)" ><img src="<?php bloginfo('template_url') ?>/img/forklisft.png" width="446" height="264" alt="" />
					</div>
		<div class="image-entity box" 
					data-_scene1-250p="transform:translate(0%,-150%)" 
					data-_scene1-350p="transform:translate(0%,0%)"><img src="<?php bloginfo('template_url') ?>/img/box.png" width="321" height="242" alt="" />
					</div>
		<div class="line-container line-container-2" 
					data-_scene1-550p="opacity:0" 
					data-_scene1-650p="opacity:1">
			<div class="line line-2">
				<img src="<?php bloginfo('template_url') ?>/img/line-2.png" width="1284" height="870" alt="">
			</div>
		</div>
	</div>
	
	
	<div class="scene3 background-cover" 
					data-_scene1-550p="transform:translate(0,100%)" 
					data-_scene1-650p="transform:translate(0,0%)" 
					data-_scene1-750p="transform:translate(0,0%);background-position: 50% 50%;" 
					data-_scene1-850p="transform:translate(0,-100%);background-position: 50% -1200%;" 
					data-_scene1-950p="transform:translate(0,-100%);" 
					data-_scene1-1050p="transform:translate(0,-200%);" 
					data-end="transform:translate(0,-200%);background-position: 50% -1200%;">

		<div class="typewriter typewriter-2" 
					data-_scene1-600p="opacity:0" 
					data-_scene1-650p="opacity:1" >
			<div class="title" data-text="2 days ago at 5:20am"></div>
			<div class="desc" data-text="The product was loaded onto to a flight leaving paris creek, South australia"></div>
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
		
		
	</div>
	
	
	
	
	
	
	
	<div class="scene4 background-cover" 
					data-_scene1-750p="transform:translate(0,100%)" 
					data-_scene1-850p="transform:translate(0,0%)" 
					data-_scene1-950p="transform:translate(0,0%)" 
					data-_scene1-1050p="transform:translate(0,-100%)" 
					data-_scene1-1150p="transform:translate(0,-100%)" 
					data-_scene1-1250p="transform:translate(0,-200%)" 
				
					data-end="transform:translate(0,-100%)">
		
		<div class="typewriter typewriter-3" 
					data-_scene1-800p="opacity:0" 
					data-_scene1-850p="opacity:1" >
			<div class="title" data-text="4 days ago at 10:30am"></div>
			<div class="desc" data-text="The product was produced and packaged at Paris Creek Diary plant, South Australia"></div>
		</div>
					
		
		<div class="machine-container">
			<div class="mountain"
					data-_scene1-750p="background-position:0% -50%"
					data-_scene1-850p="background-position:0% 0%"
					data-_scene1-950p="background-position:0% 0%"
					data-_scene1-1050p="background-position:0% 150%" >
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
	
		
	</div>
	
	
	<div class="scene5 background-cover" 
					data-_scene1-950p="transform:translate(0,100%)" 
					data-_scene1-1050p="transform:translate(0,0%)" 
					data-_scene1-1150p="transform:translate(0,0%)" 
					data-_scene1-1250p="transform:translate(0,-100%)" 
					data-end="transform:translate(0,-100%)">
		
		
		<div class="typewriter typewriter-4" 
					data-_scene1-1000p="opacity:0" 
					data-_scene1-1050p="opacity:1" >
			<div class="title" data-text="7 days ago at 9:30am"></div>
			<div class="desc" data-text="Jenna the cow was milked at paris creek dairy farm, South Australia"></div>
		</div>
		
		
		<div class="image-entity cow" 
					data-_scene1-1150p="transform:translate(0%,-30%)" 
					data-_scene1-1250p="transform:translate(0%,0%)"
					data-_scene1-1150p="transform:translate(0%,0%)"
					data-_scene1-1250p="transform:translate(0%,30%)"><img src="<?php bloginfo('template_url') ?>/img/cow.png" width="458" height="413" alt="" />
          </div>
	
    

	

	
	
	
	
	
	<div class="scene6 background-cover" 
					data-_scene1-1150p="transform:translate(0,100%)" 
					data-_scene1-1250p="transform:translate(0,0%)" 
					data-_scene1-1350p="transform:translate(0,0%);"
					data-end="transform:translate(0,0%);">
					
					

	
	</div>
	
	
	
	<div class="footer" style="z-index:500"
		data-_scene1-1300p="transform:translate(0,0%)" 
		data-_scene1-1350p="transform:translate(0,-100%)" 
	>
		<div class="inner">
		&copy; 2015 oziris Beston Global Food Company Ltd<br>
		ACN 603 023 383
		</div>
	</div>

</div>











<?php // END BODY HOMEPAGE ?>
<?php wp_footer(); ?>
</body>
</html>
