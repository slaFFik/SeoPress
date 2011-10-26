<?php 

function sp_rewrite_values_to_1_1( $old_option, $page_type ){
	
	$special_tag_change[ '%%sitename%%' ] = '%%site_name%%';
	$special_tag_change[ '%%sitedescription%%' ] = '%%site_description%%';	
	
	if( $page_type == 'wp-post' || $page_type == 'mu-post' ){
		$special_tag_change[ '%%title%%' ] = '%%post_title%%';
		$special_tag_change[ '%%excerpt%%' ] = '%%post_excerpt%%';
		$special_tag_change[ '%%category%%' ] = '%%post_categories%%';
		$special_tag_change[ '%%tag%%' ] = '%%post_tags%%';	
	}
	if( $page_type == 'wp-page' ||  $page_type == 'mu-page' ){
		$special_tag_change[ '%%title%%' ] = '%%page_title%%';
		$special_tag_change[ '%%excerpt%%' ] = '%%page_auto_excerpt%%';
		$special_tag_change[ '%%author%%' ] = '%%page_author%%';
	}
	if( $page_type == 'wp-archive' ||  $page_type == 'mu-archive' ){
		$special_tag_change[ '%%title%%' ] = '%%archive_date%%';
		$special_tag_change[ '%%archivedate%%' ] = '%%archive_date%%';
		$special_tag_change[ '%%date%%' ] = '%%archive_date%%';
		$special_tag_change[ '%%pagenumber%%' ] = '%%page%%';	
	}	
	if( $page_type == 'wp-category' ||  $page_type == 'mu-category' ){
		$special_tag_change[ '%%title%%' ] = '%%category%%';
		$special_tag_change[ '%%excerpt%%' ] = '%%category_description%%';
		$special_tag_change[ '%%pagenumber%%' ] = '%%page%%';
	}
	if( $page_type == 'wp-tag' ||  $page_type == 'mu-tag' ){
		$special_tag_change[ '%%title%%' ] = '%%tag%%';
		$special_tag_change[ '%%excerpt%%' ] = '%%tag_description%%';
		$special_tag_change[ '%%pagenumber%%' ] = '%%page%%';
	}
	if( $page_type == 'wp-author' ||  $page_type == 'mu-author' ){
		$special_tag_change[ '%%title%%' ] = '%%author%%';
	}
	if( $page_type == 'wp-search' ||  $page_type == 'mu-search' ){
		$special_tag_change[ '%%searchphrase%%' ] = '%%search_phrase%%';
	}

	if( $page_type == 'wp-search'){
		$special_tag_change[ '%%searchphrase%%' ] = '%%search_phrase%%';
	}
	
	$special_tag_change[ '%%componentname%%' ] = '%%component_name%%';
	
	$special_tag_change[ '%%forumtopictitle%%' ] = '%%forum_topic_title%%';
	$special_tag_change[ '%%forumtopictext%%' ] = '%%forum_topic_text%%';
	$special_tag_change[ '%%forumtopicpostername%%' ] = '%%forum_topic_author%%';
	
	$special_tag_change[ '%%usernicename%%' ] = '%%username%%';	
	$special_tag_change[ '%%displayname%%' ] = '%%username%%';	
	$special_tag_change[ '%%fullname%%' ] = '%%username%%';
	$special_tag_change[ '%%userfullname%%' ] = '%%username%%';	
	
	$special_tag_change[ '%%groupname%%' ] = '%%group%%';
	$special_tag_change[ '%%groupdescription%%' ] = '%%group_description%%';	
	
	$meta = get_blog_option( SITE_ID_CURRENT_SITE , $old_option );
	
	foreach($special_tag_change AS $key => $value ){
		$meta[0] = str_replace( $key , $value , $meta[0]  );
		$meta[1] = str_replace( $key , $value , $meta[1]  );
		$meta[2] = str_replace( $key , $value , $meta[2]  );
	}
	
	// print_r_html( $meta );
			
	$values[ $page_type . '-title' ] = $meta[0];
	$values[ $page_type . '-description'] = $meta[1];
	$values[ $page_type . '-keywords'] = $meta[2];
	if( $meta[3] == 0 ){
		$meta[3] = '';
	}else{
		$meta[3] = TRUE;
	}
	$values[ $page_type . '-noindex'] = $meta[3];
	
	// delete_blog_option( SITE_ID_CURRENT_SITE , $old_option );		
	
	return $values;
}

