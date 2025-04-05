<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head :title="$t('head_title.investor_share')" />
        <hero-image :content="content.investor" />
        <tab-menu :content="content.investor" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'
    import TabMenu from './components/TabMenu.vue'

    import { Head } from '@inertiajs/vue3'
    import { useContentStore } from '@/Composables/useContentStore'
    import { onBeforeMount } from 'vue'

    const content = useContentStore()

    onBeforeMount(() => {
        content.getInvestor()
    })

</script>
