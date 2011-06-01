<?php
/**
 * Functions for initializing SeoPress 
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

## Initializing hooks
function seopress_init() {
	
	if( tk_is_buddypress() ){ // Buddypress
		sp_init_special_tags();
		sp_init_special_tags_pt();
		sp_init_bp_special_tags();
		sp_init_bp_special_tags_pt();
		
		remove_all_filters( 'bp_page_title' );
		add_filter( 'bp_page_title' , 'sp_setup_header' , 0, 1 );	
		
	}else{  // Wordress
		sp_init_special_tags();
		sp_init_special_tags_pt();
		
		remove_all_filters( 'wp_title' );
		add_filter( 'wp_title' , 'sp_setup_header' , 0, 1 );
	}

	## Setting up post & page forms
	if(get_option('bp_seo_meta_box_post') != true){
		add_action('edit_form_advanced', 'sp_metabox');
	}
	if(get_option('bp_seo_meta_box_page') != true){
		add_action('edit_page_form', 'sp_metabox');
	}
	
	## Saving post & page values
	add_action( 'save_post' , 'seopress_post_title', 1 );
	add_action( 'save_post' , 'seopress_post_description', 1 );
	add_action( 'save_post' , 'seopress_post_keywords', 1 );
	add_action( 'save_post' , 'seopress_post_noindex', 1 );
			
	# Adding menue
	add_action( 'admin_menu' , 'seopress_admin_menu' );
}
add_action( 'init' , 'seopress_init' );



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
	
}

?>