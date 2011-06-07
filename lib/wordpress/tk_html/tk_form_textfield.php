<?php

class TK_FORM_TEXTFIELD extends TK_FORM_ELEMENT{
	var $extra;
	
	public function __construct( $id, $name, $value, $extra = '' ){
		parent::__construct( $id, $name, $value );
		$this->extra = $extra;
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';
		if( $this->value != '' ) $value = ' value="' . $this->value . '"';
		if( $this->extra != '' ) $extra = $this->extra;
		
		$html = '<input' . $id . $name . $value . $extra . ' />';
		
		return $html;
	}
}

function tk_form_textfield( $id, $name, $value, $extra = '' ){
	$textfield = new TK_FORM_TEXTFIELD( $id, $name, $value, $size = 5, $extra = '' );
	return $textfield->get_html();
}

?>