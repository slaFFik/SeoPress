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

function tk_admin_display( $title, $icon = '' ){
	global $tk_admin_display;
	$tk_admin_display = new	TK_ADMIN_DISPLAY( $title, $icon );	
}

function tk_admin_display_add_content( $content ){
	global $tk_admin_display;
	$tk_admin_display->add_content( $content );
}

function tk_admin_display_get_html( ){
	global $tk_admin_display;
	return $tk_admin_display->get_html();
}

function tk_admin_display_write_html( ){
	global $tk_admin_display;
	$tk_admin_display->write_html();
}

?>
