<template>
    <div class="pb-28 pt-12">
        <container>
            <p class="capitalize text-neutral-7 mb-4">
                {{ type }}
            </p>
            <div class="flex lg:items-center justify-between mb-10 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px]">
                        Related posts
                    </p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center max-lg:mt-4">
                    <Link :href="route('media.index', { type })" class="py-2 rounded-full whitespace-nowrap  flex items-center gap-2 text-blue-base">
                        See All <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div v-for="(item, index) in items" :key="index">
                    <news-card :item="item" :link="route('media.detail', { type, id: 'slug' })" />
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News } from '@/types/utility'
    import { ref } from 'vue'

    const props = defineProps<{
        type: string
    }>()

    const items = ref<News[]>([
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: props.type == 'news' ? 'Sustainability' : '',
            date: '05-02-2025',
            title: 'Chandra Asri Group Shares Insights on Energy Transition in Energy Sovereignty School 1'
        },
        {
            id: '2',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: props.type == 'news' ? 'Sustainability' : '',
            date: '05-02-2025',
            title: 'Chandra Asri Group and Yayasan Happy Hearts Indonesia Builds Eco Friendly Early Childhood Center 2'
        },
        {
            id: '3',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: props.type == 'news' ? 'Awards' : '',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 3'
        }
    ])

</script>
