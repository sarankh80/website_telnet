import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Quill from 'quill';

Alpine.plugin(focus);
window.Alpine = Alpine;
window.Quill = Quill;

(function initQuillEditors() {
    try {
        var editorEls = document.querySelectorAll('.quill-editor[data-quill-input]');
        if (!editorEls.length) return;

        var toolbarOptions = [
            [{ header: [2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link'],
            ['clean'],
        ];

        window._quillMap = window._quillMap || {};

        editorEls.forEach(function (editorEl) {
            var inputId = editorEl.getAttribute('data-quill-input');
            var inputEl = document.getElementById(inputId);
            if (!inputEl) return;

            var q = new Quill(editorEl, {
                theme: 'snow',
                modules: { toolbar: toolbarOptions },
                placeholder: 'Enter content…',
            });

            var existing = inputEl.value.trim();
            if (existing) {
                try { q.root.innerHTML = existing; } catch (e) { /* ignore */ }
            }

            window._quillMap[editorEl.id] = q;

            var form = editorEl.closest('form');
            if (form && !form._quillHandlerAttached) {
                form._quillHandlerAttached = true;
                form.addEventListener('submit', function () {
                    form.querySelectorAll('.ql-container[data-quill-input]').forEach(function (el) {
                        var inp = document.getElementById(el.getAttribute('data-quill-input'));
                        if (!inp) return;
                        var q2 = window._quillMap[el.id];
                        if (!q2) return;
                        var html = q2.root.innerHTML;
                        inp.value = (html === '<p><br></p>' || html === '<p></p>') ? '' : html;
                    });
                });
            }
        });
    } catch (e) {
        console.error('[Quill] init failed:', e);
    }
})();

Alpine.start();

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

function initApp() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }

    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(modal.id); });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp);
} else {
    initApp();
}

import $ from 'jquery';
import DataTable from 'datatables.net';
window.$ = $;
window.jQuery = $;
window.DataTable = DataTable;
