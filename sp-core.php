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
		
		$this->seo_settings = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_seo_settings_values' );
		$this->options = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_options_values' );
		$this->init_special_tags();
					
		// Initialising data for frontend	
		if( !is_admin() ){

			if( tk_is_buddypress() ){ // Should be reworked <- BP have to be hooked in
				
				remove_all_filters( 'bp_page_title' );
				
				add_filter( 'bp_page_title' , array(&$this, 'init_seo') , 1 ); // Filtering buddypress title 	
				
			}else{
				
				remove_all_filters( 'wp_title' );
				
				add_filter( 'wp_title' ,  array(&$this, 'init_seo') , 1 );  // Filtering wordpress title
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
			if( !isset( $this->options['metabox_post'] ) ){
				add_action('edit_form_advanced', 'sp_post_metabox');
			}
			if( !isset( $this->options['metabox_page'] ) ){
				add_action('edit_page_form', 'sp_page_metabox');
			}			
			
			$this->special_tags = $special_tags->get_tags();
			
			add_action( 'sp_seo_settings_tabs', 'sp_get_pro_tab', 10 );
			add_action( 'sp_options_tabs', 'sp_get_pro_tab', 10 );
			
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
		// echo $title;
		return $title;	
	}
	
	/**
    * Gets the SEO data
    * @desc Initializes data for head and sets title
    * */
	public function get_seo_data( $key = false ){
		global $bp;
		
		if( is_single() || is_page() ) $meta = $this->get_post_meta();
		
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
		
		if( tk_is_buddypress() ){ // Should be reworked <- BP have to be hooked in
			sp_init_bp_special_tags(); // Initializung Special tag sets & tags for buddypress
			sp_init_bp_special_tags_pt(); // Initializung Special tag types for buddypress
		}
		
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
}

function seopress_init(){
	global $seopress;
	$seopress = new SP_CORE();
}

function sp_get_pro_tab( &$tabs ){
	global $seopress_plugin_url;
	$html = '<div id="tab-head">
	      <div class="sfb-entry">
	      	  <div style="width:250px; padding:0 40px 100px 0; float:left;"><a href="http://wpplugins.com/plugin/238/seopress-pro-version" target="_blank"><img src="' . $seopress_plugin_url . 'images/seopress-pro-package.jpg" border="0" /></a></div>
		      <h2>' . __('Pro Version now available!', 'seopress') . '</h2><br>
				<b>' . __('Get SeoPress Pro Version now, and benefit from more functionality, support and a clean UI.', 'seopress') . '</b><br>
				<br>
				<a href="http://wpplugins.com/plugin/238/seopress-pro-version" target="_blank">' . __('Upgrade now', 'seopress') . '</a>					
				<br><br>
				<h3>' . __('Pro Features', 'seopress') . '</h3>
				<ol>
					<li>' . __('Keyword generator', 'seopress') . '</li>
					<li>' . __('Text counter for meta title and description', 'seopress') . '</li>
					<li>' . __('No branding: the Pro Version comes without the "Get Pro" tabs.', 'seopress') . '</li>
					<li>' . __('Full support and help in the SeoPress group and forum.', 'seopress') . '</li>
				</ol>
				<br>
				<h3>' . __('Pro Roadmap', 'seopress') . '</h3>
				<ol>
					<li>' . __( 'Sitemap generator (including Buddypress urls)', 'seopress') . '</li>
					<li>' . __( 'Deeplink generator', 'seopress') . '</li>
					<li>' . __( 'Pages and posts optimizer', 'seopress') . '</li>
					<li>' . __( 'Searchengine preview for pages and posts', 'seopress') . '</li>
					<li>' . __( 'Google Pagerank checker', 'seopress') . '</li>
					<li>' . __( 'Canonical url support', 'seopress') . '</li>
					<li>' . __( 'Xprofile special tags for buddypress', 'seopress') . '</li>
				</ol>
				<br>
				<a href="http://wpplugins.com/plugin/238/seopress-pro-version" target="_blank">' . __('Upgrade now', 'seopress') . '</a>	
			</div>
	    </div>';
	
	$tabs->add_tab( 'cap_get_pro', __ ('Get Pro version!', 'seopress'), $html );	
}

function sp_reset_data(){
	
}

?>