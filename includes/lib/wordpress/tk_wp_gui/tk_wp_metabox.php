<?php

class TK_WP_METABOX extends TK_HTML{
	
	var $option_group;
	var $title;
	var $page;
	
	public function __construct( $option_group, $title, $page = 'post' ){
		parent::__construct();
		
		$this->option_group = $option_group;
		$this->title = $title;
		$this->page = $page;
	}
	
	public function get_html(){
		$html = wp_nonce_field( $this->option_group , $this->option_group . '_nonce' );
		$html.= parent::get_html();
		return $html;
	}
		
	public function create(){
		add_meta_box( $this->option_group, $this->title, array( $this, 'write_html' ) , $this->page );
	}
	
}

?>