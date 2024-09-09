@php
    $content = (object) $row->row_content;
@endphp

@if (isset($content->product_ids) && !empty($content->product_ids))
  <section class="o-section o-section--product-highlights">
    <div class="container-fluid">
      <div class="d-flex flex-column">
        <div class="row order-md-2">
          <div class="col-md-3">
            <h1>{!! App\boldWordFormat($content->title) !!}</h1>
          </div>
          <div class="col-md-9">
            <div class="c-product-related-slider swiper-container swiper" data-product-highlights-slider>
              <div class="c-product-related-slider__wrapper swiper-wrapper">
                @foreach ($content->product_ids as $product_id)
                  <div class="c-product-related-slider__slide swiper-slide">
                    @php
                      $post_object = get_post( $product_id );
                      setup_postdata( $GLOBALS['post'] =& $post_object );
                      wc_get_template_part( 'content', 'product' );
                    @endphp
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="row order-md-1">
          <div class="offset-md-3 col-md-9">
            <div class="c-product-related-slider-nav">
              @php
                  $link = (object) $content->assortment_link;
              @endphp
              @if(!empty($link))
                <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="c-product-related-slider-nav__link btn btn-green">
                  {!! $link->title !!}
                </a>
              @endif
              <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--left {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-highlights-prev>
                @svg('arrow-right')
              </button>
              <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--right {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-highlights-next>
                @svg('arrow-right')
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
