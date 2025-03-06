<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head title="Our Business - Energy" />
        <hero-image />
        <overview />
        <content-energy />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import Overview from './components/Overview.vue'
    import ContentEnergy from './components/ContentEnergy.vue'

</script>
