<?php

class TK_WP_ADMIN_DISPLAY extends TK_HTML{
	
	var $title;
	var $icon;
	
	public function __construct( $title, $icon = '' ){
		parent::__construct();
		$this->title = $title;
		$this->icon = $icon;
	}
		
	public function get_html(){
		
		$html = '<div class="wrap">';
		if( $this->icon != '' )	$html.= '<div id="icon-' . $this->icon . '" class="icon32"></div>';
		
		$html.= '<h2>' . $this->title . '</h2>';
		$html.= parent::get_html();
		$html.= '</div>';
		
		return $html;
	}
}

?>
