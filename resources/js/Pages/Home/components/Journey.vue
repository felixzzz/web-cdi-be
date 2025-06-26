<template>
    <div
        class="bg-blue-dark pb-12 pt-12 lg:py-28 text-white bg-contain bg-no-repeat bg-right relative"
        :style="{
            'backgroundImage': `url(${content.home_journey_content?.file_url})`
        }"
    >
        <container class="relative z-[1]">
            <p class="text-neutral-4 mb-4">
                {{ content.home_journey_tagline?.title }}
            </p>
            <div class="mb-20 max-w-lg">
                <h2 class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-6">
                    {{ content.home_journey_content?.title }}
                </h2>
                <div class="content !text-neutral-5" v-html="content.home_journey_content?.content"></div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 mb-20">
                <div
                    v-for="(info, index) in informations"
                    class="border-l-2 border-l-blue-lighter px-8 py-4 lg:py-0"
                    :key="index"
                >
                    <p class="text-shadow-1 font-medium text-4xl md:text-[62px] xl:text-[80px] mb-2">
                        {{ info.title }}
                    </p>
                    <div class="content !font-light text-shadow-1 !text-white leading-[18px]" v-html="info.description"></div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a :href="careerUrl" class="px-6 py-2 rounded-full whitespace-nowrap border border-white" target="_blank">
                    {{ $t('Join with Us') }}
                </a>
                <Link :href="route('about-us.awards')" class="px-6 py-2 rounded-full whitespace-nowrap border border-white">
                    {{ $t('All Awards') }}
                </Link>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { Link, usePage } from '@inertiajs/vue3'
    import { ref, watch } from 'vue'

    import { PreferenceHome } from '@/types/utility'

    const props = defineProps<{
        content: PreferenceHome
    }>()

    const informations = ref<any>([])
    const careerUrl = usePage().props.career_url


    const updateTabs = () => {
        informations.value = [
            {
                title: props.content.home_journey_info_1?.title,
                description: props.content.home_journey_info_1?.content
            },
            {
                title: props.content.home_journey_info_2?.title,
                description: props.content.home_journey_info_2?.content
            },
            {
                title: props.content.home_journey_info_3?.title,
                description: props.content.home_journey_info_3?.content
            }
        ]
    }
    updateTabs()

    watch(() => props.content, updateTabs, { deep: true })
</script>
