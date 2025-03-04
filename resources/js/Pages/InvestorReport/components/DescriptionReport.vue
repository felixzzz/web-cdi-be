<template>
    <container class="mt-28 mb-16">
        <div
            class="p-6 rounded-3xl gap-6 flex flex-col w-full items-center text-center bg-blue-base bg-cover relative overflow-hidden"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/investor/investor_report_section.webp')})`
            }"
        >
            <p class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-white max-w-[680px]">
                Transparency, Stability, and a Commitment to Shareholder Value Guide Our Financial Journey
            </p>
            <p class="text-neutral-4 max-w-[864px] font-light">
                Transparency, stability, and a dedication to creating shareholder value are at the forefront of our financial journey. With a proven record of performance and financial achievements, our commitment to excellence and prudent financial management serves as a benchmark for value creation that consistently delivers optimal results.
            </p>
        </div>
    </container>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'

</script>
