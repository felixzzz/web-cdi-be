<template>
    <app-layout>
        <Head :title="$t('head_title.contact_us')" />
        <form-section />
        <offices-section />



    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import OfficesSection from './components/OfficesSection.vue'
    import FormSection from './components/FormSection.vue'

</script>
