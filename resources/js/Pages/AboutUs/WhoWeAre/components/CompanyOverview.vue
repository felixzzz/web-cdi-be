<template>
    <div class="py-20 bg-blue-dark relative" id="company-overview">
        <div
            class="absolute top-0 left-0 right-0 bottom-0 bg-contain bg-no-repeat bg-right"
            :style="{
                'backgroundImage': `url(${content.about_us_company_overview_background?.file_url})`
            }"
        ></div>

        <container class="relative z-[1]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <div class="lg:col-span-6">
                    <img :src="content.about_us_company_overview_tagline?.file_url" alt="" class="h-20 mb-4">
                    <p class="font-medium text-[22px] text-blue-lighter mb-[10px]">{{ content.about_us_company_overview_tagline?.title }}</p>
                    <div class="content" v-html="content.about_us_company_overview?.content"></div>
                </div>
                <div class="lg:col-span-6">
                    <img :src="content.about_us_company_overview?.file_url" alt="" class="w-full lg:w-[80%] rounded-xl ms-auto">
                </div>
            </div>
        </container>

    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { PreferenceAboutOverview } from '@/types/utility'

    defineProps<{
        content: PreferenceAboutOverview
    }>()

</script>
