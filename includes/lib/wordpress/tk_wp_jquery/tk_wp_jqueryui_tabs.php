<?php

class TK_WP_JQUERYUI_TABS extends TK_HTML{

	public function __construct(){
		parent::__construct();
		
		$jqueryui = new TK_WP_JQUERYUI();
		$jqueryui->load_jqueryui( array( 'jquery-ui-tabs' ) );
	}
	
	public function add_tab( $id, $name, $content ){
		$element = array( 'id'=> $id, 'name' => $name, 'content' => $content );
		$this->add_element( $element );
	}
	
	public function get_html(){
		
		$id = substr( md5( time() * rand() ), 0, 8 );
		
		$html = '<script type="text/javascript">
		jQuery(document).ready(function($){
			$( ".tk-' . $id . '" ).tabs();
		});
   		</script>';
		
		
		$html.= '<div class="tk-' . $id . '">';
		
		$html.= '<ul>';
		
		foreach( $this->elements AS $element ){
			$html.= '<li><a href="#' . $element['id'] . '" >' . $element['name'] . '</a></li>';
		}
		$html.= '</ul>';
		
		foreach( $this->elements AS $element ){
			$html.= '<div id="' . $element['id'] . '" >' . $element['content'] . '</div>';
		}
		
		$html.= '</div>';
		
		return $html;
	}
}

function tk_jqueryui_tabs(){
	global $tk_jqueryui_tabs;
	$tk_jqueryui_tabs = new	TK_JQUERYUI_TABS();	
}

function tk_jqueryui_tabs_add_element( $id, $title, $content ){
	global $tk_jqueryui_tabs;
	$tk_jqueryui_tabs->add_element( $id, $title, $content );
}
function tk_jqueryui_tabs_get_html(){
	global $tk_jqueryui_tabs;
	return $tk_jqueryui_tabs->get_html();
}

function tk_jqueryui_tabs_write_html(){
	global $tk_jqueryui_tabs;
	$tk_jqueryui_tabs->write_html();
}

?>
