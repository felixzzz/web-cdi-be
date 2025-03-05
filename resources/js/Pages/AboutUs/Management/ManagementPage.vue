<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true">
        <Head title="Management and Organization Structure" />
        <hero-image />
        <quick-menu />
        <boards />
        <organization-structure />
        <corporate-structure />
        <guideline />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import QuickMenu from './components/QuickMenu.vue'
    import Boards from './components/Boards.vue'
    import OrganizationStructure from './components/OrganizationStructure.vue'
    import CorporateStructure from './components/CorporateStructure.vue'
    import Guideline from './components/Guideline.vue'

</script>
