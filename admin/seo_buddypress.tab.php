<?php 
/**
 * Configuration tab for buddypress
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/


function sp_admin_bp_tab(){
	global $bp, $seopress_plugin_url;
	
	$html.= sp_admin_tab_header( __( 'Buddypress', 'seopress'), __( 'Setup your title and meta tags of the buddypress pages.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-buddypress.png' );
	
	$bp_seo_components = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
		
	// Searching for component slugs and adding to array
	$bp_components = array();
	
	foreach ( (array) $bp as $key => $value ) {
		if( $bp->$key->slug != '' ) array_push( $bp_components, $bp->$key->slug );
	}
	
	/*
	 * Adding jqueryui tabs
	 */
	$html.= '<h3>' .  __( 'Setup Buddypress pages', 'seopress') . '</h3>';
		
	$tabs = new	TK_WP_JQUERYUI_TABS();	
	
	if( tk_bp_is_active_component( 'activity' ) ){ 
		$tabs->add_tab( 'cap_bp_activities', __ ('Activity', 'seopress'), sp_admin_bp_activities_tab() );
	}
	
	$tabs->add_tab( 'cap_bp_members', __ ('Members', 'seopress'), sp_admin_bp_members_tab() );
	$tabs->add_tab( 'cap_bp_profiles', __ ('Profiles', 'seopress'), sp_admin_bp_profiles_tab() );
	
	if ( tk_bp_is_active_component( 'groups' ) ){
		$tabs->add_tab( 'cap_bp_groups', __ ('Groups', 'seopress'), sp_admin_bp_groups_tab() );  
	}
	if ( tk_bp_is_active_component( 'forums' ) ){
		$tabs->add_tab( 'cap_bp_forums', __ ('Forums', 'seopress'), sp_admin_bp_forums() );  
	}
	if ( tk_bp_is_active_component( 'blogs') ){
		$tabs->add_tab( 'cap_bp_blogs', __ ('Blogs', 'seopress'), sp_admin_bp_blogs() );  
	}
	if ( get_option('users_can_register') ){
		$tabs->add_tab( 'cap_bp_registration', __ ('Registration', 'seopress'), sp_admin_bp_register() );  
	}

	$html.= $tabs->get_html();
	
	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress') . '" /></p>';
	
	$html.= $button;	
	
	return $html;
		
}

function sp_admin_bp_activities_tab(){
	global $bp, $seopress_plugin_url;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-activity', 'title' => __('Activities Directory' , 'seopress' ), 'values' => $content ) );
	array_push( $sections, array( 'type' => 'bp-component-activity-activity', 'title' => __('Activity' , 'seopress' ), 'values' => $content ) );

	apply_filters( 'sp_admin_bp_activies_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_activies_tab_bottom' );
	
	return $html;
	
}

function sp_admin_bp_members_tab(){
	global $bp, $seopress_plugin_url;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-members', 'title' => __('Members Directory' , 'seopress' ), 'values' => $content ) );

	apply_filters( 'sp_admin_bp_members_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_members_tab_bottom' );
		
	return $html;
	
}
function sp_admin_bp_profiles_tab(){
	global $bp, $seopress_plugin_url;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-profile-public', 'title' => __('Profile' , 'seopress' ), 'values' => $content ) );
	
	if( tk_bp_is_active_component( 'activity' )){ 
		array_push( $sections, array( 'type' => 'bp-component-activity-just-me', 'title' => __('Profile Activity' , 'seopress' ), 'values' => $content ) );
	}
	if( tk_bp_is_active_component( 'blogs' )){ 
		array_push( $sections, array( 'type' => 'bp-component-blogs-my-blogs', 'title' => __('Profile Blogs' , 'seopress' ), 'values' => $content ) );
	}
	if( tk_bp_is_active_component( 'groups' )){ 
		array_push( $sections, array( 'type' => 'bp-component-groups-my-groups', 'title' => __('Profile Groups' , 'seopress' ), 'values' => $content ) );
	}
	
	apply_filters( 'sp_admin_bp_profiles_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_profiles_tab_bottom' );
	
	return $html;
	
}

function sp_admin_bp_groups_tab(){
	global $bp, $groups;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-groups', 'title' => __('Group Directory' , 'seopress' ), 'values' => $content ) );
	
	if( tk_bp_is_active_component('activity')){ 
		array_push( $sections, array( 'type' => 'bp-component-activity-groups', 'title' => __('Group Activities' , 'seopress' ), 'values' => $content ) );
	}
	
	array_push( $sections, array( 'type' => 'bp-component-groups-home', 'title' => __('Group Home' , 'seopress' ), 'values' => $content ) );
	
	if( tk_bp_is_active_component('forums')){ 
		array_push( $sections, array( 'type' => 'bp-component-groups-forum', 'title' => __('Group Forum' , 'seopress' ), 'values' => $content ) );
		array_push( $sections, array( 'type' => 'bp-component-groups-forum-topic', 'title' => __('Group Forum Topic' , 'seopress' ), 'values' => $content ) );
	}
	
	array_push( $sections, array( 'type' => 'bp-component-groups-members', 'title' => __('Group Members' , 'seopress' ), 'values' => $content ) );	
	
	apply_filters( 'sp_admin_bp_groups_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_groups_tab_bottom' );

	return $html;
	
}

function sp_admin_bp_forums(){
	global $bp, $groups;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-forums', 'title' => __('Forums Directory' , 'seopress' ), 'values' => $content ) );		
	
	apply_filters( 'sp_admin_bp_forums_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_forums_tab_bottom' );
	
	return $html;
	
}

function sp_admin_bp_blogs(){
	global $bp, $groups;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-blogs', 'title' => __('Blogs Directory' , 'seopress' ), 'values' => $content ) );		
	
	apply_filters( 'sp_admin_bp_blogs_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_blogs_tab_bottom' );
	
	return $html;
	
}

function sp_admin_bp_register(){
	global $bp, $groups;
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'bp-component-registration', 'title' => __('Registration' , 'seopress' ), 'values' => $content ) );		
	
	apply_filters( 'sp_admin_bp_registration_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ) );
	}
	
	$html.= $accordion->get_html();
			
	do_action( 'sp_admin_bp_registration_tab_bottom' );
	
	return $html;
	
}
?>  			
    