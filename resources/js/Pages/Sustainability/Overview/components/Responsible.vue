<template>
    <div class="text-white bg-blue-dark py-20">
        <container>
            <h2
                class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] pt-20 mb-4"
            >
                Our Sustainability Policy and Framework
            </h2>
            <p class="text-neutral-6 max-lg:text-sm mb-4">
                Our Sustainability Framework and Policy guide our strategic decisions in across all aspects of our operations, ensuring business success aligns with environmental stewardship, and creates positive impact through responsible practices.
            </p>
            <Link href="" class="px-6 py-2 rounded-full whitespace-nowrap bg-blue-base flex items-center gap-2 text-white mt-2 w-fit">
                Download Sustainability Policy <img :src="asset('assets/frontend/icons/ic_download_white.svg')" alt="">
            </Link>
            <div class="mt-16 grid grid-cols-1 lg:grid-cols-5 gap-4">
                <div class="lg:col-span-2">
                    <div class="w-[398px] mx-auto relative">
                        <div class="absolute w-full z-[1]">
                            <img :src="asset('assets/frontend/icons/ic_arrow_roulette.svg')" alt="" class="mx-auto">
                        </div>
                        <img
                            :src="asset('assets/frontend/images/sustainability/spin_roulette.webp')" alt=""
                            class="w-[398px] mx-auto transition duration-500 ease-in-out"
                            :style="{ transform: `rotate(${tabs[selected].rotate}deg)` }"

                        >
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div class="flex items-center border-b-2 border-b-neutral-6">
                        <div
                            v-for="(text, index) in tabs"
                            :key="index"
                            class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center"
                            :class="{
                                'active': selected == index
                            }"
                            @click="changeText(index)"
                        >
                            {{ text.name }}
                        </div>
                    </div>

                    <div class="my-8">
                        <div
                            v-for="(text, index) in tabs"
                            :key="index"
                            class="button-gradient-custom !gap-4 !flex-col !items-start"
                            v-show="selected == index"
                        >
                            <p class="font-medium text-[22px]">{{ text.title }}</p>
                            <p class="text-neutral-6 max-lg:text-sm">{{ text.description }}</p>
                            <div class="flex gap-2 items-center " v-for="(point, i) in text.points" :key="i">
                                <img :src="asset('assets/frontend/icons/ic_bold_duotone_check_circle.svg')" alt="">
                                <p class="text-blue-base max-lg:text-sm">{{ point }}</p>
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
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const selected = ref(0)

    const changeText = (id: number) => {
        selected.value = id
    }

    const tabs = ref([
        {
            name: 'R',
            rotate: 5,
            title: 'Resource Circularity and Environment Management',
            description: 'Promoting circular economy and “beyond compliance” on environmental aspects.',
            points: [
                'Environmental Management',
                'Circular Economy'
            ]
        },
        {
            name: 'E',
            rotate: -27,
            title: 'Energy Transition and Low Carbon Solution',
            description: "Supporting the Indonesian government's commitment to global climate action.",
            points: [
                'Climate Resilience'
            ]
        },
        {
            name: 'S',
            rotate: -62,
            title: 'Social and Community Engagement',
            description: "Supporting the Indonesian government's commitment to global climate action.",
            points: [
                'Climate Resilience'
            ]
        },
        {
            name: 'P',
            rotate: -94,
            title: 'Product and Chemical Stewardship',
            description: 'Producing products according to standards to increase consumer and public trust.',
            points: [
                'Product and Chemical Stewardship'
            ]
        },
        {
            name: 'O',
            rotate: -130,
            title: 'OHS and Human Rights',
            description: 'Running a business that complies with human rights and work safety standards.',
            points: [
                'Health and Safety',
                'Labor and Human Rights'
            ]
        },
        {
            name: 'N',
            rotate: -162,
            title: 'Nurture of Human Capital',
            description: 'Effective competency development for high productivity and performance.',
            points: [
                'Human Capital Development'
            ]
        },
        {
            name: 'S',
            rotate: -195,
            title: 'Sustainable Supply Chain',
            description: 'Establish supplier standards of environmental and social expectations for business sustainability.',
            points: [
                'Sustainable Procurement and Supply Chain'
            ]
        },
        {
            name: 'I',
            rotate: -230,
            title: 'IT and Security Management',
            description: 'Improving operational efficiency and security through digitalization, data management, and collaboration.',
            points: [
                'Digital Transformation',
                'Labor and Human Rights'
            ]
        },
        {
            name: 'B',
            rotate: -260,
            title: 'Business Risk Management',
            description: 'Preparing comprehensive risk management for increased access to investment opportunities.',
            points: [
                'Corporate Governance',
                'Climate Resilience',
                'Health and Safety'
            ]
        },
        {
            name: 'L',
            rotate: -292,
            title: 'Liability on Corporate Governance',
            description: 'Implementing good governance to prevent noncompliance, violations and regulatory sanctions.',
            points: [
                'Corporate Governance',
                'Business Ethics'
            ]
        },
        {
            name: 'E',
            rotate: -323,
            title: 'ESG Communication and Stakeholder Engagement',
            description: 'Communication and disclosure of environmental, social, and governance (ESG) management information to build stakeholder trust.',
            points: [
                'All Materialities',
                'Business Ethics'
            ]
        }
    ])

</script>
