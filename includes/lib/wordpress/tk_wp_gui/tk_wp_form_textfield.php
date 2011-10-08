<?php

class TK_WP_FORM_TEXTFIELD extends TK_FORM_TEXTFIELD{
	
	var $option_group;
	
	public function __construct( $name, $option_group, $id = '', $extra = '' ){
		global $post;
		
		if( $post != '' ){

			$option_group_value = get_post_meta( $post->ID , $option_group , true );
			
			$field_name = $option_group . '[' . $name . ']';
			$value = $option_group_value[ $name ];

		}else{
			$value = get_option( $option_group  . '_values' );
			
			$this->option_group = $option_group;
			$field_name = $option_group . '_values[' . $name . ']';	
			
			$value = $value[ $name ];
		} 
				
		parent::__construct( $field_name , $value, $id, $extra );

	}
		
}

function tk_wp_form_textfield( $name, $option_group, $id = '',  $extra = '' ){
	$textfield = new TK_WP_FORM_TEXTFIELD( $name, $option_group, $id, $extra );
	return $textfield->get_html();
}

?>