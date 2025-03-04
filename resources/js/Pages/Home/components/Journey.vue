<template>
    <div
        class="bg-blue-dark py-28 text-white bg-contain bg-no-repeat bg-right relative"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/homepage/journey.png')})`
        }"
    >
        <container class="relative z-[1]">
            <p class="text-neutral-4 mb-4">
                Journey
            </p>
            <div class="mb-20 max-w-lg">
                <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-6">
                    Expanding Infrastructure, Powering Progress
                </h2>
                <p class="text-neutral-5 mb-0">
                    Chandra Asri Group, through its subsidiary CDI, is driving infrastructure development in Cilegon, a rapidly growing industrial hub. With a diversified portfolio in industrial water, energy, port & storage services, and logistics, CDI is strategically positioned for long-term success. Supported by stable cash flows from long-term contracts with reputable partners, CDI ensures sustainable growth and enhanced margins.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 mb-20">
                <div
                    v-for="(info, index) in informations"
                    class="border-l-2 border-l-blue-lighter px-8 py-4 lg:py-0"
                    :key="index"
                >
                    <p class="text-shadow-1 font-medium text-4xl lg:text-[80px] mb-2">
                        {{ info.title }}
                    </p>
                    <p class="mb-0 text-shadow-1 font-light leading-[18px]">
                        {{ info.description }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap border border-white">
                    Join with Us
                </Link>
                <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap border border-white">
                    All Awards
                </Link>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'


    const informations = ref([
        {
            title: '$194M',
            description: 'EGCO Group acquired a 30% stake in CDI, fueling expansion and innovation.'
        },
        {
            title: '$200M',
            description: 'Investment in Krakatau Posco Energy strengthens CDI’s presence in the power sector.'
        },
        {
            title: '95 kWp',
            description: 'Solar panel plant installed to drive sustainable operations'
        }
    ])
</script>
