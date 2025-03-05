<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true">
        <Head title="Management and Organization Structure" />
        <hero-image />
        <quick-menu />
        <company-overview />
        <our-history />
        <milestone />
        <company-profile />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import QuickMenu from './components/QuickMenu.vue'
    import HeroImage from './components/HeroImage.vue'
    import CompanyOverview from './components/CompanyOverview.vue'
    import OurHistory from './components/OurHistory.vue'
    import Milestone from './components/Milestone.vue'
    import CompanyProfile from './components/CompanyProfile.vue'

</script>
