<?php

class TK_WP_FORM_TEXTFIELD extends TK_FORM_TEXTFIELD{
	
	var $option_group;
	
	public function __construct( $id, $name, $extra = '', $option_group = '' ){
		$value = get_option( $option_group . '_values' );
		
		$this->option_group = $option_group;
		
		$field_name = $option_group . '_values[' . $name . ']'; 
				
		parent::__construct( $id, $field_name , $value[ $name ], $extra );

	}
		
}

function tk_wp_admin_form_textfield( $id, $name, $extra = '', $option_group = '' ){
	$textfield = new TK_WP_FORM_TEXTFIELD( $id, $name, $extra, $option_group );
	return $textfield->get_html();
}

?>