<template>
    <app-layout :nav-transparant="true" :nav-fixed="true">
        <Head :title="$t('head_title.media')" />
        <hero-image />
        <tab-menu :type="type" :status="status" />


    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import TabMenu from './components/TabMenu.vue'
    import { MediaStatus } from '@/types/utility'

    defineProps<{
        type: string;
        status: MediaStatus;
    }>()

</script>
