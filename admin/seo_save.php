<?php
/**
 * Save functions for SEO pages
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

// Update General Seo page to the option table.
function seopress_seo_save(){
	global $current_user;
	
	$msg = false;
	if ( isset( $_POST['seopress_save_seo'] ) ) {
		
		sp_save_wp();
				
		do_action( 'sp_save_seo' );
		
		echo '<div class="updated"><p>' . __( 'Seo settings saved successfully.', 'seopress') . '</p></div>';    
	}	
}
seopress_seo_save();

function sp_save_wp(){
	seopress_save_buddypress_components();
}

function seopress_save_buddypress_components(){
	
	$componentspage_types = $_POST['componentspage-types'];
	$bp_seo_plugins = array(); 
		
	/*
	* Saving component configuration
	*/
	update_option( 'bp_seo_plugins' , $componentspage_types );
	
	/*
	* Saving components
	*/
	$main_comp_slugs = $_POST['main_comp_slug'];
	$sub_comp_slugs = $_POST['sub_comp_slug'];
	
	$i = 0;
	
	if( is_array( $main_comp_slugs ) ){
	
		foreach($main_comp_slugs as $main_comp_slug){
		
			$bp_seo_tmp = array();
			
			if( $sub_comp_slugs[$i] == "" ) { // If is plugin main page
			
				$title = $main_comp_slug . '_title';
				if( isset( $_POST[$title] ) ) $bp_seo_tmp[0] = $_POST[$title];
				
				$desc = $main_comp_slug . '_desc';
				if( isset( $_POST[$desc] ) ) $bp_seo_tmp[1] .= $_POST[$desc];
				     
				$tag = $main_comp_slug . '_tags';
				if ( isset( $_POST[$tag] ) ) $bp_seo_tmp[2] .= $_POST[$tag];
				
				$noindex = $main_comp_slug . '_noindex';
				if( isset( $_POST[$noindex] ) ) $bp_seo_tmp[3] .= $_POST[$noindex];
			
				// Updating
				$option_name = 'bp_seo_' . $main_comp_slug;
				update_option( $option_name, $bp_seo_tmp );
				
			} else {

				$title = $main_comp_slug  . '_' . $sub_comp_slugs[$i] .'_title';
				if( isset( $_POST[$title] ) ) $bp_seo_tmp[0] = $_POST[$title];
				
				$desc = $main_comp_slug . '_' . $sub_comp_slugs[$i] .'_desc';
				if( isset( $_POST[$desc] ) ) $bp_seo_tmp[1] .= $_POST[$desc];
				     
				$tag = $main_comp_slug . '_'. $sub_comp_slugs[$i] .'_tags';
				if ( isset( $_POST[$tag] ) ) $bp_seo_tmp[2] .= $_POST[$tag];
				
				$noindex = $main_comp_slug . '_' . $sub_comp_slugs[$i] .'_noindex';
				if( isset( $_POST[$noindex] ) ) $bp_seo_tmp[3] .= $_POST[$noindex];
				
				// Updating
				$option_name = 'bp_seo_'.$main_comp_slug.'_'.$sub_comp_slugs[$i];
				update_option( $option_name , $bp_seo_tmp );
				
				
			}

			/*
			echo "Main: " .  $main_comp_slug."<br>";
			echo "Sub: " .  $sub_comp_slugs[$i]."<br>";
			echo "Title: " .  $title . " : " . $_POST[$title] . "<br>";
			echo "Description: " .  $desc . " : " . $_POST[$desc] . "<br>";
			echo "Keywords: " .  $tag . " : " . $_POST[$tag] .  "<br>";
			echo "Option name: " . $option_name . "<br>";
			
			print_r_html( $bp_seo_tmp );
			*/
			
			$i++;
		}
	}
}

?>