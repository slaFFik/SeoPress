<?php 
/**
 * Configuration sub tab for buddypress profile pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_profiles" >
	<!--  <div class="seopress-tab-head">
	    <div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Profiles', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of Buddypress profile pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>   
	</div> -->
    
    <div class="accordion seopress-meta-boxes">
		<?php 	
        
        // Profile 
        $lable= array( __('Profile','seopress') ,"profil_title","profil","profil_tags",'','','profil_noindex');  
        seopress_metabox($lable, $profil, 'bp-component-profile-public' );

		// Activity
        if(in_array('activity',$bp->active_components)){ 
        	$lable= array( __('Profile Activity', 'seopress'),"profil_activity_title","profil_activity","profil_activity_tags",'','','profil_activity_noindex');  
        	seopress_metabox($lable,$profil_activity, 'bp-component-activity-just-me' );
        } 	        
        
        // Profile Blogs
        if(in_array('blogs',$bp->active_components)){ 
        	$lable= array( __('Profile Blogs','seopress') ,"profil_blogs_title","profil","profil_blogs_tags",'','','profil_blogs_noindex');  
        	seopress_metabox($lable, $profil_blogs, 'bp-component-blogs-my-blogs' );              
        }
        
        // PROFILE FRIENDS  -->
        if(in_array('friends',$bp->active_components)){ 
          	$lable= array( __('Profile Friends','seopress') ,"profil_friends_title","profil_friends","profil_friends_tags",'','','profil_friends_noindex');  
          	seopress_metabox($lable, $profil_friends, 'bp-component-friends-my-friends' ); 
        }

                // PROFILE FRIENDS  -->
        if(in_array('groups',$bp->active_components)){ 
          	$lable= array( __('Profile Groups','seopress') ,"profil_groups_title","profil_groups","profil_groups_tags",'','','profil_groups_noindex');  
         	seopress_metabox($lable, $profil_groups, 'bp-component-groups-my-groups' ); 
        }        
        
        // PROFILE WIRE  -->
        if(in_array('wire',$bp->active_components)){
            $lable= array("WIRE","profil_wire_title","profil_wire","profil_wire_tags",'','','profil_wire_noindex');  
            seopress_metabox($lable, $profil_wire, 'bp-component-unknown' ); 
        }
        
        ?>
    </div>
</div>