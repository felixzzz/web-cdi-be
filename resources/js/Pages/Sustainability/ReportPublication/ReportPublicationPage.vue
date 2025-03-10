<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head title="Sustainability - Report & Publication" />
        <hero-image />
        <content-report-publication />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import ContentReportPublication from './components/ContentReportPublication.vue'

</script>
