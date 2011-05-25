<?php
/**
 * SeoPress settings page in admin
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/
function seopress_settings(){
	include( 'settings_save.php' ); // Saving posted data	
	
	global $seopress_plugin_url;
	
?>
<div class="wrap">
           
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$(".config-tabs").tabs();
			$(".accordion").accordion({ header: "h3", active: false, autoHeight: false, collapsible:true });
			$(".button").button();
			$(".radioset").buttonset();
		});
    </script>

    <h2><?php _e ('Global options', 'seopress') ?></h2>
    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        
        <div class="config-tabs">
        	
            <!-- Configuration tabs //-->
            <ul>
                <li><a href="#cap_seo_options" ><?php _e ('Seo', 'seopress') ?></a></li>
            </ul>
            <!-- Configuration tabs //-->
            
            <!-- Tab content //-->
            <?php include("settings_seo.tab.php"); ?>
                
            <div class="tab_bottom">
            	<button type="submit" name="seopress_save_settings" id="seopress_save_settings" class="button"><?php _e('Save Settings', 'seopress') ?></button>
            </div>
        </div>    
        
    </form>
    
    <?php include( 'footer.php' ); ?>
    
</div>
<?php } ?>