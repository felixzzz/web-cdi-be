<template>
    <container class="py-20" id="content-media-section">
        <h2 class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center max-w-[680px] mx-auto">
            {{ content.sustainability_action_banner?.title }}
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-16" v-if="paginate.state.loading">
            <div v-for="index in 3" :key="index">
                <news-loading />
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-16" v-if="!paginate.state.loading">
            <div v-for="(item, index) in paginate.state.items" :key="index">
                <news-card :item="item" :link="route('media.detail', { type: 'news', id: item.slug })" />
            </div>
        </div>

        <pagination-link
            :links="paginate.state.links"
            :meta="paginate.state.meta"
            @fetch="changePage"
        />
    </container>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News } from '@/types/utility'
    import { onBeforeMount } from 'vue'

    import { PreferenceSustainabilityAction } from '@/types/utility'
    import usePaginate from '@/Composables/usePaginate'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'

    defineProps<{
        content: PreferenceSustainabilityAction
    }>()

    const paginate = usePaginate<News>({
        route: route("api.article.list-sustainability"),
        scroll: 'content-media-section'
    })

    onBeforeMount(() => {
        paginate.fetchData()
    })

    const changePage = () => {
        paginate.fetchData()
    }

</script>
