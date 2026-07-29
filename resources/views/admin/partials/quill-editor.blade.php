{{-- Quill rich-text editor partial
     Props:
       $formId  — id of the <form> element
       $editors — array of ['editorId' => '...', 'inputId' => '...', 'placeholder' => '...'] (placeholder optional)
--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css">
<style>
    /* ── Wrapper ── */
    .quill-editor {
        background: #0f172a;
        border: 1px solid #334155;
        border-radius: 0.625rem;
        color: #e2e8f0;
        overflow: hidden;          /* clips toolbar top-corners */
        display: flex;
        flex-direction: column;
        min-height: 180px;
        transition: border-color 0.15s;
    }
    .quill-editor:focus-within {
        border-color: #8dc63f;
        box-shadow: 0 0 0 1px #8dc63f;
    }

    /* ── Toolbar ── */
    .quill-editor .ql-toolbar {
        background: #1e293b;
        border: none !important;
        border-bottom: 1px solid #334155 !important;
        padding: 6px 10px;
        flex-shrink: 0;
    }
    .quill-editor .ql-toolbar .ql-formats { margin-right: 8px; }

    /* ── Container / Editor area ── */
    .quill-editor .ql-container {
        background: transparent;
        border: none !important;
        font-size: 0.875rem;
        line-height: 1.6;
        color: #e2e8f0;
        flex: 1;
        min-height: 130px;
    }
    .quill-editor .ql-editor {
        min-height: 130px;
        padding: 10px 14px;
        color: #e2e8f0;
    }
    .quill-editor .ql-editor.ql-blank::before {
        color: #475569;
        font-style: normal;
    }

    /* ── Content styling inside editor ── */
    .quill-editor .ql-editor p { margin-bottom: 0.4em; }
    .quill-editor .ql-editor ul,
    .quill-editor .ql-editor ol { padding-left: 1.25rem; margin-bottom: 0.4em; }
    .quill-editor .ql-editor li { margin-bottom: 0.2em; }
    .quill-editor .ql-editor h2 { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.4em; color: #f1f5f9; }
    .quill-editor .ql-editor h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.3em; color: #f1f5f9; }
    .quill-editor .ql-editor a { color: #8dc63f; text-decoration: underline; }

    /* ── Toolbar icon colors ── */
    .quill-editor .ql-stroke         { stroke: #94a3b8 !important; }
    .quill-editor .ql-fill            { fill:   #94a3b8 !important; }
    .quill-editor .ql-picker-label    { color:  #94a3b8 !important; border-color: #334155 !important; }
    .quill-editor .ql-picker-options  { background: #1e293b !important; border-color: #334155 !important; border-radius: 0.5rem; box-shadow: 0 8px 24px rgba(0,0,0,0.4); }
    .quill-editor .ql-picker-item     { color: #cbd5e1 !important; }
    .quill-editor .ql-picker-item:hover,
    .quill-editor .ql-picker-item.ql-selected { color: #8dc63f !important; }

    /* Active / hover states */
    .quill-editor .ql-active .ql-stroke         { stroke: #8dc63f !important; }
    .quill-editor .ql-active .ql-fill            { fill:   #8dc63f !important; }
    .quill-editor .ql-active .ql-picker-label    { color:  #8dc63f !important; }
    .quill-editor .ql-toolbar button:hover .ql-stroke { stroke: #8dc63f !important; }
    .quill-editor .ql-toolbar button:hover .ql-fill   { fill:   #8dc63f !important; }

    /* ── Light theme overrides (html.admin-light) ── */
    html.admin-light .quill-editor { background: #f8fafc !important; border-color: #cbd5e1 !important; }
    html.admin-light .quill-editor:focus-within { border-color: #8dc63f !important; }
    html.admin-light .quill-editor .ql-toolbar { background: #f1f5f9 !important; border-bottom-color: #cbd5e1 !important; }
    html.admin-light .quill-editor .ql-editor  { color: #0f172a !important; }
    html.admin-light .quill-editor .ql-editor.ql-blank::before { color: #94a3b8; }
    html.admin-light .quill-editor .ql-stroke  { stroke: #475569 !important; }
    html.admin-light .quill-editor .ql-fill    { fill:   #475569 !important; }
    html.admin-light .quill-editor .ql-picker-label   { color: #475569 !important; border-color: #cbd5e1 !important; }
    html.admin-light .quill-editor .ql-picker-options { background: #ffffff !important; border-color: #e2e8f0 !important; }
    html.admin-light .quill-editor .ql-picker-item    { color: #334155 !important; }
    html.admin-light .quill-editor .ql-editor h2,
    html.admin-light .quill-editor .ql-editor h3 { color: #0f172a !important; }
    html.admin-light .quill-editor .ql-editor a { color: #618d24; }
</style>

<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script>
(function () {
    var toolbarOptions = [
        [{ 'header': [2, 3, false] }],
        ['bold', 'italic', 'underline'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        ['link'],
        ['clean']
    ];

    var editors = @json($editors);
    var quillInstances = [];

    editors.forEach(function (cfg) {
        var editorEl = document.getElementById(cfg.editorId);
        var inputEl  = document.getElementById(cfg.inputId);
        if (!editorEl || !inputEl) return;

        var q = new Quill(editorEl, {
            theme: 'snow',
            modules: { toolbar: toolbarOptions },
            placeholder: cfg.placeholder || 'Enter content…'
        });

        var existing = inputEl.value.trim();
        if (existing) {
            q.clipboard.dangerouslyPasteHTML(existing);
        }

        quillInstances.push({ quill: q, input: inputEl });
    });

    var form = document.getElementById('{{ $formId }}');
    if (form) {
        form.addEventListener('submit', function () {
            quillInstances.forEach(function (item) {
                var html = item.quill.getSemanticHTML();
                item.input.value = (html === '<p><br></p>' || html === '<p></p>') ? '' : html;
            });
        });
    }
})();
</script>
