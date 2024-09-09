<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

@php
  $cart_discount = WC()->cart->get_discount_total() + WC()->cart->get_discount_tax();
@endphp

<div class="shop_table woocommerce-checkout-review-order-table">

	<div class="review-wrap">
	<div class="checkout-products">
		@php
      do_action( 'woocommerce_review_order_before_cart_contents' );
    @endphp

    @foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item )

      @php
        $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
      @endphp

      @if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) )

        @php
          $product = wc_get_product($_product->get_id());
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $_product->get_id() ), 'single-post-thumbnail' );
		           
		  // update image if product is a variation
		  $parent_product = wc_get_product( $product->get_parent_id() );
		  if($parent_product) {
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $parent_product->get_id() ), 'single-post-thumbnail' );
		  }
        @endphp

        <div class="c-cart-product">
          <div class="c-cart-product__image" style="background-image:url('{{ $image[0] }}');"></div>
          <div class="c-cart-product__right">
            <h4>{{ $product->get_name() }}</h4>
            <div class="c-cart-product__trash">{{ $cart_item['quantity'] }}x</div>
            <div class="c-cart-product__price">
              {!! $product->get_price_html() !!}
            </div>
          </div>
        </div>
      @endif

    @endforeach

		@php
      do_action( 'woocommerce_review_order_after_cart_contents' );
		@endphp
	</div>
	<div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
      @php
        if ( is_string( $coupon ) ) {
          $coupon = new WC_Coupon( $coupon );
        }
        $label = apply_filters( 'woocommerce_cart_totals_coupon_label', $coupon->get_code(), $coupon );
      @endphp
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <div class="cart-discount-label">
          <div class="cart-discount-label-title">
            {!! esc_html__( 'Kortingscode:', 'woocommerce' ) !!}
          </div>
          <div class="cart-discount-label-code text-uppercase">
            {!! $label !!}
          </div>
        </div>
				<div class="cart-discount-amount">{!! wc_cart_totals_coupon_html( $coupon ) !!}</div>
			</div>
		<?php endforeach; ?>

		<div class="shipping-wrap">
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

			<?php endif; ?>
		</div>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<div><?php echo esc_html( $fee->name ); ?></div>
				<div><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<div><?php echo esc_html( $tax->label ); ?></div>
						<div><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<div><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		@if($cart_discount !== 0)
		<div class="c-cart-total__discount">Jouw korting: <span class="val">-{!! wc_price($cart_discount) !!}</div>
		@endif

		<div class="order-total">
			<div class="order-total-label">{!! esc_html_e( 'Total', 'woocommerce' )!!}</div>
			<div>{{ wc_cart_totals_order_total_html() }}</div>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</div>
	</div>
</div>