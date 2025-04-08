<template>
    <div class="bg-blue-dark py-20 text-white">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16 justify-between">
                <h2 class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium max-w-[592px]">
                    {{ content.sustainability_overview_rating?.title }}
                </h2>
                <p class="content !text-neutral-5 !text-base" v-html="content.sustainability_overview_rating?.content"></p>
            </div>

            <div class="py-16">
                <p class="text-2xl lg:text-[28px] font-medium text-gradient-gold mb-8 text-center">
                    {{ $t('Rating & Recognition') }}
                </p>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    <div v-for="(rating, index) in ratings" :key="index" class="flex flex-col gap-4 items-center text-center py-6">
                        <img :src="rating.image" alt="">
                        <p
                            :class="{
                                'font-medium text-[22px] text-neutral-4': !rating.content,
                                'font-normal text-sm text-white': rating.content
                            }"
                        >
                            {{ rating.name }}
                        </p>
                        <p class="content !text-sm !text-neutral-6" v-html="rating.content"></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div v-for="(recognition, index) in recognitions" :key="index" class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-lg:items-center max-lg:text-center">
                    <div>
                        <img :src="recognition.image" alt="" class="rounded-xl border-2 border-gold-1 w-full">
                    </div>
                    <div class="lg:col-span-2">
                        <p
                            class="font-medium text-[22px] text-gradient-gold mb-2"
                        >
                            {{ recognition.name }}
                        </p>
                        <p class="content max-lg:!text-sm !text-neutral-6" v-html="recognition.content"></p>
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { ref } from 'vue'

    import { PreferenceSustainabilityOverview, RatingRecognition } from '@/types/utility'
    import useRequest from '@/Composables/useRequest';
    import { onBeforeMount } from 'vue'

    defineProps<{
        content: PreferenceSustainabilityOverview
    }>()

    const ratings = ref<RatingRecognition[]>([])

    const recognitions = ref<RatingRecognition[]>([])

    const fetchRatings = () => {
        useRequest().get(route('api.sustainability.ratings'))
        .then((result) => {
            ratings.value = result.data
        })
    }

    const fetchRecognitions = () => {
        useRequest().get(route('api.sustainability.recognitions'))
        .then((result) => {
            recognitions.value = result.data
        })
    }

    onBeforeMount(() => {
        fetchRatings()
        fetchRecognitions()
    })

</script>
