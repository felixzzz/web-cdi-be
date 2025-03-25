<template>
    <div class="py-28 bg-neutral-3" id="guidelines-of-work">
        <container>
            <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-4 text-center">
                {{ content.about_us_guideline?.title }}
            </h2>
            <div class="content !text-neutral-8 text-center mb-16" v-html="content.about_us_guideline?.content"></div>

            <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0">
                <div>
                    <p class="text-neutral-13 mb-1 text-lg font-medium">Guidelines of Work for The BOD and BOC</p>
                    <p class="text-neutral-8 mb-2 text-base">The prevailing laws and regulations</p>
                    <div class="flex items-center text-base text-neutral-8 gap-3">
                        <div class="flex items-baseline gap-3">
                            <span>7MB</span>
                            <span>.</span>
                        </div>
                        <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View Guideline') }}
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                    </Link>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

    import { PreferenceAboutManagement } from '@/types/utility'

    defineProps<{
        content: PreferenceAboutManagement
    }>()


</script>
