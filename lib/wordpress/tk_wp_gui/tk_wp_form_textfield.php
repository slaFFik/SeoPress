<?php

class TK_WP_FORM_TEXTFIELD extends TK_FORM_TEXTFIELD{
	
	var $option_group;
	
	public function __construct( $name, $option_group, $id = '', $extra = '' ){
		$value = get_option( $option_group . '_values' );
		
		$this->option_group = $option_group;
		
		$field_name = $option_group . '_values[' . $name . ']'; 
				
		parent::__construct( $field_name , $value[ $name ], $id, $extra );

	}
		
}

function tk_wp_form_textfield( $name, $option_group, $id = '',  $extra = '' ){
	$textfield = new TK_WP_FORM_TEXTFIELD( $name, $option_group, $id, $extra );
	return $textfield->get_html();
}

?>