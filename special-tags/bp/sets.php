<?php


function sp_init_bp_special_tags(){
	global $special_tags;
	
	/*
	* Buddypress components
	*/
	
	$special_tags->add_tag( '%%component_name%%', 'sp_get_bp_current_component', __( 'Shows the component name' , 'seopress') );
	
	$special_tags->add_set( 'bp_component', array( '%%component_name%%' ) );
	
	/*
	* Buddypress activities
	*/
	$special_tags->add_tag( '%%activity_content%%', 'sp_get_bp_activity_content', __( 'Shows the content of the activity' , 'seopress') );
	$special_tags->add_tag( '%%activity_author%%', 'sp_get_bp_activity_author', __( 'Shows the author of the activity' , 'seopress') );
	
	$special_tags->add_set( 'bp_activity', array( '%%activity_content%%', '%%activity_author%%' ) );	
	
	/*
	* Buddypress groups
	*/
	$special_tags->add_tag( '%%group%%', 'sp_get_bp_group_name', __( 'Shows the group name' , 'seopress') );
	$special_tags->add_tag( '%%group_description%%', 'sp_get_bp_group_description', __( 'Shows the group description' , 'seopress') );
	
	$special_tags->add_set( 'bp_group', array( '%%group%%', '%%group_description%%' ) );
	
	/*
	* Buddypress users
	*/
	$special_tags->add_tag( '%%user_name%%', 'sp_get_bp_user_display_name', __( 'Shows name of the user' , 'seopress') );
	
	$special_tags->add_set( 'bp_user', array( '%%user_name%%' ) );
	
	/*
	* Buddypress forums
	*/
	// sp_add_special_tag( 'bp_forum' , '%%forumname%%', 'sp_get_bp_group_name', __( 'Shows the forum name' , 'seopress') ); // Has it a name ???
	
	$special_tags->add_tag( '%%forum_topic_title%%', 'sp_get_bp_forum_topic_title', __( 'Shows the forum topic title' , 'seopress') );
	$special_tags->add_tag( '%%forum_topic_text%%', 'sp_get_bp_forum_post_text', __( 'Shows the forum topic text' , 'seopress') );
	$special_tags->add_tag( '%%forum_topic_author%%', 'sp_get_bp_forum_topic_poster_name', __( 'Shows the forum topic poster name' , 'seopress') );
	
	$special_tags->add_set( 'bp_forum_topic', array( '%%forum_topic_title%%', '%%forum_topic_text%%', '%%forum_topic_author%%'  ) );
	
}

?>