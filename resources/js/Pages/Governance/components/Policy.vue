<template>
    <div
        class="bg-blue-dark-black py-20 text-white bg-contain bg-no-repeat bg-right relative" id="policy" v-if="content.governance_policy_show?.content_en == 'show'"
    >
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_policy?.title }}</p>
                    <div class="content" v-html="content.governance_policy?.content"></div>

                    <Link :href="route('governance.type', { type: 'policy' })" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                        See All <i class="isax icon-arrow-right-1 -rotate-45"></i>
                    </Link>
                </div>

                <div class="lg:col-span-2">
                    <div class="flex flex-col gap-8 my-8">
                        <div class="button-gradient-custom !flex-col !items-start" v-for="(file, index) in files" :key="index">
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
                                <a :href="addFilePreview(file.type, file.unique_key, 'default', file.name)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                    <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                                </a>
                                <a :href="addFileDownload(file.type, file.unique_key)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                    <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

    import { AdditionalFile, PreferenceGovernance } from '@/types/utility'
    import useRequest from '@/Composables/useRequest'
    import { onMounted, ref } from 'vue'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const files = ref<AdditionalFile[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.additional-file', 'policy'))
        .then((result) => {
            files.value = result.data
        })
    })

</script>
