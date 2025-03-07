<template>
    <app-layout>
        <Head title="Media Detail" />
        <content-detail :type="type" />
        <related-post :type="type" />


    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import ContentDetail from './components/ContentDetail.vue'
    import RelatedPost from './components/RelatedPost.vue'

    defineProps<{
        type: string
    }>()

</script>
