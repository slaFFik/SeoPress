<?php
/**
 * Initializing variables for use in admin
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
global $bp;

$bp_seo_default_wp = Array('%%title%% | %%sitename%%','%%excerpt%% %%category_description%% %%tag_description%% %%term_description%%','%%tag%%, %%category%%');
$bp_seo_default_bp = Array('%%componentname%% | %%sitename%%','%%componentdescription%%','%%componentname%%');
$bp_seo_default_dirctory = Array('%%sitename%%','','');
$bp_seo_default_profile = Array('%%displayname%% | %%sitename%%','','%%usernicename%%,%%fullname%%');
$bp_seo_default_group_forum = Array('%%componentname%% %%forumtopictitle%% | %%sitename%% ','%%forumtopictext%%','%%forumtopicpostername%%');


if ( get_option( 'bp_seo_main_blog_start') != "" )	{	$main_blog_start = get_option('bp_seo_main_blog_start'); } else {$main_blog_start = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_front_page') != "" )	{	$main_blog_front_page = get_option('bp_seo_main_blog_front_page'); } else {$main_blog_front_page = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog') != "" )	{	$main_blog = get_option('bp_seo_main_blog'); } else {$main_blog = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_archiv') != "" )	{	$main_blog_archiv = get_option('bp_seo_main_blog_archiv'); } else {$main_blog_archiv = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_cat') != "" )	{	$main_blog_cat = get_option('bp_seo_main_blog_cat'); } else {$main_blog_cat = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_posts') != "" )	{	$main_blog_posts = get_option('bp_seo_main_blog_posts'); } else {$main_blog_posts = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_pages') != "" )	{	$main_blog_pages = get_option('bp_seo_main_blog_pages'); } else {$main_blog_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_search_pages') != "" )	{	$main_blog_search_pages = get_option('bp_seo_main_blog_search_pages'); } else {$main_blog_search_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_404_pages') != "" )	{	$main_blog_404_pages = get_option('bp_seo_main_blog_404_pages'); } else {$main_blog_404_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_tag_pages') != "" )	{	$main_blog_tag_pages = get_option('bp_seo_main_blog_tag_pages'); } else {$main_blog_tag_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_reg_pages') != "" )	{	$main_blog_reg_pages = get_option('bp_seo_main_blog_reg_pages'); } else {$main_blog_reg_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_main_blog_autor_pages') != "" )	{	$main_blog_autor_pages = get_option('bp_seo_main_blog_autor_pages'); } else {$main_blog_autor_pages = $bp_seo_default_wp; }

if ( get_option( 'bp_seo_user_blog') != "" )	{	$user_blog = get_option('bp_seo_user_blog'); } else {$user_blog = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_front_page') != "" )	{	$user_blog_front_page = get_option('bp_seo_user_blog_front_page'); } else {$user_blog_front_page = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_archiv') != "" )	{	$user_blog_archiv = get_option('bp_seo_user_blog_archiv'); } else {$user_blog_archiv = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_cat') != "" )	{	$user_blog_cat = get_option('bp_seo_user_blog_cat'); } else {$user_blog_cat = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_posts') != "" )	{	$user_blog_posts = get_option('bp_seo_user_blog_posts'); } else {$user_blog_cat = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_pages') != "" )	{	$user_blog_pages = get_option('bp_seo_user_blog_pages'); } else {$user_blog_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_search_pages') != "" )	{	$user_blog_search_pages = get_option('bp_seo_user_blog_search_pages'); } else {$user_blog_search_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_404_pages') != "" )	{	$user_blog_404_pages = get_option('bp_seo_user_blog_404_pages'); } else {$user_blog_404_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_tag_pages') != "" )	{	$user_blog_tag_pages = get_option('bp_seo_user_blog_tag_pages'); } else {$user_blog_tag_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_user_blog_autor_pages') != "" )	{	$user_blog_autor_pages = get_option('bp_seo_user_blog_autor_pages'); } else {$user_blog_autor_pages = $bp_seo_default_wp; }
if ( get_option( 'bp_seo_registration') != "" )	{	$bp_seo_registration = get_option('bp_seo_registration'); } else {$bp_seo_registration = $bp_seo_registration_default; }


//************ get the meta values for the option page
if ( get_option( 'bp_seo_directory_blogs') != "" )	{ $directory_blogs = get_option('bp_seo_directory_blogs'); } else {$directory_blogs = $bp_seo_default_dirctory; }
if ( get_option( 'bp_seo_directory_activity') != "" ) { $directory_activity = get_option('bp_seo_directory_activity'); }  else {$directory_activity = $bp_seo_default_dirctory; }
if ( get_option( 'bp_seo_directory_members') != "" ) {	$directory_members = get_option('bp_seo_directory_members'); } else {$directory_members = $bp_seo_default_dirctory; }
if ( get_option( 'bp_seo_directory_groups') != "" ) { $directory_groups = get_option('bp_seo_directory_groups'); } else {$directory_groups = $bp_seo_default_dirctory; }
if ( get_option( 'bp_seo_directory_forums') != "" ) {	$directory_forums = get_option('bp_seo_directory_forums'); } else {$directory_forums = $bp_seo_default_dirctory; }

if ( get_option( 'bp_seo_profil') != "" )	{	$profil = get_option('bp_seo_profil'); } else {$profil = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_blogs') != "" )	{	$profil_blogs = get_option('bp_seo_profil_blogs'); } else {$profil_blogs = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_blogs_recent_posts') != "" )	{	$profil_blogs_recent_posts = get_option('bp_seo_profil_blogs_recent_posts'); } else {$profil_blogs_recent_posts = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_blogs_recent_commments') != "" )	{	$profil_blogs_recent_commments = get_option('bp_seo_profil_blogs_recent_commments'); } else {$profil_blogs_recent_commments = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_wire') != "" )	{	$profil_wire = get_option('bp_seo_profil_wire'); } else {$profil_wire = $bp_seo_default_profile; }

if ( get_option( 'bp_seo_profil_activity') != "" )	{	$profil_activity = get_option('bp_seo_profil_activity'); } else {$profil_activity = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_activity_friends') != "" )	{	$profil_activity_friends = get_option('bp_seo_profil_activity_friends'); } else {$profil_activity_friends = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_activity_groups') != "" )	{	$profil_activity_groups = get_option('bp_seo_profil_activity_groups'); } else {$profil_activity_groups = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_activity_favorites') != "" )	{	$profil_activity_favorites = get_option('bp_seo_profil_activity_favorites'); } else {$profil_activity_favorites = $bp_seo_default_profile; }
if ( get_option( 'bp_seo_profil_activity_mentions') != "" )	{	$profil_activity_mentions = get_option('bp_seo_profil_activity_mentions'); } else {$profil_activity_mentions = $bp_seo_default_profile; }



if ( get_option( 'bp_seo_groups_home') != "" )	{	$groups_home = get_option('bp_seo_groups_home'); } else {$groups_home = $bp_seo_default_bp; }
if ( get_option( 'bp_seo_groups_forum') != "" )	{	$groups_forum = get_option('bp_seo_groups_forum'); } else {$groups_forum = $bp_seo_default_group_forum; }
if ( get_option( 'bp_seo_groups_forum_topic') != "" )	{	$groups_forum_topic = get_option('bp_seo_groups_forum_topic'); } else {$groups_forum_topic = $bp_seo_default_group_forum; }
if ( get_option( 'bp_seo_groups_wire') != "" )	{	$groups_wire = get_option('bp_seo_groups_wire'); } else {$groups_wire = $bp_seo_default_bp; }
if ( get_option( 'bp_seo_groups_members') != "" )	{	$groups_members = get_option('bp_seo_groups_members'); } else {$groups_members = $bp_seo_default_bp; }
if ( get_option( 'bp_seo_groups_home') != "" )	{	$groups_home = get_option('bp_seo_groups_home'); } else {$groups_home = $bp_seo_default_bp; }


?>