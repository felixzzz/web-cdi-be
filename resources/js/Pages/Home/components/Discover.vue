<template>
    <div class="pt-20 pb-28 bg-blue-dark text-white">
        <container>
            <h1 class="mb-10 text-2xl lg:text-[38px] lg:leading-[44px] font-medium max-w-2xl mx-auto text-center">Discover the Latest Thing</h1>
        </container>
        <div class="grid grid-cols-2 lg:grid-cols-4">
            <div
                v-for="(tab, index) in tabs"
                class="relative aspect-[9/16] bg-cover bg-no-repeat text-white cursor-pointer"
                :key="index"
                :style="{ backgroundImage: `url(${tab.image})` }"
                x-data="{show_overlay: false}"
                x-on:mouseleave="show_overlay = false"
                x-on:mouseover="show_overlay = true"
            >
                <div class="absolute inset-0 overlay-card-1"></div>
                <div class="absolute inset-0 flex flex-col gap-4 p-5 lg:p-8 text-white z-10">
                    <h1 class="text-xl lg:text-[32px] font-medium">{{ tab.name }}</h1>
                    <p class="text-xs lg:text-base font-extralight text-shadow-1">{{ tab.description }}</p>
                    <i class="isax icon-arrow-right-2 -rotate-45 text-5xl font-light absolute bottom-8 right-8"></i>
                </div>
                <div
                    class="absolute inset-0 flex flex-col justify-center items-center p-4 z-[11] bg-black/64"
                    x-show="show_overlay"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { ref } from 'vue'

    const tabs = ref([
        {
            name: 'Sustainability',
            route: '',
            description: 'Long-term sustainability initiatives to achieve climate resilience and enhance societal well-being',
            image: asset('assets/frontend/images/homepage/discover_sustainability.webp')
        },
        {
            name: 'Our Business',
            route: '',
            description: 'Essential chemicals and infrastructure solutions to support key sectors across Indonesia.',
            image: asset('assets/frontend/images/homepage/discover_our_business.webp')
        },
        {
            name: 'Investors',
            route: '',
            description: 'Timely, reliable, and relevant investment information for institutional and individual investors.',
            image: asset('assets/frontend/images/homepage/discover_investors.webp')
        },
        {
            name: 'Careers',
            route: '',
            description: 'Discover your purpose and make an impact as you grow what truly matters in your career.',
            image: asset('assets/frontend/images/homepage/discover_careers.webp')
        }
    ])
</script>
