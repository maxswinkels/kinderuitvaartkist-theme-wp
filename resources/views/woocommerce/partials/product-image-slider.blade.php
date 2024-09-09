@php
  $image_ids = array();
  if($product->get_image_id()) {
    $image_ids[] = $product->get_image_id();
  }
  if($product->get_gallery_image_ids()) {
    $image_ids = array_merge($image_ids, $product->get_gallery_image_ids());
  }
@endphp

<div class="c-product-image-slider">
  <div class="c-product-image-slider__inner swiper" data-product-slider>
    <div class="c-product-image-slider__wrapper swiper-wrapper">
      @if (count($image_ids) > 0)
        @foreach ($image_ids as $image_id)
          @php
            $url = wp_get_attachment_url($image_id, 'large' );
          @endphp
          @if(isset($url))
            @php
              $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
              $srcset = wp_get_attachment_image_srcset($image_id, 'large');
              $sizes = wp_get_attachment_image_sizes($image_id, 'large');
            @endphp
            <div class="c-product-image-slider__slide swiper-slide" data-image="{{ $image_id }}" data-index="{{ $loop->index }}">
              <img src="{!! $url !!}" alt="{!! $alt !!}" class="c-product-image img-fluid" srcset="{{ $srcset}}" sizes="{{ $sizes }}" loading="lazy">
            </div>
          @endif
        @endforeach
      @endif
    </div>
    <div class="c-product-image-slider__pagination swiper-pagination" data-product-slider-pagination></div>
    @if (count($image_ids) > 1)
      <button type="button" class="c-product-image-slider__arrow swiper-button-next" data-product-slider-next>
        @svg('chevron-right')
      </button>
      <button type="button" class="c-product-image-slider__arrow swiper-button-prev" data-product-slider-prev>
        @svg('chevron-left')
      </button>
    @endif
  </div>
</div>
