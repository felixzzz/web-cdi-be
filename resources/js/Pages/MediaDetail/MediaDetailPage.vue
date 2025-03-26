<template>
    <app-layout>
        <Head title="Media Detail" />
        <content-detail :type="type" :data="data" />
        <related-post :type="type" :data="data" />


    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import ContentDetail from './components/ContentDetail.vue'
    import RelatedPost from './components/RelatedPost.vue'
    import { News } from '@/types/utility'

    defineProps<{
        type: string,
        data: News
    }>()

</script>
