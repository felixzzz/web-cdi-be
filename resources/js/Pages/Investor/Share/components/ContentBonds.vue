<template>
    <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_bonds_table?.title }}</p>
    <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_bonds_table?.content"></div>
    <div class="table-main" v-if="content?.investor_share_bonds_table?.content_table_trans">
        <table>
            <thead>
                <tr>
                    <td v-for="(label, index) in content?.investor_share_bonds_table?.content_table_trans.headers" :key="index">{{ label.text }}</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in content?.investor_share_bonds_table?.content_table_trans.tableData" :key="index">
                    <template v-for="(item, itemIndex) in row" :key="itemIndex">
                        <td>
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

    import { PreferenceInvestor } from '@/types/utility'

    defineProps<{
        content: PreferenceInvestor | null
    }>()

</script>
