<template>
    <div class="relative pt-20 bg-blue-dark text-white">
        <container>
            <h1 class="mb-20 text-2xl lg:text-[38px] lg:leading-[44px] font-medium max-w-2xl mx-auto text-center">{{ content.home_infrastructure_title?.title }}</h1>
        </container>
        <!-- <div class="absolute z-[12] text-center w-full py-2 px-10 lg:py-8">
            <h1 class="
                text-white text-shadow-1
                text-base lg:text-[38px] lg:leading-[44px]
                font-normal lg:font-light max-w-2xl mx-auto"
            >
                {{ content.home_infrastructure_title?.title }}
            </h1>
        </div> -->
        <div class="grid grid-cols-2 lg:grid-cols-4">
            <div
                v-for="(tab, index) in tabs"
                class="relative aspect-[9/16] bg-cover bg-no-repeat text-white cursor-pointer"
                :key="index"
                :style="{ backgroundImage: `url(${tab.image})` }"
                x-data="{show_overlay: false}"
                x-on:mouseleave="show_overlay = false"
                x-on:mouseover="show_overlay = true"
            >
                <div class="absolute inset-0 overlay-card-1"></div>
                <div class="absolute inset-0 flex flex-col justify-between px-5 lg:px-10 pb-5 lg:pb-10 pt-[35%] text-white z-10">
                    <h1 class="text-2xl lg:text-[32px] xl:text-[40px] 2xl:text-[52px] 2xl:leading-[60px] font-medium text-shadow-1">{{ tab.name }}</h1>
                    <div class="content !font-normal text-shadow-1 !text-white" v-html="tab.description"></div>
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
                    <Link :href="tab.route" class="bg-white/16 text-white px-6 py-2 border border-white rounded-full whitespace-nowrap gap-3 flex items-center w-fit mt-10">
                        {{ $t('Learn More') }} <i class="isax icon-arrow-right-1 -rotate-45 text-xl"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
    import { ref, watch } from 'vue'

    import { PreferenceHome } from '@/types/utility'

    const props = defineProps<{
        content: PreferenceHome
    }>()

    const tabs = ref<any>([])

    const updateTabs = () => {
        tabs.value = [
            {
                name: props.content.home_infrastructure_energy?.title,
                route: route('our-business.energy'),
                description: props.content.home_infrastructure_energy?.content,
                image: props.content.home_infrastructure_energy?.file_url
            },
            {
                name: props.content.home_infrastructure_water?.title,
                route: route('our-business.water'),
                description: props.content.home_infrastructure_water?.content,
                image: props.content.home_infrastructure_water?.file_url
            },
            {
                name: props.content.home_infrastructure_port_storage?.title,
                route: route('our-business.ports-and-storage'),
                description: props.content.home_infrastructure_port_storage?.content,
                image: props.content.home_infrastructure_port_storage?.file_url
            },
            {
                name: props.content.home_infrastructure_logistic?.title,
                route: route('our-business.logistics'),
                description: props.content.home_infrastructure_logistic?.content,
                image: props.content.home_infrastructure_logistic?.file_url
            }
        ]
    }
    updateTabs()

    watch(() => props.content, updateTabs, { deep: true })


</script>
