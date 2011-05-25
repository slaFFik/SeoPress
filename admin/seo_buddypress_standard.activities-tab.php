<?php 
/**
 * Configuration sub tab for buddypress acitivity pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_activities">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Activities', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of buddypress activity pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
		
		
        // MAIN BLOG ACTIVITY HOME
        $lable= array( __('Activity Home' , 'seopress' ) ,"main_blog_title","main_blog","main_blog_tags",'','','main_blog_noindex');  
        seopress_metabox ( $lable , $main_blog , 'bp-component-unknown' ); 		
		
		// DIRECTORY ACTIVITY
		$lable= array( __('Activity Directory', 'seopress') ,"directory_activity_title","directory_activity","directory_activity_tags",'','','directory_activity_noindex');  
        seopress_metabox($lable,$directory_activity, 'bp-component-unknown' );        
        
        $lable= array( __('Personal Activity (in Profile)', 'seopress'),"profil_activity_title","profil_activity","profil_activity_tags",'','','profil_activity_noindex');  
        seopress_metabox($lable,$profil_activity, 'bp-component-unknown' ); 
    
        if(in_array('friends',$bp->active_components)){            	 
            // PROFILE ACTIVITY FRIENDS -->
            $lable= array( __('Friends Activity (in Profile)', 'seopress'),"profil_activity_friends_title","profil_activity_friends","profil_activity_friends_tags",'','','profil_activity_friends_noindex');  
            seopress_metabox($lable,$profil_activity_friends, 'bp-component-unknown'); 
        }
        
        do_action( 'sp_seo_buddypress_standard_activities' );

        ?>  
	</div>   
</div>