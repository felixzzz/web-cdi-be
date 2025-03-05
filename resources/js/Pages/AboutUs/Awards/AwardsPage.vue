<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true">
        <Head title="Awards & Certification" />
        <hero-image />
        <tab-menu />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import TabMenu from './components/TabMenu.vue'

</script>
