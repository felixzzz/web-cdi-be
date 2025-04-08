<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${content.sustainability_overview_content?.file_url})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="lg:max-w-[45%] ms-auto">
                    <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">{{ content.sustainability_overview_content?.title }}</p>
                    <div class="content !text-neutral-5" v-html="content.sustainability_overview_content?.content"></div>
                </div>
            </container>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { PreferenceSustainabilityOverview } from '@/types/utility'

    defineProps<{
        content: PreferenceSustainabilityOverview
    }>()

</script>
