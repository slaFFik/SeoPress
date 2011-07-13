<?php

class TK_WP_JQUERYUI_AUTOCOMPLETE extends TK_WP_FORM_TEXTFIELD{
	
	var $autocomplete_source;
	var $id;
	
	public function __construct( $name, $option_group,  $id, $autocomplete_source, $extra = '' ){
		parent::__construct( $name, $option_group, $id, $extra );
		
		$this->id = $id;
		$this->autocomplete_source = $autocomplete_source;
		
		$jqueryui = new TK_WP_JQUERYUI();
		$jqueryui->load_jqueryui( array( 'jquery-ui-autocomplete' ) );
	}
	
	public function get_html(){
		$html = parent::get_html();
		
		$html .= '
			<script type="text/javascript">
			  	jQuery(document).ready(function($){
				  	function split( val ) {
						return val.split( / \s*/ );
					}
					function extractLast( term ) {
						return split( term ).pop();
					}
					$(\'#' . $this->id . '\')
						.bind( "keydown", function( event ) {
							if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
								event.preventDefault();
							}
						})
						.autocomplete({
							source:"' . $this->autocomplete_source . '",
							dataType: "json",
							focus: function() {
								// prevent value inserted on focus
								return false;
							},
							select: function( event, ui ) {
								var terms = split( this.value );
								// remove the current input
								terms.pop();
								// add the selected item
								terms.push( ui.item.value );
								// add placeholder to get the comma-and-space at the end
								terms.push( "" );
								this.value = terms.join( " " );
															
								return false;
							},
							delay: 0,
							minLength: 2						
						})
						.data( "autocomplete" )._renderItem = function( ul, item ) {
							return $( "<li></li>" )
								.data( "item.autocomplete", item )
								.append( "<a><strong>" + item.value + "</strong><br>" + item.desc + "</a>" )
								.appendTo( ul );
						};
			  	});
	  		</script>
	  	';	
		
	  	return $html;
	  
	}
}
function tk_wp_jqueryui_autocomplete( $name, $option_group, $id, $autocomplete_source, $extra = '' ){
	$autocomplete = new TK_WP_JQUERYUI_AUTOCOMPLETE( $name, $option_group, $id, $autocomplete_source, $extra );
	return $autocomplete->get_html();
}

?>