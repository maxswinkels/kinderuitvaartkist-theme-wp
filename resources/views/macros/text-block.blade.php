@if (!empty($content))
  <div class="o-content {{ $class ?? '' }}">
      @if ($content->title)
          <{{ $heading_type ?? 'h2'}}>{!! App\boldWordFormat($content->title) !!}</{{ $heading_type ?? 'h2'}}>
      @endif
      @if (isset($content->content))
          {!! $content->content !!}
      @endif
      @if(!empty($content->link))
          @include('macros.button', ['link' => $content->link, 'class' => $btn_class ?? 'btn-lila'])
      @endif
  </div>
@endif
