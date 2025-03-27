<template>
    <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-5"
    >
        <div>
            <img
                :src="item.thumbnail" alt=""
                class="aspect-[9/10] object-cover rounded-xl border-2 border-blue-dark outline-2 outline-[#f8f192c4] bg-white"
            >
        </div>
        <div>
            <p class="text-sm text-neutral-6 mb-1">{{ item.date }}</p>
            <p class="text-2xl font-medium text-white mb-4">{{ item.name }}</p>
            <p class="text-sm mb-4 line-clamp-5 text-neutral-6">
                {{ item.short_content }}
            </p>

            <div class="text-blue-lighter flex items-center gap-2 cursor-pointer" @click="read">
                {{ $t('Read more') }}
                <i class="isax icon-arrow-right-3 text-2xl"></i>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { Certification } from '@/types/utility'
    const emits = defineEmits(["detail"])

    defineProps<{
        item: Certification
    }>()

    const read = () => {
        emits("detail")
    }

</script>
