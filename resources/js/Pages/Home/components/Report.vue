<template>
    <div class="py-20 bg-neutral-3" id="home_report">
        <container>
            <div class="flex lg:items-center justify-between mb-2 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-7 text-base mb-4">{{ $t('LATEST DOCUMENTS') }}</p>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-0">{{ $t('Financial Reports') }}</p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center mt-4 lg:mt-0">
                    <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap border border-blue-base flex items-center gap-2 text-blue-base">
                        {{ $t('Download All') }} <img :src="asset('assets/frontend/icons/ic_download.svg')" alt="">
                    </Link>
                    <Link :href="route('investor.financial-information')" class="px-6 py-2 rounded-full whitespace-nowrap border border-blue-base flex items-center gap-2 text-blue-base">
                        {{ $t('See All') }} <i class="isax icon-arrow-right-1"></i>
                    </Link>
                </div>
            </div>
            <div class="flex items-center gap-2 rounded-sm bg-light-blue-1 border border-light-blue-2 text-blue-base text-xs w-fit p-[6px]">
                <img :src="asset('assets/frontend/icons/ic_translate.svg')" alt="">
                <span>{{ $t('lang_document_alert') }}</span>
            </div>

            <section v-if="!loading">
                <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-for="(file, index) in files" :key="index">
                    <div>
                        <p class="text-neutral-13 mb-2 text-lg font-medium">{{ file.name }}</p>

                        <div class="flex items-center text-base text-neutral-8 gap-3">
                            <div class="flex items-baseline gap-3">
                                <span>{{ file.date }}</span>
                                <span>.</span>
                                <span>{{ file.file.size }}</span>
                                <span>.</span>
                            </div>
                            <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                        </div>
                    </div>

                    <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                        <a :href="addFilePreview('report', file.ulid, 'default', file.name_slug)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View Report') }}
                        </a>
                        <a :href="addFileDownload('report', file.ulid, 'default', file.name_slug)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                            <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                        </a>
                    </div>
                </div>
            </section>

            <section v-if="loading">
                <file-loading v-for="i in 2" :key="i" />
            </section>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import FileLoading from '@/Components/Ui/Utils/FileLoading.vue'
    import useRequest from '@/Composables/useRequest'
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'
    import { InvestorReport } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    const files = ref<InvestorReport[]>([])
    const loading = ref(false)

    onMounted(() => {
        loading.value = true
        useRequest().get(route('api.utility.latest-reports'))
        .then((result) => {
            files.value = result.data
        })
        .finally(() => loading.value = false)
    })
</script>
