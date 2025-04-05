<template>
    <div class="bg-neutral-2 py-20">
        <container>
            <div class="grid lg:grid-cols-3 gap-16">
                <div
                    class="lg:max-h-[675px] lg:max-w-[456px] h-full bg-cover rounded-xl flex flex-col p-6 justify-between bg-center max-lg:min-h-[456px]"
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

                    <form @submit.prevent="submit" class="flex flex-col gap-8">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('First Name') }} <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="first_name"
                                    :placeholder="$t('Input Your First Name')"
                                    class="input-custom"
                                    v-model="form.first_name"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('Last Name') }} <span class="text-red-6">*</span>
                                </label>
                                <input
                                    type="text" name="last_name"
                                    :placeholder="$t('Input Your Last Name')"
                                    class="input-custom"
                                    v-model="form.last_name"
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
                                    type="email" name="email"
                                    :placeholder="$t('Input Your Email')"
                                    class="input-custom"
                                    v-model="form.email"
                                    required
                                >
                            </div>

                            <div>
                                <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                    {{ $t('Country') }} <span class="text-red-6">*</span>
                                </label>
                                <select class="input-custom" required v-model="form.country_id" name="country_id">
                                    <option value="" selected disabled>{{ $t('Select Your Country') }}</option>
                                    <option :value="item.id" v-for="item in countries" :key="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                {{ $t('Topic') }} <span class="text-red-6">*</span>
                            </label>
                            <select class="input-custom" required v-model="form.topic_id" name="topic_id">
                                <option value="" selected disabled>{{ $t('Select Topic') }}</option>
                                <option :value="item.id" v-for="item in topics" :key="item.id">{{ item.name }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="" class="text-neutral-13 text-sm block mb-[6px]">
                                {{ $t('Add your questions') }} <span class="text-red-6">*</span>
                            </label>
                            <textarea v-model="form.message" name="message" id="message" class="input-custom !h-auto" :placeholder="$t('Write your comment or additional question here')" rows="8"></textarea>
                        </div>

                        <button
                            class="flex items-center gap-1 bg-blue-base px-6 py-2 rounded-full font-medium w-fit text-white cursor-pointer disabled:bg-neutral-7 disabled:cursor-not-allowed"
                            :disabled="
                                !form.first_name ||
                                !form.last_name ||
                                !form.email ||
                                !form.country_id ||
                                !form.topic_id ||
                                !form.message ||
                                form.processing
                            "
                        >
                            <loading-button v-if="form.processing" />
                            {{ $t('Submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import LoadingButton from '@/Components/Ui/Utils/LoadingButton.vue'
    import { useContentStore } from '@/Composables/useContentStore'
    import useRequest from '@/Composables/useRequest'
    import { asset, showAlert } from '@/Lib/utils'
    import { NameId } from '@/types/utility'
    import { useForm, usePage } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import { onBeforeMount } from 'vue'

    const data = ref({
        file_url: '',
        title: '',
        content: ''
    })

    const content = useContentStore()

    const countries = ref<NameId[]>([])
    const topics = ref<NameId[]>([])

    const form = useForm({
        first_name: '',
        last_name: '',
        email: '',
        country_id: '',
        topic_id: '',
        message: ''
    })

    const fetchCountries = () => {
        useRequest().get(route('api.utility.countries'))
        .then((result) => {
            countries.value = result.data
        })
    }

    const fetchTopics = () => {
        useRequest().get(route('api.utility.contact-us-topics'))
        .then((result) => {
            topics.value = result.data
        })
    }

    onBeforeMount(() => {
        useRequest().get(route('api.utility.additional-page', 'contact_us_main'))
        .then((result) => {
            data.value.file_url = result.data.file_url
            data.value.title = result.data.title
            data.value.content = result.data.content
        })

        fetchCountries()
        fetchTopics()

        content.getMainOffice()
    })

    const submit = () => {
        if (!form.processing) {
            form.post(route("contact-us.store"), {
                onSuccess: () => {
                    if (usePage().props.flash?.success) {
                        form.reset()
                        showAlert(usePage().props.flash?.success || '')
                    }

                    if (usePage().props.flash?.error) {
                        showAlert(usePage().props.flash?.error || '')
                    }
                }
            });
        }
    }

</script>
