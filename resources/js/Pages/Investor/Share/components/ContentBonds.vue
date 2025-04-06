<template>
    <p class="mb-10 text-2xl lg:text-[28px] font-medium text-neutral-13">{{ content?.investor_share_bonds_table?.title }}</p>
    <div class="content mb-10 !text-neutral-8" v-html="content?.investor_share_bonds_table?.content"></div>
    <table-json :data="content?.investor_share_bonds_table" v-if="content?.investor_share_bonds_table" />

</template>

<script setup lang="ts">

    import TableJson from '@/Components/Ui/Utils/TableJson.vue'
    import { PreferenceInvestor } from '@/types/utility'

    defineProps<{
        content: PreferenceInvestor | null
    }>()

</script>
