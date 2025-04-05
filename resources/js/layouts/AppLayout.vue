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
    <div class="w-full fixed bottom-5 left-0 z-[1000] flex justify-center flex-col items-center" x-data="{success: false, error: false}">
        <div
            class="alert bg-blue-base px-5 py-2 transition-all duration-75 rounded-md flex items-center gap-2 w-fit"
            id="alert-success-message"
            x-transition:enter="transition ease-out duration-300 transform origin-top"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300 transform origin-bottom"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            x-show="success"
        >
            <i class="isax icon-tick-circle text-white"></i>
            <span class="text-[11px] text-white">
            </span>
        </div>

        <div
            class="alert bg-red-6 px-5 py-2 transition-all duration-75 rounded-md flex items-center gap-2 w-fit"
            id="alert-error-message"
            x-transition:enter="transition ease-out duration-300 transform origin-top"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300 transform origin-bottom"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            x-show="error"
        >
            <i class="isax icon-info-circle text-white"></i>
            <span class="text-[11px] text-white">
            </span>
        </div>

        <a x-on:click="success=true" id="show-success-message" class="hidden"></a>
        <a x-on:click="success=false" id="hide-success-message" class="hidden"></a>
        <a x-on:click="error=true" id="show-error-message" class="hidden"></a>
        <a x-on:click="error=false" id="hide-error-message" class="hidden"></a>
    </div>
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
