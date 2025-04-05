<div id="app">
    <div x-show="tab_page === 'report-table'" class="flex gap-4">
        <div class="flex flex-col gap-4 w-full">
            @include('admin.pages.page-management.investor-content.components.report-table')
        </div>
    </div>

    <div x-show="tab_page === 'shareholders-table'" class="flex gap-4">
        <div class="flex flex-col gap-4 w-full">
            @include('admin.pages.page-management.investor-content.components.shareholders-table')
        </div>
    </div>

    <div x-show="tab_page === 'dividend-table'" class="flex gap-4">
        <div class="flex flex-col gap-4 w-full">
            @include('admin.pages.page-management.investor-content.components.dividend-table')
        </div>
    </div>

    <div x-show="tab_page === 'bonds-table'" class="flex gap-4">
        <div class="flex flex-col gap-4 w-full">
            @include('admin.pages.page-management.investor-content.components.bonds-table')
        </div>
    </div>
</div>

@push('js')
<script>
const { createApp, ref, computed, onMounted } = Vue

const app = createApp({
    setup() {
        const headersReports = ref(@json(@$data->investor_report_table->content_table['headers'] ?? []))
        const tableDataReports = ref(@json(@$data->investor_report_table->content_table['tableData'] ?? []))
        const rowsJsonReports = computed(() => {
            return JSON.stringify(tableDataReports.value, null, 2)
        })
        const headersJsonReports = computed(() => {
            return JSON.stringify(headersReports.value, null, 2)
        })

        const headersShareHolders = ref(@json(@$data->investor_share_shareholders_table->content_table['headers'] ?? []))
        const tableDataShareHolders = ref(@json(@$data->investor_share_shareholders_table->content_table['tableData'] ?? []))
        const rowsJsonShareHolders = computed(() => {
            return JSON.stringify(tableDataShareHolders.value, null, 2)
        })
        const headersJsonShareHolders = computed(() => {
            return JSON.stringify(headersShareHolders.value, null, 2)
        })

        const headersDividend = ref(@json(@$data->investor_share_dividend_table->content_table['headers'] ?? []))
        const tableDataDividend = ref(@json(@$data->investor_share_dividend_table->content_table['tableData'] ?? []))
        const rowsJsonDividend = computed(() => {
            return JSON.stringify(tableDataDividend.value, null, 2)
        })
        const headersJsonDividend = computed(() => {
            return JSON.stringify(headersDividend.value, null, 2)
        })

        const headersBonds = ref(@json(@$data->investor_share_bonds_table->content_table['headers'] ?? []))
        const tableDataBonds = ref(@json(@$data->investor_share_bonds_table->content_table['tableData'] ?? []))
        const rowsJsonBonds = computed(() => {
            return JSON.stringify(tableDataBonds.value, null, 2)
        })
        const headersJsonBonds = computed(() => {
            return JSON.stringify(headersBonds.value, null, 2)
        })

        // Tambah baris baru
        const addRow = (type) => {
            if (type == 'report') {
                const newRow = headersReports.value.map(() => ({ lang_en: '', lang_id: '', isGroup: false }))
                tableDataReports.value.push(newRow)
            }
            if (type == 'shareholders') {
                const newRow = headersShareHolders.value.map(() => ({ lang_en: '', lang_id: '', isGroup: false }))
                tableDataShareHolders.value.push(newRow)
            }
            if (type == 'dividend') {
                const newRow = headersDividend.value.map(() => ({ lang_en: '', lang_id: '', isGroup: false }))
                tableDataDividend.value.push(newRow)
            }
            if (type == 'bonds') {
                const newRow = headersBonds.value.map(() => ({ lang_en: '', lang_id: '', isGroup: false }))
                tableDataBonds.value.push(newRow)
            }
        }

        const addRowGroup = (type) => {
            const newGroupRow = {
                isGroup: true,
                label: { lang_en: 'New Group EN', lang_id: 'Grup Baru ID' }
            }
            if (type == 'report') tableDataReports.value.push(newGroupRow)
            if (type == 'shareholders') tableDataShareHolders.value.push(newGroupRow)
            if (type == 'dividend') tableDataDividend.value.push(newGroupRow)
            if (type == 'bonds') tableDataBonds.value.push(newGroupRow)
        }

        // Tambah kolom baru
        const addColumn = (type) => {
            if (type == 'report') {
                headersReports.value.push({ lang_en: `Header ${headersReports.value.length + 1}`, lang_id: `Header ${headersReports.value.length + 1} ID` })
                tableDataReports.value.forEach(row => {
                    if (!row.isGroup) {
                        row.push({ lang_en: '', lang_id: '' })
                    }
                })
            }

            if (type == 'shareholders') {
                headersShareHolders.value.push({ lang_en: `Header ${headersShareHolders.value.length + 1}`, lang_id: `Header ${headersShareHolders.value.length + 1} ID` })
                tableDataShareHolders.value.forEach(row => {
                    if (!row.isGroup) {
                        row.push({ lang_en: '', lang_id: '' })
                    }
                })
            }

            if (type == 'dividend') {
                headersDividend.value.push({ lang_en: `Header ${headersDividend.value.length + 1}`, lang_id: `Header ${headersDividend.value.length + 1} ID` })
                tableDataDividend.value.forEach(row => {
                    if (!row.isGroup) {
                        row.push({ lang_en: '', lang_id: '' })
                    }
                })
            }

            if (type == 'bonds') {
                headersBonds.value.push({ lang_en: `Header ${headersBonds.value.length + 1}`, lang_id: `Header ${headersBonds.value.length + 1} ID` })
                tableDataBonds.value.forEach(row => {
                    if (!row.isGroup) {
                        row.push({ lang_en: '', lang_id: '' })
                    }
                })
            }
        }

        // Hapus baris
        const removeRow = (type, rowIndex) => {
            if (type == 'report') tableDataReports.value.splice(rowIndex, 1)
            if (type == 'shareholders') tableDataShareHolders.value.splice(rowIndex, 1)
            if (type == 'dividend') tableDataDividend.value.splice(rowIndex, 1)
            if (type == 'bonds') tableDataBonds.value.splice(rowIndex, 1)
        }

        // Hapus kolom
        const removeColumn = (type, colIndex) => {
            if (type == 'report') {
                headersReports.value.splice(colIndex, 1)
                tableDataReports.value.forEach(row => row.splice(colIndex, 1))
            }

            if (type == 'shareholders') {
                headersShareHolders.value.splice(colIndex, 1)
                tableDataShareHolders.value.forEach(row => row.splice(colIndex, 1))
            }

            if (type == 'dividend') {
                headersDividend.value.splice(colIndex, 1)
                tableDataDividend.value.forEach(row => row.splice(colIndex, 1))
            }

            if (type == 'bonds') {
                headersBonds.value.splice(colIndex, 1)
                tableDataBonds.value.forEach(row => row.splice(colIndex, 1))
            }
        }

        onMounted(() => {
            if (headersReports.value.length === 0) {
                headersReports.value = [
                    { lang_en: 'Header 1', lang_id: 'Header 1 ID' },
                    { lang_en: 'Header 2', lang_id: 'Header 2 ID' }
                ]
            }
            if (tableDataReports.value.length === 0) {
                tableDataReports.value = [
                    [{ lang_en: '', lang_id: '' }, { lang_en: '', lang_id: '' }]
                ]
            }

            if (headersDividend.value.length === 0) {
                headersDividend.value = [
                    { lang_en: 'Header 1', lang_id: 'Header 1 ID' },
                    { lang_en: 'Header 2', lang_id: 'Header 2 ID' }
                ]
            }
            if (tableDataDividend.value.length === 0) {
                tableDataDividend.value = [
                    [{ lang_en: '', lang_id: '' }, { lang_en: '', lang_id: '' }]
                ]
            }

            if (headersBonds.value.length === 0) {
                headersBonds.value = [
                    { lang_en: 'Header 1', lang_id: 'Header 1 ID' },
                    { lang_en: 'Header 2', lang_id: 'Header 2 ID' }
                ]
            }
            if (tableDataBonds.value.length === 0) {
                tableDataBonds.value = [
                    [{ lang_en: '', lang_id: '' }, { lang_en: '', lang_id: '' }]
                ]
            }

            if (headersShareHolders.value.length === 0) {
                headersShareHolders.value = [
                    { lang_en: 'Header 1', lang_id: 'Header 1 ID' },
                    { lang_en: 'Header 2', lang_id: 'Header 2 ID' }
                ]
            }
            if (tableDataShareHolders.value.length === 0) {
                tableDataShareHolders.value = [
                    [{ lang_en: '', lang_id: '' }, { lang_en: '', lang_id: '' }]
                ]
            }
        })

        return {
            addRow,
            addColumn,
            addRowGroup,
            removeRow,
            removeColumn,
            headersReports,
            tableDataReports,
            rowsJsonReports,
            headersJsonReports,
            headersShareHolders,
            tableDataShareHolders,
            rowsJsonShareHolders,
            headersJsonShareHolders,
            headersDividend,
            tableDataDividend,
            rowsJsonDividend,
            headersJsonDividend,
            headersBonds,
            tableDataBonds,
            rowsJsonBonds,
            headersJsonBonds
        }
    }
})

app.mount('#app')
</script>
@endpush
