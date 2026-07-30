{{--
  Reusable EN/KM tabbed editor group with translate button.
  Props:
    $label      — section label (string, e.g. "Description")
    $icon       — FA icon class (e.g. "fa-align-left")
    $iconColor  — Tailwind text color (e.g. "text-brand-green")
    $enEditorId — id of the EN Quill div
    $enInputId  — id of the EN hidden textarea
    $enValue    — current EN value (old() or model value)
    $kmEditorId — id of the KM Quill div
    $kmInputId  — id of the KM hidden textarea
    $kmValue    — current KM value
--}}
<div x-data="{
        tab: 'en',
        translating: false,
        translateError: '',
        async translate() {
            this.translating = true;
            this.translateError = '';
            var newTab = await window.adminTranslate(this.$el, this.tab);
            if (newTab) { this.tab = newTab; }
            else { this.translateError = 'Translation failed. Please try again.'; setTimeout(() => this.translateError = '', 4000); }
            this.translating = false;
        }
     }"
     class="border border-slate-800 rounded-xl">

    {{-- Header --}}
    <div class="flex flex-wrap items-center gap-2 bg-slate-800/50 px-4 py-2.5 border-b border-slate-800">
        <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider flex items-center gap-2 flex-1">
            <i class="fa-solid {{ $icon ?? 'fa-align-left' }} {{ $iconColor ?? 'text-brand-green' }}"></i>
            {{ $label ?? 'Description' }}
        </span>

        {{-- Translate button --}}
        <button type="button" @click="translate()"
                :disabled="translating"
                class="flex items-center gap-1.5 px-3 py-1 rounded-lg text-[11px] font-semibold transition
                       bg-sky-500/10 hover:bg-sky-500/20 text-sky-400 border border-sky-500/20 disabled:opacity-50 disabled:cursor-wait">
            <span x-show="!translating">
                <i class="fa-solid fa-language text-sm"></i>
                <span x-text="tab === 'en' ? 'Translate → KM' : 'Translate → EN'"></span>
            </span>
            <span x-show="translating" class="flex items-center gap-1">
                <svg class="animate-spin w-3 h-3" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.4" stroke-linecap="round"/>
                </svg>
                Translating…
            </span>
        </button>

        {{-- EN / KM tabs --}}
        <div class="flex rounded-lg overflow-hidden border border-slate-700 text-xs">
            <button type="button" @click="tab='en'"
                    :class="tab==='en' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                    class="px-3 py-1.5 font-medium transition">EN</button>
            <button type="button" @click="tab='km'"
                    :class="tab==='km' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                    class="px-3 py-1.5 font-medium transition border-l border-slate-700">KM</button>
        </div>
    </div>

    {{-- Error toast --}}
    <div x-show="translateError" x-transition
         class="mx-4 mt-3 px-3 py-2 text-xs text-red-400 bg-red-400/10 border border-red-400/20 rounded-lg"
         x-text="translateError"></div>

    {{-- Editor panels --}}
    <div class="p-4">
        <div data-lang="en" x-show="tab==='en'">
            {{-- .quill-wrap wraps both the Quill-generated .ql-toolbar sibling and the .ql-container --}}
            <div class="quill-wrap">
                <div id="{{ $enEditorId }}" class="quill-editor" data-quill-input="{{ $enInputId }}"></div>
            </div>
            <textarea name="{{ $enInputId }}" id="{{ $enInputId }}" class="hidden">{{ $enValue ?? '' }}</textarea>
        </div>
        <div data-lang="km" x-show="tab==='km'">
            <div class="quill-wrap">
                <div id="{{ $kmEditorId }}" class="quill-editor" data-quill-input="{{ $kmInputId }}"></div>
            </div>
            <textarea name="{{ $kmInputId }}" id="{{ $kmInputId }}" class="hidden">{{ $kmValue ?? '' }}</textarea>
        </div>
    </div>
</div>
