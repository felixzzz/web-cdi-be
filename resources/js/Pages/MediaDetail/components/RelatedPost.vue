<template>
    <div class="pb-28 pt-12">
        <container>
            <p class="capitalize text-neutral-7 mb-4">
                {{ $t(type) }}
            </p>
            <div class="flex lg:items-center justify-between mb-10 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px]">
                        {{ $t('Related posts') }}
                    </p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center max-lg:mt-4">
                    <Link :href="route('media.index', { type })" class="py-2 rounded-full whitespace-nowrap  flex items-center gap-2 text-blue-base">
                        {{ $t('See All') }} <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="loading">
                <div v-for="i in 3" :key="i">
                    <news-loading />
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" v-if="!loading">
                <div v-for="(item, index) in items" :key="index">
                    <news-card :item="item" :link="route('media.detail', { type, id: item.slug })" />
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'
    import useRequest from '@/Composables/useRequest'
    import { News } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    const props = defineProps<{
        type: string;
        data: News;
    }>()

    const items = ref<News[]>([])
    const loading = ref(false)

    onMounted(() => {
        loading.value = true
        useRequest().get(route("api.article.relates", props.data.ulid))
        .then((result) => {
            items.value = result.data
        })
        .finally(() => loading.value = false)
    })

</script>
