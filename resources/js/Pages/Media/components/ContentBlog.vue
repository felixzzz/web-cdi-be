<template>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10" v-if="paginate.state.loading">
        <div v-for="index in 3" :key="index">
            <news-loading />
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10" v-if="!paginate.state.loading">
        <div v-for="(item, index) in paginate.state.items" :key="index">
            <news-card :item="item" :link="route('media.detail', { type: 'blog', id: item.slug })" />
        </div>
    </div>

    <pagination-link
        :links="paginate.state.links"
        :meta="paginate.state.meta"
        @fetch="changePage"
    />
</template>

<script setup lang="ts">
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import usePaginate from '@/Composables/usePaginate'
    import { News } from '@/types/utility'
    import { onBeforeMount } from 'vue'

    const paginate = usePaginate<News>({
        route: route("api.article.list", "blog"),
        scroll: 'content-media-section'
    });

    const changePage = () => {
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()
    })

</script>
