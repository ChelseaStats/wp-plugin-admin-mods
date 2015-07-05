<?php
/*
Plugin Name: TCR Admin menu modifications
Description: Modify the admin menu
Version: 1.5.0
Plugin URI: http://TheCellarRoom.uk
Author: TheCellarRoom
Author URI: http://www.thecellarroom.uk
Copyright (c) 2015 TheCellarRoom
*/

	defined( 'ABSPATH' ) or die();

	/*************************************************************************/

	if ( ! class_exists( 'tcr_admin_mods' ) ) :

		class tcr_admin_mods {

			function __construct() {

				add_action( 'admin_head', array ($this, 'admin_favicon') );

				if ( is_admin() ) :
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_remove_wp_logo') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_remove_my_account') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_remove_comment_bubble') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_remove_my_sites') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_remove_this_site') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_disable_new_content') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_disable_bar_search') );
					add_action( 'wp_before_admin_bar_render' , array ( $this , 'tcr_disable_bar_updates' ) );
					add_filter( 'admin_footer_text'          , array ( $this , 'tcr_replace_footer_admin') );
					add_filter( 'update_footer'              , array ( $this , 'tcr_replace_footer_version' ), '1234');
					add_action( 'admin_head'                 , array ( $this , 'tcr_remove_contextual_help') );
					add_action( 'admin_head'                 , array ( $this , 'admin_register_head') );

				endif;

			}

			function admin_favicon() {
				echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('template_directory') . '/favicon.ico" />';
			}

			function tcr_remove_wp_logo() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('wp-logo');
			}

			function tcr_remove_my_account() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('my-account');
			}

			function tcr_remove_comment_bubble() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('comments');
			}

			function tcr_remove_my_sites() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('my-sites');
			}

			function tcr_remove_this_site() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('site-name');
			}

			function tcr_disable_new_content() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('new-content');
			}

			function tcr_disable_bar_search() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('search');
			}

			function tcr_disable_bar_updates() {
				global $wp_admin_bar;
				$wp_admin_bar->tcr_remove_menu('updates');
			}

			function tcr_replace_footer_admin ()   {
				echo '<span id="footer-thankyou"></span>';
			}


			function tcr_replace_footer_version() {
				return ' ';
			}

			function tcr_remove_contextual_help() {
				$screen = get_current_screen();
				$screen->tcr_remove_help_tabs();
			}

			function admin_register_head() {
				$site_url = get_option('site_url');
				$url = $site_url . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/style.css';
				echo "<style>#header-logo, #icon-plugins, #wphead h1 a span, #wphead #site-visit-button, #privacy-on-link, #favorite-actions, #contextual-help-link-wrap, #icon-index, .icon32, #user_info p > a[href=\'profile.php\'], #wpfooter {display:none;}</style>";
			}

		}
		new tcr_admin_mods;

	endif;

