{{--
@see         https://docs.woocommerce.com/document/template-structure/
@package     WooCommerce\Templates
@version     1.6.4
--}}

@extends('layouts.app')

@section('content')
  @php
    do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
  @endphp

  @while(have_posts())
    @php
      the_post();
      $product = wc_get_product();
      $cur_price = $product->get_regular_price();
    @endphp

    <section class="o-section o-section--breadcrumb">
      <div class="container-fluid">
        {{ woocommerce_breadcrumb() }}
      </div>
    </section>

    <section class="o-section o-section--product-info">
      <div class="container-fluid">
        <div class="row gx-0">
          <div class="col-12 col-image-slider">
            @include('woocommerce.partials.product-image-slider')
          </div>
          <div class="col-12 col-lg">
            @include('woocommerce.partials.product-info')
          </div>
        </div>
      </div>
    </section>
    
    @include('partials.flex-rows', [
      'is_product_page' => true,
    ])

    @php
      do_action( 'woocommerce_after_single_product_summary' );
    @endphp

  @endwhile

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
@endsection
