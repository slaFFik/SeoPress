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
	
	$title_field = apply_filters( 'sp_post_metabox_title', $title_field );
	$description_field = apply_filters( 'sp_post_metabox_description', $description_field );
	$keywords_field = apply_filters( 'sp_post_metabox_keywords', $keywords_field );
	$noindex_field = apply_filters( 'sp_post_metabox_noindex', $noindex_field );
	
	$post_metabox_table = apply_filters( 'sp_post_metabox_table', $post_metabox_table );
	
	$html = '<table class="form-table">
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
					' . $post_metabox_table .'
				</tbody>
			</table>';
	
	$html = apply_filters( 'sp_post_metabox_html', $html );
	
	$mb->add_element( $html );
	
	$mb->create();
	
}
function sp_page_metabox(){
	$mb = new TK_WP_METABOX( 'sp_post_metabox', __( 'SEO Settings', 'seopress' ), 'page' );
	
	$title_field = apply_filters( 'sp_page_metabox_title', $title_field );
	$description_field = apply_filters( 'sp_page_metabox_description', $description_field );
	$keywords_field = apply_filters( 'sp_page_metabox_keywords', $keywords_field );
	$noindex_field = apply_filters( 'sp_page_metabox_noindex', $noindex_field );
	
	$post_metabox_table = apply_filters( 'sp_page_metabox_table', $post_metabox_table );
	
	$html = '<table class="form-table">
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
	
	$mb->add_element( $html );
	
	$mb->create();	
}

?>