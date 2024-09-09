@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--usps">
  <div class="container-fluid-xl">

    @include('macros.text-block', ['content' => $content, 'heading_type' => 'h1', 'class' => 'u-text-large'])

    <div class="c-usps">
      <div class="row">
        @foreach ($content->usps as $usp)
          @php
              $usp = (object) $usp;
          @endphp
          <div class="col-md-6">
            <div class="c-usp">
              @include('macros.image', ['image' => $usp->icon, 'class' => 'c-usp__icon', 'size' => 'medium'])
              <div class="c-usp__content">
                <h3 class="c-usp__title">{!! $usp->title !!}</h3>
                <p class="c-usp__text">
                  {!! $usp->text !!}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
