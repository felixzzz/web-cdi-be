<template>
    <div class="pt-20 pb-28 bg-blue-dark text-white">
        <container>
            <h1 class="mb-10 text-2xl lg:text-[38px] lg:leading-[44px] font-medium max-w-2xl mx-auto text-center">{{ content.home_discover_title?.title }}</h1>
        </container>
        <div class="grid grid-cols-2 lg:grid-cols-4">
            <div
                v-for="(tab, index) in tabs"
                class="relative aspect-[9/16] bg-cover bg-no-repeat text-white cursor-pointer"
                :key="index"
                :style="{ backgroundImage: `url(${tab.image})` }"
                x-data="{show_overlay: false}"
                x-on:mouseleave="show_overlay = false"
                x-on:mouseover="show_overlay = true"
                @click="resolveDirective(tab)"
            >
                <div class="absolute inset-0 overlay-card-1"></div>
                <div class="absolute inset-0 flex flex-col gap-4 p-5 lg:p-8 text-white z-10">
                    <h1 class="text-xl lg:text-[32px] font-medium">{{ tab.name }}</h1>
                    <div class="content !font-extralight text-shadow-1 !text-white" v-html="tab.description">
                    </div>
                    <i class="isax icon-arrow-right-2 -rotate-45 text-5xl font-light absolute bottom-8 right-8"></i>
                </div>
                <div
                    class="absolute inset-0 flex flex-col justify-center items-center p-4 z-[11] bg-black/64"
                    x-show="show_overlay"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { router, usePage } from '@inertiajs/vue3'
    import { ref, watch } from 'vue'
    const careerUrl = usePage().props.career_url

    import { PreferenceHome } from '@/types/utility'

    const props = defineProps<{
        content: PreferenceHome
    }>()

    const tabs = ref<any>([])


    const updateTabs = () => {
        tabs.value = [
            {
                name: props.content.home_discover_sustainability?.title,
                route: route('sustainability.overview'),
                description: props.content.home_discover_sustainability?.content,
                image: props.content.home_discover_sustainability?.file_url,
                external: false
            },
            {
                name: props.content.home_discover_our_business?.title,
                route: route('our-business.what-we-do'),
                description: props.content.home_discover_our_business?.content,
                image: props.content.home_discover_our_business?.file_url,
                external: false
            },
            {
                name: props.content.home_discover_investor?.title,
                route: route('investor.report'),
                description: props.content.home_discover_investor?.content,
                image: props.content.home_discover_investor?.file_url,
                external: false
            },
            {
                name: props.content.home_discover_career?.title,
                route: careerUrl,
                description: props.content.home_discover_career?.content,
                image: props.content.home_discover_career?.file_url,
                external: true
            }
        ]
    }
    updateTabs()

    watch(() => props.content, updateTabs, { deep: true })


    const resolveDirective = (data: any) => {
        if (data.external) {
            window.open(data.route, '_blank')
        } else {
            router.visit(data.route)
        }
    }
</script>
