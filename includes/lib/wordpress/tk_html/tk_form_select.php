<?php

class TK_FORM_SELECT extends TK_FORM_ELEMENT{
	var $extra;
	var $elements;
	
	public function __construct( $name, $value = '', $id = '', $extra = '' ){
		parent::__construct( $name, $value, $id );
		$this->elements = array();
		$this->extra = $extra;
	}
	
	public function add_option( $option, $value = '', $extra = '' ){
		$element = array( 'option' => $option, 'value' => $value, 'extra' => $extra );
		array_push( $this->elements, $element  );
	}
	
	public function get_html(){
		if( $this->id != '' ) $id = ' id="' . $this->id . '"';
		if( $this->name != '' ) $name = ' name="' . $this->name . '"';		
		if( $this->extra != '' ) $extra = $this->extra;
		
		$html = '<select' . $id . $name . $extra . ' />';
		
		if( count( $this->elements ) > 0 ){
			foreach( $this->elements AS $element ){
				$extra = ''; 
				
				if( isset( $element['extra'] ) && $element['extra'] != '' ){ 
					$extra = $element['extra'];
				}
				
				if( isset( $element['value'] ) && $element['value'] != ''  ){
					$value =  ' value="' . $element['value'] . '"';
							
					if( $this->value == $element['value'] && $element['value'] != '' ){
						$html.=  '<option' . $value . ' selected' . $extra . '>' . $element['option'] . '</option>';;
					}else{
						$html.=  '<option' . $value . $extra . '>' . $element['option'] . '</option>';;
					}
				}else{
					if( $this->value == $element['option'] ){
						$html.=  '<option' . $value . ' selected' . $extra . '>' . $element['option'] . '</option>';;
					}else{
						$html.=  '<option' . $value . $extra . '>' . $element['option'] . '</option>';;
					}
				}
			}
		}
		
		$html.= '</select>';
		
		return $html;
	}	
	
}

?>