<?php

/**
 * Custom options pages
 * @link https://www.advancedcustomfields.com/resources/acf_add_options_page/
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'     => 'Algemene instellingen',
        'menu_title'    => 'Algemene instellingen',
        'menu_slug'     => 'general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false,
    ));
}

/**
 * disable ACF menu in admin bar
 */
add_filter('acf/settings/show_admin', '__return_false');

/**
 * disable ACFE Enhanced UI, Forms and Block types
 */
add_action('acf/init', function () {
    acf_update_setting('acfe/modules/ui', false);
    acf_update_setting('acfe/modules/forms', false);
    acf_update_setting('acfe/modules/block_types', false);
});

/**
 * Set toolbar types
 */
add_filter( 'acf/fields/wysiwyg/toolbars' , function ( $toolbars ) {

    // Add custom toolbar option
    $toolbars['simple' ] = array();
	$toolbars['simple' ][1] = array(
        'formatselect', 'bold', 'italic', 'underline',
        'link', 'unlink', 'bullist', 'numlist',
        'charmap', 'undo', 'redo', 'removeformat', 'pastetext'
    );

    $toolbars['simple_no_format' ] = array();
	$toolbars['simple_no_format' ][1] = array(
        'bold', 'italic', 'underline', 'link', 'bullist', 'numlist', 'charmap', 'undo', 'redo', 'removeformat', 'pastetext'
    );

    return $toolbars;
});
