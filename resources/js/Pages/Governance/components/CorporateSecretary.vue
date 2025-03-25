<template>
    <div class="pt-20 bg-blue-dark text-white" id="corporate-secretary">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16">
                <div class="lg:col-span-2">
                    <img
                        :src="content.governance_corporate_secretary_team?.file_url" alt=""
                        class="aspect-square object-cover rounded-[20px] mb-6"
                    >
                    <p class="mb-1 font-medium text-lg lg:text-[22px]">
                        {{ content.governance_corporate_secretary_team?.title }}
                    </p>
                    <div class="content text-sm lg:text-base !font-light !text-white" v-html="content.governance_corporate_secretary_team?.content"></div>
                </div>

                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_corporate_secretary?.title }}</p>
                    <div class="content mb-8" v-html="content.governance_corporate_secretary?.content"></div>

                    <div class="button-gradient-custom">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">Read Our Article of Association</p>
                            <div class="flex items-center text-base text-white gap-3">
                                <div class="flex items-baseline gap-3">
                                    <span>7MB</span>
                                    <span>.</span>
                                </div>
                                <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                            </div>
                        </div>

                        <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                            <Link href="" class="flex items-center gap-2 text-white font-medium">
                                <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                            </Link>
                            <Link href="" class="flex items-center gap-2 text-white font-medium">
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

    import { PreferenceGovernance } from '@/types/utility'

    defineProps<{
        content: PreferenceGovernance
    }>()

</script>
