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

require_once( 'init.php' );

// Loading libraries
require_once( 'lib/io.inc.php' );
require_once( 'lib/wordpress/io.inc.php' );
require_once( 'lib/wordpress/wp.inc.php' );
require_once( 'lib/wordpress/wp_url.inc.php' );

// Loading css and js
require_once( 'css/loader.php' );
// require_once( 'js/loader.php' );
require_once( 'lib/wordpress/tk_jquery/tk_jqueryui.php' );

require_once( 'functions.php' );
require_once( 'bp-functions.php' );

// Special tag engine
// include( 'special-tags/special_tags.php' );

require_once( 'special-tags/special-tag-core.php' );

require_once( 'special-tags/wp/page_types.php' );
require_once( 'special-tags/wp/sets.php' );
require_once( 'special-tags/wp/functions.php' );

require_once( 'special-tags/bp/page_types.php' );
require_once( 'special-tags/bp/sets.php' );
require_once( 'special-tags/bp/functions.php' );

// Admin pages
require_once( 'admin/seo.php' );
require_once( 'admin/settings.php' );
require_once( 'admin/getpro_tab.php' );

// Setup functions for meta tags
require_once( 'meta.php' );
// Meta boxes for end of posts and pages
require_once( 'admin/single_metabox.php' );
require_once( 'admin/single_metabox_save.php' );

require_once( 'sp-core.php' );



?>