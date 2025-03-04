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

    <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="(item, index) in items" :key="index" class="bg-white rounded-xl shadow-article border border-neutral-5 overflow-hidden">
            <div class="flex flex-col text-neutral-13 group cursor-pointer">
                <div class="w-full aspect-square overflow-hidden">
                    <div
                        class="w-full aspect-square bg-cover bg-center transition-transform duration-300 ease-in-out group-hover:scale-150"
                        :style="{ backgroundImage: `url(${item.image})` }"
                    ></div>
                </div>
                <div class="p-6">
                    <span class="bg-neutral-5 px-3 py-1 text-sm rounded-full">
                        {{ item.category }}
                    </span>
                    <span class="text-sm text-neutral-10 ms-4">
                        {{ item.date }}
                    </span>
                    <h3 class="text-[22px] font-medium mt-4 mb-7 line-clamp-3">
                        {{ item.title }}
                    </h3>
                    <Link href="" class="text-blue-base flex items-center gap-2">
                        Read full article
                        <i class="isax icon-arrow-right-3 text-2xl"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { ref } from 'vue'
    const tabActive = ref('all')

    const tabs = ref([
        { id: 'all', name: 'All' },
        { id: 'corporate', name: 'Corporate' },
        { id: 'sustainability', name: 'Sustainability' },
        { id: 'awards', name: 'Awards' }
    ])

    const items = ref([
        {
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group Shares Insights on Energy Transition in Energy Sovereignty School 1'
        },
        {
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Sustainability',
            date: '05-02-2025',
            title: 'Chandra Asri Group and Yayasan Happy Hearts Indonesia Builds Eco Friendly Early Childhood Center 2'
        },
        {
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 3'
        },
        {
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 4'
        },
        {
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            category: 'Awards',
            date: '05-02-2025',
            title: 'Chandra Asri Group Re-designated as a National Vital Object in the Industrial Sector 5'
        },
    ])

</script>
