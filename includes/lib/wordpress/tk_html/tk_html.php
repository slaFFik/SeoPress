<?php
class TK_HTML{
	
	var $elements;
	
	public function __construct(){
		$this->elements = array();
	}
	
	public function add_element( $element ){
		array_push( $this->elements, $element  );
	}
	
	public function get_html(){
		if( count( $this->elements ) > 0 ){
			foreach( $this->elements AS $element ){
				$html.= $element;
			}
		}
		return $html;
	}
	
	public function write_html(){
		echo $this->get_html();	
	}
}
?>