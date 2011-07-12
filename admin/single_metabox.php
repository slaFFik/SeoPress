<?php
/**
 * Metaboxes at the end of post or page
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/

function sp_post_metabox(){
	
	$mb = new TK_WP_METABOX( 'sp_post_metabox', __( 'SEO Settings', 'seopress' ), 'post' );
	
	$html.= '<table class="form-table">
				<tbody>
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
					<tr>
						<td width="200"><label for="seopress_noindex">' . __( 'Ban searchengines', 'seopress' ) . ':</label></td>
						<td>' . tk_wp_form_checkbox( 'noindex', 'sp_post_metabox', 'noindex' ) . '</td>
					</tr>
				</tbody>
			</table>';
	
	$mb->add_element( $html );
	
	$mb->create();
	
}
function sp_page_metabox(){
	$mb = new TK_WP_METABOX( 'sp_post_metabox', __( 'SEO Settings', 'seopress' ), 'page' );
	
	$html.= '<table class="form-table">
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
	
	$mb->add_element( $html );
	
	$mb->create();	
}

?>