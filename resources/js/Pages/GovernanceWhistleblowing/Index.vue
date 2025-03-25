<template>
    <app-layout>
        <Head title="Whistleblowing" />
        <form-section :content="content.governance" />



    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import FormSection from './components/FormSection.vue'

    import { onBeforeMount } from 'vue'
    import { useContentStore } from "@/Composables/useContentStore"

    const content = useContentStore()

    onBeforeMount(() => {
        content.getGovernance()
    })

</script>
