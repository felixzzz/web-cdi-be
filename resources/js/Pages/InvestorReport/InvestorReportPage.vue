<template>
    <app-layout :nav-fixed="true" :nav-transparant="true">
        <Head title="Investor Report" />
        <hero-image />
        <description-report />
        <explanation />
        <supporting />
        <financial-calendar />

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

</script>
