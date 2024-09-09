import $ from 'jquery';
import gsap from 'gsap';

const nonce = window.nonce;
const ajax_url = window.ajax;

export function loadCartAmount() {
  $.post(
    ajax_url,
    {
      action: 'loadcartamount',
      nonce: nonce,
    },
    function (response) {
      const amount = response.msg;
      const placeholder = $('[data-cart-amount]');

      if (amount == 0) {
        placeholder.html(amount);
        placeholder.hide();
      } else {
        placeholder.html(amount);
        placeholder.show();
      }
    }
  );
}

export function setCartLoader() {
  gsap.fromTo(
    '[data-cart-loader]',
    {
      autoAlpha: 0,
    },
    {
      autoAlpha: 1,
      duration: 0.25,
    }
  );
}

export function removeCartLoader() {
  gsap.fromTo(
    '[data-cart-loader]',
    {
      autoAlpha: 1,
    },
    {
      autoAlpha: 0,
      duration: 0.25,
    }
  );
}

export function openCart(e) {
  if (e) e.preventDefault();

  setCartLoader();
  loadCart();

  gsap.fromTo(
    '[data-cart-backdrop]',
    {
      autoAlpha: 0,
    },
    {
      autoAlpha: 1,
      duration: 0.25,
    }
  );

  gsap.fromTo(
    '[data-cart-wrap]',
    {
      translateX: '100%',
    },
    {
      translateX: '0%',
      ease: 'power1.inOut',
      duration: 0.75,
    }
  );

  document.body.classList.add('cart-open');
}

export function closeCart(e) {
  if (e) e.preventDefault();

  gsap.fromTo(
    '[data-cart-backdrop]',
    {
      autoAlpha: 1,
    },
    {
      autoAlpha: 0,
      duration: 0.25,
    }
  );

  gsap.fromTo(
    '[data-cart-wrap]',
    {
      translateX: '0%',
    },
    {
      translateX: '100%',
      ease: 'power1.inOut',
      duration: 0.75,
    }
  );

  document.body.classList.remove('cart-open');
}

export function loadCart() {
  $.post(
    ajax_url,
    {
      action: 'loadcart',
      nonce: nonce,
    }
  )
    .done(function (response) {
      $('[data-cart-inner]').html(response.msg);
    })
    .fail(function () {
      $('[data-cart-inner]').html('<div class="c-alert">Er is iets misgegaan, probeer het later nog eens of neem contact met ons op.</div>');
    })
    .always(function () {
      removeCartLoader();
    });
}

export function updateQuantity() {
  const quantity = $(this).val();
  const itemKey = $(this).attr('data-item');

  setCartLoader();

  $.post(
    ajax_url,
    {
      action: 'changequantity',
      nonce: nonce,
      quantity: quantity,
      itemKey: itemKey,
    }
  )
    .done(function () {
      loadCart();
      loadCartAmount();
    })
    .fail(function () {
      removeCartLoader();
    });
}

export function removeItemFromCart() {
  const itemKey = $(this).attr('data-item');

  setCartLoader();

  $.post(
    ajax_url,
    {
      action: 'deleteitem',
      nonce: nonce,
      quantity: 0,
      itemKey: itemKey,
    }
  )
    .done(function () {
      loadCart();
      loadCartAmount();
    })
    .fail(function () {
      removeCartLoader();
    });
}