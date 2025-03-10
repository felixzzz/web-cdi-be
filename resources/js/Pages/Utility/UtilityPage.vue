<template>
    <app-layout>
        <Head :title="title" />

        <container class="py-20">
            <h1 class="text-neutral-13 font-medium text-2xl lg:text-[28px] mb-5">{{ title }}</h1>
            <div class="content !text-neutral-13" v-html="content">

            </div>
        </container>



    </app-layout>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    defineProps<{
        type: string;
        title: string;
    }>()

    const content = ref('')

    onMounted(() => {

    })

</script>
