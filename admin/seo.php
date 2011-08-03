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
	
	$html = apply_filters( 'sp_settings_top', $html );
		 
	/*
	 * Adding display
	 */	
	$display = new	TK_WP_ADMIN_DISPLAY( __( 'Page types', 'seopress'), 'plugins' );
	$display->add_element( '<p>' . __( 'Optimize your Wordpress pages.', 'seopress') . '</p>' );
	
	$form = new TK_WP_FORM( 'seopress_seo_settings', 'POST', 'seopress_settings' );
	
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
	
	do_action( 'sp_seo_settings_tabs', $tabs );	
	
	$form->add_element( $tabs->get_html() );
	
	$display->add_element( $form->get_html() );
	
	$html.= $display->get_html();
	
	$html = apply_filters( 'sp_seo_settings_bottom', $html );
	
	echo $html;

	include( 'footer.php' );

} 

?>