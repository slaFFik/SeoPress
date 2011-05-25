<?php


/*
* Filling variables ???
*/
function sp_init_special_tag_engine(){
	global $seopress_special_tags, $seopress_used_special_tags, $bp, $sp_bp_current_component, $bbdb;
	echo "============================= used tags ===================================\n";
	print_r_html($seopress_used_special_tags);
	
	echo "============================= all tags ===================================\n";	
	foreach ( $seopress_special_tags AS $key => $value ){
		if ( $key != 'page-types' ) sp_init_special_tag_values( $key );	
	}
	$seopress_special_tags_new=$seopress_special_tags;
	unset($seopress_special_tags_new['page-types']);
	print_r_html($seopress_special_tags_new);	
}



/*
* Fill value fields  od $seopress_special_tags array with function of array
* @param string Name of special tag which value field have to be filled
*/
function sp_init_special_tag_values($special_tag_set){
	global $seopress_special_tags, $sp_used_special_tags;	
	
	if( tk_is_buddypress() ){
		sp_init_bp_vars(); // Have it to be here ?
	}
	
	// Filling up every value field, needed of special tag fields
	foreach ( $seopress_special_tags['specialtag-set'][$special_tag_set] AS $special_tag => $value ) {
		// echo $value ['function']." <br />\n";
		
		$new_value = call_user_func( $value ['function'] ); // Doing function to get value of wordpress
		$seopress_special_tags['specialtag-set'][$special_tag_set][$special_tag]['value'] = $new_value; // Filling value in array
		
		$sp_used_special_tags[$special_tag_set][$special_tag]['value'] = $new_value;
	}
}
/*
* Fill value fields  od $seopress_special_tags array with function of array
* @param string Name of special tag which value field have to be filled
*/
function sp_init_bp_unknown_components_special_tag_values(){
	global $seopress_special_tags, $sp_used_special_tags;	
	
	// Initialize unknown components variables
	foreach( $seopress_special_tags['page-types']['bp-component-unknown']['specialtag-sets'] AS $special_tag_set ){
		foreach ( $seopress_special_tags['specialtag-set'][$special_tag_set] AS $special_tag => $value ) {
	
			$new_value = call_user_func( $value ['function'] ); // Doing function to get value of wordpress
			$seopress_special_tags['specialtag-set'][$special_tag_set][$special_tag]['value'] = $new_value; // Filling value in array
				
			$sp_used_special_tags[$special_tag_set][$special_tag]['value'] = $new_value;
		}
	}
}

/**
 * Replaces special tags of a string
 * @desc Replaces special tags of a string
 * @param array Meta-template for page to replace with values
 * @return array The meta values for the page
 * */
function sp_replace_special_tags( $string ){
	global $sp_used_special_tags;
	
	// Running each special tag set
	foreach( $sp_used_special_tags AS $special_tag_set => $special_tag_set_setup){
		// Replacing each special tag
		foreach( $special_tag_set_setup AS $special_tag => $array ){
			$string = str_replace( $special_tag, $sp_used_special_tags[$special_tag_set][$special_tag]['value'] , $string );
		}
	}
	return $string;	
}

// Buddypress pages
function sp_init_bp_vars(){
	global $bp, $sp_bp_current_component, $forum_template, $forum_array_pos;
	
	$sp_bp_current_component = $bp->active_components[$bp->current_component];
	if ( !isset($sp_bp_current_component) ){ $sp_bp_current_component = $bp->current_component; }
	
	if ( isset( $bp->forums ) && $sp_bp_current_component == 'forums' || $bp->current_action == "forum"){
		 if( !isset($forum_template) ){
			 $forum_topic_id = bp_forums_get_topic_id_from_slug( $bp->action_variables[1] );
			 // $forum_template = new BP_Forums_Template_Forum( 'newest' , groups_get_groupmeta( $bp->groups->current_group->id, 'forum_id' ), false, -1,  -1, -1, 'all', false );
			 for ( $i=0; $i<=count($forum_template->topics); $i++ ){
				if ($forum_topic_id == $forum_template->topics[$i]->topic_id) { 
					$forum_array_pos = $i;      
				}
			  }
		 } else {
			$forum_template = new BP_Forums_Template_Forum( 'newest', groups_get_groupmeta( $bp->current_component->current->id, 'forum_id' ), false, 1, 1, 1, 'all', false );
			$forum_array_pos = 0;
		 }
	}
}	
?>