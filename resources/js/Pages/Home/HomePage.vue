<template>
    <app-layout :nav-fixed="true" :nav-is-home="true" :nav-transparant="true" :show-quick-link="true" quick-link-type="home">
        <Head title="Home" />
        <home-banner :content="content.home" />
        <about-us :content="content.home" />
        <infrastructur v-bind:content="content.home" />
        <discover v-bind:content="content.home" />
        <journey v-bind:content="content.home" />
        <report :content="content.home" />
        <Article :content="content.home" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import HomeBanner from './components/HomeBanner.vue'
    import AboutUs from './components/AboutUs.vue'
    import Infrastructur from './components/Infrastructur.vue'
    import Discover from './components/Discover.vue'
    import Journey from './components/Journey.vue'
    import Report from './components/Report.vue'
    import Article from './components/Article.vue'

    import { Head } from '@inertiajs/vue3'
    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getHome()
    })
</script>
