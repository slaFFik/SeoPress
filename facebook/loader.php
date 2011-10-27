<?php

require_once( 'open-graph.php' );

function sp_fp_add_meta(){
	if( $_SERVER['HTTP_USER_AGENT'] == 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)' ) {			
		global $post;
			
		if( $post->ID != '' ){
			$og = new FB_Open_Graph();
			
			$post_meta = get_post_meta( $post->ID, 'sp_post_metabox', TRUE );
	
			$fb_title = $post_meta['fb_title'];
			$fb_description = $post_meta['fb_description'];
			$fb_image = $post_meta['fb_image'];
			$fb_type = $post_meta['fb_type'];
			
			if( $fb_image == 'featured_image' ){
				$ptn_id = get_post_thumbnail_id( $post->ID  );
				$fb_image_src =   wp_get_attachment_url( $ptn_id );
			}else if( $fb_image == 'post_text' ){
				$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
	  			$fb_image_src = $matches [1] [0];
			}
			
			$args = array(
				'title' => $fb_title,
				'description' => $fb_description,
				'type' => $fb_type,
				'image' => $fb_image_src
			);
			
			$og->set_page_data( $args );
			echo $og->get_header_data();
		}
	}
}
add_action( 'sp_insert_meta', 'sp_fp_add_meta' );

function sp_fb_page_meta_box( &$tabs ){
	
	$html = '<p class="sp_metabox_description">' . __( 'Leave fields blank if you want to use standard WordPress values.', 'seopress' ) . '</p>';
	
	$select_fb_image = new TK_WP_FORM_SELECT( 'fb_image', 'sp_post_metabox', 'seopress_fb_image' );
	$select_fb_image->add_option( __('featured image', 'seopress' ), 'featured_image' );
	$select_fb_image->add_option( __('post text', 'seopress' ), 'post_text' );	
	
	$select_fb_type = new TK_WP_FORM_SELECT( 'fb_type', 'sp_post_metabox', 'seopress_fb_type' );
	// $select_fb_type->add_option( __('Test', 'seopress' ), 'test'  );
	// $select_fb_type->add_option( __('Test2', 'seopress' ), 'test2' );
	
	$html.= '<table class="form-table">
					<tbody>
						<tr>
							<td width="200" valign="top"><label for="seopress_fb_title">' . __( 'Title', 'seopress' ) . ':</label></td>
							<td>' . tk_wp_form_textfield( 'fb_title', 'sp_post_metabox', 'seopress_fb_title',  ' style="width:99%"' ) . $title_field . '</td>
						</tr>
						<tr>
							<td valign="top"><label for="seopress_fb_description">' . __( 'Description', 'seopress' ) . ':</label></td>
							<td>' . tk_wp_form_textfield( 'fb_description', 'sp_post_metabox', 'seopress_fb_description', ' style="width:99%"' ) . $description_field . '</td>
						</tr>
						<tr>
							<td valign="top"><label for="seopress_fb_image">' . __( 'Image', 'seopress' ) . ':</label></td>
							<td>' . $select_fb_image->get_html() . '</td>
						</tr><!--
						<tr>
							<td valign="top"><label for="seopress_fb_type">' . __( 'Type', 'seopress' ) . ':</label></td>
							<td>' . $select_fb_type->get_html() . '</td>
						</tr>//-->
						' . $post_metabox_table .'
					</tbody>
				</table>';
					
	$tabs->add_tab( 'cap_page_facebook', __ ('Facebook', 'seopress'), $html );
}
add_action( 'sp_page_metabox_tabs', 'sp_fb_post_meta_box' );

