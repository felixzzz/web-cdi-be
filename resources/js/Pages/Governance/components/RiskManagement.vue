<template>
    <div
        class="bg-gradient-dark-black py-20 text-white bg-contain bg-no-repeat bg-right relative" id="risk-management" v-if="content.governance_risk_management_show?.content_en == 'show'"
    >
        <div
            class="absolute top-0 left-0 right-0 bottom-0 bg-contain bg-no-repeat bg-right"
            :style="{
                'backgroundImage': `url(${content.governance_risk_management?.file_url})`
            }"
        >

        </div>
        <container class="relative z-[1]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-8">
                <div class="">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_risk_management?.title }}</p>
                    <div class="content" v-html="content.governance_risk_management?.content"></div>

                    <div class="flex flex-col gap-8 my-8">
                        <div class="button-gradient-custom !flex-col !items-start lg:w-9/12" v-for="(file, index) in files" :key="index">
                            <div class="flex flex-col gap-2 pb-2 border-b border-b-neutral-9 mb-2 w-full">
                                <p class="text-[22px] font-medium">{{ file.name }}</p>
                                <div class="flex items-center text-base text-white gap-3">
                                    <div class="flex items-baseline gap-3">
                                        <span>{{ file.file.size }}</span>
                                        <span>.</span>
                                    </div>
                                    <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                                </div>
                            </div>

                            <div class="flex items-center gap-8 w-full justify-center">
                                <a :href="previewFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                    <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                                </a>
                                <a :href="downloadFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                    <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <Link :href="route('governance.type', { type: 'risk-management' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit">
                        {{ $t('See All') }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
                    </Link>
                </div>


            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset, downloadFile, previewFile } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

    import { AdditionalFile, PreferenceGovernance } from '@/types/utility'
    import { ref } from 'vue'
    import useRequest from '@/Composables/useRequest'
    import { onMounted } from 'vue'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const files = ref<AdditionalFile[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.additional-file', 'risk_management'))
        .then((result) => {
            files.value = result.data
        })
    })

</script>
