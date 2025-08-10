<template>
    <div class="flex aspect-video">
        <div
            v-for="(item, index) in data" :key="index"
            class="relative w-[25%] bg-cover bg-center bg-no-repeat text-white cursor-pointer transition-all duration-1000 ease-in-out flex-grow"
            :style="{ backgroundImage: `url(${item.image})` }"
            @mouseover="hoverIndex = index"
            @mouseleave="hoverIndex = null"
            :class="{
                'w-[40%]': hoverIndex === index, 'w-[calc((100%-40%)/(data.length-1))]': hoverIndex !== null && hoverIndex !== index
            }"
            @click="redirect(item, false)"
        >
            <div class="absolute inset-0 overlay-card-2"></div>
            <div class="absolute inset-0 flex flex-col justify-end px-5 lg:px-10 pb-5 lg:pb-10 pt-10 text-white z-10">
                <h1
                    :class="{
                        'font-medium text-2xl lg:text-[38px] lg:leading-[44px]': hoverIndex === index,
                        'font-medium text-2xl lg:text-[32px] 2xl:text-[40px] 3xl:text-[52px] 3xl:leading-[60px]': hoverIndex !== index,
                    }"
                >{{ item.title }}</h1>
                <div
                    class="overflow-hidden transition-all duration-[5000, 500] ease-in-out max-h-0"
                    :class="{ 'max-h-full opacity-100 mt-2': hoverIndex === index }"
                >
                    <div class="content !text-white !text-sm !font-light opacity-0 transition-all duration-2000 ease-in-out" :class="{ 'opacity-100': hoverIndex === index }" v-html="item.description"></div>
                    <div class="flex mt-8 gap-2">
                        <div
                            v-for="(tab, tabIndex) in item.tabs" :key="tabIndex"
                            class="px-[15px] py-[6px] rounded-full border border-white text-sm flex items-center gap-2 cursor-pointer"
                            @click.stop="redirect(item, true, tab.ulid)"
                            @click="redirect(item, true, tab.ulid)"
                        >
                            {{ tab.title }}
                            <i class="isax icon-arrow-right-1"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pt-16 pb-28 bg-blue-dark">
        <container>
            <div class="content !text-neutral-5" v-html="content.our_business_overview?.content"></div>
        </container>
    </div>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import useRequest from '@/Composables/useRequest'
    import { OurBusinessOverviewList, PreferenceOurBusiness } from '@/types/utility'
    import { router } from '@inertiajs/vue3'
    import { onBeforeMount } from 'vue'
    import { ref } from 'vue'

    defineProps<{
        content: PreferenceOurBusiness
    }>()

    const hoverIndex = ref<number | null>(null)


    const data = ref<OurBusinessOverviewList[]>([])

    const redirect = (item: any, child: boolean, tabName?: string) => {
        if (!child) {
            router.visit(item.route)
        } else {
            router.visit(item.route, {
                data: {
                    tab: tabName
                }
            })
        }
    }

    onBeforeMount(() => {
        useRequest().get(route('api.business.overview-list'))
        .then((result) => {
            data.value = result.data
        })
    })
</script>
