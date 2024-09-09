import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default class Navbar {
  constructor(node) {

    this.node = node;
    this.collapse = node.querySelector('[data-navbar-collapse]');
    this.toggle = node.querySelector('[data-navbar-toggle]');

    this.menu = this.collapse.querySelector('[data-navbar-menu]');

    this.submenuCollapse = node.querySelector('[data-navbar-submenu-collapse]');
    this.submenuToggles = this.collapse.querySelectorAll('[data-navbar-submenu-toggle]');
    this.submenuBack = this.collapse.querySelector('[data-navbar-submenu-back]');
    this.submenuCollapseWrapper = this.collapse.querySelector('[data-navbar-submenu-collapse-wrapper]');

    this.backdrop = document.querySelector('[data-navbar-backdrop]');

    //Initial state
    this.active = false;
    this.activeSubmenu = false;

    this.buildTimelines();

    // Initial bind for performance
    this.handleClick = this.handleClick.bind(this);
    this.handleSubmenu = this.handleSubmenu.bind(this);

    // Set trigger click event
    this.toggle.addEventListener('click', this.handleClick);
    this.submenuToggles.forEach(toggle => {
      toggle.addEventListener('click', this.handleSubmenu);
    });
    if (this.submenuBack) {
      this.submenuBack.addEventListener('click', this.handleSubmenu)
    }
    if (this.backdrop) {
      this.backdrop.addEventListener('click', this.handleClick);
    }

    this.handleScroll();
  }

  handleScroll() {
    ScrollTrigger.create({
      start: 'top -80',
      end: 99999,
      toggleClass: {
        className: 'has-scrolled',
        targets: this.node,
      },
    });
  }

  buildTimelines() {
    this.mainTimeline = gsap.timeline({
      paused: true,
      onStart: () => {
        document.body.classList.add('navbar-open');
        document.body.classList.add('navbar-opening');
        this.node.classList.add('is-open');
        this.node.classList.add('is-transforming');
      },
      onComplete: () => {
        document.body.classList.remove('navbar-opening');
        this.node.classList.remove('is-transforming');
      },
      onReverseComplete: () => {
        document.body.classList.remove('navbar-open');
        document.body.classList.remove('navbar-opening');
        this.node.classList.remove('is-transforming');

        if (this.activeSubmenu) {
          this.playSubmenu();
        }
      },
    });

    // menu collapse
    this.mainTimeline.fromTo(
      this.collapse,
      {
        translateX: '100%',
      },
      {
        translateX: '0',
        duration: 0.4,
        ease: 'Power4.easeOut',
      }
    );

    this.submenuTimeline = gsap.timeline({
      paused: true,
      onStart: () => {
        this.node.classList.add('is-transforming');
      },
      onComplete: () => {
        this.node.classList.remove('is-transforming');
      },
      onReverseComplete: () => {
        this.node.classList.remove('is-transforming');
      },
    });

    // submenu collapse
    this.submenuTimeline.fromTo(
      this.menu,
      {
        translateX: '0',
      },
      {
        translateX: '-100%',
        duration: 0.4,
        ease: 'Power4.easeOut',
      },
      'step 1'
    );

    this.submenuTimeline.fromTo(
      this.submenuCollapse,
      {
        translateX: '100%',
      },
      {
        translateX: '0',
        duration: 0.4,
        ease: 'Power4.easeOut',
      },
      'step 1'
    );

    this.submenuTimeline.fromTo(
      this.submenuBack,
      {
        opacity: 0,
        translateX: '-100%',
      },
      {
        opacity: 1,
        translateX: 0,
        duration: 0.2,
      },
      '-=0.18'
    );
  }

  handleSubmenu(e) {
    if (e) {
      e.preventDefault();
    }

    const isScreenMdDown = window.matchMedia('(max-width: 992px)');
    if (!isScreenMdDown.matches) return;

    const target = e.currentTarget;
    const sibling = target.nextElementSibling;

    if (!sibling) return;

    const cloneSibling = sibling.cloneNode(true);

    // Update target ARIA expanded label
    target.setAttribute('aria-expanded', !this.activeSubmenu);

    // replace wrapper content
    if (!this.activeSubmenu) {
      this.submenuCollapseWrapper.innerHTML = '';
      this.submenuCollapseWrapper.append(cloneSibling);
    }

    // play timeline
    this.playSubmenu();
  }

  handleClick(e) {
    if (e) {
      e.preventDefault();
    }

    // Update trigger ARIA expanded label
    this.toggle.setAttribute('aria-expanded', !this.active);

    // Play timeline
    this.playMain();
  }

  playMain() {
    if (this.active) {
      this.mainTimeline.reverse();
      this.node.classList.remove('is-open');
      this.node.classList.add('is-transforming');
      document.body.classList.add('navbar-opening');
    } else {
      this.mainTimeline.play();
    }
    this.active = !this.active;
  }

  playSubmenu() {
    if (this.activeSubmenu) {
      this.submenuTimeline.reverse();
      this.node.classList.add('is-transforming');
    } else {
      this.submenuTimeline.play();
    }
    this.activeSubmenu = !this.activeSubmenu;
  }
}
