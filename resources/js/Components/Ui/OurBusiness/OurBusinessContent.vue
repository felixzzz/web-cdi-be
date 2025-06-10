<template>
    <div class="bg-blue-dark text-white">
        <container>
            <p
                class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center pt-20"
                v-if="content.heading_tab_title"
            >{{ content.heading_tab_title }}</p>

            <div class="pt-20" v-if="Array.isArray(content.tabs) && content.tabs?.length > 1">
                <div class="flex items-center gap-6 border-b-2 border-b-neutral-6 justify-between max-lg:flex-col">
                    <div
                        v-for="(tab, index) in content.tabs"
                        :key="index"
                        class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center"
                        :class="{
                            'active': tabActive == tab.ulid
                        }"
                        @click="changeTab(tab.ulid)"
                    >
                        {{ tab.title }}
                    </div>
                </div>
            </div>
        </container>
    </div>
    <div v-for="(item, index) in content.tabs" :key="index">
        <section v-show="item.ulid == tabActive">
            <div class="py-16 bg-blue-dark" v-if="item.sub_title">
                <container class="grid grid-cols-1 lg:grid-cols-3 gap-20 max-lg:gap-y-10">
                    <div v-if="item.image">
                        <img :src="item.image" alt="" class="w-full aspect-square rounded-[20px]">
                    </div>
                    <div :class="item.image ? 'lg:col-span-2' : 'lg:col-span-3'">
                        <p
                            class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-4 text-white"
                        >{{ item.sub_title }}</p>
                        <div class="content !text-neutral-5" v-html="cleanNbsp(item.description)"></div>
                    </div>
                </container>
            </div>
            <template v-for="(content, contentIndex) in item.contents" :key="contentIndex">
                <div class="py-10 bg-blue-dark" v-if="content.heading">
                    <container>
                        <p
                            v-if="content.heading"
                            class="font-medium text-2xl lg:text-[28px] mb-4 text-white"
                            :class="content.heading_position ? `text-${content.heading_position}` : ''"
                        >{{ content.heading }}</p>
                    </container>
                </div>
                <div
                    class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
                    :style="{
                        'backgroundImage': `url(${content.image})`
                    }"
                >
                    <div class="absolute inset-0 overlay-business"></div>
                    <container class="relative z-[1]">
                        <div
                            class="lg:max-w-[45%]"
                            :class="{
                                'me-auto': content.align == 'left',
                                'ms-auto': content.align == 'right',
                            }"
                        >
                            <p v-if="content.tagline" class="text-neutral-4 mb-4">{{ content.tagline }}</p>
                            <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">{{ content.title }}</p>
                            <div class="content !text-neutral-5" v-html="cleanNbsp(content.description)"></div>
                        </div>
                    </container>
                </div>
            </template>
        </section>
    </div>
    <div class="bg-blue-dark text-white py-20">
        <container>
            <a
                v-if="content.link_url"
                :href="content.link_url"
                class="bg-white text-neutral-13 px-3 py-1 lg:px-6 lg:py-2 border border-neutral-13 rounded-full whitespace-nowrap gap-4 flex items-center w-fit text-xs lg:text-base mx-auto"
                target="_blank"
            >
                {{ content.link_title ? content.link_title : $t('Learn More') }} <i class="isax icon-arrow-right-1"></i>
            </a>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { cleanNbsp, getQueryParam } from '@/Lib/utils'
    import { OurBusinessDetail } from '@/types/utility'
    import { ref, watch } from 'vue';

    const props = defineProps<{
        content: OurBusinessDetail
    }>()

    const tabActive = ref(getQueryParam('tab') || '')

    const changeTab = (id: string) => {
        tabActive.value = id
    }

    const updateTabs = () => {
        if (Array.isArray(props.content.tabs) && props.content.tabs?.length > 0) {
            tabActive.value = getQueryParam('tab') || props.content.tabs[0].ulid
        }
    }
    updateTabs()

    watch(() => props.content, updateTabs, { deep: true })

</script>
