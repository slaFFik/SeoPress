<?php

// add css for the option page
function seopress_css() {
	global $seopress_plugin_url;	
	
	if( isset( $_GET['page'] ) ){
	    if( $_GET['page'] == 'seopress_seo' || $_GET['page'] == 'seopress_options' ) {
			
	    	$style_url =  $seopress_plugin_url . 'css/styles.css';
			wp_register_style( 'seopressui', $style_url );
			wp_enqueue_style( 'seopressui' );
			
			$autocomplete_style_url =  $seopress_plugin_url . 'css/autocompleter.css' ;
			wp_register_style( 'autocompleter', $autocomplete_style_url );
			wp_enqueue_style( 'autocompleter' );
		}
	}
}
// Initialising javascripts and css
add_action( 'admin_init' , 'seopress_css' );  

?>