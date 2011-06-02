<?php

class TK_SPECIAL_TAGS{
	
	var $types;
	var $sets;
	var $tags;
	
	public function __construct(){
		$this->types = array();
		$this->sets = array();
		$this->tags = array();		
	}
	
	public function replace( $string, $type = '' ){
		$active_tags = $this->get_tags( $type );
			
		foreach( $active_tags AS $tag => $value ){
			$string = str_replace( $tag , call_user_func( $value ['function'] ) , $string );
		}
		
		return $string;
	}
	
	public function add_type( $name, $sets = array() , $option_name = '' ){ 
		$this->types[ $name ]['sets'] = $sets;
		$this->types[ $name ]['option-name'] = $option_name;
	}
	
	public function add_set( $name, $tags = array() ){
		$this->sets[ $name ] = $tags;
	}
	
	public function add_tag( $tag, $function, $description = '' ){
		$this->tags[ $tag ]['function'] = $function;
		$this->tags[ $tag ]['description'] = $description;
	}
	
	public function get_tags( $type = '', $set = '' ){
		$sets = array();
		$tags = array();
		
		$return_tags = array();
		
		// Getting sets of types
		if( $type == '' ){
			foreach( $this->types AS $name => $value ){
				$tags = array_merge( $sets, $this->types[ $name ]['sets'] );
			}
		}else{
			$sets = $this->types[ $type ]['sets'];	
		}
		
		// Getting tags of sets
		if( $set == '' ){
			foreach( $sets AS $name ){
				$tags = array_merge( $tags, $this->sets[ $name ] );
			}	
		}else{
			$tags = $this->sets[ $set ];
		}
		
		// Getting filteted tags in array
		foreach ( $tags AS $tag ){
			$return_tags[ $tag ] = $this->tags[ $tag ];
		}
		return $return_tags;
	}
}

?>