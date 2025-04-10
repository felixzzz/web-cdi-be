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

            <div v-show="tabActive == 'audit-committee'" class="py-8" v-if="content.governance_audit_committe_show?.content_en == 'show'">
                <p class="font-medium text-[22px] mb-3" v-if="content.governance_audit_committe?.title">{{ content.governance_audit_committe?.title }}</p>
                <div class="content" v-html="content.governance_audit_committe?.content"></div>

                <div class="mt-8 flex flex-col gap-8 mb-6">
                    <div class="button-gradient-custom" v-for="(file, index) in auditFiles" :key="index">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">{{ file.name }}</p>
                            <div class="flex items-center text-base text-white gap-3">
                                <div class="flex items-baseline gap-3">
                                    <span>{{ file.file.size }}</span>
                                    <span>.</span>
                                </div>
                                <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                            </div>
                        </div>

                        <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                            <a :href="previewFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                            </a>
                            <a :href="downloadFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                            </a>
                        </div>
                    </div>
                </div>

                <p class="font-medium text-[22px] mb-3" v-if="content.governance_audit_committe_member_text_show?.content_en == 'show'">{{ content.governance_audit_committe_member_text?.title }}</p>
                <div class="content text-neutral-6 mb-8" v-if="content.governance_audit_committe_member_text_show?.content_en == 'show'" v-html="content.governance_audit_committe_member_text?.content"></div>

                <div class="flex gap-8" v-if="content.governance_audit_committe_member_text_show?.content_en == 'show'">
                    <div class="flex flex-col items-center text-center w-[282px] group transition-all duration-300" v-for="(audit, i) in audits" :key="i">
                        <div class="flex flex-col items-center text-center">
                            <img :src="previewFile(audit.image)" alt="" class="aspect-square overflow-hidden rounded-full object-cover shadow-article mb-5 border-2 border-transparent outline-2 outline-transparent group-hover:outline-blue-lighter ">
                            <p class="text-lg font-medium group-hover:text-blue-lighter">{{ audit.name }}</p>
                            <p class="text-base font-normal text-neutral-6">{{ audit.position }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div v-show="tabActive == 'sustainability-committee'" class="py-8" v-if="content.governance_sustainability_committe_show?.content_en == 'show'">
                <img :src="content.governance_sustainability_committe?.file_url" alt="" class="w-full rounded-3xl">
                <file-zoom :image="content.governance_sustainability_committe?.file_url" :title="$t('Sustainability Committee')" v-if="content.governance_sustainability_committe?.file_url" />

                <div class="mt-8 flex flex-col gap-8">
                    <div class="button-gradient-custom" v-for="(file, index) in sustainabilityFiles" :key="index">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">{{ file.name }}</p>
                            <div class="flex items-center text-base text-white gap-3">
                                <div class="flex items-baseline gap-3">
                                    <span>{{ file.file.size }}</span>
                                    <span>.</span>
                                </div>
                                <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                            </div>
                        </div>

                        <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                            <a :href="previewFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> {{ $t('View') }}
                            </a>
                            <a :href="downloadFile(file.file.path)" class="flex items-center gap-2 text-white font-medium" target="_blank">
                                <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> {{ $t('Download') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </container>

    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset, downloadFile, previewFile } from '@/Lib/utils'
    import { onMounted, ref } from 'vue'

    import { AdditionalFile, NameId, PreferenceGovernance, Team } from '@/types/utility'
    import useRequest from '@/Composables/useRequest'
    import FileZoom from '@/Components/Ui/Utils/FileZoom.vue'

    const props = defineProps<{
        content: PreferenceGovernance
    }>()

    const tabActive = ref(props.content.governance_audit_committe_show?.content_en != 'show' ? 'sustainability-committee' : 'audit-committee')

    const tabs = ref<NameId[]>([])

    const audits = ref<Team[]>([])
    const auditFiles = ref<AdditionalFile[]>([])
    const sustainabilityFiles = ref<AdditionalFile[]>([])

    const changeTab = (id: string) => {
        tabActive.value = id
    }


    onMounted(() => {

        if (props.content.governance_audit_committe_show?.content_en == 'show') {
            tabs.value.push(
                { id: 'audit-committee', name: $t('Audit Committee') },
            )
        }

        if (props.content.governance_sustainability_committe_show?.content_en == 'show') {
            tabs.value.push(
                { id: 'sustainability-committee', name: $t('Sustainability Committee') },
            )
        }


        useRequest().get(route('api.utility.teams', 'audit'))
        .then((result) => {
            audits.value = result.data
        })

        useRequest().get(route('api.utility.additional-file', 'audit_committe'))
        .then((result) => {
            auditFiles.value = result.data
        })

        useRequest().get(route('api.utility.additional-file', 'sustainability_committe'))
        .then((result) => {
            sustainabilityFiles.value = result.data
        })
    })

</script>
