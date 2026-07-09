@props(['name', 'label', 'value' => '', 'id' => ''])

@php
    $editorId = 'json_editor_' . ($id ?: $name) . '_' . Str::random(8);
@endphp

<x-portal::form.group :label="$label" :name="$name">
    <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden flex flex-col bg-white dark:bg-gray-900 mt-1">
        <!-- Editor Toolbar -->
        <div class="bg-gray-50 dark:bg-gray-800 px-4 py-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center text-xs">
            <span id="{{ $editorId }}_status" class="text-green-600 dark:text-green-400 font-medium">Valid JSON</span>
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

        <!-- Hidden input to hold the actual value sent to the form -->
        <textarea name="{{ $name }}" id="{{ $editorId }}_value" class="hidden">{!! old($name, $value) !!}</textarea>
    </div>
</x-portal::form.group>

@once
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7/ace.min.js"></script>
<script>
    // Global format helper
    window.formatJsonLd = function (editorId) {
        const editorInstance = window[editorId];
        const statusElement = document.getElementById(editorId + '_status');
        if (editorInstance) {
            try {
                const raw = editorInstance.getValue();
                if (raw.trim()) {
                    const parsed = JSON.parse(raw);
                    editorInstance.setValue(JSON.stringify(parsed, null, 2), -1);
                    statusElement.innerText = 'Valid JSON';
                    statusElement.className = 'text-green-600 dark:text-green-400 font-medium';
                }
            } catch (e) {
                statusElement.innerText = 'Error: ' + e.message;
                statusElement.className = 'text-red-500 dark:text-red-400 font-medium';
            }
        }
    };
</script>
@endpush
@endonce

@push('js')
<script>
    window.addEventListener("load", function () {
        const editorId = '{{ $editorId }}';
        const container = document.getElementById(editorId);
        const hiddenInput = document.getElementById(editorId + '_value');
        const statusElement = document.getElementById(editorId + '_status');

        if (!container || !hiddenInput) return;

        // Initialize Ace Editor
        const editor = ace.edit(editorId);
        window[editorId] = editor; // store reference
        
        editor.setTheme("ace/theme/chrome");
        editor.session.setMode("ace/mode/json");
        editor.session.setTabSize(2);
        
        // Auto-detect theme based on document class
        if (document.documentElement.classList.contains('dark')) {
            editor.setTheme("ace/theme/tomorrow_night");
        }

        // Set value from hidden textarea
        let initialVal = hiddenInput.value;
        try {
            if (initialVal.trim()) {
                // Prettify on initial load
                initialVal = JSON.stringify(JSON.parse(initialVal), null, 2);
            }
        } catch (e) {}
        
        editor.setValue(initialVal, -1);
        hiddenInput.value = initialVal;

        // On change, update hidden textarea and validate
        editor.session.on('change', function () {
            const currentVal = editor.getValue();
            hiddenInput.value = currentVal;
            
            if (!currentVal.trim()) {
                statusElement.innerText = 'Valid JSON (Empty)';
                statusElement.className = 'text-green-600 dark:text-green-400 font-medium';
                return;
            }

            try {
                JSON.parse(currentVal);
                statusElement.innerText = 'Valid JSON';
                statusElement.className = 'text-green-600 dark:text-green-400 font-medium';
            } catch (e) {
                statusElement.innerText = 'Invalid JSON format';
                statusElement.className = 'text-red-500 dark:text-red-400 font-medium';
            }
        });
    });
</script>
@endpush
