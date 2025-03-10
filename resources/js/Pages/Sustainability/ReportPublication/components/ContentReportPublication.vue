<template>
    <div class="py-20" x-data="{popup: false}">
        <container>
            <div class="flex items-center gap-2 mb-6 overflow-y-auto">
                <Link
                    class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                    v-for="tab in tabs"
                    :key="tab.id"
                    :href="route('sustainability.report-and-publication', { tab: tab.id })"
                    :class="{
                        'bg-blue-base text-white': tab.id == tabActive
                    }"
                >
                    {{ tab.name }}
                </Link>
                <a
                    class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                >
                    All Year <i class="isax icon-arrow-down-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div v-for="(item, index) in items" :key="index" x-on:click="popup=true">
                    <sustainability-card :item="item" :type="tabActive" />
                </div>
            </div>

            <SustainabilityPopup :item="itemDetail" :type="tabActive" x-show="popup" />
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import SustainabilityCard from '@/Components/Ui/Sustainability/SustainabilityCard.vue'
    import SustainabilityPopup from '@/Components/Ui/Sustainability/SustainabilityPopup.vue'
    import { getQueryParam } from '@/Lib/utils'
    import { SustainabilityFile } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const tabActive = ref(getQueryParam('tab') || 'report')

    const itemDetail = ref(
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'The book "Implement Best Practices, Create a Sustainable Business" describes various internal initiatives and programs that have succeeded in bringing about change and become milestones in the Company\'s operations. This book gives readers an overview and insight into how Chandra Asri looks at every environmental, social and governance (ESG) opportunity and risk necessary for business and stakeholders, then adapts to them in operations to create a sustainable business. It is hoped that this book becomes a helpful reference for professionals working in industries similar to Chandra Asri and the broader community.'
        }
    )

    const tabs = ref([
        { id: 'report', name: 'Report' },
        { id: 'publication', name: 'Publication' }
    ])

    const items = ref<SustainabilityFile[]>([
        {
            id: '1',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'Chandra Daya Investasi Sustainability Report 2023',
            size: '8MB'
        },
        {
            id: '2',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'Chandra Daya Investasi Sustainability Report 2023',
            size: '8MB'
        },
        {
            id: '3',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'Chandra Daya Investasi Sustainability Report 2023',
            size: '8MB'
        },
        {
            id: '4',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'Chandra Daya Investasi Sustainability Report 2023',
            size: '8MB'
        },
        {
            id: '5',
            image: 'https://images.unsplash.com/photo-1620325867502-221cfb5faa5f?q=80&w=2057&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Chandra Asri Sustainability Report 2023',
            description: 'Chandra Daya Investasi Sustainability Report 2023',
            size: '8MB'
        },
    ])

</script>
