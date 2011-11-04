<?php

global $tk_error;
global $tk_warning;

/**
* tk_get_wp_type
* 
* @returns string 'wp' for a wordpress blog 'wpmu' for a wordpress network blog
*/ 
if( !function_exists( 'tk_get_wp_type' ) ){
	function tk_get_wp_type(){
		global $blog_id;
		
		if( defined( 'SITE_ID_CURRENT_SITE' ) ){
			if ( $blog_id != SITE_ID_CURRENT_SITE ){
				$wp_type = 'mu';		
			}else{ 
				$wp_type = 'wp';			
			}
		}else{
			$wp_type = 'wp';
		}
		return apply_filters( 'tk_wp_type', $wp_type );	
	}
}
/**
* tk_is_buddypress
* 
* @returns boolean true if buddypress is installed, false if not
*/ 
if( !function_exists( 'tk_is_buddypress' ) ){
	function tk_is_buddypress(){
		if ( defined( 'BP_VERSION' ) ){
			if( tk_is_bp_setup_finished() ) {
				return true; 
			}else{
				
			}
		}else{
			return false; 
		}
	}
}
/**
* tk_is_bp_setup_finished
* 
* @returns boolean true if buddypress is installed, false if not
*/ 
if( !function_exists( 'tk_is_bp_setup_finished' ) ){
	function tk_is_bp_setup_finished(){
		global $bp;
		if( $bp->maintenance_mode == 'install' ){
			if( $_GET['page'] == 'seopress_seo' ){
				global $tk_warning;
				$tk_warning = __( 'Please finish the Buddypress installation to get all SeoPress options.', 'seopress' );
				add_action( 'all_admin_notices', 'tk_wp_warning_box', 1 );
			}
			return FALSE;
		}else{
			return TRUE;
		}		
	}
}
/**
* tk_get_page_type
* 
* @returns string returns the page type of the actual shown page
*/ 
if( !function_exists( 'tk_get_page_type' ) ){
	
	function tk_get_page_type(){
		
		// If is wordpress and no buddypress
		if( tk_get_wp_type() == "wp" ) {
			if( is_admin() ) $page_type = 'wp-admin';
			if( ( is_home() || is_front_page()) && !tk_is_signup() ) $page_type = 'wp-home';
			if( is_single() ) $page_type = 'wp-post';	
			if( is_page() && !is_front_page() ){ $page_type = 'wp-page'; }			
			if( is_sticky() ) $page_type = 'wp-sticky';	 				
			if( is_category() ) $page_type = 'wp-category';	 			
			if( is_tag() ) $page_type = 'wp-tag';
			if( is_tax() ) $page_type = 'wp-tax'; 
			if( is_author() ) $page_type = 'wp-author';
			if( is_archive() && !is_category() && !is_tag() && !is_author() ) $page_type = 'wp-archive';
			if( is_search() ) $page_type = 'wp-search';
			if( tk_is_signup() ) $page_type = 'wp-signup';
			if( is_404() ) $page_type = 'wp-404';
		}
		
		// If is wordpress mu
		if( tk_get_wp_type() == "mu" ) {
			if( is_admin() ) $page_type = 'mu-admin'; // Whats happening here on mu blogs?
			if( ( is_home() || is_front_page()) && !tk_is_signup() ) $page_type = 'mu-home';
			if( is_single() ) $page_type = 'mu-post';	
			if( is_page() ) $page_type = 'mu-page';	 	
			if( is_sticky() ) $page_type = 'mu-sticky';	 				
			if( is_category() ) $page_type = 'mu-category';	 			
			if( is_tag() ) $page_type = 'mu-tag';
			if( is_tax() ) $page_type = 'mu-tax'; 
			if( is_author() ) $page_type = 'mu-author';
			if( is_archive() && !is_category() && !is_tag() && !is_author() ) $page_type = 'mu-archive';
			if( is_search() ) $page_type = 'mu-search';
			if( is_404() ) $page_type = 'mu-404';
		}

		return apply_filters( 'tk_get_page_type', $page_type );
	}
}


/**
* tk_wp_error_box
*/ 
if( !function_exists( 'tk_wp_error_box' ) ){
	function tk_wp_error_box(){
		global $tk_error;
		echo '<div id="message" class="error"><p>' . $tk_error . '</p></div>';
	}
}
/**
* tk_wp_warning_box
*/ 
if( !function_exists( 'tk_wp_warning_box' ) ){
	function tk_wp_warning_box(){
		global $tk_warning;
		echo '<div id="message" class="updated"><p>' . $tk_warning . '</p></div>';
	}
}

function tk_is_signup(){
	if( $_REQUEST['action'] == 'register' ){
		return true;
	}else{
		return false;
	}
}

function echo_page(){
	echo '<br><br>Page type: ' . tk_get_page_type();
}
// add_action( 'wp_head', 'echo_page' );

function tk_get_bp_component(){
	if( function_exists( 'bp_current_component' ) ){
		echo '<br><br>Current component: ' . bp_current_component();
	}else{ 
		return false;
	}
}

function tk_show_bp_vars(){
	global $bp, $forum_template;
	global $wp_post_types;
// 	print_r_html( $bp );
	print_r_html( $wp_post_types );
//	print_r_html( $forum_template );
}
// add_action( 'wp_head', 'tk_show_bp_vars' );


?>