<template>
    <div class="py-20 bg-blue-dark text-white" id="code-of-conduct">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-4">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_code_of_conduct?.title }}</p>
                    <div class="content" v-html="content.governance_code_of_conduct?.content"></div>
                </div>
            </div>

            <div class="flex flex-col gap-8 mt-8">
                <div class="button-gradient-custom" v-for="(file, index) in files" :key="index">
                    <div class="flex flex-col gap-2">
                        <p class="text-[22px] font-medium">{{ file.name }}</p>
                        <div class="flex items-center text-base text-white gap-3">
                            <div class="flex items-baseline gap-3">
                                <span>{{ file.file.size }}</span>
                                <span>.</span>
                            </div>
                            <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                        </div>
                    </div>

                    <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                        <a :href="addFilePreview(file.type, file.unique_key, 'default', file.name)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                        </a>
                        <a :href="addFileDownload(file.type, file.unique_key)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- <Link :href="route('governance.type', { type: 'code-of-conduct' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                {{ $t('See All') }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
            </Link> -->

            <div class="py-20" v-if="content.governance_she_regulation_show?.content_en == 'show'">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                    <div class="lg:col-span-4">
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_she_regulation?.title }}</p>
                        <div class="content" v-html="content.governance_she_regulation?.content"></div>
                    </div>
                </div>

                <div class="flex flex-col gap-8 mt-8">
                    <div class="button-gradient-custom" v-for="(file, index) in sheFiles" :key="index">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">{{ file.name }}</p>
                            <div class="flex items-center text-base text-white gap-3">
                                <div class="flex items-baseline gap-3">
                                    <span>{{ file.file.size }}</span>
                                    <span>.</span>
                                </div>
                                <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                            </div>
                        </div>

                        <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                            <a :href="addFilePreview(file.type, file.unique_key, 'default', file.name)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                            </a>
                            <a :href="addFileDownload(file.type, file.unique_key)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- <Link :href="route('governance.type', { type: 'she-regulation' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                    {{ $t("See All") }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
                </Link> -->
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'
    // import { Link } from '@inertiajs/vue3'

    import { AdditionalFile, PreferenceGovernance } from '@/types/utility'
    import { onMounted, ref } from 'vue'
    import useRequest from '@/Composables/useRequest'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const files = ref<AdditionalFile[]>([])
    const sheFiles = ref<AdditionalFile[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.additional-file', 'code_of_conduct'))
        .then((result) => {
            files.value = result.data
        })

        useRequest().get(route('api.utility.additional-file', 'she_regulation'))
        .then((result) => {
            sheFiles.value = result.data
        })
    })

</script>
