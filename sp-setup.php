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
    margin: 0 0 20px 0;
}
.buttonblue{
    background: url("../../../wp-admin/images/button-grad.png") repeat-x scroll left top #21759B;
    border-color: #298CBA;
    color: #FFFFFF;
    font-weight: bold;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
}
.buttonblue:active{
    background: url("../../../wp-admin/images/button-grad-active.png") repeat-x scroll left top #21759B;
    color: #EAF2FA;
}
.buttonblue:hover{
 	border-color: #13455B;
    color: #EAF2FA;
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
	<img src="includes/images/seopress-pro-package.jpg" style="float:left; margin: 0 20px 20px 0; width: 200px;" />
	<img src="<?php echo $seopress_plugin_url; ?>includes/images/seopress-logo-180px.jpg" style="margin-bottom: 20px;" />
	<p><?php _e( 'Congratulations! You have successfully installed SeoPress. You can support us with the developement by buying SeoPress pro.', 'seopress' ); ?></p>
	<p><?php _e( 'Only for ', 'seopress' ); ?> <span style="font-size:2em; font-weight:bold;">39$</span></p>
	<br /> 	
	<p>
		<a href="https://themekraft.com/plugin/seopress-pro/?s2-ssl=yes" class="button buttonblue" target="_blank"><?php _e( 'Get it on themekraft.com', 'seopress' ); ?></a>
	</p>
	<p>
		<a href="#" class="button buttonblue" onclick="try{top.tb_remove();}catch(e){}; return false;"><?php _e( 'Close Window', 'seopress' ); ?></a>
	</p>
</div>