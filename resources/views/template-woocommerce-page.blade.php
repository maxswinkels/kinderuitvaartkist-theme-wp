{{--
    Template Name: Woocommerce pagina
--}}

@extends('layouts.app')

@section('content')

  @while (have_posts()) @php the_post() @endphp

    <section class="o-section o-section--woocommerce">
      <div class="container-fluid">
        @if ($fields->template_shortcode)
          {!! do_shortcode($fields->template_shortcode) !!}
        @endif
      </div>
    </section>

  @endwhile

@endsection
