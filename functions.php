<?php
/**
 * SeoPress functions
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

if(!function_exists('get_blog_option')){
	function get_blog_option( $blog_id, $option_name, $default = false ) {
		return get_option( $option_name, $default );
	}
}

if(!function_exists('add_blog_option')){
	function add_blog_option( $blog_id, $option_name, $option_value ) {
		return add_option( $option_name, $option_value );
	}
}
if(!function_exists('update_blog_option')){
	function update_blog_option( $blog_id, $option_name, $option_value ) {
		return update_option( $option_name, $option_value );
	}
}
function is_min_wp($version){
     return version_compare($GLOBALS['wp_version'], $version . 'alpha', '>=');
}
function sp_plugin_row($file){   
	if ( plugin_basename(__FILE__) != $file ) {
		return;
	}       
	echo '<form action="plugins.php" method="post">';
    // wp_nonce_field('_wpseo_license_nonce');
    echo '<tr>';
    echo '<td colspan="';
    echo(is_min_wp('2.6') ? (is_min_wp('2.8') ? 2 : 3) : 2);
	echo '" class="fade"></td>';
	echo '<td colspan="';
	echo(is_min_wp('2.6') ? (is_min_wp('2.8') ? 1 : 2) : 3);
	echo 'class="fade">';
	echo '<label for="themekraft_username"><strong>' . __('Themekraft.com', 'seopress') . '</strong> ' . __('Username', 'seopress') . '</label> ';
	echo '<input type="text" name="themekraft_username" /> ';
	echo '<label for="themekraft_password">' . __('Password', 'seopress') . '</label> ';
	echo '<input type="text" name="seopress_license_key" /> ';
	echo '<input type="submit" name="seopress_submit" value="' . __('login', 'wpseo') . '" class="button-secondary action" />';
	echo '</td></tr></form>';
}
// add_action('after_plugin_row', 'sp_plugin_row');

function my_plugin_notices(){
	echo '<div class="updated fade"><p>';
	_e('Please verify your serial of SeoPress', 'seopress');
	echo '</p></div>';
}
// add_action('admin_notices', 'my_plugin_notices');
?>