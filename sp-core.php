<?php
/**
* SeoPress Value class
*/
class SP_CORE{

    var $settings;
    var $page_type;
    var $special_tags;
    var $meta;

    /**
    * Constructor of class
    * @desc Constructor of class
    */
    public function __construct(){
        global $special_tags;

        $this->seo_settings = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_seo_settings_values' );
        $this->options      = get_blog_option( SITE_ID_CURRENT_SITE , 'seopress_options_values' );

        $this->init_special_tags();

        // Initialising data for frontend
        if( !is_admin() ){
            global $wp_filter;
            if( isset($wp_filter['bp_page_title']) && tk_is_buddypress() ){ // Should be reworked <- BP have to be hooked in
                remove_all_filters( 'bp_page_title' );
                add_filter( 'bp_page_title', array(&$this, 'init_seo') , 1 ); // Filtering buddypress title
            }

            if(isset($wp_filter['wp_title'])){
                remove_all_filters( 'wp_title' );
            }

            add_filter( 'wp_title', array( &$this, 'init_seo') , 1, 3 );  // Filtering wordpress title
            add_filter( 'bloginfo', array( &$this, 'delete_bloginfo_name') , 1, 2 );

            do_action( 'sp_init' );
        } // Initialising data for admin area
        else{
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
            add_action( 'admin_head', 'sp_setup', 10 );

            add_action( 'admin_notices', array( &$this, 'seopress_warnings') );

            do_action( 'sp_admin_init' );
        }
    }

    /**
    * Filtering blogname on Website
    * @param $output string The output of the filter 'bloginfo'
    * @param $show string The show parameter of the filter 'bloginfo'
    * @desc Initializes data for site and sets title
    */
    public function delete_bloginfo_name( $output = '', $show = '' ){
        if( $show == 'name' || $output == get_option('blogname') || $output == get_option('blogdescription') )
            $output = '';

        return $output;
    }

    /**
    * Initializing seo data for requested page
    * @desc Initializes data for site and sets title
    */
    public function init_seo( $title, $sep = '', $seplocation = '' ){
        if( !is_404() && FALSE != $sep ){
            global $page, $paged;

            // Setup meta data and getting title
            $new_title = $this->get_seo_data( 'title' );

            // Adding Pagination
            if ( ( $paged >= 2 || $page >= 2 ) && isset( $this->options['show_pagination'] ) )
                $new_title .= ' | ' . sprintf( __( 'Page %s', 'seopress' ), max( $paged, $page ) );

            // Adding meta tags to wp head
            add_action( 'wp_head' , array(&$this, 'insert_meta') , 1 );

            if( !empty($new_title) )
                $title = apply_filters('sp_title', $this->filter_for_html_output( $new_title ) ) ;
        }

        if(empty($title))
            $title = get_bloginfo('name') .' | '. ((is_home()||is_front_page())? get_bloginfo('description') : wp_title(''));

        // get rid of | at the end
        $title = trim($title, ' |');

        return $title;
    }

    public function filter_for_html_output( $string ){
        $string = strip_tags( $string ); // Filtering HTML Tags
        // $string = htmlentities( $string, ENT_QUOTES, 'UTF-8'  ); // Changning all special chars to HTML chars
        $string = stripslashes( $string ); // Stripping slashes

        return $string;
    }

    /**
    * Gets the SEO data
    * @desc Initializes data for head and sets title
    */
    public function get_seo_data( $key = false ){
        global $bp;
        $meta = array();

        if( is_single() || is_page() )
            $meta = $this->get_post_meta();

        if( empty($meta) ){
            $template = $this->get_template();
            $meta     = $this->replace_template( $template );
        }

        $meta = $this->filter_meta( $meta );

        $meta['title']       = isset($meta['title'])?$meta['title']:'';
        $meta['description'] = apply_filters('sp_description', isset($meta['description'])?$meta['description']:'' );
        $meta['keywords']    = apply_filters('sp_keywords',    isset($meta['keywords'])?   $meta['keywords']:'' );
        $meta['noindex']     = apply_filters('sp_noindex',     isset($meta['noindex'])?    $meta['noindex']:'' );

        $this->meta = $meta; // Writing meta results in global seopress meta variable

        if($key!=false){
            return $meta[$key];
        }else{
            return $meta;
        }

    }

