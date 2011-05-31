<?php 

function sp_init_special_tags_pt(){
	global $seopress_special_tags;

	/*
	* Page types
	*/
	$seopress_special_tags['page-types']['global']['specialtag-sets'] = array( 'global' );
	
	// Wordpress
	sp_add_special_tag_page_type( 'wp-home' ,  array( 'global' ) , 'bp_seo_main_blog_start' );
	sp_add_special_tag_page_type( 'wp-front-page' ,  array( 'post', 'global' ) , 'bp_seo_main_blog_front_page' );
	sp_add_special_tag_page_type( 'wp-post' ,  array( 'post', 'global' ) , 'bp_seo_main_blog_posts' );
	sp_add_special_tag_page_type( 'wp-page' , array( 'post', 'global' )  , 'bp_seo_main_blog_pages' );
	sp_add_special_tag_page_type( 'wp-archive' , array( 'archive', 'global' ) , 'bp_seo_main_blog_archiv' );
	sp_add_special_tag_page_type( 'wp-category' , array( 'category', 'global' ) , 'bp_seo_main_blog_cat' );
	sp_add_special_tag_page_type( 'wp-author' , array( 'author', 'global' ) , 'bp_seo_main_blog_autor_pages' );
	sp_add_special_tag_page_type( 'wp-search' , array( 'search', 'global' ) , 'bp_seo_main_blog_search_pages' );
	sp_add_special_tag_page_type( 'wp-tag' , array( 'tag', 'global' ) , 'bp_seo_main_blog_tag_pages' );
	sp_add_special_tag_page_type( 'mu-home' ,  array( 'global' ) , 'bp_seo_user_blog' );
	sp_add_special_tag_page_type( 'mu-front-page' ,  array( 'post', 'global' ) , 'bp_seo_user_blog_front_page' );
	sp_add_special_tag_page_type( 'mu-post' , array( 'post', 'global' )  , 'bp_seo_user_blog_posts' );
	sp_add_special_tag_page_type( 'mu-page' , array( 'post', 'global' )  , 'bp_seo_user_blog_pages' );
	sp_add_special_tag_page_type( 'mu-archive' , array( 'archive', 'global' ) , 'bp_seo_user_blog_archiv' );
	sp_add_special_tag_page_type( 'mu-category' , array( 'category', 'global' ) , 'bp_seo_user_blog_cat' );
	sp_add_special_tag_page_type( 'mu-author' , array( 'author', 'global' ) , 'bp_seo_user_blog_autor_pages' );
	sp_add_special_tag_page_type( 'mu-search' , array( 'search', 'global' ) , 'bp_seo_user_blog_search_pages' );
	sp_add_special_tag_page_type( 'mu-tag' , array( 'tag', 'global' ) , 'bp_seo_user_blog_tag_pages' );

}
?>