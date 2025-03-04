<template>
    <app-layout :nav-transparant="true" :nav-fixed="true">
        <Head title="Media" />
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
