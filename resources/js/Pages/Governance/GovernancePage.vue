<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true">
        <Head title="Governance" />
        <hero-image />
        <quick-menu />
        <corporate-security />
        <internal-audit-unit />
        <committee />
        <risk-management />
        <code-of-conduct />
        <policy />
        <whistleblowing />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HeroImage from './components/HeroImage.vue'

    import { Head } from '@inertiajs/vue3'
    import QuickMenu from './components/QuickMenu.vue'
    import CorporateSecurity from './components/CorporateSecurity.vue'
    import InternalAuditUnit from './components/InternalAuditUnit.vue'
    import Committee from './components/Committee.vue'
    import CodeOfConduct from './components/CodeOfConduct.vue'
    import RiskManagement from './components/RiskManagement.vue'
    import Policy from './components/Policy.vue'
    import Whistleblowing from './components/Whistleblowing.vue'

</script>
