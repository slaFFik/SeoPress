<?php

/*
* Post page functions
*/
function sp_get_post_user_ID(){
	global $post;
	return $post->post_author;
}
function sp_get_post_username(){
	global $post;
	$userData = get_userdata ( $post->post_author );
	return $userData->display_name;
}
function sp_get_post_ID(){
	global $post;
	return $post->ID;
}
function sp_get_post_title(){
	global $post;
	return $post->post_title;
}
function sp_get_post_modified(){
	global $post;
	return $post->post_modified;
}
function sp_get_post_excerpt(){
	global $post;
	return $post->post_excerpt;
}
function sp_get_category_description(){
	global $post;	
	$desc = category_description();
	if (is_object ($desc)) return '';
	return strip_tags ($desc);	
}
/*
* Archive page functions
*/
function sp_get_archive_date(){
	global $wp_locale;
	
	$m        = get_query_var ('m');
	$year     = get_query_var ('year');
	$monthnum = get_query_var('monthnum');
	$day      = get_query_var('day');
	$date     = '';

	// If there's a month
	if (!empty ($m)) {
		$my_year  = substr($m, 0, 4);
		$my_month = $wp_locale->get_month(substr($m, 4, 2));
		$my_day   = intval(substr($m, 6, 2));
		$date     = "$my_year" . ($my_month ? "$sep $my_month" : "") . ($my_day ? "$sep $my_day" : "");
	}

	if (!empty ($year)) {
		if ( !empty($monthnum) )
			$date .= " $sep " . $wp_locale->get_month($monthnum);
		if ( !empty($day) )
			$date .= " $sep " . zeroise($day, 2);
			
		$date .= ' '.$year;
	}
	return $date;
}
/* Dublicate ?
function sp_get_archive_date() {
	if (is_day()) {
		return	get_the_date() ;
	}
	if (is_month()) {
		return	get_the_date('F Y') ;
	}
	if (is_year()) {
		return	get_the_date('Y') ;
	}
}
*/
 
/*
* Author page functions
*/
function sp_get_author_user_ID(){
	global $posts;
	return $posts[0]->post_author; // Is this correct ? Only one Author ?
}
function sp_get_author_username(){
	global $posts;
	$userData = get_userdata ( $posts[0]->post_author );
	return $userData->display_name;
}
/*
* Tag page functions
*/
function sp_get_tag_name(){
	 return single_tag_title('', false);
}
/*
* Search phrase functions
*/
function sp_get_search_phrase(){
	global $wp_query;
	
	if( isset( $wp_query->query_vars['s'] ) )
	return strip_tags( $wp_query->query_vars['s']);
}
/*
* Category functions
*/
function sp_get_categories_listing(){
	global $posts;
	$cats = array();
	if( is_array( $posts ) ) {
		foreach ( $posts AS $post ){
			$new_cats = get_the_category ($post->ID);
			if( is_array( $new_cats ) ) {
				foreach ( $new_cats AS $cat ) {
					if( !in_array($cat->cat_name,$cats) ) array_push( $cats , $cat->cat_name );
				}
			}
		}
		$cats = implode( ', ' , $cats );
	}
	return $cats;
}
function sp_get_category_name() {
	global $post;
	
	// Get data from the post
	if ( is_single ()) {
		$cats = get_the_category ($post->ID);
		if (count ($cats) > 0) {
			
		  foreach ($cats AS $cat)
				$category[] = $cat->cat_name;
		
		  $category = implode (', ', $category);
		}
	
		return $category;
	}
	else if ( is_category() )
		return single_cat_title ('', false);
	return '';
}
/*
* Universal functions
*/
function sp_get_sitename(){
	return get_bloginfo ('blogname');
}
function sp_get_current_date(){
	return date( get_option( 'date_format' ) );
}
function sp_get_current_year(){
	return date( 'Y' );
}
function sp_get_current_month(){
	global $wp_locale;
	if ( is_object($wp_locale) ) return $wp_locale->get_month(date ('n'));
	else return date ('F');
}
function sp_get_current_time(){
	return date( get_option( 'time_format' ) );
}
function sp_get_url(){
	return $_SERVER['REQUEST_URI'];
}
function sp_get_date(){
	global $post;
	
	if ( is_day () ) return get_the_time('F jS, Y'); 
	else if ( is_month () ) return get_the_time( 'F, Y' );
	else if ( is_year () ) return get_the_time( 'Y' ); 
	
	else return $post->post_date;
}

