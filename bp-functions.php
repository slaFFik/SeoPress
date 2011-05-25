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
	
	foreach ($bp_components as $bp_component) {
		if( sp_is_bp_plugin ( $bp_component ) ) return true;	
	}
	return false;
}

function sp_is_bp_plugin( $slug ){
	if(
		$slug != 'profile' &&
		$slug != 'activity' && 
		$slug != 'blogs' && 
		$slug != 'forums' && 
		$slug != 'friends' && 
		$slug != 'groups' && 
		$slug != 'messages'&& 
		$slug != 'settings'){
		
		return true;
					
	}else{
		return false;
	}				
}

?>
