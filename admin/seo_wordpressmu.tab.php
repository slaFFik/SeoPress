<?php 
/**
 * Configuration page for wordpress network blog (MU blog)
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
function sp_admin_wpmu_tab(){
	global $seopress_plugin_url;
	
	$html.= sp_admin_tab_header( __('Wordpress Network Blogs', 'seopress'), __( 'Setup your title and meta tags of your Wordpress main blog.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-wordpress.png' );
	
	$sections = array();
	
	array_push( $sections, array( 'type' => 'mu-home', 'title' => __('Home' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="home"'  ) );
	array_push( $sections, array( 'type' => 'mu-post', 'title' => __('Posts' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="posts"'  ) );
	array_push( $sections, array( 'type' => 'mu-page', 'title' => __('Pages' , 'seopress' ), 'content' => $content, 'extra_title' => ' class="pages"'  ) );
	array_push( $sections, array( 'type' => 'mu-archive', 'title' => __('Archive' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'mu-category', 'title' => __('Categories' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'mu-tag', 'title' => __('Tags' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'mu-author', 'title' => __('Author' , 'seopress' ), 'content' => $content ) );
	array_push( $sections, array( 'type' => 'mu-search', 'title' => __('Search result' , 'seopress' ), 'content' => $content ) );

	apply_filters( 'sp_admin_wp_sections', $sections );	

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	foreach( $sections AS $section ){
		$accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'] ), $section['extra_title']  );
	}
	
	$html.= $accordion->get_html();	
			
	do_action( 'sp_admin_wpmu_tab_bottom' );
	
	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress' ) . '" /></p>';
	
	$html.= $button;	
	
	return $html;
	
}
?>