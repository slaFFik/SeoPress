<?php

include('lib/wordpress/tk_html/tk_html.php');
include('lib/wordpress/tk_wp_admin_gui/tk_wp_admin_display.php');
include('lib/wordpress/tk_wp_jquery/tk_wp_jqueryui.php');
include('lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_tabs.php');
include('lib/wordpress/tk_wp_jquery/tk_wp_jqueryui_accordion.php');

function test_page(){
	$display = new	TK_WP_ADMIN_DISPLAY( 'Ein Test', 'plugins' );

	$display->add_element( '<p>Ein kurzer Text</p>' );
	
	$tabs = new	TK_WP_JQUERYUI_TABS();

	$accordion = new TK_WP_JQUERYUI_ACCORDION();
	$accordion->add_section( 'section1', 'Sektion 1', 'Da steht mal wieder was ganz aufregendes!');
	$accordion->add_section( 'section2', 'Sektion 2', 'Hier aber auch');
	$accordion->add_section( 'section3', 'Sektion 3', 'Und hier erst!');	
	$tabs->add_tab( 'eins', 'Tab 1', $accordion->get_html() );
	
	
	$tabs->add_tab( 'zwei', 'Tab 2', 'Das ist der Inhalt des Tabs 2');
	$tabs->add_tab( 'drei', 'Tab 3', 'Das ist der Inhalt des Tabs 3');
	
	$tab_content = $tabs->get_html();
	
	$display->add_element( $tab_content );

	$display->write_html();
}

?>