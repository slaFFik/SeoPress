<?php
/**
 * Script for autocomplete variables
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
require( '../../../../wp-load.php' ); // Does this work anywhere ???

print_taglist_ext( $_GET['slugs'] ); 

function print_taglist_ext( $specialtag_sets = 'wp-home' ){
	global $seopress_special_tags;
					
	$specialtag_sets_arr = $seopress_special_tags['page-types'][$specialtag_sets]['specialtag-sets'];

	$result = array();
	foreach($specialtag_sets_arr AS $specialtag_set_name => $specialtag_set){
		
		$special_tags=$seopress_special_tags['specialtag-set'][$specialtag_set];
		
		foreach($special_tags AS $special_tag => $array){
			$result[] = array('value' => $special_tag, 'desc' => $array['description'] );							
		}				
	}
	
	echo json_encode($result);
}


?>
