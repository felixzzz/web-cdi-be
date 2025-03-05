<template>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10">
        <div v-for="(item, index) in items" :key="index">
            <news-card :item="item" />
        </div>
    </div>

</template>

<script setup lang="ts">
    import NewsCard from '@/Components/Ui/Media/NewsCard.vue'
    import { News } from '@/types/utility'
    import { ref } from 'vue'

    const items = ref<News[]>([
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            date: '05-02-2025',
            title: 'Chandra Asri Group Shares Insights on Energy Transition in Energy Sovereignty School 1'
        },
        {
            id: '2',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            date: '05-02-2025',
            title: 'Chandra Asri Group and Yayasan Happy Hearts Indonesia Builds Eco Friendly Early Childhood Center 2'
        },
        {
            id: '3',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 3'
        },
        {
            id: '4',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 4'
        },
        {
            id: '5',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 5'
        },
    ])

</script>
