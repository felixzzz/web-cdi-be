<template>
    <div class="px-6 py-2 rounded-full border border-white text-white flex items-center gap-2 w-fit mb-8">
        All Year
        <i class="isax icon-arrow-down-1"></i>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white">
        <award-card
            v-for="(item, i) in data" :key="i"
            :item="item"
        />
    </div>


</template>

<script setup lang="ts">
    import AwardCard from '@/Components/Ui/Award/AwardCard.vue'
    import { Award } from '@/types/utility'
    import { ref } from 'vue'

    const data = ref<Award[]>([
        {
            image: 'https://images.unsplash.com/photo-1578269174936-2709b6aeb913?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Best Corporate Transparency & Emission Reduction 2024',
            date: '15 Nov 2024',
            categories: 'Environment, Emission Reduction, Sustainable Practices',
            awarder: 'Bumi Global Carbon Foundation'
        },
        {
            image: 'https://images.unsplash.com/photo-1578269174936-2709b6aeb913?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            title: 'Best Corporate Transparency & Emission Reduction 2024',
            date: '15 Nov 2024',
            categories: 'Environment, Emission Reduction, Sustainable Practices',
            awarder: 'Bumi Global Carbon Foundation'
        }
    ])

</script>
