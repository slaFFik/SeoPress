<?php

/**
 * Getting post urls
 *
 * @return array All urls of published posts in an array
 */
if(!function_exists('wp_get_post_urls')){ 
	function wp_get_post_urls(){	
		$posts=get_posts("numberposts=-1&post_status='publish'&post_type=post");
		
		$urls=array();
		
		foreach($posts as $post){
			array_push($urls,get_permalink($post->ID));
		}
		return $urls;
	}
}

/**
 * Getting page urls
 *
 * @return array All urls of published pages in an array
 */
if( !function_exists( 'wp_get_page_urls' ) ){ 
	function wp_get_page_urls(){
		$pages=get_posts("numberposts=-1&post_status='publish'&post_type=page");
		
		$urls=array();
		
		foreach($pages as $page){     
			array_push($urls,get_permalink($page->ID));
		}
		return $urls;
	}
}
/**
 * Getting category urls
 *
 * @return array All urls of categories in an array
 */
if( !function_exists( 'wp_get_cat_urls' ) ){ 
	function wp_get_cat_urls(){
		$categories=get_categories();
		
		$urls=array();
		
		foreach($categories as $category){
			array_push($urls,get_category_link($category->term_id));
		}
		return $urls;
	}
}
/**
 * Getting tag urls
 *
 * @return array All urls of tags in an array
 */
if( !function_exists( 'wp_get_tag_urls' ) ){ 
	function wp_get_tag_urls(){
		$tags=get_tags();
		
		$urls=array();
		foreach ($tags as $tag){
			array_push($urls,get_tag_link($tag->term_id));
		}
		return $urls;
	}
}

/**
 * Getting all urls of wordpress installation
 *
 * @return array All urls of of wordpress installation in an array
 */
if( !function_exists( 'wp_get_urls' ) ){ 
	function wp_get_urls(){
		$post_urls=wp_get_post_urls();
		$page_urls=wp_get_page_urls();
		$cat_urls=wp_get_cat_urls();
		$tag_urls=wp_get_tag_urls();
		
		$urls=array_merge($post_urls,$page_urls,$cat_urls,$tag_urls);
		
		array_push($urls,get_bloginfo("url").'/');
		return $urls;
	}
}

if( !function_exists( 'show_urls' ) ){ 
	function show_urls(){
		print_r_html( wp_get_urls() );
	}
	// add_action( 'wp_head', 'show_urls' );
}


?>