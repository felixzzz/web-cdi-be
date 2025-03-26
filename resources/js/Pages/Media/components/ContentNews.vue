<template>
    <section id="news-list">
        <div class="flex items-center gap-2 mt-10 mb-6 overflow-y-auto">
            <a
                class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                v-for="tab in tabs"
                :key="tab.id"
                :class="{
                    'bg-blue-base text-white': tab.ulid == tabActive
                }"
                @click="filterCategory(tab.ulid)"
            >
                {{ tab.name }}
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="paginate.state.loading">
            <div v-for="index in 3" :key="index">
                <news-loading />
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="!paginate.state.loading">
            <div v-for="(item, index) in paginate.state.items" :key="index">
                <news-card :item="item" :link="route('media.detail', { type: 'news', id: item.slug })" />
            </div>
        </div>

        <pagination-link
            :links="paginate.state.links"
            @fetch="changePage"
        />
    </section>

</template>

<script setup lang="ts">
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import usePaginate from '@/Composables/usePaginate'
    import useRequest from '@/Composables/useRequest'
    import { getQueryParam, routeAppendParam } from '@/Lib/utils'
    import { News, NewsCategory } from '@/types/utility'
    import { onBeforeMount, onMounted, ref } from 'vue'
    const tabActive = ref(getQueryParam('category_id') || 'all')

    const tabs = ref<NewsCategory[]>([])
    const filter = ref({
        category_id: getQueryParam('category_id') || ''
    })

    const paginate = usePaginate<News>({
        route: route("api.article.list"),
        params: filter.value,
        scroll: 'news-list'
    });


    const filterCategory = (id: string) => {
        tabActive.value = id
        filter.value.category_id = id == 'all' ? '' : id
        routeAppendParam({
            category_id: id == 'all' ? '' : id
        })
        paginate.fetchData({})
    }

    const changePage = () => {
        paginate.fetchData()
    }

    onMounted(() => {
        useRequest().get(route('api.utility.categories'))
        .then((result) => {
            tabs.value = [
                {
                    id: 'all', ulid: 'all', name: $t('All')
                },
                ...result.data
            ]
        })
    })

    onBeforeMount(() => {
        paginate.fetchData()
    })

</script>
