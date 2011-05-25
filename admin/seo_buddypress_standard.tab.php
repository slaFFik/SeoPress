<?php 
/**
 * Configuration tab for buddypress
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
global $bp; 

$bp_seo_components = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
	
// Searching for component slugs and adding to array
$bp_components = array();

foreach ( (array) $bp as $key => $value ) {
	if( $bp->$key->slug != '' ) array_push( $bp_components, $bp->$key->slug );
}

?>
	<div id="cap_bp_standard">

        <div class="seopress-tab-head">
            <div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>    
              <h3><?php _e ('Buddypress', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of the buddypress pages.', 'seopress'); ?></p>
            <div style="clear:both;"></div>
        </div>
        
       <?php // include( "seo_buddypress_standard.sub_tab.php" ); ?>
        
        <div class="seopress-config">
        	<h3><?php _e ('Setup Buddypress pages', 'seopress'); ?></h3>
        	
        	<div class="config-tabs">
    			<ul>
    			<?php 
    			if( in_array( 'activity', $bp->active_components ) ){ echo '<li><a href="#cap_bp_activities">' . __('Activity','seopress')  .'</a></li>';	}
    			echo '<li><a href="#cap_bp_members">' .  __('Members','seopress')  .'</a></li>';
    			echo '<li><a href="#cap_bp_profiles">' .  __('Profiles','seopress')  .'</a></li>';
    			if ( in_array( 'groups', $bp->active_components ) ){ echo '<li><a href="#cap_bp_groups">' . __('Groups','seopress')  .'</a></li>'; }
    			if( in_array( 'forums', $bp->active_components ) ){ echo '<li><a href="#cap_bp_forums">' .  __('Forums','seopress')  .'</a></li>'; }
    			if( in_array( 'blogs', $bp->active_components ) ){ echo '<li><a href="#cap_bp_blogs">' .  __('Blogs','seopress')  .'</a></li>'; }
    			if( get_option('users_can_register')){ echo '<li><a href="#cap_bp_registration">' . __('Registration','seopress')  .'</a></li>'; }
		
    			?>	
    			</ul>
    			
    			<?php if( in_array( 'activity', $bp->active_components ) ){ include('seo_buddypress_standard.activities-tab.php'); } ?>
    			<?php include('seo_buddypress_standard.members-tab.php'); ?>
    			<?php include('seo_buddypress_standard.profiles-tab.php'); ?>
    			<?php if( in_array( 'groups', $bp->active_components ) ){ include('seo_buddypress_standard.groups-tab.php'); } ?>
    			<?php if( in_array( 'forums', $bp->active_components ) ){ include('seo_buddypress_standard.forums-tab.php'); } ?>
    			<?php if( in_array( 'blogs', $bp->active_components ) ){ include('seo_buddypress_standard.blogs-tab.php'); } ?>
    			<?php if( get_option('users_can_register')){ include('seo_buddypress_standard.registration-tab.php'); }?>
    			
    		</div>
        </div>
    </div>