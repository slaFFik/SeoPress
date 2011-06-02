<?php
/**
 * Meta box for settings of sections
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
function get_seopress_metabox_input_ajax( $id, $suggest_slug = 'blog_404_pages'   ){
	global $seopress_special_tags, $seopress_plugin_url;;
		
	$html = '
		<script type="text/javascript">
		  	jQuery(document).ready(function($){
			  	function split( val ) {
					return val.split( / \s*/ );
				}
				function extractLast( term ) {
					return split( term ).pop();
				}
				$("input#' . $id . '")
					.bind( "keydown", function( event ) {
						if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
							event.preventDefault();
						}
					})
					.autocomplete({
						source:"' . $seopress_plugin_url . 'admin/get_tags.php?type=' . $suggest_slug . '",
						dataType: "json",
						focus: function() {
							// prevent value inserted on focus
							return false;
						},
						select: function( event, ui ) {
							var terms = split( this.value );
							// remove the current input
							terms.pop();
							// add the selected item
							terms.push( ui.item.value );
							// add placeholder to get the comma-and-space at the end
							terms.push( "" );
							this.value = terms.join( " " );
														
							return false;
						},
						delay: 0,
						minLength: 2						
					})
					.data( "autocomplete" )._renderItem = function( ul, item ) {
						return $( "<li></li>" )
							.data( "item.autocomplete", item )
							.append( "<a><strong>" + item.value + "</strong><br>" + item.desc + "</a>" )
							.appendTo( ul );
					};
		  	});
  		</script>
  ';
	
	return $html;
}


function seopress_metabox( $lable, $meta, $suggest_slugs = 'wp-home' ){
	$meta['title'] = stripslashes(htmlentities($meta[0], ENT_QUOTES, mb_internal_encoding()));
  	$meta['description'] = stripslashes(htmlentities($meta[1], ENT_QUOTES, mb_internal_encoding()));
  	$meta['keywords'] = stripslashes(htmlentities($meta[2], ENT_QUOTES, mb_internal_encoding()));
	
	if($meta['noindex']==true){$checked="checked";} 
	
	$class=str_replace( ' ', '-' , strtolower( $lable[0] ) );
	
	echo  '
			<h3 class="' . $class  . ' sortable"><a href="#">' . $lable[0] . '</a></h3>
			<!-- <h3 class="' . $class  . ' sortable"><a href="#">' . str_replace( '_', ' ', ucwords( strtolower( $lable[0] ) ) ) . '</a></h3> //-->
			<div>			
					<table width="100%" class="form-table">
						<tbody>
							<tr>
								<td width="200"><lable for="">' . __( 'Title', 'seopress') . '</lable></td>
								<td><input name="' . $lable[1] . '" id="' . $lable[1] . '" value="' . $meta['title'] . '" onfocus="this.style.color=\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;" /></td>
							</tr>
							<tr>
								<td width="200"><lable for="">' . __( 'Meta description', 'seopress') . '</lable></td>
								<td><input name="' . $lable[2] . '" id="' . $lable[2] . '" value="' . $meta['description'] . '" onfocus="this.style.color=\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;" /></td>
							</tr>	
							<tr>
								<td width="200"><lable for="">' . __( 'Meta keywords', 'seopress') . '</lable></td>
								<td><input name="' . $lable[3] . '" id="' . $lable[3] . '" value="' . $meta['keywords'] . '" onfocus="this.style.color=\'#000\'" onblur="this.style.color=\'#CCC\'" style="width:100%;color:#CCC;" /></td>
							</tr>																	
						</tbody>
					</table>
					<div style="clear:both;height:20px;"></div>
				';
	
	if( $lable[4] != '' ){
		echo '<input type="hidden" name="main_comp_slug[]"  value="' . $lable[4] . '" />';
		echo '<input type="hidden" name="sub_comp_slug[]"  value="' . $lable[5] . '" />';
	}
	
	do_action( 'sp-seo-meta-box', $meta, $lable );
	
	echo '<div style="clear:both;"></div>
			</div>';
		
	
	echo get_seopress_metabox_input_ajax( $lable[1], $suggest_slugs );
	echo get_seopress_metabox_input_ajax( $lable[2], $suggest_slugs );
	echo get_seopress_metabox_input_ajax( $lable[3], $suggest_slugs );	

}


?>