function sp_update_to_1_1(){
	global $seopress;
	
	if( get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_seo_settings_values' ) == '' || $_GET['reupdate_seopress'] == 'true' ){
		
		$settings['seopress_seo_settings_values'] = array();

		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_start', 'wp-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_posts', 'wp-post' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_pages', 'wp-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_archiv', 'wp-archive' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_cat', 'wp-category' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_tag_pages', 'wp-tag' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_autor_pages', 'wp-author' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_search_pages', 'wp-search' ) );
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog', 'mu-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_posts', 'mu-post' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_pages', 'mu-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_archiv', 'mu-archive' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_cat', 'mu-category' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_autor_pages', 'mu-author' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_search_pages', 'mu-search' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_tag_pages', 'mu-tag' ) );
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_activity', 'bp-component-activity' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_members', 'bp-component-members' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_groups', 'bp-component-groups' ) ); // WHAAAAAAT ???
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_forums', 'bp-component-forums' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_blogs', 'bp-component-blogs' ) );
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_friends', 'bp-component-activity-friends' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_groups', 'bp-component-activity-groups' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_favorites', 'bp-component-activity-favorites' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_mentions', 'bp-component-activity-mentions'  ));

		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity', 'bp-component-activity-just-me' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil', 'bp-component-profile-public' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_blogs', 'bp-component-blogs-my-blogs' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_friends', 'bp-component-friends-my-friends' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_groups', 'bp-component-groups-my-groups' ) );	
		
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_home', 'bp-component-groups-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_forum', 'bp-component-groups-forum' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_forum_topic', 'bp-component-groups-forum-topic' ) );		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_members', 'bp-component-groups-members' ) );
		
	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_registration', 'bp-component-register' ) );		

		$settings['seopress_options_values']['post_metabox'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_post' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_post' );	
		$settings['seopress_options_values']['page_metabox'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_page' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_page' );	
		
		$settings['seopress_options_values']['title_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metatitle_length' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metatitle_length' );	
		$settings['seopress_options_values']['meta_description_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metadesc_length' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metadesc_length' );	
		$settings['seopress_options_values']['meta_description_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
		
		// print_r_html( $settings );

		update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_seo_settings_values' , $settings['seopress_seo_settings_values'] );
		update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_options_values' , $settings['seopress_options_values'] );
		
		
		// Doing posts and page config
		$post_types = array();
		
		$post_types[] = 'post';
		$post_types[] = 'page';
		
		global $wpdb;
    	$blogs = $wpdb->get_results("SELECT blog_id FROM " . $wpdb->blogs, ARRAY_A );
    	
    	if( count( $blogs ) > 0 ){
		
	    	foreach($blogs AS $blog){
	
	    		switch_to_blog( $blog['blog_id'] );
	    		
				foreach ( $post_types AS $post_type ){
				
					$posts = get_posts( 'numberposts=-1&post_type=' . $post_type );
				
					foreach($posts as $post){
						$new_value = ''; 
						
						$title = get_post_meta( $post->ID, '_title', TRUE );
						$description = get_post_meta( $post->ID, '_description', TRUE );
						$keywords = get_post_meta( $post->ID, '_keywords', TRUE );
						$noindex = get_post_meta( $post->ID, '_noindex', TRUE );
						
						$new_value['title'] = $title;
						$new_value['description'] = $description;
						$new_value['keywords'] = $keywords;
						
						if( $noindex == 0 ){
							$noindex = '';
						}else{
							$noindex = TRUE;
						}
														
						$new_value['noindex'] = $noindex;
						
						
						// echo 'Blog ID: ' . $blog['blog_id'] . "<br />";
						// echo 'Post ID: ' . $post->ID . "<br />";;
						
						// print_r_html( $new_value );

						
						update_post_meta($post->ID, 'sp_post_metabox' , $new_value );
					}
				}
				
				restore_current_blog();
	    	}	
		}else{
			foreach ( $post_types AS $post_type ){
				
				$posts = get_posts( 'numberposts=-1&post_type=' . $post_type );
			
				foreach($posts as $post){
					$new_value = ''; 
					
					$title = get_post_meta( $post->ID, '_title', TRUE );
					$description = get_post_meta( $post->ID, '_description', TRUE );
					$keywords = get_post_meta( $post->ID, '_keywords', TRUE );
					$noindex = get_post_meta( $post->ID, '_noindex', TRUE );
					
					$new_value['title'] = $title;
					$new_value['description'] = $description;
					$new_value['keywords'] = $keywords;
					
					if( $noindex == 0 ){
						$noindex = '';
					}else{
						$noindex = TRUE;
					}
													
					$new_value['noindex'] = $noindex;
					
					
					// echo 'Wordpress Blog:<br />';
					// echo 'Post ID: ' . $post->ID . "<br />";;
					
					// print_r_html( $new_value );
					
					update_post_meta($post->ID, 'sp_post_metabox' , $new_value );
				}
			}
		}
		
	}
}

add_action( 'init', 'sp_update_to_1_1', 0);

?>