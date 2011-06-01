<?php 

function sp_init_bp_special_tags_pt(){
	global $seopress_special_tags;
	
	sp_add_special_tag_page_type( 'bp-component-activity' ,  array( 'bp_component' , 'global' ) , 'bp_seo_directory_activity' ); // Activity directory
	sp_add_special_tag_page_type( 'bp-component-activity-friends' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_friends' );
	sp_add_special_tag_page_type( 'bp-component-activity-groups' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_groups' );
	sp_add_special_tag_page_type( 'bp-component-activity-favorites' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_favorites' );
	sp_add_special_tag_page_type( 'bp-component-activity-mentions' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_mentions' );
	
	sp_add_special_tag_page_type( 'bp-component-members' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_members' );  // Members directory

	sp_add_special_tag_page_type( 'bp-component-groups' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_groups' ); // Group directory
	// sp_add_special_tag_page_type( 'bp-component-groups-admin' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_directory_groups' ); // Login required
	sp_add_special_tag_page_type( 'bp-component-groups-home' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_groups_home' );
	sp_add_special_tag_page_type( 'bp-component-groups-forum' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_groups_forum' );
	sp_add_special_tag_page_type( 'bp-component-groups-forum-topic' , array( 'bp_group', 'bp_forum_topic','bp_component' , 'global' ) , 'bp_seo_groups_forum_topic' );
	sp_add_special_tag_page_type( 'bp-component-groups-members' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_groups_members' );
	// sp_add_special_tag_page_type( 'bp-component-groups-send-invites' , array( 'bp_component' , 'global' ) , 'bp_seo_groups_members' ); Login required	
	
	// Profile
	sp_add_special_tag_page_type( 'bp-component-activity-just-me' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity' );	
	sp_add_special_tag_page_type( 'bp-component-profile-public' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil' );	
	sp_add_special_tag_page_type( 'bp-component-blogs-my-blogs' , array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_blogs' );
	sp_add_special_tag_page_type( 'bp-component-friends-my-friends' , array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_friends' );
	sp_add_special_tag_page_type( 'bp-component-groups-my-groups' , array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_groups' );
	
	sp_add_special_tag_page_type( 'bp-component-forums' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_forums' );
	
	sp_add_special_tag_page_type( 'bp-component-blogs' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_blogs' );
	
	sp_add_special_tag_page_type( 'bp-component-unknown' , array( 'bp_component' , 'global' ) );
	
}

?>