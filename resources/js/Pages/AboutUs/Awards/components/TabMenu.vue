<template>
    <div class="py-20 bg-blue-dark">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
                <h2 class="text-awards">
                    We are proud to be recognized for our commitment
                </h2>
                <p class="text-neutral-4 text-base">
                    PT Chandra Daya Investasi Tbk (CDI) has been honored with some of Indonesia's and the reqion's most prestigious awards, recognizing our achievements in product quality, commitment to operational excellence, financial resilience and sustainability.
                </p>
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

    const tabActive = ref(getQueryParam('tab') || 'awards')

    const tabs = ref([
        { id: 'awards', name: 'Awards'},
        { id: 'certification', name: 'Certification'}
    ])

</script>
