<?php
/**
* SeoPress Value class
*
* @author    Sven Wagener <svenw_at_themekraft_dot_com>
* @copyright Themekraft.com
* @include   Funktion:_include_
*/
class SP_CORE{
	
	var $settings;
	var $page_type;
	var $special_tags;
	var $used_tags;
	var $meta;
	
	/**
    * Constructor of class
    * @desc Constructor of class
    * */
	public function __construct(){
		global $special_tags;
		
		// echo "WO Version: " . $GLOBALS['wp_version'] . ' ' . plugin_dir_url( __FILE__ );
		
		$this->seo_settings = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_seo_settings_values' );
		$this->options = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_options_values' );
		$this->init_special_tags();
					
		// Initialising data for frontend	
		if( !is_admin() ){

			if( tk_is_buddypress() ){ // Should be reworked <- BP have to be hooked in
				
				sp_init_bp_special_tags(); // Initializung Special tag sets & tags for buddypress
				sp_init_bp_special_tags_pt(); // Initializung Special tag types for buddypress
				
				add_filter( 'bp_page_title' , array(&$this, 'init_seo') , 0, 1 ); // Filtering buddypress title 	
				
			}else{
				add_filter( 'wp_title' ,  array(&$this, 'init_seo') , 0, 1 );  // Filtering wordpress title
			}
			
			$this->used_tags = $special_tags->get_tags( $this->page_type ); // ???? Here ????
			
			do_action( 'sp_init' );
			
		// Initialising data for admin			
		}else{
			
			$this->init_admin();
			
			add_action( 'admin_init', 'sp_register_seo_settings_form' );
			add_action( 'admin_init', 'sp_register_options_form' );
			add_action( 'admin_init', 'sp_register_post_metabox_form' );
			
			add_action( 'admin_menu', 'sp_admin_menue');
			
			## Setting up post & page forms
			if( $this->options['metabox_post'] != 'on' ){
				add_action('edit_form_advanced', 'sp_post_metabox');
			}
			if( $this->options['metabox_page'] != 'on' ){
				add_action('edit_page_form', 'sp_page_metabox');
			}
			
			$this->special_tags = $special_tags->get_tags();
			
			do_action( 'sp_admin_init' );
		}
	}
	
	/**
    * Initializing seo data for reuested page
    * @desc Initializes data for site and sets title
    * */	
	public function init_seo( $title ){		
		if( !is_404() ){
			
			// Setup meta data and getting title
			$new_title = $this->get_seo_data( 'title' );
			
			// Adding meta tags to wp head
			add_action( 'wp_head' , array(&$this, 'insert_meta') , 1 );
			
			if( $new_title != '' ) $title = stripslashes( $new_title );
				
		}		
		return $title;	
	}
	
	/**
    * Gets the SEO data
    * @desc Initializes data for head and sets title
    * */
	public function get_seo_data( $key = false ){
		global $bp;
		
		if( is_single() ) $meta = $this->get_post_meta();
		
		if( $meta == '' ){
			$template = $this->get_template();
			$meta = $this->replace_template( $template );
		}
		
		$meta = $this->filter_meta( $meta );
		
		$meta['title'] = apply_filters( 'sp_title', $meta['title'] );
		$meta['description'] = apply_filters( 'sp_description', $meta['description'] );
		$meta['keywords'] = apply_filters( 'sp_keywords', $meta['keywords'] );
		$meta['noindex'] = apply_filters( 'sp_noindex', $meta['noindex'] );	
		
		$this->meta = $meta; // Writing meta results in global seopress meta variable
				
		if($key!=false){
			return $meta[ $key ];
		}else{
			return $meta;			
		}
	}
	
	public function get_template( $page_type = '' ){
		
		if( $page_type == '' ){
			$page_type = tk_get_page_type();
		}
				
		$template['title'] = $this->seo_settings[ $page_type . '-title' ];
		$template['description'] = $this->seo_settings[ $page_type . '-description' ];
		$template['keywords'] = $this->seo_settings[ $page_type . '-keywords' ];
		$template['noindex'] = $this->seo_settings[ $page_type . '-noindex' ];
		
		return $template;
	} 
	
	public function update_template( $page_type, $template ){
		if( $page_type != "" ){
			$this->seo_settings['templates'][ $page_type ] = $template;
			update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_seo_settings' , $this->seo_settings ); // !!!!!!!!!!!!!!!!!! OLD
		}
	}

