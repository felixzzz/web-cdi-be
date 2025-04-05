<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true" quick-link-type="governance">
        <Head :title="$t('head_title.governance')" />
        <hero-image :content="content.governance" />
        <quick-menu :content="content.governance" />
        <corporate-secretary :content="content.governance" />
        <internal-audit-unit :content="content.governance" />
        <committee :content="content.governance" />
        <risk-management :content="content.governance" />
        <code-of-conduct :content="content.governance" />
        <policy :content="content.governance" />
        <whistleblowing :content="content.governance" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'

    import { Head } from '@inertiajs/vue3'
    import QuickMenu from './components/QuickMenu.vue'
    import CorporateSecretary from './components/CorporateSecretary.vue'
    import InternalAuditUnit from './components/InternalAuditUnit.vue'
    import Committee from './components/Committee.vue'
    import CodeOfConduct from './components/CodeOfConduct.vue'
    import RiskManagement from './components/RiskManagement.vue'
    import Policy from './components/Policy.vue'
    import Whistleblowing from './components/Whistleblowing.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getGovernance()
    })

</script>
