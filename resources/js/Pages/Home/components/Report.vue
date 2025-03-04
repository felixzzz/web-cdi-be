<template>
    <div class="py-20 bg-neutral-3" id="home_report">
        <container>
            <div class="flex lg:items-center justify-between mb-2 flex-col lg:flex-row">
                <div>
                    <p class="text-neutral-7 text-base mb-4">LATEST DOCUMENTS</p>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] leading-[44px] mb-0">Financial Reports</p>
                </div>
                <div class="flex items-center gap-4 justify-start lg:justify-center mt-4 lg:mt-0">
                    <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap border border-blue-base flex items-center gap-2 text-blue-base">
                        Download All <img src="/assets/frontend/icons/ic_download.svg" alt="">
                    </Link>
                    <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap border border-blue-base flex items-center gap-2 text-blue-base">
                        See All <i class="isax icon-arrow-right-1"></i>
                    </Link>
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
                        <img src="/assets/frontend/icons/ic_filepdf.svg" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <Link href="" class="flex items-center gap-2 text-blue-base">
                        <img src="/assets/frontend/icons/ic_eye.svg" alt=""> View Report
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-blue-base">
                        <img src="/assets/frontend/icons/ic_download_file.svg" alt=""> Download
                    </Link>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link } from '@inertiajs/vue3'
</script>
