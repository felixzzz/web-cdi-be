<template>
    <div class="bg-neutral-3 py-20">
        <container>
            <p class="text-neutral-13 text-2xl lg:text-[38px] lg:leading-[44px] font-medium pb-8 w-full border-b border-b-neutral-6 mb-8">Other Company Addresses:</p>

            <div class="flex flex-col gap-10">
                <div
                    v-for="i in 5" :key="i"
                    class="flex gap-2"
                >
                    <p class="text-neutral-7/30 font-medium text-[52px]">{{ i }}</p>
                    <div class="rounded-xl border border-neutral-4 p-4 bg-white w-full">
                        <p class="mb-4 text-[22px] text-blue-base font-medium">PT Chandra Daya Investasi Tbk</p>
                        <div class="flex flex-col gap-2">
                            <p class="text-neutral-13 text-sm font-medium">Head Office</p>
                            <p class="text-neutral-8 text-sm">Wisma Barito Pacific Tower A, Lt. 7 Jl. Let. Jend. S. Parman Kav. 62-63, Jakarta 11410, Indonesia</p>

                            <div class="flex items-center gap-4 text-neutral-8">
                                <div class="flex items-center text-sm gap-2">
                                    <img :src="asset('assets/frontend/icons/ic_phone.svg')" alt="">
                                    (62-21) 530 7950
                                </div>

                                <div class="flex items-center text-sm gap-2">
                                    <img :src="asset('assets/frontend/icons/ic_printer.svg')" alt="">
                                    (62-21) 530 7950
                                </div>
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
    import { asset } from '@/Lib/utils'

</script>
