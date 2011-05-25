<?php

global $seopress_special_tags;
global $seopress_used_special_tags;

$seopress_special_tags = array();

/*
* Universal variables
*/
$seopress_special_tags['specialtag-set']['global']['%%sitename%%']['function'] = 'sp_get_sitename';
$seopress_special_tags['specialtag-set']['global']['%%sitename%%']['description'] = __( 'Shows the sitename' , 'seopress');

/*
* Post & Page variables
*/
$seopress_special_tags['specialtag-set']['post']['%%title%%']['function'] = 'sp_get_post_title';
$seopress_special_tags['specialtag-set']['post']['%%title%%']['description'] = __( 'Shows the title of post' , 'seopress');	

$seopress_special_tags['specialtag-set']['post']['%%excerpt%%']['function'] = 'sp_get_post_excerpt';
$seopress_special_tags['specialtag-set']['post']['%%excerpt%%']['description'] = __( 'Shows the excerpt of the post' , 'seopress');

$seopress_special_tags['specialtag-set']['post']['%%categories%%']['function'] = 'sp_get_categories_listing'; // NEW PLS ADD FUNCTION
$seopress_special_tags['specialtag-set']['post']['%%categories%%']['description'] = __( 'Shows the username of post author' , 'seopress');		

$seopress_special_tags['specialtag-set']['post']['%%tags%%']['function'] = 'sp_get_tags_listing'; // NEW PLS ADD FUNCTION
$seopress_special_tags['specialtag-set']['post']['%%tags%%']['description'] = __( 'Shows the username of post author' , 'seopress');		

$seopress_special_tags['specialtag-set']['post']['%%author%%']['function'] = 'sp_get_post_username'; // ISN'T IT AUTHOR ?
$seopress_special_tags['specialtag-set']['post']['%%author%%']['description'] = __( 'Shows the username of post author' , 'seopress');

$seopress_special_tags['specialtag-set']['post']['%%date%%']['function'] = 'sp_get_date';
$seopress_special_tags['specialtag-set']['post']['%%date%%']['description'] = __( 'Shows the date of post' , 'seopress');

$seopress_special_tags['specialtag-set']['post']['%%modified%%']['function'] = 'sp_get_post_modified';
$seopress_special_tags['specialtag-set']['post']['%%modified%%']['description'] = __( 'Shows the  modifying date of the post' , 'seopress');

/*
* Archive page variables
*/
$seopress_special_tags['specialtag-set']['archive']['%%date%%']['function'] = 'sp_get_archive_date';
$seopress_special_tags['specialtag-set']['archive']['%%date%%']['description'] = __( 'Shows the archive date' , 'seopress');

/*
* Category page variables
*/
$seopress_special_tags['specialtag-set']['category']['%%name%%']['function'] = 'sp_get_category_name';
$seopress_special_tags['specialtag-set']['category']['%%name%%']['description'] = __( 'Shows the category name' , 'seopress');

$seopress_special_tags['specialtag-set']['category']['%%description%%']['function'] = 'sp_get_category_description';
$seopress_special_tags['specialtag-set']['category']['%%description%%']['description'] = __( 'Shows the category description' , 'seopress');

/*
$seopress_special_tags['specialtag-set']['categories_in_listings']['%%categories%%']['function'] = 'sp_get_categories_listing';
$seopress_special_tags['specialtag-set']['categories_in_listings']['%%categories%%']['description'] = __( 'Shows a comma separated list of categories in list view' , 'seopress');
*/

/*
* Tag page variables
*/
$seopress_special_tags['specialtag-set']['tag']['%%name%%']['function'] = 'sp_get_tag_name';
$seopress_special_tags['specialtag-set']['tag']['%%name%%']['description'] = __( 'Shows the tag name' , 'seopress');

$seopress_special_tags['specialtag-set']['tag']['%%description%%']['function'] = 'sp_get_tag_description';
$seopress_special_tags['specialtag-set']['tag']['%%description%%']['description'] = __( 'Shows the tag description' , 'seopress');  
/*
$seopress_special_tags['specialtag-set']['tags_in_listings']['%%tags%%']['function'] = 'sp_get_tags_listing';
$seopress_special_tags['specialtag-set']['tags_in_listings']['%%tags%%']['description'] = __( 'Shows a comma separated list of tags in list view' , 'seopress');
*/


/*
* Author page variables
*/
$seopress_special_tags['specialtag-set']['author']['%%author_username%%']['function'] = 'sp_get_author_username';
$seopress_special_tags['specialtag-set']['author']['%%author_username%%']['description'] = __( 'Shows the name of the author' , 'seopress');

