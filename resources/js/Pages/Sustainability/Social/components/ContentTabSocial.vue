<template>
    <div class="bg-blue-dark text-white">
        <container>
            <div class="">
                <div
                    class="flex items-stretch gap-6 border-b-2 border-b-neutral-6 justify-between max-lg:flex-col"
                >
                    <div
                        v-for="(tab, index) in tabs"
                        :key="index"
                        class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center flex items-center justify-center !h-auto"
                        :class="{
                            'active': tabActive == tab.title
                        }"
                        @click="changeTab(tab.title)"
                    >
                        {{ tab.title }}
                    </div>
                </div>
            </div>
        </container>
    </div>
    <div v-for="(item, index) in tabs" :key="index">
        <section v-show="item.title == tabActive">
            <template v-for="(content, contentIndex) in item.contents" :key="contentIndex">
                <div class="py-6 bg-blue-dark" v-if="content.heading">
                    <container>
                        <p
                            v-if="content.heading"
                            class="font-medium text-2xl lg:text-[28px] mb-4 text-white"
                            :class="content.heading_position ? `text-${content.heading_position}` : ''"
                        >{{ content.heading }}</p>
                    </container>
                </div>
                <div
                    class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
                    :style="{
                        'backgroundImage': `url(${content.image})`
                    }"
                >
                    <div class="absolute inset-0 overlay-business"></div>
                    <container class="relative z-[1]">
                        <div
                            class="lg:max-w-[45%]"
                            :class="{
                                'me-auto': content.align == 'left',
                                'ms-auto': content.align == 'right',
                            }"
                        >
                            <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">{{ content.title }}</p>
                            <div class="content !text-neutral-5" v-html="content.content"></div>
                        </div>
                    </container>
                </div>
            </template>
        </section>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset, getQueryParam } from '@/Lib/utils'
    import { ref } from 'vue';


    const tabActive = ref(getQueryParam('tab') || 'Healthcare & Well-being')
    const tabs = ref([
        {
            title: 'Healthcare & Well-being',
            contents: [
                {
                    image: asset('assets/frontend/images/sustainability/healthcare_well_being.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Healthcare & Well-being',
                    align: 'right',
                    content: `
                        <p>CDI provides BPJS Health Insurance assistance to 40 residents in Cilegon, ensuring access to essential medical services. CDI’s free medical check-up program has reached 217 residents in the Cikerai and Cinangka areas, offering health consultations and blood sugar screening.</p>
                    `
                }
            ]
        },
        {
            title: 'Waste Management & Community Empowerment',
            contents: [
                {
                    image: asset('assets/frontend/images/sustainability/waste_management_community_empowerment.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Waste Management & Community Empowerment',
                    align: 'right',
                    content: `
                        <p>In collaboration with local communities, CDI have established:</p>

                        <ol>
                            <li>Maggot Farming at Al Bustaniyah Islamic Boarding School, enabling organic waste recycling.</li>
                            <li>Bank Sampah initiatives, empowering the community to manage inorganic waste </li>
                        </ol>
                    `
                }
            ]
        },
        {
            title: 'Renewable Energy for Education',
            contents: [
                {
                    image: asset('assets/frontend/images/sustainability/social_tab_3.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Renewable Energy for Education',
                    align: 'right',
                    content: `
                        <p>CDI believes in providing clean energy access to educational institutions. By installing PLTS Rooftop (Langit Biru) at schools and Islamic boarding schools, CDI helps reduce electricity costs while promoting sustainable energy use.</p>
                    `
                }
            ]
        },
        {
            title: 'Marine Conservation',
            contents: [
                {
                    image: asset('assets/frontend/images/sustainability/social_tab_3.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Marine Conservation',
                    align: 'right',
                    content: `
                        <p>To protect coastal ecosystems, CDI actively participates in coral reef conservation efforts, ensuring the preservation of marine biodiversity for future generations. </p>
                    `
                }
            ]
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
