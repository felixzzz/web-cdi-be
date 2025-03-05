<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head title="Investor Financial Information" />
        <hero-image />
        <tab-menu />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'

    import { Head } from '@inertiajs/vue3'
    import TabMenu from './components/TabMenu.vue'

</script>
