<?php

class TK_FORM_TEXTFIELD extends TK_FORM_ELEMENT{
	var $extra;
	
	public function __construct( $name, $value, $id = '', $extra = '' ){
		parent::__construct( $name, $value, $id );
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

function tk_form_textfield( $name, $value, $id = '', $extra = '' ){
	$textfield = new TK_FORM_TEXTFIELD( $name, $value, $id, $extra );
	return $textfield->get_html();
}

?>