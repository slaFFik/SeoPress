<?php 

function sp_init_special_tags_pt(){
	global $special_tags;
	
	$special_tags->add_type( 'global' ,  array( 'global' ) );
	$special_tags->add_type( 'wp-home' ,  array( 'global' ) , 'bp_seo_main_blog_start' );	
	$special_tags->add_type( 'wp-front-page' ,  array( 'post', 'global' ) , 'bp_seo_main_blog_front_page' );
	$special_tags->add_type( 'wp-post' ,  array( 'post', 'global' ) , 'bp_seo_main_blog_posts' );
	$special_tags->add_type( 'wp-page' , array( 'page', 'global' )  , 'bp_seo_main_blog_pages' );
	$special_tags->add_type( 'wp-archive' , array( 'archive', 'global' ) , 'bp_seo_main_blog_archiv' );
	$special_tags->add_type( 'wp-category' , array( 'category', 'global' ) , 'bp_seo_main_blog_cat' );
	$special_tags->add_type( 'wp-author' , array( 'author', 'global' ) , 'bp_seo_main_blog_autor_pages' );
	$special_tags->add_type( 'wp-search' , array( 'search', 'global' ) , 'bp_seo_main_blog_search_pages' );
	$special_tags->add_type( 'wp-tag' , array( 'tag', 'global' ) , 'bp_seo_main_blog_tag_pages' );
	$special_tags->add_type( 'mu-home' ,  array( 'global' ) , 'bp_seo_user_blog' );
	$special_tags->add_type( 'mu-front-page' ,  array( 'post', 'global' ) , 'bp_seo_user_blog_front_page' );
	$special_tags->add_type( 'mu-post' , array( 'post', 'global' )  , 'bp_seo_user_blog_posts' );
	$special_tags->add_type( 'mu-page' , array( 'page', 'global' )  , 'bp_seo_user_blog_pages' );
	$special_tags->add_type( 'mu-archive' , array( 'archive', 'global' ) , 'bp_seo_user_blog_archiv' );
	$special_tags->add_type( 'mu-category' , array( 'category', 'global' ) , 'bp_seo_user_blog_cat' );
	$special_tags->add_type( 'mu-author' , array( 'author', 'global' ) , 'bp_seo_user_blog_autor_pages' );
	$special_tags->add_type( 'mu-search' , array( 'search', 'global' ) , 'bp_seo_user_blog_search_pages' );
	$special_tags->add_type( 'mu-tag' , array( 'tag', 'global' ) , 'bp_seo_user_blog_tag_pages' );

}
?>