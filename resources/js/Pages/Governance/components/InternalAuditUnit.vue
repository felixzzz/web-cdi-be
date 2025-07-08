<template>
    <div class="pt-16 pb-20 bg-blue-dark text-white" id="internal-audit-unit">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-2">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_internal_audit_unit?.title }}</p>
                    <div class="content" v-html="content.governance_internal_audit_unit?.content"></div>
                </div>

                <div class="lg:col-span-3">
                    <img :src="content.governance_internal_audit_unit?.file_url" alt="" class="w-full">
                </div>
            </div>

            <div class="mt-8 flex flex-col gap-8">
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
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'

    import { AdditionalFile, PreferenceGovernance } from '@/types/utility'
    import { onMounted, ref } from 'vue'
    import useRequest from '@/Composables/useRequest'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const files = ref<AdditionalFile[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.additional-file', 'internal_audit'))
        .then((result) => {
            files.value = result.data
        })
    })
</script>
