<?php
/*
Plugin Name: SeoPress
Plugin URI: http://themekraft.com/plugin/seopress/
Description: Seo for Wordpress, Wordpress MU and Buddypress
Author: Sven Lehnert, Sven Wagener
Author URI: http://themekraft.com/
License: GNU GENERAL PUBLIC LICENSE 3.0 http://www.gnu.org/licenses/gpl.txt
Version: 1.1
Text Domain: seopress
Site Wide Only: false
*/
//
// This is an add-on for WordPress Single, MU and Buddypress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

global $blog_id, $meta, $docroot, $seopress_plugin_url, $seopress_plugin_url, $wpdb;

$seopress_plugin_url = plugin_dir_url( __FILE__ );

// loading langauge engine
load_plugin_textdomain( 'seopress', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );

include( 'init.php' );

// Loading libraries
include( 'lib/io.inc.php' );
include( 'lib/wordpress/io.inc.php' );
include( 'lib/wordpress/wp.inc.php' );
include( 'lib/wordpress/wp_url.inc.php' );

// Loading css and js
include( 'css/loader.php' );
include( 'js/loader.php' );

include( 'functions.php' );
include( 'bp-functions.php' );

// Special tag engine
include( 'special-tags/special_tags.php' );
include( 'special-tags/page_types.php' );
include( 'special-tags/sets.php' );
include( 'special-tags/functions.php' );

include( 'special-tags/bp/page_types.php' );
include( 'special-tags/bp/sets.php' );
include( 'special-tags/bp/functions.php' );

// Admin pages
include( 'admin/seo.php' );
include( 'admin/settings.php' );
include( 'admin/getpro_tab.php' );

// Setup functions for meta tags
include( 'meta.php' );
// Meta boxes for end of posts and pages
include( 'admin/single_metabox.php' );
include( 'admin/single_metabox_save.php' );



?>