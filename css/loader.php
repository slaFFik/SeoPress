<?php

### add css for the option page
function seopress_css() {
	global $docroot;
	global $seopress_plugin_url;	

	echo '<link rel="stylesheet" href="' . $seopress_plugin_url . 'css/styles.css" type="text/css" media="screen" />';
	
	if( isset( $_GET['page'] ) ){
	    if( $_GET['page'] == 'seopress_seo' || $_GET['page'] == 'seopress_settings' || $_GET['page'] == 'test_page' ) {
			
			wp_register_style('seopressui', $seopress_plugin_url . 'css/styles.css');
			wp_enqueue_style('seopressui');
			
		}
	}
}
## Initialising javascripts and css
add_action( 'admin_head' , 'seopress_css' );  

/* Add the autocompleter css */
function css_autocompleter(){
	global $seopress_plugin_url;
	//Style
	wp_register_style('autocompleter', $seopress_plugin_url . 'css/autocompleter.css');
	wp_enqueue_style('autocompleter');
	wp_print_styles();
}
add_action('admin_print_scripts', 'css_autocompleter');

?>