/*
* Term variables
*/
/*
$seopress_special_tags['specialtag-set']['term']['%%termtitle%%']['function'] = 'sp_get_term_title'; // Not consistent -> see @ tag section
$seopress_special_tags['specialtag-set']['term']['%%termtitle%%']['description'] = __( 'Shows the term title' , 'seopress');

$seopress_special_tags['specialtag-set']['term']['%%term_description%%']['function'] = 'sp_get_term_description';
$seopress_special_tags['specialtag-set']['term']['%%term_description%%']['description'] = __( 'Shows the term description' , 'seopress');  
*/
/*
* Pagination variables
*/
$seopress_special_tags['specialtag-set']['pagination']['%%pagination%%']['function'] = 'sp_get_page';
$seopress_special_tags['specialtag-set']['pagination']['%%pagination%%']['description'] = __( 'Shows the full Pagination' , 'seopress');

$seopress_special_tags['specialtag-set']['pagination']['%%pagenumber%%']['function'] = 'sp_get_page_number'; // Not consistent -> have to be %%page_number%%
$seopress_special_tags['specialtag-set']['pagination']['%%pagenumber%%']['description'] = __( 'Shows the page number' , 'seopress');

$seopress_special_tags['specialtag-set']['pagination']['%%pagetotal%%']['function'] = 'sp_get_page_total'; // Not consistent -> have to be %%page_total%%
$seopress_special_tags['specialtag-set']['pagination']['%%pagetotal%%']['description'] = __( 'Shows the sum of all pages' , 'seopress');

/*
* Search page variables
*/
$seopress_special_tags['specialtag-set']['search']['%%searchphrase%%']['function'] = 'sp_get_search_phrase';
$seopress_special_tags['specialtag-set']['search']['%%searchphrase%%']['description'] = __( 'Shows the search phrase' , 'seopress');

/*
* Buddypress components
*/
$seopress_special_tags['specialtag-set']['bp_component']['%%componentname%%']['function'] = 'sp_get_bp_component_name';
$seopress_special_tags['specialtag-set']['bp_component']['%%componentname%%']['description'] = __( 'Shows the component name' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_component']['%%componentdescription%%']['function'] = 'sp_get_bp_component_description';
$seopress_special_tags['specialtag-set']['bp_component']['%%componentdescription%%']['description'] = __( 'Shows the component description' , 'seopress');	

$seopress_special_tags['specialtag-set']['bp_component']['%%componentstatus%%']['function'] = 'sp_get_bp_component_name';
$seopress_special_tags['specialtag-set']['bp_component']['%%componentstatus%%']['description'] = __( 'Shows the component status' , 'seopress');	

$seopress_special_tags['specialtag-set']['bp_component']['%%componentlastactivity%%']['function'] = 'sp_get_bp_component_last_activity';
$seopress_special_tags['specialtag-set']['bp_component']['%%componentlastactivity%%']['description'] = __( 'Shows the last activity of component' , 'seopress');	

/*
* Buddypress users
*/

$seopress_special_tags['specialtag-set']['bp_user']['%%userfullname%%']['function'] = 'sp_get_bp_user_fullname';
$seopress_special_tags['specialtag-set']['bp_user']['%%userfullname%%']['description'] = __( 'Shows the users fullname' , 'seopress');	

$seopress_special_tags['specialtag-set']['bp_user']['%%usernicename%%']['function'] = 'sp_get_bp_user_nicename';
$seopress_special_tags['specialtag-set']['bp_user']['%%usernicename%%']['description'] = __( 'Shows the user nicename' , 'seopress');	

$seopress_special_tags['specialtag-set']['bp_user']['%%userdisplayname%%']['function'] = 'sp_get_bp_user_display_name';
$seopress_special_tags['specialtag-set']['bp_user']['%%userdisplayname%%']['description'] = __( 'Shows the users displayname' , 'seopress');	

/*
* Buddypress forums
*/
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtitle%%']['function'] = 'sp_get_bp_forum_topic_title';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtitle%%']['description'] = __( 'Shows the forum topic title' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopictitle%%']['function'] = 'sp_get_bp_forum_topic_title';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopictitle%%']['description'] = __( 'Shows the forum topic title' , 'seopress');

// $seopress_special_tags['bp_forum']['%%forumtopictext%%']['function'] = 'sp_get_bp_forum_post_text';
// $seopress_special_tags['bp_forum']['%%forumtopictext%%']['description'] = __( 'Forum topic last poster name' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopicpostername%%']['function'] = 'sp_get_bp_forum_topic_poster_name';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopicpostername%%']['description'] = __( 'Shows the forum topic poster name' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopiclastpostername%%']['function'] = 'sp_get_bp_forum_topic_poster_name';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopiclastpostername%%']['description'] = __( 'Shows the forum topic last poster name' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopicstarttime%%']['function'] = 'sp_get_bp_forum_topic_start_time';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopicstarttime%%']['description'] = __( 'Shows the forum topic start time' , 'seopress');

$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopictime%%']['function'] = 'sp_get_bp_forum_topic_time';
$seopress_special_tags['specialtag-set']['bp_forum']['%%forumtopictime%%']['description'] = __( 'Shows the forum topic time' , 'seopress');

?>