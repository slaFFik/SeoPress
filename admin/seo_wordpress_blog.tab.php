<?php 
/**
 * Configuration page for wordpress main blog
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_main_blog" >
	<div class="seopress-tab-head">
    	<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-wordpress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Wordpress Blog', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of your Wordpress blog.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>    
	</div>
	
	<div class="accordion seopress-meta-boxes">
        <?php
        
        // MAIN BLOG HOME
        $lable= array( __('Home' , 'seopress' ) ,"main_blog_start_title","main_blog_start","main_blog_start_tags",'','','main_blog_start_noindex');  
        seopress_metabox( $lable , $main_blog_start , 'wp-home' ); 
        // MAIN BLOG FRONT PAGE
        $lable= array( __('Front page' , 'seopress' ) ,"main_blog_front_page_title","main_blog_front_page","main_blog_front_page_tags",'','','main_blog_front_page_noindex');  
        seopress_metabox( $lable , $main_blog_front_page , 'wp-front-page' ); 
        // MAIN BLOG POSTS
        $lable= array( __('Posts' , 'seopress' ) ,"main_blog_posts_title","main_blog_posts","main_blog_posts_tags",'','','main_blog_posts_noindex');  
        seopress_metabox( $lable , $main_blog_posts , 'wp-post' ); 
        // MAIN BLOG PAGES
        $lable= array( __('Pages' , 'seopress' ) ,"main_blog_pages_title","main_blog_pages","main_blog_pages_tags",'','','main_blog_pages_noindex');  
        seopress_metabox( $lable , $main_blog_pages , 'wp-page' ); 
        // MAIN BLOG ARCHIVE
        $lable= array( __('Archive' , 'seopress' ) ,"main_blog_archiv_title","main_blog_archiv","main_blog_archiv_tags",'','','main_blog_archiv_noindex');  
        seopress_metabox( $lable , $main_blog_archiv , 'wp-archive' ); 
        // MAIN BLOG CATEGORIES
        $lable= array( __('Categories' , 'seopress' ) ,"main_blog_cat_title","main_blog_cat","main_blog_cat_tags",'','','main_blog_cat_noindex');  
        seopress_metabox( $lable , $main_blog_cat , 'wp-category' ); 
        // MAIN BLOG TAG PAGES-->
        $lable= array( __('Tags' , 'seopress' ) ,"main_blog_tag_pages_title","main_blog_tag_pages","main_blog_tag_pages_tags",'','','main_blog_tag_pages_noindex');  
        seopress_metabox($lable,$main_blog_tag_pages , 'wp-tag' );         
        // MAIN BLOG AUTHOR PAGES-->
        $lable= array( __('Author' , 'seopress' ) ,"main_blog_autor_pages_title","main_blog_autor_pages","main_blog_autor_pages_tags",'','','main_blog_autor_pages_noindex');  
        seopress_metabox($lable,$main_blog_autor_pages , 'wp-author' ); 
        // MAIN BLOG SEARCH PAGES-->
        $lable= array( __('Search result' , 'seopress' ) ,"main_blog_search_pages_title","main_blog_search_pages","main_blog_search_pages_tags",'','','main_blog_search_pages_noindex');  
        seopress_metabox($lable,$main_blog_search_pages , 'wp-search' );
        
        do_action( 'sp_seo_wordpress' );
        
        ?> 
    </div>
</div>