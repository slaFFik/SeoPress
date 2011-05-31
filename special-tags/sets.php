<?php

function sp_init_special_tags(){
	global $seopress_special_tags;
	
	/*
	* Universal variables
	*/
	sp_add_special_tag( 'global', '%%sitename%%', 'sp_get_sitename', __( 'Shows the sitename' , 'seopress') );
	sp_add_special_tag( 'global', '%%sitedescription%%', 'sp_get_sitedesc', __( 'Shows the site description' , 'seopress') );
	
	/*
	* Post & Page variables
	*/
	sp_add_special_tag( 'post', '%%title%%', 'sp_get_post_title', __( 'Shows the title of post' , 'seopress') );	
	sp_add_special_tag( 'post', '%%excerpt%%', 'sp_get_post_excerpt', __( 'Shows the excerpt of the post' , 'seopress') );	
	sp_add_special_tag( 'post', '%%categories%%', 'sp_get_categories_listing', __( 'Shows the username of post author' , 'seopress') );	
	sp_add_special_tag( 'post', '%%tags%%', 'sp_get_tags_listing',  __( 'Shows the username of post author' , 'seopress') );	
	sp_add_special_tag( 'post', '%%authorname%%', 'sp_get_post_authorname', __( 'Shows the name of post author' , 'seopress') );	
	sp_add_special_tag( 'post', '%%date%%', 'sp_get_date', __( 'Shows the date of post' , 'seopress') );	
	sp_add_special_tag( 'post', '%%modified%%', 'sp_get_post_modified', __( 'Shows the  modifying date of the post' , 'seopress') );		
	
	/*
	* Archive page variables
	*/
	sp_add_special_tag( 'archive', '%%date%%', 'sp_get_archive_date', __( 'Shows the archive date' , 'seopress') );	
	
	/*
	* Category page variables
	*/
	sp_add_special_tag( 'category', '%%name%%', 'sp_get_category_name', __( 'Shows the category name' , 'seopress') );	
	sp_add_special_tag( 'category', '%%description%%', 'sp_get_category_description', __( 'Shows the category description' , 'seopress') );	
	
	/*
	* Tag page variables
	*/
	sp_add_special_tag( 'tag', '%%name%%', 'sp_get_tag_name', __( 'Shows the tag name' , 'seopress') );		
	sp_add_special_tag( 'tag', '%%description%%', 'sp_get_tag_description', __( 'Shows the tag description' , 'seopress') );	
	
	/*
	* Author page variables
	*/
	sp_add_special_tag( 'author', '%%authorname%%', 'sp_get_post_authorname', __( 'Shows the name of the author' , 'seopress') );	

	/*
	* Pagination variables
	*/
	sp_add_special_tag( 'pagination', '%%pagination%%', 'sp_get_page', __( 'Shows the full Pagination' , 'seopress') );		
	sp_add_special_tag( 'pagination', '%%pagenumber%%', 'sp_get_page_number', __( 'Shows the current page number' , 'seopress') );	
	
	sp_add_special_tag( 'pagination', '%%pagetotal%%', 'sp_get_page_total', __( 'Shows the sum of all pages' , 'seopress') );	
	
	/*
	* Search page variables
	*/
	sp_add_special_tag( 'search', '%%search%%', 'sp_get_search_phrase', __( 'Shows the search phrase' , 'seopress') );	

}
?>