<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.business_overview')" />
        <hero-image :content="content.ourBusiness" />
        <business :content="content.ourBusiness" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import Business from './components/Business.vue'


    import { useContentStore } from "@/Composables/useContentStore"
    import { onBeforeMount } from 'vue'

    const content = useContentStore()

    onBeforeMount(() => {
        content.getOurBusiness()
    })

</script>