	public function insert_meta(){
	
		if( $this->meta['noindex']==true ) echo '<meta name="robots" content="noindex" />' . chr(10); 

	    if( trim( $this->meta['description'] ) != "" || trim( $this->meta['description'] ) == ","){	
	    	echo '<meta name="description" content="' . $this->meta['description'] . '" />' . chr(10);
		} 
	    if( trim( $this->meta['keywords'] ) != '' ){ 
	    	if(trim( $this->meta['keywords'] ) != ',' ){ //////////////////////////////////// Whats up here? Bad programming?
	    		echo '<meta name="keywords" content="' . $this->meta['keywords'] . '" />' . chr(10);
	    	} 
		}
		do_action( 'sp_insert_meta' );
	}
	
	public function replace_template( $template ){
		global $special_tags;	
	  	$newmeta = Array();
	  	
	  	if( tk_is_buddypress() ){
	  		$fallback_type = 'bp-component-unknown'; // Should be hooked in
	  	}
	  	
	  	if( is_array( $template ) ){
	  		// Getting meta by replacing special tags in each temlate field
		  	foreach( $template as $key => $meta_field_template ){
		   		$newmeta[ $key ] = $special_tags->replace( $meta_field_template, tk_get_page_type(), $fallback_type );
		  	} 		  	
	  	}
	  	
	  	return $newmeta; 
	}
	
	//////////////////////////////////// Should go to Hook
	public function filter_meta( $meta ){
		
		if( $this->options['std_title_legth'] != '' && $this->options['std_title_legth'] != 0 ){
			$meta['title'] =  substr( $meta['title']  ,0 , $this->options['std_title_legth'] );
		}
		if( $this->options['std_metadesc_legth'] != '' && $this->options['std_metadesc_legth'] != 0 ){
			$meta['description'] = substr( $meta['description']  ,0, $this->options['std_metadesc_legth'] );
		}
		
		$meta = apply_filters( 'sp_filter_meta', $meta );
		
		return $meta;
	}

	public function get_post_meta( $post_id = FALSE ){
		global $post;
		
		if( !$post_id )	$post_id = $post->ID;

		/*
		 * Title
		 */
		
		// SeoPress
		$post_meta = get_post_meta( $post_id, 'sp_post_metabox', TRUE );

		$title[0] = $post_meta['title'];
		
		// WPSEO
		if( $title[0] == '' ) $title= get_post_meta( $post_id, "_wpseo_edit_title" );
		// All in one seopack
		if( $title[0] == '' ) $title=get_post_meta( $post_id, "_aioseop_title" );
				
		// If title isn't empty, fill meta with it
		if( $title[0] != '' ) $meta['title'] = $title[0];
		
		/*
		 * Description
		 */
				
		// SeoPress
		$description[0] = $post_meta['description'];
		
		// WPSEO
		if( $description[0] == '' ) $description = get_post_meta( $post_id, "_wpseo_edit_description" );
		// All in one seopack
		if( $description[0] == '' ) $description = get_post_meta( $post_id, "_aioseop_description" );
		
		// If description isn't empty, fill meta with it
		if( $description[0] != '' ) $meta['description'] = $description[0]; 

		/*
		 * Description
		 */
		// SeoPress
		$keywords[0] = $post_meta['keywords'];
		
		// WPSEO
		if( $keywords[0] == '' ) $keywords = get_post_meta( $post_id, "_wpseo_edit_keywords" );
		// All in one seopack
		if( $keywords[0] == '' ) $keywords = get_post_meta( $post_id, "_aioseop_keywords" );
		
		if( $keywords[0] != '' ) $meta['keywords'] = $keywords[0];
		
		/*
		 * NoIndex
		 */
		$noindex[0] = $post_meta['noindex'];
		
		if( $noindex[0] != '' ){
			$meta['noindex'] = $noindex[0];
		}
		
		return apply_filters( 'sp_post_meta', $meta );
	}
	
	private function init_special_tags(){
		global $special_tags;
		$special_tags = new TK_SPECIAL_TAGS();

		sp_init_special_tags(); // Initializung Special tag sets & tags 		
		sp_init_special_tags_pt(); // Initializung Special tag types
		
		$special_tags->add_type( 'unknown' , array( 'global' ) );
		
		do_action( 'sp_init_special_tags' );
	}
	
	public function init_admin(){				
		$tk_jquery_ui = new TK_WP_JQUERYUI();
		$tk_jquery_ui->load_jqueryui( array ( 'jquery-ui-tabs', 'jquery-ui-accordion', 'jquery-ui-autocomplete' ) );
	}
	
	public function install(){
	}
}

function sp_register_seo_settings_form(){
	tk_register_wp_option_group( 'seopress_seo_settings' );
}
function sp_register_options_form(){
	tk_register_wp_option_group( 'seopress_options' );
}
function sp_register_post_metabox_form(){
	tk_register_wp_option_group( 'sp_post_metabox' );
}

