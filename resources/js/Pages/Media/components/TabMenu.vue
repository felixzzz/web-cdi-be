<template>
    <container class="py-20 bg-white" id="content-media-section">
        <div class="grid" :class="gridClass">
            <template v-for="tab in tabs">
                <Link
                    :key="tab.id"
                    :href="route('media.index', { type: tab.id })"
                    class="border-b-2 border-b-neutral-6 text-neutral-13 text-lg text-center p-4 hover:border-b-blue-base hover:border-b-4 hover:font-medium transition"
                    :class="{
                        'border-b-4 !border-b-blue-base font-medium': tabActive == tab.id
                    }"
                    v-if="tab.show"
                >
                    {{ tab.name }}
                </Link>
            </template>
        </div>

        <content-news v-if="tabActive == 'news' && status.news == 'show'" />
        <content-blog v-if="tabActive == 'blog' && status.blog == 'show'" />
        <content-press-release v-if="tabActive == 'press-release' && status.press_release == 'show'"/>
    </container>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link } from '@inertiajs/vue3'
    import { computed, ref } from 'vue'
    import ContentNews from './ContentNews.vue'
    import ContentBlog from './ContentBlog.vue'
    import ContentPressRelease from './ContentPressRelease.vue'
    import { MediaStatus } from '@/types/utility'

    const props = defineProps<{
        type: string;
        status: MediaStatus;
    }>()

    const tabActive = ref(props.type || 'news')


    const tabs = ref([
        {
            id: 'news',
            name: 'News',
            show: props.status.news == 'show'
        },
        {
            id: 'blog',
            name: 'Blog',
            show: props.status.blog == 'show'
        },
        {
            id: 'press-release',
            name: 'Press Release',
            show: props.status.press_release == 'show'
        }
    ])

    const visibleTabCount = computed(() => {
        return tabs.value.filter(tab => tab.show).length
    })

    const gridClass = computed(() => {
        return `grid-cols-${visibleTabCount.value || 1}`
    })


</script>
