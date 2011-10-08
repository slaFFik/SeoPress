<?php 
/**
 * Configuration tab for buddypress plugins
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
function sp_admin_bp_plugins_tab(){
	global $bp, $seopress_plugin_url;
	
	// Getting saved data
	$bp_seo_components = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' ); // <===== Have to be replaced with framework !!!	

	
	// Adding tab header
	$html.= sp_admin_tab_header( __( 'Buddypress Plugins', 'seopress'), __( 'Setup your title and meta tags of the buddypress plugins you have installed.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-buddypress.png' );
	
	// Showing component configuration
	$html.= sp_admin_bp_plugins_tabs();
	

	// Configurating Buddypress plugins
	
	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save settings', 'seopress' ) . '" /></p>';
	
	$html.= $button;	
	
	return $html;
	
	
		
}

function sp_admin_bp_plugins_tabs(){
	global $bp; 
	
	// Getting saved data
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins"); // <===== Have to be replaced with framework !!!	
	
	
	$tabs = new	TK_WP_JQUERYUI_TABS();	
	
	// Getting all active components
	$bp_components = sp_get_bp_components();
	 
	foreach ($bp_components as $bp_component) {
		
		// If component is a plugin -> Add tab
		if(	sp_is_bp_plugin ( $bp_component ) ){
			$tab_name = ucwords( strtolower( str_replace( '_', ' ', $bp_component ) ) );
			$tabs->add_tab( 'cap_' . $bp_component , $tab_name, seopress_component_tab( $bp_component ) );
		}
	}
	
	$html = $tabs->get_html();
	
	return $html;
}

function seopress_component_tab( $bp_component ){
	
	$sp_seo_settings = get_option('seopress_seo_settings_values');
	
	$is_component = 0;
	
	$accordion = new TK_WP_JQUERYUI_ACCORDION();		
	
	// If component has directory view
	if( $sp_seo_settings['bp-componentspage-types-' . $bp_component . '-directory'] == 'on' ){
		$is_component = 1;
		$accordion->add_section( 'bp-component-' . $bp_component, sprintf( __( '%s Directory'  , 'seopress' ), ucwords( strtolower(  $bp_component ) ) ), sp_type_box( 'bp-component-' . $bp_component ) );
	}
	
	// Getting all active components
	$bp_components = sp_get_bp_components();
	
	foreach( $bp_components as $sub_comp ){
		
		// If component creates a page in sub component 
		if( $sp_seo_settings['bp-componentspage-types-' . $bp_component . '-' . $sub_comp] == 'on' ){
			$is_component = 1;
			$accordion->add_section( 'bp-component-' .$bp_component . '-' . $sub_comp, sprintf( __( 'Page in %s'  , 'seopress' ), ucwords( strtolower(  $sub_comp ) ) ), sp_type_box( 'bp-component-' . $sub_comp . '-' . $bp_component ) );
		}
	}
	
	$accordion->add_section( 'bp-component-config-' .$bp_component . '-' . $sub_comp, sprintf( __( 'Configurate "%s" plugin'  , 'seopress' ), ucwords( strtolower( $bp_component ) ) ), seopress_component_config( $bp_component ), ' class="settings"' );
	
	$html = $accordion->get_html();
	
	if( $is_component == 0 ){
		// return '<div class="seopress-notice"><p>' . sprintf(__('Please config your "%s" plugin before you setup your component meta! (Do this at the bottom of this page)'), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</p></div>';
		return seopress_component_config( $bp_component );
	}else{
		return $html;
	}
}

function seopress_component_config( $bp_component ){
	
	$bp_components = sp_get_bp_components();	
	
	$content = '<h4>' . sprintf( __( 'Please config your "%s" plugin:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ). '</h4>';
				
	$content.= '<table class="widefat">';
	
	$content.= '<tbody>';						
	
	$content.= '<tr>';
	$content.= '<td width="50%"><div class="components_extend"><strong>' . sprintf( __( '"%s" has a directory page:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div></td>';
	// $content.= '<td width="50%"><div class="components_extend"><input name="componentspage-types[' . $bp_component . '][directory]" type="checkbox" '.$checked.' value="1"></div></td>';
	$content.= '<td width="50%"><div class="components_extend">' . tk_wp_form_checkbox( 'bp-componentspage-types-' . $bp_component . '-directory', 'seopress_seo_settings' ) . '</div></td>';
	$content.= '</tr>';
	
	$content.= '<tr>';		
            $content.= '<td colspan="2"><div class="components_extend"><strong>' . sprintf(  __( '"%s" creating pages in following components:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div>';
	// $content.= '<input name="componentspage-types[' . $bp_component . '][slug]" type="hidden" ' . $checked . ' value="' . $bp_component . '" /></td>' ;
	$content.= '<input name="seopress_values[bp-componentspage-types-' . $bp_component . '-slug]" type="hidden" ' . $checked . ' value="' . $bp_component . '" /></td>' ;
	$content.= '</tr>';	

	$bp_main_component = $bp_component;						
	
	// Runnung all extendable components of this component
	foreach( $bp_components as $sub_comp ){
		
		if( $sub_comp != 'messages' && $sub_comp != 'settings' && $sub_comp != 'blogs' && $sub_comp != $bp_component ){							
			 					
			$component_name = ucwords( strtolower( str_replace( '_', ' ', $sub_comp ) ) );
			$content.= '<tr>';
			$content.= '<td><div class="components_extend"><lable for="componentspage-types[' . $bp_main_component . '][plugin_extends][]">' . $component_name . '</lable></div></td>';
			// $content.= '<td><div class="components_extend"><input name="componentspage-types[' . $bp_main_component . '][plugin_extends][]" id="componentspage-types[' . $bp_main_component . '][plugin_extends][]"  type="checkbox" '.$checked.'  value="' . $bp_sub_component . '" /></div></td>';
			$content.= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'bp-componentspage-types-' . $bp_main_component . '-' . $sub_comp . '', 'seopress_seo_settings' ) . '</div></td>'; 
			$content.= '</tr>';								
											
		}
		$checked = '';
	}
	$content.= '</tbody>';
	$content.= '</table>';
	
	return $content;
}

?>