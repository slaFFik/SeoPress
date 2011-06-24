<?php
/**
 * Metaboxes at the end of post or page
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

function sp_post_metabox(){
	
	add_meta_box( 
        'sp_post_metabox',
        __( 'SEO (by SeoPress)', 'seopress' ),
        'sp_metabox',
        'post' 
    );
	
}
function sp_page_metabox(){
		
	if( $options['metabox_page'] != 'on' ){
	    add_meta_box(
	        'sp_page_metabox',
	        __( 'SEO (by SeoPress)', 'seopress' ), 
	        'sp_metabox',
	        'page'
	    );
	}
	
}
function sp_metabox(){
	wp_nonce_field( 'sp_post_metabox' , '_wpnonce', true , false );	
	
	$html = '<table class="form-table">
				<tbody>
					<tr>
						<td width="200"><label for="seopress_noindex">' . __( 'Forbid searchengines to scan url', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_checkbox( 'noindex', 'sp_post_metabox', 'noindex' ) . '</td>
					</tr>
					<tr>
						<td><label for="seopress_title">' . __( 'Title', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'title', 'sp_post_metabox', 'title',  ' style="width:99%"' ) . '</td>
					</tr>
					<tr>
						<td><label for="seopress_description">' . __( 'Description', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'description', 'sp_post_metabox', 'description', ' style="width:99%"' ) . '</td>
					</tr>
					<tr>
						<td><label for="seopress_keywords">' . __( 'Keywords', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'keywords', 'sp_post_metabox', 'keywords', ' style="width:99%"' ) . '</td>
					</tr>				
				</tbody>
			</table>';
	
	echo $html;
}

function sp_metabox_save_postdata( $post_id ) {
	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	    return;
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	
	if ( !wp_verify_nonce( $_POST['_wpnonce'], 'sp_post_metabox' ) )
	    return;
	 
	// Check permissions
	if ( 'page' == $_POST['post_type'] ) 
	{
	  if ( !current_user_can( 'edit_page', $post_id ) )
	      return;
	}
	else
	{
	  if ( !current_user_can( 'edit_post', $post_id ) )
	      return;
	}
	
	// OK, we're authenticated: we need to find and save the data
	
	$metabox_data['title'] = $_POST['title'];
	$metabox_data['description'] = $_POST['description'];
	$metabox_data['keywords'] = $_POST['keywords'];
	$metabox_data['noindex'] = $_POST['noindex'];
	
	// Do something with $mydata 
	// probably using add_post_meta(), update_post_meta(), or 
	// a custom table (see Further Reading section below)
	
	return $metabox_data;
}

?>