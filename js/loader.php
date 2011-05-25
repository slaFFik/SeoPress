<?php

/* Add Prototype and Script.aculo.us to the head */
function seopress_jquery_init(){
	global $seopress_plugin_url;
	
	if( ! isset( $_GET['page'] ) )
        return;

    // Only use on SeoPress Admin pages
	if( $_GET['page'] == 'seopress_seo' || $_GET['page'] == 'seopress_settings' ) {
		
		wp_deregister_script( 'dtheme-ajax-js' ); // For Buddypress bug on accordion -> Script is not relevant for wp-admin section
		
		wp_enqueue_script( 'jquery-ui' );
		
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-widget' );
		wp_enqueue_script( 'jquery-ui-position' );
		
		wp_register_script( 'jquery-ui-accordion', $seopress_plugin_url . 'js/jquery.ui.accordion.js', array( 'jquery' ), '1.8.9', true );
		wp_enqueue_script( 'jquery-ui-accordion' );
		
		wp_register_script( 'jquery-ui-autocompleter', $seopress_plugin_url . 'js/jquery.ui.autocomplete.js', array( 'jquery' ), '1.8.9', true );
		wp_enqueue_script( 'jquery-ui-autocompleter' );
		
	}
}
add_action('admin_init', 'seopress_jquery_init');

?>