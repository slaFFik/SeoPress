<?php

require_once( 'lib/wordpress/tk_html/tk_html.php' );
require_once( 'lib/wordpress/tk_html/tk_html_form.php' );
require_once( 'lib/wordpress/tk_html/tk_form_element.php' );
require_once( 'lib/wordpress/tk_html/tk_form_button.php' );
require_once( 'lib/wordpress/tk_html/tk_form_textfield.php' );
require_once( 'lib/wordpress/tk_html/tk_form_checkbox.php' );

require_once( 'lib/wordpress/tk_wp_gui/tk_wp_admin_display.php' );
require_once( 'lib/wordpress/tk_wp_gui/tk_wp_form.php' );
require_once( 'lib/wordpress/tk_wp_gui/tk_wp_form_textfield.php' );
require_once( 'lib/wordpress/tk_wp_gui/tk_wp_form_checkbox.php' );

require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui.php' );
require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_tabs.php' );
require_once( 'lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_accordion.php' );

function test_page(){
	
	$display = new	TK_WP_ADMIN_DISPLAY( __( 'Testing page', 'seopress'), 'plugins' );
	$display->add_element(  __( '<p>Check your scripts here.</p>', 'seopress') );

	
	$form = new TK_WP_FORM( 'testoptiongroup' );
	$form->add_element( tk_wp_form_textfield( 'textfieldname', 'testoptiongroup' ) );
	$form->add_element( tk_wp_form_checkbox( 'checkboxname', 'testoptiongroup' ) );
	$form->add_element( tk_form_button( 'buttonname', 'Speichern' ) );	
	
	$display->add_element( $form->get_html() );
	$display->write_html();	

}

?>