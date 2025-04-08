<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_overview')" />
        <hero-image :content="content.sustainabilityOverview" />
        <section-overview :content="content.sustainabilityOverview" />
        <responsible :content="content.sustainabilityOverview" />
        <rating-recognition :content="content.sustainabilityOverview" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import SectionOverview from './components/SectionOverview.vue'
    import Responsible from './components/Responsible.vue'
    import RatingRecognition from './components/RatingRecognition.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getSustainabilityOverview()
    })

</script>
