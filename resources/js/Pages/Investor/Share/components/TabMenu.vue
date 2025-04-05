<template>
    <div class="py-20">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">
                <div class="flex lg:flex-col lg:items-start w-full lg:border-t-2 border-t-neutral-4 max-lg:border-b-2 border-b-neutral-4">
                    <Link
                        v-for="tab in tabs"
                        :key="tab.id"
                        :href="route('investor.shares-information', { tab: tab.id })"
                        class="border-b-2 border-b-neutral-4 text-neutral-13 text-lg text-center p-4
                                max-lg:hover:border-b-blue-base max-lg:hover:border-b-4 hover:font-bold transition
                                relative border-l-before-hover
                                lg:w-full lg:text-start
                                "
                        :class="{
                            'max-lg:border-b-4 max-lg:!border-b-blue-base lg:font-bold border-l-before': tabActive == tab.id
                        }"
                    >
                        {{ tab.name }}
                    </Link>
                </div>

                <div class="lg:col-span-4">
                    <content-stocks v-if="tabActive == 'stocks'" :content="content" />
                    <content-bonds v-if="tabActive == 'bonds'" :content="content" />
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { getQueryParam } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import ContentStocks from './ContentStocks.vue'
    import ContentBonds from './ContentBonds.vue'
    import { PreferenceInvestor } from '@/types/utility'

    defineProps<{
        content: PreferenceInvestor | null
    }>()

    const tabActive = ref(getQueryParam('tab') || 'stocks')
    const tabs = ref([
        { id: 'stocks', name: $t('Stocks') },
        { id: 'bonds', name: $t('Bonds') }
    ])

</script>
