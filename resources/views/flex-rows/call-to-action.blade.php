@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--cta">
  @if (!empty($content->image))
    <div class="o-section__background">
      @include('macros.image', ['image' => $content->image, 'size' => ''])
    </div>
  @endif
  <div class="c-call-to-action">
    <div class="container-fluid-lg">
      <div class="c-call-to-action__inner">
        @include('macros.text-block', ['content' => $content, 'heading_type' => 'h1'])
      </div>
    </div>
  </div>
</section>
