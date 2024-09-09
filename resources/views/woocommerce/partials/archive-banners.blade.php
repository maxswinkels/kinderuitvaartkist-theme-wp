@foreach ($banners as $banner)
  @php
      $banner = (object) $banner;
  @endphp
  @if ($banner->position == $loop_index)
    <div class="c-product-grid__item c-product-grid__item--banner col-sm-6 col-lg-4">
      <div class="c-product-banner">
        <div class="c-product-banner__background {{ !isset($banner->image) || empty($banner->image) ? 'has-no-image' : ''}}">
          @if (isset($banner->image) && !empty($banner->image))
            @include('macros.image', ['image' => $banner->image, 'class' => 'c-product-banner__image'])
          @endif
        </div>
        <div class="c-product-banner__inner">
          <h3 class="c-product-banner__title">
            {!! App\boldWordFormat($banner->title ) !!}
          </h3>
          @include('macros.button', ['link' => $banner->link, 'class' => $btn_class ?? 'btn-gold stretched-link'])
        </div>
      </div>
    </div>
  @endif
@endforeach
