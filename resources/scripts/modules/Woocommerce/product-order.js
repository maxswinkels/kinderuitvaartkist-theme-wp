import $ from 'jquery';
import { loadCartAmount, openCart } from './functions';

export function init() {

  const form = document.querySelector('[data-product-order]');

  if (!form) return;

  const options = form.querySelectorAll('[data-product-order-option]');
  const submit = form.querySelector('[data-product-order-submit]');

  options.forEach(option => {
    option.addEventListener('change', handleChange.bind(true));
  });

  form.addEventListener('submit', handleSubmit.bind(true));

  function handleChange() {
    const selected = [...options].filter(option => option.checked);
    submit.disabled = selected.length === 0;
  }

  function handleSubmit(event) {
    event.preventDefault();
    submit.blur();
    setLoader();

    const data = Object.fromEntries(new FormData(form));
    let pid = data.product;

    // if a option is checked, replace pid with option value
    const selected = [...options].filter(option => option.checked);
    if (selected.length > 0) pid = selected[0].value;

    $.ajax({
      type: 'POST',
      url: '/wp-json/wc/store/cart/add-item',
      dataType: 'json',
      headers: {
        'X-WC-Store-API-Nonce': window.nonce,
      },
      data: {
        id: pid,
        quantity: 1,
      },
      success: function () {
        openCart();
        loadCartAmount();
        resetLoader();
      },
    });
  }

  function setLoader() {
    submit.classList.add('is-loading');
    submit.disabled = true;
  }

  function resetLoader() {
    submit.classList.remove('is-loading');
    submit.disabled = false;
  }
}
