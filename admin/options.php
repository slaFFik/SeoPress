<?php
/**
 * SeoPress settings page in admin
 */
function seopress_options(){
    global $seopress_plugin_url;

    /*
     * Adding display
     */
    $display = new  TK_WP_ADMIN_DISPLAY( __( 'Options', 'seopress'), 'plugins' );
    $display->add_element( '<p>' . __( 'Configure global settings for SeoPress.', 'seopress') . '</p>' );

    $form = new TK_WP_FORM( 'seopress_options' );

    /*
     * Adding jqueryui tabs
     */
    $tabs = new TK_WP_JQUERYUI_TABS();

    /**
     * Adding tabs
     */
    $tabs->add_tab( 'cap_main_blog', __ ('SEO Options', 'seopress'), sp_admin_settings_tab() );
    $tabs->add_tab( 'cap_main_blog2', __ ('SeoPress Behaviour', 'seopress'), sp_admin_settings_behaviour_tab() );

    do_action( 'sp_options_tabs', $tabs );

    $form->add_element( $tabs->get_html() );

    $display->add_element( $form->get_html() );

    $display->write_html();

    include( 'footer.php' );
}

/**
 * Configuration tab for general seo settings
 */
function sp_admin_settings_tab(){
    global $seopress_plugin_url;
    $html = '';

    $html .= sp_admin_tab_header( __('Global Seo options', 'seopress'), __('Setup the global settings of the Seo part of the plugin.', 'seopress'), $seopress_plugin_url . 'includes/images/logo-wordpress.png' );

    $html .= '<table class="widefat">';

    $html .= '<tbody>';

    $html .= '<tr>';
    $html .= '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Title', 'seopress') . '</strong></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Show pagination', 'seopress') . '</div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'show_pagination', 'seopress_options', 'show_pagination' ) . '</div></td>';
    $html .= '</tr>';


    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Standard length of title', 'seopress') . '</div></td>';
    // $html .= '<td><div class="components_extend"><input type="text" name="bp_seo_metadesc_length" length="4" size="3" value="' . get_option('bp_seo_metadesc_length') . '" /> (' . __('number of chars', 'seopress' ) . ')</div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_textfield( 'std_title_legth', 'seopress_options', 'std_title_legth' ) . ' (' . __('number of chars', 'seopress' ) . ')</div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Standard length of meta description', 'seopress') . '</div></td>';
    // $html .= '<td><div class="components_extend"><input type="text" name="bp_seo_metadesc_length" length="4" size="3" value="' . get_option('bp_seo_metadesc_length') . '" /> (' . __('number of chars', 'seopress' ) . ')</div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_textfield( 'std_metadesc_legth', 'seopress_options', 'std_metadesc_legth' ) . ' (' . __('number of chars', 'seopress' ) . ')</div></td>';
    $html .= '</tr>';


    $html .= '<tr>';
    $html .= '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Meta boxes in posts and pages', 'seopress') . '</strong></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Hide meta boxes in posts:', 'seopress') . '</div></td>';
    // $html .= '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_post" ' . $meta_box_post_checked . ' value="1" /></div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'metabox_post', 'seopress_options', 'metabox_post' ) . '</div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Hide meta boxes in pages:', 'seopress') . '</div></td>';
    // $html .= '<td><div class="components_extend"><input type="checkbox" name="bp_seo_meta_box_page" ' . $meta_box_page_checked . ' value="1" /></div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'metabox_page', 'seopress_options', 'metabox_page' ) . '</div></td>';
    $html .= '</tr>';

    do_action( 'seopress_seo_options' );

    $html .= '</tbody>';
    $html .= '</table>';

    $button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress' ) . '" /></p>';

    $html .= $button;

    return $html;
}

/**
 * How should SeoPress plugin behave in different situations
 */
function sp_admin_settings_behaviour_tab(){
    global $seopress_plugin_url;
    $html = '';

    $html .= sp_admin_tab_header(__('How should SeoPress plugin behave in different situations?', 'seopress'),
                                    'Like on plugin deactivation etc.',
                                    $seopress_plugin_url . 'includes/images/logo-settings.png' );

    $html .= '<table class="widefat">';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2"><div class="components_extend" colspan="2"><strong>' . __('Title', 'seopress') . '</strong></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><div class="components_extend">' . __('Delete all SeoPress options and data on plugin deactivation?', 'seopress') . '</div></td>';
    $html .= '<td><div class="components_extend">' . tk_wp_form_checkbox( 'delete_data', 'seopress_options', 'delete_data' ) . '</div></td>';
    $html .= '</tr>';

    do_action( 'seopress_seo_options_behaviour' );

    $html .= '</tbody>';
    $html .= '</table>';

    $button = '<p class="submit"><input class="button-primary" type="submit" name="save" value="' . __( 'Save', 'seopress' ) . '" /></p>';

    $html .= $button;

    return $html;
}

?>