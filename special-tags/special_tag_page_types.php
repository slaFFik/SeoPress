<?php 

/*
* Page types
*/
$seopress_special_tags['page-types']['global']['specialtag-sets'] = array( 'global' );

// Wordpress
$seopress_special_tags['page-types']['wp-home']['specialtag-sets'] = array( 'global' );
$seopress_special_tags['page-types']['wp-home']['option-name'] = 'bp_seo_main_blog_start';

$seopress_special_tags['page-types']['wp-front-page']['specialtag-sets'] = array( 'global' );
$seopress_special_tags['page-types']['wp-front-page']['option-name'] = 'bp_seo_main_blog_start';

$seopress_special_tags['page-types']['wp-post']['specialtag-sets'] = array( 'post', 'global' );
$seopress_special_tags['page-types']['wp-post']['option-name'] = 'bp_seo_main_blog_posts';

$seopress_special_tags['page-types']['wp-page']['specialtag-sets'] = array( 'post', 'global' );
$seopress_special_tags['page-types']['wp-page']['option-name'] = 'bp_seo_main_blog_pages';

$seopress_special_tags['page-types']['wp-archive']['specialtag-sets'] = array( 'archive', 'global' );
$seopress_special_tags['page-types']['wp-archive']['option-name'] = 'bp_seo_main_blog_archiv';

$seopress_special_tags['page-types']['wp-category']['specialtag-sets'] = array( 'category', 'global' );
$seopress_special_tags['page-types']['wp-category']['option-name'] = 'bp_seo_main_blog_cat'; // ???

$seopress_special_tags['page-types']['wp-author']['specialtag-sets'] = array( 'author', 'global' );
$seopress_special_tags['page-types']['wp-author']['option-name'] = 'bp_seo_main_blog_autor_pages';

$seopress_special_tags['page-types']['wp-search']['specialtag-sets'] = array( 'search', 'global' );
$seopress_special_tags['page-types']['wp-search']['option-name'] = 'bp_seo_main_blog_search_pages';

$seopress_special_tags['page-types']['wp-tag']['specialtag-sets'] = array( 'tag', 'global' );
$seopress_special_tags['page-types']['wp-tag']['option-name'] = 'bp_seo_main_blog_tag_pages';

// Nobody needs for SEO!
// $seopress_special_tags['page-types']['wp-404']['specialtag-sets'] = array( 'global' );
// $seopress_special_tags['page-types']['wp-404']['option-name'] = 'bp_seo_main_blog_404_pages';

// Wordpress network blog
$seopress_special_tags['page-types']['mu-home']['specialtag-sets'] = array( 'global' );
$seopress_special_tags['page-types']['mu-home']['option-name'] = 'bp_seo_user_blog';

$seopress_special_tags['page-types']['mu-post']['specialtag-sets'] = array( 'post', 'global' );
$seopress_special_tags['page-types']['mu-post']['option-name'] = 'bp_seo_user_blog_posts';

$seopress_special_tags['page-types']['mu-page']['specialtag-sets'] = array( 'post', 'global' );
$seopress_special_tags['page-types']['mu-page']['option-name'] = 'bp_seo_user_blog_pages';

$seopress_special_tags['page-types']['mu-archive']['specialtag-sets'] = array( 'archive', 'global' );
$seopress_special_tags['page-types']['mu-archive']['option-name'] = 'bp_seo_user_blog_archiv';

$seopress_special_tags['page-types']['mu-category']['specialtag-sets'] = array( 'category', 'global' );
$seopress_special_tags['page-types']['mu-category']['option-name'] = 'bp_seo_user_blog_cat';

$seopress_special_tags['page-types']['mu-author']['specialtag-sets'] = array( 'author', 'global' );
$seopress_special_tags['page-types']['mu-author']['option-name'] = 'bp_seo_user_blog_autor_pages';

$seopress_special_tags['page-types']['mu-search']['specialtag-sets'] = array( 'search', 'global' );
$seopress_special_tags['page-types']['mu-search']['option-name'] = 'bp_seo_user_blog_search_pages';

$seopress_special_tags['page-types']['mu-tag']['specialtag-sets'] = array( 'tag', 'global' );
$seopress_special_tags['page-types']['mu-tag']['option-name'] = 'bp_seo_user_blog_tag_pages';

// Buddypress activity directory
$seopress_special_tags['page-types']['bp-component-activity']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-activity']['option-name'] = 'bp_seo_directory_activity';


// Buddypress member directory
$seopress_special_tags['page-types']['bp-component-members']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-members']['option-name'] = 'bp_seo_directory_members';

// Buddypress groups directory
$seopress_special_tags['page-types']['bp-component-groups']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-groups']['option-name'] = 'bp_seo_directory_groups';

// Buddypress group pages
$seopress_special_tags['page-types']['bp-component-groups-home']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-groups-home']['option-name'] = 'bp_seo_groups_home';
// $seopress_special_tags['page-types']['bp-component-groups-admin']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
// $seopress_special_tags['page-types']['bp-component-groups-admin']['option-name'] = '';
$seopress_special_tags['page-types']['bp-component-groups-forum']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-groups-forum']['option-name'] = 'bp_seo_groups_forum';
$seopress_special_tags['page-types']['bp-component-groups-forum-topic']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-groups-forum-topic']['option-name'] = 'bp_seo_groups_forum_topic';
$seopress_special_tags['page-types']['bp-component-groups-members']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-groups-members']['option-name'] = 'bp_seo_groups_members';
// $seopress_special_tags['page-types']['bp-component-groups-send-invites']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
// $seopress_special_tags['page-types']['bp-component-groups-send-invites']['option-name'] = '';

// Buddypress forum directory
$seopress_special_tags['page-types']['bp-component-forums']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-forums']['option-name'] = 'bp_seo_directory_forums';

// Buddypress blog directory
$seopress_special_tags['page-types']['bp-component-blogs']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
$seopress_special_tags['page-types']['bp-component-blogs']['option-name'] = 'bp_seo_directory_blogs';

// Buddypress - All other unknown components
$seopress_special_tags['page-types']['bp-component-unknown']['specialtag-sets'] = array( 'bp_component' , 'global' ); 
// $seopress_special_tags['page-types']['bp-component-unknown']['option-name'] = '';

?>