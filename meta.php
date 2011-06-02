<?php
/**
 * SeoPress main engine
 * 
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

/**
 * Getting option name for active buddypress page
 * @desc It returns the the name of the worpress option in the wp-options table 
 * @return string the name of the options for the buddypress component
 * */
function sp_get_bp_option_name(){
	global $bp;
	
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	
	$active_component = $bp->active_components[$bp->current_component];
	if( $active_component == "" ) $active_component = $bp->current_component;
	$active_component_slug = $bp->$active_component->slug;
	
  	$current_action = $bp->current_action;
  	
  	if( $current_action == "" ){
 		$option_name = 'bp_seo_' . $active_component_slug; 	
  	}else{
  		$option_name = 'bp_seo_' . $active_component_slug . '_' . $current_action;
  	}
	
	return $option_name;		
}

?>