@if(!empty($hero->background_image))
    <header class="c-hero">
        <div class="c-hero__background">
          @if ($hero->has_video && $hero->video)
            @if (!empty($hero->video_poster))
              @php
                $image = (object) $hero->video_poster;
                $image_src =  wp_get_attachment_url($image->id);
              @endphp
              <video src="{{ $hero->video }}" autoplay loop muted playsinline poster="{{ $image_src }}"></video>
            @else
              <video src="{{ $hero->video }}" autoplay loop muted playsinline></video>
            @endif
          @else
            @include('macros.image', ['image' => $hero->background_image, 'size' => ''])
          @endif
        </div>
        <div class="c-hero__inner">
            <div class="container-fluid">
                @if (isset($hero->title) && !empty($hero->title))
                    <h1 class="c-hero__title">{!! App\boldWordFormat($hero->title) !!}</h1>
                @endif
                <a href="#intro" class="c-hero__down">
                  @svg('arrow-down')
              </a>
            </div>
        </div>
    </header>
@endif
