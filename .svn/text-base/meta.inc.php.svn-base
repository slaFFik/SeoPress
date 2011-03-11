<?php
/**
 * SeoPress
 *
 * @package SeoPress
 * @author Sven Lehnert
 * @copyright Copyright (C) Sven Lehnert
 **/

/*
============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages (including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.

For full license details see license.txt
============================================================================================================ */

### Add the meta data to the head, depends on the viewed page

function bp_seo_mu(){
	global $meta;
	
	### USER BLOG HOME
  	if (is_home()) {
    	$meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog");
    	// Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
	   return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG TAG PAGES
  	if (is_tag()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_tag_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG CATEGORIES
  	if (is_category()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_cat"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG ARCHIVE
  	if (is_archive() && !is_tag() && !is_category()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_archiv"));
    			return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	} 

	### USER BLOG POSTS
  	if (is_single()){
    	$meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_posts");
    	// Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG PAGES
  	if (is_page()) {
	    $meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_pages");
	 	// Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
  		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG AUTHOR PAGES
	if (is_author()) {
	    $meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_autor_pages"));
	    return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
	}
	
	### USER BLOG SEARCH PAGES
  	if (is_search()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_search_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
	### USER BLOG 404 PAGES
  	if (is_404()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_user_blog_404_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}

 	return bp_seo_get_page_title();
}

### adds the meta tags to the wp_head
function bp_seo(){
  	global $bp, $meta;
  	  
  	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
  	$current_component = $bp->current_component;
  	
	$active_component = $bp->active_components[$bp->current_component];
	if (!isset($active_component)){
	$active_component = $bp->current_component;
	}
  	
  	$current_action = $bp->current_action;
  	$directory = $bp->is_directory;

  	if (is_front_page()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_start"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	### MAIN BLOG START
  	if (is_home()) {
    	$meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_start");
    	// Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
  		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    }
  	if ( bp_is_activity_front_page()){
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG TAG PAGES
  	if (is_tag()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_tag_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG CATEGORIES
  	if (is_category() && !$directory){
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_cat"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG ARCHIVE
  	if (is_archive()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_archiv"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	} 
  	
  	### MAIN BLOG POSTS
  	if (is_single() && !bp_is_single_item()) {
    	$meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_posts");
    	// Overwriting with manual data if exists
    	$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
  		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}

  	### MAIN BLOG PAGES
  	if (bp_is_blog_page() && !is_search() && !is_404() && !is_author() && !is_tag() && !is_single() && !bp_is_front_page()) {
  		$meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_pages");
    	// Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
  		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG AUTHOR PAGES
  	if (is_author() && !$current_component) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_autor_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG SEARCH PAGES
  	if (is_search()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_search_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	
  	### MAIN BLOG 404 PAGES
  	if (is_404()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_404_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}

  	### MAIN BLOG REGISTER PAGES
  	if (bp_is_register_page()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_reg_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}

  	###
  	### GROUP PAGES
  	###
  
  	### ALL GROUP PAGES 
  	if(bp_is_groups_component()){
  		
    	if (bp_is_group_home()){
	    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_groups_home"));
	    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	} 
    	
    	if(bp_is_groups_component() && bp_is_single_item()){
      			if(bp_is_group_forum() && !bp_is_group_forum_topic()){
        			$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_groups_forum"));
        			return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
        		}
      			if(bp_is_group_forum_topic()){
         			$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_groups_forum_topic"));
          			return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
      			}
      			if ( function_exists('bp_is_group_wire') ){
        			if(bp_is_group_wire()){
	         			$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_groups_wire"));
	          			return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
        			}
      			} 
      		if(bp_is_group_members()){
        		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_groups_members"));
        		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
      		}
    	}
    	
    	if($bp_seo_components != '' ){
      		foreach ($bp_seo_components as $bp_seo_component => $value ){
        		if ($current_action == $value[slug]) {
	          		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$bp_seo_component."_".$active_component."_extends"));
	          		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
        		}
      		}
    	}
	}
  
	###
  	### PROFILE PAGES
  	###

  	### PROFILE HOME
  	if((bp_is_profile_component()|| bp_is_activity_component() || bp_is_blogs_component() || bp_is_friends_component()) && !$directory && !bp_is_create_blog()){
    	
  		if(bp_is_user_profile()){
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_profil"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	
    	### PROFILE FRIENDS
    	if (bp_is_user_friends() && !$directory){
     	 	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_profil_friends"));
    		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	### PROFILE ACTIVITY USER
    	if (bp_is_activity_component() && !$directory) {
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_profil_activity"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	### PROFILE ACTIVITY FRIENDS
    	if (bp_is_user_friends_activity()){
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_activity_friends"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	### PROFILE BLOGS
    	if (bp_is_user_blogs() && !$directory ) {
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_profil_blogs"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	### PROFILE BLOGS RECENT POSTS
    	if (bp_is_user_recent_posts()) {
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_blogs_recent_posts"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}
    	### PROFILE BLOGS RECENT COMMENTS
    	if (bp_is_user_recent_commments()) {
      		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_blogs_recent_commments"));
      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    	}   
  	}
  	
    ### PROFILE GROUPS
    if (bp_is_user_groups()  && !bp_is_single_item() && !$directory){
      	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_profil_groups"));
      	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
    } 

  	###
  	### DIRECTORIES
  	###

  	### DIRECTORY BLOGS
  	if ($directory &&  $current_component == BP_BLOGS_SLUG) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_directory_blogs"));
		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	### DIRECTORY ACTIVITY
  	if ($directory &&  $current_component == BP_ACTIVITY_SLUG) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_directory_activity"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	### DIRECTORY GROUPS
  	if ($directory &&  $current_component == BP_GROUPS_SLUG) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_directory_groups"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	### DIRECTORY FORUMS
  	if ($directory &&  $current_component == BP_FORUMS_SLUG) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_directory_forums"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	### DIRECTORY MEMBERS    
  	if ($directory &&  $current_component == BP_MEMBERS_SLUG) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_directory_members"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
  	if($bp_seo_components != '' ){
  		
    	foreach ($bp_seo_components as $bp_seo_component => $value ){
      		if ($directory &&  $current_component == $value[slug]) {
        		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$active_component."_directory"));
        		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
      		}
      		if (!$directory &&  $current_component == $value[slug]){
        		if ($bp_seo_component == $active_component && bp_is_single_item()) {
	        		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$active_component.'_'.$current_component.'_extends'));
    	      		return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
        		}
        		if($bp_seo_component == $active_component  && !bp_is_single_item())  {
	        		$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$active_component.'_profile_extends'));
          			return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
        		}
      		}
    	}
  	}
 	return bp_seo_get_page_title();
}

### Standard Wordpress
function wp_seo(){
	global $meta;
	
	### USER BLOG HOME
  	if (is_front_page()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_start"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG ARCHIVE
  	if (is_archive() && !is_tag() && !is_category()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_archiv"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	} 
	### USER BLOG CATEGORIES
  	if (is_category()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_cat"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG POSTS
  	if (is_single()) {
	    $meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_posts");
	    // Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
	    return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG PAGES
  	if (is_page()) {
	    $meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_pages");
	    // Overwriting with manual data if exists
		$meta = get_seopress_postmeta();
  		$meta = replace_special_tags($meta); 
	    return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG AUTHOR PAGES
  	if (is_author()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_autor_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG SEARCH PAGES
  	if (is_search()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_search_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG 404 PAGES
  	if (is_404()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_404_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
	### USER BLOG TAG PAGES
  	if (is_tag()) {
    	$meta = replace_special_tags(get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_main_blog_tag_pages"));
    	return bp_seo_meta_length('bp_seo_metatitle_length',$meta[0],150);
  	}
 	return get_the_title();
}

function bp_seo_get_page_title() {
	global $bp, $post, $wp_query, $current_blog;

	if (is_front_page() || !bp_current_component() || ( is_home() && bp_is_page( 'home' ))){
		$title= __('Home','buddypress');

	}elseif(bp_is_blog_page()){
		if (is_single()){
			$title=__('Blog &#124; '.$post->post_title,'buddypress');
		}else if(is_category()) {
			$title=__('Blog &#124; Categories &#124; '.ucwords($wp_query->query_vars['category_name']),'buddypress');
		}else if(is_tag()) {
			$title=__('Blog &#124; Tags &#124; '.ucwords( $wp_query->query_vars['tag'] ),'buddypress');
		}else if(is_page()){
			$title=$post->post_title;
		}else
			$title=__('Blog','buddypress');

	}elseif(!empty($bp->displayed_user->fullname)){
 		$title=strip_tags( $bp->displayed_user->fullname.' &#124; '.ucwords($bp->current_component));

	}elseif($bp->is_single_item){
		$title=ucwords($bp->current_component).' &#124; '.$bp->bp_options_title.' &#124; '.$bp->bp_options_nav[$bp->current_component][$bp->current_action]['name'];

	}elseif($bp->is_directory){
		if (!$bp->current_component)
			$title=sprintf(__('%s Directory','buddypress'),ucwords(BP_MEMBERS_SLUG));
		else
			$title=sprintf(__('%s Directory','buddypress'),ucwords($bp->current_component));

	}elseif(bp_is_register_page()){
		$title= __( 'Create an Account','buddypress');

	}elseif(bp_is_activation_page()){
		$title=__( 'Activate your Account','buddypress');

	}elseif(bp_is_group_create()){
		$title=__( 'Create a Group','buddypress');

	}elseif(bp_is_create_blog()){
		$title=__( 'Create a Blog','buddypress');
	}

	if(defined('BP_ENABLE_MULTIBLOG')){
		$blog_title=get_blog_option($current_blog->blog_id,'blogname');
	}else {
		$blog_title=get_blog_option(BP_ROOT_BLOG,'blogname');
	}

	return $blog_title.' &#124; '.esc_attr($title);
}

function replace_special_tags($meta){
  	global $post; 

  	if(!is_array($meta)){
		if(defined('BP_VERSION')){$meta[0] = bp_seo_get_page_title();} else { $meta[0] = get_the_title();}
  	}
  	$newmeta = Array();
  	$i=0;
  	foreach($meta as $data){
   		$newmeta[$i] = SFB_Special_Tags::replace ($data, $post);
   		$newmeta[$i] = stripslashes($newmeta[$i]);
   		$i++;
  	} 
  	return $newmeta; 
}

function bp_seo_meta_length($metatype,$meta,$metalength){
	$metadesc_length=get_option($metatype);
	if($metadesc_length!=0 && $metadesc_length>0){
		$meta=strip_tags(substr($meta,0,$metadesc_length));
	}
	if($metadesc_length==""){
		$meta=strip_tags(substr($meta,0,$metalength));
	}
	
	$meta=preg_replace("/\r|\n/s", "", $meta);
	
	return $meta;
}

function bp_seo_meta(){
	global $meta;
	
	if($meta[3]==true){?><meta name="robots" content="noindex" /><?php }

	if(function_exists('get_keywords_from_content')){
		if(get_option(bp_seo_keywords)== true){
		    if(trim($meta[2]) == "" || trim($meta[2]) == ","){
					$meta[2] = get_keywords_from_content($meta[1]);
			}
		}
	}
    if(!trim($meta[1]) == "" || trim($meta[1]) == ","){	
    	echo '<meta name="description" content="'.bp_seo_meta_length('bp_seo_metadesc_length',$meta[1],180).'" />';
	} 
    if(trim($meta[2]) != ""){ 
    	if(trim($meta[2]) != ","){
    		echo '<meta name="keywords" content="'.$meta[2].'" />';
    	} 
	}
}