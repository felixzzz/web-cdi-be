<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_overview')" />
        <hero-image />
        <section-overview />
        <responsible />
        <rating-recognition />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import SectionOverview from './components/SectionOverview.vue'
    import Responsible from './components/Responsible.vue'
    import RatingRecognition from './components/RatingRecognition.vue'

</script>
