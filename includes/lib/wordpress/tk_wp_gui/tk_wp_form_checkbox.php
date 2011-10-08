<?php

class TK_WP_FORM_CHECKBOX extends TK_FORM_CHECKBOX{
	
	var $option_group;
	
	public function __construct( $name, $option_group, $id = '', $extra = '' ){
		global $post;
		
		if( $post != '' ){

			$option_group_value = get_post_meta( $post->ID , $option_group , TRUE );
			
			$field_name = $option_group . '[' . $name . ']';
			$value = $option_group_value[ $name ];

		}else{
			$value = get_option( $option_group  . '_values' );
						
			$this->option_group = $option_group;
			$field_name = $option_group . '_values[' . $name . ']';	
			
			$value = $value[ $name ];
		} 
		
		$checked = FALSE;
		
		if( $value != '' ){
			$checked = TRUE;
		}
				
		parent::__construct( $field_name , $value, $id, $checked, $extra );

	}		
}
function tk_wp_form_checkbox(  $name, $option_group, $id = '', $extra = '' ){
	$textfield = new TK_WP_FORM_CHECKBOX( $name, $option_group, $id, $extra );
	return $textfield->get_html();
}

?>