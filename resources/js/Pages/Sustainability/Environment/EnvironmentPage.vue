<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_environment')" />
        <hero-image :content="content.sustainabilityEnvironment" />
        <section-overview :content="content.sustainabilityEnvironment" />
        <sustainability-tab :tabs="tab.environment" v-if="tab.environment" />
        <sustainability-content :items="data.environment" v-if="data.environment?.length" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import SectionOverview from './components/SectionOverview.vue'
    import SustainabilityContent from '@/Components/Ui/Sustainability/SustainabilityContent.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"
    import { useSustainabilityTabStore } from '@/Composables/useSustainabilityTabStore'
    import SustainabilityTab from '@/Components/Ui/Sustainability/SustainabilityTab.vue'
    import { useSustainabilityStore } from '@/Composables/useSustainabilityStore'

    const content = useContentStore()
    const tab = useSustainabilityTabStore()
    const data = useSustainabilityStore()

    onBeforeMount(() => {
        content.getSustainabilityEnvironment()
        tab.getEnvironment()
        data.getEnvironment()
    })

</script>
