<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head :title="$t('head_title.sustainability_report')" />
        <hero-image :content="content.sustainabilityReport" />
        <content-report-publication />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import ContentReportPublication from './components/ContentReportPublication.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getSustainabilityOverview()
    })

</script>
