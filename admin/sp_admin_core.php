<?php

function sp_add_page_type( $page_type ){
	
}

function sp_type_box( $type, $css_class = '' ){
	global $seopress_plugin_url;
	
	$autocomplete_script = $seopress_plugin_url . 'admin/get_tags.php?type=' . $type;
	
	$fields['title'] = array( 'name' => $type . '-title', 'title' => __( 'Title', 'seopress') , 'field-type' => 'textfield', '' => '' ) ;
	$fields['description'] = array( 'name' => $type . '-description', 'title' => __( 'Description', 'seopress') , 'field-type' => 'textfield' ) ;
	$fields['keywords'] =array( 'name' => $type . '-keywords', 'title' => __( 'Keywords', 'seopress') , 'field-type' => 'textfield' ) ;
	
	$fields = apply_filters( 'sp_types_fields', $fields );

	$html.= '<table width="100%" class="form-table"><tbody>';
		
	foreach( $fields AS $key => $field ){
		if( $field['field-type'] == 'textfield' ){
			register_setting( 'sp-settings', $field['name'] );
			
			$html.= '<tr><td width="200"><lable for="' . $field['name'] . '">' . $field['title'] . '</lable></td><td>';			
			$html.= tk_wp_jqueryui_autocomplete( $field['name'] , 'seopress_seo_settings', $field['name'], $autocomplete_script , 'onfocus="this.style.color=\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;"' ) ;			
			$html.= '</td></tr>';
			
			$html = apply_filters( 'type-box-filter-' . $key , $html, $type );
			$html = apply_filters( $field['name'] . '-filter', $html, $type );
		}
		
		$html = apply_filters( 'sp_type_box_field_loop', $html, $type );
	}
	
	$html.= '<tr><td width="200"><lable for="' . $type. '-noindex">' . __( 'Ban searchengines', 'seopress' ) . '</lable></td><td>';			
	$html.= tk_wp_form_checkbox( $type . '-noindex', 'seopress_seo_settings', 'noindex' ) ;
	$html.= '</td></tr>';	
	
	$html = apply_filters( 'sp_type_box_field_html', $html, $type );

	$html.= '</tbody></table>';
	
	return $html;
}

function sp_admin_tab_header( $title = '' , $description = '', $logo = '' ){
	
	$html = '<div class="sp-tab-head">';
	
	if( $logo != '' ){
		$html.=	'<div class="logo"><img src="' . $logo . '" /></div>'; 
	}
	$html.='    	
				<div class="sp-tab-head">        
					<h3>' . $title . '</h3>
              		<p>' . $description . '</p>
				</div>
        		<div style="clear:both;"></div> 
			</div>';
	
	return $html;
}

?>