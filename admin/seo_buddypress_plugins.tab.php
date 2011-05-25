<?php 
/**
 * Configuration tab for buddypress plugins
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
global $bp; 

$bp_seo_components = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_plugins' );
	
// Searching for component slugs and adding to array
$bp_components = sp_get_bp_components();

?>
	<div id="cap_bp_plugins">

        <div class="seopress-tab-head">
            <div class="logo"><img src="<?php echo $seopress_plugin_url; ?>images/logo-buddypress.png" /></div>    
              <h3><?php _e ('Buddypress Plugins', 'seopress'); ?></h3>
              <p><?php _e ('Setup your title and meta tags of the buddypress plugins you have installed.', 'seopress'); ?></p>
            <div style="clear:both;"></div>
        </div>
        
       <?php include( "seo_buddypress_plugins.sub_tab.php" ); ?>
        
        <div class="seopress-config">
        	<h3><?php _e ('Configurate plugins', 'seopress'); ?></h3>
            	<?php
				
				$i = 0;
				
				/***
				* Component configurator
				*/
				
				// Runnung all components
				foreach ($bp_components as $bp_component) {
					
					if( $bp_component != 'profile' && 
						$bp_component != 'activity' && 
						$bp_component != 'blogs' && 
						$bp_component != 'forums' && 
						$bp_component != 'friends' && 
						$bp_component != 'groups' && 
						$bp_component != 'messages'&& 
						$bp_component != 'settings') {
						
						// Title of component
						$component_name = ucwords( strtolower( str_replace( '_', ' ', $bp_component ) ) );
						echo '<div class="accordion">';
						echo '<h3><a href="#">' . $component_name . '</a></h3>';
						
						if( isset(
							$bp_seo_components[$bp_component][directory]) && 
							$bp_seo_components[$bp_component][directory] == 1)
						{ 
							$checked = 'checked';
						} else {
							$checked =''; 
						}
						
						
						/*
						* Component extend fields
						*/
						echo '<div>';
						
						echo '<div class="seopress-components-text"><p>' . sprintf( __( 'Setup the tabs of "%s". Any checked entry wil let appear a meta box.'  , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) .'</p></div>';
						
						
						echo '<table class="widefat">';
						
						echo '<tbody>';						
						
						echo '<tr>';
						echo '<td width="50%"><div class="components_extend"><strong>' . sprintf( __( '"%s" has a directory page:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div></td>';
						echo '<td width="50%"><div class="components_extend"><input name="componentspage-types[' . $bp_component . '][directory]" type="checkbox" '.$checked.' value="1"></div></td>';
						echo '</tr>';
						
						echo '<tr>';		
	              		echo '<td colspan="2"><div class="components_extend"><strong>' . sprintf(  __( '"%s" creating pages in following components:' , 'seopress' ), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</strong></div>';
						echo '<input name="componentspage-types[' . $bp_component . '][slug]" type="hidden" ' . $checked . ' value="' . $bp_component . '" /></td>' ;
						echo '</tr>';												

						$bp_main_component = $bp_component;						
						
						// Runnung all extendable components of this component
						foreach($bp_components as $bp_sub_component){
							
							if( $bp_sub_component != 'messages' && $bp_sub_component != 'settings' && $bp_sub_component != 'blogs' && $bp_sub_component != $bp_component ){							
								 
								if( isset( $bp_seo_components[ $bp_main_component ]['plugin_extends'] ) ){
									
									if( in_array( $bp_sub_component, $bp_seo_components[$bp_main_component]['plugin_extends'] ) ) {
										$checked = 'checked';
									} else {
										$checked ='';
									}
								} else {
									$checked ='';
								}
								
								$component_name = ucwords( strtolower( str_replace( '_', ' ', $bp_sub_component ) ) );
								echo '<tr>';
								echo '<td><div class="components_extend"><lable for="componentspage-types[' . $bp_main_component . '][plugin_extends][]">' . $component_name . '</lable></div></td>';
								echo '<td><div class="components_extend"><input name="componentspage-types[' . $bp_main_component . '][plugin_extends][]" id="componentspage-types[' . $bp_main_component . '][plugin_extends][]"  type="checkbox" '.$checked.'  value="' . $bp_sub_component . '" /></div></td>'; 
								echo '</tr>';								
																
							}
							$checked = '';
						}
						echo '</tbody>';
						echo '</table>';
						echo '</div></div>';												
					}					
				}
				
				?>
        </div>
    </div>