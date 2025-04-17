<template>
    <div class="py-20">
        <container>
            <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-3">{{ $t('Financial Calendar') }}</p>

            <div class="flex items-center gap-2 rounded-sm bg-light-blue-1 border border-light-blue-2 text-blue-base text-xs w-fit p-[6px]">
                <img :src="asset('assets/frontend/icons/ic_translate.svg')" alt="">
                <span>{{ $t('lang_document_alert') }}</span>
            </div>

            <div class="gap-10 flex items-center overflow-y-auto mt-10 border-b-2 border-b-neutral-6">
                <div
                    class="text-base font-normal text-neutral-8 py-3 border-b-2 border-b-transparent cursor-pointer"
                    :class="{
                        '!text-blue-base !border-b-blue-base': yearActive == ''
                    }"
                    @click="filterYear('')"
                >
                    {{ $t('All Year') }}
                </div>
                <div
                    v-for="year in years"
                    :key="year"
                    class="text-base font-normal text-neutral-8 py-3 border-b-2 border-b-transparent cursor-pointer"
                    :class="{
                        '!text-blue-base !border-b-blue-base': yearActive == year
                    }"
                    @click="filterYear(year)"
                >
                    {{ year }}
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-2 my-10">
                <div class="flex items-center gap-2">
                    <a
                        class="text-xs lg:text-base cursor-pointer px-6 py-2 rounded-full whitespace-nowrap flex items-center gap-2 text-blue-base border border-blue-base hover:bg-blue-base hover:text-white transition"
                        v-for="type in types"
                        :key="type.id"
                        :class="{
                            'bg-blue-base text-white': type.id == typeActive
                        }"
                        @click="filterType(type.id)"
                    >
                        {{ type.name }}
                    </a>

                </div>

                <div>
                    <div class="w-full lg:w-[264px] rounded-full border border-neutral-7 px-4 py-2 flex items-center gap-1 lg:ms-auto">
                        <img :src="asset('assets/frontend/icons/ic_magnifyingglass.svg')" alt="">
                        <input type="text" v-model="search"
                            class="w-full placeholder:text-neutral-7 text-sm outline-none text-neutral-13"
                            :placeholder="$t('Search anything')"
                            @keyup.enter="goSearch"
                        >
                    </div>
                </div>
            </div>

            <section v-if="paginate.state.loading">
                <file-loading v-for="i in 2" :key="i" />
            </section>
            <section v-if="!paginate.state.loading">
                <div class="flex lg:gap-6 flex-col lg:flex-row" v-for="(year, i) in paginate.state.items" :key="i">
                    <div class="w-full">
                        <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-for="(item, index) in year.items" :key="index">
                            <div>
                                <p class="text-neutral-13 mb-2 text-lg font-medium">{{ item.name }}</p>

                                <div class="flex items-center text-base text-neutral-8 gap-3">
                                    <div class="flex items-baseline gap-3">
                                        <span>{{ item.date }}</span>
                                        <span>.</span>
                                        <span>{{ item.file?.size }}</span>
                                        <span>.</span>
                                    </div>
                                    <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                                </div>
                            </div>

                            <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                                <a :href="previewFile(item.file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                                    <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View Report') }}
                                </a>
                                <a :href="downloadFile(item.file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank" v-if="item.file_en">
                                    <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { asset, downloadFile, previewFile } from '@/Lib/utils'
    import { FinancialCalendarList } from '@/types/utility'
    import usePaginate from '@/Composables/usePaginate'
    import { getQueryParam, routeAppendParam } from '@/Lib/utils'

    import { onBeforeMount, ref } from 'vue'
    import useRequest from '@/Composables/useRequest'
    import FileLoading from '@/Components/Ui/Utils/FileLoading.vue'

    const yearActive = ref<number | string>(getQueryParam('year') ||'')
    const typeActive = ref(getQueryParam('type') || '')

    const years = ref<number[] | string[]>([])

    const types = ref([
        { id: '', name: $t('All Type') },
        { id: 'annual_report', name: $t('Annual Report') },
        { id: 'financial_report', name: $t('Financial Report') },
    ])

    const search = ref(getQueryParam('search') || '')

    const paginate = usePaginate<FinancialCalendarList>({
        route: route("api.investor.calendar.list"),
        scroll: 'content-media-section',
        params: {
            limit: 10
        }
    });

    onBeforeMount(() => {
        paginate.fetchData()

        useRequest().get(route('api.investor.calendar.years'))
        .then((result) => {
            years.value = result.data
        })
    })

    const goSearch = () => {
        routeAppendParam({
            search: search.value
        })
        paginate.fetchData()
    }


    const filterYear = (year: any) => {
        yearActive.value = year
        routeAppendParam({year: year})
        paginate.fetchData()
    }


    const filterType = (type: any) => {
        typeActive.value = type
        routeAppendParam({type: type})
        paginate.fetchData()
    }
</script>
