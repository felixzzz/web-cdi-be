<template>
    <div
        class="relative overflow-hidden aspect-[4/3] lg:aspect-video w-full py-[5%] lg:py-[8%] flex items-end bg-cover"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/sustainability/sustainability_social_hero_image.webp')})`
        }"
    >
        <div class="overlay-business-banner h-full w-full absolute left-0 right-0 top-0 bottom-0"></div>
        <container>
            <div class="text-white grid lg:grid-cols-2 gap-2 relative z-[1] items-end">
                <div>
                    <h1 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium max-w-2xl" id="home_banner_title">
                        Creating Meaningful Impact
                    </h1>
                    <h2 class="max-w-md text-xs lg:text-base mt-6 text-neutral-4">
                        As part of our Sustainability Framework, our approach to Social initiatives focuses on creating a positive impact on the communities where we operate, nurturing an inclusive workplace, and championing social causes that contribute to the well-being of society. We foster innovation programs which bring broad benefits for society while also reinforcing our foundation for human rights ratification.
                    </h2>
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
