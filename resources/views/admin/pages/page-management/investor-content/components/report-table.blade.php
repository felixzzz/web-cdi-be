<x-portal::heading size="lg" class="!font-bold">Report Table</x-portal::heading>
<x-portal::form.input label="Text Info EN" placeholder="Text Info EN" name="investor_report_table_title_en" :value="@$data->investor_report_table->title_en" type="text" />
<x-portal::form.input label="Text Info ID" placeholder="Text Info ID" name="investor_report_table_title_id" :value="@$data->investor_report_table->title_id" type="text" />
<div id="app-report" class="flex flex-col gap-4 w-full">
    <div class="flex gap-2 items-center">
        <x-portal::button type="button" @click="addRow('report')">Add Row</x-portal::button>
        <x-portal::button type="button" @click="addColumn('report')">Add Column</x-portal::button>
        <x-portal::button type="button" @click="addRowGroup('report')">Add Row Group</x-portal::button>
    </div>
    <div class="table-json">
        <table>
            <thead>
                <tr>
                    <th v-for="(header, index) in headersReports" :key="index" class="text-start relative">
                        <div class="flex flex-col">
                            <input v-model="headersReports[index].lang_en" placeholder="Header EN">
                            <input v-model="headersReports[index].lang_id" placeholder="Header ID">
                        </div>
                        <a href="javascript:;" @click="removeColumn('report', index)" v-if="index != 0" style="position: absolute; top: 10px; right: 10px; font-size: 18px;">
                            <i class="isax icon-trash"></i>
                        </a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, rowIndex) in tableDataReports" :key="rowIndex">
                    <template v-if="row.is_group">
                        <td :colspan="headersReports.length" class="group">
                            <input v-model="row.label.lang_en" placeholder="Group Label EN" class="w-full">
                            <input v-model="row.label.lang_id" placeholder="Group Label ID" class="w-full">
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow('report', rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                    <template v-else>
                        <td v-for="(cell, colIndex) in headersReports" :key="colIndex">
                            <div class="flex flex-col">
                                <input v-model="tableDataReports[rowIndex][colIndex].lang_en" placeholder="Cell EN" class="w-full">
                                <input v-model="tableDataReports[rowIndex][colIndex].lang_id" placeholder="Cell ID" class="w-full">
                            </div>
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow('report', rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="investor_report_table_headers" v-bind:value="headersJsonReports">
        <input type="hidden" name="investor_report_table_rows" v-bind:value="rowsJsonReports">
    </div>
</div>
