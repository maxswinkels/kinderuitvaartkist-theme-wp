
<div class="c-navbar" data-navbar>
  <div class="container-fluid">
      <div class="c-navbar__inner">

          <a class="c-navbar__brand" href="{{ home_url('/') }}">
              <div class="c-navbar__logo">
                  @svg('navbar-logo')
              </div>
          </a>

          <div class="c-navbar__collapse" data-navbar-collapse>
              <div class="c-navbar__collapse__inner">
                  @if (has_nav_menu('main_navigation'))
                      @php
                          $nav_menu = App\custom_get_nav_menu_items('main_navigation')
                      @endphp
                      <div class="c-navbar__menu" data-navbar-menu>
                          <ul class="navbar-nav">
                              @foreach ($nav_menu as $key => $value)
                                  @php
                                      $item = (object) $value;
                                  @endphp
                                  @if(empty($item->child))
                                      <li class="nav-item menu-item {{ $item->classes }}">
                                          <a href="{!! strtolower($item->url) !!}" target="{{ $item->target ? $item->target : '_self'  }}" class="nav-link">
                                              <span>{!! $item->title !!}</span>
                                          </a>
                                      </li>
                                  @else
                                      @php
                                          $index = $item->order;
                                      @endphp
                                      <li class="nav-item menu-item dropdown menu-item-has-children {{ $item->classes }}">
                                          <a href="#nav-{!! $index !!}" target="{{ $item->target ? $item->target : '_self'  }}" class="nav-link nav-link-dropdown" data-navbar-submenu-toggle aria-expanded="false" data-tooltip="menu" data-tooltip-target="nav-{{ $index }}" aria-describedby="nav-{!! $index !!}">
                                              <span>{!! $item->title !!}</span>
                                              @svg('chevron-right')
                                          </a>
                                          <div id="nav-{!! $index !!}" data-tippy-root>
                                              <div class="nav-submenu">
                                                  <div class="nav-submenu-title">{!! $item->title !!}</div>
                                                  <ul class="navbar-nav">
                                                      @foreach ($item->child as $key => $value)
                                                          @php
                                                              $child_item = (object) $value;
                                                          @endphp
                                                          <li class="nav-item menu-item {{ $child_item->classes }}">
                                                              <a href="{!! strtolower($child_item->url) !!}" target="{{ $child_item->target ? $child_item->target : '_self'  }}" class="nav-link">
                                                                  <span>{!! $child_item->title !!}</span>
                                                              </a>
                                                          </li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                          </div>
                                      </li>
                                  @endif
                              @endforeach
                          </ul>
                      </div>
                      <div class="c-navbar__submenu-collapse" data-navbar-submenu-collapse>
                        <button type="button" class="c-navbar__submenu-collapse__back" data-navbar-submenu-back>
                          @svg('chevron-left')
                          <span><?php _e('Terug','element-offices') ?></span>
                        </button>
                        <div class="c-navbar__submenu-collapse__inner">
                            <div data-navbar-submenu-collapse-wrapper></div>
                        </div>
                      </div>
                  @endif
              </div>
          </div>

          @if (isset($contact_details->phone_raw) || isset($contact_details->phone_display))
            <a href="tel:{{ $contact_details->phone_raw ?? $contact_details->phone_display }}" target="_blank" class="c-navbar__phone btn btn-black">
                @svg('phone')
                <span>{{ $contact_details->phone_display }}</span>
            </a>
          @endif

          <button class="c-navbar__toggle" type="button" data-navbar-toggle>
              <span class="visually-hidden"><?php _e('Toggle navigation','element-offices') ?></span>
              <div class="c-navbar__toggle__bars">
                  <span class="c-navbar__toggle__bars__bar c-navbar__toggle__bars__bar--first"></span>
                  <span class="c-navbar__toggle__bars__bar c-navbar__toggle__bars__bar--middle"></span>
                  <span class="c-navbar__toggle__bars__bar c-navbar__toggle__bars__bar--last"></span>
              </div>
          </button>

          <div class="c-navbar-backdrop" data-navbar-backdrop></div>

      </div>
  </div>
</div>
