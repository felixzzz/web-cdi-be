<template>
    <navigation-header
        :fixed="navFixed"
        :transparant="navTransparant"
        :sticky-scroll="navStickyScroll"
        :is-home="navIsHome"
    />
    <slot />
    <quick-links v-if="showQuickLink" />
    <navigation-footer />
</template>

<script lang="ts" setup>
    import NavigationHeader from '@/Components/Layout/NavigationHeader.vue'
    import NavigationFooter from '@/Components/Layout/NavigationFooter.vue'
    import QuickLinks from '@/Components/Layout/QuickLinks.vue'

    withDefaults(defineProps<{
        navFixed?: boolean;
        navTransparant?: boolean;
        navStickyScroll?: boolean;
        navIsHome?: boolean;
        showQuickLink?: boolean
    }>(), {
        navStickyScroll: true,
        showQuickLink: false
    })
</script>
