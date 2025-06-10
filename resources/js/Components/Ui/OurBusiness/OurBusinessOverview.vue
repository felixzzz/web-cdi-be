<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${content?.overview_image})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="lg:max-w-[45%] ms-auto">
                    <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">{{ content?.overview_title }}</p>
                    <div class="content !text-neutral-5" v-html="cleanNbsp(content?.overview_description)"></div>
                </div>
            </container>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { cleanNbsp } from '@/Lib/utils'
    import { OurBusinessDetail } from '@/types/utility'


    defineProps<{
        content: OurBusinessDetail | null
    }>()

</script>
