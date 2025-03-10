<template>
    <div
        class="py-28 lg:py-40 bg-cover"
        :style="{ backgroundImage: `url(${asset('assets/frontend/images/media/media_hero_image.webp')})` }"
    >
        <container>
            <swiper
                :modules="[Navigation, Pagination]"
                :slides-per-view="1"
                :pagination="{ clickable: true, el: '.custom-pagination-media' }"
                :navigation="{ nextEl: '.custom-next', prevEl: '.custom-prev' }"
                class="custom-swiper"
            >
                <swiper-slide v-for="i in 2" :key="i">
                    <h1 class="text-2xl leading-6 lg:text-[52px] lg:leading-[60px] font-medium text-white mb-9">Latest <span class="text-blue-lighter">{{ i == 1 ? 'News' : 'Blog' }}</span></h1>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <img
                            class="aspect-video lg:aspect-auto lg:h-[380px] w-full object-cover rounded-xl"
                            src="https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                        >
                        <div class="p-6 rounded-xl bg-[#E6F0FA] border border-neutral-5 backdrop-blur-2xl">
                            <span class="bg-blue-base text-white px-3 py-1 text-sm rounded-full me-4" v-if="i == 1">
                                Sustainability
                            </span>
                            <span class="text-sm text-neutral-10">
                                05-02-2025
                            </span>
                            <h3 class="text-[22px] font-medium line-clamp-3 mt-4 text-neutral-13">
                                Chandra Asri Group Maintains Strong CDP Scores Following Sustainable Business Growth
                            </h3>
                            <p class="text-sm mt-2 mb-6 line-clamp-2 text-neutral-10">
                                PT Chandra Asri Pacific Tbk (Chandra Asri Group) (IDX: TPIA) is proud to maintain a "B" score for Climate Change in the Carbon Disclosure Project (CDP) 2024.
                            </p>
                            <Link href="" class="text-blue-base flex items-center gap-2">
                                Read more
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
    import { Navigation, Pagination } from 'swiper/modules';
    import { asset } from '@/Lib/utils'

</script>
