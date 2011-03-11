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

### Option page for the plugin and components configuration and meta data entry pages

function bp_seo_plugins() {
	global $bp; 
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	$bp_components = array(); 
	foreach ( (array)$bp as $key => $value ) {
	   if(isset($bp->$key->slug)){
	     $bp_components[] = $key;
	   }
	}?>
	<div class="wrap">
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#config-tabs").tabs();
	});
	</script>
	
	<h2><?php _e('<b>SeoPress:</b> Plugins Seo Options', 'bp_seo') ?></h2>
	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	
	<div id="config-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
	  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
	  	<li><a href="#cap_configuration" ><?php _e('Configuration'); ?></a></li>   
		  <?php
		  foreach ($bp_components as $bp_component) {
		    if($bp_component != 'profile' && $bp_component != 'activity' && $bp_component != 'blogs' && $bp_component != 'forums' && $bp_component != 'friends' && $bp_component != 'groups' && $bp_component != 'messages'&& $bp_component != 'settings'){
		      echo '<li><a href="#cap_'.$bp_component.'">'.$bp_component.'</a></li>';
		    }
		  }?>
		<?php if(!is_pro()){ ?>
	      <li class="ui-state-default ui-corner-top"><a href="#cap_pro"><?php _e ('Get the Pro Version', 'bp-seo') ?></a></li>
	  	<?php } ?>
	  </ul>
	
	    <div id="cap_configuration" >
	    	<div class="sfb-entry">
				<div class="sfb-entry-title"><?php _e('Buddypress Seo configuration for extended components', 'bp_seo') ?></div>
				<p><?php _e('Please select the component for which you like to edit the meta tags.', 'bp_seo') ?></p>
					<p><?php _e(' !!! Attention: most times if a component has a directory view, every entry of the component has an own home view.', 'bp_seo') ?> 
			        <?php _e('To generate dynamic meta tags for these views, you need to select the component itself under "extends other components". ', 'bp_seo') ?>
			        <br><br>
			        <?php _e('For example, if you have "Buddypress Events" installed: it has a directory view and every event has a home view. In this case, you have to select "events" under "extends other components".', 'bp_seo') ?>
			        <br>
		        </p>
		        <p><div class="submit"><input type="submit" name="update_bp_seo_plugins_setup" value="<?php _e('Update components configuration', 'bp_seo') ?>"  style="font-weight:bold;" /></div></p>	
	    	</div>
		<div class="spacer"></div>
	      <?php
	      $i = 0;
	      foreach ($bp_components as $bp_component) {
	          if($bp_component != 'profile' && $bp_component != 'activity' && $bp_component != 'blogs' && $bp_component != 'forums' && $bp_component != 'friends' && $bp_component != 'groups' && $bp_component != 'messages'&& $bp_component != 'settings'){
	            echo '<div class="sfb-entry">';
	            echo '<INPUT TYPE="hidden" NAME="plugin_counter[]"  VALUE="'.$i.'">'; 
	            echo '<INPUT TYPE="hidden" NAME="plugin_name_'.$i.'"  VALUE="'.$bp_component.'">'; 
	            echo '<INPUT TYPE="hidden" NAME="plugin_slug_'.$i.'"  VALUE="'.$bp->$bp_component->slug.'">'; 
	            echo '<div class="sfb-entry-title">'.strtoupper  ($bp_component).'</div>';
	            if(isset($bp_seo_components[$bp_component][directory]) && $bp_seo_components[$bp_component][directory] == 1) { $checked = 'checked';} else {$checked ='';}
	              echo '<div class="sfb-entry-title">'.$bp_component.' has a directory view: <INPUT NAME="plugin_directory_'.$i.'" TYPE="CHECKBOX" '.$checked.'   VALUE="1"></div>';
	              echo '<div class="sfb-entry-title">extends other components:</div>';
	              $bp_component_main = $bp_component;
	              foreach($bp_components as $bp_component){
	                  if($bp_component != 'messages' && $bp_component != 'settings' && $bp_component != 'blogs'){ 
	                    if(isset($bp_seo_components[$bp_component_main][plugin_extends])){
	                  //echo '$bp_components: '.$bp_component.' $bp->$bp_component->slug: '.$bp->$bp_component->slug.' -- '.in_array($bp->$bp_component->slug,$bp_seo_components[$bp_component_main][plugin_extends]).'<br>';
	                      if(in_array($bp->$bp_component->slug,$bp_seo_components[$bp_component_main][plugin_extends]) == 1) {
	                        $checked = 'checked';
	                      } else {
	                        $checked ='';
	                      }
	                    } else {
	                        $checked ='';
	                    }
	                    echo '<div class="components_extend">'.$bp_component.'<INPUT NAME="plugin_extends_'.$i.'[]" TYPE="CHECKBOX" '.$checked.'  VALUE="'.$bp->$bp_component->slug.'"></div>'; 
	                  }
	                  $checked ='';
	              }
	              
	              echo '<div class="clear"></div><div class="sfb-entry-title">uses other components:</div>';
	              foreach($bp_components as $bp_component){
	                  if($bp_component != 'messages' && $bp_component != 'activity' && $bp_component != 'profile' && $bp_component != 'groups' && $bp_component != 'settings'){ 
	                    if(isset($bp_seo_components[$bp_component_main][plugin_use])){
	                      if(in_array($bp->$bp_component->slug,$bp_seo_components[$bp_component_main][plugin_use]) == 1) {
	                        $checked = 'checked';
	                      } else {
	                        $checked ='';
	                      }
	                    } else {
	                        $checked ='';
	                    }
	                    echo '<div class="components_extend">'.$bp_component.'<INPUT NAME="plugin_use_'.$i.'[]" TYPE="CHECKBOX" '.$checked.' VALUE="'.$bp->$bp_component->slug.'"></div>'; 
	                  } 
	              }
	              echo '<div class="clear"></div></div><div class="spacer"></div>';
	              $i ++; 
	            }
	      }
			echo '</form>';
		echo '</div>';    

	      $i = 2;
	      foreach ( $bp_components as $bp_component ) {
	          if($bp_component != 'profile' && $bp_component != 'activity' && $bp_component != 'blogs' && $bp_component != 'forums' && $bp_component != 'friends' && $bp_component != 'groups' && $bp_component != 'messages'&& $bp_component != 'settings'){
	            echo '<div id="cap_'.$bp_component.'">'. get_plugin_seo_options($bp_component,$bp_seo_components).'</div>';
	            $i++;
	          }
	      }?>

		<?php if(!is_pro()){ ?>
			  <div id="cap_pro" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
			   <?php seopress_get_pro();?>
			  </div>
		 <?php } ?>
	</div>
