@props([
    'label' => 'Article References / Sources',
    'name' => 'references',
    'value' => []
])

@php
    $references = [];
    if (is_string($value) && !empty($value)) {
        $references = json_decode($value, true) ?? [];
    } elseif (is_array($value)) {
        $references = $value;
    }
@endphp

<div class="space-y-3 p-4 border border-gray-200 rounded-lg bg-gray-50/50">
    <div class="flex items-center justify-between">
        <div>
            <label class="block text-sm font-semibold text-gray-700">
                {{ $label }}
            </label>
            <p class="text-xs text-gray-500 mt-0.5">
                Tambahkan referensi / sumber data rujukan untuk artikel ini.
            </p>
        </div>
        <button
            type="button"
            onclick="addReferenceRow()"
            class="px-3 py-1.5 text-xs font-semibold text-white bg-[#2474A5] rounded-md hover:bg-blue-700 transition flex items-center gap-1 shadow-sm"
        >
            + Tambah Referensi
        </button>
    </div>

    <div id="references-container" class="space-y-3 mt-3">
        @if(count($references) > 0)
            @foreach($references as $index => $ref)
                <div class="reference-row p-3.5 bg-white border border-gray-200 rounded-md flex flex-col md:flex-row gap-3 items-start md:items-center relative shadow-sm">
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Penerbit / Instansi</label>
                        <input
                            type="text"
                            name="references[{{ $index }}][publisherName]"
                            value="{{ $ref['publisherName'] ?? $ref['publisher_name'] ?? '' }}"
                            placeholder="Contoh: Kementerian Perindustrian RI"
                            class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                        />
                    </div>
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Judul Artikel / Laporan *</label>
                        <input
                            type="text"
                            name="references[{{ $index }}][title]"
                            value="{{ $ref['title'] ?? '' }}"
                            placeholder="Contoh: Laporan Kinerja Logistik 2025"
                            class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                        />
                    </div>
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">URL Link *</label>
                        <input
                            type="url"
                            name="references[{{ $index }}][url]"
                            value="{{ $ref['url'] ?? '' }}"
                            placeholder="https://..."
                            class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                        />
                    </div>
                    <button
                        type="button"
                        onclick="removeReferenceRow(this)"
                        class="mt-4 md:mt-5 text-red-600 hover:text-red-800 text-xs font-medium px-2.5 py-2 rounded hover:bg-red-50 border border-red-200 self-end md:self-auto shrink-0 transition"
                    >
                        Hapus
                    </button>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    function addReferenceRow() {
        const container = document.getElementById('references-container');
        const index = container.querySelectorAll('.reference-row').length;
        
        const row = document.createElement('div');
        row.className = 'reference-row p-3.5 bg-white border border-gray-200 rounded-md flex flex-col md:flex-row gap-3 items-start md:items-center relative shadow-sm';
        row.innerHTML = `
            <div class="flex-1 w-full">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Penerbit / Instansi</label>
                <input
                    type="text"
                    name="references[${index}][publisherName]"
                    placeholder="Contoh: Kementerian Perindustrian RI"
                    class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                />
            </div>
            <div class="flex-1 w-full">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Judul Artikel / Laporan *</label>
                <input
                    type="text"
                    name="references[${index}][title]"
                    placeholder="Contoh: Laporan Kinerja Logistik 2025"
                    class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                />
            </div>
            <div class="flex-1 w-full">
                <label class="block text-xs font-semibold text-gray-600 mb-1">URL Link *</label>
                <input
                    type="url"
                    name="references[${index}][url]"
                    placeholder="https://..."
                    class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 px-3 py-2 border text-gray-800"
                />
            </div>
            <button
                type="button"
                onclick="removeReferenceRow(this)"
                class="mt-4 md:mt-5 text-red-600 hover:text-red-800 text-xs font-medium px-2.5 py-2 rounded hover:bg-red-50 border border-red-200 self-end md:self-auto shrink-0 transition"
            >
                Hapus
            </button>
        `;
        container.appendChild(row);
    }

    function removeReferenceRow(btn) {
        const row = btn.closest('.reference-row');
        if (row) {
            row.remove();
        }
    }
</script>