    public function get_template( $page_type = '' ){

        if( $page_type == '' ){
            $page_type = tk_get_page_type();
        }

        $template = array();
        $template['title']       = isset($this->seo_settings[ $page_type . '-title' ])?$this->seo_settings[ $page_type . '-title' ]:'';
        $template['description'] = isset($this->seo_settings[ $page_type . '-description' ])?$this->seo_settings[ $page_type . '-description' ]:'';
        $template['keywords']    = isset($this->seo_settings[ $page_type . '-keywords' ])?$this->seo_settings[ $page_type . '-keywords' ]:'';
        $template['noindex']     = isset($this->seo_settings[ $page_type . '-noindex' ])?$this->seo_settings[ $page_type . '-noindex' ]:'';

        return $template;
    }

    public function update_template( $page_type, $template ){
        if( $page_type != "" ){
            $this->seo_settings['templates'][ $page_type ] = $template;
            update_blog_option ( SITE_ID_CURRENT_SITE, 'seopress_seo_settings' , $this->seo_settings ); // !!!!!!!!!!!!!!!!!! OLD
        }
    }

    public function insert_meta(){
        if( $this->meta['noindex'] == true )
            echo '<meta name="robots" content="noindex" />' . chr(10);

        if( !empty( $this->meta['description'] ))
            echo '<meta name="description" content="' . $this->filter_for_html_output( $this->meta['description'] ) . '" />' . chr(10);

        if( !empty( $this->meta['keywords'] ) )
            echo '<meta name="keywords" content="' . $this->filter_for_html_output( $this->meta['keywords'] ) . '" />' . chr(10);

        do_action( 'sp_insert_meta' );
    }

    public function replace_template( $template ){
        global $special_tags;
        $newmeta = array();

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

        if(!empty($meta['title']) && !empty($this->options['std_title_legth']) && $this->options['std_title_legth'] > 0 ){
            $meta['title'] =  substr( $meta['title'], 0, $this->options['std_title_legth'] );
        }
        if(!empty($meta['description']) && !empty($this->options['std_metadesc_legth']) && $this->options['std_metadesc_legth'] > 0 ){
            $meta['description'] = substr( $meta['description']  ,0, $this->options['std_metadesc_legth'] );
        }

        $meta = apply_filters( 'sp_filter_meta', $meta );

        return $meta;
    }

