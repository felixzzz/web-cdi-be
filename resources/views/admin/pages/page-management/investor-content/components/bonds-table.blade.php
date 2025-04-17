<x-portal::heading size="lg" class="!font-bold">Bonds Table</x-portal::heading>
<x-portal::form.select
    name="investor_share_bonds_table_show_content_en"
    label="Show"
    description=""
    description-trailing=""
    required
>
    <option value="show" {{ @$data->investor_share_bonds_table_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
    <option value="hide" {{ @$data->investor_share_bonds_table_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
</x-portal::form.select>
<div class="flex gap-4">
    <div class="flex flex-col gap-4 w-full">
        <!-- EN -->
        <img src="{{ asset("assets/frontend/icons/flag_en.svg") }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="investor_share_bonds_table_title_en" :value="@$data->investor_share_bonds_table->title_en" type="text" />
        <x-portal::form.group
            label="Description"
            name="investor_share_bonds_table_content_en"
            description=""
            description-trailing=""
        >
            <x-editor.quill name="investor_share_bonds_table_content_en" height="150">{!! @$data->investor_share_bonds_table->content_en !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
    <div class="max-lg:hidden">
        <x-portal::separator orientation="vertical" />
    </div>
    <div class="flex flex-col gap-4 w-full">
        <!-- ID -->
        <img src="{{ asset("assets/frontend/icons/flag_id.svg") }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="investor_share_bonds_table_title_id" :value="@$data->investor_share_bonds_table->title_id" type="text" />
        <x-portal::form.group
            label="Description"
            name="investor_share_bonds_table_content_id"
            description=""
            description-trailing=""
        >
            <x-editor.quill name="investor_share_bonds_table_content_id" height="150">{!! @$data->investor_share_bonds_table->content_id !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
</div>

<x-portal::form.select
    name="delete_table_investor_share_bonds_table"
    label="Delete Table?"
    description="If you choose Yes, this will permanently delete the table data when the form is submitted."
    description-trailing=""
>
    <option value="no">No</option>
    <option value="yes">Delete</option>
</x-portal::form.select>

<div id="app-bonds" class="flex flex-col gap-4 w-full">
    <div class="flex gap-2 items-center">
        <x-portal::button type="button" @click="addRow('bonds')">Add Row</x-portal::button>
        <x-portal::button type="button" @click="addColumn('bonds')">Add Column</x-portal::button>
        <x-portal::button type="button" @click="addRowGroup('bonds')">Add Row Group</x-portal::button>
    </div>
    <div class="table-json" v-if="headersBonds.length > 0">
        <table>
            <thead>
                <tr>
                    <th v-for="(header, index) in headersBonds" :key="index" class="text-start relative">
                        <div class="flex flex-col">
                            <input v-model="headersBonds[index].lang_en" placeholder="Header EN">
                            <input v-model="headersBonds[index].lang_id" placeholder="Header ID">
                        </div>
                        <a href="javascript:;" @click="removeColumn('bonds', index)" v-if="index != 0" style="position: absolute; top: 10px; right: 10px; font-size: 18px;">
                            <i class="isax icon-trash"></i>
                        </a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, rowIndex) in tableDataBonds" :key="rowIndex">
                    <template v-if="row.is_group">
                        <td :colspan="headersBonds.length" class="group">
                            <input v-model="row.label.lang_en" placeholder="Group Label EN" class="w-full">
                            <input v-model="row.label.lang_id" placeholder="Group Label ID" class="w-full">
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow('bonds', rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                    <template v-else>
                        <td v-for="(cell, colIndex) in headersBonds" :key="colIndex">
                            <div class="flex flex-col">
                                <input v-model="tableDataBonds[rowIndex][colIndex].lang_en" placeholder="Cell EN" class="w-full">
                                <input v-model="tableDataBonds[rowIndex][colIndex].lang_id" placeholder="Cell ID" class="w-full">
                            </div>
                        </td>
                        <td>
                            <x-portal::button type="button" @click="removeRow('bonds', rowIndex)">
                                <i class="isax icon-trash"></i> Row
                            </x-portal::button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="investor_share_bonds_table_headers" v-bind:value="headersJsonBonds">
        <input type="hidden" name="investor_share_bonds_table_rows" v-bind:value="rowsJsonBonds">
    </div>
</div>
