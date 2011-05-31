<?php
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
				return 'mu';		
			}else{ 
				return 'wp';			
			}
		}else{
			return 'wp';
		}	
	}
}
/**
* tk_is_buddypress
* 
* @returns boolean true if buddypress is installed, false if not
*/ 
if( !function_exists( 'tk_is_buddypress' ) ){
	function tk_is_buddypress(){
		global $bp;
		if ( defined( 'BP_VERSION' ) ){ return true; }else{ return false; }
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
			if( is_admin() ) return 'wp-admin';
			if( is_home() && !tk_is_signup() ) return 'wp-home';
			if( is_front_page() ) return 'wp-front-page';
			if( is_single() ) return 'wp-post';	
			if( is_page() && tk_is_buddypress() ){
				
				global $bp;
				
				$component = $bp->current_component;
				$action = $bp->current_action;
				
				if( $component != '' ){
					if( $action != '' ){
						if( bp_is_group_forum_topic() ){
							return 'bp-component-' . $component . '-' . $action . '-topic';							
						}else{
							return 'bp-component-' . $component . '-' . $action;
						}
					}else{
						return 'bp-component-' . $component;
					}
				}else{
					return 'wp-page ' . $action;
				}
			}else if( is_page() ){
				return 'wp-page';	
			}
			
			if( is_sticky() ) return 'wp-sticky';	 				
			if( is_category() ) return 'wp-category';	 			
			if( is_tag() ) return 'wp-tag';
			if( is_tax() ) return 'wp-tax'; 
			if( is_author() ) return 'wp-author';
			if( is_archive() ) return 'wp-archive';
			if( is_search() ) return 'wp-search';
			if( tk_is_signup() ) return 'wp-signup';
			if( is_404() ) return 'wp-404';
		}
		
		// If is wordpress mu
		if( tk_get_wp_type() == "mu" ) {
			if( is_admin() ) return 'mu-admin'; // Whats happening here on mu blogs?
			if( is_home() ) return 'mu-home';
			if( is_front_page() ) return 'mu-front-page';
			if( is_single() ) return 'mu-post';	
			if( is_page() ) return 'mu-page';	 	
			if( is_sticky() ) return 'mu-sticky';	 				
			if( is_category() ) return 'mu-category';	 			
			if( is_tag() ) return 'mu-tag';
			if( is_tax() ) return 'mu-tax'; 
			if( is_author() ) return 'mu-author';
			if( is_archive() ) return 'mu-archive';
			if( is_search() ) return 'mu-search';
			if( is_404() ) return 'mu-404';
		}	
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
add_action( 'wp_head', 'echo_page' );



function tk_get_bp_component(){
	if( function_exists( 'bp_current_component' ) ){
		echo '<br><br>Current component: ' . bp_current_component();
	}else{ 
		return false;
	}
}

function tk_show_bp_vars(){
	global $bp, $forum_template;
	print_r_html( $bp );
	print_r_html( $forum_template );
}
// add_action( 'wp_footer', 'tk_show_bp_vars' );


?>