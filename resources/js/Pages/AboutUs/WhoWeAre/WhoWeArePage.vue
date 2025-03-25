<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true" quick-link-type="about-us">
        <Head title="Management and Organization Structure" />
        <hero-image :content="content.aboutOverview" />
        <quick-menu :content="content.aboutOverview" />
        <company-overview :content="content.aboutOverview" />
        <mission-vision :content="content.aboutOverview" />
        <our-history :content="content.aboutOverview" />
        <milestone :content="content.aboutOverview" />
        <company-profile :content="content.aboutOverview" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import QuickMenu from './components/QuickMenu.vue'
    import HeroImage from './components/HeroImage.vue'
    import CompanyOverview from './components/CompanyOverview.vue'
    import OurHistory from './components/OurHistory.vue'
    import MissionVision from './components/MissionVision.vue'
    import Milestone from './components/Milestone.vue'
    import CompanyProfile from './components/CompanyProfile.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getAboutUsOverview()
    })

</script>
