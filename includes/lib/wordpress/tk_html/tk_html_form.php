<?php

class TK_HTML_FORM extends TK_HTML{
	
	var $form;
	var $id;
	var $action;
	var $method;
	
	public function __construct( $action, $method = '', $id = '' ){
		parent::__construct();
		
		$this->action = $action;
		$this->method = $method;
		$this->id = $id;
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->method != '' ) $method = ' method="' . $this->method . '"';
		
		$html = '<form' . $id . $method . ' action="' . $this->action . '">';
		foreach( $this->elements AS $element ){
			$html.= $element;
		}		
		$html.='</form>';
		
		return $html;
	}
}

?>