import * as Cart from './cart';
import * as ProductOrder from './product-order';

export function init() {
  const modules = [Cart, ProductOrder];

  for (const module of modules) {
    if (!module.init) return;
    module.init();
  }
}