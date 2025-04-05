<template>
    <app-layout :nav-fixed="true" :nav-transparant="true" :nav-sticky-blur="true">
        <Head :title="$t('head_title.business_energy')" />
        <our-business-banner :content="content.energy" />
        <our-business-overview :content="content.energy" />
        <our-business-content :content="content.energy" v-if="content.energy" />

    </app-layout>
</template>

<script setup lang="ts">
    import AppLayout from '@/Layouts/AppLayout.vue'

    import { Head } from '@inertiajs/vue3'
    import { useBusinessStore } from '@/Composables/useBusinessStore'
    import { onBeforeMount } from 'vue'
    import OurBusinessContent from '@/Components/Ui/OurBusiness/OurBusinessContent.vue'
    import OurBusinessBanner from '@/Components/Ui/OurBusiness/OurBusinessBanner.vue'
    import OurBusinessOverview from '@/Components/Ui/OurBusiness/OurBusinessOverview.vue'

    const content = useBusinessStore()

    onBeforeMount(() => {
        content.getEnergy()
    })

</script>
