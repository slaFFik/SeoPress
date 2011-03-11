<?php
/**
 * SeoPress
 *
 * @package SeoPress
 * @author Sven Lehnert
 * @copyright Copyright (C) Sven Lehnert
 **/

/*
============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages (including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.

For full license details see license.txt
============================================================================================================ */

function seo4all_metabox(){
	global $post;
	
	$metatitle_length = 150;
	$metadesc_length = 170;
	if(get_option('bp_seo_metadesc_length')){
		$metadesc_length = get_option('bp_seo_metadesc_length');
	}
	if(get_option('bp_seo_metatitle_length')){
		$metatitle_length = get_option('bp_seo_metatitle_length');
	}
	$metapostvalue = get_seopress_postmeta();
	$title=$metapostvalue[0];
	$description=$metapostvalue[1];
	$keywords=$metapostvalue[2];
	$noindex=$metapostvalue[3];
	
	if($noindex == 1){
		$checked = "checked";
	}

	if(function_exists('text_counter')){
		$tmp .= text_counter('seo4all_title', $metatitle_length);
		$tmp .= text_counter('seo4all_description', $metadesc_length);
	} else {
		$tmp = "For functionality of the textcounter, you need the Pro Version, <a href='admin.php?page=seomenue#cap_pro'>Get the Pro Version now!</a> ";
	}
	echo $tmp; ?>

	<style type="text/css">
	#seo4all_title, #seo4all_description, #seo4all_keywords{
		width:99%;
	}
	</style>
	<div id="seo4all" class="postbox">
		<div class="handlediv" title="<?php _e('klick'); ?>">
			<br />
		</div>
		<h3 class="hndle"><?php _e('SeoPress settings')?></h3>
		<div class="inside">
		<p>
			<label for="seo4all_noindex"><?php _e('No Index')?>:</label>
			<input name="seo4all_noindex" id="seo4all_noindex" type="checkbox" <?php echo $checked ?> value="1" /> (Block searchengines from indexing this page)
		</p>
			<p>
				<div class="seo_barbox" id="barboxseo4all_title"><div class="seo_bar" id="barseo4all_title"></div></div><div class="seo_count" id="countseo4all_title"><?php echo $metatitle_length ?></div>
				<label for="seo4all_title"><?php _e('Title')?>:</label>
				<input type="text" name="seo4all_title" id="seo4all_title" value="<?php echo $title; ?>" />
			</p>
			<p>
				<div class="seo_barbox" id="barboxseo4all_description"><div class="seo_bar" id="barseo4all_description"></div></div><div class="seo_count" id="countseo4all_description"><?php echo $metadesc_length ?></div>
				<label for="seo4all_description"><?php _e('Description')?>:</label>
				<input type="text" name="seo4all_description" id="seo4all_description" value="<?php echo $description; ?>" />
			</p>
			<p>
				<label for="seo4all_keywords"><?php _e('Keywords')?>:</label>
				<input type="text" name="seo4all_keywords" id="seo4all_keywords" value="<?php echo $keywords; ?>" />
			</p>
		</div>	
	</div>
<?php } ?>