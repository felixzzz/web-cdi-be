<template>
    <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-5"
    >
        <div>
            <img
                :src="item.image" alt=""
                class="aspect-[9/10] object-cover rounded-xl border-2 border-blue-dark outline-2 outline-[#f8f192c4]"
            >
        </div>
        <div>
            <p class="text-sm text-blue-lighter">{{ item.date }}</p>
            <p class="text-2xl lg:text-[28px] font-medium text-white mb-4">{{ item.title }}</p>

            <div class="mb-4">
                <p class="font-medium">Categories</p>
                <p class="font-light">{{ item.categories }}</p>
            </div>

            <div class="">
                <p class="font-medium">Awarder</p>
                <p class="font-light">{{ item.awarder }}</p>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { Award } from '@/types/utility'

    defineProps<{
        item: Award
    }>()

</script>
