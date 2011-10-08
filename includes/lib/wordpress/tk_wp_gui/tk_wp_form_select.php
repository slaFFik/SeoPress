<?php 

class TK_WP_FORM_SELECT extends TK_FORM_SELECT{
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
				
		parent::__construct( $field_name, $value, $id, $extra );

	}			
}

?>