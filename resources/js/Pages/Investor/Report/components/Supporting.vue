<template>
    <div class="bg-neutral-3 py-20">
        <container>
            <p class="text-neutral-13 text-2xl lg:text-[38px] lg:leading-[44px] font-medium pb-8 w-full border-b border-b-neutral-6 mb-8">Supporting Institutions & Professionals</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <template v-if="loading">
                    <div class="flex gap-2" v-for="i in 2" :key="i">
                        <office-loading />
                    </div>
                </template>
                <div
                    v-for="(office, index) in data" :key="index" v-else
                    class="flex gap-2"
                >
                    <p class="text-neutral-7/30 font-medium text-[52px]">{{ index + 1 }}</p>
                    <div class="rounded-xl border border-neutral-4 p-4 bg-white w-full">
                        <p class="mb-4 text-[22px] text-blue-base font-medium">{{ office.name }}</p>
                        <div class="flex flex-col gap-2">
                            <p class="text-neutral-13 text-sm font-medium">{{ office.localized_main.location_name }}</p>
                            <p class="text-neutral-8 text-sm">{{ office.localized_main.address }}</p>

                            <div class="flex items-center gap-4 text-neutral-8">
                                <div class="flex items-center text-sm gap-2" v-if="office.localized_main.phone">
                                    <img :src="asset('assets/frontend/icons/ic_phone.svg')" alt="">
                                    {{ office.localized_main.phone }}
                                </div>

                                <div class="flex items-center text-sm gap-2" v-if="office.localized_main.fax">
                                    <img :src="asset('assets/frontend/icons/ic_printer.svg')" alt="">
                                    {{ office.localized_main.fax }}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col mt-4" v-for="(branch, i) in office.localized_branches" :key="i">
                            <div class="flex flex-col gap-2">
                                <p class="text-neutral-13 text-sm font-medium">{{ branch.location_name }}</p>
                                <p class="text-neutral-8 text-sm">{{ branch.address }}</p>

                                <div class="flex items-center gap-4 text-neutral-8">
                                    <div class="flex items-center text-sm gap-2" v-if="branch.phone">
                                        <img :src="asset('assets/frontend/icons/ic_phone.svg')" alt="">
                                        {{ branch.phone }}
                                    </div>

                                    <div class="flex items-center text-sm gap-2" v-if="branch.fax">
                                        <img :src="asset('assets/frontend/icons/ic_printer.svg')" alt="">
                                        {{ branch.fax }}
                                    </div>
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
    import OfficeLoading from '@/Components/Ui/Utils/OfficeLoading.vue'
    import useRequest from '@/Composables/useRequest'
    import { asset } from '@/Lib/utils'
    import { Office } from '@/types/utility'
    import { onMounted, ref } from 'vue'

    const data = ref<Office[]>([])
    const loading = ref(true)

    onMounted(() => {
        useRequest().get(route("api.institutions.list"))
        .then((result) => {
            data.value = result.data
            loading.value = false
        })
    })

</script>
