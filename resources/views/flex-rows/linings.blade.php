@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--image-cards">
  <div class="container-fluid-xl">

    @include('macros.text-block', ['content' => $content, 'heading_type' => 'h1', 'class' => 'u-text-large'])

    <div class="c-image-cards">
      @if (!empty($content->group))
        @foreach ($content->group as $group)
          @php
              $group = (object) $group;
          @endphp
          @if (!empty($group->items))
            <div class="c-image-cards__group">
              <h2 class="c-image-cards__group__title h3">{!! App\boldWordFormat($group->title) !!}</h2>
              <div class="row">
                @foreach ($group->items as $item)
                  @php
                      $item = (object) $item;
                  @endphp
                    <div class="col-sm-6 col-md-4">
                      <div class="c-image-card">
                        <div class="c-image-card__image">
                          @include('macros.image', ['image' => $item->image, 'class' => ''])
                        </div>
                        <h3>{{ $item->subtitle }}</h3>
                        <p>{{ $item->subtext }}</p>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
          @endif
        @endforeach
      @endif
    </div>

  </div>
</section>
