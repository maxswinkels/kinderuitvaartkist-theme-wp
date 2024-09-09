{{--
Template Name: Contact pagina
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
  @include('partials.page-header')

  <section class="o-section o-section--contact bg-light-gold">
    <div class="container-fluid-xl">

      <div class="c-contact-intro o-content u-text-large">
        {!! $fields->contact_intro_content !!}
      </div>

      <div class="c-contact-grid">
        <div class="row">
          <div class="col-md-6">
            <div class="c-form">
              <h1 class="h2">{!! App\boldWordFormat($fields->contact_form_title) !!}</h1>
              {!! do_shortcode($fields->contact_form_shortcode) !!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="c-contact-blocks">
              <div class="c-contact-block u-text-large">
                <h2><strong>Van Wijk</strong> Uitvaartkisten</h2>
                <ul class="c-contact-block__links">
                  <li class="c-contact-block__links__item">
                    @if (isset($fields->faq_link))
                      <a href="{{ $fields->faq_link }}" class="c-contact-block__links__link">
                        @svg('circle-question-mark')
                        Veel gestelde vragen
                      </a>
                    @endif
                  </li>
                  <li class="c-contact-block__links__item">
                    <a target="_blank" rel="noopener nofollow" href="https://nl-nl.facebook.com/vanwijkuitvaartkisten/"
                      class="c-contact-block__links__link">
                      @svg('circle-facebook')
                      Volg ons op Facebook
                    </a>
                  </li>
                  <li class="c-contact-block__links__item">
                    <a target="_blank" rel="noopener nofollow" href="https://www.instagram.com/vanwijkuitvaartkisten/"
                      class="c-contact-block__links__link">
                      @svg('circle-instagram')
                      Volg ons op Instagram
                    </a>
                  </li>
                  <li class="c-contact-block__links__item">
                    <a target="_blank" rel="noopener nofollow" href="https://www.linkedin.com/company/vanwijkuitvaartkisten/"
                      class="c-contact-block__links__link">
                      @svg('circle-linkedin')
                      Volg ons op LinkedIn
                    </a>
                  </li>
                </ul>
              </div>
              <div class="c-contact-block u-text-large">
                <div class="o-content">
                  <h2><strong>Bel ons</strong> of stuur een bericht</h2>
                  @if (isset($contact_details->phone_raw) || isset($contact_details->phone_display))
                    <p>
                      Wij staan u graag 24/7 te woord: <a href="tel:{{ $contact_details->phone_raw ?? $contact_details->phone_display }}" target="_blank">
                        {{ $contact_details->phone_display }}
                      </a>
                    </p>
                  @endif
                  @if (isset($contact_details->email) || (isset($contact_details->whatsapp_display) && isset($contact_details->whatsapp_link)))
                    <p>
                      Liever contact via e-mail of Whatsapp?<br />
                      @if (isset($contact_details->email))
                        E-mail: <a href="mailto:{{ $contact_details->email }}">{{ $contact_details->email }}</a><br />
                      @endif
                      @if (isset($contact_details->whatsapp_display) && isset($contact_details->whatsapp_link))
                        Whatsapp: <a href="{{ $contact_details->whatsapp_link }}" target="_blank" rel="noopener nofollow" title="stuur een bericht via whatsapp">
                          {{ $contact_details->whatsapp_display }}
                        </a>
                      @endif
                    </p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="c-contact-extra">
        <div class="row gy-4">
          <div class="col-md-6">
            @include('macros.image', ['image' => $fields->image, 'class' => 'o-image'])
          </div>
          <div class="col-md-6 align-self-center">
            <div class="o-content">
              <h2 class="h1"><strong>Van Wijk</strong> Uitvaartkisten</h2>
              <p class="u-text-large">
                @if (isset($contact_details->address))
                  {!! $contact_details->address !!}
                @endif
                @if (isset($contact_details->phone_raw) || isset($contact_details->phone_display))
                  <br />
                  <a href="tel:{{ $contact_details->phone_raw ?? $contact_details->phone_display }}" target="_blank">
                    {{ $contact_details->phone_display }}
                  </a>
                  <br />
                @endif
                @if (isset($contact_details->email))
                  <a href="mailto:{{ $contact_details->email }}">{{ $contact_details->email }}</a>
                  <br />
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  @endwhile
@endsection
