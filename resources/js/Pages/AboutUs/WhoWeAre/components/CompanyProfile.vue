<template>
    <div class="py-28 bg-neutral-3" id="company-profile">
        <container>
            <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-4 text-center">
                {{ content.about_us_company_profile?.title }}
            </h2>
            <div class="content primary !text-neutral-8 text-center mb-16" v-html="content.about_us_company_profile?.content"></div>

            <template v-for="(file, index) in data" :key="index">
                <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0">
                    <div>
                        <p class="text-neutral-13 mb-2 text-lg font-medium">{{ file.name }}</p>

                        <div class="flex items-center text-base text-neutral-8 gap-3">
                            <div class="flex items-baseline gap-3">
                                <span>{{ file.file.size }}</span>
                                <span>.</span>
                            </div>
                            <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                        </div>
                    </div>

                    <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                        <a :href="addFilePreview(file.type, file.unique_key)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View Guideline') }}
                        </a>
                        <a :href="addFileDownload(file.type, file.unique_key)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                        </a>
                    </div>
                </div>
            </template>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'

    import { AdditionalFile, PreferenceAboutOverview } from '@/types/utility'
    import { onMounted, ref } from 'vue'
    import useRequest from '@/Composables/useRequest'

    defineProps<{
        content: PreferenceAboutOverview
    }>()

    const data = ref<AdditionalFile[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.additional-file', 'company-profile'))
        .then((result) => {
            data.value = result.data
        })
    })


</script>
