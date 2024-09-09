@php
    $content = (object) $row->row_content;
    $bg_color = isset($content->bg_color) && $content->bg_color ? $content->bg_color : '';
    if(isset($is_product_page) && $is_product_page) {
        $bg_color = 'bg-light-lila';
    }
@endphp

<section class="o-section o-section--content {{ $bg_color }}">
  <div class="container-fluid-xl">
    @include('macros.text-block', ['content' => $content, 'heading_type' => 'h1'])
  </div>
</section>
