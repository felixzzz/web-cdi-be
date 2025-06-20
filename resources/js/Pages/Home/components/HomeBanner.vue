<template>
    <div class="relative overflow-hidden aspect-[4/3] lg:aspect-video w-full py-[5%] lg:py-[8%] flex items-end">
        <video
            class="absolute top-0 left-0 right-0 bottom-0 w-full aspect-[4/3] lg:aspect-video object-cover"
            :src="content.home_banner?.file_url+'.home.mp4'" autoplay muted loop playsinline
        ></video>
        <div class="overlay-banner h-full w-full absolute left-0 right-0 top-0 bottom-0"></div>
        <container>
            <div class="text-white grid lg:grid-cols-2 gap-2 relative z-[1] items-end">
                <div>
                    <h1 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium lg:mb-6 max-w-2xl" id="home_banner_title">
                        {{ content.home_banner?.title }}
                    </h1>
                    <h2 class="max-w-md text-xs lg:text-base !text-neutral-4" v-html="content.home_banner?.content"></h2>
                </div>
                <div class="flex items-center gap-2">
                    <linear-animation />
                    <a
                        href="javascript:;" class="bg-white text-neutral-13 px-3 py-1 lg:px-6 lg:py-2 border border-neutral-13 rounded-full whitespace-nowrap gap-4 flex items-center w-fit text-xs lg:text-base"
                        @click="scrollToElement('#about-us-home')"
                    >
                        {{ $t('Learn More') }} <i class="isax icon-arrow-right-1"></i>
                    </a>
                </div>
            </div>
        </container>
    </div>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import LinearAnimation from '@/Components/Ui/Utils/LinearAnimation.vue'
    import { scrollToElement } from '@/Lib/utils'
    import { PreferenceHome } from '@/types/utility'

    defineProps<{
        content: PreferenceHome
    }>()

</script>
