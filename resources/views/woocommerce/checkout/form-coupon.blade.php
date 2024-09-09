<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>

<div class="woocommerce-form-coupon-toggle">
	{!! wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', ' <a href="#" class="showcoupon">' . esc_html__( 'Heb je een kortingscode?', 'woocommerce' ) . '</a>' ), 'notice' ) !!}
</div>

<div class="checkout_coupon">
  <form class="woocommerce-form-coupon" method="post">
    <div class="row g-2">
      <div class="col">
        <input type="text" name="coupon_code" class="form-control" placeholder="{!! esc_attr_e( 'Kortingscode', 'woocommerce' ); !!}" id="coupon_code" value="" />
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-green" name="apply_coupon" value="{!! esc_attr_e( 'Pas toe', 'woocommerce' ); !!}">{!! esc_html_e( 'Pas toe', 'woocommerce' ); !!}</button>
      </div>
    </div>
    <div class="clear"></div>
  </form>
</div>