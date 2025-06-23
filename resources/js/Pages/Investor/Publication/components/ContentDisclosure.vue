<template>
    <div>
        <div class="grid lg:grid-cols-2 gap-2 pb-10 border-b border-b-neutral-5">
            <div>
                <p class="text-2xl lg:text-[28px] font-medium text-neutral-13">{{ $t('Information Disclosure') }}</p>
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
            <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-for="(item, i) in paginate.state.items" :key="i">
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
                    <a :href="addFilePreview('report', item.ulid, 'default', item.name_slug)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> {{ $t('View Report') }}
                    </a>
                    <a :href="addFileDownload('report', item.ulid, 'en', item.name_slug_en)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank" v-if="item.file_en">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download-EN') }}
                    </a>
                    <a :href="addFileDownload('report', item.ulid, 'en', item.name_slug_id)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank" v-if="item.file_id">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> {{ $t('Download-ID') }}
                    </a>
                </div>
            </div>
        </section>

        <pagination-link
            :links="paginate.state.links"
            :meta="paginate.state.meta"
            @fetch="changePage"
        />
    </div>

</template>

<script setup lang="ts">
    import { addFileDownload, addFilePreview, asset } from '@/Lib/utils'
    import { PressRelease } from '@/types/utility'
    import usePaginate from '@/Composables/usePaginate'
    import FileLoading from '@/Components/Ui/Utils/FileLoading.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import { getQueryParam, routeAppendParam } from '@/Lib/utils'

    import { onBeforeMount, ref } from 'vue'

    const search = ref(getQueryParam('search') || '')

    const paginate = usePaginate<PressRelease>({
        route: route("api.investor.disclosure.list"),
        scroll: 'content-media-section'
    });

    const changePage = () => {
        paginate.fetchData()
    }

    const goSearch = () => {
        routeAppendParam({
            search: search.value
        })
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()
    })

</script>
