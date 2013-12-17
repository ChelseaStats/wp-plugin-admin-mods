<?php
/*
Plugin Name: TCR Admin menu modificationss
Description: Modify the admin menu
Version: 1.5.0
Plugin URI: http://TheCellarRoom.net
Author: TheCellarRoom
Author URI: http://www.thecellarroom.net
Copyright (c) 2013 TheCellarRoom
*/

// add favicon to WordPress admin using main site version)
function admin_favicon() {
 echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('template_directory') . '/favicon.ico" />';
}
add_action( 'admin_head', 'admin_favicon' );


if ( is_admin() ) :
// Remove the WP logo
function tcr_remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('wp-logo');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_remove_wp_logo' );  

// Remove the Howdy
function tcr_remove_my_account() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('my-account');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_remove_my_account' );  

// Remove comment bubble
function tcr_remove_comment_bubble() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('comments');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_remove_comment_bubble' ); 

// Remove my sites menu
function tcr_remove_my_sites() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('my-sites');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_remove_my_sites' );

// Remove the current Site Name menu
function tcr_remove_this_site() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('site-name');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_remove_this_site' );  

// Remove add new content menu
function tcr_disable_new_content() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('new-content');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_disable_new_content' );  

// Remove Search Bar
function tcr_disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_disable_bar_search' );  

// Remove admin bar updates
function tcr_disable_bar_updates() {  
    global $wp_admin_bar;  
    $wp_admin_bar->tcr_remove_menu('updates');  
}  
add_action( 'wp_before_admin_bar_render', 'tcr_disable_bar_updates' );  

// Remove footer
function tcr_replace_footer_admin ()   {  
    echo '<span id="footer-thankyou"></span>';  
}  
add_filter('admin_footer_text', 'tcr_replace_footer_admin');

function tcr_replace_footer_version() {
	return ' ';
}
add_filter( 'update_footer', 'tcr_replace_footer_version', '1234');

// Remove help tabs
function tcr_remove_contextual_help() {
    $screen = get_current_screen();
    $screen->tcr_remove_help_tabs();
}
add_action( 'admin_head', 'tcr_remove_contextual_help' );


function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/yourstyle.css';
    echo "<style>#header-logo, #icon-plugins, #wphead h1 a span, #wphead #site-visit-button, #privacy-on-link, #favorite-actions, #contextual-help-link-wrap, #icon-index, .icon32, #user_info p > a[href=\'profile.php\'], #wpfooter {display:none;}</style>";
}
add_action('admin_head', 'admin_register_head');

endif;
?>
