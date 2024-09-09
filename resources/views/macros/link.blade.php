@if(!empty($link))
    @php
        $link = (object) $link;
    @endphp
    <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="btn btn-link {{ $theme ? 'text-' . $theme : '' }}">
        <span>{!! $link->title !!}</span>
        @svg('arrow-right')
    </a>
@endif
