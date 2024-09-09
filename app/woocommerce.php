<?php

namespace App;

/**
 * Disable woocommerce style
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Remove content wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Remove breadcrumb
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/**
 * Chnage shop loop
 */
add_filter( 'loop_shop_per_page', function($cols) {
    $cols = 15;
    return $cols;
}, 20);

/**
 * Get cart amount
 */
add_action('wp_ajax_loadcartamount', __NAMESPACE__.'\\loadcartamount');
add_action('wp_ajax_nopriv_loadcartamount', __NAMESPACE__.'\\loadcartamount');

function loadcartamount() {
    global $woocommerce;
    $count = $woocommerce->cart->cart_contents_count;

    wp_send_json(array('success' => true, 'msg' => $count));
}

/**
 * Change cart item amount
 */
add_action('wp_ajax_changequantity', __NAMESPACE__.'\\changeQuantity');
add_action('wp_ajax_nopriv_changequantity', __NAMESPACE__.'\\changeQuantity');

function changeQuantity() {
    global $woocommerce;
    $quantity = sanitize_text_field($_POST['quantity']);
    $itemKey = sanitize_text_field($_POST['itemKey']);

    $woocommerce->cart->set_quantity($itemKey, $quantity);

    wp_send_json(array('success' => true, 'msg' => 'done'));
}

/**
 * Delete cart item
 */
add_action('wp_ajax_deleteitem', __NAMESPACE__.'\\deleteItem');
add_action('wp_ajax_nopriv_deleteitem', __NAMESPACE__.'\\deleteItem');

function deleteItem() {
    global $woocommerce;
    $quantity = sanitize_text_field($_POST['quantity']);
    $itemKey = sanitize_text_field($_POST['itemKey']);

    $woocommerce->cart->set_quantity($itemKey, $quantity);

    wp_send_json(array('success' => true, 'msg' => 'done'));
}


/**
 * Load cart
 */
add_action('wp_ajax_loadcart', __NAMESPACE__.'\\loadcart');
add_action('wp_ajax_nopriv_loadcart', __NAMESPACE__.'\\loadcart');

function loadcart() {
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    $return = '';
    $return .= '<h3 class="c-cart-title">Winkelwagen</h3>';

    if(count($items) > 0){
        $checkout_url = wc_get_page_permalink( 'checkout' );

        $return .= '<div class="c-cart-products">';

        foreach($items as $k => $item) {
            $product = $item['data']->post;
            $product = wc_get_product($product->ID);
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'single-post-thumbnail' );
            
            // update image if product is a variation
            $parent_product = wc_get_product( $product->get_parent_id() );
            if($parent_product) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $parent_product->get_id() ), 'single-post-thumbnail' );
            }

            $return .= '<div class="c-cart-product">';
            $return .= '<div class="c-cart-product__image" style="background-image:url('.$image[0].');"></div>';
            $return .= '<div class="c-cart-product__right">';
            $return .= '<h4>'.$product->get_name().'</h4>';
            $return .= '<div class="c-cart-product__quantity"><label>Aantal</label><select name="quantity" data-quantity-select data-item="'.$k.'">';

            for ($x = 1; $x <= 10; $x++) {
                $return .= '<option value="'.$x.'"';
                if($item['quantity'] == $x) {
                    $return .= 'selected';
                }
                $return .= '>'.$x.'</option>';
            }

            $return .= '</select></div>';
            $return .= '<div class="c-cart-product__trash" data-remove-item data-item="'.$k.'">verwijderen</div>';
            $return .= '<div class="c-cart-product__price">'.$product->get_price_html().'</div>';
            $return .= '</div></div>';
        }

        $cart_discount = $woocommerce->cart->get_discount_total() + $woocommerce->cart->get_discount_tax();
        if($cart_discount !== 0) {
            $return .= '<div class="c-cart-total__discount">Jouw korting: <span class="val">-'.wc_price($cart_discount).'</div>';
        }

        $cart_total = $woocommerce->cart->get_cart_contents_total() + $woocommerce->cart->get_cart_contents_tax();
        $return .= '<div class="c-cart-total__amount">Totaal: <span class="val">'.wc_price($cart_total).'</div>';

        $return .= '</div>';
        $return .= '<div class="c-cart-checkout">';
        $return .= '<a href="'.$checkout_url.'" class="btn btn-green">Afrekenen</a>';
        $return .= '</div>';
    } else {
        $return .= '<div class="c-cart-no-products">Je Winkelwagen is momenteel leeg.</div>';
    }
    wp_send_json(array('success' => true, 'msg' => $return));
}

/// checkout

/// remove order notes
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

/// change field names
add_filter('woocommerce_default_address_fields', function( $address_fields ) {
    $address_fields['address_1']['placeholder'] = 'Straat';
    $address_fields['address_2']['placeholder'] = 'Huisnummer + toevoeging';

    $address_fields['address_1']['label'] = 'Straat';
    $address_fields['address_2']['label'] = 'Huisnummer + toevoeging';

    $address_fields['address_2']['label_class'] = '';
    $address_fields['address_2']['required'] = true;

    return $address_fields;
}, 20, 1);


/// phone not required
add_filter( 'woocommerce_billing_fields', function( $address_fields ) {
    $address_fields['billing_phone']['required'] = false;
    return $address_fields;
}, 10, 1 );

/// remove company name
add_filter( 'woocommerce_checkout_fields' , function( $fields ) {
    unset($fields['billing']['billing_company']);
    return $fields;
});

// move coupon field on the cart page
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_review_order_after_order_total', 'woocommerce_checkout_coupon_form', 10 );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', function() {
    if (!function_exists('loop_columns')) {
        return 3; // 3 products per row
    }
}, 999);


/// remove downloads
add_filter( 'woocommerce_account_menu_items', function ($items) {
    unset($items['downloads']);
    return $items;
});

/// always return prices
add_filter( 'woocommerce_show_variation_price', '__return_true');

/// hide fixt fee shipment when free available
function my_hide_shipping_when_free_is_available( $rates ) {
    $free = array();
    foreach ( $rates as $rate_id => $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $free[ $rate_id ] = $rate;
            break;
        }
    }
    return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', __NAMESPACE__.'\\my_hide_shipping_when_free_is_available', 100 );

add_action( 'woocommerce_before_checkout_form', function () {
    // Set coupon code
    $coupon = WC()->session->get('coupon');
    if ( ! empty( $coupon ) && ! WC()->cart->has_discount( $coupon ) ){
        WC()->cart->add_discount( $coupon ); // apply the coupon discount
        WC()->session->__unset('coupon'); // remove coupon code from session
    }
}, 10, 0 );


add_action( 'woocommerce_add_to_cart', function () {
    // Set coupon code
    $coupon = WC()->session->get('coupon');
    if ( ! empty( $coupon ) && ! WC()->cart->has_discount( $coupon ) ){
        WC()->cart->add_discount( $coupon ); // apply the coupon discount
        WC()->session->__unset('coupon'); // remove coupon code from session
    }
});
