<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_social')" />
        <hero-image />
        <section-overview />
        <content-tab-social />
        <sustainability-content type="social" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import SectionOverview from './components/SectionOverview.vue'
    import ContentTabSocial from './components/ContentTabSocial.vue'
    import SustainabilityContent from '@/Components/Ui/Sustainability/SustainabilityContent.vue'

</script>
