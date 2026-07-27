import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.plugin(focus);
window.Alpine = Alpine;
Alpine.start();

// Theme Management
function applyTheme(isDark) {
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');
    const mobileIcon = document.getElementById('mobile-theme-icon');

    if (isDark) {
        document.documentElement.classList.add('dark');
        document.body.classList.add('dark');
        document.body.classList.remove('light');
        if (darkIcon) darkIcon.classList.add('hidden');
        if (lightIcon) lightIcon.classList.remove('hidden');
        if (mobileIcon) { mobileIcon.classList.remove('fa-moon'); mobileIcon.classList.add('fa-sun'); }
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        document.body.classList.remove('dark');
        document.body.classList.add('light');
        if (darkIcon) darkIcon.classList.remove('hidden');
        if (lightIcon) lightIcon.classList.add('hidden');
        if (mobileIcon) { mobileIcon.classList.remove('fa-sun'); mobileIcon.classList.add('fa-moon'); }
        localStorage.setItem('theme', 'light');
    }
}

window.toggleTheme = function () {
    const isDark = document.documentElement.classList.contains('dark');
    applyTheme(!isDark);
};

// Modal Management
window.openModal = function (id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
};
window.closeModal = function (id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
    const notif = document.getElementById('formNotification');
    if (notif) notif.classList.add('hidden');
};

// Mobile Menu
window.closeMobileMenu = function () {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu) mobileMenu.classList.add('hidden');
};

// Form submission
window.handleFormSubmit = function (event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const notif = document.getElementById('formNotification');

    fetch(form.action, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
        body: formData,
    })
    .then(res => res.json())
    .then(() => {
        if (notif) notif.classList.remove('hidden');
        setTimeout(() => { closeModal('serviceModal'); form.reset(); }, 2500);
    })
    .catch(() => {
        if (notif) notif.classList.remove('hidden');
        setTimeout(() => { closeModal('serviceModal'); form.reset(); }, 2500);
    });
};

// Initialize on DOM ready (guard covers both module and classic script timing)
function initApp() {
    const savedTheme = localStorage.getItem('theme');
    applyTheme(savedTheme !== 'light');

    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }

    // Close modal on backdrop click
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(modal.id); });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp);
} else {
    initApp();
}

