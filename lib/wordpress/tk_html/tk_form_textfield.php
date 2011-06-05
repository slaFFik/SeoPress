<?php

class TK_FORM_TEXTFIELD extends TK_FORM_ELEMENT{
	
	public function __construct( $id, $name, $value, $extra = '' ){
		parent::__construct( $id, $name, $value );
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';
		if( $this->value != '' ) $value = ' value="' . $this->value . '"';
		
		$html = '<input' . $id . $name . $value . ' />';
		
		return $html;
	}
}

function tk_form_textfield( $id, $name, $value, $extra = '' ){
	$textfield = new TK_FORM_TEXTFIELD( $id, $name, $value, $size = 5, $extra = '' );
	return $textfield->get_html();
}

?>