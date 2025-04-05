<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head :title="$t('head_title.investor_report')" />
        <hero-image :content="content.investor" />
        <description-report :content="content.investor" />
        <explanation :content="content.investor" />
        <supporting :content="content.investor" />
        <financial-calendar :content="content.investor" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'

    import { Head } from '@inertiajs/vue3'
    import DescriptionReport from './components/DescriptionReport.vue'
    import Supporting from './components/Supporting.vue'
    import Explanation from './components/Explanation.vue'
    import FinancialCalendar from './components/FinancialCalendar.vue'
    import { useContentStore } from '@/Composables/useContentStore'
    import { onBeforeMount } from 'vue'

    const content = useContentStore()

    onBeforeMount(() => {
        content.getInvestor()
    })
</script>
