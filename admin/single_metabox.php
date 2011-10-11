<?php
/**
 * Metaboxes at the end of post or page
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

function sp_post_metabox(){
	global $post;
	
	$mb = new TK_WP_METABOX( 'sp_post_metabox', __( 'SeoPress Settings', 'seopress' ), 'post' );
	
	$title_field = apply_filters( 'sp_post_metabox_title', $title_field );
	$description_field = apply_filters( 'sp_post_metabox_description', $description_field );
	$keywords_field = apply_filters( 'sp_post_metabox_keywords', $keywords_field );
	$noindex_field = apply_filters( 'sp_post_metabox_noindex', $noindex_field );
	
	$post_metabox_table = apply_filters( 'sp_post_metabox_table', $post_metabox_table );
	
	// Preview data
	$post_meta = get_post_meta( $post->ID , 'sp_post_metabox' , true );
	
	$preview_date = date( 'd M Y', strtotime( $post->post_modified ) );
	
	if( $post_meta['title'] != '' ){
		$preview_title = $post_meta['title'];
	}else{
		$preview_title = $post->post_title;
	}
	
	if( $post_meta['description'] != '' ){
		$preview_desc = $post_meta['description'];
	}else{
		$preview_desc = substr( strip_tags( $post->post_content ), 0, 170 ) . ' ... ';
	}
	
	$preview_url = get_permalink( $post->ID );
	$preview_url = str_replace('http://', '', $preview_url );
	
	$tabs = new	TK_WP_JQUERYUI_TABS();
	
	$html = '<p class="sp_metabox_description">' . __( 'Leave fields blank if you want to use standard WordPress values.', 'seopress' ) . '</p>';
	
	$html.= '<table class="form-table">
				<tbody>
					<tr>
						<td width="200" valign="top"><label for="seopress_title">' . __( 'Title', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'title', 'sp_post_metabox', 'seopress_title',  ' style="width:99%"' ) . $title_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_description">' . __( 'Description', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'description', 'sp_post_metabox', 'seopress_description', ' style="width:99%"' ) . $description_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_keywords">' . __( 'Keywords', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'keywords', 'sp_post_metabox', 'seopress_keywords', ' style="width:99%"' ) . $keywords_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_noindex">' . __( 'Ban searchengines', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_checkbox( 'noindex', 'sp_post_metabox', 'seopress_noindex' ) . $noindex_field . '</td>
					</tr>
					<tr>
						<td valign="top">' . __( 'Preview:', 'seopress' ) . '</td>
						<td>
							<div style="border: 1px #000 solid; bgcolor: #FFF; width:96%; height; 100%; padding:1em;">
								<div><a style="line-height:19px; font-size: 16px; font-family: arial,sans-serif; color: #12c; text-decoration: underline;" href="' . get_permalink( $post->ID ) . '" target="_blank">' . $preview_title . '</a></div>
								<div style="color:#093; font-size: 13px;">' . $preview_url . '</div>
								<div style="color:#222; font-size: 13px; line-height: 15px;"><span style="color: #666;">' . $preview_date . '</span> &ndash; ' . $preview_desc . '</div>
							</div>
						</td>
					</tr>
					' . $post_metabox_table .'
				</tbody>
			</table>';
	
	$html = apply_filters( 'sp_post_metabox_html', $html );
	
	$tabs->add_tab( 'cap_post_seo', __ ('SEO', 'seopress'), $html );
	
	do_action( 'sp_post_metabox_tabs', $tabs );	
	
	$html = $tabs->get_html();
	
	$mb->add_element( $html );
	
	$mb->create();
	
}
function sp_page_metabox(){
	$mb = new TK_WP_METABOX( 'sp_post_metabox', __( 'SeoPress Settings', 'seopress' ), 'page' );
	
	$title_field = apply_filters( 'sp_page_metabox_title', $title_field );
	$description_field = apply_filters( 'sp_page_metabox_description', $description_field );
	$keywords_field = apply_filters( 'sp_page_metabox_keywords', $keywords_field );
	$noindex_field = apply_filters( 'sp_page_metabox_noindex', $noindex_field );
	
	$post_metabox_table = apply_filters( 'sp_page_metabox_table', $post_metabox_table );
	
	$tabs = new	TK_WP_JQUERYUI_TABS();
	
	$html = '<p class="sp_metabox_description">' . __( 'Leave fields blank if you want to use standard values.', 'seopress' ) . '</p>';
	
	$html.= '<table class="form-table">
				<tbody>
					<tr>
						<td width="200" valign="top"><label for="seopress_title">' . __( 'Title', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'title', 'sp_post_metabox', 'title',  ' style="width:99%"' ) . $title_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_description">' . __( 'Description', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'description', 'sp_post_metabox', 'description', ' style="width:99%"' ) . $description_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_keywords">' . __( 'Keywords', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_textfield( 'keywords', 'sp_post_metabox', 'keywords', ' style="width:99%"' ) . $keywords_field . '</td>
					</tr>
					<tr>
						<td valign="top"><label for="seopress_noindex">' . __( 'Ban searchengines', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_checkbox( 'noindex', 'sp_post_metabox', 'noindex' ) . $noindex_field . '</td>
					</tr>
					' . $page_metabox_table .'
				</tbody>
			</table>';
	
	$html = apply_filters( 'sp_page_metabox_html', $html );
	
	$tabs->add_tab( 'cap_post_seo', __ ('SEO', 'seopress'), $html );
	
	do_action( 'sp_page_metabox_tabs', $tabs );	
	
	$html = $tabs->get_html();
	
	$mb->add_element( $html );
	
	$mb->create();	
}

?>