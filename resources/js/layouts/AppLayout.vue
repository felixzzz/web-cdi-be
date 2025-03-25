<template>
    <navigation-header
        :absolute="navAbsolute"
        :fixed="navFixed"
        :transparant="navTransparant"
        :sticky-scroll="navStickyScroll"
        :is-home="navIsHome"
        :sticky-blur="navStickyBlur"
    />
    <section class="min-h-[35vh]">
        <slot />
    </section>
    <quick-links v-if="showQuickLink" :type="quickLinkType" />
    <navigation-footer />
    <cookie-request
        v-if="
            !route().current('privacy-policy') &&
            !route().current('cookies-notice') &&
            !cookie.getCookie(cookie.applicationCookieConsent)
        "
        :applicationCookie="cookie.applicationCookie"
        @accept="cookie.accept"
        @decline="cookie.decline"
    />
</template>

<script lang="ts" setup>
    import NavigationHeader from '@/Components/Layout/NavigationHeader.vue'
    import NavigationFooter from '@/Components/Layout/NavigationFooter.vue'
    import QuickLinks from '@/Components/Layout/QuickLinks.vue'
    import CookieRequest from '@/Components/Layout/CookieRequest.vue'
    import useCookie from '@/Composables/useCookie'

    withDefaults(defineProps<{
        navFixed?: boolean;
        navAbsolute?: boolean;
        navTransparant?: boolean;
        navStickyScroll?: boolean;
        navIsHome?: boolean;
        showQuickLink?: boolean;
        quickLinkType?: string;
        navStickyBlur?: boolean;
    }>(), {
        navStickyScroll: true,
        showQuickLink: false
    })

    const cookie = useCookie()
</script>
