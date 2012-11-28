<?php
/**
 * SeoPress functions - WordPress MS layer if not used
 */

if(!function_exists('get_blog_option')){
    function get_blog_option( $blog_id, $option_name, $default = false ) {
        return get_option( $option_name, $default );
    }
}

if(!function_exists('add_blog_option')){
    function add_blog_option( $blog_id, $option_name, $option_value ) {
        return add_option( $option_name, $option_value );
    }
}
if(!function_exists('update_blog_option')){
    function update_blog_option( $blog_id, $option_name, $option_value ) {
        return update_option( $option_name, $option_value );
    }
}

?>