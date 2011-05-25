<?php 
/**
 * Configuration sub tab for buddypress member pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_members">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Members', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of buddypress meber pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
		
		// DIRECTORY MEMBERS
		$lable= array( __('Members Directory', 'seopress'), "directory_members_title","directory_members","directory_members_tags",'','','directory_members_noindex');  
        seopress_metabox($lable, $directory_members, 'bp-component-unknown' ); 

        // GROUPS MEMBERS
        $lable= array( __('Members (in Groups)', 'seopress'), "groups_members_title","groups_members","groups_members_tags",'','','groups_members_noindex');  
        seopress_metabox($lable, $groups_members, 'bp-component-unknown' ); 
        
        do_action( 'sp_seo_buddypress_standard_members' );
        
        ?>  
	</div>   
</div>