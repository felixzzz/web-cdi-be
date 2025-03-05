<template>
    <section id="milestone">
        <div class="py-28 bg-blue-dark text-white">
            <container>
                <div class="flex items-center justify-between gap-4 mb-16">
                    <div>
                        <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-2">
                            From Then to Now
                        </h2>
                        <p class="text-neutral-8">Explore Chandra Daya Investasi key milestones over the years.</p>
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
                        <swiper-slide v-for="(item, index) in data" :key="index">
                            <div class="flex flex-col gap-6">
                                <p class="text-2xl lg:text-[28px] font-medium text-blue-lighter">{{ item.title }}</p>
                                <img :src="asset('assets/frontend/icons/ic_timeline.svg')" alt="">
                                <div class="bg-gradient-1 rounded-lg px-3 py-4">
                                    <div class="content !text-neutral-5" v-html="item.content"></div>
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
    import { ref } from 'vue'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import { Navigation } from 'swiper/modules'

    const data = ref([
        {
            title: '2023',
            content: `
                <ol class="list-disc">
                    <li>PT Chandra Daya Investasi was established as an investment holding company for industrial water infrastructure, energy, port and storage, as well as electricity, water, and port logistics businesses</li>
                    <li>An investment of <b>US$194 million</b> from Electric Generating Public Company Limited or EGCO Group (EGCO) for a <b>30%</b> stake in CDI.</li>
                    <li><b>Acquired 70%</b> of PT Krakatau Chandra Energi (KCE) and 49% of PT Krakatau Tirta Industri (KTI) in 2023, marking the beginning of the energy and water business pillars.</li>
                    <li>Expanded energy sector acquisitions by purchasing a <b>45% stake</b> in PT Krakatau Posco Energy (KPE) with an investment of up to <b>US$200 million</b> through PT Krakatau Chandra Energi.</li>
                </ol>
            `
        },
        {
            title: '2024',
            content: `
                <ol class="list-disc">
                    <li>Procurement of electric vehicle charging stations (EV charging stations) outside Cilegon.</li>
                    <li>Commencement of solar panel business outside Cilegon.</li>
                    <li>Commencement of Port and Storage business.</li>
                </ol>
            `
        },
        {
            title: '2025',
            content: `
                <ol class="list-disc">
                    <li>PT Chandra Daya Investasi was established as an investment holding company for industrial water infrastructure, energy, port and storage, as well as electricity, water, and port logistics businesses</li>
                    <li>An investment of <b>US$194 million</b> from Electric Generating Public Company Limited or EGCO Group (EGCO) for a <b>30%</b> stake in CDI.</li>
                    <li><b>Acquired 70%</b> of PT Krakatau Chandra Energi (KCE) and 49% of PT Krakatau Tirta Industri (KTI) in 2023, marking the beginning of the energy and water business pillars.</li>
                    <li>Expanded energy sector acquisitions by purchasing a <b>45% stake</b> in PT Krakatau Posco Energy (KPE) with an investment of up to <b>US$200 million</b> through PT Krakatau Chandra Energi.</li>
                </ol>
            `
        }
    ])

</script>
