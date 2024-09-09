@php
  wc_set_loop_prop( 'total', 0 );
  global $wp_query;
@endphp

@if ($wp_query->is_main_query())
  @php
    $wp_query->post_count    = 0;
    $wp_query->max_num_pages = 0;
  @endphp
@endif

@php
  $term = get_queried_object();
  $product_categories = woocommerce_get_product_subcategories($term->term_id);
@endphp

@if ($product_categories )

  @php
    $loop_index = 1;
  @endphp

  <div class="c-product-grid row">

    @foreach ( $product_categories as $category )

      <div class="c-product-grid__item col-sm-6 col-lg-4">

        @php
          wc_get_template('content-product_cat.php', ['category' => $category]);
          $loop_index++;
        @endphp

      </div>

      @include('woocommerce.partials.archive-banners', [
        'loop_index' => $loop_index,
      ])

    @endforeach

  </div>

@endif
