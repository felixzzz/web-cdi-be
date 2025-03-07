<template>
    <app-layout>
        <Head :title="title" />
        <content-type :title="title" :type="type" />



    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import ContentType from './components/ContentType.vue'

    defineProps<{
        title: string;
        type: string;
    }>()

</script>
