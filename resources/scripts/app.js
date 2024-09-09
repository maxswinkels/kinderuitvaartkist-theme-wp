import { domReady } from '@roots/sage/client';

import './vendor/bootstrap';
import * as Navbar from './modules/Navbar';
import * as Filters from './modules/Filters';
import * as Tooltips from './modules/tooltips';
import * as Sliders from './modules/sliders';
import * as Woocommerce from './modules/Woocommerce';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  const modules = [Navbar, Filters, Sliders, Tooltips, Woocommerce];

  for (const module of modules) {
    if (!module.init) return;

    await module.init();
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
