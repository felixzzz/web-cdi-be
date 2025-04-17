<template>
    <div
        class="bg-blue-dark py-20 text-white bg-contain bg-no-repeat bg-right relative" id="whistleblowing"
    >
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ content.governance_whistleblowing?.title }}</p>
                    <div class="content" v-html="content.governance_whistleblowing?.content"></div>

                    <Link :href="route('governance.whistleblowing')" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                        {{ $t('Submit Your Concerns') }} <i class="isax icon-arrow-right-1 -rotate-45"></i>
                    </Link>
                </div>

                <div class="lg:col-span-2">
                    <img :src="content.governance_whistleblowing?.file_url" alt="" v-if="currentLang == 'en'">
                    <img :src="content.governance_whistleblowing_id?.file_url" alt="" v-else>
                </div>


            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link, usePage } from '@inertiajs/vue3'

    import { PreferenceGovernance } from '@/types/utility'
    const currentLang = usePage().props.locale

    defineProps<{
        content: PreferenceGovernance
    }>()

</script>
