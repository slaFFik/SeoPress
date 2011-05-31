<?php 
/**
 * Configuration page for wordpress network blog (MU blog)
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><?php if ( defined ( 'SITE_ID_CURRENT_SITE' ) ) { ?>
<div id="cap_user_blogs" >
	<div class="seopress-tab-head">
    	<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-wordpress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e( 'Wordpress Network Blogs' , 'seopress' ); ?></h3>
              <p><?php _e( 'Setup your title and meta tags of your Wordpress main blog. ' , 'seopress' ); ?></p>
		</div>
        <div style="clear:both;"></div>    
	</div>
	
    <div class="accordion seopress-meta-boxes">
		<?php
        
        // USER BLOG HOME  -->
        $lable= array( __('Home' , 'seopress' ) ,"user_blog_title","user_blog","user_blog_tags",'','','');
        seopress_metabox( $lable, $user_blog, 'mu-home' );
        // USER BLOG FRONT PAGE
        $lable= array( __('Front page' , 'seopress' ) ,"user_blog_front_page_title","user_blog_front_page","user_blog_front_page_tags",'','','user_blog_front_page_noindex');  
        seopress_metabox( $lable , $user_blog_front_page , 'mu-front-page' );
        // USER BLOG POSTS -->
        $lable= array( __('Posts' , 'seopress' ) ,"user_blog_posts_title","user_blog_posts","user_blog_posts_tags",'','','user_blog_posts_noindex');
        seopress_metabox( $lable, $user_blog_posts, 'mu-post' );
        // USER BLOG PAGES -->
        $lable= array( __('Pages' , 'seopress' ) ,"user_blog_pages_title","user_blog_pages","user_blog_pages_tags",'','','user_blog_pages_noindex');
        seopress_metabox($lable,$user_blog_pages, 'mu-page');		
        // USER BLOG ARCHIVE -->
        $lable= array( __('Archive' , 'seopress' ) ,"user_blog_archiv_title","user_blog_archiv","user_blog_archiv_tags",'','','user_blog_archiv_noindex');
        seopress_metabox($lable,$user_blog_archiv, 'mu-archive');
        // USER BLOG CATEGORIES -->
        $lable= array( __('Categories' , 'seopress' ) ,"user_blog_cat_title","user_blog_cat","user_blog_cat_tags",'','','user_blog_cat_noindex');
        seopress_metabox($lable,$user_blog_cat, 'mu-category');
        // USER BLOG TAG PAGES-->
        $lable= array( __('Tags' , 'seopress' ) ,"user_blog_tag_pages_title","user_blog_tag_pages","user_blog_tag_pages_tags",'','','user_blog_tag_pages_noindex');
        seopress_metabox($lable,$user_blog_tag_pages, 'mu-tag' );		
        // USER BLOG AUTHOR PAGES-->
        $lable= array( __('Author' , 'seopress' ) ,"user_blog_autor_pages_title","user_blog_autor_pages","user_blog_autor_pages_tags",'','','user_blog_autor_pages_noindex');
        seopress_metabox($lable,$user_blog_autor_pages, 'mu-author' );
        // USER BLOG SEARCH PAGES-->
        $lable= array( __('Search result' , 'seopress' ) ,"user_blog_search_pages_title","user_blog_search_pages","user_blog_search_pages_tags",'','','user_blog_search_pages_noindex');
        seopress_metabox($lable,$user_blog_search_pages, 'mu-search');

        do_action( 'sp_seo_wordpressmu' );
        
        ?>
    </div>
</div>
<? } ?>