<?php
/**
 * SeoPress SEO Settings page in admin
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

function seopress_seo(){
	include( 'seo_save.php' ); // Saving posted data
	
	include( 'seo_meta_box.php' ); // Meta box for title, description and keyword entry
	include( 'seo_init_bp_vars.php' ); // Initializing buddypress variables
	
	
	global $seopress_plugin_url;
	
?>
<div class="wrap">
           
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$( ".config-tabs" ).tabs();
			$( ".accordion" ).accordion({ header: "h3", active: false, autoHeight: false, collapsible:true });
		});
    </script>

    <h2><?php _e ('Seo Settings', 'seopress') ?></h2>
    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        
        <div class="config-tabs">
        	
            <!-- Configuration tabs //-->
            <ul>
                <li><a href="#cap_main_blog" ><?php _e ('Wordpress', 'seopress') ?></a></li>
                
                <?php if(defined( 'SITE_ID_CURRENT_SITE' )){?>
                <li><a href="#cap_user_blogs" ><?php _e ('Wordpress Network', 'seopress') ?></a></li>
                <?php } ?>
                
                <?php if ( defined( 'BP_VERSION' ) ){?>  
                <li><a href="#cap_bp_standard" ><?php _e ('Buddypress', 'seopress') ?></a></li>
	                <?php if ( sp_is_bp_plugin_installed() ){ ?>
	                <li><a href="#cap_bp_plugins"><?php _e ( 'Buddypress Plugins', 'seopress'); ?></a></li>
	                <?php } ?>
                <?php } ?>
            </ul>
            <!-- Configuration tabs //-->
            
            <!-- Tab content //-->
            <?php include("seo_wordpress_blog.tab.php"); ?>
            <?php include("seo_wordpressmu_blog.tab.php"); ?>            
        
            <?php if( defined( 'BP_VERSION' ) ){ ?>
				<?php if(in_array('blogs',$bp->active_components) || in_array('groups',$bp->active_components) || in_array('activity',$bp->active_components) || in_array('members',$bp->active_components) || in_array('forums',$bp->active_components)){ ?>
                	
                    <?php include("seo_buddypress_standard.tab.php"); ?>
                    <?php if( sp_is_bp_plugin_installed() ) { ?>
                    	<?php include("seo_buddypress_plugins.tab.php"); ?>
                    <?php } ?>                    
                     
                <?php } ?>
			<?php } ?>
            <!-- Tab content end //-->
                
            <div class="tab_bottom">
            	<button type="submit" name="seopress_save_seo" id="seopress_save_seo" class="button"><?php _e('Save Settings', 'seopress') ?></button>
            </div>
        </div>    
        
    </form>
    
	<?php include( 'footer.php' ); ?>
	
	<?php 
		
	global $bp;
        
        echo '<pre>';
        print_r($bp);
        echo '</pre>'
        
	?>
    
</div>
<?php } ?>