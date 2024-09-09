<?php

namespace App;

/**
 * Disable woocommerce style
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Chnage shop loop
 */
add_filter( 'loop_shop_per_page', function($cols) {
    $cols = 15;
    return $cols;
}, 20);
