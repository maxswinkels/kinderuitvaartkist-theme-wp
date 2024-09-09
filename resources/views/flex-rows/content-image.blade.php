@php
    $content = (object) $row->row_content;
    $bg_color = isset($content->bg_color) && $content->bg_color ? $content->bg_color : '';
    if(isset($is_product_page) && $is_product_page) {
        $bg_color = 'bg-light-gold';
    }
@endphp

<section class="o-section o-section--content-image {{ $bg_color }}">
  <div class="container-fluid-xl">
    <div class="c-content-image c-content-image--{{ $content->image_position }}">
      <div class="row d-flex {{ $content->image_position == 'left' ? 'flex-sm-row-reverse' : '' }}">
        <div class="col-md-6 align-self-center c-content-image__col-content">
          <div class="c-content-image__col-content__inner">
            @include('macros.text-block', ['content' => $content, 'class' => $content->image_position == 'left' ? 'ms-md-auto' : '', 'heading_type' => 'h1'])
          </div>
        </div>
        <div class="col-md-6 c-content-image__col-image">
          <div class="c-content-image__col-image__inner">
            @if (!empty($content->image))
              @include('macros.image', ['image' => $content->image, 'class' => 'o-image'])
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
