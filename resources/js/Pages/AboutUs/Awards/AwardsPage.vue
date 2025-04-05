<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true" :show-quick-link="true" quick-link-type="about-us">
        <Head :title="$t('head_title.about_us_awards_certification')" />
        <hero-image :content="content.aboutAward" />
        <tab-menu :content="content.aboutAward" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import TabMenu from './components/TabMenu.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getAboutUsAward()
    })
</script>
