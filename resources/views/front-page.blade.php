@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.hero-front-page')
    @include('partials.intro-front-page')
    @include('partials.flex-rows')
  @endwhile
@endsection
