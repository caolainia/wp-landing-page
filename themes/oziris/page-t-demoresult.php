<?php
/**
Template Name: Demo Result
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<div class="sticky-newsletter">
	<?php $id = get_option( 'page_on_front' ); ?>
		<div class="oziris-ads-footer">
			<div class="oziris-ads-text"> <span class="image"><img src="<?php bloginfo('template_url')?>/img/iphone-hero.png" alt="" /></span> <span class="text"><?php echo get_post_meta($id,'popup_text',true); ?></span> <a href="<?php echo get_post_meta($id,'popup_link',true); ?>"><?php echo get_post_meta($id,'popup_anchor',true); ?></a> </div>
		</div>
		<div class="oziris-ads-footer-bg"></div>
		<div class="close-oziris-ads">&nbsp;</div>
	</div>


	

	<div id="content" class="site-content">

        <?php 
        $url = "https://oziris.com.au/OzirisBackend/web/admin/product-mobile/view?batch_id=" . $_GET["batch_id"];
        ?>


        <div class="result-container">
            <iframe class="result-iframe" src="<?php echo $url; ?>"  
            width="375" height="800" frameborder="0" allowtransparency="true"></iframe>
        </div>


<?php get_footer('for-demo'); ?>
