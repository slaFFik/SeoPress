<?php
/**
 * SeoPress settings page in admin
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/
function seopress_options(){
	
	global $seopress_plugin_url;
	
	/*
	 * Adding display
	 */	
	$display = new	TK_WP_ADMIN_DISPLAY( __( 'Options', 'seopress'), 'plugins' );
	$display->add_element( '<p>' . __( 'Configure global settings for SeoPress.', 'seopress') . '</p>' );
	
	$form = new TK_WP_FORM( 'seopress_options' );
	
	/*
	 * Adding jqueryui tabs
	 */		
	$tabs = new	TK_WP_JQUERYUI_TABS();
	
	require_once( 'options_seo.tab.php' );
	
	$tabs->add_tab( 'cap_main_blog', __ ('Seo', 'seopress'), sp_admin_settings_tab() );
	
	do_action( 'sp_options_tabs', $tabs );	
	
	$form->add_element( $tabs->get_html() );
	
	$display->add_element( $form->get_html() );
	
	$display->write_html();		
	
	include( 'footer.php' );
	
}

?>