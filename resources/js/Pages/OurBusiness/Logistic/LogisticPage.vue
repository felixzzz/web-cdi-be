<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head title="Our Business - Logistic" />
        <hero-image />
        <overview />
        <content-logistic />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import Overview from './components/Overview.vue'
    import ContentLogistic from './components/ContentLogistic.vue'

</script>
