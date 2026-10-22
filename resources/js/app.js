import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('siteTheme', () => ({
    dark: document.documentElement.dataset.theme === 'dark',
    menuOpen: false,
    init() {
        this.dark = document.documentElement.dataset.theme === 'dark';
    },
    toggleTheme() {
        this.dark = !this.dark;
        const theme = this.dark ? 'dark' : 'light';
        document.documentElement.dataset.theme = theme;
        document.documentElement.classList.toggle('dark', this.dark);
        localStorage.setItem('techmoon-theme', theme);
    },
}));

Alpine.start();

document.documentElement.classList.add('motion-ready');

const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -35px 0px' });

document.querySelectorAll('[data-reveal]').forEach((element, index) => {
    if (!element.style.getPropertyValue('--reveal-delay')) {
        element.style.setProperty('--reveal-delay', `${Math.min(index % 4, 3) * 90}ms`);
    }
    revealObserver.observe(element);
});

document.querySelectorAll('[data-spotlight]').forEach((element) => {
    element.addEventListener('pointermove', (event) => {
        const bounds = element.getBoundingClientRect();
        element.style.setProperty('--pointer-x', `${event.clientX - bounds.left}px`);
        element.style.setProperty('--pointer-y', `${event.clientY - bounds.top}px`);
    });
});

document.querySelectorAll('.hero-night').forEach((hero) => {
    let frame = null;

    hero.addEventListener('pointermove', (event) => {
        if (frame) cancelAnimationFrame(frame);

        frame = requestAnimationFrame(() => {
            const bounds = hero.getBoundingClientRect();
            hero.style.setProperty('--hero-pointer-x', `${event.clientX - bounds.left}px`);
            hero.style.setProperty('--hero-pointer-y', `${event.clientY - bounds.top}px`);
        });
    }, { passive: true });

    hero.addEventListener('pointerleave', () => {
        hero.style.setProperty('--hero-pointer-x', '75%');
        hero.style.setProperty('--hero-pointer-y', '30%');
    }, { passive: true });
});
