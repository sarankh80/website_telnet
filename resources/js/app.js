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

// Language Management
let currentLang = localStorage.getItem('lang') || 'km';

function applyLanguage(lang) {
    currentLang = lang;
    document.querySelectorAll('[data-km]').forEach(el => {
        const text = el.getAttribute('data-' + lang);
        if (text) el.textContent = text;
    });
    document.querySelectorAll('[data-km-ph]').forEach(el => {
        const ph = el.getAttribute('data-' + lang + '-ph');
        if (ph) el.placeholder = ph;
    });

    const langFlag = document.getElementById('lang-flag');
    const kmBadge = document.getElementById('lang-km-badge');
    const enBadge = document.getElementById('lang-en-badge');
    const mobileLangFlag = document.getElementById('mobile-lang-flag');
    const mobileLangLabel = document.getElementById('mobile-lang-label');

    if (langFlag) langFlag.textContent = lang === 'km' ? '🇰🇭' : '🇺🇸';
    if (kmBadge && enBadge) {
        if (lang === 'km') {
            kmBadge.className = "px-1.5 py-0.5 rounded text-[10px] bg-brand-green text-white font-extrabold shadow-sm transition";
            enBadge.className = "px-1.5 py-0.5 rounded text-[10px] text-adaptive-muted font-bold transition";
        } else {
            kmBadge.className = "px-1.5 py-0.5 rounded text-[10px] text-adaptive-muted font-bold transition";
            enBadge.className = "px-1.5 py-0.5 rounded text-[10px] bg-brand-orange text-white font-extrabold shadow-sm transition";
        }
    }
    if (mobileLangFlag) mobileLangFlag.textContent = lang === 'km' ? '🇰🇭' : '🇺🇸';
    if (mobileLangLabel) {
        mobileLangLabel.textContent = lang === 'km' ? 'KM' : 'EN';
        mobileLangLabel.className = lang === 'km'
            ? 'text-[11px] font-extrabold text-brand-green'
            : 'text-[11px] font-extrabold text-brand-orange';
    }
    document.documentElement.lang = lang;
    localStorage.setItem('lang', lang);
}

window.toggleLanguage = function () {
    applyLanguage(currentLang === 'km' ? 'en' : 'km');
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

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    applyTheme(savedTheme !== 'light');
    applyLanguage(currentLang);

    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }

    // Close modal on backdrop click
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(modal.id); });
    });
});
