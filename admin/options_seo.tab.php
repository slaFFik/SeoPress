<?php 
/**
 * Configuration tab for general seo settings
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/

function sp_admin_settings_tab(){
	global $seopress_plugin_url;
	
	$html.= sp_admin_tab_header( __('Global Seo options', 'seopress'), __('Setup the global settings of the Seo part of the plugin.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-wordpress.png' );
	    
    $html.= '<table class="widefat">';
						
	$html.= '<tbody>';	
	
	$html.= '<tr>';
	$html.= '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Title', 'seopress') . '</strong></td>';
	$html.= '</tr>';
	
	$html.= '<tr>';	
	$html.= '<td><div class="components_extend">' . __('Show pagination', 'seopress') . '</div></td>';
	$html.= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'show_pagination', 'seopress_options', 'show_pagination' ) . '</div></td>';	
	$html.= '</tr>';
	
	
	$html.= '<tr>';	
	$html.= '<td><div class="components_extend">' . __('Standard length of title', 'seopress') . '</div></td>';
	// $html.= '<td><div class="components_extend"><input type="text" name="bp_seo_metadesc_length" length="4" size="3" value="' . get_option('bp_seo_metadesc_length') . '" /> (' . __('number of chars', 'seopress' ) . ')</div></td>';
	$html.= '<td><div class="components_extend">' . tk_wp_form_textfield( 'std_title_legth', 'seopress_options', 'std_title_legth' ) . ' (' . __('number of chars', 'seopress' ) . ')</div></td>';	
	$html.= '</tr>';		

	$html.= '<tr>';	
	$html.= '<td><div class="components_extend">' . __('Standard length of meta description', 'seopress') . '</div></td>';
	// $html.= '<td><div class="components_extend"><input type="text" name="bp_seo_metadesc_length" length="4" size="3" value="' . get_option('bp_seo_metadesc_length') . '" /> (' . __('number of chars', 'seopress' ) . ')</div></td>';
	$html.= '<td><div class="components_extend">' . tk_wp_form_textfield( 'std_metadesc_legth', 'seopress_options', 'std_metadesc_legth' ) . ' (' . __('number of chars', 'seopress' ) . ')</div></td>';	
	$html.= '</tr>';			
	

	$html.= '<tr>';
	$html.= '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Meta boxes in posts and pages', 'seopress') . '</strong></td>';
	$html.= '</tr>';
	
	$html.= '<tr>';	
	$html.= '<td><div class="components_extend">' . __('Hide meta boxes in posts:', 'seopress') . '</div></td>';
	// $html.= '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_post" ' . $meta_box_post_checked . ' value="1" /></div></td>';
	$html.= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'metabox_post', 'seopress_options', 'metabox_post' ) . '</div></td>';
	$html.= '</tr>';
	
	$html.= '<tr>';	
	$html.= '<td><div class="components_extend">' . __('Hide meta boxes in pages:', 'seopress') . '</div></td>';
	// $html.= '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_page" ' . $meta_box_page_checked . ' value="1" /></div></td>';
	$html.= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'metabox_page', 'seopress_options', 'metabox_page' ) . '</div></td>';
	$html.= '</tr>';
	
	do_action( 'seopress_seo_options' );
	
	$html.= '</tbody>';
	$html.= '</table>';	

	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress' ) . '" /></p>';
	
	$html.= $button;	
	
	return $html;
}
?>