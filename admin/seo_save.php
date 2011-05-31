<?php
/**
 * Save functions for SEO pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

// Update General Seo page to the option table.
function seopress_seo_save(){
	global $current_user;
	
	$msg = false;
	if ( isset( $_POST['seopress_save_seo'] ) ) {
		
		seopress_save_wordpress();
		seopress_save_wordpress_networkblogs();
		seopress_save_buddypress_directories();
		seopress_save_buddypress_profiles();
		seopress_save_buddypress_groups();
		seopress_save_buddypress_registration();
		seopress_save_buddypress_components();
		
		do_action( 'sp_save_seo' );
		
		echo '<div class="updated"><p>' . __( 'Seo settings saved succsessfully.', 'seopress') . '</p></div>';    
	}	
}
seopress_seo_save();

function seopress_save_wordpress(){
	
	// MAIN BLOG START
    $main_blog_start = array($_POST['main_blog_start_title'],$_POST['main_blog_start'],$_POST['main_blog_start_tags'],$_POST['main_blog_start_noindex']) ;
	update_option('bp_seo_main_blog_start', $main_blog_start);
	// MAIN BLOG FRONT PAGE
    $main_blog_front_page = array($_POST['main_blog_front_page_title'],$_POST['main_blog_front_page'],$_POST['main_blog_front_page_tags'],$_POST['main_blog_front_page_noindex']) ;
	update_option('bp_seo_main_blog_front_page', $main_blog_front_page);
    // MAIN BLOG HOME
    $main_blog = array($_POST['main_blog_title'],$_POST['main_blog'],$_POST['main_blog_tags'],$_POST['main_blog_noindex']) ;
	update_option('bp_seo_main_blog', $main_blog);
    // MAIN BLOG POSTS 
    $main_blog_posts = array($_POST['main_blog_posts_title'],$_POST['main_blog_posts'],$_POST['main_blog_posts_tags'],$_POST['main_blog_posts_noindex']) ;
	update_option('bp_seo_main_blog_posts', $main_blog_posts);
    // MAIN BLOG PAGES
    $main_blog_pages = array($_POST['main_blog_pages_title'],$_POST['main_blog_pages'],$_POST['main_blog_pages_tags'],$_POST['main_blog_pages_noindex']) ;
	update_option('bp_seo_main_blog_pages', $main_blog_pages);	
    // MAIN BLOG ARCHIVE
    $main_blog_archiv = array($_POST['main_blog_archiv_title'],$_POST['main_blog_archiv'],$_POST['main_blog_archiv_tags'],$_POST['main_blog_archiv_noindex']) ;
	update_option('bp_seo_main_blog_archiv', $main_blog_archiv);
    // MAIN BLOG CATEGORIES
    $main_blog_cat = array($_POST['main_blog_cat_title'],$_POST['main_blog_cat'],$_POST['main_blog_cat_tags'],$_POST['main_blog_cat_noindex']) ;
	update_option('bp_seo_main_blog_cat', $main_blog_cat);
    // MAIN BLOG TAG PAGES
    $main_blog_tag_pages = array($_POST['main_blog_tag_pages_title'],$_POST['main_blog_tag_pages'],$_POST['main_blog_tag_pages_tags'],$_POST['main_blog_tag_pages_noindex']) ;
	update_option('bp_seo_main_blog_tag_pages', $main_blog_tag_pages);
    // MAIN BLOG AUTHOR PAGES
    $main_blog_autor_pages = array($_POST['main_blog_autor_pages_title'],$_POST['main_blog_autor_pages'],$_POST['main_blog_autor_pages_tags'],$_POST['main_blog_autor_pages_noindex']) ;
	update_option('bp_seo_main_blog_autor_pages', $main_blog_autor_pages);	
    // MAIN BLOG SEARCH PAGES
    $main_blog_search_pages = array($_POST['main_blog_search_pages_title'],$_POST['main_blog_search_pages'],$_POST['main_blog_search_pages_tags'],$_POST['main_blog_search_pages_noindex']) ;
	update_option('bp_seo_main_blog_search_pages', $main_blog_search_pages);
    // MAIN BLOG REGISTER PAGES
    $main_blog_reg_pages = array($_POST['main_blog_reg_pages_title'],$_POST['main_blog_reg_pages'],$_POST['main_blog_reg_pages_tags'],$_POST['main_blog_reg_pages_noindex']) ;
	update_option('bp_seo_main_blog_reg_pages', $main_blog_reg_pages);	
    // MAIN BLOG 404 PAGES	
    $main_blog_404_pages = array($_POST['main_blog_404_pages_title'],$_POST['main_blog_404_pages'],$_POST['main_blog_404_pages_tags'],$_POST['main_blog_404_pages_noindex']) ;
	update_option('bp_seo_main_blog_404_pages', $main_blog_404_pages);
}

function seopress_save_wordpress_networkblogs(){
	// USER BLOG HOME
    $user_blog = array($_POST['user_blog_title'],$_POST['user_blog'],$_POST['user_blog_tags'],$_POST['user_blog_noindex']);
	update_option('bp_seo_user_blog', $user_blog);
	// USER BLOG FRONT PAGE
    $user_blog_front_page = array($_POST['user_blog_front_page_title'],$_POST['user_blog_front_page'],$_POST['user_blog_front_page_tags'],$_POST['user_blog_front_page_noindex']) ;
	update_option('bp_seo_user_blog_front_page', $user_blog_front_page);	
    // USER BLOG POSTS 
    $user_blog_posts = array($_POST['user_blog_posts_title'],$_POST['user_blog_posts'],$_POST['user_blog_posts_tags'],$_POST['user_blog_posts_noindex']) ;
	update_option('bp_seo_user_blog_posts', $user_blog_posts);
    // USER BLOG PAGES
    $user_blog_pages = array($_POST['user_blog_pages_title'],$_POST['user_blog_pages'],$_POST['user_blog_pages_tags'],$_POST['user_blog_pages_noindex']) ;
	update_option('bp_seo_user_blog_pages', $user_blog_pages);	
    // USER BLOG CATEGORIES
    $user_blog_cat = array($_POST['user_blog_cat_title'],$_POST['user_blog_cat'],$_POST['user_blog_cat_tags'],$_POST['user_blog_cat_noindex']) ;
	update_option('bp_seo_user_blog_cat', $user_blog_cat);
    // USER BLOG TAG PAGES
    $user_blog_tag_pages = array($_POST['user_blog_tag_pages_title'],$_POST['user_blog_tag_pages'],$_POST['user_blog_tag_pages_tags'],$_POST['user_blog_tag_pages_noindex']);
	update_option('bp_seo_user_blog_tag_pages', $user_blog_tag_pages);	
    // USER BLOG ARCHIVE
    $user_blog_archiv = array($_POST['user_blog_archiv_title'],$_POST['user_blog_archiv'],$_POST['user_blog_archiv_tags'],$_POST['user_blog_archiv_noindex']) ;
	update_option('bp_seo_user_blog_archiv', $user_blog_archiv);
    // USER BLOG AUTHOR PAGES
    $user_blog_autor_pages = array($_POST['user_blog_autor_pages_title'],$_POST['user_blog_autor_pages'],$_POST['user_blog_autor_pages_tags'],$_POST['user_blog_autor_pages_noindex']) ;
	update_option('bp_seo_user_blog_autor_pages', $user_blog_autor_pages);
    // USER BLOG SEARCH PAGES
    $user_blog_search_pages = array($_POST['user_blog_search_pages_title'],$_POST['user_blog_search_pages'],$_POST['user_blog_search_pages_tags'],$_POST['user_blog_search_pages_noindex']) ;
	update_option('bp_seo_user_blog_search_pages', $user_blog_search_pages);
    // USER BLOG 404 PAGES 
    $user_blog_404_pages = array($_POST['user_blog_404_pages_title'],$_POST['user_blog_404_pages'],$_POST['user_blog_404_pages_tags'],$_POST['user_blog_404_pages_noindex']) ;
	update_option('bp_seo_user_blog_404_pages', $user_blog_404_pages);

}

function seopress_save_buddypress_directories(){
    // Directory Activity
    $directory_activity = array($_POST['directory_activity_title'],$_POST['directory_activity'],$_POST['directory_activity_tags'],$_POST['directory_activity_noindex']) ;
	update_option('bp_seo_directory_activity', $directory_activity);
    // Directory Members
    $directory_members = array($_POST['directory_members_title'],$_POST['directory_members'],$_POST['directory_members_tags'],$_POST['directory_members_noindex']) ;
	update_option('bp_seo_directory_members', $directory_members);
    // Directory Groups
    $directory_groups = array($_POST['directory_groups_title'],$_POST['directory_groups'],$_POST['directory_groups_tags'],$_POST['directory_groups_noindex']) ;
	update_option('bp_seo_directory_groups', $directory_groups);
    // Directory Forums
    $directory_forums = array($_POST['directory_forums_title'],$_POST['directory_forums'],$_POST['directory_forums_tags'],$_POST['directory_forums_noindex']) ;
	update_option('bp_seo_directory_forums', $directory_forums);
	// Directory Blogs
    $directory_blogs = array($_POST['directory_blogs_title'],$_POST['directory_blogs'],$_POST['directory_blogs_tags'],$_POST['directory_blogs_noindex']);
	update_option('bp_seo_directory_blogs', $directory_blogs);
}

function seopress_save_buddypress_profiles(){
	// Profile Home
    $profil = array($_POST['profil_title'],$_POST['profil'],$_POST['profil_tags'],$_POST['profil_noindex']) ;
	update_option('bp_seo_profil', $profil);
	
    // Profile Blogs
    $profil_blogs = array($_POST['profil_blogs_title'],$_POST['profil_blogs'],$_POST['profil_blogs_tags'],$_POST['profil_blogs_noindex']) ;
	update_option('bp_seo_profil_blogs', $profil_blogs);
    // Profile Blogs  recent_posts
    $profil_blogs_recent_posts = array($_POST['profil_blogs_recent_posts_title'],$_POST['profil_blogs_recent_posts'],$_POST['profil_blogs_recent_posts_tags'],$_POST['profil_blogs_recent_posts_noindex']) ;
	update_option('bp_seo_profil_blogs_recent_posts', $profil_blogs_recent_posts);
    // Profile Blogs recent_commments
    $profil_blogs_recent_commments = array($_POST['profil_blogs_recent_commments_title'],$_POST['profil_blogs_recent_commments'],$_POST['profil_blogs_recent_commments_tags'],$_POST['profil_blogs_recent_commments_noindex']) ;
	update_option('bp_seo_profil_blogs_recent_commments', $profil_blogs_recent_commments);
    // Profile friends
    $profil_friends = array($_POST['profil_friends_title'],$_POST['profil_friends'],$_POST['profil_friends_tags'],$_POST['profil_friends_noindex']) ;
	update_option('bp_seo_profil_friends', $profil_friends);
    // Profile Groups
    $profil_groups = array($_POST['profil_groups_title'],$_POST['profil_groups'],$_POST['profil_groups_tags'],$_POST['profil_groups_noindex'] );
	update_option('bp_seo_profil_groups', $profil_groups);
    // Profile Wire
    $profil_wire = array($_POST['profil_wire_title'],$_POST['profil_wire'],$_POST['profil_wire_tags'],$_POST['profil_wire_noindex']) ;
	update_option('bp_seo_profil_wire', $profil_wire);
	
    // Profile Activity
    $profil_activity = array($_POST['profil_activity_title'],$_POST['profil_activity'],$_POST['profil_activity_tags'],$_POST['profil_activity_noindex']) ;
	update_option('bp_seo_profil_activity', $profil_activity);
    
	// Profile Activity friends 
    $profil_activity_friends = array($_POST['profil_activity_friends_title'],$_POST['profil_activity_friends'],$_POST['profil_activity_friends_tags'],$_POST['profil_activity_friends_noindex']) ;
	update_option('bp_seo_profil_activity_friends', $profil_activity_friends);
	
	// Profile Activity groups 
    $profil_activity_groups = array($_POST['profil_activity_groups_title'],$_POST['profil_activity_groups'],$_POST['profil_activity_groups_tags'],$_POST['profil_activity_groups_noindex']) ;
	update_option('bp_seo_profil_activity_groups', $profil_activity_groups);	
	
	// Profile Activity favorites 
    $profil_activity_favorites = array($_POST['profil_activity_favorites_title'],$_POST['profil_activity_favorites'],$_POST['profil_activity_favorites_tags'],$_POST['profil_activity_favorites_noindex']) ;
	update_option('bp_seo_profil_activity_favorites', $profil_activity_favorites);

	// Profile Activity mentions 
    $profil_activity_mentions = array($_POST['profil_activity_mentions_title'],$_POST['profil_activity_mentions'],$_POST['profil_activity_mentions_tags'],$_POST['profil_activity_mentions_noindex']) ;
	update_option('bp_seo_profil_activity_mentions', $profil_activity_mentions);
	
	
	
}

function seopress_save_buddypress_groups(){
    // Groups Home
    $groups_home = array($_POST['groups_home_title'],$_POST['groups_home'],$_POST['groups_home_tags'],$_POST['groups_home_noindex']) ;
	update_option('bp_seo_groups_home', $groups_home);	
	 // Groups Forum
    $groups_forum = array($_POST['groups_forum_title'],$_POST['groups_forum'],$_POST['groups_forum_tags'],$_POST['groups_forum_noindex']) ;
	update_option('bp_seo_groups_forum', $groups_forum);
    // Groups Forum Topic
    $groups_forum_topic = array($_POST['groups_forum_topic_title'],$_POST['groups_forum_topic'],$_POST['groups_forum_topic_tags'],$_POST['groups_forum_topic_noindex']) ;
	update_option('bp_seo_groups_forum_topic', $groups_forum_topic);
    // Groups Wire
    $groups_wire = array($_POST['groups_wire_title'],$_POST['groups_wire'],$_POST['groups_wire_tags'],$_POST['groups_wire_noindex']) ;
	update_option('bp_seo_groups_wire', $groups_wire);
    // Groups Members
    $groups_members = array($_POST['groups_members_title'],$_POST['groups_members'],$_POST['groups_members_tags'],$_POST['groups_members_noindex']) ;
	update_option('bp_seo_groups_members', $groups_members);
}

function seopress_save_buddypress_registration(){
	$bp_seo_registration = array($_POST['registration_title'],$_POST['registration'],$_POST['registration_tags'],$_POST['registration_noindex']) ;
	update_option('bp_seo_registration', $bp_seo_registration);	
}

function seopress_save_buddypress_components(){
	
	$componentspage_types = $_POST['componentspage-types'];
	$bp_seo_plugins = array(); 
		
	/*
	* Saving component configuration
	*/
	update_option( 'bp_seo_plugins' , $componentspage_types );
	
	/*
	* Saving components
	*/
	$main_comp_slugs = $_POST['main_comp_slug'];
	$sub_comp_slugs = $_POST['sub_comp_slug'];
	
	$i = 0;
	
	if( is_array( $main_comp_slugs ) ){
	
		foreach($main_comp_slugs as $main_comp_slug){
		
			$bp_seo_tmp = array();
			
			if( $sub_comp_slugs[$i] == "" ) { // If is plugin main page
			
				$title = $main_comp_slug . '_title';
				if( isset( $_POST[$title] ) ) $bp_seo_tmp[0] = $_POST[$title];
				
				$desc = $main_comp_slug . '_desc';
				if( isset( $_POST[$desc] ) ) $bp_seo_tmp[1] .= $_POST[$desc];
				     
				$tag = $main_comp_slug . '_tags';
				if ( isset( $_POST[$tag] ) ) $bp_seo_tmp[2] .= $_POST[$tag];
				
				$noindex = $main_comp_slug . '_noindex';
				if( isset( $_POST[$noindex] ) ) $bp_seo_tmp[3] .= $_POST[$noindex];
			
				// Updating
				$option_name = 'bp_seo_' . $main_comp_slug;
				update_option( $option_name, $bp_seo_tmp );
				
			} else {

				$title = $main_comp_slug  . '_' . $sub_comp_slugs[$i] .'_title';
				if( isset( $_POST[$title] ) ) $bp_seo_tmp[0] = $_POST[$title];
				
				$desc = $main_comp_slug . '_' . $sub_comp_slugs[$i] .'_desc';
				if( isset( $_POST[$desc] ) ) $bp_seo_tmp[1] .= $_POST[$desc];
				     
				$tag = $main_comp_slug . '_'. $sub_comp_slugs[$i] .'_tags';
				if ( isset( $_POST[$tag] ) ) $bp_seo_tmp[2] .= $_POST[$tag];
				
				$noindex = $main_comp_slug . '_' . $sub_comp_slugs[$i] .'_noindex';
				if( isset( $_POST[$noindex] ) ) $bp_seo_tmp[3] .= $_POST[$noindex];
				
				// Updating
				$option_name = 'bp_seo_'.$main_comp_slug.'_'.$sub_comp_slugs[$i];
				update_option( $option_name , $bp_seo_tmp );
				
				
			}

			/*
			echo "Main: " .  $main_comp_slug."<br>";
			echo "Sub: " .  $sub_comp_slugs[$i]."<br>";
			echo "Title: " .  $title . " : " . $_POST[$title] . "<br>";
			echo "Description: " .  $desc . " : " . $_POST[$desc] . "<br>";
			echo "Keywords: " .  $tag . " : " . $_POST[$tag] .  "<br>";
			echo "Option name: " . $option_name . "<br>";
			
			print_r_html( $bp_seo_tmp );
			*/
			
			$i++;
		}
	}
}

?>