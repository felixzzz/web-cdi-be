<!-- eslint-disable vue/require-v-for-key -->
<template>
    <section v-if="links.length" class="mt-6">
        <ul class="flex items-center justify-center gap-2">
            <li v-for="link of links">
                <button
                    type="button"
                    class="text-[12px] text-neutral-13 rounded-md flex items-center justify-center min-w-[25px] h-[32px] cursor-pointer border border-neutral-4"
                    v-bind:class="{
                        'bg-blue-base text-white !border-blue-base': link.active,
                        'hover:bg-blue-base hover:text-white hover:border-blue-base': link.url,
                        '!cursor-not-allowed text-neutral-4': !link.url,
                    }"
                    :disabled="!link.url"
                    @click="changePage(link.params)"
                >
                    <span
                        v-if="link.label.toLowerCase().includes('previous')"
                        class="text-[15px] isax icon-arrow-left-2"
                        title="Previous"
                    >
                    </span>
                    <span
                        v-else-if="link.label.toLowerCase().includes('next')"
                        class="text-[15px] isax icon-arrow-right-3"
                        title="Next"
                    >
                    </span>
                    <span
                        v-else-if="link.label.toLowerCase().includes('first')"
                        class="px-2 flex items-center"
                        title="First Page"
                    >
                        <i class="text-[15px] isax icon-arrow-left-2"></i>
                        <i class="text-[15px] isax icon-arrow-left-2 ms-[-10px]"></i>
                    </span>
                    <span
                        v-else-if="link.label.toLowerCase().includes('last')"
                        class="px-2 flex items-center"
                        title="Last Page"
                    >
                        <i class="text-[15px] isax icon-arrow-right-3"></i>
                        <i class="text-[15px] isax icon-arrow-right-3 ms-[-10px]"></i>
                    </span>
                    <span v-else>
                        {{ link.label }}
                    </span>
                </button>
            </li>
        </ul>
    </section>
</template>
<script setup lang="ts">
import { routeAppendParam } from '@/Lib/utils';
import { PaginateLink } from '@/types/utility';


defineProps<{
    links: PaginateLink[];
}>();

const emits = defineEmits(["fetch"]);

const changePage = (params?: any) => {
    routeAppendParam(params);
    emits("fetch");
};
</script>
