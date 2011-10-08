<?php

class TK_FORM_BUTTON extends TK_FORM_ELEMENT{
	var $extra;
	var $submit;
	
	public function __construct( $name, $value, $id, $extra = '', $submit = true ){
		parent::__construct( $name, $value, $id );
		$this->extra = $extra;
		$this->submit = $submit;
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';
		if( $this->value != '' ) $value = ' value="' . $this->value . '"';
		if( $this->extra != '' ) $extra = $this->extra;
		
		if( $this->submit ){
			$html = '<input type="submit"' . $id . $name . $value . $extra . ' />';
		}else{
			$html = '<input type="button"' . $id . $name . $value . $extra . ' />';
		}
		return $html;
	}
}

function tk_form_button( $name, $value, $id = '', $extra = '', $submit = true ){
	$textfield = new TK_FORM_BUTTON( $name, $value, $id, $extra, $submit );
	return $textfield->get_html();
}

?>