/* eslint-disable no-unused-vars */
import tippy from 'tippy.js';

export function init() {
  const tippyMenuInstances = tippy('[data-tooltip="menu"]', {
    content(reference) {
      const id = reference.getAttribute('data-tooltip-target');
      const template = document.getElementById(id);
      return template.innerHTML;
    },
    placement: 'bottom',
    allowHTML: true,
    interactive: true,
    theme: 'menu',
    animation: 'shift-toward-extreme',
    trigger: 'mouseenter',
    hideOnClick: false,
    maxWidth: 'none',
    arrow: false,
  });

  const tippyStatus = (x) => {
    tippyMenuInstances.forEach(instance => {
      x.matches ? instance.disable() : instance.enable();
    });
  }

  const isScreenMdDown = window.matchMedia('(max-width: 992px)')
  tippyStatus(isScreenMdDown);
  isScreenMdDown.addEventListener('change', tippyStatus);
}
