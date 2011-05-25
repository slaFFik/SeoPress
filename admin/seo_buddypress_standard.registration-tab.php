<?php 
/**
 * Configuration sub tab for buddypress registration pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_bp_registration">
	<!-- <div class="seopress-tab-head">
   		<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Buddypress registration', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of buddypress registration pages.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>
	</div> -->
    <div class="accordion seopress-meta-boxes">
		<?php
	  
		// Registration site
        $lable= array( __('Registration','seopress') ,"registration_title","registration","registration_tags",'','','registration_noindex');  
        
        seopress_metabox($lable,$bp_seo_registration, 'bp-component-unknown' );
        
        do_action( 'sp_seo_buddypress_standard_profiles'  );
        
        ?>  
	</div>   
</div>