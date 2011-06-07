<?php

require_once( 'lib/wordpress/tk_html/tk_html.php' );
require_once( 'lib/wordpress/tk_html/tk_html_form.php' );
require_once( 'lib/wordpress/tk_html/tk_form_element.php' );
require_once( 'lib/wordpress/tk_html/tk_form_textfield.php' );

require_once( 'lib/wordpress/tk_wp_gui/tk_wp_admin_display.php' );
require_once( 'lib/wordpress/tk_wp_gui/tk_wp_form.php' );
require_once( 'lib/wordpress/tk_wp_gui/tk_wp_form_textfield.php' );

require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui.php' );
require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_tabs.php' );
require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_accordion.php' );


function save_data(){
	
}

function test_page(){
		
	$form = new TK_WP_ADMIN_FORM( 'myownoptiongroup' );
	$form->add_element( tk_wp_admin_form_textfield( 'myid' , 'myname', '', 'myownoptiongroup' ) );
	$form->add_element( '<input type="submit" name="save" value="Save" />' );
	echo $form ->get_html();
		
}

?>