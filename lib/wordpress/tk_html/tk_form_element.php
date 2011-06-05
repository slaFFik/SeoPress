<?php

class TK_FORM_ELEMENT{
	var $id;
	var $name;
	var $value;
	
	public function __construct( $id = '' , $name = '' , $value = '' ){
		$this->id = $id;
		$this->name = $name;
		$this->value = $value;
	}
	
	public function get_html(){
	}
	
	public function write_html(){
		echo $this->get_html();		
	}
}

?>