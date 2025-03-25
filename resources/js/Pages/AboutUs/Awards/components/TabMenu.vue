<template>
    <div class="py-20 bg-blue-dark">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
                <h2 class="text-awards">
                    {{ content.about_us_award_overview?.title }}
                </h2>
                <div class="content !text-neutral-4" v-html="content.about_us_award_overview?.content"></div>
            </div>

            <div class="flex items-center gap-6 border-b-2 border-b-neutral-6 mb-8">
                <Link
                    v-for="tab in tabs"
                    :href="route('about-us.awards', { tab: tab.id })"
                    :key="tab.id"
                    class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient-awards"
                    :class="{
                        'active': tabActive == tab.id
                    }"
                >
                    {{ tab.name }}
                </Link>
            </div>

            <content-awards v-if="tabActive == 'awards'" />
            <content-certification v-if="tabActive == 'certification'" />
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { getQueryParam } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    import ContentAwards from './ContentAwards.vue'
    import ContentCertification from './ContentCertification.vue'

    import { PreferenceAboutAward } from '@/types/utility'

    defineProps<{
        content: PreferenceAboutAward
    }>()

    const tabActive = ref(getQueryParam('tab') || 'awards')

    const tabs = ref([
        { id: 'awards', name: $t('Awards')},
        { id: 'certification', name: $t('Certification')}
    ])

</script>
