<template>
    <div
        class="py-28 lg:py-40 bg-cover"
        :style="{ backgroundImage: `url(${content.media?.file_url})` }"
    >
        <container class="animate-pulse" v-if="loading">
            <h1 class="text-2xl leading-6 lg:text-[52px] lg:leading-[60px] font-medium text-white mb-9 w-1/3 h-10 bg-neutral-5"></h1>

            <div class="grid lg:grid-cols-2 gap-4">
                <img
                    class="aspect-video lg:aspect-auto lg:h-[380px] w-full object-cover rounded-xl bg-neutral-4"
                >
                <div class="p-6 rounded-xl bg-[#E6F0FA] border border-neutral-5 backdrop-blur-2xl">
                    <span class="text-sm text-neutral-10 w-1/4 h-5 bg-neutral-4"></span>
                    <h3 class="text-[22px] font-medium line-clamp-3 mt-4 text-neutral-13 w-1/3 h-5 bg-neutral-4"></h3>
                    <h3 class="text-[22px] font-medium line-clamp-3 mt-4 text-neutral-13 w-1/3 h-5 bg-neutral-4"></h3>
                    <p class="text-sm mt-2 mb-6 line-clamp-2 text-neutral-10 w-1/4 h-5 bg-neutral-4"></p>
                    <div class="w-1/4 h-5 bg-neutral-4"></div>
                </div>
            </div>
        </container>
        <container v-if="!loading">
            <swiper
                :modules="[Navigation, Pagination]"
                :slides-per-view="1"
                :pagination="{ clickable: true, el: '.custom-pagination-media' }"
                :navigation="{ nextEl: '.custom-next', prevEl: '.custom-prev' }"
                class="custom-swiper"
            >
                <swiper-slide v-for="(row, i) in latest" :key="i">
                    <h1 class="text-2xl leading-6 lg:text-[52px] lg:leading-[60px] font-medium text-white mb-9" v-html="row.title"></h1>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <img
                            class="aspect-video lg:aspect-auto lg:h-[380px] w-full object-cover rounded-xl"
                            :src="row.data.image" alt=""
                        >
                        <div class="p-6 rounded-xl bg-[#E6F0FA] border border-neutral-5 backdrop-blur-2xl">
                            <span class="bg-blue-base text-white px-3 py-1 text-sm rounded-full me-4" v-if="row.data.category_name">
                                {{ row.data.category_name }}
                            </span>
                            <span class="text-sm text-neutral-10">
                                {{ row.data.date }}
                            </span>
                            <h3 class="text-[22px] font-medium line-clamp-3 mt-4 text-neutral-13">
                                {{ row.data.title }}
                            </h3>
                            <p class="text-sm mt-2 mb-6 line-clamp-2 text-neutral-10">
                                {{ row.data.short_content }}
                            </p>
                            <Link :href="row.data.route" class="text-blue-base flex items-center gap-2" v-if="row.data.route">
                                {{ $t('Read more') }}
                                <i class="isax icon-arrow-right-3 text-2xl"></i>
                            </Link>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>

            <div class="grid grid-cols-2 mt-6">
                <div class="flex">
                    <div class="custom-pagination-media flex justify-center"></div>
                </div>
                <div class="flex items-center justify-end gap-4">
                    <div class="custom-prev cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center">
                        <i class="isax icon-arrow-left"></i>
                    </div>
                    <div class="custom-next cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center">
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

    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
    import { Navigation, Pagination } from 'swiper/modules'
    import { onBeforeMount, onMounted, ref } from 'vue'
    import useRequest from '@/Composables/useRequest'
    import { LatestBannerNews } from '@/types/utility';
    import { useContentStore } from '@/Composables/useContentStore'

    const content = useContentStore()

    const latest = ref<LatestBannerNews[]>([])
    const loading = ref(false)

    onBeforeMount(() => {
        content.getMedia()
    })

    onMounted(() => {
        loading.value = true
        useRequest().get(route('api.article.latest-media'))
        .then((result) => {
            latest.value = result.data
            loading.value = false
        })
    })

</script>
