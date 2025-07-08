<template>
    <div class="py-20 bg-white">
        <container id="article-container">
            <div class="flex lg:items-center justify-between mb-2 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-7 text-base mb-4">{{ $t('LATEST ARTICLE') }}</p>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[28px] mb-0 max-w-sm">{{ $t('Discover the latest from the energy industry') }}</p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center mt-4 lg:mt-0">
                    <Link :href="route('media.index', { type: 'news' })" class="py-2 rounded-full whitespace-nowrap  flex items-center gap-2 text-blue-base">
                        {{ $t('See All') }} <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>

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
        </container>

        <container>
            <div class="grid grid-cols-4 gap-6" v-if="loading">
                <div v-for="i in 4" :key="i">
                    <news-loading />
                </div>
            </div>
        </container>

        <container v-if="!loading">
            <swiper
                :modules="[Navigation, Pagination]"
                :slides-per-view="4"
                :space-between="24"
                :pagination="{ clickable: true, el: '.custom-pagination' }"
                :navigation="{ nextEl: '.custom-next', prevEl: '.custom-prev' }"
                class="custom-swiper"
                :breakpoints="{
                    320: { slidesPerView: 1 },
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                    1280: { slidesPerView: 4 }
                }"
            >
                <swiper-slide v-for="(item, index) in items" :key="index" class="!h-auto">
                    <news-card :item="item" :link="route('media.detail', { type: 'news', id: item.slug })" />
                </swiper-slide>
            </swiper>

            <div class="flex justify-between items-center mt-6">
                <div class="flex">
                    <div class="custom-pagination flex justify-center"></div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="custom-prev cursor-pointer text-neutral-13 text-2xl w-12 h-12 rounded-full border border-neutral-13 flex items-center justify-center">
                        <i class="isax icon-arrow-left"></i>
                    </div>
                    <div class="custom-next cursor-pointer text-neutral-13 text-2xl w-12 h-12 rounded-full border border-neutral-13 flex items-center justify-center">
                        <i class="isax icon-arrow-right-1"></i>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import 'swiper/css/pagination'
    import { Navigation, Pagination } from 'swiper/modules'
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News, NewsCategory } from '@/types/utility'
    import useRequest from '@/Composables/useRequest'
    import NewsLoading from '@/Components/Ui/Media/NewsLoading.vue'

    const tabActive = ref('all')

    const tabs = ref<NewsCategory[]>([])


    const items = ref<News[]>([])
    const loading = ref(false)

    const filterCategory = (id: string) => {
        tabActive.value = id
        fetchData()
    }

    const fetchData = () => {
        loading.value = true

        useRequest().get(route('api.article.latest', {
            category_id: tabActive.value
        }))
        .then((result) => {
            items.value = result.data
        })
        .finally(() => loading.value = false)
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

        fetchData()
    })
</script>
