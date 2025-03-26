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


                    <div class="rounded-xl border border-neutral-4 p-4 bg-white" v-if="contentStore.office">
                        <div class="mb-1 flex flex-col gap-2">
                            <p class="text-[22px] text-blue-base font-medium">{{ contentStore.office.name }}</p>
                            <p class="text-base text-neutral-8 font-medium" v-if="contentStore.office.sub_title">{{ contentStore.office.sub_title }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-neutral-13 text-sm font-medium">{{ contentStore.office.localized_main.location_name }}</p>
                            <p class="text-neutral-8 text-sm">{{ contentStore.office.localized_main.address }}</p>

                            <div class="flex items-center gap-4 text-neutral-8">
                                <div class="flex items-center text-sm gap-2" v-if="contentStore.office.localized_main.phone">
                                    <img :src="asset('assets/frontend/icons/ic_phone.svg')" alt="">
                                    {{ contentStore.office.localized_main.phone }}
                                </div>

                                <div class="flex items-center text-sm gap-2" v-if="contentStore.office.localized_main.fax">
                                    <img :src="asset('assets/frontend/icons/ic_printer.svg')" alt="">
                                    {{ contentStore.office.localized_main.fax }}
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
                                    {{ $t('First Name') }} <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="" value=""
                                    :placeholder="$t('Input Your First Name')"
                                    class="input-custom"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('Last Name') }} <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="" value=""
                                    :placeholder="$t('Input Your Last Name')"
                                    class="input-custom"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('Email') }} <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="email" name="" value=""
                                    :placeholder="$t('Input Your Email')"
                                    class="input-custom"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('Country') }} <span class="text-red-6">*</span>
                                </label>
                                <select class="input-custom" required>
                                    <option value="" selected disabled>{{ $t('Select Your Country') }}</option>
                                    <option value="" v-for="i in 3" :key="i">Option</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                {{ $t('Topic') }} <span class="text-red-6">*</span>
                            </label>
                            <select class="input-custom" required>
                                <option value="" selected disabled>{{ $t('Select Topic') }}</option>
                                <option value="" v-for="i in 3" :key="i">Option</option>
                            </select>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                {{ $t('Add your questions') }} <span class="text-red-6">*</span>
                            </label>
                            <textarea name="" id="" class="input-custom !h-auto" :placeholder="$t('Write your comment or additional question here')" rows="8"></textarea>
                        </div>

                        <div class="bg-blue-base px-6 py-2 rounded-full font-medium w-fit text-white">
                            {{ $t('Submit') }}
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
    import { useContentStore } from '@/Composables/useContentStore'
    import { asset } from '@/Lib/utils'

    import { PreferenceGovernance } from '@/types/utility'
    import { onBeforeMount } from 'vue'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const contentStore = useContentStore()

    onBeforeMount(() => {
        contentStore.getMainOffice()
    })

</script>
