<template>
    <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-5"
    >
        <div>
            <img
                :src="item.image" alt=""
                class="aspect-[9/10] object-cover rounded-xl border-2 border-blue-dark outline-2 outline-gold-1 bg-white cursor-pointer"
                @click="showImage"
            >
        </div>
        <div>
            <p class="text-sm text-neutral-6 mb-1">{{ item.year }}</p>
            <p class="text-2xl font-medium text-white mb-4">{{ item.name }}</p>

            <div class="mb-4 content !text-sm !leading-normal" v-html="item.content"></div>

            <div class="" v-if="item.awarder">
                <p class="text-sm font-medium mb-1">{{ $t('Awarder') }}</p>
                <p class="font-light text-neutral-6 text-sm">{{ item.awarder }}</p>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { Award } from '@/types/utility'
    const emits = defineEmits(["image"])

    defineProps<{
        item: Award
    }>()

    const showImage = () => {
        emits("image")
    }

</script>
