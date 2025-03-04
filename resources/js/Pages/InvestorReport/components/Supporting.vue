<template>
    <div class="bg-neutral-3 py-20">
        <container>
            <p class="text-neutral-13 text-2xl lg:text-[38px] lg:leading-[44px] font-medium pb-8 w-full border-b border-b-neutral-6 mb-8">Supporting Institutions & Professionals</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div
                    v-for="i in 4" :key="i"
                    class="flex gap-2"
                >
                    <p class="text-neutral-7/30 font-medium text-[52px]">{{ i }}</p>
                    <div class="rounded-xl border border-neutral-4 p-4 bg-white w-full">
                        <p class="mb-4 text-[22px] text-blue-base font-medium">Liana Ramon Xenia and Partners Registered Public Accountants</p>
                        <div class="flex flex-col gap-2">
                            <p class="text-neutral-13 text-sm font-medium">PUBLIC ACCOUNTING FIRM</p>
                            <p class="text-neutral-8 text-sm">(Member of Deloitte Touche Tohmatsu Limited) The Plaza Office Tower Lt. 32 Jl. M. H. Thamrin Kav. 28 – 30 Jakarta 10350</p>

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
