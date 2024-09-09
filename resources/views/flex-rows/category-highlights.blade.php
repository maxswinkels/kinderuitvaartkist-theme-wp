@php
    $content = (object) $row->row_content;
    $counter = 0;
@endphp

@if (isset($categories) && !empty($categories))
  <section class="o-section o-section--category-highlights">
    <div class="container-fluid">
      <h1>{!! App\boldWordFormat($content->title) !!}</h1>
      <div class="d-flex flex-column">
        <div class="order-md-2">
          <div class="c-product-related-slider c-product-related-slider--cat swiper-container swiper" data-category-highlights-slider>
            <div class="c-product-related-slider__wrapper swiper-wrapper">
              @foreach ($categories as $category)
                @php
                  $category = (object) $category;
                  $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                @endphp
                @if (!isset($thumbnail_id) || empty($thumbnail_id))
                  @continue
                @endif
                <div class="c-product-related-slider__slide swiper-slide">
                  @php
                    $category = (object) $category;
                    $counter = $counter + 1;
                    wc_get_template('content-product_cat.php', ['category' => $category]);
                  @endphp
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row order-md-1">
          <div class="offset-md-3 col-md-9">
            <div class="c-product-related-slider-nav c-product-related-slider-nav--cat">
              @php
                  $link = (object) $content->assortment_link;
              @endphp
              @if(!empty($link))
                <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="c-product-related-slider-nav__link btn btn-green">
                  {!! $link->title !!}
                </a>
              @endif
              <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--left {{ $counter <= 4 ? 'd-lg-none' : '' }}" data-category-highlights-prev>
                @svg('arrow-right')
              </button>
              <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--right {{ $counter <= 4 ? 'd-lg-none' : '' }}" data-category-highlights-next>
                @svg('arrow-right')
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
