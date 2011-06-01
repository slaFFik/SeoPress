<?php 
/**
 * Configuration sub tab for buddypress blogs pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_blogs">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Blogs', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of buddypress blog pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
		
		// DIRECTORY BLOGS
		$lable= array( __('Blogs Directory', 'seopress') ,"directory_blogs_title","directory_blogs","directory_blogs_tags",'','','directory_blogs_noindex');  
        seopress_metabox($lable,$directory_blogs, 'bp-component-unknown' );    
 		
        /*
        $lable= array("BLOGS","profil_blogs_title","profil_blogs","profil_blogs_tags",'','','profil_blogs_noindex');  
        seopress_metabox($lable,$profil_blogs, 'bp-component-unknown' ); 
        
        // PROFILE BLOGS RECENT POSTS
        $lable= array("BLOGS RECENT POSTS","profil_blogs_recent_posts_title","profil_blogs_recent_posts","profil_blogs_recent_posts_tags",'','','profil_blogs_recent_posts_noindex');  
        seopress_metabox($lable,$profil_blogs_recent_posts, 'bp-component-unknown' ); 
        
        // PROFILE BLOGS
        $lable= array("BLOGS RECENT COMMENTS","profil_blogs_recent_commments_title","profil_blogs_recent_commments","profil_blogs_recent_commments_tags",'','','profil_blogs_recent_commments_noindex');  
        seopress_metabox($lable,$profil_blogs_recent_commments, 'bp-component-unknown' );

        do_action( 'sp_seo_buddypress_standard_blogs' );
        */  
        ?>  
	</div>   
</div>