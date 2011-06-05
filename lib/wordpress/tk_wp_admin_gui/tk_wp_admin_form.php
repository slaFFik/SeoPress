<?php

class TK_WP_ADMIN_FORM extends TK_HTML_FORM{
	
	var $option_group;
	
	public function __construct( $option_group ){
		parent::__construct( 'options.php' );
		
		register_setting( $option_group, $option_name );
		do_settings( $option_group );
		
		$this->option_group = $option_group;
	}
	
	public function add_save_button( $lable ){
		$this->add_element( '<input class="button-primary" type="submit" name="' . $lable . '" value="' . $lable . '" />' );
	}
	
	public function get_html(){
		$html = '<input type="hidden" name="option_page" value="' . esc_attr( $this->option_group ) . '" />';
		$html.= '<input type="hidden" name="action" value="update" />';
		$html.= wp_nonce_field( $this->option_group , $name = "_wpnonce", true , false ) ;
		
		$this->add_element( $html );

		$html = parent::get_html();
		
		return $html;
	}
	
}

?>