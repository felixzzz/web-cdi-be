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

<style>
    .ref-repeater-box {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background-color: #f9fafb;
        padding: 16px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .ref-btn-add {
        background-color: #2474A5 !important;
        color: #ffffff !important;
        padding: 7px 16px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        border-radius: 6px !important;
        border: none !important;
        cursor: pointer !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
        transition: background-color 0.2s ease-in-out !important;
    }
    .ref-btn-add:hover {
        background-color: #1b5b82 !important;
    }
    .ref-btn-delete {
        background-color: #fef2f2 !important;
        color: #dc2626 !important;
        border: 1px solid #fca5a5 !important;
        padding: 6px 14px !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        border-radius: 6px !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
        white-space: nowrap !important;
    }
    .ref-btn-delete:hover {
        background-color: #fee2e2 !important;
        color: #991b1b !important;
        border-color: #f87171 !important;
    }
    .ref-row-item {
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 14px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: flex-end;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .ref-input-group {
        flex: 1 1 200px;
        min-width: 200px;
    }
    .ref-input-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 4px;
    }
    .ref-input-field {
        width: 100%;
        font-size: 13px;
        color: #1f2937;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        padding: 7px 10px;
        outline: none;
        transition: border-color 0.15s ease-in-out;
    }
    .ref-input-field:focus {
        border-color: #2474A5;
        box-shadow: 0 0 0 2px rgba(36, 116, 165, 0.15);
    }
</style>

<div class="ref-repeater-box">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
        <div>
            <label style="font-size: 14px; font-weight: 700; color: #1f2937; margin: 0;">
                {{ $label }}
            </label>
            <p style="font-size: 12px; color: #6b7280; margin: 2px 0 0 0;">
                Tambahkan referensi / sumber data rujukan untuk artikel ini.
            </p>
        </div>
        <button
            type="button"
            onclick="addReferenceRow()"
            class="ref-btn-add"
        >
            <span style="font-size: 15px; font-weight: 700;">+</span> Tambah Referensi
        </button>
    </div>

    <div id="references-container" style="display: flex; flex-direction: column; gap: 12px;">
        @if(count($references) > 0)
            @foreach($references as $index => $ref)
                <div class="ref-row-item">
                    <div class="ref-input-group">
                        <label class="ref-input-label">Penerbit / Instansi</label>
                        <input
                            type="text"
                            name="references[{{ $index }}][publisherName]"
                            value="{{ $ref['publisherName'] ?? $ref['publisher_name'] ?? '' }}"
                            placeholder="Contoh: Kementerian Perindustrian RI"
                            class="ref-input-field"
                        />
                    </div>
                    <div class="ref-input-group">
                        <label class="ref-input-label">Judul Artikel / Laporan *</label>
                        <input
                            type="text"
                            name="references[{{ $index }}][title]"
                            value="{{ $ref['title'] ?? '' }}"
                            placeholder="Contoh: Laporan Kinerja Logistik 2025"
                            class="ref-input-field"
                        />
                    </div>
                    <div class="ref-input-group">
                        <label class="ref-input-label">URL Link *</label>
                        <input
                            type="url"
                            name="references[{{ $index }}][url]"
                            value="{{ $ref['url'] ?? '' }}"
                            placeholder="https://..."
                            class="ref-input-field"
                        />
                    </div>
                    <div>
                        <button
                            type="button"
                            onclick="removeReferenceRow(this)"
                            class="ref-btn-delete"
                        >
                            Hapus
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    function addReferenceRow() {
        const container = document.getElementById('references-container');
        const index = container.querySelectorAll('.ref-row-item').length;
        
        const row = document.createElement('div');
        row.className = 'ref-row-item';
        row.innerHTML = `
            <div class="ref-input-group">
                <label class="ref-input-label">Penerbit / Instansi</label>
                <input
                    type="text"
                    name="references[${index}][publisherName]"
                    placeholder="Contoh: Kementerian Perindustrian RI"
                    class="ref-input-field"
                />
            </div>
            <div class="ref-input-group">
                <label class="ref-input-label">Judul Artikel / Laporan *</label>
                <input
                    type="text"
                    name="references[${index}][title]"
                    placeholder="Contoh: Laporan Kinerja Logistik 2025"
                    class="ref-input-field"
                />
            </div>
            <div class="ref-input-group">
                <label class="ref-input-label">URL Link *</label>
                <input
                    type="url"
                    name="references[${index}][url]"
                    placeholder="https://..."
                    class="ref-input-field"
                />
            </div>
            <div>
                <button
                    type="button"
                    onclick="removeReferenceRow(this)"
                    class="ref-btn-delete"
                >
                    Hapus
                </button>
            </div>
        `;
        container.appendChild(row);
    }

    function removeReferenceRow(btn) {
        const row = btn.closest('.ref-row-item');
        if (row) {
            row.remove();
        }
    }
</script>
