<?php
/**
 * Saving single metabox entries of posts and pages
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/
function seopress_post_title($id){
	if ( isset( $_POST['seopress_post_title'] ) === true) {
		update_post_meta($id,"_title",$_POST["seopress_post_title"]);
	}
}
function seopress_post_description($id){
	if ( isset( $_POST['seopress_post_description'] ) === true) {
		update_post_meta($id,"_description",$_POST["seopress_post_description"]);
	}
}
function seopress_post_keywords($id){
	if ( isset( $_POST['seopress_post_keywords'] ) === true) {
		update_post_meta($id,"_keywords",$_POST["seopress_post_keywords"]);
	}
}
function seopress_post_noindex($id){
	if ( $_POST['seopress_post_noindex'] == "1" ) {
		update_post_meta( $id, "_noindex", 1);
	}else{
		update_post_meta( $id, "_noindex", 0);
	}
}

?>