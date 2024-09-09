@php
    $content = (object) $row->row_content;
    $unique_id = wp_unique_id();
@endphp

<section class="o-section o-section--accordion bg-light-lila">
  <div class="container-fluid-lg">
    <h1 class="h3">{{ $content->title }}</h1>

    <div class="accordion" id="accordion-{{ $unique_id }}">

      @foreach ($content->items as $item)
        @php
            $item = (object) $item;
        @endphp
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-{{ $unique_id }}-{{ $loop->iteration }}">
            <button class="accordion-button {{ $loop->first && $unique_id == 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $unique_id }}-{{ $loop->iteration }}" aria-expanded="{{ $loop->first && $unique_id == 1 ? 'true' : 'false' }}" aria-controls="collapse-{{ $unique_id }}-{{ $loop->iteration }}">
              {{ $item->label }}
            </button>
          </h2>
          <div id="collapse-{{ $unique_id }}-{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first && $unique_id == 1 ? 'show' : '' }}" aria-labelledby="heading-{{ $unique_id }}-{{ $loop->iteration }}" data-bs-parent="#accordion-{{ $unique_id }}">
            <div class="accordion-body">
              {!! $item->content !!}
            </div>
          </div>
        </div>

      @endforeach

    </div>

  </div>
</section>
