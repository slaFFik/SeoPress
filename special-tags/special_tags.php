<?php

/*
* Fill value fields  od $seopress_special_tags array with function of array
* @param string Name of special tag which value field have to be filled
*/
function sp_init_special_tag_values($special_tag_set){
	global $seopress_special_tags, $sp_used_special_tags;	
	
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



function sp_add_special_tag_page_type( $page_type , $special_tag_sets = array( 'global' ) , $option_name = '' ){
	global $seopress_special_tags;
	
	$seopress_special_tags['page-types'][$page_type]['specialtag-sets'] = $special_tag_sets;
	$seopress_special_tags['page-types'][$page_type]['option-name'] = $option_name;
}

function sp_add_special_tag( $set_name, $special_tag, $function, $description ){
	global $seopress_special_tags;
	
	$seopress_special_tags['specialtag-set'][$set_name][$special_tag]['function'] = $function;
	$seopress_special_tags['specialtag-set'][$set_name][$special_tag]['description'] = $description;	
}
?>