function sp_fb_post_meta_box( $tabs ){
	global $post;
	
	$html = '<p class="sp_metabox_description">' . __( 'Leave fields blank if you want to use standard values.', 'seopress' ) . '</p>';
	
	$select_fb_image = new TK_WP_FORM_SELECT( 'fb_image', 'sp_post_metabox', 'seopress_fb_image' );
	$select_fb_image->add_option( __('featured image', 'seopress' ), 'featured_image' );
	$select_fb_image->add_option( __('post text', 'seopress' ), 'post_text' );
	
	$select_fb_type = new TK_WP_FORM_SELECT( 'fb_type', 'sp_post_metabox', 'seopress_fb_type' );
	// $select_fb_type->add_option( __('Test1', 'seopress' ), 'test' );
	// $select_fb_type->add_option( __('Test2', 'seopress' ), 'test2' );
	
	// Preview data
	$post_meta = get_post_meta( $post->ID , 'sp_post_metabox' , true );
	
	$preview_image = $post_meta['fb_image'];
	
	if( $preview_image == 'featured_image' ){
		$ptn_id = get_post_thumbnail_id( $post->ID  );
		$preview_image =   wp_get_attachment_url( $ptn_id );
	}else if( $preview_image == 'post_text' ){
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
		$preview_image = $matches [1] [0];
	}
	if( $preview_image != '' ){
		$text_width = '300';		
	}else{
		$text_width = '400';
	}
	
	if( $post_meta['fb_title'] != '' ){
		$preview_title = $post_meta['fb_title'];
	}else{
		$preview_title = $post->post_title;
	}
	
	if( $post_meta['fb_description'] != '' ){
		$preview_desc = $post_meta['fb_description'];
	}else{
		$preview_desc = substr( strip_tags( $post->post_content ), 0, 300 ) . ' ... ';
	}
	
	$preview_url = get_permalink( $post->ID );
	$preview_url = str_replace('http://', '', $preview_url );	
	
	$html.= '<table class="form-table">
					<tbody>
						<tr>
							<td width="200" valign="top"><label for="seopress_fb_title">' . __( 'Title', 'seopress' ) . ':</label></td>
							<td>' . tk_wp_form_textfield( 'fb_title', 'sp_post_metabox', 'seopress_fb_title',  ' style="width:99%"' ) . $title_field . '</td>
						</tr>
						<tr>
							<td valign="top"><label for="seopress_fb_description">' . __( 'Description', 'seopress' ) . ':</label></td>
							<td>' . tk_wp_form_textfield( 'fb_description', 'sp_post_metabox', 'seopress_fb_description', ' style="width:99%"' ) . $description_field . '</td>
						</tr>
						<tr>
							<td valign="top"><label for="seopress_fb_image">' . __( 'Take image from', 'seopress' ) . ':</label></td>
							<td>' . $select_fb_image->get_html() . '</td>
						</tr>						
						<tr>
							<td valign="top">' . __( 'Preview:', 'seopress' ) . '</td>
							<td>
								<div style="border: 1px #000 solid; bgcolor: #FFF; width:96%; height; 100%; padding:1em;">
									<div style="width: 400px;">
										<img style="max-width:90px; float:left; margin-right: 10px; " src="' . $preview_image . '" />
										<div style="float:right; width: ' . $text_width . 'px;">
											<strong><div style="color: #3B5998; text-decoration: none; font-size: 11px; font-family: lucida grande,tahoma,verdana,arial,sans-serif; margin-top: -5px;">' . $preview_title . '</div></strong>
											<div style="color: #808080; text-decoration: none; font-size: 11px; font-family: lucida grande,tahoma,verdana,arial,sans-serif; line-height: 12px;">' . $preview_desc . '</div>
											<div style="clear:both;"></div>
										</div>
										<div style="clear:both;"></div>
									</div>
								</div>
							</td>
						</tr>
						<!--
						<tr>
							<td valign="top"><label for="seopress_fb_type">' . __( 'Type', 'seopress' ) . ':</label></td>
							<td>' . $select_fb_type->get_html() . '</td>
						</tr>//-->
						' . $post_metabox_table . '
					</tbody>
				</table>';
				
	$tabs->add_tab( 'cap_post_facebook', __ ('Facebook', 'seopress'), $html );
}
add_action( 'sp_post_metabox_tabs', 'sp_fb_post_meta_box' );

?>