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

        <div v-show="tabActive == 'shareholders'" class="mt-10">
            <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_shareholders_table?.title }}</p>
            <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_shareholders_table?.content"></div>
            <table-json :data="content?.investor_share_shareholders_table" v-if="content?.investor_share_shareholders_table" />
        </div>

        <div v-show="tabActive == 'dividend-information'" class="mt-10">
            <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_dividend_table?.title }}</p>
            <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_dividend_table?.content"></div>
            <table-json :data="content?.investor_share_dividend_table" v-if="content?.investor_share_dividend_table" />
        </div>
    </div>

</template>

<script setup lang="ts">
    import { ref } from 'vue'
    import { PreferenceInvestor } from '@/types/utility'
    import TableJson from '@/Components/Ui/Utils/TableJson.vue'

    const props = defineProps<{
        content: PreferenceInvestor | null
    }>()

    const tabActive = ref('shareholders')


    const tabs = ref([
        {
            id: 'shareholders',
            name: props.content?.investor_share_tab_one?.title || $t('Top 10 Shareholders')
        },
        {
            id: 'dividend-information',
            name: props.content?.investor_share_tab_two?.title || $t('Dividend Information')
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
