<?php 
/**
 * Configuration page for wordpress main blog
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
function sp_admin_wp_tab(){
	global $seopress_plugin_url;

	$html.= sp_admin_tab_header( __('Wordpress Blog', 'seopress'), __('Setup your title and meta tags of your Wordpress blog.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-wordpress.png' );
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'wp-home', 'title' => __('Home' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="home"'  ) );
	array_push( $sections, array( 'type' => 'wp-post', 'title' => __('Posts' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="posts"' ) );
	array_push( $sections, array( 'type' => 'wp-page', 'title' => __('Pages' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="pages"' ) );
	array_push( $sections, array( 'type' => 'wp-archive', 'title' => __('Archive' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'wp-category', 'title' => __('Categories' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'wp-tag', 'title' => __('Tags' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'wp-author', 'title' => __('Author' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'wp-search', 'title' => __('Search result' , 'seopress' ), 'content' => $content ) );

	apply_filters( 'sp_admin_wp_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ), $section['extra_title'] );
	}
	
	$html.= $accordion->get_html();
	
	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress' ) . '" /></p>';
	
	$html.= $button;
			
	do_action( 'sp_admin_wp_tab_bottom' );
	
	return $html;
	
}
?>