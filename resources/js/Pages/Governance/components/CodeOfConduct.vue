<template>
    <div class="py-20 bg-blue-dark text-white" id="code-of-conduct">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-4">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_code_of_conduct?.title }}</p>
                    <div class="content" v-html="content.governance_code_of_conduct?.content"></div>
                </div>
            </div>

            <div class="button-gradient-custom mt-8">
                <div class="flex flex-col gap-2">
                    <p class="text-[22px] font-medium">Our Code of Conduct</p>
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

            <Link :href="route('governance.type', { type: 'code-of-conduct' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                {{ $t('See All') }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
            </Link>

            <div class="py-20">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                    <div class="lg:col-span-4">
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_she_regulation?.title }}</p>
                        <div class="content" v-html="content.governance_she_regulation?.content"></div>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-8">
                    <div class="button-gradient-custom" v-for="i in 4" :key="i">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">
                                {{
                                    i == 1 ? 'SHE Regulation'
                                    : (
                                        i == 2 ? 'Life Saving Rules Procedure'
                                        : (
                                            i == 3 ? 'Life Saving Rules Violation Procedure'
                                            : 'SHEQEn Management Policy'
                                        )
                                    )
                                }}
                            </p>
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
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t("Download") }}
                            </Link>
                        </div>
                    </div>
                </div>

                <Link :href="route('governance.type', { type: 'she-regulation' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                    {{ $t("See All") }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
                </Link>
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
