<?php

function sp_init_special_tags(){
	global $special_tags;
	
	/*
	* Global 
	*/
	$special_tags->add_tag( '%%sitename%%', 'sp_get_sitename', __( 'Shows the sitename' , 'seopress') );
	$special_tags->add_tag( '%%sitedescription%%', 'sp_get_sitedesc', __( 'Shows the site description' , 'seopress') );
	
	$special_tags->add_set( 'global', array( '%%sitename%%', '%%sitedescription%%' ) );
	
	/*
	* Post & Page
	*/
	$special_tags->add_tag( '%%posttitle%%', 'sp_get_post_title', __( 'Shows the title of post' , 'seopress') );	
	$special_tags->add_tag( '%%postexcerpt%%', 'sp_get_post_excerpt', __( 'Shows the excerpt of the post' , 'seopress') );	
	$special_tags->add_tag( '%%postcategories%%', 'sp_get_categories_listing', __( 'Shows the username of post author' , 'seopress') );	
	$special_tags->add_tag( '%%posttags%%', 'sp_get_tags_listing',  __( 'Shows the username of post author' , 'seopress') );	
	$special_tags->add_tag( '%%postauthorname%%', 'sp_get_post_authorname', __( 'Shows the name of post author' , 'seopress') );	
	$special_tags->add_tag( '%%postdate%%', 'sp_get_date', __( 'Shows the date of post' , 'seopress') );	
	$special_tags->add_tag( '%%postmodified%%', 'sp_get_post_modified', __( 'Shows the  modifying date of the post' , 'seopress') );
	
	$special_tags->add_set( 'post', array( '%%posttitle%%', '%%postexcerpt%%', '%%postcategories%%', '%%posttags%%', '%%postauthorname%%', '%%postdate%%', '%%postmodified%%' ) );
	
	/*
	* Archive page
	*/
	$special_tags->add_tag( '%%date%%', 'sp_get_archive_date', __( 'Shows the archive date' , 'seopress') );

	$special_tags->add_set( 'archive', array( '%%date%%' ) );
	
	/*
	* Category page
	*/
	$special_tags->add_tag( '%%name%%', 'sp_get_category_name', __( 'Shows the category name' , 'seopress') );	
	$special_tags->add_tag( '%%description%%', 'sp_get_category_description', __( 'Shows the category description' , 'seopress') );

	$special_tags->add_set( 'category', array( '%%name%%', '%%description%%' ) );
	
	/*
	* Tag page
	*/
	$special_tags->add_tag( '%%name%%', 'sp_get_tag_name', __( 'Shows the tag name' , 'seopress') );		
	$special_tags->add_tag( '%%description%%', 'sp_get_tag_description', __( 'Shows the tag description' , 'seopress') );	
	
	$special_tags->add_set( 'tag', array( '%%name%%', '%%description%%' ) );
	
	/*
	* Author page
	*/
	$special_tags->add_tag( '%%authorname%%', 'sp_get_post_authorname', __( 'Shows the name of the author' , 'seopress') );
	
	$special_tags->add_set( 'author', array( '%%authorname%%' ) );

	/*
	* Pagination
	*/
	$special_tags->add_tag( '%%pagination%%', 'sp_get_page', __( 'Shows the full Pagination' , 'seopress') );		
	$special_tags->add_tag( '%%pagenumber%%', 'sp_get_page_number', __( 'Shows the current page number' , 'seopress') );	
	$special_tags->add_tag( '%%pagetotal%%', 'sp_get_page_total', __( 'Shows the sum of all pages' , 'seopress') );
	
	$special_tags->add_set( 'pagination', array( '%%pagination%%', '%%pagenumber%%', '%%pagetotal%%' ) );
	
	/*
	* Search page
	*/
	$special_tags->add_tag( '%%search%%', 'sp_get_search_phrase', __( 'Shows the search phrase' , 'seopress') );
	
	$special_tags->add_set( 'search', array( '%%search%%' ) );

}
?>