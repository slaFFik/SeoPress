<?php
/**
 * SeoPress main engine
 * 
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

/**
 * Setting up header on page 
 * @desc Setting up the title and meta values of a page (function for actionhook wp-title)
 * @return string Returns the string for the title
 * */
function sp_setup_header( $title ){
	global $seopress_special_tags;
	$page_type = tk_get_page_type();
	
	if( !is_404() ){
		
		// Setup meta data and getting title
		$new_title = sp_get_values( $seopress_special_tags['page-types'][$page_type]['option-name'] , $seopress_special_tags['page-types'][$page_type]['specialtag-sets'], 'title' );	
		
		// Adding meta tags to wp head
		add_action( 'wp_head' , 'sp_insert_meta_tags' , 1 );
		
		if( $new_title == '' ){
			return $title;
		}else{	
			return stripslashes( $new_title );
		}
	}	
}

/**
 * Getting values for page (title & meta)
 * @desc Seting up the title and meta values of a page
 * @return array The meta values in an array or if parameter is given it returns meta field 
 * */
function sp_get_values( $option_name , $special_tag_sets = array() , $key=false){
	global $bp, $seopress_meta;
	
	// Getting template for unknown buddypress components
	if( tk_is_buddypress() && $bp->current_component != '' && count( $special_tag_sets ) == 0){ // If buddypress is installed and special tag set is empty
		sp_init_bp_unknown_components_special_tag_values(); // Initialising array for unknown buddypress components

		$option_name = sp_get_bp_option_name();
					
		$template = get_blog_option( SITE_ID_CURRENT_SITE , $option_name ); //

	// Getting template	
	}elseif( count( $special_tag_sets ) > 0 ){ 
		// Initializing global special tag array
		foreach ( $special_tag_sets AS $special_tag_set ){
			sp_init_special_tag_values( $special_tag_set ); 
		}
		
		$template = get_blog_option( SITE_ID_CURRENT_SITE , $option_name );	
	}	
	
	
	// print_r($template);
	
	// Getting meta data from template, filled by global special tag array values
	$meta = sp_replace_meta( $template );
	
	// print_r($meta);
	
	// Is meta entered in post or page edit screen, use it!
	if( is_single() ) $meta = sp_get_postmeta ( $meta ) ;
	
	// print_r($meta);
	
	// Deleting breaking spaces and html tags
	$meta['title'] = strip_tags( preg_replace( '/\r|\n/s' , '' , $meta['title']) );
	$meta['description'] = strip_tags( preg_replace( '/\r|\n/s' , '' , $meta['description']) );
	$meta['keywords'] = $meta['keywords'];
	$meta['noindex'] = $meta['noindex'];
	
	// Shorten title and description to maximum lengts
	$meta=sp_set_meta_length($meta);
	
	$meta['title'] = apply_filters( 'sp_title', $meta['title'] );
	$meta['description'] = apply_filters( 'sp_description', $meta['description'] );
	$meta['keywords'] = apply_filters( 'sp_keywords', $meta['keywords'] );
	$meta['noindex'] = apply_filters( 'sp_noindex', $meta['noindex'] );	
	
	$seopress_meta = $meta; // Writing meta results in global seopress meta variable
			
	if($key!=false){
		return $meta[$key];
	}else{
		return $meta;			
	}
}

/**
 * Replaces meta-template with data for page
 * @desc Replaces Special tags in whole meta template
 * @param array Meta-template for page to replace with values
 * @return array The meta values for the page
 * */
function sp_replace_meta( $template ){
  	global $post; 
	
  	$newmeta = Array();
  	
  	if( is_array( $template ) ){
		// Getting meta by replacing special tags in each temlate field
	  	foreach($template as $key => $meta_field_template){
	   		$newmeta[$key] = sp_replace_special_tags( $meta_field_template );
	  	} 
  	}
  	
 	$newmeta['title'] = $newmeta[0];
	$newmeta['description'] = $newmeta[1];
	$newmeta['keywords'] = $newmeta[2];
	$newmeta['noindex'] = $newmeta[3];
  	
  	return $newmeta; 
}
/**
 * Cutting meta length which habe been set in settings page
 * @desc Cutting meta length which habe been set in settings page
 * @param array Meta data
 * @return array The meta values
 * */
function sp_set_meta_length( $meta ){
	
	if( get_option( 'bp_seo_metatitle_length' ) != '' ){
		$meta_title_length = get_option( 'bp_seo_metatitle_length' );
		$meta['title'] =  substr( $meta['title']  ,0, $meta_title_length );
	}
	if( get_option( 'bp_seo_metadesc_length' ) != '' ){
		$meta_desc_length = get_option( 'bp_seo_metadesc_length' );
		$meta['description'] = substr( $meta['description']  ,0, $meta_desc_length );
	}
	
	return $meta;	
}

/**
 * Inserts the meta tags to the head of the page
 * @desc Inserts the meta tags to the head of the page
 * */
