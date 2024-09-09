<?php

/**
 * Tweak admin memory limit to decrease admin panel loading times
 */
add_filter('admin_memory_limit', function () {
    return "512M";
}, 10, 3);


/*
 * Remove default dashboard metaboxes and add a custom support box
 */
add_action('wp_dashboard_setup', function () {
    remove_action('welcome_panel', 'wp_welcome_panel');

    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');

    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');

    wp_add_dashboard_widget('custom_help_widget', 'Support', function () {
        echo '<p>Hulp nodig bij het aanpassen van deze website? Neem dan contact op met <a target="_blank" href="https://www.burocontent.nl/contact">BuroContent</a>.</p>';
    });
});


/*
 * Remove items form admin bar menu
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('view-site');
    $wp_admin_bar->remove_node('comments');
}, 100);


/*
 * Remove items form admin sidebar menu
 */
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});


/**
 * Remove yoast seo credit notice from the DOM.
 */
add_filter('wpseo_debug_markers', '__return_false' );


/**
 * Move Yoast to bottom
 */
add_filter( 'wpseo_metabox_prio', function () {
    return 'low';
});


/**
 * Disable comments
 */
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});


/**
 * Disable comments in front-end
 */
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);


/**
 * Hide existing comments
 */
add_filter('comments_array', '__return_empty_array', 10, 2);


/**
 * Remove admin footer text
 */
add_filter('admin_footer_text', '__return_false', 100);


/**
 * Remove admin footer version number
 */
if (!current_user_can('manage_options')) {
    add_filter('update_footer', '__return_empty_string', 100);
}


/**
 * Hide login errors to prevent hacking :)
 */
add_filter('login_errors', function () {
    return 'Something is wrong!';
});


/**
 * Disable ping back
 */
add_action('pre_ping', function ($links) {
    foreach ($links as $l => $link)
        if (0 === strpos($link, get_option('home')))
            unset($links[$l]);
});


/**
 * Disable emojis
 */
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Remove from TinyMCE
    add_filter('tiny_mce_plugins', function ($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    });
});


/**
 * Disable widgets
 */
add_filter('sidebars_widgets', function ($sidebars_widgets) {
    if (is_home()) $sidebars_widgets = array(false);
    return $sidebars_widgets;
 });
remove_action( 'init', 'wp_widgets_init', 1 );


/**
 * Disable Gutenberg editor
 */
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library'); // WordPress core
    wp_dequeue_style('wp-block-library-theme'); // WordPress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
}, 100);


/**
 * Remove Gutenberg related functions
 */
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters' );
remove_action('render_block', 'wp_render_duotone_support', 10 );
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action('wp_footer', 'wp_enqueue_global_styles', 1 );


/**
 * Enable SVG upload
 */
add_action('upload_mimes', function ($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
});

add_filter('map_meta_cap', function($caps, $cap) {
    if ($cap == 'unfiltered_upload') {
        $caps = array();
        $caps[] = $cap;
    }
    return $caps;
}, 0, 2);


/**
 * Move the location of the admin bar to the bottom of the screen,
 * this avoids problems with a sticky navbar
 */
$user = wp_get_current_user();
if ($user && isset($user->user_login)) {
    add_action('wp_head', function () {
        echo '<style>div#wpadminbar{top:auto;bottom:0;position:fixed}.ab-sub-wrapper{bottom:32px}html[lang]{margin-top:0!important;margin-bottom:32px!important}@media screen and (max-width:782px){.ab-sub-wrapper{bottom:46px}html[lang]{margin-bottom:46px!important}}</style>';
    }, 100);
}


/**
 * Remove rankmath plugin credit notice from the DOM.
 *
 * @param boolean
 */
add_filter('rank_math/frontend/remove_credit_notice', '__return_true');


/**
 * Remove rankmath sitemap credit.
 *
 * @param boolean
 */
add_filter('rank_math/sitemap/remove_credit', '__return_true');


/**
 * Unload jquery-migrate from front-end
 */
add_action('wp_default_scripts', function ($scripts) {
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            ['jquery-migrate']
        );
    }
});


add_filter( 'wp_get_nav_menu_items', function ($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}, 10, 3 );