    public function get_post_meta( $post_id = FALSE ){
        global $post;

        if( !$post_id ) $post_id = $post->ID;

        $meta = array();

        /*
         * Title
         */

        // SeoPress
        $post_meta = get_post_meta( $post_id, 'sp_post_metabox', TRUE );

        $title = isset($post_meta['title'])?$post_meta['title']:'';

        // WPSEO
        if( empty($title) )
            $title = get_post_meta( $post_id, "_wpseo_edit_title", true );
        // All in one seopack
        if( empty($title) )
            $title = get_post_meta( $post_id, "_aioseop_title", true );

        // If title isn't empty, fill meta with it
        if( !empty($title) )
            $meta['title'] = $title;

        /*
         * Description
         */

        // SeoPress
        $description = isset($post_meta['description'])?$post_meta['description']:'';

        // WPSEO
        if( empty($description) )
            $description = get_post_meta( $post_id, "_wpseo_edit_description", true );
        // All in one seopack
        if( empty($description) )
            $description = get_post_meta( $post_id, "_aioseop_description", true );

        // If description isn't empty, fill meta with it
        if( !empty($description) )
            $meta['description'] = $description;

        /*
         * Keywords
         */
        // SeoPress
        $keywords = isset($post_meta['keywords'])?$post_meta['keywords']:'';

        // WPSEO
        if( empty($keywords))
            $keywords = get_post_meta( $post_id, "_wpseo_edit_keywords", true );
        // All in one seopack
        if( empty($keywords) )
            $keywords = get_post_meta( $post_id, "_aioseop_keywords", true );

         // If keywords aren't empty, fill meta with it
        if( !empty($keywords) )
            $meta['keywords'] = $keywords;

        /*
         * NoIndex
         */
        $noindex = isset($post_meta['noindex'])?$post_meta['noindex']:'';

        if( !empty($noindex) ){
            $meta['noindex'] = $noindex;
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

    public function seopress_warnings(){
        $siteurl = get_bloginfo('url');

        if( 0 == get_option('blog_public') ){
            $privacy_url = $siteurl . '/wp-admin/options-privacy.php';
            echo '<div id="seopress-privacy-warning" class="error"><p>' . sprintf( __('Your blog is not public. Search engines will be blocked. You can change this in your <a href="%s">privacy settings</a>.', 'seopress' ), $privacy_url ) . '</p></div>';
        }
    }

    public function init_admin(){
        if(
        (isset($_GET['page']) &&
            (
                'seopress_seo' == $_GET['page'] ||
                'seopress_options' == $_GET['page']
            )
        ) ||
        (isset($_GET['post']) && '' != $_GET['post']) ||
        'post-new.php' == basename( $_SERVER['REQUEST_URI'] ) ) {
            $tk_jquery_ui = new TK_WP_JQUERYUI();
            $tk_jquery_ui->load_jqueryui( array ( 'jquery-ui-tabs', 'jquery-ui-accordion', 'jquery-ui-autocomplete' ) );
            add_thickbox();
        }
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

    add_menu_page( 'SeoPress Admin' , 'SeoPress' , 'manage_options', 'seopress_seo','seopress_seo', $seopress_plugin_url . 'includes/images/icon-seopress-16x16.png');
    add_submenu_page( 'seopress_seo', __( 'SeoPress - Page types', 'seopress'),__( 'Page types', 'seopress' ), 'manage_options', 'seopress_seo', 'seopress_seo' );
    add_submenu_page( 'seopress_seo', __( 'SeoPress - Options', 'seopress'),__( 'Options', 'seopress' ), 'manage_options', 'seopress_options', 'seopress_options' );
}

function seopress_init(){
    global $seopress;
    $seopress = new SP_CORE();
}

function sp_get_pro_tab( $tabs ){
    global $seopress_plugin_url;
    $html = '<div id="tab-head">
          <div class="sfb-entry">
              <div style="width:250px; padding:0 40px 100px 0; float:left;"><a href="http://themekraft.com/shop/seopress-pro/" target="_blank"><img src="' . $seopress_plugin_url . 'includes/images/seopress-pro-package.jpg" border="0" /></a></div>
              <h2>' . __('Pro Version now available!', 'seopress') . '</h2><br>
                <b>' . __('Get SeoPress Pro Version now, and benefit from more functionality, support and a clean UI.', 'seopress') . '</b><br>
                <br>
                <a href="http://themekraft.com/shop/seopress-pro/" target="_blank">' . __('Upgrade now', 'seopress') . '</a>
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
                <a href="http://themekraft.com/shop/seopress-pro/" target="_blank">' . __('Upgrade now', 'seopress') . '</a>
            </div>
        </div>';

    $tabs->add_tab( 'cap_get_pro', __ ('Get Pro version!', 'seopress'), $html );
}

function sp_setup(){
    global $seopress_plugin_url;

    $sp_setup = get_option( 'seopress_setup' );

    if( (bool) $sp_setup['activation_run'] == false ){
        if( true == (bool) $_GET[ 'sp_activate' ] ){

            echo '<script type="text/javascript">
                      jQuery(document).ready(function($){
                         imgLoader = new Image(); // preload image
                         imgLoader.src = tb_pathToImage;
                         tb_show("SeoPress - by themekraft.com", "' . $seopress_plugin_url . 'sp-setup.php?page=tk_framework?TB_iframe=true&amp;width=482&amp;height=385" );
                         // placed right after tb_show call

                         // Workaround for getting tabs running

                         // See here: http://themeforest.net/forums/thread/wordpress-32-admin-area-thickbox-triggering-unload-event/46916?page=1#434388
                         // http://wordpress.org/support/topic/wp-32-thickbox-jquery-ui-tabs-conflict

                         $("#TB_window,#TB_overlay,#TB_HideSelect").one("unload",killTheDamnUnloadEvent);

                         function killTheDamnUnloadEvent(e) {
                            // you
                            e.stopPropagation();
                            // must
                            e.stopImmediatePropagation();
                            // DIE!
                            return false;
                         }
                      });
                    </script>';
        }
        update_option( 'seopress_setup',  array( 'activation_run' => true ) );
    }
}

?>