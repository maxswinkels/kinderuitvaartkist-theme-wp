@if(!empty($link))
    @php
        $link = (object) $link;
    @endphp
    <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="btn {{ $class ?? '' }}">
        @svg('arrow-right')
        <span>{!! $link->title !!}</span>
    </a>
@endif
