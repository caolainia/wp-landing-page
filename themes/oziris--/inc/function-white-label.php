<?php

//tweaking wp-admin bar
function oziris_admin_bar_tweak() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('themes');
	$wp_admin_bar->remove_menu('widgets');
	$wp_admin_bar->remove_menu('menus');	
}
add_action('wp_before_admin_bar_render', 'oziris_admin_bar_tweak', 0);

// registering admin.css
function load_custom_wp_admin_style() {
	global $themes_version;
	wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, $themes_version  );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// thanks for creating with oziris
function oziris_dashboard_footer($footer) {
	echo 'A <a href="http://www.digital-noir.com">Digital Noir</a> Production';
}
add_filter('admin_footer_text', 'oziris_dashboard_footer');

//remove versino for non admin
function oziris_remove_version() {
    if ( ! current_user_can('manage_options') ) { // 'update_core' may be more appropriate
        remove_filter( 'update_footer', 'core_update_footer' ); 
    }
}
add_action( 'admin_menu', 'oziris_remove_version' );


//remove dashboard widget
function oziris_remove_dashboard_widget() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
} 

// Hook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'oziris_remove_dashboard_widget' );

// exit if lost password
function dn_login_lost() {
	
	$curLost = $_GET['action'];
	if($curLost == 'lostpassword'){
		exit();
	}
	
}
add_action('login_head', 'dn_login_lost',0);

// client logo
function dn_login_logo() {
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/img/static/logo-admin.png) no-repeat center !important; background-size:cover!important; width:100%!important }</style>';
}
add_action('login_head', 'dn_login_logo');

// change logo link
function dn_change_wp_login_url() {
	return '';
}
add_filter('login_headerurl', 'dn_change_wp_login_url');

// remove forgot pass
function dn_remove_lostpassword_text ( $text ) {
	 if ($text == 'Lost your password?'){$text = '';}
		return $text;
	 }
add_filter( 'gettext', 'dn_remove_lostpassword_text' );

// change to login via email only
remove_filter('authenticate', 'wp_authenticate_username_password', 20);
add_filter('authenticate', 'dn_new_authentication', 20, 3);
function dn_new_authentication($user, $email, $password){

    //Check for empty fields
    if(empty($email) || empty ($password)){        
        //create new error object and add errors to it.
        $error = new WP_Error();

        if(empty($email)){ //No email
            $error->add('empty_username', __('<strong>ERROR</strong>: Email field is empty.'));
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //Invalid Email
            $error->add('invalid_username', __('<strong>ERROR</strong>: Email is invalid.'));
        }

        if(empty($password)){ //No password
            $error->add('empty_password', __('<strong>ERROR</strong>: Password field is empty.'));
        }

        return $error;
    }

    //Check if user exists in WordPress database
    $user = get_user_by('email', $email);

    //bad email
    if(!$user){
        $error = new WP_Error();
        $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
        return $error;
    }
    else{ //check password
        if(!wp_check_password($password, $user->user_pass, $user->ID)){ //bad password
            $error = new WP_Error();
            $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
            return $error;
        }else{
            return $user; //passed
        }
    }
}

add_filter('gettext', 'dn_gettext_login', 20);
function dn_gettext_login($text){
    if(in_array($GLOBALS['pagenow'], array('wp-login.php'))){
        if('Username' == $text){
            return 'Email Address';
        }
    }
    return $text;
}

?>