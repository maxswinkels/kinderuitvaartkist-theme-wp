@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--brochure-form bg-light-gold">
  <div class="container-fluid-xl">
    <div class="row">
      <div class="col-md-6">
        @include('macros.text-block', ['content' => $content, 'heading_type' => 'h1'])
        <div class="c-form">
          {!! do_shortcode($content->form_shortcode) !!}
        </div>
      </div>
      <div class="col-md-6">
        @if (!empty($content->image))
          @include('macros.image', ['image' => $content->image, 'class' => 'o-image'])
        @endif
      </div>
    </div>
  </div>
</section>
