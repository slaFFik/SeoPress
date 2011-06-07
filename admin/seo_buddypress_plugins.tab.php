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
	
	$bp_seo_components = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );	
	// Searching for component slugs and adding to array
	$bp_components = sp_get_bp_components();
	
	$html.= sp_admin_tab_header( __( 'Buddypress Plugins', 'seopress'), __( 'Setup your title and meta tags of the buddypress plugins you have installed.', 'seopress'), $seopress_plugin_url . 'images/logo-buddypress.png' );
	
	$html.= sp_admin_bp_plugins_tabs();

	$html.= '<h3>' .  __( 'Configurate plugins', 'seopress') . '</h3>';
	
	$i = 0;
				
	/***
	* Component configurator
	*/
	
	$accordion = new TK_WP_JQUERYUI_ACCORDION();		
	
	
	// Runnung all components
	foreach ($bp_components as $bp_component) {
		
		if( $bp_component != 'profile' && 
			$bp_component != 'activity' && 
			$bp_component != 'blogs' && 
			$bp_component != 'forums' && 
			$bp_component != 'friends' && 
			$bp_component != 'groups' && 
			$bp_component != 'messages'&& 
			$bp_component != 'settings') {
			
			// Title of component
			$component_name = ucwords( strtolower( str_replace( '_', ' ', $bp_component ) ) );
		
			apply_filters( 'sp_admin_wp_sections', $sections );	

			if( isset(
				$bp_seo_components[$bp_component][directory]) && 
				$bp_seo_components[$bp_component][directory] == 1)
			{ 
				$checked = 'checked';
			} else {
				$checked =''; 
			}
			
			
			/*
			* Component extend fields
			*/
			
			$content = '<div class="seopress-components-text"><p>' . sprintf( __( 'Setup the tabs of "%s". Any checked entry wil let appear a meta box.'  , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) .'</p></div>';
			
			
			$content.= '<table class="widefat">';
			
			$content.= '<tbody>';						
			
			$content.= '<tr>';
			$content.= '<td width="50%"><div class="components_extend"><strong>' . sprintf( __( '"%s" has a directory page:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div></td>';
			$content.= '<td width="50%"><div class="components_extend"><input name="componentspage-types[' . $bp_component . '][directory]" type="checkbox" '.$checked.' value="1"></div></td>';
			$content.= '</tr>';
			
			$content.= '<tr>';		
            $content.= '<td colspan="2"><div class="components_extend"><strong>' . sprintf(  __( '"%s" creating pages in following components:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div>';
			$content.= '<input name="componentspage-types[' . $bp_component . '][slug]" type="hidden" ' . $checked . ' value="' . $bp_component . '" /></td>' ;
			$content.= '</tr>';	

			// $accordion->add_section( $section['type'], $section['title'], sp_type_box( $section['type'], $section['values'] ) );

			$bp_main_component = $bp_component;						
			
			// Runnung all extendable components of this component
			foreach( $bp_components as $bp_sub_component ){
				
				if( $bp_sub_component != 'messages' && $bp_sub_component != 'settings' && $bp_sub_component != 'blogs' && $bp_sub_component != $bp_component ){							
					 
					if( isset( $bp_seo_components[ $bp_main_component ]['plugin_extends'] ) ){
						
						if( in_array( $bp_sub_component, $bp_seo_components[$bp_main_component]['plugin_extends'] ) ) {
							$checked = 'checked';
						} else {
							$checked ='';
						}
					} else {
						$checked ='';
					}
					
					$component_name = ucwords( strtolower( str_replace( '_', ' ', $bp_sub_component ) ) );
					$content.= '<tr>';
					$content.= '<td><div class="components_extend"><lable for="componentspage-types[' . $bp_main_component . '][plugin_extends][]">' . $component_name . '</lable></div></td>';
					$content.= '<td><div class="components_extend"><input name="componentspage-types[' . $bp_main_component . '][plugin_extends][]" id="componentspage-types[' . $bp_main_component . '][plugin_extends][]"  type="checkbox" '.$checked.'  value="' . $bp_sub_component . '" /></div></td>'; 
					$content.= '</tr>';								
													
				}
				$checked = '';
			}
			$content.= '</tbody>';
			$content.= '</table>';
			
			$accordion->add_section( $bp_component, ucwords( strtolower(  $bp_main_component ) ) , $content );										
		}					
	}	

	$html.= $accordion->get_html();
	
	$button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __('Save settings', 'seopress') . '" /></p>';
	
	$html.= $button;	
	
	return $html;
		
}

function sp_admin_bp_plugins_tabs(){
	global $bp; 

	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	$bp_components = sp_get_bp_components(); 
	
	$tabs = new	TK_WP_JQUERYUI_TABS();	
	
	foreach ($bp_components as $bp_component) {
		if(	sp_is_bp_plugin ( $bp_component ) ){
			$tab_name = ucwords( strtolower( str_replace( '_', ' ', $bp_component ) ) );
			$tabs->add_tab( 'cap_' . $bp_component , $tab_name, seopress_component_tab( $bp_component ) );
		}
	}
	
	$html = $tabs->get_html();
	
	return $html;
}

function seopress_component_tab( $bp_component ){
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	
	$is_component = 0;
	
	$accordion = new TK_WP_JQUERYUI_ACCORDION();		
	
	// If component has directory view
	if( isset( $bp_seo_components[ $bp_component ][ 'directory' ] ) && $bp_seo_components[ $bp_component ][directory] == 1){
		
		$meta = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_' . $bp_component );
		
		$lable= array(
			'Directory',
			$bp_component . '_title',
			$bp_component . '_desc',
			$bp_component . '_tags',
			$bp_component,
			'',
			$bp_component . '_noindex'	
		);
		
		$is_component = 1;
		
		$accordion->add_section( 'bp-component-' . $bp_component, sprintf( __( '%s Directory'  , 'seopress' ), ucwords( strtolower(  $bp_component ) ) ), sp_type_box( $bp_component, $values ) );
		
		 
	}
	
	if( isset( $bp_seo_components[$bp_component][ 'plugin_extends' ] )){

		foreach( $bp_seo_components[ $bp_component ][ 'plugin_extends' ] as $main_comp ){
			
			$meta = get_blog_option( SITE_ID_CURRENT_SITE , "bp_seo_" . $main_comp . "_" . $bp_component );
			
			$lable = array(
				ucwords( $bp_component ) . ' ' . __( 'page in', 'seopress') . ' ' . ucwords( $main_comp ) ,
				$main_comp . '_' . $bp_component . "_title",
				$main_comp . '_' . $bp_component . "_desc",
				$main_comp . '_' . $bp_component . "_tags",
				$main_comp,
				$bp_component,
				$main_comp . '_' . $bp_component . "_noindex"
			);
			
			$is_component = 1;
			
			$accordion->add_section( 'bp-component-' .$main_comp . '_' . $bp_component, sprintf( __( 'Page in %s'  , 'seopress' ), ucwords( strtolower(  $main_comp ) ) ), sp_type_box( $bp_component, $values ) );
			
			
		}
	}
	
	$html = $accordion->get_html();
	
	if( $is_component == 0 ){
		return '<div class="seopress-notice"><p>' . sprintf(__('Please config your "%s" plugin before you setup your component meta! (Do this at the bottom of this page)'), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</p></div>';
	}else{
		return $html;
	}
}

?>