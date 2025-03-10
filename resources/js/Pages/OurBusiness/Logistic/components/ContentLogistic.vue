<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/key_assets.webp')})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="lg:max-w-[45%] me-auto">
                    <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">Key Assets</p>
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
            <ol class="list-disc">
                <li>A fleet of 7 vessels with capacities ranging from  5,300 -to 8,800 DWT.</li>
            </ol>
        `

</script>
