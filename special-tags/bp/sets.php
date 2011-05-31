<?php


function sp_init_bp_special_tags(){
	/*
	* Buddypress components
	*/
	
	sp_add_special_tag( 'bp_component', '%%componentname%%', 'sp_get_bp_current_component', __( 'Shows the component name' , 'seopress') );
	
	/*
	* Buddypress groups
	*/
	sp_add_special_tag( 'bp_group' , '%%groupname%%', 'sp_get_bp_group_name', __( 'Shows the group name' , 'seopress') );
	sp_add_special_tag( 'bp_group' , '%%groupdescription%%', 'sp_get_bp_group_description', __( 'Shows the group description' , 'seopress') );
	
	/*
	* Buddypress users
	*/
	sp_add_special_tag( 'bp_user' , '%%userfullname%%', 'sp_get_bp_user_fullname', __( 'Shows the users fullname' , 'seopress') );
	sp_add_special_tag( 'bp_user' , '%%usernicename%%', 'sp_get_bp_user_nicename', __( 'Shows the user nicename' , 'seopress') );
	sp_add_special_tag( 'bp_user' , '%%userdisplayname%%', 'sp_get_bp_user_display_name', __( 'Shows the users displayname' , 'seopress') );
	
	/*
	* Buddypress forums
	*/
	sp_add_special_tag( 'bp_forum' , '%%forumtitle%%', 'sp_get_bp_forum_topic_title', __( 'Shows the forum title' , 'seopress') );
	sp_add_special_tag( 'bp_forum' , '%%forumtopictitle%%', 'sp_get_bp_forum_topic_title', __( 'Shows the forum topic title' , 'seopress') );
	sp_add_special_tag( 'bp_forum' , '%%forumtopicpostername%%', 'sp_get_bp_forum_topic_poster_name', __( 'Shows the forum topic poster name' , 'seopress') );
	sp_add_special_tag( 'bp_forum' , '%%forumtopiclastpostername%%', 'sp_get_bp_forum_topic_poster_name', __( 'Shows the forum topic last poster name' , 'seopress') );
	sp_add_special_tag( 'bp_forum' , '%%forumtopicstarttime%%', 'sp_get_bp_forum_topic_start_time', __( 'Shows the forum topic start time' , 'seopress') );
	sp_add_special_tag( 'bp_forum' , '%%forumtopictime%%', 'sp_get_bp_forum_topic_time', __( 'Shows the forum topic time' , 'seopress') );
}

?>