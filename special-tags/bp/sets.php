<?php


function sp_init_bp_special_tags(){
	global $special_tags;
	
	/*
	* Buddypress components
	*/
	
	$special_tags->add_tag( '%%componentname%%', 'sp_get_bp_current_component', __( 'Shows the component name' , 'seopress') );
	
	$special_tags->add_set( 'bp_component', array( '%%componentname%%' ) );
	
	/*
	* Buddypress groups
	*/
	$special_tags->add_tag( '%%groupname%%', 'sp_get_bp_group_name', __( 'Shows the group name' , 'seopress') );
	$special_tags->add_tag( '%%groupdescription%%', 'sp_get_bp_group_description', __( 'Shows the group description' , 'seopress') );
	
	$special_tags->add_set( 'bp_group', array( '%%groupname%%', '%%groupdescription%%' ) );
	
	/*
	* Buddypress users
	*/
	$special_tags->add_tag( '%%userfullname%%', 'sp_get_bp_user_fullname', __( 'Shows the users fullname' , 'seopress') );
	$special_tags->add_tag( '%%usernicename%%', 'sp_get_bp_user_nicename', __( 'Shows the user nicename' , 'seopress') );
	$special_tags->add_tag( '%%userdisplayname%%', 'sp_get_bp_user_display_name', __( 'Shows the users full name' , 'seopress') );
	
	$special_tags->add_set( 'bp_user', array( '%%userfullname%%', '%%usernicename%%', '%%userdisplayname%%'  ) );
	
	/*
	* Buddypress forums
	*/
	// sp_add_special_tag( 'bp_forum' , '%%forumname%%', 'sp_get_bp_group_name', __( 'Shows the forum name' , 'seopress') ); // Has it a name ???
	
	$special_tags->add_tag( '%%forumtopictitle%%', 'sp_get_bp_forum_topic_title', __( 'Shows the forum topic title' , 'seopress') );
	$special_tags->add_tag( '%%forumtopictext%%', 'sp_get_bp_forum_post_text', __( 'Shows the forum topic text' , 'seopress') );
	$special_tags->add_tag( '%%forumtopicpostername%%', 'sp_get_bp_forum_topic_poster_name', __( 'Shows the forum topic poster name' , 'seopress') );
	
	$special_tags->add_set( 'bp_forum_topic', array( '%%forumtopictitle%%', '%%forumtopictext%%', '%%forumtopicpostername%%'  ) );
	
}

?>