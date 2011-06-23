<?php

class TK_WP_FORM_CHECKBOX extends TK_FORM_CHECKBOX{
	
	var $option_group;
	
	public function __construct( $name, $option_group, $id = '', $extra = '' ){
		$value = get_option( $option_group . '_values' );
		
		$this->option_group = $option_group;
		
		$field_name = $option_group . '_values[' . $name . ']'; 
		
		$checked = false;
		
		if( $value[ $name ] != '' ){
			$checked = true;
		}
				
		parent::__construct( $field_name , $value[ $name ], $id, $checked, $extra );

	}		
}
function tk_wp_form_checkbox(  $name, $option_group, $id = '', $extra = '' ){
	$textfield = new TK_WP_FORM_CHECKBOX( $name, $option_group, $id, $extra );
	return $textfield->get_html();
}

?>