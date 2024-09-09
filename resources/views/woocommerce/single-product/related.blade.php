{{--
  /**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */
--}}

@php
  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }
@endphp

@if ($related_products)
  <section class="o-section o-section--product-related">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-3">
          <h1>
            Andere keken <br />
            <strong>ook naar</strong>
          </h1>
        </div>
        <div class="col-md-9">
          <div class="c-product-related-slider swiper-container swiper" data-product-related-slider>
            <div class="c-product-related-slider__wrapper swiper-wrapper">
              @foreach ($related_products as $related_product)
                <div class="c-product-related-slider__slide swiper-slide">
                  @php
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    wc_get_template_part( 'content', 'product' );
                  @endphp
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

@php
  wp_reset_postdata();
@endphp
