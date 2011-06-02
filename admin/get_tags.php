<?php
/**
 * Script for autocomplete variables
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
require( '../../../../wp-load.php' ); // Does this work anywhere ???

tk_json_taglist( $_GET['type'] ); 

function tk_json_taglist( $type = 'wp-home' ){
	global $special_tags;
	
	$tags = $special_tags->get_tags( $type );
	
	foreach( $tags AS $tag => $value ){
		$result[] = array('value' => $tag, 'desc' => $value['description'] );	
	}
	
	echo json_encode($result);
}


?>
