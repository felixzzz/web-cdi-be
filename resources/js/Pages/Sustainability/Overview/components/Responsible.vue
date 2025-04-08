<template>
    <div class="text-white bg-blue-dark py-20">
        <container>
            <h2
                class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] pt-20 mb-4"
            >
                {{ content.sustainability_overview_policy_framework?.title }}
            </h2>
            <p class="content !text-neutral-6 max-lg:!text-sm mb-4" v-html="content.sustainability_overview_policy_framework?.content"></p>
            <a :href="downloadFile(content.sustainability_overview_policy_framework_file?.file_url)" class="px-6 py-2 rounded-full whitespace-nowrap bg-blue-base flex items-center gap-2 text-white mt-2 w-fit" target="_blank">
                {{ content.sustainability_overview_policy_framework_file?.title }} <img :src="asset('assets/frontend/icons/ic_download_white.svg')" alt="">
            </a>
            <div class="mt-16 grid grid-cols-1 lg:grid-cols-5 gap-4" v-if="tabs.length">
                <div class="lg:col-span-2">
                    <div class="w-[398px] mx-auto relative">
                        <div class="absolute w-full z-[1]">
                            <img :src="asset('assets/frontend/icons/ic_arrow_roulette.svg')" alt="" class="mx-auto">
                        </div>
                        <img
                            :src="asset('assets/frontend/images/sustainability/spin_roulette.webp')" alt=""
                            class="w-[398px] mx-auto transition duration-500 ease-in-out"
                            :style="{ transform: `rotate(${tabs[selected].rotate}deg)` }"

                        >
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div class="flex items-center border-b-2 border-b-neutral-6">
                        <div
                            v-for="(text, index) in tabs"
                            :key="index"
                            class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center"
                            :class="{
                                'active': selected == index
                            }"
                            @click="changeText(index)"
                        >
                            {{ text.key }}
                        </div>
                    </div>

                    <div class="my-8">
                        <div
                            v-for="(text, index) in tabs"
                            :key="index"
                            class="button-gradient-custom !gap-4 !flex-col !items-start"
                            v-show="selected == index"
                        >
                            <p class="font-medium text-[22px]">{{ text.title }}</p>
                            <p class="content !text-neutral-6 max-lg:!text-sm" v-html="text.description"></p>
                            <div class="flex gap-2 items-center " v-for="(point, i) in text.points" :key="i">
                                <img :src="asset('assets/frontend/icons/ic_bold_duotone_check_circle.svg')" alt="">
                                <p class="text-blue-base max-lg:text-sm">{{ point }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import useRequest from '@/Composables/useRequest'
    import { asset, downloadFile } from '@/Lib/utils'
    import { PreferenceSustainabilityOverview, Responsible } from '@/types/utility'
    import { onBeforeMount, ref } from 'vue'

    defineProps<{
        content: PreferenceSustainabilityOverview
    }>()

    const selected = ref(0)

    const changeText = (id: number) => {
        selected.value = id
    }

    const tabs = ref<Responsible[]>([])

    const fetchResponsibles = () => {
        useRequest().get(route('api.sustainability.responsibles'))
        .then((result) => {
            tabs.value = result.data
        })
    }

    onBeforeMount(() => {
        fetchResponsibles()
    })

</script>
