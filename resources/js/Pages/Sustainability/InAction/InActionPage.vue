<template>
    <app-layout>
        <Head :title="$t('head_title.sustainability_in_action')" />
        <hero-image :content="content.sustainabilityAction" />
        <content-in-action :content="content.sustainabilityAction" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import HeroImage from './components/HeroImage.vue'
    import ContentInAction from './components/ContentInAction.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getSustainabilityAction()
    })
</script>
