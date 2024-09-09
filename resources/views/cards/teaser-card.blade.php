@if ($data)
  @php
    $link = (object) $data->link;
  @endphp
  <a href="{!! $link->url !!} " class="c-teaser-block">
    <div class="c-teaser-block__image">
      @include('macros.image', ['image' => $data->image])
    </div>
    <div class="c-teaser-block__body text-dark">
      <h2 class="h3 mb-2">{{ $data->title }}</h2>
      <p class="mb-2">{{ $data->content }}</p>
      <div class="btn btn-link">
          <span>{!! $link->title !!}</span>
          @svg('arrow-right')
      </div>
    </div>
  </a>
@endif
