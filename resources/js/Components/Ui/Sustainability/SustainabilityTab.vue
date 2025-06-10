<template>
    <div v-if="tabs.length">
        <div class="bg-blue-dark text-white">
            <container>
                <div class="">
                    <div
                        class="flex items-stretch gap-6 border-b-2 border-b-neutral-6 justify-between max-lg:flex-col"
                    >
                        <div
                            v-for="(tab, index) in tabs"
                            :key="index"
                            class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center flex items-center justify-center !h-auto"
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
        <div v-for="(item, index) in tabs" :key="index">
            <section v-show="item.ulid == tabActive">
                <template v-for="(content, contentIndex) in item.contents" :key="contentIndex">
                    <div class="py-6 bg-blue-dark" v-if="content.heading">
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
                                <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">{{ content.title }}</p>
                                <div class="content !text-neutral-5" v-html="cleanNbsp(content.content)"></div>
                            </div>
                        </container>
                    </div>
                </template>
            </section>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { cleanNbsp } from '@/Lib/utils'
    import { SustainabilityTab } from '@/types/utility'
    import { ref } from 'vue'

    const props = defineProps<{
        tabs: SustainabilityTab[]
    }>()

    const tabActive = ref(props.tabs.length ? props.tabs[0].ulid : '')

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
