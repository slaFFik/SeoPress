<?php

function tk_register_wp_option_group( $option_group ){
	global $post_option_group;
	$post_option_group = $option_group;
	
	add_action( 'save_post', 'tk_save_wp_metabox_option_group' );
	register_setting( $option_group, $option_group . '_values' );
}

function tk_save_wp_metabox_option_group( $post_id ){
	global $post_option_group;
	
	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	    return;
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST[ $post_option_group . '_nonce' ], 'sp_post_metabox' ) )
	    return;
	 
	// Check permissions
	if ( 'page' == $_POST['post_type'] ) {
	  if ( !current_user_can( 'edit_page', $post_id ) )
	      return;
	}
	else {
	  if ( !current_user_can( 'edit_post', $post_id ) )
	      return;
	}	
	
	update_post_meta( $post_id, $post_option_group, $_POST[ $post_option_group ] );
}

?>