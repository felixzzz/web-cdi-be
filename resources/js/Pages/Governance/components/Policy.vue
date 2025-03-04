<template>
    <div
        class="bg-blue-dark-black py-20 text-white bg-contain bg-no-repeat bg-right relative" id="policy"
    >
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">Policy</p>
                    <div class="content">
                        <p>Chandra Asri Group is committed to implementing the Chandra Asri Code of Ethics, as well as upholding and complying with relevant provisions that apply both domestically and internationally. This policy is supported by good business practices and ethical corporate governance to fulfil our obligations to shareholders and stakeholders and must be followed to by all Chandra Asri Group employees</p>
                    </div>

                    <Link href="" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                        See All <i class="isax icon-arrow-right-1 -rotate-45"></i>
                    </Link>
                </div>

                <div class="lg:col-span-2">
                    <div class="button-gradient-custom my-8 !flex-col !items-start">
                        <div class="flex flex-col gap-2 pb-2 border-b border-b-neutral-9 mb-2 w-full">
                            <p class="text-[22px] font-medium">CSR Program Policy</p>
                            <div class="flex items-center text-base text-white gap-3">
                                <div class="flex items-baseline gap-3">
                                    <span>7MB</span>
                                    <span>.</span>
                                </div>
                                <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                            </div>
                        </div>

                        <div class="flex items-center gap-8 w-full justify-center">
                            <Link href="" class="flex items-center gap-2 text-white font-medium">
                                <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> View
                            </Link>
                            <Link href="" class="flex items-center gap-2 text-white font-medium">
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> Download
                            </Link>
                        </div>
                    </div>
                </div>


            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

</script>
