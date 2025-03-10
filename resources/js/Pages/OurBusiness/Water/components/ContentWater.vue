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


    const tabActive = ref(getQueryParam('tab') || 'CLEAN WATER')
    const heading = ref('Business Pillars')
    const tabs = ref([
        {
            title: 'CLEAN WATER',
            subTitle: 'Clean Water',
            image: '',
            description: 'Water supply services are the core business of KTI, which provides clean water to various industries, including Chandra Asri Group.',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_cidanau_river.webp'),
                    heading: '1. Raw Water Source',
                    heading_position: 'start',
                    tagline: 'Raw Water Source',
                    title: 'Cidanau River',
                    align: 'left',
                    content: `<p>Cidanau River is a vital river within the Cidanau Watershed (DAS), covering an area of 22,620 Ha. This river plays a crucial role in supporting the sustainable development in Banten Province. In addition to its significant water resources, the Cidanau watershed is home to an endemic conservation area, Lake Swamp (Rawa Danau). Rawa Danau, which spans 3,500 Ha and is designated as a nature reserve. </p>`
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_cipasauran_river.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: 'Raw Water Source',
                    title: 'Cipasauran River',
                    align: 'right',
                    content: `<p>The Cipasauran Watershed is located ±48 km from Cilegon towards Labuan, covering an area of 41,52 km2.</p>`
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_nadra_krenceng_reservoir.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: 'Raw Water Source',
                    title: 'Nadra Krenceng Reservoir',
                    align: 'left',
                    content: `
                        <p>Nadra Krenceng Reservoir serves as one of the raw water infrastructure, designed to store for use during the dry season or to meet the operational demands of the Krenceng water treatment plant. Nadra Krenceng Reservoir is located in Kebonsari Village, Citangkil District, Cilegon City, Banten Province. This artificial lake is fed primarily by the Cidanau River which is ± 28 km away, with water delivered via pipelines.</p>
                        <p>The Nadra Krenceng Reservoir is designed with the following specifications: </p>

                        <ol class="list-disc">
                            <li>Normal Water Level : +20,10 meters above sea level with an effective storage of 3,409,000 m3,</li>
                            <li>Minimum Water Level : +17,5 meters above sea level with an effective storage of 731,000 m3</li>
                            <li>High Water Level : +21,70 meters above sea level with an effective storage of 5,359,000 m3</li>
                        </ol>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_water_treatment_facilities_krenceng_water_treatment_plant.webp'),
                    heading: '2. Water Treatment Facilities',
                    heading_position: 'start',
                    tagline: 'Water Treatment Facilities',
                    title: 'Krenceng Water Treatment Plant (WTP)',
                    align: 'left',
                    content: `
                        <p>Krenceng Water Treatment Plant was established in 1979 as one of the key water treatment facilities owned by PT Krakatau Steel (Persero) Tbk (KS). In 1996, it was incorporated as a subsidiary of KS under the name PT Krakatau Tirta Industri (KTI). The plant has an installed capacity of 2,000 liters/second and operates using water sourced from Cidanau River. KTI manages the Cidanau weir and intake facilities located approximately 600 m downstream from the Cidanau River. The Cidanau weir, which spans 30 m, is designed to raise the water level for diversion to the Sandtrap. This system has been optimized to a maximum flow discharge of 3,500 liters/second, which is then directed to Cidanau Pump station 1. The Pump station, which features 4 pump units with capacities ranging from 1,000-3,500 m3/h, transmits water through a 1.4-meter diameter transmission pipe over a distance of  ± 27,2 km to Krenceng water treatment plant.</p>
                        <p>The water treatment system at Krenceng IPA utilizes conventional technology consisting of coagulation, flocculation, sedimentation, filtration, neutralization and disinfection processes. The treatment begins with the addition of alum sulfate chemicals in the Distribution Chamber unit.  This is followed by the floc formation and impurity settlement in the Accelerator unit.  The water then undergoes filtration using silica sand media in the Green Leaf Filter unit. After filtration, lime is added for pH neutralization and chlorine gas is used as disinfectant.  The treated water meets the quality standards outlined in PERMENKES No. 2 Year 2023 standards.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_water_treatment_facilities_cidanau_water_treatment_plant.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: 'Water Treatment Facilities',
                    title: 'Cidanau Water Treatment Plant (IPA)',
                    align: 'right',
                    content: `
                        <p>The Cidanau Water Treatment Plant (IPA) began operations in 2018, utilizing  raw water sourced from Cipasauran Dam. Raw water is pumped to the treatment unit located at Cidanau. The plant features 3 intake pump units, each  with a capacity of 400 liters/second each. The Cipasauran Dam, situated approximately  45 km from Cilegon towards Labuan, serves to raise the water level of the  Cipasauran river, allowing it to be directed to the  Cidanau IPA which is managed by KTI. Cipasauran weir, completed in 2017, spans 30 meters in width and stands 6,5 m tall. The IPA is equipped with an intake building, a flushing building, and a mud bag/sand trap channel, all located on the right side of the weir.</p>
                        <p>The water treatment system at Cidanau IPA follows a similar process to Krenceng IPA, utilizing conventional technology that includes coagulation, flocculation, sedimentation, filtration, neutralization and disinfection processes. The difference between Cidanau IPA and Krenceng IPA is in the Hexagonal Flocculator and Dynasand Filter units. The treatment process begins with the addition of alum sulfate chemicals in the Distribution Chamber unit, then the floc formation process in the Hexagonal Flocculator unit, then the deposition of impurities in the Lamella Clarifier unit and filtering using silica sand media in the Dynasand Filter unit. The processed ensures the production of clean water that meets the quality standards outlined in PERMENKES No. 2 Year 2023 standards.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_distribution_lines_pipeline_line.webp'),
                    heading: '3. Distribution Lines',
                    heading_position: 'start',
                    tagline: 'Distribution Lines',
                    title: 'Pipeline Line',
                    align: 'right',
                    content: `
                        <p>The Clean water produced by KTI is delivered to customers through a pipelines network spanning over 100 km. The distribution system is organized into the following segments:</p>
                        <ol class="list-disc">
                            <li>
                                <b>Western Region</b>
                                <p>The Western Region includes customers as PT KS Production Unit, PT KS & Group, Pelindo Cigading, IP UBP Suralaya, Krakatau Industrial Estate, PT Asahimas Chemical, PT Chandra Asri Pacific Tbk, PT Dongjin Indonesia, PT Lautan Otsuka Chemical, PT Indorama Petrochemical, PT Permata Dunia Sukses Utama, PT Jawamanis Rafinasi, PT Sentra Usahatama Jaya, and others.</p>
                            </li>
                            <li>
                                <b>Eastern Region</b>
                                <p>The Eastern Region includes customers as PT Krakatau Baja Konstruksi, Krakatau Medika Hospital, The Royale Krakatau Hotel, Krakatau Country Club, PT Krakatau Steel Office, PDAM Cilegon Mandiri, and others.</p>
                            </li>
                        </ol>

                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_distribution_pump_house.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: 'Distribution Lines',
                    title: 'Pump House',
                    align: 'right',
                    content: `
                        <p>To meet the needs of the Western and Eastern Regions, there are several pump houses (PS/Pump Station) that operate to distribute clean water, among others:</p>
                        <ol class="list-disc">
                            <li>
                                <b>Pump House III</b>
                                <p>There are 5 horizontal centrifugal pumps, 3 pumps are used to drain water to the tower with a water discharge capacity of 900 m3 /hour, while 2 pumps are used to drain water to PS V (Secondary Pumping Station) with a capacity of 1,080 m3/hour.</p>
                            </li>
                            <li>
                                <b>Pump House IV</b>
                                <p>There are 7 vertical centrifugal pump units with a capacity of 900 m3/hour, to distribute water to PT Krakatau Steel, KIEC 1 Area, Krakatau Posco (KP), PT Krakatau Chandra Energi (KCE), PT Lotte Chemical Indonesia (LCI) and the rest for the Cigading area.</p>
                            </li>
                            <li>
                                <b>Pump House V</b>
                                <p>There are 3 horizontal centrifugal pump units with a capacity of 252 m3/hour and 2 pump units with a capacity of 504 m3 / hour which pump clean water from the 5,000 m3 Reservoir to the Krakatau Baja Konstruksi (KBK) Area, Krakatau Medika Hospital (RSKM), and KS Housing.</p>
                            </li>
                            <li>
                                <b>Pump House VI</b>
                                <p>There are 5 pump units with a capacity of 900 m3/hour, to distribute water to consumers in the Cigading-Ciwandan area and KIEC Area 2.</p>
                            </li>
                            <li>
                                <b>Pump House VIII WTP Cidanau</b>
                                <p>There are 4 pump units with a water discharge capacity of 210 liters/second to distribute water to consumers in the Ciwandan area.</p>
                            </li>
                        </ol>

                    `
                }

            ]
        },
        {
            title: 'DEMIN WATER',
            subTitle: 'Demin Water',
            image: '',
            description: 'In addition to supplying clean water for both industrial and community use. KTI through its subsidiary, PT Krakatau Tirta Operation & Maintenance (KTOP), also provides high-quality demineralized water for industrial applications. Utilizing advanced processes and state-of-the-art technology, the demineralized water produced is customized to meet specific requirements of each customer.',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_pt_mcci_demin.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'PT MCCI Demin WTP',
                    align: 'left',
                    content: `
                        <p>This Water Treatment Plant (WTP) was built to meet the demin water needs of  PT Mitsubishi Chemical Indonesia (PT MCCI) with a demand of 220 m3/hour. The raw water used in the treatment process is sourced from clean water provided by   KTI. Built by KTI, under a Build, Operate, Own (BOO) business model, the WTP has a design capacity of 3 x 110 m3/hour (with 2 operational unites and 1 stand by unit) and has been operating continuously 24 hours a day since October 2014. The treated demin water product is then distributed to the PT MCCI plant through a dedicated pipeline network.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_pt_latinusa_tbk.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'WRP & WTP Demin PT Latinusa Tbk.',
                    align: 'right',
                    content: `
                        <p>The Water Recycle Plant (WRP) processes raw water sourced from wastewater generated by the  Wastewater Treatment Plant (WWTP) of PT Pelat Timah Nusantara (PT Latinusa Tbk.). This wastewater comes from the electroplating process and tinplate sheet coating. After treatment at the PT Latinusa Tbk. WWTP, the water is used as the raw water for producing demin water. The WRP, built by KTI under a Build, Operate, Own (BOO) business model, has been operating continuously 24 hours a day since December 15, 2011.  The plant is designed with a production capacity of  30 m3/hour of demin water.</p>
                        <p>Not only that, KTI also manages Water Treatment Plant, WTP Demin PT Latinusa Tbk which operated by PT Krakatau Tirta Operations & Maintenance to supply demin water for PT Latinusa Tbk.  The plant has a capacity of 48 m3/hour and has been operating continuously, 24 hours a day, since October 01, 2021. The technology used includes Ultrafiltration Membrane, Reverse Osmosis Membrane and Ion Exchange Resin to ensure high-quality water production.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_demin_blast_furnace_complex.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'O&M WTP Demin Blast Furnace Complex PT Krakatau Steel (Persero) Tbk.',
                    align: 'left',
                    content: `
                        <p>KTI conducts Operation & Maintenance (O&M) of the Demineralized Water Treatment Plant (WTP) at the Blast Furnace Complex of PT Krakatau Steel. This WTP utilizes ion exchange technology and has a design capacity of 150 m3/hour.  KTI managed all aspect of the water treatment process including the supply of chemicals and labor management, ensuring the smooth operation and maintenance of the plant.</p>
                    `
                }
            ]
        },
        {
            title: 'WASTEWATER TREATMENT',
            subTitle: 'Wastewater Treatment',
            image: '',
            description: 'PT Krakatau Tirta Industri through KTOP serves wastewater treatment for industries and companies. This service ensures compliance with the environmental quality standards while enabling the reuse of treated wastewater, contributing to resource management.',
            contents: [
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_wwtp_biotreatment.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'O&M WWTP Biotreatment Blast Furnace Complex PT KS',
                    align: 'right',
                    content: `
                        <p>In addition to operating the WTP Demin Blast Furnace Complex of  KS, KTI also manages operation & maintenance  (O&M) of the Waste Water Treatment Plant (WWTP) Biotreatment Blast Furnace Complex PT KS. This WWTP has a capacity of 32 m3/hour using biological treatment technology. In this plant, KTI oversees all aspects of the facility, including water treatment process, chemical supply, and labor management, ensuring the efficient and sustainable treatment of wastewater.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_pt_krakatau_blue_water.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'PT Krakatau Blue Water (KBW).',
                    align: 'left',
                    content: `
                        <p>KBW is a joint venture between KTI and Blue O&M Co. Ltd. Since its establishment in 2013, KBW has been responsible for operating the Final Wastewater Treatment facility, with a treatment capacity of 17,000 m3/day, and Reusing System, which has a capacity of 7,000 m3/day owned by PT Krakatau Posco. The plant utilizes both conventional and membrane technology to ensure efficient and sustainable wastewater treatment and reuse.</p>
                    `
                },
                {
                    image: asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_wrp_krakatau_steel_building_jakarta.webp'),
                    heading: '',
                    heading_position: '',
                    tagline: '',
                    title: 'WRP Krakatau Steel Building Jakarta',
                    align: 'right',
                    content: `
                        <p>The WRP is designed to treat water from building discharges, specifically from toilets,  with a discharge of 2 m3/hour. The treated water is then reused for the building chiller system. The WRP built by KTI operates with a Build, Operate, Own (BOO) business scheme. This WRP utilizes advance technologies such as Membrane Bio Reactor (MBR) and Ion Exchange (decolouration) technology to ensure efficient treatment process and water use.</p>
                    `
                }
            ]
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
