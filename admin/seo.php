<?php
/**
 * SeoPress SEO Settings page in admin
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

function seopress_seo(){
	global $seopress_plugin_url;
		 
	/*
	 * Adding display
	 */	
	$display = new	TK_WP_ADMIN_DISPLAY( __( 'Seo Settings', 'seopress'), 'plugins' );
	$display->add_element(  __( '<p>Optimize your Wordpress pages.</p>', 'seopress') );
	
	$form = new TK_WP_FORM( 'seopress_seo_settings' );
	
	/*
	 * Adding jqueryui tabs
	 */		
	$tabs = new	TK_WP_JQUERYUI_TABS();	
	
	require_once( 'seo_wordpress.tab.php' );
	require_once( 'seo_wordpressmu.tab.php' );
	require_once( 'seo_buddypress.tab.php' );
	require_once( 'seo_buddypress_plugins.tab.php' );
	
	// Wordpress tab
	$tabs->add_tab( 'cap_main_blog', __ ('Wordpress', 'seopress'), sp_admin_wp_tab() );
	
	// Wordpress networked blogs tab
	if( defined( 'SITE_ID_CURRENT_SITE' ) ){
		$tabs->add_tab( 'cap_user_blogs', __ ('Wordpress Network', 'seopress'), sp_admin_wpmu_tab() );		
	}
	
	// Buddypress tabs
	if( tk_is_buddypress() ){
		
		$tabs->add_tab( 'cap_bp_standard', __ ('Buddypress', 'seopress'), sp_admin_bp_tab() );
		
		if ( sp_is_bp_plugin_installed() ){
			
			$tabs->add_tab( 'cap_bp_plugins', __ ('Buddypress Plugins', 'seopress'), sp_admin_bp_plugins_tab() );
		}		
	}
	
	apply_filters( 'sp_seo_tabs', $tabs );
	
	$form->add_element( $tabs->get_html() );
	
	$display->add_element( $form->get_html() );
	
	$display->write_html();

	include( 'footer.php' );

} 

?>