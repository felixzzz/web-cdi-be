<template>
    <app-layout>
        <Head :title="title" />

        <container class="py-20">
            <h1 class="text-neutral-13 font-medium text-2xl lg:text-[28px] mb-5">{{ data.title }}</h1>
            <div class="content !text-neutral-13" v-html="data.content">

            </div>
        </container>



    </app-layout>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import useRequest from '@/Composables/useRequest'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    const props = defineProps<{
        type: string;
        title: string;
    }>()

    const data = ref({
        title: '',
        content: ''
    })

    onMounted(() => {
        useRequest().get(route('api.utility.additional-page', props.type))
        .then((result) => {
            data.value.title = result.data.title
            data.value.content = result.data.content
        })
    })

</script>
