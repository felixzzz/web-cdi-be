<template>
    <div class="relative overflow-hidden aspect-[4/3] lg:aspect-video w-full py-[5%] lg:py-[8%] flex items-end">
        <video
            class="absolute top-0 left-0 right-0 bottom-0 w-full"
            src="assets/frontend/videos/homepage.mp4" autoplay muted loop
        ></video>
        <div class="overlay-banner h-full w-full absolute left-0 right-0 top-0 bottom-0"></div>
        <container>
            <div class="text-white grid lg:grid-cols-2 gap-2 relative z-[1] items-end">
                <div>
                    <h1 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium lg:mb-6 max-w-2xl" id="home_banner_title">
                        Sustainable Infrastructure for a Better Tomorrow
                    </h1>
                    <h2 class="max-w-md text-xs lg:text-base">
                        We invest in projects that deliver long-term value for communities and the environment
                    </h2>
                </div>
                <div class="flex items-center gap-2">
                    <div class="h-[2px] w-full bg-neutral-6 hidden lg:block"></div>
                    <Link href="" class="bg-white text-neutral-13 px-3 py-1 lg:px-6 lg:py-2 border border-neutral-13 rounded-full whitespace-nowrap gap-4 flex items-center w-fit text-xs lg:text-base">
                        Learn More <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>
        </container>
    </div>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link } from '@inertiajs/vue3'

</script>
