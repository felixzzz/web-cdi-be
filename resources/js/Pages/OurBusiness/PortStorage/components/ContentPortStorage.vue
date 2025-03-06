<template>
    <div class="bg-blue-dark text-white">
        <container>
            <p
                class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center pt-20"
                v-if="heading"
            >{{ heading }}</p>

            <div class="py-20">
                <div class="flex items-center gap-6 border-b-2 border-b-neutral-6 justify-between">
                    <div
                        v-for="(tab, index) in tabs"
                        :key="index"
                        class="px-6 py-4 text-base lg:text-lg text-neutral-4 cursor-pointer tab-gradient w-full text-center"
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
            <div class="pb-16 bg-blue-dark" v-if="item.subTitle">
                <container class="grid grid-cols-1 lg:grid-cols-3 gap-20 max-lg:gap-y-10">
                    <div v-if="item.image">
                        <img :src="item.image" alt="" class="w-full aspect-square rounded-[20px]">
                    </div>
                    <div :class="item.image ? 'lg:col-span-2' : 'lg:col-span-3'">
                        <p
                            class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-4 text-white"
                        >{{ item.subTitle }}</p>
                        <div class="content !text-neutral-5" v-html="item.description"></div>
                    </div>
                </container>
            </div>
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
                            class="max-w-[45%]"
                            :class="{
                                'me-auto': content.align == 'left',
                                'ms-auto': content.align == 'right',
                            }"
                        >
                            <p v-if="content.tagline" class="text-neutral-4 mb-4">{{ content.tagline }}</p>
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


    const tabActive = ref(getQueryParam('tab') || 'PT Chandra Pelabuhan Nusantara')
    const heading = ref('Business Pillars')
    const tabs = ref([
        {
            title: 'PT Chandra Pelabuhan Nusantara',
            subTitle: 'PT Chandra Pelabuhan Nusantara',
            image: '',
            description: `
                <p>PT Chandra Pelabuhan Nusantara (CPN) is a subsidiary PT Chandra Daya Investasi. Situated strategically in the Sunda Strait, CPN serves as a pivotal link connecting between the Java Sea, South China Sea, and Indian Ocean. With the goal of enhancing jetty services to customers in the Cilegon area, CPN operates three jetties that can accommodate vessels up to 80,000 DWT, supporting the transport of essential products such as  Naphtha, Ethylene, Propylene, Py-Gas, and more. Positioned in close proximity to refineries and chemical industries, CPN's jetties facilitate the reception of large crude carriers, serving the region’s key chemical companies efficiently.</p>
            `,
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/cpn_key_assets_land_area.webp'),
                    heading: 'Key Assets:',
                    heading_position: 'center',
                    tagline: '',
                    title: 'Land Area',
                    align: 'right',
                    content: `
                        <p>We operate on a 35.5 hectare land area located in Cilegon, providing ample space for our infrastructure and operations. </p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/cpn_key_assets_jetty_facilities.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Jetty Facilities',
                    align: 'left',
                    content: `
                        <p>We manage 3 strategically located jetties, designed to meet the operation needs of our shareholder: </p>
                        <ol>
                            <li>Jetty A: capacity to berth 80,000 DWT vessels for Naphtha, LP Propylene, and Py-Gas.</li>
                            <li>Jetty B: capacity to berth 6,000 DWT vessels for HP Propylene, LPG, and Naphtha.</li>
                            <li>Jetty C: capacity to berth 10,000 DWT vessels for Ethylene, Py-Gas, Raffinate-1, Butadiene, Naphtha and PFO</li>
                        </ol>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/cpn_key_assets_tank_farm.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Tank Farm',
                    align: 'right',
                    content: `
                        <p>We manage  53 tanks with the total storage capacity of 518,000 m3 including:</p>

                        <ol>
                            <li>Atmospheric tanks: Designed for liquid products such as Naphtha, MTBE methanol</li>
                            <li>Pressurized tanks:  Used for storing liquefied gases, including  ethylene, and propylene.</li>
                        </ol>
                    `
                }

            ]
        },
        {
            title: 'PT Redeco Petrolin Utama',
            subTitle: 'PT Redeco Petrolin Utama',
            image: asset('assets/frontend/images/ourbusiness/redeco_overview.webp'),
            description: `
                <p>CDI enhances its presence in the infrastructure sector, specifically in the ports & storage business category by holding a 50.75% stake in PT Redeco Petrolin Utama (RPU). The company officially began operating under CDI in 2023, after previously, in 2013, Chandra Asri, through SMI, increased its stake in RPU to 50.75%.</p>
                <p>Recognized as a leading player in liquid bulk tank solutions, Redeco brings deep expertise in the design, construction, and maintenance of storage tanks. Established in 1986 in Banten, Redeco operates a terminal specializing in the storage of liquid bulk chemical products and efficiently manages the receipt, storage, and handling of chemicals, petrochemicals, and oil refinery products, using tanks designed to meet the specific needs of different substances. With a strong commitment to quality, environmental sustainability, and safety, Redeco holds relevant ISO certifications, ensuring compliance with the highest standards across all its operations.</p>
            `,
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/redeco_key_assets_jetty.webp'),
                    heading: 'Key Assets:',
                    heading_position: 'center',
                    tagline: '',
                    title: 'Jetty',
                    align: 'left',
                    content: `
                        <p>2 jetties with 100 meters LOA [1] each, suitable for 35,000 DWT vessel with 10 meters draft</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/redeco_key_assets_tank.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Tank',
                    align: 'right',
                    content: `
                        <p>72 tanks with total capacity of 130,000 m3</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/redeco_key_assets_supporting_assets.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Supporting Assets',
                    align: 'left',
                    content: `
                        <ol class="list-disc">
                            <li>Centralized Filling Station (CFS) suitable for various type and size of road tankers</li>
                            <li>Customer Order Service (COS) system for tailored made product pick-up plan</li>
                        </ol>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/redeco_key_assets_safety.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Safety',
                    align: 'left',
                    content: `
                        <p>International standards of fire and safety, including oil boom to handle any spillage</p>
                    `
                }
            ]
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
