<?php 
/**
 * Configuration tab for general seo settings
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
?><div id="cap_seo_options" >
	<div class="seopress-tab-head">
    	<div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-seopress.png" /></div>
		<div class="seopress-tab-head  ui-corner-all">        
              <h3><?php _e ('Global Seo Settings', 'seopress'); ?></h3>
              <p><?php _e ('Setup the global settings of the Seo part of the plugin.', 'seopress'); ?></p>
		</div>
        <div style="clear:both;"></div>    
	</div>
	    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        
	<?php 
    
	if(get_option('bp_seo_keywords') == true ){ $keyword_generator_checked = "checked"; } 
	if(get_option('bp_seo_meta_box_page') == true ){ $meta_box_page_checked = "checked"; }
	if(get_option('bp_seo_meta_box_post') == true ){ $meta_box_post_checked = "checked"; }
	
    echo '<table class="widefat">';
						
	echo '<tbody>';	
	
	echo '<tr>';
	echo '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Title', 'seopress') . '</strong></td>';
	echo '</tr>';
	
	echo '<tr>';	
	echo '<td><div class="components_extend">' . __('Standard length of title', 'seopress') . '</div></td>';
	echo '<td><div class="components_extend"><input type="text" name="bp_seo_metadesc_length" length="4" size="3" value="' . get_option('bp_seo_metadesc_length') . '" /> (' . __('number of chars', 'seopress' ) . ')</div></td>';
	echo '</tr>';						
	

	echo '<tr>';
	echo '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Meta boxes in posts and pages', 'seopress') . '</strong></td>';
	echo '</tr>';
	
	echo '<tr>';	
	echo '<td><div class="components_extend">' . __('Hide meta boxes in posts:', 'seopress') . '</div></td>';
	echo '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_post" ' . $meta_box_post_checked . ' value="1" /></div></td>';
	echo '</tr>';		
	
	echo '<tr>';	
	echo '<td><div class="components_extend">' . __('Hide meta boxes in pages:', 'seopress') . '</div></td>';
	echo '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_page" ' . $meta_box_page_checked . ' value="1" /></div></td>';
	echo '</tr>';
	
	do_action( 'seopress_seo_options' );
	
	echo '</tbody>';
	echo '</table>';		
	
	 ?>  
    
    <!--
    <p><strong><?php _e('Delete SeoPress'); ?></strong></p>
    <p><?php _e('I do not want to use SeoPress! Delete all concerning fields from the option table.'); ?></p>
    <p><div class="submit"><input type="submit" onClick="return confirmSubmit()" name="bp-seo-remove" value="<?php _e('Remove SeoPress from the DB', 'buddypress') ?>"  style="font-weight:bold;" /></div></p>	
    //-->
    
    </form>

</div>