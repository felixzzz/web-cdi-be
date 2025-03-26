<!-- eslint-disable vue/require-v-for-key -->
<template>
    <section v-if="links.length" class="mt-5 py-10 flex w-full justify-between items-center gap-4 flex-col lg:flex-row">
        <p class="text-neutral-10 text-sm max-lg:hidden">
            {{ meta?.range }}
        </p>
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
        <div class="flex items-center gap-4 justify-between">
            <p class="text-neutral-10 text-sm min-lg:hidden">
            {{ meta?.range }}
            </p>
            <div class="flex items-center gap-4">
                <p class="text-neutral-10 text-sm">
                    {{ $t('Jump Page') }}
                </p>
                <input
                    v-model.number="jumpPage"
                    type="number"
                    min="1"
                    :max="meta?.last_page"
                    class="outline-none border border-neutral-5 w-10 h-7 rounded-sm text-center"
                    @input="validateJumpPage"
                    @keyup.enter="goToPage"
                >
                <p class="text-blue-base text-xs font-bold cursor-pointer" @click="goToPage">
                    {{ $t('Go') }}
                </p>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import { getQueryParam, routeAppendParam } from '@/Lib/utils';
import { PaginateLink, PaginationMeta } from '@/types/utility';
import { ref, watch } from 'vue';


const props = defineProps<{
    links: PaginateLink[];
    meta: PaginationMeta;
}>();

const emits = defineEmits(["fetch"]);
const jumpPage = ref<number | null>(null);


const changePage = (params?: any) => {
    routeAppendParam(params);
    emits("fetch");
};

const validateJumpPage = () => {
    if (jumpPage.value !== null) {
        if (jumpPage.value < 1) jumpPage.value = 1;
        if (props.meta?.last_page && jumpPage.value > props.meta?.last_page) jumpPage.value = props.meta?.last_page || 0;
    }
};

const goToPage = () => {
    validateJumpPage();
    if (jumpPage.value && jumpPage.value !== props.meta.current_page) {
        routeAppendParam({ page: jumpPage.value });
        emits("fetch");
    }
};

const updatePage = () => {
    jumpPage.value = parseInt(getQueryParam("page"))
}
updatePage()

watch(() => props.meta, updatePage, { deep: true })

</script>
