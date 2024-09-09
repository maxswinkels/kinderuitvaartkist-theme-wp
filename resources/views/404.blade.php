@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section class="o-section o-section--not-found">
      <div class="container-fluid">
        <div class="o-content">
          <h1>Pagina niet gevonden!</h1>
          <p>Helaas, wij hebben de door u opgevraagde pagina niet gevonden.</p>
          <a class="btn btn-lila" href="/">Naar de homepage</a>
        </div>
      </div>
    </section>
  @endif

@endsection
