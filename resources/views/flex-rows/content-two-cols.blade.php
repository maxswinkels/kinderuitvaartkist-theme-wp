@php
    $content = (object) $row->row_content;
    $bg_color = isset($content->bg_color) && $content->bg_color ? $content->bg_color : '';
    if(isset($is_product_page) && $is_product_page) {
        $bg_color = 'bg-light-lila';
    }
@endphp

<section class="o-section o-section--content-cols {{ $bg_color }}">
  <div class="container-fluid-xl">
    <div class="row">
      <div class="col-md-6">
        @php
            $content->content_col_1 = (object) $content->content_col_1;
        @endphp
        @include('macros.text-block', ['content' => $content->content_col_1, 'heading_type' => 'h2'])
      </div>
      <div class="col-md-6">
        @php
          $content->content_col_2 = (object) $content->content_col_2;
        @endphp
        @include('macros.text-block', ['content' => $content->content_col_2, 'heading_type' => 'h2'])
      </div>
    </div>
  </div>
</section>
