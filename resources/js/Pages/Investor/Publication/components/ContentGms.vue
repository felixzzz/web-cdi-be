<template>
    <div>
        <div class="grid lg:grid-cols-2 gap-2 pb-10 border-b border-b-neutral-5">
            <div>
                <p class="text-2xl lg:text-[28px] font-medium text-neutral-13">General Meeting of Shareholders</p>
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
                <p class="text-neutral-13 mb-2 text-lg font-medium">Abridged GMS</p>

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
    </div>

</template>

<script setup lang="ts">
    import { asset } from '@/Lib/utils'



</script>
