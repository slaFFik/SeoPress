<?php

if( !function_exists( 'tk_get_bp_page_type' ) ){
	
	function tk_get_bp_page_type( $page_type ){
		global $bp;
		
		if( is_page() && tk_is_buddypress() && $bp->current_component != '' ){

			$slug = $bp->current_component;
			
			$component = tk_get_bp_component_by_slug( $slug );
			
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

if( !function_exists( 'tk_get_bp_component_by_slug' ) ){
	function tk_get_bp_component_by_slug( $slug ){
		
		$component_slugs = array();
		
		if ( defined( 'BP_ACTIVITY_SLUG' ) ) $component_slugs[ BP_ACTIVITY_SLUG ] = "activity";
		if ( defined( 'BP_BLOGS_SLUG' ) ) $component_slugs[ BP_BLOGS_SLUG ] = "blogs";
		if ( defined( 'BP_MEMBERS_SLUG' ) ) $component_slugs[ BP_MEMBERS_SLUG ] = "members";
		if ( defined( 'BP_FRIENDS_SLUG' ) ) $component_slugs[ BP_FRIENDS_SLUG ] = "friends";
		if ( defined( 'BP_GROUPS_SLUG' ) ) $component_slugs[ BP_GROUPS_SLUG ] = "groups";
		if ( defined( 'BP_FORUMS_SLUG' ) ) $component_slugs[ BP_FORUMS_SLUG ] = "forums";
		if ( defined( 'BP_MESSAGES_SLUG' ) ) $component_slugs[ BP_MESSAGES_SLUG ] = "messages";
		if ( defined( 'BP_WIRE_SLUG' ) ) $component_slugs[ BP_WIRE_SLUG ] = "wire";
		if ( defined( 'BP_XPROFILE_SLUG' ) ) $component_slugs[ BP_XPROFILE_SLUG ] = "profile";
		
		if ( defined( 'BP_REGISTER_SLUG' ) ) $component_slugs[ BP_REGISTER_SLUG ] = "register";
		if ( defined( 'BP_ACTIVATION_SLUG' ) ) $component_slugs[ BP_ACTIVATION_SLUG ] = "activate";
		if ( defined( 'BP_SEARCH_SLUG' ) ) $component_slugs[ BP_SEARCH_SLUG ] = "search";
		
		if( $component_slugs[ $slug ] != '' ){
			$component = $component_slugs[ $slug ];
		}else{
			$component = $slug;
		}
		return $component;	
	}
}
if( !function_exists( 'tk_bp_is_active_component' ) ){
	function tk_bp_is_active_component( $slug ){
		global $bp;
		
		$component_name = tk_get_bp_component_by_slug( $slug );
		
		if( is_array( $bp->active_components ) ){
			$components = array_keys( $bp->active_components );
			
			foreach( $components AS $key => $component ){
				$components_arr[ $key ] = tk_get_bp_component_by_slug( $component );
			}
		}
		
		if( is_array( $components ) ){
			if( in_array( $component_name, $components_arr ) ){
				return true;		
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
?>