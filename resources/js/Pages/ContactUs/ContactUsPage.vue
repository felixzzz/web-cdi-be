<template>
    <app-layout>
        <Head title="Contact Us" />
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
