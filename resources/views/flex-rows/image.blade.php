
@php
    $content = (object) $row->row_content;
    $bg_color = isset($content->bg_color) && $content->bg_color ? $content->bg_color : '';
    if(isset($is_product_page) && $is_product_page) {
        $bg_color = 'bg-light-lila';
    }
@endphp

<section class="o-section o-section--image {{ $bg_color }}">
  @if ($content->full_width)
    @if (!empty($content->image))
      <div class="o-wrapper-image-full">
        @include('macros.image', ['image' => $content->image, 'size' => ''])
      </div>
    @endif
  @else
    <div class="container-fluid-xl">
      @include('macros.image', ['image' => $content->image, 'class' => 'o-image'])
    </div>
  @endif
</section>
