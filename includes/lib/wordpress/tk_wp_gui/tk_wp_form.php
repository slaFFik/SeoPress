<?php

class TK_WP_FORM extends TK_HTML_FORM{
	
	var $option_group;
	
	public function __construct( $option_group, $id = '' ){
		parent::__construct( 'options.php', 'POST', $id );
		
		$this->option_group = $option_group;
	}
	
	public function get_html(){
		$html = '<input type="hidden" name="option_page" value="' . esc_attr( $this->option_group ) . '" />';
		$html.= '<input type="hidden" name="action" value="update" />';
		$html.= wp_nonce_field( $this->option_group . '-options', "_wpnonce", true , false ) ;
		
		$this->add_element( $html );

		$html = parent::get_html();
		
		return $html;
	}
}

?>