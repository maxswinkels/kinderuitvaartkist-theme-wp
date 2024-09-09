import Filters from './Filters';

export function init() {
  const filters = document.querySelector('[data-filters]');

  if (!filters) return;

  // filters
  new Filters(filters);
}
