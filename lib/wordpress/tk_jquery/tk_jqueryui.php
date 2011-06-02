<?php

class TK_JQUERYUI{
	
	var $jqueryui;
	var $wp_components;
	var $known_components;
	var $enqueued_components;
	var $depencies;
	var $wp_version;
	
	public function __construct(){
		$this->wp_version = $GLOBALS['wp_version'];
		$this->known_components = array();
		$this->wp_components = array();
		$this->enqueued_components = array();
		$this->init_known_jqueryui_components();
		$this->register_components();
	}
	
	public function load_jqueryui( $components = array () ){
		if( defined( 'BP_VERSION' ) && in_array( 'jquery-ui-accordion', $components ) ){
			// echo 'Deregistering: ' . 'dtheme-ajax-js' . "<br>";
			wp_deregister_script( 'dtheme-ajax-js' ); // For Buddypress bug on accordion
		}
		
		// loading jQuery core
		// echo 'Enqueing: ' . 'jquery-ui' . "<br>";
		wp_enqueue_script( 'jquery-ui' );
		
		foreach( $components AS $component ){
			$jqueryui_url = $this->jqueryui[ $this->wp_version ][ $component ]['url'];	
			$jqueryui_version = $this->jqueryui[ $this->wp_version ][ $component ]['version'];
			
			if( $jqueryui_url == '' ){
				$jqueryui_url = $this->jqueryui[ '3.1.3' ][ $component ]['url'];
				$jqueryui_version = $this->jqueryui[ '3.1.3' ][ $component ]['version'];	
			}
			/* echo '<pre>';
			print_r($this->depencies[ $component ]);
			echo '</pre>';
			*/
			if( count( $this->depencies[ $component ] ) > 0 ){
				foreach( $this->depencies[ $component ] AS $required_component ){
					
					if( in_array( $required_component, $this->known_components) && !in_array( $required_component,  $this->enqueued_components ) ){
						$this->add_enqueued_jqueryui_component( $required_component );
						wp_enqueue_script( $required_component );
					}
				}
			}
			
			if( !in_array( $component,  $this->wp_components ) ){
				wp_register_script( $component, $jqueryui_url, array( 'jquery' ) , $jqueryui_version, true );
			}
						
			if( !in_array( $component,  $this->enqueued_components ) ){
				$this->add_enqueued_jqueryui_component( $component );
				wp_enqueue_script( $component );
			}
			
		}
	} 
	
	private function get_jqueryui_component( $component_name, $wp_version ){
		$url = $this->jqueryui[ $wp_version ][ $component_name ]['url'];
	}
	
	public function add_jqueryui_component( $component_name, $wp_version, $jqueryui_component_url, $jqueryui_version = '' ){
		if( !in_array( $component, $this->known_components ) ) {
			$this->jqueryui[ $wp_version ][ $component_name ]['url'] = $jqueryui_component_url;
			
			if( $jqueryui_version != '' ){
				$this->jqueryui[ $wp_version ][ $component_name ]['version'] = $jqueryui_version;
			}
			
			$this->add_known_jqueryui_component( $component_name );
			
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function add_depency( $component_name, $components = array() ){
		$this->depencies[ $component_name ] =  $components;
	}
	
	private function register_components(){
		$this->add_jqueryui_component( 'jquery-ui-accordion', '3.1.3', plugin_dir_url( __FILE__ ) . 'jquery/1.8.9/jquery.ui.accordion.js', '1.8.9' );
		$this->add_depency( 'jquery-ui-accordion', array( 'jquery-ui-widget' ) );

		$this->add_jqueryui_component( 'jquery-ui-autocompleter', '3.1.3', plugin_dir_url( __FILE__ ) . 'jquery/1.8.9/jquery.ui.autocomplete.js', '1.8.9' );
		$this->add_depency( 'jquery-ui-autocompleter', array( 'jquery-ui-widget', 'jquery-ui-position' ) );		
	}
	
	private function init_known_jqueryui_components(){
		$this->add_wp_jqueryui_component( 'jquery-ui-core' );
		$this->add_wp_jqueryui_component( 'jquery-ui-button' );
		$this->add_wp_jqueryui_component( 'jquery-ui-dialog' );
		$this->add_wp_jqueryui_component( 'jquery-ui-draggable' );
		$this->add_wp_jqueryui_component( 'jquery-ui-droppable' );
		$this->add_wp_jqueryui_component( 'jquery-ui-position' );
		$this->add_wp_jqueryui_component( 'jquery-ui-resizable' );
		$this->add_wp_jqueryui_component( 'jquery-ui-selectable' );
		$this->add_wp_jqueryui_component( 'jquery-ui-sortable' );
		$this->add_wp_jqueryui_component( 'jquery-ui-tabs' );
		$this->add_wp_jqueryui_component( 'jquery-ui-widget' );		
	}
	
	public function add_known_jqueryui_component( $component_name ){
		array_push( $this->known_components, $component_name );
	}
	
	public function add_wp_jqueryui_component( $component_name ){
		array_push( $this->wp_components, $component_name );
		$this->add_known_jqueryui_component( $component_name );
	}
	public function add_enqueued_jqueryui_component( $component_name ){
		array_push( $this->enqueued_components, $component_name );
	}	
}

?>