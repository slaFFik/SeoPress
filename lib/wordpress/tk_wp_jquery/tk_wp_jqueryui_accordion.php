<?php

class TK_WP_JQUERYUI_ACCORDION extends TK_HTML{
	
	public function __construct(){
		parent::__construct();
		
		$jqueryui = new TK_WP_JQUERYUI();
		$jqueryui->load_jqueryui( array( 'jquery-ui-accordion' ) );
	}
	
	public function add_section( $id, $title, $content ){
		$element = array( 'id'=> $id, 'title' => $title, 'content' => $content );
		$this->add_element( $element );
	}

	public function get_html(){
		$id = substr( md5( time() * rand() ), 0, 8 );
		
		$html = '<script type="text/javascript">
		jQuery(document).ready(function($){
			$( ".tk-' . $id . '" ).accordion({ header: "h3", active: false, autoHeight: false, collapsible:true });
		});
   		</script>';
		
		
		$html.= '<div class="tk-' . $id . '">';
		
		foreach( $this->elements AS $element ){
			
			$html.= '<h3><a href="#">' . $element['title'] . '</a></h3>';
			$html.= '<div id="' . $element['id'] . '" >' . $element['content'] . '</div>';
		}
		
		$html.= '</div>';
		
		return $html;
	}	
	
}

?>
