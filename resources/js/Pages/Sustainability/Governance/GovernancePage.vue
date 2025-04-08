<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.sustainability_governance')" />
        <hero-image :content="content.sustainabilityGovernance" />
        <sustainability-tab :tabs="tab.governance" v-if="tab.governance" />
        <sustainability-content :items="data.governance" v-if="data.governance?.length" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
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
        content.getSustainabilityGovernance()
        tab.getGovernance()
        data.getGovernance()
    })

</script>
