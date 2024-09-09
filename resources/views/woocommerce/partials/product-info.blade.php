<div class="c-product-info">

  <h1 class="c-product-title">{!! $page_title !!}</h1>

  @if ($fields->product_subtitle)
    <div class="c-product-subtitle">
      {{ $fields->product_subtitle}}
    </div>
  @endif

  @if (isset($fields->product_variants) && !empty($fields->product_variants))
    <div class="c-product-variants">

      @php
          $thumbnail_id = $product->get_image_id();
          $image = wp_get_attachment_image_url( $thumbnail_id, 'medium' );
      @endphp

      <div class="c-product-variants__item">
        <div class="c-product-variant no-link is-active">
          @if (!empty($image))
            <img src="{!! $image !!}" class="c-product-variant__image" alt="{!! $page_title!!}">
          @endif
        </div>
      </div>
      
      @foreach ($fields->product_variants as $product_id)
        @if ($product_id == $product->get_id())
          @continue
        @endif

        @php
          $post_object = get_post( $product_id );
          $thumbnail_id = get_post_thumbnail_id( $product_id );
          $image = wp_get_attachment_image_url( $thumbnail_id, 'medium' );
        @endphp
        <div class="c-product-variants__item">
          <a href="{{ get_permalink( $product_id ); }}" class="c-product-variant">
            @if (!empty($image))
              <img src="{!! $image !!}" class="c-product-variant__image" alt="{!! $post_object->post_title !!}">
            @endif
          </a>
        </div>
      @endforeach
    </div>
  @endif

  @if ($fields->product_description)
    <div class="c-product-info__description">
      {!! $fields->product_description !!}
    </div>
  @endif
  

  @if (isset($shop_settings->product_contact_form_shortcode) && !empty($shop_settings->product_contact_form_shortcode))

    <button type="button" class="c-product-info__order-btn btn btn-gold" data-bs-toggle="modal" data-bs-target="#contact-product-modal">
      <span>Neem contact op</span>
      @svg('arrow-right')
    </button>

    <div class="modal fade c-form-modal" id="contact-product-modal" tabindex="-1" aria-labelledby="contact-product-modal-title" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <button type="button" class="c-form-modal__close" data-bs-dismiss="modal" aria-label="Sluiten">
            @svg('close')
          </button>
          <div class="c-form-modal__inner">
            <h5 id="contact-product-modal-title" class="c-form-modal__title h3">Stel een vraag over "{!! $page_title !!}"</h5>
            <div class="c-form">
              {!! do_shortcode($shop_settings->product_contact_form_shortcode) !!}
            </div>
          </div>
        </div>
      </div>
    </div>

  @endif

  <div class="accordion accordion--product-info" id="product-accordions">
    @if ($fields->product_description_lining)
      <div class="accordion-item">
        <h2 class="accordion-header" id="product-accordion-heading-1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
            Binnenbekleding
            @svg('chevron-down')
          </button>
        </h2>
        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="product-accordion-heading-1" data-bs-parent="#product-accordions">
          <div class="accordion-body">
            <p>
              {!! $fields->product_description_lining !!}
              @if (isset($shop_settings->accordion_inner_lining_link) && !empty($shop_settings->accordion_inner_lining_link))
                @php
                  $link = (object) $shop_settings->accordion_inner_lining_link;
                @endphp
                <a href="{!! strtolower($link->url) !!}" target="{{ $link->target ? $link->target : '_self'  }}" class="mt-2 d-block">
                  {!! $link->title !!}
                </a>
              @endif
            </p>
          </div>
        </div>
      </div>
    @endif
    @if ($fields->product_internal_dimensions || $fields->product_external_dimensions)
      @php
          $product_internal_dimensions = (object) $fields->product_internal_dimensions;
          $product_external_dimensions = (object) $fields->product_external_dimensions;
      @endphp
      @if ($product_internal_dimensions->length || $product_internal_dimensions->width || $product_internal_dimensions->height || $product_external_dimensions->length || $product_external_dimensions->width || $product_external_dimensions->height)
        <div class="accordion-item">
          <h2 class="accordion-header" id="product-accordion-heading-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
              Maatvoering
              @svg('chevron-down')
            </button>
          </h2>
          <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="product-accordion-heading-2" data-bs-parent="#product-accordions">
            <div class="accordion-body">
            <div class="c-product-sizes">
              <div class="c-product-sizes__inner">
                @if ($product_internal_dimensions->length || $product_internal_dimensions->width || $product_internal_dimensions->height)
                  <table>
                    <thead>
                      <tr>
                        <th>Inwendig</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($product_internal_dimensions->length)
                        <tr>
                          <td>Lengte:</td>
                          <td>{{ $product_internal_dimensions->length }} cm</td>
                        </tr>
                      @endif
                      @if($product_internal_dimensions->width)
                        <tr>
                          <td>Breedte:</td>
                          <td>{{ $product_internal_dimensions->width }} cm</td>
                        </tr>
                      @endif
                      @if($product_internal_dimensions->height)
                        <tr>
                          <td>Hoogte:</td>
                          <td>{{ $product_internal_dimensions->height }} cm</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                @endif
                @if ($product_external_dimensions->length || $product_external_dimensions->width || $product_external_dimensions->height)
                  <table>
                    <thead>
                      <tr>
                        <th>Uitwendig</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($product_external_dimensions->length)
                        <tr>
                          <td>Lengte:</td>
                          <td>{{ $product_external_dimensions->length }} cm</td>
                        </tr>
                      @endif
                      @if($product_external_dimensions->width)
                        <tr>
                          <td>Breedte:</td>
                          <td>{{ $product_external_dimensions->width }} cm</td>
                        </tr>
                      @endif
                      @if($product_external_dimensions->height)
                        <tr>
                          <td>Hoogte:</td>
                          <td>{{ $product_external_dimensions->height }} cm</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                @endif
              </div>
              @if (isset($shop_settings->accordion_dimensions_link) && !empty($shop_settings->accordion_dimensions_link))
                @php
                  $link = (object) $shop_settings->accordion_dimensions_link;
                @endphp
                <a href="{!! strtolower($link->url) !!}" target="{{ $link->target ? $link->target : '_self'  }}" class="mt-2 d-block">
                  {!! $link->title !!}
                </a>
              @endif
              </div>
            </div>
          </div>
        </div>
      @endif
    @endif
  </div>

</div>
