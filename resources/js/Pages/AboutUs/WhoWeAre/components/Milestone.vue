<template>
    <section id="milestone">
        <div class="py-28 bg-blue-dark text-white bg-cover relative"
            :style="{
                'backgroundImage': `url(${content.about_us_milestone?.file_url})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="flex items-center justify-between gap-4 mb-16">
                    <div>
                        <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-2">
                            {{ content.about_us_milestone?.title }}
                        </h2>
                        <div class="content !text-neutral-5" v-html="content.about_us_milestone?.content"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="custom-prev cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center">
                            <i class="isax icon-arrow-left"></i>
                        </div>
                        <div class="custom-next cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center">
                            <i class="isax icon-arrow-right-1"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <swiper
                        :modules="[Navigation]"
                        :slides-per-view="2"
                        :space-between="24"
                        :navigation="{ nextEl: '.custom-next', prevEl: '.custom-prev' }"
                        class="custom-swiper"
                        :breakpoints="{
                            320: { slidesPerView: 1 },
                            640: { slidesPerView: 2 }
                        }"
                    >
                        <swiper-slide v-for="(group, index) in groupedData" :key="group.year">
                            <div class="flex flex-col gap-6 backdrop-blur-sm">
                                <p class="text-2xl lg:text-[28px] font-medium text-blue-lighter">{{ group.year }}</p>
                                <img :src="asset('assets/frontend/icons/ic_timeline.svg')" alt="">
                                <div class="bg-gradient-1 rounded-lg px-3 py-4 flex flex-col gap-4">
                                    <div v-for="item in group.items" :key="item.ulid || item.id" class="content !text-neutral-5" v-html="item.content"></div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils';
    import { onMounted, ref, computed } from 'vue'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import { Navigation } from 'swiper/modules'

    import { Milestone, PreferenceAboutOverview } from '@/types/utility'
    import useRequest from '@/Composables/useRequest'

    defineProps<{
        content: PreferenceAboutOverview
    }>()

    const data = ref<Milestone[]>([])

    const groupedData = computed(() => {
        const groups: { [key: string]: Milestone[] } = {}
        data.value.forEach((item) => {
            const year = String(item.year)
            if (!groups[year]) {
                groups[year] = []
            }
            groups[year].push(item)
        })
        return Object.keys(groups)
            .sort((a, b) => parseInt(a) - parseInt(b))
            .map((year) => ({
                year,
                items: groups[year]
            }))
    })

    onMounted(() => {
        useRequest().get(route('api.utility.milestones'))
        .then((result) => {
            data.value = result.data
        })
    })

</script>
