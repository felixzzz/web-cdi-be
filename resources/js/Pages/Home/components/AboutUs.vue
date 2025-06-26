<template>
    <div
        class="pt-11 pb-11 lg:pb-[88px] lg:pt-28 bg-blue-dark relative overflow-hidden bg-cover bg-no-repeat"
        id="about-us-home"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/homepage/expanding_business.webp')})`
        }"
    >
        <container class="grid lg:grid-cols-2 gap-10 relative">
            <div>
                <h2 class="font-medium text-blue-lighter text-2xl lg:text-4xl xl:text-[52px] max-w-2xl">
                    {{ content.home_about_section?.title }}
                </h2>
                <Link :href="route('about-us.who-we-are')" class="bg-white text-blue-base px-6 py-2 border border-neutral-13 rounded-full whitespace-nowrap gap-3 flex items-center w-fit mt-10 text-xs lg:text-base">
                    {{ $t('About Us') }} <i class="isax icon-arrow-right-1 -rotate-45 text-xl"></i>
                </Link>
            </div>
            <div class="content !text-neutral-4" v-html="content.home_about_section?.content"></div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

    import { PreferenceHome } from '@/types/utility'

    defineProps<{
        content: PreferenceHome
    }>()

</script>
