<template>
    <div class="py-20" id="content-media-section">
        <container>
            <div class="flex items-center gap-2 mb-6 overflow-y-auto">
                <Link
                    class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                    v-for="tab in tabs"
                    :key="tab.id"
                    :href="route('sustainability.report-and-publication', { tab: tab.id })"
                    :class="{
                        'bg-blue-base text-white': tab.id == tabActive
                    }"
                >
                    {{ tab.name }}
                </Link>
                <a
                    class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                >
                    All Year <i class="isax icon-arrow-down-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="paginate.state.loading">
                <div v-for="index in 3" :key="index">
                    <news-loading />
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="!paginate.state.loading">
                <div v-for="(item, index) in paginate.state.items" :key="index" x-data="{popup: false}">
                    <sustainability-card :item="item" :type="tabActive" />
                </div>
            </div>

            <pagination-link
                :links="paginate.state.links"
                :meta="paginate.state.meta"
                @fetch="changePage"
            />
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'
    import SustainabilityCard from '@/Components/Ui/Sustainability/SustainabilityCard.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import usePaginate from '@/Composables/usePaginate'
    import { getQueryParam } from '@/Lib/utils'
    import { SustainabilityReport } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onBeforeMount, ref } from 'vue'

    const tabActive = ref(getQueryParam('tab') || 'report')

    const tabs = ref([
        { id: 'report', name: 'Report' },
        { id: 'publication', name: 'Publication' }
    ])

    const paginate = usePaginate<SustainabilityReport>({
        route: route("api.sustainability.reports", tabActive.value),
        scroll: 'content-media-section'
    });

    const changePage = () => {
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()
    })

</script>
