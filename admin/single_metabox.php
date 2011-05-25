<?php
/**
 * Metaboxes at the end of post or page
 *
 * @package SeoPress
 * @author Sven Lehnert, Sven Wagener
 * @copyright Copyright (C) Themekraft.com
 **/
function sp_metabox(){
	global $post;
	
	$metatitle_length = 150;
	$metadesc_length = 170;
	if(get_option('bp_seo_metadesc_length')){
		$metadesc_length = get_option('bp_seo_metadesc_length');
	}
	if(get_option('bp_seo_metatitle_length')){
		$metatitle_length = get_option('bp_seo_metatitle_length');
	}
	
	$metapostvalue = sp_get_postmeta();
		
	$title=$metapostvalue['title'];
	$description=$metapostvalue['description'];
	$keywords=$metapostvalue['keywords'];
	$noindex=$metapostvalue['noindex'];
	
	// For old values from 1.0 version
	if($title=="") $title=$metapostvalue[0];
	if($description=="") $description=$metapostvalue[1];
	if($keywords=="") $keywords=$metapostvalue[2];
	if($noindex=="") $noindex=$metapostvalue[3];	
	
	if($noindex == 1){
		$checked = "checked";
	}
	
	?>

	<style type="text/css">
	#seopress_title, #seopress_description, #seopress_keywords{
		width:99%;
	}
	</style>
	<div id="seopress" class="postbox">
		<div class="handlediv" title="<?php _e('klick'); ?>">
			<br />
		</div>
		<h3 class="hndle"><?php _e('SEO (by SeoPress)')?></h3>
		<div class="inside">
			<table class="form-table">
				<tbody>
					<tr>
						<td width="200"><label for="seopress_noindex"><?php _e('Forbid searchengines to scan url')?>:</label></td>
						<td><input name="seopress_post_noindex" id="seopress_noindex" type="checkbox" <?php echo $checked ?> value="1" /></td>
					</tr>
					<tr>
						<td><label for="seopress_title"><?php _e('Title')?>:</label></td>
						<td><input type="text" name="seopress_post_title" id="seopress_title" value="<?php echo $title; ?>" /></td>
					</tr>
					<tr>
						<td><label for="seopress_description"><?php _e('Description')?>:</label></td>
						<td><input type="text" name="seopress_post_description" id="seopress_description" value="<?php echo $description; ?>" /></td>
					</tr>
					<tr>
						<td><label for="seopress_keywords"><?php _e('Keywords')?>:</label></td>
						<td><input type="text" name="seopress_post_keywords" id="seopress_keywords" value="<?php echo $keywords; ?>" /></td>
					</tr>				
				</tbody>
			</table>
			
			<div style="clear:both;height:20px;"></div>
			<!-- 
			<div class="configbar">
						
			<?php do_action( 'seopress-configbar', $meta, $lable ); ?>
			
				<div class="configbar-item">
					<input type="text" name="numtitle" value="0" size="3" class="configbar-counter" /> <label for="numtitle"><?php  _e('Chars in title'); ?></label>
				</div>
				<div class="configbar-item">
					<input type="text" name="numdesctipion" value="0" size="3" class="configbar-counter" /> <label for="numdesctipion"><?php  _e('Chars in desctipion'); ?></label>
				</div>
				<div class="configbar-item">
					<input type="text" name="numkeywords" value="0" size="3" class="configbar-counter" /> <label for="numkeywords"><?php  _e('Num of Keywords'); ?></label>
				</div>
				<div class="configbar-item">
					<input type="checkbox" name="noindex"> <label for="noindex"><?php  _e('Forbid searchengines to scan urls'); ?></label>
				</div>
			</div>	
			
			 -->		
			
		</div>	
	</div>
<?php } ?>