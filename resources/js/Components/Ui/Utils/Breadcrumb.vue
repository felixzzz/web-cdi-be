<template>
    <div class="flex gap-1 text-neutral-10 items-center">
        <Link :href="route" class="text-blue-base">
            {{ base }}
        </Link>
        <template v-for="(item, index) in links" :key="index">
            <i class="isax icon-arrow-right-3 text-lg"></i>
            <Link :href="item.route" class="text-blue-base">
                {{ item.title }}
            </Link>
        </template>
        <i class="isax icon-arrow-right-3 text-lg"></i>
        <span class="font-medium">{{ current }}</span>
    </div>

</template>

<script setup lang="ts">
    import { BreadcrumbLink } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'

    defineProps<{
        route: any;
        base: string;
        current: string;
        links?: BreadcrumbLink[]
    }>()

</script>
