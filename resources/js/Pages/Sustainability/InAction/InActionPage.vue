<template>
    <app-layout>
        <Head :title="$t('head_title.sustainability_in_action')" />
        <hero-image />
        <content-in-action />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import ContentInAction from './components/ContentInAction.vue'
</script>
