<template>
    <div class="py-20 bg-blue-dark-black text-white" id="committee">
        <container>
            <div class="flex items-center gap-6 border-b-2 border-b-neutral-6">
                <div
                    v-for="tab in tabs"
                    :key="tab.id"
                    class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient"
                    :class="{
                        'active': tabActive == tab.id
                    }"
                    @click="changeTab(tab.id)"
                >
                    {{ tab.name }}
                </div>
            </div>

            <div v-show="tabActive == 'audit-committee'" class="py-8">
                <p class="font-medium text-[22px] mb-3" v-if="content.governance_audit_committe?.title">{{ content.governance_audit_committe?.title }}</p>
                <div class="content" v-html="content.governance_audit_committe?.content"></div>

                <div class="button-gradient-custom my-8">
                    <div class="flex flex-col gap-2">
                        <p class="text-[22px] font-medium">Audit Committee Charter</p>
                        <div class="flex items-center text-base text-white gap-3">
                            <div class="flex items-baseline gap-3">
                                <span>7MB</span>
                                <span>.</span>
                            </div>
                            <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                        </div>
                    </div>

                    <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                        <Link href="" class="flex items-center gap-2 text-white font-medium">
                            <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> View
                        </Link>
                        <Link href="" class="flex items-center gap-2 text-white font-medium">
                            <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> Download
                        </Link>
                    </div>
                </div>

                <p class="font-medium text-[22px] mb-3">{{ content.governance_audit_committe_member_text?.title }}</p>
                <div class="content text-neutral-6 mb-8" v-html="content.governance_audit_committe_member_text?.content"></div>

                <div class="flex gap-8">
                    <div class="flex flex-col items-center text-center w-[282px] group transition-all duration-300" v-for="(audit, i) in audits" :key="i">
                        <div class="flex flex-col items-center text-center">
                            <img :src="audit.image" alt="" class="aspect-square overflow-hidden rounded-full object-cover shadow-article mb-5 border-2 border-transparent outline-2 outline-transparent group-hover:outline-blue-lighter ">
                            <p class="text-lg font-medium group-hover:text-blue-lighter">{{ audit.name }}</p>
                            <p class="text-base font-normal text-neutral-6">{{ audit.position }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div v-show="tabActive == 'sustainability-committee'" class="py-8">
                <img :src="content.governance_sustainability_committe?.file_url" alt="" class="w-full rounded-3xl">

                <div class="button-gradient-custom mt-8">
                    <div class="flex flex-col gap-2">
                        <p class="text-[22px] font-medium">Sustainability Committee Charter</p>
                        <div class="flex items-center text-base text-white gap-3">
                            <div class="flex items-baseline gap-3">
                                <span>7MB</span>
                                <span>.</span>
                            </div>
                            <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                        </div>
                    </div>

                    <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                        <Link href="" class="flex items-center gap-2 text-white font-medium">
                            <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                        </Link>
                        <Link href="" class="flex items-center gap-2 text-white font-medium">
                            <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                        </Link>
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
    import { ref } from 'vue'

    import { PreferenceGovernance } from '@/types/utility'

    defineProps<{
        content: PreferenceGovernance
    }>()

    const tabActive = ref('audit-committee')

    const tabs = ref([
        { id: 'audit-committee', name: 'Audit Committee' },
        { id: 'sustainability-committee', name: 'Sustainability Committee' },
    ])

    const audits = ref([
        {
            image: asset('assets/frontend/images/governance/audit_1.webp'),
            name: 'Erwin Ciputra',
            position: 'Chairman and concurrently serving as Vice President Commissioner & Independent Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_2.webp'),
            name: 'Erwin Ciputra',
            position: 'Member'
        },
        {
            image: asset('assets/frontend/images/governance/audit_3.webp'),
            name: 'Erwin Ciputra',
            position: 'Member'
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
