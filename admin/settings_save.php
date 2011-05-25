<?php
/**
 * Save functions for settings pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

### SeoPress Settings and Delete.
function seopress_settings_save(){

	### Set Keyword Generator on.
	if(isset($_POST['seopress_save_settings'])){
		update_option('bp_seo_keywords',$_POST['bp_seo_keywords']); 
		if(isset($_POST['bp_seo_keywords_quantity'])){
			update_option('bp_seo_keywords_quantity',$_POST['bp_seo_keywords_quantity']); 	
		}
		update_option('bp_seo_meta_box_page',$_POST['bp_seo_meta_box_page']);  		  
		update_option('bp_seo_meta_box_post',$_POST['bp_seo_meta_box_post']);  		
		update_option('bp_seo_metatitle_length',$_POST['bp_seo_metatitle_length']);  		  
		update_option('bp_seo_metadesc_length',$_POST['bp_seo_metadesc_length']);  
		echo '<div class="updated"><p>' . __('General options saved succsessfully.', 'seopress') . '</p></div>'; 

		do_action( 'sp_save_settings' );

	}

	### Delete SeoPress.
	if(isset($_POST['bp-seo-remove'])){
		// Deleting seopress
		/*
		global $wpdb;
		$options = $wpdb->get_results("SELECT * FROM wp_".SITE_ID_CURRENT_SITE."_options ORDER BY option_name");
		foreach((array) $options as $option) :
			$disabled = '';
			$option->option_name = esc_attr($option->option_name);
			if(substr($option->option_name, 0, 6)=='bp_seo') {
				delete_option($option->option_name);     
			}
			if(substr($option->option_name, 0, 9)=='rr_bp_seo') {
				delete_option($option->option_name);     
			}
		endforeach;
		?> <div class="updated"><p>All SeoPress fields in the option table have been deleted successfully.</p></div> <?php
		*/
	}
}

seopress_settings_save();

?>