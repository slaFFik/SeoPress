<?php
/*
Plugin Name: SeoPress
Plugin URI: http://themekraft.com/plugin/seopress/
Description: Seo for Wordpress, Wordpress MU and Buddypress
Author: Sven Lehnert, Sven Wagener
Author URI: http://themekraft.com/
License: GNU GENERAL PUBLIC LICENSE 3.0 http://www.gnu.org/licenses/gpl.txt
Version: 1.0.5
Text Domain: bp_seo
Site Wide Only: false
*/
//
// Released under the GPL license
// http://www.gnu.org/licenses/gpl.txt
//
// This is an add-on for WordPress Single, MU and Buddypress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

global $blog_id, $meta, $docroot;

## Add functions
include("functions.inc.php");
include("meta.inc.php");
include("special-tags.inc.php");

## Admin pages
include("admin/general.inc.php");
include("admin/plugins.inc.php");
include("admin/main.inc.php");
include("admin/single-metabox.php");
include("admin/settings.inc.php");
include("admin/get-pro.inc.php");

## Check if is pro version

function is_pro(){
	$is_pro = false;
	if (file_exists(dirname(__FILE__)."/pro.inc.php")){
		$is_pro = true;	
	}	
	return $is_pro;
}

if(is_pro()){
	include("pro.inc.php");
}

## Buddypress init function
function bp_seo_init() {
	global $blog_id;
	
	if(defined('SITE_ID_CURRENT_SITE')){
	    if($blog_id != SITE_ID_CURRENT_SITE){
	      	add_action('wp_head', 'bp_seo_meta',1);
	      	add_filter('wp_title', 'bp_seo_mu',0);
	    } else {
	      	add_action('wp_head', 'bp_seo_meta',1);
	      	add_filter('bp_page_title', 'bp_seo',0);
	    }
	} else {
   	add_action('wp_head', 'bp_seo_meta',1);
	add_filter('bp_page_title', 'bp_seo',0);
  	}
}


## check if Buddypress is installed. If not, check if mu or single Wordpress
if(defined('BP_VERSION')){
	add_action('bp_init','bp_seo_init');	
} else {
	if(defined('SITE_ID_CURRENT_SITE')){
    if($blog_id != SITE_ID_CURRENT_SITE){
      	add_action('wp_head','bp_seo_meta',1);
      	add_filter('wp_title','bp_seo_mu',0);
    }else{
      	add_action('wp_head','bp_seo_meta',1);
      	add_filter('wp_title','wp_seo',0);
    }
    } else {
      add_action('wp_head','bp_seo_meta',1);
      add_filter('wp_title','wp_seo',0);
    }
}

## All add actions
if(get_option('bp_seo_meta_box_post') != true){
	add_action('edit_form_advanced', 'seo4all_metabox');
}
if(get_option('bp_seo_meta_box_page') != true){
	add_action('edit_page_form', 'seo4all_metabox');
}
add_action('admin_menu', 'bp_seo_admin_menu');
add_action('admin_head','seopress_css');  
add_action('init', 'seopress_js');
add_action('save_post','post_seo4all_title');
add_action('save_post','post_seo4all_description');
add_action('save_post','post_seo4all_keywords');
add_action('save_post','post_seo4all_noindex');

## load the text domain
$plugin_dir = basename(dirname(__FILE__))."/lang/";
load_plugin_textdomain( 'seopress', 'wp-content/plugins/' . $plugin_dir, $plugin_dir );

## create the menu item
function bp_seo_admin_menu() {
	global $blog_id;
	if(!current_user_can('level_10')){ 
		return false;
	} else {
		if(defined('SITE_ID_CURRENT_SITE')){	
	  		if($blog_id != SITE_ID_CURRENT_SITE){
	    		return false;
	   		}
		}
	}

	if(defined('BP_VERSION')){
		add_menu_page(__('SeoPress'),__('SeoPress'), 'manage_options', 'seomenue', 'bp_seo_main_page');
		add_submenu_page( 'seomenue', __( 'General Seo', 'bp-seo'),__( 'General Seo', 'bp-seo' ), 'manage_options', 'bp_seo_general_page', 'bp_seo_general_page' );
		add_submenu_page( 'seomenue', __( 'Plugins Seo', 'bp-seo'), __( 'Plugins Seo', 'bp-seo' ), 'manage_options', 'bp_seo_plugins', 'bp_seo_plugins_page' );
	} else {
		add_menu_page(__('SeoPress'),__('SeoPress'), 'manage_options', 'seomenue', 'bp_seo_main_page');
		add_submenu_page( 'seomenue', __( 'General Seo', 'bp-seo'),__( 'General Seo', 'bp-seo' ), 'manage_options', 'bp_seo_general_page', 'bp_seo_general_page' );
	
	}
}

### add css for the option page
function seopress_css() {
	global $docroot;

	echo '<link rel="stylesheet" href="'.get_bloginfo('url').'/'.PLUGINDIR.'/seopress/css/tabcontent.css" type="text/css" media="screen" />';
	
    if( $_GET['page'] == 'seomenue' || $_GET['page'] == 'bp_seo_general_page'  || $_GET['page'] == 'bp_seo_plugins'  ) {
		echo '<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css" rel="stylesheet" />';
	}
}

### enqueue js for the option page
function seopress_js() {

    if( ! isset( $_GET['page'] ) )
        return;

    if( $_GET['page'] == 'seomenue' || $_GET['page'] == 'bp_seo_general_page'  || $_GET['page'] == 'bp_seo_plugins'  ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
    }
    
}
 ?>