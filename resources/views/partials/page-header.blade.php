<header class="c-page-header">
  <div class="c-page-header__background {{ !isset($page_header->image) || empty($page_header->image) ? 'has-no-image' : ''}}">
      @if (isset($page_header->image) && !empty($page_header->image))
        @include('macros.image', ['image' => $page_header->image, 'size' => ''])
      @endif
  </div>
  <div class="c-page-header__inner">
    <div class="container-fluid-xl">
      <div class="row gy-4 gx-5">
        <div class="col-md-6">
          @if (isset($page_header->title) && !empty($page_header->title))
            <h1 class="c-page-header__title">{!! App\boldWordFormat($page_header->title) !!}</h1>
          @else
            <h1 class="c-page-header__title">{!! App\boldWordFormat($page_title) !!}</h1>
          @endif
        </div>
        @if ((isset($page_header->content) && !empty($page_header->content)))
          <div class="col-md-6">
            <div class="c-page-header__text o-content u-text-large">
              {!! $page_header->content !!}
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</header>
