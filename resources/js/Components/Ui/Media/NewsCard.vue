<template>
    <Link :href="link" class="flex bg-white rounded-xl shadow-article border border-neutral-5 overflow-hidden">
        <div class="flex flex-col text-neutral-13 group cursor-pointer">
            <div class="w-full aspect-square overflow-hidden">
                <div
                    class="w-full aspect-square bg-cover bg-center transition-transform duration-300 ease-in-out group-hover:scale-150"
                    :style="{ backgroundImage: `url(${item.image})` }"
                ></div>
            </div>
            <div class="p-6">
                <span class="bg-neutral-5 px-3 py-1 me-4 text-sm rounded-full" v-if="item.category">
                    {{ item.category }}
                </span>
                <span class="text-sm text-neutral-10">
                    {{ item.date }}
                </span>
                <h3 class="text-[22px] font-medium mt-4 mb-7 line-clamp-3">
                    {{ item.title }}
                </h3>
                <div class="text-blue-base flex items-center gap-2 cursor-pointer">
                    Read full article
                    <i class="isax icon-arrow-right-3 text-2xl"></i>
                </div>
            </div>
        </div>
    </Link>

</template>

<script setup lang="ts">
    import { News } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'

    defineProps<{
        item: News,
        link?: any
    }>()

</script>
