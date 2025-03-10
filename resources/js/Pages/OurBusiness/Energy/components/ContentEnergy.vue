<template>
    <div class="bg-blue-dark text-white">
        <container>
            <p
                class="font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center pt-20"
                v-if="heading"
            >{{ heading }}</p>

            <div class="py-20">
                <div class="flex items-center gap-6 border-b-2 border-b-neutral-6 justify-between max-lg:flex-col">
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
                            class="lg:max-w-[45%]"
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


    const tabActive = ref(getQueryParam('tab') || 'Electricity Supply')
    const heading = ref('Business Pillars')
    const tabs = ref([
        {
            title: 'Electricity Supply',
            subTitle: '',
            image: '',
            description: '',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_electricity_supply.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: '',
                    align: 'right',
                    content: `
                        <p>Electricity supply is the core business of KCE. This segment is supported by power plants with a total capacity of 120 MW. The company provides electricity to the Krakatau Industrial Estate (KIK) in Cilegon, Banten, covering over 4,700 hectares.  KCE serves 216 industrial, business, social, and government customers, along with 2,055 household customers.</p>
                        <p>For electricity generation, KCE utilizes Combined Cycle Power Plant (CCPP) technology, also known as a Gas Steam Power Plant (PLTGU) with a capacity of 120 MW.  The plant consists of two gas turbine generators, two heat recovery steam generators, and one steam turbine generator. Natural gas is the primary fuel used in the power plant. </p>
                        <p>KCE ensures that the electricity generated meets industry standards by implementing a compensator system designed to maintain voltage stability. This is evidenced by low SAIDI and SAIFI figures, with SAIDI at 0.10466 hours/customer/year and SAIFI at 0.1192 occurrences/customer/year. This system helps ensure the delivery of high-quality electricity that can be continuously regulated, providing the best experience for consumers.</p>
                    `
                }

            ]
        },
        {
            title: 'Electrical Services',
            subTitle: 'Electrical Services',
            image: '',
            description: 'This business line is divided into three main segments: Operation & Maintenance of power plants; Engineering, Procurement and Construction (EPC) of electricity system; and Repair Overhaul services for transformers and electric motors. The services cater to a wide range of sectors, including industrial, business, social, government, and residential customers. The products offered from the three electricity service segments include:',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_operation.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Operation & Maintenance (O&M) Power Generation & Power Distribution',
                    align: 'left',
                    content: `
                        <ol class="list-disc">
                            <li>O&M Steam Power Plant, Combined Cycle Power Plant, Diesel Power Plant, and Gas Power Plant</li>
                            <li>O&M Power Distribution</li>
                            <li>Testing & Commissioning</li>
                            <li>System & Documentation</li>
                            <li>Training & Development</li>
                        </ol>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_electrical_epc.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Electrical EPC',
                    align: 'right',
                    content: `
                        <ol class="list-disc">
                            <li>Construction and Installation of Substation Electricity Supply Installation</li>
                            <li>Construction and Installation of Medium Voltage Electricity Supply Installation</li>
                            <li>Construction and Installation of High Voltage Electricity Supply Installation</li>
                            <li>Construction and Installation of Panel & Solar PV System</li>
                        </ol>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_workshop_services.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'Workshop services for Repair & Overhaul (Motor & Transformer)',
                    align: 'left',
                    content: `
                        <ol class="list-disc">
                            <li>Repair & Overhaul of LV & MV Motors</li>
                            <li>Power & Distribution Transformer Repair</li>
                            <li>Transformer Mobile Unit Services</li>
                            <li>Rental of Heavy Equipment & Test Equipment: Overhead Crane 100/10 Ton, Overhead Crane 30/5 Ton Electrical tools & Equipment Test</li>
                        </ol>
                    `
                }
            ]
        },
        {
            title: 'Renewable Energy',
            subTitle: 'Renewable Energy',
            image: '',
            description: 'KCE operating in the new and renewable energy sector by constructing and operating more than 2,200 kWp Solar Power Plant in December 2024. In the future, KCE plans to develop additional renewable energy solutions, service options that allows consumers to transition to cleaner energy alternatives. KCE provides four installation mechanisms for solar panels, including:',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_renewable_energy.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'O&M WWTP Biotreatment Blast Furnace Complex PT KS',
                    align: 'right',
                    content: `
                        <ol class="list-disc">
                            <li>
                                <b>Solar On Grid System:</b>
                                <p>This system integrates solar panels with the power grid, allowing the energy generated to be directly transmitted through the grid without the need for battery backup storage.</p>
                            </li>
                            <li>
                                <b>Solar Off Grid System:</b>
                                <p>Operating autonomously without connection to the grid, this system requires energy and batteries, with usage dependent on the battery’s capacity.</p>
                            </li>
                            <li>
                                <b>Solar Off Grid System:</b>
                                <p>In this system, solar panels supply energy to the grid, while excess energy is stored in batteries to be used when sunlight is unavailable. </p>
                            </li>
                            <li>
                                <b>Solar Hybrid System: </b>
                                <p>This system combines multiple energy sources to meet the electricity needs of the building, enabling integration between different system for greater flexibility</p>
                            </li>
                        </ol>
                        <p>With these diverse options, KCE offers tailored solar panel installation solutions designed to meet the specific needs of each customer.</p>
                    `
                }
            ]
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
