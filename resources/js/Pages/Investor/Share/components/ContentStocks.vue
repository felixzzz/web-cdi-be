<template>
    <div>
        <div class="flex gap-6 w-full border-b-2 border-b-neutral-6">
            <div
                v-for="tab in tabs"
                :key="tab.id"
                class="border-b-2 border-b-transparent text-neutral-13 text-lg text-center p-4 hover:border-b-blue-base hover:border-b-4 hover:font-medium transition cursor-pointer"
                :class="{
                    'border-b-4 !border-b-blue-base font-medium': tabActive == tab.id
                }"
                @click="changeTab(tab.id)"
            >
                {{ tab.name }}
            </div>
        </div>

        <div v-show="tabActive == 'top-10-shareholders'" class="mt-10">
            <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_shareholders_table?.title }}</p>
            <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_shareholders_table?.content"></div>
            <div class="table-main" v-if="content?.investor_share_shareholders_table?.content_table_trans">
                <table>
                    <thead>
                        <tr>
                            <td v-for="(label, index) in content?.investor_share_shareholders_table?.content_table_trans.headers" :key="index">{{ label.text }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in content?.investor_share_shareholders_table?.content_table_trans.tableData" :key="index">
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
        </div>

        <div v-show="tabActive == 'dividend-information'" class="mt-10">
            <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_dividend_table?.title }}</p>
            <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_dividend_table?.content"></div>
            <div class="table-main" v-if="content?.investor_share_dividend_table?.content_table_trans">
                <table>
                    <thead>
                        <tr>
                            <td v-for="(label, index) in content?.investor_share_dividend_table?.content_table_trans.headers" :key="index">{{ label.text }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in content?.investor_share_dividend_table?.content_table_trans.tableData" :key="index">
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
        </div>
    </div>

</template>

<script setup lang="ts">
    import { ref } from 'vue'
    import { PreferenceInvestor } from '@/types/utility'

    defineProps<{
        content: PreferenceInvestor | null
    }>()

    const tabActive = ref('top-10-shareholders')


    const tabs = ref([
        {
            id: 'top-10-shareholders',
            name: $t('Top 10 Shareholders')
        },
        {
            id: 'dividend-information',
            name: $t('Dividend Information')
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
