<template>
    <div
        class="relative overflow-hidden aspect-[4/3] lg:aspect-video w-full py-[5%] lg:py-[8%] flex items-end bg-cover"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/our_business_water_hero_image.webp')})`
        }"
    >
        <div class="overlay-business-banner h-full w-full absolute left-0 right-0 top-0 bottom-0"></div>
        <container>
            <div class="text-white grid lg:grid-cols-2 gap-2 relative z-[1] items-end">
                <div>
                    <h1 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium max-w-2xl" id="home_banner_title">
                        WATER
                    </h1>
                    <!-- <h2 class="max-w-md text-xs lg:text-base mt-6 text-neutral-4">

                    </h2> -->
                </div>
                <div class="flex items-center gap-10">
                    <linear-animation />
                    <img :src="asset('assets/frontend/icons/ic_hero_circle_arrow_down.svg')" alt="">
                </div>
            </div>
        </container>
    </div>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import LinearAnimation from '@/Components/Ui/Utils/LinearAnimation.vue'
    import { asset } from '@/Lib/utils'

</script>
