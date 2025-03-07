<template>
    <container class="py-20 bg-white">
        <div class="grid grid-cols-3">
            <Link
                v-for="tab in tabs"
                :key="tab.id"
                :href="route('media.index', { type: tab.id })"
                class="border-b-2 border-b-neutral-6 text-neutral-13 text-lg text-center p-4 hover:border-b-blue-base hover:border-b-4 hover:font-medium transition"
                :class="{
                    'border-b-4 !border-b-blue-base font-medium': tabActive == tab.id
                }"
            >
                {{ tab.name }}
            </Link>
        </div>

        <content-news v-if="tabActive == 'news'" />
        <content-blog v-if="tabActive == 'blog'" />
        <content-press-release v-if="tabActive == 'press-release'"/>
    </container>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import ContentNews from './ContentNews.vue'
    import ContentBlog from './ContentBlog.vue'
    import ContentPressRelease from './ContentPressRelease.vue'

    const props = defineProps<{
        type: string
    }>()

    const tabActive = ref(props.type || 'news')


    const tabs = ref([
        {
            id: 'news',
            name: 'News'
        },
        {
            id: 'blog',
            name: 'Blog'
        },
        {
            id: 'press-release',
            name: 'Press Release'
        }
    ])

</script>
