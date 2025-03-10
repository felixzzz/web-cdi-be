<template>
    <div class="bg-blue-dark py-20 text-white">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16 justify-between">
                <h2 class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium max-w-[592px]">
                    Discover How Chandra Daya Investasi is Evaluated for Sustainable Performance
                </h2>
                <p class="text-neutral-5 text-base">
                    ESG ratings assess corporate performance in Environmental, Social, and Governance areas. Our latest ratings reflect our commitment to sustainability, ethical practices, and community impact.
                </p>
            </div>

            <div class="py-16">
                <p class="text-2xl lg:text-[28px] font-medium text-gradient-gold mb-8 text-center">
                    Rating & Recognition
                </p>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    <div v-for="(rating, index) in ratings" :key="index" class="flex flex-col gap-4 items-center text-center py-6">
                        <img :src="rating.image" alt="">
                        <p
                            :class="{
                                'font-medium text-[22px] text-neutral-4': !rating.description,
                                'font-normal text-sm text-white': rating.description
                            }"
                        >
                            {{ rating.title }}
                        </p>
                        <p class="text-sm text-neutral-6">
                            {{ rating.description }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div v-for="(recognition, index) in recognitions" :key="index" class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-lg:items-center max-lg:text-center">
                    <div>
                        <img :src="recognition.image" alt="" class="rounded-xl border-2 border-gold-1 w-full">
                    </div>
                    <div class="lg:col-span-2">
                        <p
                            class="font-medium text-[22px] text-gradient-gold mb-2"
                        >
                            {{ recognition.title }}
                        </p>
                        <p class="max-lg:text-sm text-neutral-6">
                            {{ recognition.description }}
                        </p>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
import { asset } from '@/Lib/utils';
    import { ref } from 'vue'

    const ratings = ref([
        {
            image: asset('assets/frontend/images/sustainability/logo_cdp.webp'),
            title: 'Score Report Climate Change 2023',
            description: ''
        },
        {
            image: asset('assets/frontend/images/sustainability/logo_msci.webp'),
            title: 'Score Report Climate Change 2024',
            description: ''
        },
        {
            image: asset('assets/frontend/images/sustainability/logo_sustainalytics.webp'),
            title: 'ESG Risk Rating 2024',
            description: ''
        },
        {
            image: asset('assets/frontend/images/sustainability/award_1.png'),
            title: 'B score (Management)',
            description: 'B score (Management) means the Company has implemented specific actionsto address the climate change issue.'
        },
        {
            image: asset('assets/frontend/images/sustainability/award_2.png'),
            title: 'Increase compared to last year',
            description: 'Places in the top 20-35% of companies in the commodity chemical sub-sector.'
        },
        {
            image: asset('assets/frontend/images/sustainability/award_3.png'),
            title: 'Risk is lower compared to last year',
            description: 'Places in the 1st percentile globally in the commodity chemicals sub-industry.'
        }
    ])

    const recognitions = ref([
        {
            image: asset('assets/frontend/images/sustainability/recognition_1.png'),
            title: 'Top Rated Badge',
            description: 'Top-rated badge affirms our commitment to sustainability excellence, highlighting our transparent approach to ESG performance and our proactive management of ESG-related risks.'
        },
        {
            image: asset('assets/frontend/images/sustainability/recognition_2.png'),
            title: 'PROPER Gold',
            description: 'PROPER Gold is the highest award in the Company Performance Rating Program in Environmental Management (PROPER) by the Ministry of Environment and Forestry (KLHK) of the Republic of Indonesia.'
        }
    ])

</script>
