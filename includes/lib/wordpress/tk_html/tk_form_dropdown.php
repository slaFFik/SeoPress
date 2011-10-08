<?php

class TK_FORM_DROPDOWN extends TK_FORM_ELEMENT{
	
	var $values;
	
	public function __construct( $id = '' , $name = '' , $value = '', $extra = '' ){
		parent::__construct( $id, $name, $value );

		$this->values = array();
	}
	
	public function add_value( $name = '' , $value = '' , $extra = '' ){
		array_push( $this->values, array( 'name' => $name, 'value' => $value, 'extra' => $extra ) );	
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';
		if( $this->value != '' ) $value = ' value="' . $this->value . '"';
		
		$html = '<input' . $id . $name . $value . ' />';
		
		return $html;
	}
}

?>