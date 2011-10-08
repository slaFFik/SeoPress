<?php

class TK_FORM_CHECKBOX extends TK_FORM_ELEMENT{
	var $extra;
	var $checked;
	
	public function __construct( $name, $value, $id = '' , $checked = false, $extra = '' ){
		parent::__construct( $name, $value, $id );
		$this->extra = $extra;
		$this->checked = $checked;
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';
		if( $this->value != '' ) $value = ' value="' . $this->value . '"';
		if( $this->extra != '' ) $extra = $this->extra;
		if( $this->checked == true ) $checked = ' checked';
				
		$html = '<input type="checkbox" ' . $id . $name . $value . $extra . $checked . ' />';
		
		return $html;
	}
}

function tk_form_checkbox( $name, $value, $id = '' , $checked = false,  $extra = '' ){
	$textfield = new TK_FORM_CHECKBOX( $name, $value, $id, $extra );
	return $textfield->get_html();
}

?>