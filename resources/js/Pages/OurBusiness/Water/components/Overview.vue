<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/water_overview.webp')})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="lg:max-w-[45%] ms-auto">
                    <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">Overview</p>
                    <div class="content !text-neutral-5" v-html="content"></div>
                </div>
            </container>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'


    const content = `
            <p>KTI has expanded its business capabilities to meet market demands by developing and operating various water treatment facilities.  These include Demineralized Water Treatment Plants, Water Recycling Plants, Wastewater Treatment Plants that utilize advanced technologies such as membrane, ultrafiltration, ion exchange, and biological treatment. KTI's business line include: Clean water, demin water, and wastewater treatment.</p>
        `

</script>
