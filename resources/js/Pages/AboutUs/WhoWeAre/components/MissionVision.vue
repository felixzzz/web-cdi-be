<template>
    <section id="mission-vision">
        <div class="py-28 bg-blue-dark text-white bg-cover relative">
            <container class="relative z-[1]">
                <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-16 text-center relative w-fit py-3 px-15 mx-auto">
                    <img :src="asset('assets/frontend/icons/ic_tagline_top_right.svg')" class="absolute top-0 right-0" />
                    <img :src="asset('assets/frontend/icons/ic_tagline_top_left.svg')" class="absolute top-0 left-0" />
                    <img :src="asset('assets/frontend/icons/ic_tagline_bottom_left.svg')" class="absolute bottom-0 left-0" />
                    <img :src="asset('assets/frontend/icons/ic_tagline_bottom_right.svg')" class="absolute bottom-0 right-0" />
                    {{ content.about_us_vision_mission_tagline?.title }}
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-5xl mx-auto">
                    <div class="rounded-3xl bg-journey-fade px-8 py-10 text-center flex flex-col justify-between">
                        <div>
                            <img :src="content.about_us_vision?.file_url" class="w-[200px] mx-auto" />
                            <div class="content !text-white !text-[22px] !font-medium pt-10 px-7" v-html="content.about_us_vision?.content"></div>
                        </div>
                        <div>
                            <div class="my-8 bg-neutral-5 h-[1px] w-full"></div>
                            <p class="text-neutral-2 font-light">{{ content.about_us_vision?.title }}</p>
                        </div>
                    </div>
                    <div class="rounded-3xl bg-journey-fade px-8 py-10 text-center flex flex-col justify-between">
                        <div>
                            <img :src="content.about_us_mission?.file_url" class="w-[200px] mx-auto" />
                            <div class="content !text-white !text-[22px] !font-medium pt-10 px-7" v-html="content.about_us_mission?.content"></div>
                        </div>
                        <div>
                            <div class="my-8 bg-neutral-5 h-[1px] w-full"></div>
                            <p class="text-neutral-2 font-light">{{ content.about_us_mission?.title }}</p>
                        </div>
                    </div>
                </div>
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { PreferenceAboutOverview } from '@/types/utility'
    import { asset } from '@/Lib/utils'

    defineProps<{
        content: PreferenceAboutOverview
    }>()

</script>
