import gsap from 'gsap';

export default class Filters {
  constructor(node) {

    this.node = node;
    this.collapse = node.querySelector('[data-filters-collapse]');
    this.open = node.querySelector('[data-filters-open]');
    this.close = node.querySelector('[data-filters-close]');

    this.backdrop = document.querySelector('[data-filters-backdrop]');

    //Initial state
    this.active = false;
    this.activeSubmenu = false;

    this.buildTimeline();

    // Initial bind for performance
    this.handleClick = this.handleClick.bind(this);

    // Set trigger click event
    this.open.addEventListener('click', this.handleClick);
    this.close.addEventListener('click', this.handleClick);

    if (this.backdrop) {
      this.backdrop.addEventListener('click', this.handleClick);
    }
  }


  buildTimeline() {
    this.timeline = gsap.timeline({
      paused: true,
      onStart: () => {
        document.body.classList.add('filters-open');
        document.body.classList.add('filters-opening');
        this.node.classList.add('is-open');
        this.node.classList.add('is-transforming');
      },
      onComplete: () => {
        document.body.classList.remove('filters-opening');
        this.node.classList.remove('is-transforming');
      },
      onReverseComplete: () => {
        document.body.classList.remove('filters-open');
        document.body.classList.remove('filters-opening');
        this.node.classList.remove('is-transforming');
      },
    });

    // menu collapse
    this.timeline.fromTo(
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
  }

  handleClick(e) {
    if (e) {
      e.preventDefault();
    }

    // Play timeline
    this.play();
  }

  play() {
    if (this.active) {
      this.timeline.reverse();
      this.node.classList.remove('is-open');
      this.node.classList.add('is-transforming');
      document.body.classList.add('filters-opening');
    } else {
      this.timeline.play();
    }
    this.active = !this.active;
  }
}
