<template>
    <app-layout :nav-fixed="true" :nav-is-home="true" :nav-transparant="true" :show-quick-link="true">
        <Head title="Home" />
        <home-banner />
        <about-us />
        <infrastructur />
        <discover />
        <journey />
        <report />
        <Article />

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

</script>
