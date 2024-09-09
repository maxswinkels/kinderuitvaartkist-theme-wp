@php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = !empty( $has_calculated_shipping );
$show_shipping_calculator = !empty( $show_shipping_calculator );
$calculator_text          = '';

foreach($available_methods as $method) {
	if($method->method_id == 'free_shipping') {
		unset($available_methods['flat_rate:1']);
	}	
}

@endphp

<div class="woocommerce-shipping-totals shipping">
	<td data-title="{!! esc_attr( $package_name ) !!}">
		@if($available_methods)

      <ul id="shipping_method" class="woocommerce-shipping-methods">
				@foreach($available_methods as $method )
					<li>
						@if (1 < count($available_methods))
              @php
                printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); // WPCS: XSS ok.
              @endphp
            @else
              @php
							  printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
              @endphp
						@endif
            @php
						  printf( '<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr( sanitize_title( $method->id ) ), wc_cart_totals_shipping_method_label( $method ) ); // WPCS: XSS ok.
              do_action( 'woocommerce_after_shipping_rate', $method, $index );
            @endphp
					</li>
				@endforeach
			</ul>

      @if (is_cart())
				<p class="woocommerce-shipping-destination">
					@if($formatted_destination)
            @php
                // Translators: $s shipping destination.
                printf( esc_html__( 'Shipping to %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' );
                $calculator_text = esc_html__( 'Change address', 'woocommerce' );
            @endphp
					@else
						{!! wp_kses_post( apply_filters( 'woocommerce_shipping_estimate_html', __( 'Shipping options will be updated during checkout.', 'woocommerce' ) ) ) !!}
					@endif
				</p>
			@endif

    @elseif(!$has_calculated_shipping || !$formatted_destination )

      @if (is_cart() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ))
				{!! wp_kses_post( apply_filters( 'woocommerce_shipping_not_enabled_on_cart_html', __( 'Shipping costs are calculated during checkout.', 'woocommerce' ) ) ) !!}
			@else
				{!! wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( 'Enter your address to view shipping options.', 'woocommerce' ) ) ) !!}
			@endif

      @elseif (!is_cart())
			{!! wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) ) !!}

      @else
      @php
        // Translators: $s shipping destination.
        echo wp_kses_post( apply_filters( 'woocommerce_cart_no_shipping_available_html', sprintf( esc_html__( 'No shipping options were found for %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' ) ) );
        $calculator_text = esc_html__( 'Enter a different address', 'woocommerce' );
      @endphp
		@endif

		@if ($show_package_details)
      <p class="woocommerce-shipping-contents"><small>{!! esc_html( $package_details ) !!}</small></p>
		@endif

		@if ($show_shipping_calculator)
      @php
        woocommerce_shipping_calculator( $calculator_text );
      @endphp
		@endif
	</td>
</div>
