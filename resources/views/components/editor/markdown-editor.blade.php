@props(['name', 'label', 'value' => '', 'defaultValue' => '', 'height' => '420px', 'id' => ''])

@php
    $editorId = 'md_editor_' . ($id ?: $name) . '_' . Str::random(8);
    $initialValue = old($name, $value);
    if (($initialValue === null || $initialValue === '') && $defaultValue !== '') {
        $initialValue = $defaultValue;
    }
@endphp

<x-portal::form.group :label="$label" :name="$name">
    {{-- NOTE: Do NOT put overflow-hidden on this wrapper — it clips Ace's keyboard-capture textarea --}}
    <div class="border border-gray-300 dark:border-gray-700 rounded-lg flex flex-col bg-white dark:bg-gray-900 mt-1">
        <!-- Toolbar -->
        <div class="bg-gray-50 dark:bg-gray-800 px-4 py-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center text-xs rounded-t-lg gap-2">
            <span id="{{ $editorId }}_status" class="font-medium text-gray-500 dark:text-gray-400">Loading...</span>
            <div class="flex items-center gap-2">
                @if($defaultValue !== '')
                    <button
                        type="button"
                        onclick="resetMarkdownDefault('{{ $editorId }}')"
                        class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:opacity-80 transition-all font-medium"
                    >
                        Reset to Default Template
                    </button>
                @endif
            </div>
        </div>

        <!-- Ace Editor mount — must NOT have overflow:hidden applied by any ancestor -->
        <div id="{{ $editorId }}" style="height:{{ $height }}; width:100%;"></div>

        <!-- Hidden textarea — actual form value submitted to backend -->
        <textarea name="{{ $name }}" id="{{ $editorId }}_value" class="hidden">{!! $initialValue !!}</textarea>
        @if($defaultValue !== '')
            <textarea id="{{ $editorId }}_default" class="hidden">{!! $defaultValue !!}</textarea>
        @endif
    </div>
</x-portal::form.group>

@once
@push('css')
<script>
    if (typeof ace === 'undefined') {
        document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7/ace.min.js"><\/script>');
    }
    window.__markdownEditors = window.__markdownEditors || {};

    window.resetMarkdownDefault = function (editorId) {
        var editor = window.__markdownEditors[editorId];
        var defaultTextarea = document.getElementById(editorId + '_default');
        if (!editor || !defaultTextarea) return;
        editor.setValue(defaultTextarea.value, -1);
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
        if (!status) return;
        var text = val || '';
        if (!text.trim()) {
            status.innerText = 'Empty (Will use default fallback)';
            status.className = 'font-medium text-amber-600';
            return;
        }
        var lines = text.split(/\r\n|\r|\n/).length;
        var chars = text.length;
        status.innerText = 'Markdown / Plain Text • ' + lines + ' lines • ' + chars + ' chars ✓';
        status.className = 'font-medium text-green-600';
    }

    function initEditor() {
        if (window.__markdownEditors[editorId]) return;
        if (typeof ace === 'undefined') {
            if (status) { status.innerText = 'Ace not loaded'; status.className = 'font-medium text-red-400'; }
            return;
        }

        var editor = ace.edit(editorId);
        window.__markdownEditors[editorId] = editor;

        var isDark = document.documentElement.classList.contains('dark');
        editor.setTheme(isDark ? 'ace/theme/tomorrow_night' : 'ace/theme/chrome');
        editor.session.setMode('ace/mode/markdown');
        editor.session.setTabSize(2);
        editor.session.setUseWrapMode(true);
        editor.setShowPrintMargin(false);
        editor.setReadOnly(false);
        editor.setHighlightActiveLine(true);

        var initial = hiddenInput.value || '';
        editor.setValue(initial, -1);
        hiddenInput.value = initial;
        updateStatus(initial);

        editor.session.on('change', function () {
            var val = editor.getValue();
            hiddenInput.value = val;
            updateStatus(val);
        });

        editor.resize(true);
    }

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
            var obs = new MutationObserver(function () {
                if (hidden.style.display !== 'none') {
                    obs.disconnect();
                    requestAnimationFrame(function () {
                        initEditor();
                        var ed = window.__markdownEditors[editorId];
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
