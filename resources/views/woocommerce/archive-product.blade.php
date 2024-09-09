@php
    /**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

 defined( 'ABSPATH' ) || exit;
@endphp

{{-- 950px --}}

@extends('layouts.app')

@section('content')
  @php
    do_action('woocommerce_before_main_content');
  @endphp

  @include('partials.page-header')

  <section class="o-section o-section--breadcrumb">
    <div class="container-fluid">
      {{ woocommerce_breadcrumb() }}
    </div>
  </section>

  @if (woocommerce_product_loop())

    <section class="o-section o-section--product-gird">
      <div class="container-fluid">

        @php
          do_action( 'woocommerce_before_shop_loop' );
          $display_type = woocommerce_get_loop_display_mode();
        @endphp

        @if ('subcategories' === $display_type )
          @include('woocommerce.partials.archive-cat-grid')
        @else
          @include('woocommerce.partials.archive-product-grid')
        @endif

        @php
          do_action( 'woocommerce_after_shop_loop' );
        @endphp

      </div>
    </section>
  @else

  <section class="o-section o-section--product-not-found">
    <div class="container-fluid">
      <div class="o-content">
        <p class="h1">Geen producten gevonden!</p>
        <a class="btn btn-gold" href="/">Naar de homepage</a>
      </div>
    </div>
  </section>

  @endif

  @php
    do_action('woocommerce_after_main_content');
  @endphp

@endsection
