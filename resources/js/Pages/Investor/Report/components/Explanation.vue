<template>
    <div class="mb-28">
        <container>
            <p class="text-end text-red-6 text-sm mb-2" v-if="content?.investor_report_table?.title">{{ content?.investor_report_table?.title }}</p>

            <table-json :data="content?.investor_report_table" v-if="content?.investor_report_table" />

            <div class="content mt-10 !text-neutral-8 primary" v-html="content?.investor_report_table?.content"></div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import TableJson from '@/Components/Ui/Utils/TableJson.vue'
    import { PreferenceInvestor } from '@/types/utility'
    defineProps<{
        content: PreferenceInvestor | null
    }>()


</script>
