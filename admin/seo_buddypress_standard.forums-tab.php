<?php 
/**
 * Configuration sub tab for buddypress forum pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_forums">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress Forum', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of buddypress forum pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
		
		// DIRECTORY FORUMS
		$lable= array( __('Forums Directory', 'seopress') ,"directory_forums_title","directory_forums","directory_forums_tags",'','','directory_forums_noindex');  
        seopress_metabox($lable,$directory_forums, 'bp-component-unknown' ); 
        
		// GROUPS FORUM
        $lable= array( __('Forum (in Group)', 'seopress') ,"groups_forum_title","groups_forum","groups_forum_tags",'','','groups_forum_noindex');  
        seopress_metabox($lable,$groups_forum, 'bp-component-unknown' ); 
        
        // GROUPS FORUM TOPIC
        $lable= array( __('Forum Topic (in Group)', 'seopress') ,"groups_forum_topic_title","groups_forum_topic","groups_forum_topic_tags",'','','groups_forum_topic_noindex');  
        seopress_metabox($lable,$groups_forum_topic, 'bp-component-unknown' ); 
        
        do_action( 'sp_seo_buddypress_standard_forums' );
         

        ?>  
	</div>   
</div>