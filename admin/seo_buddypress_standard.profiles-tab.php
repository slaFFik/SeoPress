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
        
        // PROFILE HOME 	-->
        $lable= array( __('Profile','seopress') ,"profil_title","profil","profil_tags",'','','profil_noindex');  
        seopress_metabox($lable, $profil, 'bp-component-profile-public' );      
        
        
        // PROFILE FRIENDS  -->
        if(in_array('friends',$bp->active_components)){ 
          //  $lable= array( __('Friends','seopress') ,"profil_friends_title","profil_friends","profil_friends_tags",'','','profil_friends_noindex');  
          //  seopress_metabox($lable, $profil_friends, 'bp-component-unknown' ); 
        } 
        
        // PROFILE WIRE  -->
        if(in_array('wire',$bp->active_components)){
            $lable= array("WIRE","profil_wire_title","profil_wire","profil_wire_tags",'','','profil_wire_noindex');  
            seopress_metabox($lable, $profil_wire, 'bp-component-unknown' ); 
        }
        
        ?>
    </div>
</div>