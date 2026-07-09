@props(['name', 'label', 'value' => '', 'id' => ''])

@php
    $editorId = 'json_editor_' . ($id ?: $name) . '_' . Str::random(8);
@endphp

<x-portal::form.group :label="$label" :name="$name">
    <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden flex flex-col bg-white dark:bg-gray-900 mt-1">
        <!-- Editor Toolbar -->
        <div class="bg-gray-50 dark:bg-gray-800 px-4 py-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center text-xs">
            <span id="{{ $editorId }}_status" class="text-green-600 dark:text-green-400 font-medium">Ready</span>
            <button
                type="button"
                onclick="formatJsonLd('{{ $editorId }}')"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:bg-opacity-90 transition-all font-medium"
            >
                Format JSON
            </button>
        </div>

        <!-- Editor Container -->
        <div id="{{ $editorId }}" class="h-64 w-full text-sm"></div>

        <!-- Hidden textarea — actual form value -->
        <textarea name="{{ $name }}" id="{{ $editorId }}_value" class="hidden">{!! old($name, $value) !!}</textarea>
    </div>
</x-portal::form.group>

@once
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7/ace.min.js"></script>
<script>
    // Registry of all JSON editors on the page: editorId -> ace instance
    window.__jsonEditors = window.__jsonEditors || {};

    // Global format/prettify helper
    window.formatJsonLd = function (editorId) {
        const editor = window.__jsonEditors[editorId];
        const status = document.getElementById(editorId + '_status');
        if (!editor) return;
        try {
            const raw = editor.getValue();
            if (raw.trim()) {
                editor.setValue(JSON.stringify(JSON.parse(raw), null, 2), -1);
                status.innerText = 'Valid JSON';
                status.className = 'text-green-600 dark:text-green-400 font-medium';
            }
        } catch (e) {
            status.innerText = 'Error: ' + e.message;
            status.className = 'text-red-500 dark:text-red-400 font-medium';
        }
    };

    // Called whenever a hidden tab becomes visible — resizes all editors inside it
    window.__resizeVisibleJsonEditors = function () {
        Object.keys(window.__jsonEditors).forEach(function (editorId) {
            const el = document.getElementById(editorId);
            // offsetParent is null when display:none
            if (el && el.offsetParent !== null) {
                window.__jsonEditors[editorId].resize();
            }
        });
    };
</script>
@endpush
@endonce

@push('js')
<script>
    (function () {
        const editorId    = '{{ $editorId }}';
        const container   = document.getElementById(editorId);
        const hiddenInput = document.getElementById(editorId + '_value');
        const status      = document.getElementById(editorId + '_status');

        if (!container || !hiddenInput) return;

        function initAce() {
            if (window.__jsonEditors[editorId]) return; // already initialised

            const editor = ace.edit(editorId);
            window.__jsonEditors[editorId] = editor;

            editor.setTheme(
                document.documentElement.classList.contains('dark')
                    ? 'ace/theme/tomorrow_night'
                    : 'ace/theme/chrome'
            );
            editor.session.setMode('ace/mode/json');
            editor.session.setTabSize(2);
            editor.setShowPrintMargin(false);
            editor.setOptions({ fontSize: '13px' });

            // Populate from hidden textarea, prettify if valid JSON
            let initialVal = hiddenInput.value.trim();
            try {
                if (initialVal) {
                    initialVal = JSON.stringify(JSON.parse(initialVal), null, 2);
                }
            } catch (e) {}

            editor.setValue(initialVal || '', -1);
            hiddenInput.value = initialVal || '';

            if (!initialVal) {
                status.innerText = 'Valid JSON (Empty)';
            } else {
                try {
                    JSON.parse(initialVal);
                    status.innerText = 'Valid JSON';
                    status.className = 'text-green-600 dark:text-green-400 font-medium';
                } catch (e) {
                    status.innerText = 'Invalid JSON format';
                    status.className = 'text-red-500 dark:text-red-400 font-medium';
                }
            }

            // Keep hidden textarea in sync and validate on each change
            editor.session.on('change', function () {
                const val = editor.getValue();
                hiddenInput.value = val;

                if (!val.trim()) {
                    status.innerText = 'Valid JSON (Empty)';
                    status.className = 'text-green-600 dark:text-green-400 font-medium';
                    return;
                }
                try {
                    JSON.parse(val);
                    status.innerText = 'Valid JSON';
                    status.className = 'text-green-600 dark:text-green-400 font-medium';
                } catch (e) {
                    status.innerText = 'Invalid JSON format';
                    status.className = 'text-red-500 dark:text-red-400 font-medium';
                }
            });

            editor.resize();
        }

        // ---------------------------------------------------------------
        // Strategy: init immediately if visible, otherwise watch for when
        // Alpine removes the display:none (MutationObserver on style attr).
        // ---------------------------------------------------------------
        function tryInit() {
            // container is visible (not hidden by x-show / display:none)
            if (container.offsetParent !== null) {
                initAce();
                return;
            }

            // Walk up the DOM to find the closest ancestor that has
            // display:none applied by Alpine (x-show adds it on style attr)
            let hiddenAncestor = container.parentElement;
            while (hiddenAncestor && hiddenAncestor !== document.body) {
                if (hiddenAncestor.style.display === 'none') break;
                hiddenAncestor = hiddenAncestor.parentElement;
            }

            if (!hiddenAncestor || hiddenAncestor === document.body) {
                // Nothing hidden in the ancestor chain — just init
                initAce();
                return;
            }

            // Watch the hidden ancestor's style attribute. Alpine toggles
            // display:none / '' when tabs switch.
            const observer = new MutationObserver(function () {
                if (hiddenAncestor.style.display !== 'none') {
                    // Tab is now visible
                    observer.disconnect();
                    requestAnimationFrame(function () {
                        initAce();
                        if (window.__jsonEditors[editorId]) {
                            window.__jsonEditors[editorId].resize();
                        }
                    });
                }
            });

            observer.observe(hiddenAncestor, { attributes: true, attributeFilter: ['style'] });
        }

        // Run after the page fully loads so Alpine has set up x-show
        if (document.readyState === 'complete') {
            tryInit();
        } else {
            window.addEventListener('load', tryInit);
        }
    })();
</script>
@endpush
