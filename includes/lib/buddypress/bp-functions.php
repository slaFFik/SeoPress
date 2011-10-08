<?php

function sp_get_bp_components(){
	global $bp;
	$bp_components = array();
	
	foreach ( (array) $bp as $key => $value ) {
	   	if( isset($bp->$key->slug ) ) $bp_components[] = $bp->$key->slug;
	}
	return $bp_components;
}

function sp_is_bp_plugin_installed(){
	$bp_components = sp_get_bp_components();
	
	// print_r_html( $bp_components );
	
	foreach ($bp_components as $bp_component) {
		if( sp_is_bp_plugin ( $bp_component ) ) return true;	
	}
	return false;
}

function sp_is_bp_plugin( $slug ){
	
	$component = tk_get_bp_component_by_slug( $slug );
	
	if(
		$component != 'profile' &&
		$component != 'activity' && 
		$component != 'blogs' && 
		$component != 'forums' && 
		$component != 'friends' && 
		$component != 'groups' && 
		$component != 'messages'&&
		$component != 'members'&& 
		$component != 'settings'){
		
		return true;
					
	}else{
		return false;
	}				
}

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
