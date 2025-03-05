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
            <p class="text-2xl lg:text-[28px] font-medium text-white mb-4">{{ item.title }}</p>

            <div v-if="item.approvals.length">
                <p class="font-medium">Approval No</p>
                <ol class="ms-[18px] list-disc font-light">
                    <li v-for="approval in item.approvals" :key="approval">{{ approval }}</li>
                </ol>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { Certification } from '@/types/utility'

    defineProps<{
        item: Certification
    }>()

</script>
