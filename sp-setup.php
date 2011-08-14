<?php

// require_once( '../../../wp-admin/admin.php');
require( '../../../wp-load.php' );

add_thickbox();

// if (!current_user_can('administrator'))
// 	wp_die(__('You do not have permission to setup plugin.'));
	
@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));

$seopress_plugin_url = plugin_dir_url( __FILE__ );

?>
<style type="text/css">
.button{
    border-color: #BBBBBB;
    color: #464646;
    -moz-box-sizing: content-box;
    border-radius: 11px 11px 11px 11px;
    border-style: solid;
    border-width: 1px;
    cursor: pointer;
    font-size: 12px !important;
    line-height: 13px;
    padding: 5px 8px;
    text-decoration: none;
    text-shadow: 0 1px 0 #FFFFFF;
    font-family: sans-serif;
    width:200px;
    text-align:center;
    display: block;
    float:left;
    margin: 0 20px 20px 0;
}
.buttonblue{
	color: #FFF;
 	background-color: #247aa3;
}
.button:hover{
	color: #FFF;
 	background-color: #247aa3;
}
h4{
	clear:both;
}
</style>
<div class="wrap" style="padding:20px; font-family: arial, verdana, sans-serif; font-size: 12px; ">
	<img src="<?php echo $seopress_plugin_url; ?>images/seopress-logo-180px.jpg" style="margin-bottom: 20px;" />
	<p><?php _e('Congratulations! You have successfully installed SeoPress 1.1.</p>', 'seopress' ); ?></p>
	<h4><?php _e( 'Next steps', 'seopress' ); ?></h4>
	<p><a href="#" class="button" onclick="self.parent.tb_remove();"><?php _e( 'Setup SeoPress', 'seopress' ); ?></a></p>
	<p><a href="http://themekraft.com/groups/seopress/forum/" class="button" target="_blank"><?php _e( 'Report a bug', 'seopress' ); ?></a></p>
	<h4><?php _e( 'Get News', 'seopress' ); ?></h4>
	<p><a href="https://www.facebook.com/pages/themekraftcom/109853049098537" class="button" target="_blank"><?php _e( 'Themekraft Facebook Fanpage', 'seopress' ); ?></a></p>
	<p><a href="http://twitter.com/themekraft/" class="button" target="_blank"><?php _e( 'Themekraft Twitter page', 'seopress' ); ?></a></p>
	<h4><?php _e( 'Get Pro version', 'seopress' ); ?></h4>
	<p><a href="https://themekraft.com/plugin/seopress-pro/?s2-ssl=yes" class="button buttonblue" target="_blank"><strong><?php _e( 'Get pro version for only 39$', 'seopress' ); ?></strong></a></p>
	<div style="clear:both" ></div>
	<p><a href="#" class="button buttonblue" onclick="self.parent.tb_remove();"><?php _e( 'Close Window', 'seopress' ); ?></a></p>
</div>