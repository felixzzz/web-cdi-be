<template>
    <div class="flex items-center gap-2 mt-10 mb-6 overflow-y-auto">
        <a
            class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
            v-for="tab in tabs"
            :key="tab.id"
            :class="{
                'bg-blue-base text-white': tab.id == tabActive
            }"
        >
            {{ tab.name }}
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div v-for="(item, index) in items" :key="index">
            <news-card :item="item" :link="route('media.detail', { type: 'news', id: 'slug' })" />
        </div>
    </div>

</template>

<script setup lang="ts">
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News } from '@/types/utility'
    import { ref } from 'vue'
    const tabActive = ref('all')

    const tabs = ref([
        { id: 'all', name: 'All' },
        { id: 'corporate', name: 'Corporate' },
        { id: 'sustainability', name: 'Sustainability' },
        { id: 'awards', name: 'Awards' }
    ])

    const items = ref<News[]>([
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group Shares Insights on Energy Transition in Energy Sovereignty School 1'
        },
        {
            id: '2',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group and Yayasan Happy Hearts Indonesia Builds Eco Friendly Early Childhood Center 2'
        },
        {
            id: '3',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 3'
        },
        {
            id: '4',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 4'
        },
        {
            id: '5',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 5'
        },
    ])

</script>
