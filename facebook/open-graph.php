<?php

class FB_Open_Graph{
	
	var $admins;
	var $app_id;
	var $app_secret;
	var $image;
	var $type;
	var $url;
	var $site_name;
	var $description;
	var $og_types;
	
	function fb_open_graph( $args = array() ){
		$this->__construct( $args );
	}
	
	function __construct( $args = array() ){
		$defaults = array(			
			'admins' => '',
			'app_id' => '',
			'app_secret' => ''
		);
		
		$args = wp_parse_args( $args, $defaults );		
		extract( $args , EXTR_SKIP );
		
		$this->admins = $admins;
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		
		$this->og_types = array(
			'movie'
		);
		
		add_filter( 'language_attributes', array( $this, 'set_language_param' ) );
	}
	
	function set_page_data( $args = array() ){
		global $post;
		
		if( $post->ID != '' ){
			$post_url = get_permalink( $post->ID );		
		}
		
		$defaults = array(			
			'title' => '',
			'type' => '',
			'url' => $post_url,
			'image' => '',
			'site_name' =>  get_bloginfo( 'name' ),
			'description' =>  get_bloginfo( 'description' )
		);
		
		$args = wp_parse_args( $args, $defaults );		
		extract( $args , EXTR_SKIP );

		$this->title = $title;
		$this->type = $type;
		$this->url = $url;
		$this->image = $image;
		$this->site_name = $site_name;
		$this->description = $description;
		
	}

	function get_header_data(){
		$header_data = '<!-- Facebook Open graph data //-->' . chr(13);
		
		// Adding Facebook Administration data
		if( $this->admins != '' ){
			$header_data.= $this->get_meta( 'fb:admins' , $this->admins );
		}
		if( $this->app_id != '' ){
			$header_data.= $this->get_meta( 'fb:app_id' , $this->app_id );
		}
		
		// Adding Open Graph properties
		if( $this->title != '' ){
			$header_data.= $this->get_meta( 'og:title' , $this->title );
		}
		if( $this->type != '' ){
			$header_data.= $this->get_meta( 'og:type' , $this->type );
		}
		if( $this->url != '' ){
			$header_data.= $this->get_meta( 'og:url' , $this->url );
		}
		if( $this->image != '' ){
			$header_data.= $this->get_meta( 'og:image' , $this->image );
		}
		if( $this->site_name != '' ){
			$header_data.= $this->get_meta( 'og:site_name' , $this->site_name );
		}
		if( $this->description != '' ){
			$header_data.= $this->get_meta( 'og:description' , $this->description );
		}
		
		$header_data.= '<!-- Facebook Open graph data //-->' . chr(13);
		
		return $header_data;	
	}
	
	function get_meta( $property, $content ){
		return '<meta property="' . $property . '" content="' . $content . '" />' . chr(13);
	}
	
	function set_language_param($lang) {
    	return ' xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" '.$lang;
	}
	
	function publish(){
		if( $this->app_id != '' && $this->facebook_secret != '' && $this->url != '' ){
			
			$ogurl = urlencode( $this->url );
		
			$mymessage = "Hello World!";
			
			$access_token_url = "https://graph.facebook.com/oauth/access_token"; 
			$parameters = "grant_type=client_credentials&client_id=" . $this->app_id . "&client_secret=" . $this->facebook_secret;			
			$access_token = file_get_contents( $access_token_url . "?" . $parameters );
			
			$apprequest_url = "https://graph.facebook.com/feed";
			$parameters = "?" . $access_token . "&message=" . urlencode($mymessage) . "&id=" . $ogurl . "&method=post";
			
			$myurl = $apprequest_url . $parameters; 
			
			$result = file_get_contents($myurl);
		
			return $result;
		}else{
			return false;
		}
	}
}

?>
