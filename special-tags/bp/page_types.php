<?php 

function sp_init_bp_special_tags_pt(){
	global $seopress_special_tags;
	
	// Buddypress activity directory

	sp_add_special_tag_page_type( 'bp-component-groups' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_directory_groups' );
	sp_add_special_tag_page_type( 'bp-component-groups-home' , array( 'bp_group', 'bp_component' , 'global' ) , 'bp_seo_groups_home' );
	sp_add_special_tag_page_type( 'bp-component-groups-forum' , array( 'bp_component' , 'global' ) , 'bp_seo_groups_forum' );
	sp_add_special_tag_page_type( 'bp-component-groups-forum-topic' , array( 'bp_component' , 'global' ) , 'bp_seo_groups_forum_topic' );
	sp_add_special_tag_page_type( 'bp-component-groups-members' , array( 'bp_component' , 'global' ) , 'bp_seo_groups_members' );
	
	sp_add_special_tag_page_type( 'bp-component-members' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_members' );

	sp_add_special_tag_page_type( 'bp-component-activity' ,  array( 'bp_component' , 'global' ) , 'bp_seo_directory_activity' );	
	sp_add_special_tag_page_type( 'bp-component-activity-just-me' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity' );
	sp_add_special_tag_page_type( 'bp-component-activity-friends' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_friends' );
	sp_add_special_tag_page_type( 'bp-component-activity-groups' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_groups' );
	sp_add_special_tag_page_type( 'bp-component-activity-favorites' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_favorites' );
	sp_add_special_tag_page_type( 'bp-component-activity-mentions' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil_activity_mentions' );
	
	sp_add_special_tag_page_type( 'bp-component-profile-public' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil' );
	sp_add_special_tag_page_type( 'bp-component-profile-public' ,  array( 'bp_user', 'bp_component' , 'global' ) , 'bp_seo_profil' );
	
	sp_add_special_tag_page_type( 'bp-component-forums' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_forums' );
	sp_add_special_tag_page_type( 'bp-component-blogs' , array( 'bp_component' , 'global' ) , 'bp_seo_directory_blogs' );
	
	// Buddypress - All other unknown components
	$seopress_special_tags['page-types']['bp-component-unknown']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
	// $seopress_special_tags['page-types']['bp-component-unknown']['option-name'] = '';
	
	// print_r($seopress_special_tags);
}

?>