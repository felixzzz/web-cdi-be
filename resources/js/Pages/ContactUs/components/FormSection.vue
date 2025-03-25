<template>
    <div class="bg-neutral-2 py-20">
        <container>
            <div class="grid lg:grid-cols-3 gap-16">
                <div
                    class="lg:max-h-[675px] lg:max-w-[456px] h-full bg-cover rounded-xl flex flex-col p-6 justify-between bg-center"
                    :style="{ backgroundImage: `url(${data.file_url})` }"
                >
                    <p class="mb-0 text-[22px] font-medium text-white">{{ data.content }}</p>

                    <div class="rounded-xl border border-neutral-4 p-4 bg-white" v-if="content.office">
                        <div class="mb-1 flex flex-col gap-2">
                            <p class="text-[22px] text-blue-base font-medium">{{ content.office.name }}</p>
                            <p class="text-base text-neutral-8 font-medium" v-if="content.office.sub_title">{{ content.office.sub_title }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-neutral-13 text-sm font-medium">{{ content.office.localized_main.location_name }}</p>
                            <p class="text-neutral-8 text-sm">{{ content.office.localized_main.address }}</p>

                            <div class="flex items-center gap-4 text-neutral-8">
                                <div class="flex items-center text-sm gap-2" v-if="content.office.localized_main.phone">
                                    <img :src="asset('assets/frontend/icons/ic_phone.svg')" alt="">
                                    {{ content.office.localized_main.phone }}
                                </div>

                                <div class="flex items-center text-sm gap-2" v-if="content.office.localized_main.fax">
                                    <img :src="asset('assets/frontend/icons/ic_printer.svg')" alt="">
                                    {{ content.office.localized_main.fax }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] mb-8">{{ data.title }}</p>

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
    import { useContentStore } from '@/Composables/useContentStore'
    import useRequest from '@/Composables/useRequest'
    import { asset } from '@/Lib/utils'
    import { ref } from 'vue'
    import { onBeforeMount } from 'vue'

    const data = ref({
        file_url: '',
        title: '',
        content: ''
    })

    const content = useContentStore()

    onBeforeMount(() => {
        useRequest().get(route('api.utility.additional-page', 'contact_us_main'))
        .then((result) => {
            data.value.file_url = result.data.file_url
            data.value.title = result.data.title
            data.value.content = result.data.content
        })

        content.getMainOffice()
    })

</script>
