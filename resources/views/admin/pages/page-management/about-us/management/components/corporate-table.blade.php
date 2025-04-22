<x-portal::heading size="lg" class="!font-bold">Corporate Table</x-portal::heading>
<x-portal::form.select
    name="about_us_corporate_structure_table_show_content_en"
    label="Show"
    description=""
    description-trailing=""
    required
>
    <option value="show" {{ @$data->about_us_corporate_structure_table_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
    <option value="hide" {{ @$data->about_us_corporate_structure_table_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
</x-portal::form.select>
<x-portal::form.input label="Title EN" placeholder="Title EN" name="about_us_corporate_structure_table_title_en" :value="@$data->about_us_corporate_structure_table->title_en" type="text" />
<x-portal::form.input label="Title ID" placeholder="Title ID" name="about_us_corporate_structure_table_title_id" :value="@$data->about_us_corporate_structure_table->title_id" type="text" />

    <x-portal::form.select
    name="delete_table_about_us_corporate_structure_table"
    label="Delete Table?"
    description="If you choose Yes, this will permanently delete the table data when the form is submitted."
    description-trailing=""
>
    <option value="no">No</option>
    <option value="yes">Delete</option>
</x-portal::form.select>


<div id="app" class="flex flex-col gap-4 w-full">
    <div class="flex gap-2 items-center">
        <x-portal::button type="button" @click="addRow">Add Row</x-portal::button>
        <x-portal::button type="button" @click="addColumn">Add Column</x-portal::button>
        <x-portal::button type="button" @click="addRowGroup">Add Row Group</x-portal::button>
    </div>
    <div class="table-json" v-if="headers.length > 0">
        <table>
            <thead>
                <tr>
                    <th v-for="(header, index) in headers" :key="index" class="text-start relative">
                        <div class="flex flex-col">
                            <input v-model="headers[index].lang_en" placeholder="Header EN">
                            <input v-model="headers[index].lang_id" placeholder="Header ID">
                        </div>
                        <a href="javascript:;" @click="removeColumn(index)" v-if="index != 0" style="position: absolute; top: 10px; right: 10px; font-size: 18px;">
                            <i class="isax icon-trash"></i>
                        </a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, rowIndex) in tableData" :key="rowIndex">
                    <template v-if="row.is_group">
                        <td :colspan="headers.length" class="group">
                            <input v-model="row.label.lang_en" placeholder="Group Label EN" class="w-full">
                            <input v-model="row.label.lang_id" placeholder="Group Label ID" class="w-full">
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow(rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                    <template v-else>
                        <td v-for="(cell, colIndex) in headers" :key="colIndex">
                            <div class="flex flex-col">
                                <input v-model="tableData[rowIndex][colIndex].lang_en" placeholder="Cell EN" class="w-full">
                                <input v-model="tableData[rowIndex][colIndex].lang_id" placeholder="Cell ID" class="w-full placeholder-input">
                                <input v-model="tableData[rowIndex][colIndex].sub_lang_en" placeholder="Subtext EN" class="w-full placeholder-input">
                                <input v-model="tableData[rowIndex][colIndex].sub_lang_id" placeholder="Subtext ID" class="w-full placeholder-input">
                            </div>
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow(rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="about_us_corporate_structure_table_headers" v-bind:value="headersJson">
        <input type="hidden" name="about_us_corporate_structure_table_rows" v-bind:value="rowsJson">
    </div>
</div>

@push('js')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<script>
const { createApp, ref, computed, onMounted } = Vue

const app = createApp({
    setup() {
        const headers = ref(@json(@$data->about_us_corporate_structure_table->content_table['headers'] ?? []))

        const tableData = ref(@json(@$data->about_us_corporate_structure_table->content_table['tableData'] ?? []))

        const rowsJson = computed(() => {
            return JSON.stringify(tableData.value, null, 2)
        })

        const headersJson = computed(() => {
            return JSON.stringify(headers.value, null, 2)
        })

        // Tambah baris baru
        const addRow = () => {
            const newRow = headers.value.map(() => ({ lang_en: '', lang_id: '', sub_lang_en: '', sub_lang_id: '', is_group: false }))
            tableData.value.push(newRow)
        }

        const addRowGroup = () => {
            const newGroupRow = {
                is_group: true,
                label: { lang_en: 'New Group EN', lang_id: 'Grup Baru ID' }
            }
            tableData.value.push(newGroupRow)
        }

        // Tambah kolom baru
        const addColumn = () => {
            headers.value.push({ lang_en: `Header ${headers.value.length + 1}`, lang_id: `Header ${headers.value.length + 1} ID` })
            tableData.value.forEach(row => {
                if (!row.is_group) {
                    row.push({ lang_en: '', lang_id: '', sub_lang_en: '', sub_lang_id: '' })
                }
            })
        }

        // Hapus baris
        const removeRow = (rowIndex) => {
            tableData.value.splice(rowIndex, 1)
        }

        // Hapus kolom
        const removeColumn = (colIndex) => {
            headers.value.splice(colIndex, 1)
            tableData.value.forEach(row => {
                if (!row.is_group) {
                    row.splice(colIndex, 1)
                }
            })
        }

        onMounted(() => {
            // if (headers.value.length === 0) {
            //     headers.value = [
            //         { lang_en: 'Header 1', lang_id: 'Header 1 ID' },
            //         { lang_en: 'Header 2', lang_id: 'Header 2 ID' }
            //     ]
            // }
            // if (tableData.value.length === 0) {
            //     tableData.value = [
            //         [{ lang_en: '', lang_id: '', sub_lang_en: '', sub_lang_id: '' }, { lang_en: '', lang_id: '', sub_lang_en: '', sub_lang_id: '' }]
            //     ]
            // }
        })

        return {
            headers,
            tableData,
            addRow,
            addColumn,
            addRowGroup,
            removeRow,
            removeColumn,
            rowsJson,
            headersJson
        }
    }
})

app.mount('#app')
</script>
@endpush