function sp_get_tags(){
	global $post;
	
	if ( function_exists ( 'the_tags' ) ) {
		if ( is_tag () )
			return single_tag_title ( false , '');
		else
		{
			$items = get_the_tags ( $post->ID );
			if ( $items ) {
				foreach ($items AS $tag)
					$tags[] = $tag->name;
				
				$tags = implode (', ', $tags);
				return $tags;
			}
		}
	}
	return '';
}
function sp_get_tag_description() {
	global $post;
	
	if ( function_exists ('the_tags') ) {
		if ( is_tag () ) {
			$tag = intval( get_query_var('tag_id') );
			return strip_tags( get_term_field('description', $tag, 'post_tag') );
		} else {
			$items = get_the_tags ($post->ID);
			if ($items) {
				$tags = '';
				foreach ($items AS $tag)
					$tags[] = get_term_field('description', $tag, 'post_tag');

				return strip_tags( implode (', ', $tags) );
			}
		}
	}
	return '';
}
function sp_get_tags_listing(){
	global $posts;
	$tags = array();
	
	if( is_array( $posts ) ) {
		foreach ( $posts AS $post ){
			$new_tags = get_the_tags( $post->ID );
			if( is_array( $new_tags ) ) {
				foreach ( $new_tags AS $tag ) {
					if( !in_array($tag->name,$tags) ) array_push( $tags , $tag->name );
				}
			}
		}
		$tags = implode( ', ' , $tags );
	}
	
	return $tags;	
}
function sp_get_term_title() {
   $taxonomy = get_query_var('taxonomy');
   $term = get_query_var('term');

   if (function_exists ('get_term') && $taxonomy != '' && $term != '') {

		   $term = get_term_by('slug', $term, $taxonomy);

		   if ( is_wp_error($term) )
				   return '';

		   return($term->name);
   }
   return '';
}
function sp_get_term_description() {
	   $taxonomy = get_query_var('taxonomy');
	   $term = get_query_var('term');

	   if ( function_exists( 'get_term' ) && $taxonomy != '' && $term != '') {

			   $term = get_term_by('slug', $term, $taxonomy);

			   if ( is_wp_error($term) )
					   return '';

			   return($term->description);
	   }
	   return '';
}
function sp_get_page( $type = 'all' ){
	global $wp_query, $post;
	
	if ($wp_query->max_num_pages > 1) {
		$paged = get_query_var ('paged');
		$max   = $wp_query->max_num_pages;
		
		if ($paged == 0)
			$paged = 1;
			
		//if ($paged == 1)
		//	return '';
			
		if ($type == 'all')
			return sprintf ( __( 'page %d of %d', 'seopress' ), $paged, $max );
		else if ($type == 'number')
			return $paged;
		else if ($type == 'total')
			return $max;
	}
}
function sp_get_page_number(){
	return sp_get_page('number');
}
function sp_get_page_total(){
	return sp_get_page('total');	
}
/*
* Buddypress component functions
*/
function sp_get_bp_current_component(){
	global $bp;
	return $bp->current_component;
}
function sp_get_bp_component_id(){
	global $bp;
	return $bp->current_component->current->id;
}
function sp_get_bp_component_name(){
	global $bp;
	return $bp->current_component->current->name;
}
function sp_get_bp_component_description(){
	global $bp;
	return $bp->current_component->current->description;
}
function sp_get_bp_component_status(){
	global $bp;
	return $bp->current_component->current->status;
}
function sp_get_bp_component_date_created(){
	global $bp;
	return $bp->current_component->current->date_created;
}
function sp_get_bp_component_admins(){
	global $bp;
	return $bp->current_component->current->admins[0]->user_nicename;
}
function sp_get_bp_component_total_member_count(){
	global $bp;
	return $bp->current_component->current->total_member_count;
}
function sp_get_bp_component_last_activity(){
	global $bp;
	return $bp->current_component->current->last_activity;
}
/*
* Buddypress user functions
*/
function sp_get_bp_user_id(){
	global $bp;
	return $bp->displayed_user->id;
}
function sp_get_bp_user_nicename(){
	global $bp;
	return $bp->displayed_user->userdata->user_nicename;
}
function sp_get_bp_user_registered(){
	global $bp;
	return $bp->displayed_user->userdata->user_registered;
}
function sp_get_bp_user_display_name(){
	global $bp;
	return $bp->displayed_user->userdata->display_name;
}
function sp_get_bp_user_fullname(){
	global $bp;
	return $bp->displayed_user->fullname;
}

/*
* Buddypress forum functions
*/
function sp_get_bp_forum_topic_title(){
	global $forum_template, $forum_array_pos;
	return $forum_template->topics[$forum_array_pos]->topic_title;
}
function sp_get_bp_forum_topic_poster_name(){
	global $forum_template, $forum_array_pos;
	return $forum_template->topics[$forum_array_pos]->topic_poster_name;
}
function sp_get_bp_forum_topic_last_poster_name(){
	global $forum_template, $forum_array_pos;
	return $forum_template->topics[$forum_array_pos]->topic_last_poster_name;
}
function sp_get_bp_forum_topic_start_time(){
	global $forum_template, $forum_array_pos;
	return $forum_template->topics[$forum_array_pos]->topic_start_time;
}
function sp_get_bp_forum_topic_time(){
	global $forum_template, $forum_array_pos;
	return $forum_template->topics[$forum_array_pos]->topic_time;
}
function sp_get_bp_forum_post_text(){
	global $bp, $forum_template, $forum_array_pos, $bbdb;
    $post = $bbdb->get_row( $bbdb->prepare( "SELECT post_text FROM $bbdb->posts WHERE post_id = %d", $forum_template->topics[$forum_array_pos]->topic_last_post_id  ) );
	return $post->post_text;
}

/*
* Buddypress universal functions
*/
function sp_get_bp_current_action(){
	global $bp;
	return $bp->current_action;
}

function sp_add_special_tag_page_type( $page_type , $special_tag_sets , $option_name ){
	global $seopress_special_tags;
	
	$seopress_special_tags['page-types'][$page_type]['specialtag-sets'] = array( 'global' );
	$seopress_special_tags['page-types'][$page_type]['option-name'] = 'bp_seo_user_blog';
}

function sp_add_special_tag( $set_name, $special_tag, $function, $description ){
	global $seopress_special_tags;
	
	$seopress_special_tags['specialtag-set'][$set_name][$special_tag]['function'] = $function;
	$seopress_special_tags['specialtag-set'][$set_name][$special_tag]['description'] = $description;	
}
?>