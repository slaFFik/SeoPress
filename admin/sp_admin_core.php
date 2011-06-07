<?php

class SP_ADMIN_CORE{
	public function __construct(){
		
	}
	/*
	public function type_box( $type, $values, $css_class = '' ){
		$fields['title'] = array( 'name' => $type . '-title', 'title' => __( 'Title', 'seopress') ,  'value' => $values['title'], 'field-type' => 'textfield' ) ;
		$fields['description'] = array( 'name' => $type . '-description', 'title' => __( 'Description', 'seopress') ,  'value' => $values['description'], 'field-type' => 'textfield' ) ;
		$fields['keywords'] =array( 'name' => $type . '-keywords', 'title' => __( 'Keywords', 'seopress') ,  'value' => $values['keywords'], 'field-type' => 'textfield' ) ;
		
		apply_filters( 'sp_types_fields', $fields );
	
		$html.= '<table width="100%" class="form-table"><tbody>';
		foreach( $fields AS $key => $field ){
			if( $field['field-type'] == 'textfield' ){
				$html.= '<tr><td width="200"><lable for="' . $field['name'] . '">' . $field['title'] . '</lable></td><td><input name="' . $field['name'] . '" id="' . $field['name'] . '" value="' . $field['value'] . '" onfocus="this.style.color=\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;" /></td></tr>';
			}
			apply_filters( 'sp_type_box_field_loop', $fields );
		}
		$html.= '</tbody></table>';
		
		return $html;		
	}
	
	public function sp_admin_tab_header( $id, $title, $description, $sections, $logo = '' ){
		$html = '<div id="' . $id . '" >';
		
		$html.= '<div class="sp-tab-head">';
		
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
	*/
	
}

function sp_type_box( $type, $values, $css_class = '' ){
	
	$fields['title'] = array( 'name' => $type . '-title', 'title' => __( 'Title', 'seopress') ,  'value' => $values['title'], 'field-type' => 'textfield' ) ;
	$fields['description'] = array( 'name' => $type . '-description', 'title' => __( 'Description', 'seopress') ,  'value' => $values['description'], 'field-type' => 'textfield' ) ;
	$fields['keywords'] =array( 'name' => $type . '-keywords', 'title' => __( 'Keywords', 'seopress') ,  'value' => $values['keywords'], 'field-type' => 'textfield' ) ;
	
	apply_filters( 'sp_types_fields', $fields );

	$html.= '<table width="100%" class="form-table"><tbody>';
	foreach( $fields AS $key => $field ){
		if( $field['field-type'] == 'textfield' ){
			register_setting( 'sp-settings', $field['name'] );			
			
			$html.= '<tr><td width="200"><lable for="' . $field['name'] . '">' . $field['title'] . '</lable></td><td>';			
			$html.= tk_wp_admin_form_textfield( $field['name'], $field['name'] , 'onfocus="this.style.color\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;"', 'seopress' ) ;			
			$html.= '</td></tr>';
		}
		
		apply_filters( 'sp_type_box_field_loop', $fields );
	}
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