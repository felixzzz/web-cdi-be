<template>
    <div class="relative">
        <div class="absolute z-[12] text-center w-full py-2 px-10 lg:py-8">
            <h1 class="
                text-white text-shadow-1
                text-base lg:text-[38px] lg:leading-[44px]
                font-normal lg:font-light max-w-2xl mx-auto"
            >
                Infrastructure Solutions for Efficient Industrial Growth
            </h1>
        </div>
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
                <div class="absolute inset-0 flex flex-col justify-between px-5 lg:px-10 pb-5 lg:pb-10 pt-[35%] text-white z-10">
                    <h1 class="text-2xl lg:text-[52px] lg:leading-[60px] font-medium text-shadow-1">{{ tab.name }}</h1>
                    <p class="text-xs lg:text-base font-normal text-shadow-1">{{ tab.description }}</p>
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
                    <Link :href="tab.route" class="bg-white/16 text-white px-6 py-2 border border-white rounded-full whitespace-nowrap gap-3 flex items-center w-fit mt-10">
                        Learn More <i class="isax icon-arrow-right-1 -rotate-45 text-xl"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const tabs = ref([
        {
            name: 'Energy',
            route: '',
            description: 'Our energy business and operations are managed by CDI and run by PT. Krakatau Chandra Energi (KCE)',
            image: 'assets/frontend/images/homepage/energy.webp'
        },
        {
            name: 'Water',
            route: '',
            description: 'We have a 49% stake acquired from PT Krakatau Sarana Infrastruktur who handled our water business',
            image: 'assets/frontend/images/homepage/water.webp'
        },
        {
            name: 'Ports & Storage',
            route: '',
            description: 'Provides ports and tank services business for refined chemical and petroleum products',
            image: 'assets/frontend/images/homepage/ports_storage.webp'
        },
        {
            name: 'Logistics',
            route: '',
            description: 'CDI pioneers in shipping and warehousing, serving company needs and future customers',
            image: 'assets/frontend/images/homepage/logistics.webp'
        }
    ])

</script>
