<template>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">
        <div class="flex lg:flex-col lg:items-start w-full lg:border-t-2 border-t-neutral-4 max-lg:border-b-2 border-b-neutral-4">
            <Link
                v-for="tab in tabs"
                :key="tab.id"
                :href="route('governance.type', { type: tab.id })"
                class="border-b-2 border-b-neutral-4 text-neutral-13 text-lg text-center p-4
                        max-lg:hover:border-b-blue-base max-lg:hover:border-b-4 hover:font-bold transition
                        relative border-l-before-hover
                        lg:w-full lg:text-start
                        "
                :class="{
                    'max-lg:border-b-4 max-lg:!border-b-blue-base lg:font-bold border-l-before': tabActive == tab.id
                }"
            >
                {{ tab.name }}
            </Link>
        </div>

        <div class="lg:col-span-4">
            <slot />
        </div>
    </div>

</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const props = defineProps<{
        type: string;
    }>()

    const tabActive = ref(props.type || '')
    const tabs = ref([
        { id: 'policy', name: 'Policy' },
        { id: 'risk-management', name: 'Risk Management' },
        { id: 'code-of-conduct', name: 'Code of Conduct' },
        { id: 'she-regulation', name: 'SHE Regulation' },
    ])

</script>
