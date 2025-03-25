<template>
    <app-layout :nav-absolute="true" :nav-transparant="true" :nav-sticky-scroll="false" :show-quick-link="true" quick-link-type="about-us">
        <Head title="Management and Organization Structure" />
        <hero-image :content="content.aboutManagement" />
        <quick-menu :content="content.aboutManagement" />
        <boards :content="content.aboutManagement" />
        <organization-structure :content="content.aboutManagement" />
        <corporate-structure :content="content.aboutManagement" />
        <guideline :content="content.aboutManagement" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import QuickMenu from './components/QuickMenu.vue'
    import Boards from './components/Boards.vue'
    import OrganizationStructure from './components/OrganizationStructure.vue'
    import CorporateStructure from './components/CorporateStructure.vue'
    import Guideline from './components/Guideline.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getAboutUsManagement()
    })

</script>
