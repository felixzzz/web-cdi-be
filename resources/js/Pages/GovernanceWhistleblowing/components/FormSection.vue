<template>
    <div class="bg-neutral-2 pb-20 pt-11">
        <container>
            <breadcrumb :route="route('governance.index')" :base="$t('Governance')" :current="$t('Whistleblowing')" />
            <div class="grid lg:grid-cols-3 gap-16 mt-8">
                <div
                    class="lg:max-h-[675px] lg:max-w-[456px] h-full bg-cover rounded-xl flex flex-col p-6 justify-between bg-center"
                    :style="{ backgroundImage: `url(${content.governance_whistleblowing_detail?.file_url})` }"
                >
                    <p class="mb-0 text-[22px] font-medium text-white">{{ content.governance_whistleblowing_detail?.title }}</p>


                    <div class="rounded-xl border border-neutral-4 p-4 bg-white">
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
                <div class="lg:col-span-2">
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] mb-4">{{ content.governance_whistleblowing?.title }}</p>
                    <div class="content !text-neutral-13 !text-sm mb-8" v-html="content.governance_whistleblowing?.content"></div>

                    <div class="flex flex-col gap-8">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    First Name <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="" value=""
                                    placeholder="Input Your First Name"
                                    class="input-custom"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    Last Name <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="" value=""
                                    placeholder="Input Your Last Name"
                                    class="input-custom"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    Email <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="email" name="" value=""
                                    placeholder="Input Your Email"
                                    class="input-custom"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    Country <span class="text-red-6">*</span>
                                </label>
                                <select class="input-custom" required>
                                    <option value="" selected disabled>Select Your Country</option>
                                    <option value="" v-for="i in 3" :key="i">Option</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                Topic <span class="text-red-6">*</span>
                            </label>
                            <select class="input-custom" required>
                                <option value="" selected disabled>Select Topic</option>
                                <option value="" v-for="i in 3" :key="i">Option</option>
                            </select>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                Add your questions <span class="text-red-6">*</span>
                            </label>
                            <textarea name="" id="" class="input-custom !h-auto" placeholder="Write your comment or additional question here" rows="8"></textarea>
                        </div>

                        <div class="bg-blue-base px-6 py-2 rounded-full font-medium w-fit text-white">
                            Submit
                        </div>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import Breadcrumb from '@/Components/Ui/Utils/Breadcrumb.vue'
    import { asset } from '@/Lib/utils'

    import { PreferenceGovernance } from '@/types/utility'

    defineProps<{
        content: PreferenceGovernance
    }>()

</script>
