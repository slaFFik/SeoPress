<?php 
/**
 * Configuration sub tab for buddypress group pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_groups">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Groups', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of group pages like home, wire, forum, forum topic and member.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
		
		// DIRECTORY GROUPS 	-->
        $lable= array( __('Group Directory', 'seopress') ,"directory_groups_title","directory_groups","directory_groups_tags",'','','directory_groups_noindex');  
        seopress_metabox( $lable, $directory_groups, 'bp-component-groups' ); 
        
        if( in_array( 'activity', $bp->active_components ) && in_array( 'activity', $bp->active_components ) ){            	 
            // PROFILE ACTIVITY GROUPS
            $lable= array( __('Group Activities', 'seopress'), "profil_activity_groups_title", "profil_activity_groups", "profil_activity_groups_tags", '', '', 'profil_activity_groups_noindex' );  
            seopress_metabox( $lable, $profil_activity_groups, 'bp-component-activity-groups' ); 
        }        
        
        // GROUPS HOME
        $lable= array( __('Group Home', 'seopress') ,"groups_home_title","groups_home","groups_home_tags",'','','groups_home_noindex');  
        seopress_metabox($lable,$groups_home, 'bp-component-groups-home' );
        
        if(in_array('forums',$bp->active_components)){
			// GROUPS FORUM
	        $lable= array( __('Group Forum', 'seopress') ,"groups_forum_title","groups_forum","groups_forum_tags",'','','groups_forum_noindex');  
	        seopress_metabox( $lable,$groups_forum, 'bp-component-groups-forum' ); 
	        
	        // GROUPS FORUM TOPIC
	        $lable= array( __('Group Forum Topic', 'seopress') ,"groups_forum_topic_title","groups_forum_topic","groups_forum_topic_tags",'','','groups_forum_topic_noindex');  
	        seopress_metabox( $lable,$groups_forum_topic, 'bp-component-groups-forum-topic' );     
        }
        
		// GROUPS MEMBERS
        $lable= array( __('Group Members', 'seopress'), "groups_members_title","groups_members","groups_members_tags",'','','groups_members_noindex');  
        seopress_metabox($lable, $groups_members, 'bp-component-groups-members' );
        
       //  $lable= array( __('Groups (in Profile)', 'seopress') ,"profil_groups_title","profil_groups","profil_groups_tags",'','','profil_groups_noindex');  
       //  seopress_metabox($lable,$profil_groups, 'bp-component-groups' ); 
         
        // GROUPS WIRE ????
        if(in_array('wire',$bp->active_components)){
            $lable= array("WIRE","groups_wire_title","groups_wire","groups_wire_tags",'','','groups_wire_noindex');  
            seopress_metabox($lable,$groups_wire, 'bp-component-groups' ); 
        }

        do_action( 'sp_seo_buddypress_standard_groups' );
        
        ?>  
	</div>   
</div>