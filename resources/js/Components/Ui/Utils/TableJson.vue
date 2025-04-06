
<template>
    <div class="table-main" v-if="data && data.content_table_trans">
        <table>
            <thead>
                <tr>
                    <td v-for="(label, index) in data?.content_table_trans.headers" :key="index">{{ label.text }}</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in data?.content_table_trans.tableData" :key="index">
                    <template v-for="(item, itemIndex) in row" :key="itemIndex">
                        <td :class="{ 'group': data?.content_table?.tableData[index].is_group }" :colspan="!data?.content_table?.tableData[index].is_group ? 1 : (data.content_table_trans.headers.length + 1)">
                            {{ item.text }}
                            <br>
                            <span v-if="item.sub_text" class="text-neutral-8 font-light">
                                {{ item.sub_text }}
                            </span>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
    import { PreferenceItem } from '@/types/utility'

    defineProps<{
        data: PreferenceItem | null
    }>()

</script>
