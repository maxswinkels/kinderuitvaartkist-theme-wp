@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--content-image-alt bg-light-gold">
  <div class="container-fluid-xl">
    <div class="c-content-image c-content-image--alt">
      <div class="row d-flex flex-sm-row-reverse">
        <div class="col-md-7 col-lg-6 c-content-image__col-content">
          <div class="c-content-image__col-content__inner">
            @include('macros.text-block', ['content' => $content, 'class' => 'ms-md-auto text-white', 'heading_type' => 'h1', 'btn_class' => 'btn-black'])
          </div>
        </div>
        <div class="col-md-5 col-lg-6 c-content-image__col-image">
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
