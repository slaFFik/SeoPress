<?php

function sp_init_special_tags(){
	global $special_tags;
	
	/*
	* Global 
	*/
	$special_tags->add_tag( '%%site_name%%', 'sp_get_sitename', __( 'Shows the sitename' , 'seopress') );
	$special_tags->add_tag( '%%site_description%%', 'sp_get_sitedesc', __( 'Shows the site description' , 'seopress') );
	
	$special_tags->add_set( 'global', array( '%%site_name%%', '%%site_description%%' ) );
	
	/*
	* Post & Page
	*/
	$special_tags->add_tag( '%%post_title%%', 'sp_get_post_title', __( 'Shows the title of post' , 'seopress') );
	$special_tags->add_tag( '%%post_content%%', 'sp_get_post_content', __( 'Shows the content of the post' , 'seopress') );	
	$special_tags->add_tag( '%%post_auto_excerpt%%', 'sp_get_post_auto_excerpt', __( 'Shows the excerpt of the post' , 'seopress') );
	$special_tags->add_tag( '%%post_excerpt%%', 'sp_get_post_excerpt', __( 'Shows the excerpt of the post' , 'seopress') );	
	$special_tags->add_tag( '%%post_categories%%', 'sp_get_categories_listing', __( 'Shows post categories' , 'seopress') );	
	$special_tags->add_tag( '%%post_tags%%', 'sp_get_tags_listing',  __( 'Shows post tags' , 'seopress') );	
	$special_tags->add_tag( '%%post_author%%', 'sp_get_post_authorname', __( 'Shows the name of post author' , 'seopress') );
		
	$special_tags->add_set( 'post', array( '%%post_title%%', '%%post_content%%', '%%post_auto_excerpt%%', '%%post_excerpt%%', '%%post_categories%%', '%%post_tags%%', '%%post_author%%' ) );	
	
	$special_tags->add_tag( '%%page_title%%', 'sp_get_post_title', __( 'Shows the title of post' , 'seopress') );
	$special_tags->add_tag( '%%page_content%%', 'sp_get_post_content', __( 'Shows the title of post' , 'seopress') );	
	$special_tags->add_tag( '%%page_auto_excerpt%%', 'sp_get_post_auto_excerpt', __( 'Shows the excerpt of the post' , 'seopress') );	
	$special_tags->add_tag( '%%page_author%%', 'sp_get_post_authorname', __( 'Shows the name of post author' , 'seopress') );
	
	$special_tags->add_set( 'page', array( '%%page_title%%', '%%page_content%%', '%%page_auto_excerpt%%', '%%page_author%%' ) );

	/*
	* Archive page
	*/
	$special_tags->add_tag( '%%archive_date%%', 'sp_get_archive_date', __( 'Shows the archive date' , 'seopress') );
	$special_tags->add_set( 'archive', array( '%%archive_date%%' ) );
	
	/*
	* Category page
	*/
	$special_tags->add_tag( '%%category%%', 'sp_get_category_name', __( 'Shows the category name' , 'seopress') );	
	$special_tags->add_tag( '%%category_description%%', 'sp_get_category_description', __( 'Shows the category description' , 'seopress') );

	$special_tags->add_set( 'category', array( '%%category%%', '%%category_description%%' ) );
	
	/*
	* Tag page
	*/
	$special_tags->add_tag( '%%tag%%', 'sp_get_tag_name', __( 'Shows the tag name' , 'seopress') );		
	$special_tags->add_tag( '%%tag_description%%', 'sp_get_tag_description', __( 'Shows the tag description' , 'seopress') );	
	
	$special_tags->add_set( 'tag', array( '%%tag%%', '%%tag_description%%' ) );
	
	/*
	* Author page
	*/
	$special_tags->add_tag( '%%author%%', 'sp_get_post_authorname', __( 'Shows the name of the author' , 'seopress') );
	
	$special_tags->add_set( 'author', array( '%%author%%' ) );

	/*
	* Pagination
	*/			
	$special_tags->add_tag( '%%page%%', 'sp_get_page_number', __( 'Shows the current page number' , 'seopress') );	
	$special_tags->add_tag( '%%page_total%%', 'sp_get_page_total', __( 'Shows the sum of all pages' , 'seopress') );
	
	$special_tags->add_set( 'pagination', array( '%%page%%', '%%page_total%%' ) );
	
	/*
	* Search page
	*/
	$special_tags->add_tag( '%%search_phrase%%', 'sp_get_search_phrase', __( 'Shows the search phrase' , 'seopress') );
	
	$special_tags->add_set( 'search', array( '%%search_phrase%%' ) );

}
?>