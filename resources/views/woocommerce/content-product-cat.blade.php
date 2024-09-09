@php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
@endphp

<div {{ wc_product_class( '', $category ) }} >
  <a href="{!! get_term_link( (int)$category->term_id, 'product_cat' ); !!}" class="c-product-card c-product-card--category">
    <div class="c-product-card__thumbnail">
      @php
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_image_url( $thumbnail_id, 'medium' );
      @endphp
      @if (!empty($image))
        <img src="{!! $image !!}" class="c-product-card__image" alt="{!! $category->cat_name !!}">
      @endif
    </div>
    <div class="c-product-card__body">
      <h3 class="c-product-card__title">
        {{ $category->cat_name }}
      </h3>
      <div class="c-product-card__subtitle">
        @php
          $category_subtitle = get_term_meta( $category->term_id, 'subtitle', true );
        @endphp
        {{ $category_subtitle }}
      </div>
    </div>
  </a>
</div>
