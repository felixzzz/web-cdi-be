<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head :title="$t('head_title.investor_financial')" />
        <hero-image :content="content.investor" />
        <financial-calendar />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'

    import { Head } from '@inertiajs/vue3'
    import FinancialCalendar from './components/FinancialCalendar.vue'
    import { useContentStore } from '@/Composables/useContentStore'
    import { onBeforeMount } from 'vue'

    const content = useContentStore()

    onBeforeMount(() => {
        content.getInvestor()
    })

</script>
