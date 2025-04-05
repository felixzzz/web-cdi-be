<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_governance')" />
        <hero-image />
        <sustainability-content type="governance" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import SustainabilityContent from '@/Components/Ui/Sustainability/SustainabilityContent.vue'

</script>
