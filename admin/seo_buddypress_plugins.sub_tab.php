<?php
/**
 * Configuration sub tab for buddypress plugins
 *
 * @package SeoPress
 * @author Sven Wagener
 * @copyright Copyright (C) Themekraft
 **/
function seopress_component_tab( $bp_component ){
	$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
	
	$is_component = 0;
	
	echo '<div class="accordion">';
	
	// If component has directory view
	if( isset( $bp_seo_components[ $bp_component ][ 'directory' ] ) && $bp_seo_components[ $bp_component ][directory] == 1){
		
		$meta = get_blog_option( SITE_ID_CURRENT_SITE , 'bp_seo_' . $bp_component );
		
		$lable= array(
			'Directory',
			$bp_component . '_title',
			$bp_component . '_desc',
			$bp_component . '_tags',
			$bp_component,
			'',
			$bp_component . '_noindex'	
		);
		
		$is_component = 1;
					
		seopress_metabox( $lable, $meta, 'bp-component-unknown' );
	}
	
	if( isset( $bp_seo_components[$bp_component][ 'plugin_extends' ] )){

		foreach( $bp_seo_components[ $bp_component ][ 'plugin_extends' ] as $main_comp ){
			
			$meta = get_blog_option( SITE_ID_CURRENT_SITE , "bp_seo_" . $main_comp . "_" . $bp_component );
			
			$lable = array(
				ucwords( $bp_component ) . ' ' . __( 'page in', 'seopress') . ' ' . ucwords( $main_comp ) ,
				$main_comp . '_' . $bp_component . "_title",
				$main_comp . '_' . $bp_component . "_desc",
				$main_comp . '_' . $bp_component . "_tags",
				$main_comp,
				$bp_component,
				$main_comp . '_' . $bp_component . "_noindex"
			);
			
			$is_component = 1;
			
			seopress_metabox( $lable, $meta, 'bp-component-unknown' );
		}
	}
	/*
	if( isset( $bp_seo_components[ $bp_component ][ 'plugin_use' ])){
		foreach( $bp_seo_components[ $bp_component ][ 'plugin_use' ] as $plugin_use ){
			$meta = get_blog_option( SITE_ID_CURRENT_SITE , "bp_seo_" . $bp_component . "_" . $plugin_use . '_use' );
			$lable = array(
				$plugin_use,
				$bp_component . '_' . $plugin_use . '_title_use',
				$bp_component . '_' . $plugin_use . '_desc_use',
				$bp_component . '_' . $plugin_use . '_tags_use',
				$bp_component,
				$plugin_use,
				$bp_component . '_' . $plugin_use . '_noindex_use'
			);
			
			$is_component = 1;
			
			seopress_metabox( $lable, $meta );
		}
	}
	*/
	echo '</div>';
	
	if( $is_component == 0 ){
		echo '<div class="seopress-notice"><p>' . sprintf(__('Please config your "%s" plugin before you setup your component meta! (Do this at the bottom of this page)'), str_replace( '_', ' ', ucwords( strtolower( $bp_component ) ) ) ) . '</p></div>';
	}
}

global $bp; 

$bp_seo_components = get_blog_option(SITE_ID_CURRENT_SITE,"bp_seo_plugins");
$bp_components = sp_get_bp_components(); 

?>
<div class="config-tabs">
    <ul>
<?php
foreach ($bp_components as $bp_component) {
	if(	sp_is_bp_plugin ( $bp_component ) ){
		$tab_name = ucwords( strtolower( str_replace( '_', ' ', $bp_component ) ) );
		echo '<li><a href="#cap_' . $bp_component . '">' . $tab_name  .'</a></li>';
	}
}
?>
	</ul>
<?php
foreach ($bp_components as $bp_component) {
	if( sp_is_bp_plugin ( $bp_component ) ){
		echo '<div id="cap_' . $bp_component . '">';
		seopress_component_tab( $bp_component );
		echo '</div>';
	}
}
?>
</div>