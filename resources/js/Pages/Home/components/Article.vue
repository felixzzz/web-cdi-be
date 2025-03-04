<template>
    <div class="py-20 bg-white">
        <container id="article-container">
            <div class="flex lg:items-center justify-between mb-2 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-7 text-base mb-4">LATEST ARTICLE</p>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[28px] mb-0 max-w-sm">Discover the latest from the energy industry</p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center mt-4 lg:mt-0">
                    <Link href="" class="py-2 rounded-full whitespace-nowrap  flex items-center gap-2 text-blue-base">
                        See All <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>

            <div class="flex items-center gap-2 mt-10 mb-6 overflow-y-auto">
                <a
                    class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                    v-for="tab in tabs"
                    :key="tab.id"
                    :class="{
                        'bg-blue-base text-white': tab.id == tabActive
                    }"
                >
                    {{ tab.name }}
                </a>
            </div>
        </container>

        <container>
            <swiper
                :modules="[Navigation, Pagination]"
                :slides-per-view="4"
                :space-between="20"
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
                <swiper-slide v-for="(item, index) in items" :key="index">
                    <news-card :item="item" />
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
    import { ref } from 'vue'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import 'swiper/css/pagination'
    import { Navigation, Pagination } from 'swiper/modules'
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News } from '@/types/utility'

    const tabActive = ref('all')

    const tabs = ref([
        { id: 'all', name: 'All' },
        { id: 'corporate', name: 'Corporate' },
        { id: 'sustainability', name: 'Sustainability' },
        { id: 'awards', name: 'Awards' }
    ])


    const items = ref<News[]>([
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group Shares Insights on Energy Transition in Energy Sovereignty School 1'
        },
        {
            id: '2',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group and Yayasan Happy Hearts Indonesia Builds Eco Friendly Early Childhood Center 2'
        },
        {
            id: '3',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 3'
        },
        {
            id: '4',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 4'
        },
        {
            id: '5',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 5'
        },
    ])
</script>