</div>
<?php 	    
}

function get_plugin_seo_options($bp_component,$bp_seo_components){
  	global $bp;
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
	);
	$tab  = '     <div id="tab-head">';
	$tab .= '    	<div class="sfb-entry">';
	$tab .= '				<div class="sfb-entry-title">Seo for '.$bp_component.'</div>';
	$tab .= '<div class="submit"><input type="submit" name="update_bp_seo_plugins_meta" value="Save '.$bp_component.' SEO options"  style="font-weight:bold;" /></div>';
	$tab .= '<table class="widefat">';
	  
	foreach ($buddyseo AS $tag => $text) :
		if ($pos++ % 2 == 1){ $alt = 'class=""'; }
	  	$tab .= '<tr'.$alt.'>';
		$tab .= '<th>%%'.$tag.'%%</th>';
		$tab .= '<td>'.$text.'</td>';
	  	$tab .= '</tr>';
	endforeach;

	$tab .= '</table>';
	$tab .= '<br>	For a list of all available special tags go <a href="/wp-admin/admin.php?page=bp_seo_main_page" target="_blank">'.__('here').'</a>.';
	$tab .= '  </div>  </div>';
	$tab .= '   <div class="spacer"></div>';
 
	if(isset($bp_seo_components[$bp_component][directory]) && $bp_seo_components[$bp_component][directory] == 1){
	  	$get_the_meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$bp_component."_directory");
	  	$lable= array(
	  		$bp_component." directory",
	  		$bp_component."_directory_title",
	  		$bp_component."_directory_desc",
	  		$bp_component."_directory_tags",
	  		$bp_component,
	  		'directory',
	  		$bp_component."_directory_noindex"	
	  		);
	  				 	
	    $tab .= bp_seo_entry($lable,$get_the_meta);
	}
  
	if(isset($bp_seo_components[$bp_component][plugin_extends])){
	    $tab .= '     <div id="tab-head">';
	    $tab .= '    	<div class="sfb-entry">';
	    $tab .= '				<div class="sfb-entry-title">'.__('COMPONENTS EXTENDED').'</div>';
	    $tab .= '			</div>';
	    $tab .= '    </div>';
	    $tab .= '   <div class="spacer"></div>';
	    foreach($bp_seo_components[$bp_component][plugin_extends] as $plugin_extends){
	      $get_the_meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$bp_component."_".$plugin_extends.'_extends');
	      $lable= array(
	      	$bp_component." $plugin_extends",
	      	$bp_component."_".$plugin_extends."_title_extends",
	      	$bp_component."_".$plugin_extends."_desc_extends",
	      	$bp_component."_".$plugin_extends."_tags_extends",
	      	$bp_component,
	      	$plugin_extends,
	      	$bp_component."_".$plugin_extends."_noindex_extends");
	      $tab .= bp_seo_entry($lable,$get_the_meta);
	    }
  	}
  
	if(isset($bp_seo_components[$bp_component][plugin_use])){
	    $tab .= '     <div id="tab-head">';
	    $tab .= '    	<div class="sfb-entry">';
	    $tab .= '				<div class="sfb-entry-title">COMPONENTS USED</div>';
	    $tab .= '			</div>';
	    $tab .= '    </div>';
	    $tab .= '   <div class="spacer"></div>';
	    foreach($bp_seo_components[$bp_component][plugin_use] as $plugin_use){
	      $get_the_meta = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_".$bp_component."_".$plugin_use.'_use');
	      $lable= array(
	      	$bp_component." $plugin_use",
	      	$bp_component."_".$plugin_use."_title_use",
	      	$bp_component."_".$plugin_use."_desc_use",
	      	$bp_component."_".$plugin_use."_tags_use",
	      	$bp_component,
	      	$plugin_use,
	      	$bp_component."_".$plugin_use."_noindex_use");
	      $tab .= bp_seo_entry($lable,$get_the_meta);
	    }
	}
return $tab;
}?>