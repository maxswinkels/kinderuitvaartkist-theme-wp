<section class="o-section o-section--intro-front-page bg-green" id="intro">
  <div class="container-fluid-xl">
    <div class="row gx-5">
      <div class="col-md-6">
        @if ($intro->title)
          <h1>{!! App\boldWordFormat($intro->title) !!}</h1>
        @endif
      </div>
      <div class="col-md-6">
        <div class="o-content u-text-large mb-2">
          @if ($intro->content)
            {!! $intro->content !!}
          @endif
        </div>
        @include('macros.link', ['link' => $intro->link, 'theme' => 'brown'])
      </div>
    </div>
  </div>
</section>
