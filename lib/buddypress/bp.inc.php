<?php

if( !function_exists( 'tk_get_bp_page_type' ) ){
	
	function tk_get_bp_page_type( $page_type ){
		global $bp;
		
		if( is_page() && tk_is_buddypress() && $bp->current_component != '' ){
				
			$component = $bp->current_component;
			
			$action = $bp->current_action;
			
			if( $component != '' ){
				if( $action != '' ){
					if( bp_is_group_forum_topic() ){
						$page_type = 'bp-component-' . $component . '-' . $action . '-topic';							
					
					}elseif ( !bp_is_activity_front_page() &&  bp_is_activity_component() && $action != 'just-me' ){
						$page_type = 'bp-component-activity-activity';
					}else{
						$page_type = 'bp-component-' . $component . '-' . $action;
					}
				}else{
					$page_type = 'bp-component-' . $component;
				}
			}
		}
		return apply_filters( 'tk_get_bp_page_type', $page_type );
	}
	add_filter( 'tk_get_page_type', 'tk_get_bp_page_type' );	
}
?>