<?php
/**
 * Functions for initializing SeoPress 
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

## Initializing hooks
add_action( 'init' , 'seopress_init' , 0 );

## Create the menu item
function seopress_admin_menu() {
	global $blog_id, $seopress_plugin_url;
	
	if(!current_user_can('level_10')){ 
		return false;
	} else {
		if(defined('SITE_ID_CURRENT_SITE')){	
	  		if($blog_id != SITE_ID_CURRENT_SITE){
	    		return false;
	   		}
		}
	}
	
	add_menu_page( 'SeoPress Admin' , 'SeoPress' , 'manage_options', 'seopress_seo','seopress_seo', $seopress_plugin_url . 'images/icon-seopress-16x16.png');
	add_submenu_page( 'seopress_seo', __( 'SeoPress - Seo options', 'seopress'),__( 'Seo Settings', 'seopress' ), 'manage_options', 'seopress_seo', 'seopress_seo' );
	add_submenu_page( 'seopress_seo', __( 'SeoPress - Global options', 'seopress'),__( 'Global options', 'seopress' ), 'manage_options', 'seopress_settings', 'seopress_settings' );
	add_submenu_page( 'seopress_seo', __( 'Test page', 'seopress'),__( 'Test', 'seopress' ), 'manage_options', 'test_page', 'test_page' );
	
}

?>