function sp_admin_menue(){
	global $blog_id, $seopress_plugin_url;
	
	if( !current_user_can('level_10') ){ 
		return false;
	} else {
		if( defined('SITE_ID_CURRENT_SITE') ){	
	  		if( $blog_id != SITE_ID_CURRENT_SITE ){
	    		return false;
	   		}
		}
	}
		
	add_menu_page( 'SeoPress Admin' , 'SeoPress' , 'manage_options', 'seopress_seo','seopress_seo', $seopress_plugin_url . 'images/icon-seopress-16x16.png');
	add_submenu_page( 'seopress_seo', __( 'SeoPress - Seo options', 'seopress'),__( 'Seo Settings', 'seopress' ), 'manage_options', 'seopress_seo', 'seopress_seo' );
	add_submenu_page( 'seopress_seo', __( 'SeoPress - Options', 'seopress'),__( 'Options', 'seopress' ), 'manage_options', 'seopress_options', 'seopress_options' );
	// add_submenu_page( 'seopress_seo', __( 'Test page', 'seopress'),__( 'Test', 'seopress' ), 'manage_options', 'test_page', 'test_page' );

}

function seopress_init(){
	global $seopress;
	$seopress = new SP_CORE();
}

function sp_reset_data(){
	
}

function sp_rewrite_values_to_1_1( $old_option, $page_type ){
	
	$meta = get_blog_option( SITE_ID_CURRENT_SITE , $old_option );
			
	$values[ $page_type . '-title' ] = $meta[0];
	$values[ $page_type . '-description'] = $meta[1];
	$values[ $page_type . '-kewords'] = $meta[2];
	$values[ $page_type . '-noindex'] = $meta[3];
	
	// delete_blog_option( SITE_ID_CURRENT_SITE , $old_option );		
	
	return $values;
}

function sp_update_to_1_1(){
	global $seopress;
	
	if( get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_seo_settings_values' ) == '' ){	

		$settings['seopress_seo_settings_values'] = array();

		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_start', 'wp-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_front_page', 'wp-front-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_posts', 'wp-post' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_pages', 'wp-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_archiv', 'wp-archive' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_cat', 'wp-category' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_autor_pages', 'wp-author' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_main_blog_search_pages', 'wp-search' ) );
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog', 'mu-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_front_page', 'mu-front-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_posts', 'mu-post' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_pages', 'mu-page' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_archiv', 'mu-archive' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_autor_pages', 'mu-author' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_search_pages', 'mu-search' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_user_blog_tag_pages', 'mu-tag' ) );
		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_activity', 'bp-component-activity' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_friends', 'bp-component-activity-friends' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_groups', 'bp-component-activity-groups' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_favorites', 'bp-component-activity-favorites' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity_mentions', 'bp-component-activity-mentions'  ));
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_members', 'bp-component-members' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_groups', 'bp-component-groups' ) ); // WHAAAAAAT ???
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_home', 'bp-component-groups-home' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_forum', 'bp-component-groups-forum' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_forum_topic', 'bp-component-groups-forum-topic' ) );		
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_groups_members', 'bp-component-groups-members' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_activity', 'bp-component-activity-just-me' ) );
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil', 'bp-component-profile-public' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_blogs', 'bp-component-blogs-my-blogs' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_friends', 'bp-component-friends-my-friends' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_profil_groups', 'bp-component-groups-my-groups' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_forums', 'bp-component-forums' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_directory_blogs', 'bp-component-blogs' ) );	
		$settings['seopress_seo_settings_values'] = array_merge( $settings['seopress_seo_settings_values'], sp_rewrite_values_to_1_1( 'bp_seo_registration', 'bp-component-register' ) );		

		$settings['seopress_options_values']['post_metabox'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_post' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_post' );	
		$settings['seopress_options_values']['page_metabox'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_page' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_meta_box_page' );	
		
		$settings['seopress_options_values']['title_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metatitle_length' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metatitle_length' );	
		$settings['seopress_options_values']['meta_description_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metadesc_length' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_metadesc_length' );	
		$settings['seopress_options_values']['meta_description_length'] = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
		// delete_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
		
		// print_r_html( $settings );

		update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_seo_settings_values' , $settings['seopress_seo_settings_values'] );
		update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_options_values' , $settings['seopress_options_values'] );
		
		// print_r_html( get_option( 'seopress_values' ) );				
	}
}
add_action( 'init', 'sp_update_to_1_1', 0);

?>