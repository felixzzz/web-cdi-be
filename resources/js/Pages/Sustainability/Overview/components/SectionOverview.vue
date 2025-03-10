<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/sustainability/sustainability_overview_section.webp')})`
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
            <p>In today's dynamic business environment, CDI is embarking on a transformative journey toward sustainable growth. This involves expanding business portfolios responsibly and inclusively while aligning with economic viability. Our robust ESG approach demonstrates our commitment to creating long-term stakeholder value and operational resilience. By integrating sustainability at our core, CDI aims to be a reliable growth partner, proactively addressing ESG challenges through impactful initiatives. Our Sustainability Framework guides strategic decisions, paving the way for business success that aligns harmoniously with environmental and social progress.</p>
        `

</script>
