import Navbar from './Navbar';

export function init() {
  const navbar = document.querySelector('[data-navbar]');

  if (!navbar) return;

  // navbar
  new Navbar(navbar);
}
