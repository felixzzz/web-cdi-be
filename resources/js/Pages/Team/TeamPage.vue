<template>
    <app-layout>
        <Head :title="$t('head_title.about_us_team')" />

        <div
            class="relative overflow-hidden aspect-[4/3] lg:aspect-[16/7] w-full flex items-center bg-cover flex-col"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/about/team_background_hero.webp')})`
            }"
        >
            <!-- <div class="overlay-business-banner h-full w-full absolute left-0 right-0 top-0 bottom-0"></div> -->
            <div class="flex items-center bg-cover flex-col relative z-[1] h-full aspect-[4/3] lg:aspect-[16/7] py-[5%] lg:py-[8%]">
                <container>
                    <Link :href="route('about-us.management')" class="flex gap-2 items-center text-white">
                        <i class="isax icon-arrow-left text-2xl"></i>
                        {{ $t('Back') }}
                    </Link>
                </container>
                <container class="my-auto">
                    <div class="text-white grid lg:grid-cols-2 gap-2 items-center">
                        <div>
                            <h1 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium max-w-2xl" id="home_banner_title">
                                {{ data.name }}
                            </h1>
                            <p class="max-w-md text-lg lg:text-[28px] !text-neutral-4 mt-6 font-light">
                                {{ data.position }}
                            </p>
                        </div>
                        <div class="flex items-center gap-10">
                            <img :src="previewFile(data.image_hero)" alt="" class="absolute bottom-0 h-[80%]" v-if="data.image_hero">
                        </div>
                    </div>
                </container>
            </div>
        </div>

        <container class="my-16">
            <div class="content !text-neutral-9" v-html="data.description"></div>
        </container>
        <div class="bg-neutral-5 h-[1px] w-full"></div>
        <container class="my-16">
            <p class="text-neutral-8 text-lg lg:text-[28px] font-medium">{{ $t('Document') }}</p>
            <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-if="data.cv_file">
                <div>
                    <p class="text-neutral-13 mb-2 text-lg font-medium">CV - {{ data.name }}</p>

                    <div class="flex items-center text-base text-neutral-8 gap-3">
                        <div class="flex items-baseline gap-3">
                            <span>{{ data.cv_file?.size }}</span>
                            <span>.</span>
                        </div>
                        <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <a :href="previewFile(data.cv_file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View') }}
                    </a>
                    <a :href="downloadFile(data.cv_file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                    </a>
                </div>
            </div>

            <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-if="data.resume_file">
                <div>
                    <p class="text-neutral-13 mb-2 text-lg font-medium">Resume - {{ data.name }}</p>

                    <div class="flex items-center text-base text-neutral-8 gap-3">
                        <div class="flex items-baseline gap-3">
                            <span>{{ data.resume_file?.size }}</span>
                            <span>.</span>
                        </div>
                        <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <a :href="previewFile(data.resume_file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View') }}
                    </a>
                    <a :href="downloadFile(data.resume_file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                    </a>
                </div>
            </div>
        </container>

    </app-layout>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { asset, downloadFile, previewFile } from '@/Lib/utils'
    import { Team } from '@/types/utility'

    import { Head, Link } from '@inertiajs/vue3'

    defineProps<{
        data: Team
    }>()

</script>
