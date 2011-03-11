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

### Main overview page.


function bp_seo_main_page() { 
	global $bp; 
?>
	<div class="wrap">
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#config-tabs").tabs();
	});
	</script>

	  	<h2><b>SeoPress </b>Search engine optimization for WordpressSingle, WordpressMU (MultiSite) and Buddypress.</h2>
	
	<div id="config-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
	  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
	      <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#cap_welcome"><?php _e ('Welcome', 'bp-seo') ?></a></li>
	      <li class="ui-state-default ui-corner-top"><a href="#cap_specialtags"><?php _e ('Special Tags', 'bp-seo') ?></a></li>
	   	<?php if(!is_pro()){ ?>
	      <li class="ui-state-default ui-corner-top"><a href="#cap_pro"><?php _e ('Get the Pro Version', 'bp-seo') ?></a></li>
	  	<?php } ?>
	  </ul>
	
	  <div id="cap_welcome" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
	    <div id="tab-head">
	    	<div class="sfb-entry">
				<h2><a href="admin.php?page=bp_seo_general_page"><?php _e ('General Seo', 'bp-seo') ?></a></h2>
		       	<p><?php _e ('This is the place for the general meta(title, description, keywords) optimization in a WP | WPMU | Buddypress environment. The meta options shown in this page will be generated depending on the WP you use and the activated Buddypress components.', 'bp-seo') ?></p>
			  	<?php if(defined('BP_VERSION')){?>
				   <h2><a href="admin.php?page=bp_seo_plugins"><?php _e ('Plugins Seo', 'bp-seo') ?></a></h2>
		       		<p><?php _e ('If you have installed plugins to extend Buddypress, this is the place where to configure the Seo behavior of every component. First you need to select where the component is shown in the front-end. After saving, you will be able to enter all meta data depending on your selection.', 'bp-seo') ?> </p>
				<?php } ?>	  
				<h2><a href="admin.php?page=bp_seo_general_page"><?php _e ('Settings', 'bp-seo') ?></a></h2>
	         	<p><?php _e ('Settings page for the global Seo configuration, update and delete SeoPress.', 'bp-seo') ?></p>
			</div>
	    </div>
	    <div class="spacer"></div>
	  </div>
	  <div id="cap_specialtags" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
	    <div id="tab-head">
	      	<div class="sfb-entry">
			<h2><?php _e ('Special Tags', 'bp-seo') ?></h2>
				<p><?php _e ('Special Tags are place holders to use in the meta data to specifay the content. Not all Tags are avalibe everywere. Use every tag with care, and check if the tag is suportet and gife you back the result you wanted.', 'bp-seo'); ?></p><br>
			  <div class="sfb-entry-title"><?php _e ('Special Tags for WP and WPMU', 'bp-seo') ?></div>
				<p><?php _e ('These tags can be included and will be replaced when the main/user blog pages or posts are displayed.', 'bp-seo'); ?></p>
				<?php
					$pos = 0;
					$wpseo = array
					(
						'date'                 => __( 'Replaced with the date of the post/page', 'bp-seo'),
						'postdate'             => __( 'Replaced with the date formatted like defined in the admin settings', 'bp-seo'),
						'postdate_month_year'  => __( 'Replaced with the date in format month year', 'bp-seo'),
						'archivedate'          => __( 'Replaced with the archive date. depends on the archive view day, month, year', 'bp-seo'),
						'title'                => __( 'Replaced with the title of the post/page', 'bp-seo'),
						'sitename'             => __( 'The site\'s name', 'bp-seo'),
						'excerpt'              => __( 'Replaced with the post/page excerpt', 'bp-seo'),
						'tag'                  => __( 'Replaced with the current tag/tags', 'bp-seo'),
						'category'             => __( 'Replaced with the post categories (comma separated)', 'bp-seo'),
						'category_description' => __( 'Replaced with the category description', 'bp-seo'),
						'tag_description'      => __( 'Replaced with the tag description', 'bp-seo'),
						'term_description'     => __( 'Replaced with the term description', 'bp-seo'),
						'term_title'           => __( 'Replaced with the term name', 'bp-seo'),
						'modified'             => __( 'Replaced with the post/page modified time', 'bp-seo'),		
						'id'                   => __( 'Replaced with the post/page ID', 'bp-seo'),
						'name'                 => __( 'Replaced with the post/page author\'s \'nicename\'', 'bp-seo'),
						'userid'               => __( 'Replaced with the post/page author\'s user ID', 'bp-seo'),
						'searchphrase'         => __( 'Replaced with the current search phrase', 'bp-seo'),
						'currenttime'          => __( 'Replaced with the current time', 'bp-seo'),
						'currentdate'          => __( 'Replaced with the current date', 'bp-seo'),
						'currentmonth'         => __( 'Replaced with the current month', 'bp-seo'),
						'currentyear'          => __( 'Replaced with the current year', 'bp-seo'),
						'page'                 => __( 'Replaced with the current page number (i.e. page 2 of 4)', 'bp-seo'),
						'pagetotal'            => __( 'Replaced with the current page total', 'bp-seo'),
						'pagenumber'           => __( 'Replaced with the current page number', 'bp-seo'),
						'caption'              => __( 'Attachment caption', 'bp-seo')
					);
				?>
				<table class="widefat">
					<?php foreach ($wpseo AS $tag => $text) : ?>
						<tr<?php if ($pos++ % 2 == 1) echo ' class=""' ?>>
							<th>%%<?php echo $tag; ?>%%</th>
							<td><?php echo $text; ?></td>
						</tr>
					<?php endforeach; ?>
				</table><br>
				<div class="sfb-entry-title"><?php _e ('Special Tags for Buddypress', 'bp-seo') ?></div>
				<p><?php _e ('These tags can be included and will be replaced when a Buddypress page is displayed.', 'bp-seo'); ?></p>
				<?php
					$pos = 0;
					$buddyseo = array
					(
						'sitename'                   => __( 'The site\'s name', 'bp-seo'),
						'currentcomponent'           => __( 'Replaced with current component', 'bp-seo'),
						'currentaction'              => __( 'Replaced with current action', 'bp-seo'),
						'componentname'              => __( 'Replaced with component name', 'bp-seo'),
						'componentid'                => __( 'Replaced with the component ID', 'bp-seo'),
						'componentdescription'       => __( 'Replaced with component description', 'bp-seo'),
						'componentstatus'            => __( 'Replaced with the component status', 'bp-seo'),
						'componentdatecreated'       => __( 'Replaced with the component date created', 'bp-seo'),
						'componentadmins'            => __( 'Replaced with the component admins', 'bp-seo'),
						'componenttotalmembercount'  => __( 'Replaced with the component total member-count', 'bp-seo'),
						'componentlastactivity'      => __( 'Replaced with the component last activity', 'bp-seo'),
						'forumtopictitle'           => __( 'Replaced with current forum topic title', 'bp-seo'),
						'forumtopicpostername'           => __( 'Replaced with current forum topic poster name', 'bp-seo'),
						'forumtopiclastpostername'           => __( 'Replaced with current forum topic last poster name', 'bp-seo'),
						'forumtopicstarttime'           => __( 'Replaced with current forum topic start time', 'bp-seo'),
						'forumtopictime'           => __( 'Replaced with current forum topic time', 'bp-seo'),
						'forumtopictext'           => __( 'Replaced with current forum topic text', 'bp-seo'),	
						'userid'                     => __( 'Replaced with the user ID', 'bp-seo'),
						'usernicename'               => __( 'Replaced with the user\'s nicename', 'bp-seo'),
						'userregistered'             => __( 'Replaced with the user registered', 'bp-seo'),
						'displayname'                => __( 'Replaced with the displayed name of the user', 'bp-seo'),
						'fullname'                   => __( 'Replaced with the full name of the user', 'bp-seo'),
					);
				?>
				<table class="widefat">
					<?php foreach ($buddyseo AS $tag => $text) : ?>
						<tr<?php if ($pos++ % 2 == 1) echo ' class=""' ?>>
							<th>%%<?php echo $tag; ?>%%</th>
							<td><?php echo $text; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	    <div class="spacer"></div>
	  </div>
	  <?php if(!is_pro()){ ?>
	  	<div id="cap_pro" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
	  		<?php seopress_get_pro();?>
	  	</div>
	  <?php } ?>
	</div>
	</div>
<?php } ?>