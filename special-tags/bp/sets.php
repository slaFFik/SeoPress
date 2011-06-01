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
	sp_add_special_tag( 'bp_user' , '%%userdisplayname%%', 'sp_get_bp_user_display_name', __( 'Shows the users full name' , 'seopress') );
	
	/*
	* Buddypress forums
	*/
	// sp_add_special_tag( 'bp_forum' , '%%forumname%%', 'sp_get_bp_group_name', __( 'Shows the forum name' , 'seopress') ); // Has it a name ???
	
	sp_add_special_tag( 'bp_forum_topic' , '%%forumtopictitle%%', 'sp_get_bp_forum_topic_title', __( 'Shows the forum topic title' , 'seopress') );
	sp_add_special_tag( 'bp_forum_topic' , '%%forumtopictext%%', 'sp_get_bp_forum_post_text', __( 'Shows the forum topic text' , 'seopress') );
	sp_add_special_tag( 'bp_forum_topic' , '%%forumtopicpostername%%', 'sp_get_bp_forum_topic_poster_name', __( 'Shows the forum topic poster name' , 'seopress') );
	
}

?>