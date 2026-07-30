{{-- Quill rich-text editor partial
     Props:
       $formId  — id of the <form> element
       $editors — array of ['editorId' => '...', 'inputId' => '...', 'placeholder' => '...'] (placeholder optional)
     Quill is bundled via Vite (app.js) and initialized from window._quillConfigs.
--}}
<script>
window._quillConfigs = window._quillConfigs || [];
window._quillConfigs.push({
    formId: '{{ $formId }}',
    editors: @json($editors),
});
</script>
