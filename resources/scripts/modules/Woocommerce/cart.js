import $ from 'jquery';
import { closeCart, loadCartAmount, openCart, removeItemFromCart, updateQuantity } from './functions';

export function init() {
  const cartOpen = document.querySelector('[data-cart-open]');
  const cartClose = document.querySelector('[data-cart-close]');
  const cartBackdrop = document.querySelector('[data-cart-backdrop]');

  if (cartOpen) {
    cartOpen.addEventListener('click', openCart);
  }

  if (cartClose) {
    cartClose.addEventListener('click', closeCart);
  }

  if (cartBackdrop) {
    cartBackdrop.addEventListener('click', closeCart);
  }

  $(document).on('click', '[data-remove-item]', removeItemFromCart);
  $(document).on('change', '[data-quantity-select]', updateQuantity);

  loadCartAmount();
}