<template>
    <container class="mt-28 mb-16">
        <div
            class="p-6 rounded-3xl gap-6 flex flex-col w-full items-center text-center bg-blue-base bg-cover relative overflow-hidden"
            :style="{
                'backgroundImage': `url(${content?.investor_report_overview?.file_url})`
            }"
        >
            <p class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-white max-w-[680px]">
                {{ content?.investor_report_overview?.title }}
            </p>
            <p class="content !text-neutral-4 max-w-[864px] font-light" v-html="content?.investor_report_overview?.content"></p>
        </div>
    </container>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { PreferenceInvestor } from '@/types/utility'

    defineProps<{
        content: PreferenceInvestor | null
    }>()

</script>
