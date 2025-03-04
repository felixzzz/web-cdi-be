<template>
    <div class="py-20">
        <container>
            <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-3">Financial Calendar</p>

            <div class="flex items-center gap-2 rounded-sm bg-light-blue-1 border border-light-blue-2 text-blue-base text-xs w-fit p-[6px]">
                <img :src="asset('assets/frontend/icons/ic_translate.svg')" alt="">
                <span>Documents are available in both English and Bahasa Indonesia. Change the website language to view them in another language.</span>
            </div>

            <div class="gap-10 flex items-center overflow-y-auto mt-10 border-b-2 border-b-neutral-6">
                <div
                    v-for="year in years"
                    :key="year.id"
                    class="text-base font-normal text-neutral-8 py-3 border-b-2 border-b-transparent cursor-pointer"
                    :class="{
                        '!text-blue-base !border-b-blue-base': yearActive == year.id
                    }"
                >
                    {{ year.name }}
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
                    >
                        {{ type.name }}
                    </a>

                </div>

                <div>
                    <div class="w-full lg:w-[264px] rounded-full border border-neutral-7 px-4 py-2 flex items-center gap-1 lg:ms-auto">
                        <img :src="asset('assets/frontend/icons/ic_magnifyingglass.svg')" alt="">
                        <input type="text" name="" value=""
                            class="w-full placeholder:text-neutral-7 text-sm outline-none text-neutral-13"
                            placeholder="Search anything..."
                        >
                    </div>
                </div>
            </div>

            <div class="py-8 border-b border-b-neutral-5 flex lg:items-center justify-between flex-col lg:flex-row gap-y-2 lg:gap-y-0" v-for="i in 2" :key="i">
                <div>
                    <p class="text-neutral-13 mb-2 text-lg font-medium">CDI Consolidated Financial Report 3Q2024</p>

                    <div class="flex items-center text-base text-neutral-8 gap-3">
                        <div class="flex items-baseline gap-3">
                            <span>05 November 2024</span>
                            <span>.</span>
                            <span>7MB</span>
                            <span>.</span>
                        </div>
                        <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> View Report
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> Download-EN
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> Download-ID
                    </Link>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const yearActive = ref('all-years')
    const typeActive = ref('all-type')

    const years = ref([
        { id: 'all-years', name: 'All Years' },
        { id: '2024', name: '2024' },
        { id: '2023', name: '2023' },
        { id: '2022', name: '2022' },
        { id: '2021', name: '2021' },
        { id: '2020', name: '2020' },
        { id: '2019', name: '2019' },
        { id: '2018', name: '2018' }
    ])

    const types = ref([
        { id: 'all-type', name: 'All Type' },
        { id: 'anual-report', name: 'Anual Report' },
        { id: 'financial-report', name: 'Financial Report' },
    ])
</script>
