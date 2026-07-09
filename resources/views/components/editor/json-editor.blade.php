@props(['name', 'label', 'value' => '', 'id' => ''])

@php
    $editorId = 'json_editor_' . ($id ?: $name) . '_' . Str::random(8);
@endphp

<x-portal::form.group :label="$label" :name="$name">
    {{-- NOTE: Do NOT put overflow-hidden on this wrapper — it clips Ace's keyboard-capture textarea --}}
    <div class="border border-gray-300 dark:border-gray-700 rounded-lg flex flex-col bg-white dark:bg-gray-900 mt-1">
        <!-- Toolbar -->
        <div class="bg-gray-50 dark:bg-gray-800 px-4 py-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center text-xs rounded-t-lg">
            <span id="{{ $editorId }}_status" class="font-medium text-gray-400">Loading...</span>
            <button
                type="button"
                onclick="formatJsonLd('{{ $editorId }}')"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:opacity-80 transition-all font-medium"
            >
                Format JSON
            </button>
        </div>

        <!-- Ace Editor mount — must NOT have overflow:hidden applied by any ancestor -->
        <div id="{{ $editorId }}" style="height:256px; width:100%;"></div>

        <!-- Hidden textarea — actual form value submitted to backend -->
        <textarea name="{{ $name }}" id="{{ $editorId }}_value" class="hidden">{!! old($name, $value) !!}</textarea>
    </div>
</x-portal::form.group>

{{-- Ace CDN loaded in <head> (matching portal-ui quill/ckeditor pattern) --}}
@once
@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7/ace.min.js"></script>
<script>
    window.__jsonEditors = window.__jsonEditors || {};

    window.formatJsonLd = function (editorId) {
        var editor = window.__jsonEditors[editorId];
        var status = document.getElementById(editorId + '_status');
        if (!editor) return;
        try {
            var raw = editor.getValue();
            if (raw.trim()) {
                editor.setValue(JSON.stringify(JSON.parse(raw), null, 2), -1);
                status.innerText = 'Valid JSON';
                status.className = 'font-medium text-green-600';
            }
        } catch (e) {
            status.innerText = 'Error: ' + e.message;
            status.className = 'font-medium text-red-500';
        }
    };
</script>
@endpush
@endonce

@push('js')
<script>
(function () {
    var editorId    = '{{ $editorId }}';
    var hiddenInput = document.getElementById(editorId + '_value');
    var status      = document.getElementById(editorId + '_status');

    function updateStatus(val) {
        if (!val || !val.trim()) {
            status.innerText = 'Valid JSON (Empty)';
            status.className = 'font-medium text-green-600';
            return;
        }
        try {
            JSON.parse(val);
            status.innerText = 'Valid JSON ✓';
            status.className = 'font-medium text-green-600';
        } catch (e) {
            status.innerText = 'Invalid JSON: ' + e.message;
            status.className = 'font-medium text-red-500';
        }
    }

    function initEditor() {
        if (window.__jsonEditors[editorId]) return;
        if (typeof ace === 'undefined') {
            if (status) { status.innerText = 'Ace not loaded'; status.className = 'font-medium text-red-400'; }
            return;
        }

        // Use string ID so Ace can find and own the element cleanly
        var editor = ace.edit(editorId);
        window.__jsonEditors[editorId] = editor;

        var isDark = document.documentElement.classList.contains('dark');
        editor.setTheme(isDark ? 'ace/theme/tomorrow_night' : 'ace/theme/chrome');
        editor.session.setMode('ace/mode/json');
        editor.session.setTabSize(2);
        editor.setShowPrintMargin(false);
        editor.setReadOnly(false);           // explicit — prevents read-only lock
        editor.setHighlightActiveLine(true);

        // Populate from hidden textarea; prettify if valid JSON
        var initial = (hiddenInput.value || '').trim();
        try { if (initial) initial = JSON.stringify(JSON.parse(initial), null, 2); } catch (e) {}
        editor.setValue(initial || '', -1);
        hiddenInput.value = initial || '';
        updateStatus(initial);

        // Keep hidden textarea in sync on every keystroke
        editor.session.on('change', function () {
            var val = editor.getValue();
            hiddenInput.value = val;
            updateStatus(val);
        });

        editor.resize(true);
    }

    // Find the closest ancestor hidden by Alpine x-show (style="display:none")
    function findHiddenAncestor() {
        var el = document.getElementById(editorId);
        if (!el) return null;
        el = el.parentElement;
        while (el && el !== document.body) {
            if (el.style && el.style.display === 'none') return el;
            el = el.parentElement;
        }
        return null;
    }

    function tryInit() {
        var hidden = findHiddenAncestor();
        if (!hidden) {
            initEditor();
        } else {
            // Observe the hidden ancestor — init when Alpine unhides the tab
            var obs = new MutationObserver(function () {
                if (hidden.style.display !== 'none') {
                    obs.disconnect();
                    requestAnimationFrame(function () {
                        initEditor();
                        var ed = window.__jsonEditors[editorId];
                        if (ed) ed.resize(true);
                    });
                }
            });
            obs.observe(hidden, { attributes: true, attributeFilter: ['style'] });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', tryInit);
    } else {
        tryInit();
    }
})();
</script>
@endpush
