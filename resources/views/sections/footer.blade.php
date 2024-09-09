<footer class="c-footer">
  <div class="container-fluid">

      <div class="c-footer__main">
          <div class="row gy-4">

              <div class="col-lg-3">
                  <a href="{{ home_url('/') }}" class="c-footer__logo">
                    @svg('logo')
                  </a>
              </div>

              <div class="col-md-6 col-lg-3">
                  <div class="c-footer-info">
                      <h3 class="c-footer-title"><?php _e('Contact', 'van-wijk') ?></h3>
                     <p>
                        @if (isset($contact_details->address))
                          {!! $contact_details->address !!}
                        @endif
                        @if (isset($contact_details->phone_raw) || isset($contact_details->phone_display))
                          <br />
                          <a href="tel:{{ $contact_details->phone_raw ?? $contact_details->phone_display }}" target="_blank">{{ $contact_details->phone_display }}</a>
                          <br />
                        @endif
                        @if (isset($contact_details->email))
                          <a href="mailto:{{ $contact_details->email }}">{{ $contact_details->email }}</a>
                          <br />
                        @endif
                     </p>
                  </div>
              </div>

              <div class="col-md-6 col-lg-3 order-md-2">
                <div class="c-footer-socials c-social-icons">
                  @if(isset($contact_details->facebook) && !empty($contact_details->facebook))
                    <a class="c-social-icons__link" target="_blank" rel="noopener nofollow" href="{{ $contact_details->facebook }}">
                      @svg('facebook')
                    </a>
                  @endif
                  @if(isset($contact_details->instagram) && !empty($contact_details->instagram))
                    <a class="c-social-icons__link" target="_blank" rel="noopener nofollow"  href="{{ $contact_details->instagram }}">
                      @svg('instagram')
                    </a>
                  @endif
                  @if(isset($contact_details->linkedin) && !empty($contact_details->linkedin))
                    <a class="c-social-icons__link" target="_blank" rel="noopener nofollow"  href="{{ $contact_details->linkedin }}">
                      @svg('linkedin')
                    </a>
                  @endif
                </div>
              </div>

              <div class="col-md-6 col-lg-3 order-md-1">
                <h3 class="c-footer-title"><?php _e('Samenwerking met', 'van-wijk') ?></h3>
                <div class="c-footer-logos">
                  <a href="https://www.vonea.nl/" target="_blank" class="c-footer-logos__link">
                    @svg('logo-vonea')
                  </a>
                  <a href="https://vtu-online.nl/" target="_blank" class="c-footer-logos__link">
                    @svg('logo-vtu')
                  </a>
                </div>
              </div>

          </div>
      </div>

      <div class="c-footer__disclaimer">
          <div class="c-footer-copyrights">
              © {{ date('Y') }} <?php _e('Van Wijk','van-wijk') ?>
          </div>
          @if (has_nav_menu('footer_navigation'))
              {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'navbar-nav', 'walker' => new \App\wp_bootstrap5_navwalker()]) !!}
          @endif
      </div>

  </div>
</footer>
