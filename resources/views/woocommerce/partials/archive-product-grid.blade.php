@if(wc_get_loop_prop('total'))
  @php
    $loop_index = 1;
  @endphp

    <div class="c-product-overview row">
      <div class="col-md-3">

        <div class="c-filters" data-filters>
          <button class="c-filters__trigger btn btn-gold" data-filters-open>
            Filters
          </button>
          <div class="c-filters__collapse" data-filters-collapse>

            <div class="c-filters__collapse__inner">
            
              <button class="c-filters__close btn btn-black" data-filters-close>
                Sluiten
              </button>

              <div class="c-filters__group">
                <h4>Lijnen</h4>
                @php
                  $term = get_queried_object();
                  $parent_term_id = $term->parent;
                  $product_categories = woocommerce_get_product_subcategories($parent_term_id);
                @endphp
                <ul class="c-filter-categories">
                  @foreach ($product_categories as $category)
                    <li class="c-filter-categories__item">
                      @if ($term->term_id == $category->term_id)
                        <div class="c-filter-categories__link no-link is-active">{{ $category->name }}</div>
                      @else
                        <a href="{!! get_term_link( (int)$category->term_id, 'product_cat' ); !!}" class="c-filter-categories__link {{ $term->term_id == $category->term_id ? 'is-active' : '' }}"> {{ $category->name }}</a>
                      @endif
                    </li>
                  @endforeach
                </ul>
              </div>

              @if (isset($shop_settings->filters_shortcode) && !empty($shop_settings->filters_shortcode))

                <div class="c-filters__group">
                  {!! do_shortcode($shop_settings->filters_shortcode) !!}
                </div>

              @endif

            </div>

          </div>
          <div class="c-filters-backdrop" data-filters-backdrop></div>
        </div>

      </div>
      <div class="col-md-9">

        <div class="c-product-grid row">

          @while(have_posts())

            <div class="c-product-grid__item col-sm-6 col-lg-4">

              @php
                the_post();
                do_action('woocommerce_shop_loop');
                wc_get_template_part('content', 'product');
                $loop_index++;
              @endphp

            </div>

            @include('woocommerce.partials.archive-banners', [
              'loop_index' => $loop_index,
            ])
          @endwhile

        </div>

      </div>
    </div>

@endif