function sp_insert_meta_tags(){
	global $seopress_meta;
	
	if($seopress_meta['noindex']==true) echo '<meta name="robots" content="noindex" />' . chr(10); 

	if(function_exists('get_keywords_from_content')){
		if(get_option('bp_seo_keywords')== true){
		    if( trim( $seopress_meta['keywords'] ) == "" || trim( $seopress_meta['keywords'] ) == "," ){
					$seopress_meta['keywords'] = get_keywords_from_content( $seopress_meta['description'] );
			}
		}
	}
    if( trim( $seopress_meta['description'] ) != "" || trim( $seopress_meta['description'] ) == ","){	
    	echo '<meta name="description" content="' . $seopress_meta['description'] . '" />' . chr(10);
	} 
    if( trim($seopress_meta['keywords']) != ""){ 
    	if(trim($seopress_meta['keywords']) != ","){
    		echo '<meta name="keywords" content="'.$seopress_meta['keywords'].'" />' . chr(10);
    	} 
	}
}
/**
 * Gets the data from post
 * @desc Inserts the meta tags to the head of the page
 * */
function sp_get_postmeta( $meta ){
	global $post;
	
	$title = get_post_meta($post->ID,"_title");
	// If is there is no data, getting data from wpseo
	if($title[0]==""){
		$title=get_post_meta($post->ID,"_wpseo_edit_title");
	}
	// If is there is no data, getting data from all in one seopack
	if($title[0]==""){
		$title=get_post_meta($post->ID,"_aioseop_title");
	}
	if($title[0]!=""){
		$meta['title'] = $title[0];
	}
	
	$description=get_post_meta($post->ID,"_description");
	// If is there is no data, getting data from wpseo
	if($description[0]==""){
		$description=get_post_meta($post->ID,"_wpseo_edit_description");
	}
	// If is there is no data, getting data from all in one seopack
	if($description[0]==""){
		$description=get_post_meta($post->ID,"_aioseop_description");
	}
	if($description[0]!=""){
		$meta['description'] = $description[0];
	}
	
	$keywords=get_post_meta($post->ID,"_keywords");
	// If is there is no data, getting data from wpseo
	if($keywords[0]==""){
		$keywords=get_post_meta($post->ID,"_wpseo_edit_keywords");
	}
	// If is there is no data, getting data from all in one seopack
	if($keywords[0]==""){
		$keywords=get_post_meta($post->ID,"_aioseop_keywords");
	}
	if($keywords[0]!=""){
		$meta['keywords'] = $keywords[0];
	}
	
	$noindex = get_post_meta($post->ID,"_noindex");
	
	if($noindex[0] !=""){
		$meta['noindex'] = $noindex[0];
	}
	return $meta; 
}
/**
 * Getting option name for active buddypress page
 * @desc It returns the the name of the worpress option in the wp-options table 
 * @return string the name of the options for the buddypress component
 * */
function sp_get_bp_option_name(){
	global $bp;
	
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	
	$active_component = $bp->active_components[$bp->current_component];
	if( $active_component == "" ) $active_component = $bp->current_component;
	$active_component_slug = $bp->$active_component->slug;
	
  	$current_action = $bp->current_action;
  	
  	if( $current_action == "" ){
 		$option_name = 'bp_seo_' . $active_component_slug; 	
  	}else{
  		$option_name = 'bp_seo_' . $active_component_slug . '_' . $current_action;
  	}
	
	return $option_name;		
}

function sp_get_title() {
	global $bp, $post, $wp_query, $current_blog;

	if ( is_front_page() || !bp_current_component() || ( is_home() && bp_is_page( 'home' ) ) ){
		$title= __('Home','buddypress');

	}elseif(bp_is_blog_page()){
		if (is_single()){
			$title=__('Blog &#124; '.$post->post_title,'buddypress');
		}else if(is_category()) {
			$title=__('Blog &#124; Categories &#124; '.ucwords($wp_query->query_vars['category_name']),'buddypress');
		}else if(is_tag()) {
			$title=__('Blog &#124; Tags &#124; '.ucwords( $wp_query->query_vars['tag'] ),'buddypress');
		}else if(is_page()){
			$title=$post->post_title;
		}else
			$title=__('Blog','buddypress');

	}elseif(!empty($bp->displayed_user->fullname)){
 		$title=strip_tags( $bp->displayed_user->fullname.' &#124; '.ucwords($bp->current_component));

	}elseif($bp->is_single_item){
		$title=ucwords($bp->current_component).' &#124; '.$bp->bp_options_title.' &#124; '.$bp->bp_options_nav[$bp->current_component][$bp->current_action]['name'];

	}elseif($bp->is_directory){
		if (!$bp->current_component)
			$title=sprintf(__('%s Directory','buddypress'),ucwords(BP_MEMBERS_SLUG));
		else
			$title=sprintf(__('%s Directory','buddypress'),ucwords($bp->current_component));

	}elseif(bp_is_register_page()){
		$title= __( 'Create an Account','buddypress');

	}elseif(bp_is_activation_page()){
		$title=__( 'Activate your Account','buddypress');

	}elseif(bp_is_group_create()){
		$title=__( 'Create a Group','buddypress');

	}elseif(bp_is_create_blog()){
		$title=__( 'Create a Blog','buddypress');
	}

	if(defined('BP_ENABLE_MULTIBLOG')){
		$blog_title=get_blog_option($current_blog->blog_id,'blogname');
	} else {
		$blog_title=get_blog_option(BP_ROOT_BLOG,'blogname');
	}

	return $blog_title.' &#124; '.esc_attr($title);
}
?>