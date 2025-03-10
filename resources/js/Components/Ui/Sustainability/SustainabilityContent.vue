<template>
    <section v-for="(item, index) in items" :key="index">
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
            v-if="item.type == 'content'"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'"></div>
            <container class="relative z-[1]">
                <div
                    class="lg:max-w-[45%]"
                    :class="{
                        'me-auto': item.align == 'left',
                        'ms-auto': item.align == 'right',
                    }"
                >
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-6 text-blue-lighter">{{ item.title }}</p>
                    <div class="content !text-neutral-5" v-html="item.content"></div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'grid'"
            class="text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                'py-10': item.grid_type == 'icon_list_card',
                'py-28': item.grid_type == 'icon_content_card',
                'py-20': item.grid_type == 'box_icon_card' || item.grid_type == 'image_content_card' || item.grid_type == 'featured_image_card',
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class="mb-16 grid grid-cols-1 gap-4"
                    :class="{
                        'lg:grid-cols-2': item.content,
                        'items-center': item.grid_direction == 'row'
                    }"
                >
                    <p
                        class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium"
                        :class="{
                            'lg:col-span-2': item.content && item.grid_direction == 'col'
                        }"
                        v-if="item.title"
                    >{{ item.title }}</p>
                    <div
                        v-if="item.content"
                        class="text-neutral-4 font-light"
                        :class="{
                            'lg:col-span-2 lg:max-w-[80%]': item.content && item.grid_direction == 'col',
                        }"
                        v-html="item.content"
                    ></div>
                </div>

                <div
                    class="grid grid-cols-1 gap-6"
                    :class="{
                        'lg:grid-cols-2': item.grid_pattern != 'zig-zag',
                        'lg:grid-cols-3': item.grid_type == 'image_content_card',
                        'lg:grid-cols-7': item.grid_pattern == 'zig-zag',
                    }"
                >
                    <template v-for="(row, rowIndex) in chunkArray(item.content_grid, 2)" :key="rowIndex">
                        <div
                            v-for="(content, contentIndex) in row" :key="contentIndex"
                            class="flex gap-4 items-start relative bg-cover bg-no-repeat"
                            :class="{
                                'flex-col': item.grid_type == 'icon_content_card' || item.grid_type == 'image_content_card',
                                'border border-white/16 bg-[#25405029] p-2 rounded-xl !gap-0 backdrop:blur-sm': item.grid_type == 'image_content_card',
                                'p-6 bg-[#BFCDD414] rounded-lg border border-[#2A404E]/80': item.grid_type == 'box_icon_card',
                                'lg:col-span-2': item.grid_pattern !== 'zig-zag'
                                    && item.grid_type === 'box_icon_card'
                                    && item.content_grid
                                    && item.content_grid.length % 2 !== 0
                                    && rowIndex === Math.floor(item.content_grid.length / 2)
                                    && contentIndex === row.length - 1,
                                'lg:col-span-4': (item.grid_pattern === 'zig-zag' && rowIndex % 2 === 0 && contentIndex === 0) || (item.grid_pattern === 'zig-zag' && rowIndex % 2 !== 0 && contentIndex === 1),
                                'lg:col-span-3': (item.grid_pattern === 'zig-zag' && rowIndex % 2 === 0 && contentIndex === 1) || item.grid_pattern === 'zig-zag' && rowIndex % 2 !== 0 && contentIndex === 0,
                                'border border-white/16 bg-[#25405029] rounded-xl !gap-0 backdrop:blur-sm min-h-[328px] !items-end': item.grid_type == 'featured_image_card',
                            }"
                            :style="{
                                'backgroundImage': `url(${content.icon && item.grid_type == 'featured_image_card' ? content.icon : ''})`
                            }"
                        >
                            <div
                                class="flex shrink-0 w-[56px]"
                                :class="{
                                    '!w-[48px]': item.grid_type == 'icon_content_card',
                                    '!w-full aspect-square': item.grid_type == 'image_content_card'
                                }"
                                v-if="item.grid_type != 'featured_image_card'"
                            >
                                <img :src="content.icon" alt=""
                                    class="w-full"
                                    :class="{
                                        'aspect-square object-cover rounded-lg': item.grid_type == 'image_content_card'
                                    }"
                                >
                            </div>
                            <div
                                class="flex flex-col gap-4"
                                :class="{
                                    'px-4 py-6 !gap-2': item.grid_type == 'image_content_card',
                                    'p-6': item.grid_type == 'featured_image_card'
                                }"
                            >
                                <p
                                    v-if="content.title"
                                    class="text-[22px] font-medium text-blue-lighter"
                                    :class="{
                                        '!text-white': item.grid_type == 'image_content_card'
                                    }"
                                >
                                    {{ content.title }}
                                </p>
                                <div
                                    class="content"
                                    :class="{
                                        '!text-neutral-5': item.grid_type == 'icon_list_card',
                                        '!text-neutral-5 lg:!text-sm lg:max-w-[90%]': item.grid_type == 'featured_image_card',
                                        '!text-neutral-6 lg:!text-sm': item.grid_type == 'icon_content_card' || item.grid_type == 'box_icon_card' || item.grid_type == 'image_content_card'
                                    }"
                                    v-html="content.description"
                                >
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'simple_text_information'"
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:items-center"
                >
                    <div>
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ item.title }}</p>
                        <div class="content !text-neutral-4" v-html="item.content"></div>
                    </div>
                    <div>
                        <div class="items-center lg:max-w-[60%] ms-auto grid grid-cols-2 gap-8 lg:gap-x-16">
                            <div
                                v-for="(content, contentIndex) in item.content_grid" :key="contentIndex"
                                :class="{
                                    'row-span-2': item.content_grid && item.content_grid.length % 2 !== 0 && contentIndex === item.content_grid.length - 2
                                }"
                            >
                                <p class="text-blue-lighter font-bold text-3xl lg:text-[48px]">
                                    {{ content.title }}
                                </p>
                                <p>
                                    {{ content.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'file_information'"
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-2-darkest' : 'overlay-business-2'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class=""
                    :class="{
                        'grid grid-cols-1 lg:grid-cols-5 gap-16': item.grid_direction != 'row',
                        'flex flex-col gap-8 lg:max-w-[45%]': item.grid_direction == 'row',
                        'me-auto': item.align == 'left',
                        'ms-auto': item.align == 'right',
                    }"
                >
                    <div :class="item.grid_direction != 'row' ? 'lg:col-span-3' : ''">
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ item.title }}</p>
                        <div class="content !text-neutral-6" v-html="item.content"></div>
                    </div>
                    <div :class="item.grid_direction != 'row' ? 'lg:col-span-2' : ''">
                        <div
                            class="button-gradient-custom !flex-col !items-start"
                            :class="item.grid_direction == 'row' ? 'lg:min-w-[50%] lg:w-fit' : ''"
                        >
                            <div class="flex flex-col gap-2 pb-2 border-b border-b-neutral-9 mb-2 w-full">
                                <p class="text-[22px] font-medium">{{ item.file_information?.title }}</p>
                                <div class="flex items-center text-base text-white gap-3">
                                    <div class="flex items-baseline gap-3">
                                        <span>{{ item.file_information?.size }}</span>
                                        <span>.</span>
                                    </div>
                                    <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                                </div>
                            </div>

                            <div class="flex items-center gap-8 w-full justify-center">
                                <Link href="" class="flex items-center gap-2 text-white font-medium">
                                    <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> View
                                </Link>
                                <Link href="" class="flex items-center gap-2 text-white font-medium">
                                    <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> Download
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'content_swiper'"
            class="py-20 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-2-darkest' : 'overlay-business-2'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div class="flex max-lg:flex-col items-center gap-8 mb-16 justify-between">
                    <div class="flex flex-col gap-1">
                        <p class="text-2xl lg:text-[28px] font-medium">{{ item.title }}</p>
                        <div class="content !text-neutral-4" v-html="item.content"></div>
                    </div>
                    <div class="">
                        <div class="flex items-center justify-end gap-4">
                            <div class="custom-prev cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center" :id="`swiper-prev-${index}`">
                                <i class="isax icon-arrow-left"></i>
                            </div>
                            <div class="custom-next cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center" :id="`swiper-next-${index}`">
                                <i class="isax icon-arrow-right-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <swiper
                    :modules="[Navigation]"
                    :slides-per-view="4"
                    :space-between="24"
                    :navigation="{ nextEl: `#swiper-next-${index}`, prevEl: `#swiper-prev-${index}` }"
                    class="custom-swiper"
                    :breakpoints="{
                        320: { slidesPerView: 1 },
                        640: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                        1280: { slidesPerView: 4 }
                    }"
                >
                    <swiper-slide v-for="(content, contentIndex) in item.content_grid" :key="contentIndex">
                        <div
                            class="rounded-3xl p-6 overflow-hidden w-full aspect-[3/4] flex flex-col gap-4 justify-between bg-cover bg-center relative"
                            :style="{
                                'backgroundImage': `url(${content.icon})`
                            }"
                        >
                            <div class="absolute inset-0 overlay-card-sustainability"></div>
                            <div class="flex items-center gap-2 relative z-[1]">
                                <p class="text-white/40 text-4xl lg:text-[68px]">
                                    {{ content.number }}
                                </p>
                                <p class="text-2xl lg:text-[28px] font-medium text-white">
                                    {{ content.title }}
                                </p>
                            </div>

                            <div v-html="content.description" class="!text-neutral-5 relative z-[1]"></div>
                        </div>
                    </swiper-slide>
                </swiper>
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset, chunkArray } from '@/Lib/utils'
    import { SustainabilityContent } from '@/types/utility'
    import { onMounted, ref } from 'vue'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import { Navigation } from 'swiper/modules'
    import { Link } from '@inertiajs/vue3'

    const props = defineProps<{
        type: 'environment' | 'social' | 'governance'
    }>()


    const items = ref<SustainabilityContent[]>([])

    onMounted(() => {
        if (props.type == 'environment') {
            items.value = [
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/energy_emission.webp'),
                    title: 'Energy & Emission',
                    align: 'right',
                    content: `<p>At PT Chandra Daya Investasi Tbk (CDI), we are committed to advancing Indonesia’s transition towards renewable energy. CDI’s subsidiary, PT Krakatau Chandra Energi (KCE), plays a crucial role in this effort by providing clean energy solutions.</p>`
                },
                {
                    type: 'grid',
                    grid_type: 'icon_list_card',
                    image: '',
                    title: '',
                    align: '',
                    content: '',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/ic_solar_panel_05.svg'),
                            title: '',
                            description: `
                                <p>Currently, CDI’s installed capacity of renewable energy sources reaches 2.199, 82 kWp, with plans to scale up CDI’s  Solar Power Plant (PLTS) to 3 MWp. These initiatives contribute to an estimated 40% reduction in electricity costs while lowering carbon emissions by 730,73 tons of CO₂ annually.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_tree.svg'),
                            title: '',
                            description: `
                                <p>More trees By 2024, PT Krakatau Chandra Energi employees will have planted 214 trees in the KCE area. This is part of a program to reduce carbon emissions.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_chimney.svg'),
                            title: '',
                            description: `
                                <p>CDI also has implemented the Continuous Emission Monitoring System (CEMS) to track air emissions in real time, ensuring compliance with government regulations. On top of that, CDI’s Dry Low NOx Burner (DLN) technology helps reduce NOx emissions, supporting a cleaner and healthier atmosphere.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_award_3.svg'),
                            title: '',
                            description: `
                                <p>Recognizing CDI’s leadership in energy transition, CDI was awarded the "Private Sector Energy Provider in Energy Transition" by the National Energy Council in 2023.</p>
                            `
                        }
                    ]
                },
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/waste_management.webp'),
                    title: 'Waste Management',
                    align: 'left',
                    content: `
                        <p>As part of CDI’s waste reduction strategy, CDI supports plastic waste recycling through the third-party program of PT Krakatau Chandra Energi's Fostered Waste Bank, namely Yayasan Al Busniyah. CDI’s commitment to sustainability extends to achieving zero waste to landfills, ensuring that all waste is reused or treated responsibly. And every 3 month delivered recycle garbage for Bank Sampah Al Bustaniyah.</p>
                        <p>The Waste Bank was built to handle waste processing and make people aware of a healthy, clean and neat environment.</p>
                    `
                },
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/climate_resilience.webp'),
                    title: 'Climate Resilience',
                    align: 'right',
                    content: `
                        <p>Amid rising climate concerns, society is embracing a low-carbon future, with stakeholders ranging from governments to eco-conscious consumers driving sustainability efforts. Globally, commitments from UN Climate Change Conference (COP) 26 and Indonesia's ENDC are accelerating actions to cut greenhouse gas emissions. Notably, at COP 27, accountability for climate action now includes businesses such as CDI, which as Indonesia’s leading chemical and infrastructure company, committed to lead in sustainability and integrate green practices into growth strategies.</p>
                        <p>For CDI, climate resilience strategy starts with climate risk assessment, leading to a decarbonization roadmap that support Indonesia’s Net Zero Emission Target, aligned with  ENDC and LTS-LCCR 2050. We chart an additional course, preparing for rigorous regulations and stakeholder expectations while striving to adhere to science-based targets (SBT).</p>
                    `
                },
                {
                    type: 'grid',
                    grid_type: 'icon_content_card',
                    image: asset('assets/frontend/images/sustainability/decarbonisation_strategy.webp'),
                    title: 'Decarbonisation Strategy',
                    align: '',
                    content: '',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/icon_text_a.svg'),
                            title: 'Abate existing emission through energy efficiency',
                            description: `
                                <p>Process modification, equipment substitution, waste- heat recovery, digitalization, loss reduction, energy consumption management, and increasing operational efficiency.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/icon_text_b.svg'),
                            title: 'Balance future emission by incorporated green business',
                            description: `
                                <p>Business expansion with lower emission, expanding renewable energy business, study on green or sustainable product development, circular plastic, a new chemical pathway, and potential business from nature-based solution</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/icon_text_c.svg'),
                            title: 'Control Emission Through Green Technology Application',
                            description: `
                                <p>Study on low carbon fuel application such as blue/green H2, RDF and CCUS implementation in collaboration with technology and service providers.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/icon_text_d.svg'),
                            title: 'Decarbonize Through Nature Based Solution',
                            description: `
                                <p>Providing nature-based solutions such as forestry practices, blue carbon, restorative agriculture, and marine practices</p>
                            `
                        }
                    ]
                },
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/circular_economy.webp'),
                    title: 'Advancing Sustainability through the Circular Economy',
                    align: 'left',
                    content: `<p>CDI adopts a dual circularity approach, with an internal strategy dedicated to enhancing waste management within operational processes and an external strategy focusing on community-level material use management.</p>`
                },
                {
                    type: 'grid',
                    grid_type: 'box_icon_card',
                    image: '',
                    title: '',
                    align: '',
                    content: '',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/ic_biomass_energy.svg'),
                            title: 'Ensuring Circularity Across Our Operations',
                            description: `
                                <p>We are incorporating circular economy principles internally into our operational strategy to reduce waste and promote material reuse. By using the 4R approach—reduce, reuse, recycle, and recover—we aim to minimize waste generation and encourage a circular flow of resources. Our goal is to enhance waste management practices and move towards a more sustainable operational model.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_eco_energy.svg'),
                            title: 'Promoting External Circularity with Communities',
                            description: `
                                <p>The second aspect of CDI’s circularity strategy focuses on managing material use at the community level. This includes efforts to promote plastic waste management in the community through educational outreach initiatives aimed at raising awareness about the importance of plastic recycling and the advantages of a circular economy.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_rec_le_01.svg'),
                            title: 'Plastic Asphalt Road Journey',
                            description: `
                                <p>Since its inception in 2018, the program has exceeded target of 100 kg of roads using plastic waste materials in 2023, demonstrating CDI’s commitment to sustainability and environmental responsibility. Furthermore, 2024 onwards focusing on stakeholder collaboration for plastic asphalt road implementation. Each kilometre of the plastic asphalt road incorporates approximately 1.6 tons of plastic waste, equivalent to recycling approximately 1.2 million plastic bags, showcasing tangible environmental impact and community engagement.</p>
                            `
                        }
                    ]
                },
            ]
        } else if (props.type == 'social') {
            items.value = [
                {
                    type: 'simple_text_information',
                    grid_type: '',
                    grid_direction: '',
                    image: asset('assets/frontend/images/sustainability/health_and_safety_culture_background.webp'),
                    title: 'Health and Safety Culture ',
                    align: '',
                    content: `
                        <p>CDI’s safety commitment is reflected in the SMK3-certified Occupational Health & Safety System, also complemented by the ISO 45001:2018 certification. Through strict safety protocols, CDI has maintained a zero Lost Time Accident (LTA) record for three consecutive years (2021-2024).</p>
                        <p>In recognition of CDI’s workplace safety excellence, CDI received the Zero Accident Award from the Banten Provincial Manpower and Transmigration Office, and Ministry of Manpower.</p>
                    `,
                    content_grid: [
                        {
                            icon: '',
                            title: 'ZERO',
                            description: `Lost Time Accident 2021-2024`
                        },
                        {
                            icon: '',
                            title: '100%',
                            description: `Certified ISO 45001`
                        },
                        {
                            icon: '',
                            title: 'ZERO',
                            description: `Accident`
                        }
                    ]
                },
                {
                    type: 'file_information',
                    background: 'darkest',
                    grid_type: '',
                    grid_direction: 'col',
                    image: '',
                    title: 'Human Rights',
                    align: 'left',
                    content: `
                        <p>CDI’s places significant emphasis on respecting human rights and fostering justice in the workplace, guided by fundamental principles of equality and fairness without bias. We hold ourselves to international human rights norms and are committed to equitable treatment, equal opportunities, and a supportive workplace culture that values employee contributions. This is ensured through training on human rights for everyone who works for or with CDI.</p>
                        <p>Our Human Rights Policy showcases a deep commitment to upholding essential human rights that are aligned with the United Nations Universal as well as the International Labor Organization. This policy reflects stringent business ethics standards and includes a Whistleblowing Management Policy, providing a secure channel for employees and stakeholders to report concerns of discrimination or unfair treatment confidentially, fostering a culture of support and respect within the organization.</p>
                    `,
                    file_information: {
                        id: '1',
                        title: 'Human Rights Policy',
                        description: '',
                        size: '12MB'
                    }
                },
                {
                    type: 'grid',
                    grid_type: 'featured_image_card',
                    grid_direction: 'col',
                    grid_pattern: 'zig-zag',
                    image: '',
                    title: 'Human Capital',
                    align: '',
                    content: ``,
                    content_grid: [
                        {
                            icon: asset('assets/frontend/images/sustainability/humanity_1.webp'),
                            title: 'Career Development',
                            description: `
                                <p>CDI sees employees as the key driver to growth and success. CDI is committed to fostering competency and career development through structured training programs, leadership development, and upskilling initiatives tailored to industry needs. </p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/images/sustainability/humanity_2.webp'),
                            title: 'Competency',
                            description: `
                                <p>CDI’s talent development strategy ensures that every team member has a clear career path and the necessary resources to reach their full potential.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/images/sustainability/humanity_3.webp'),
                            title: 'Empowering Employees',
                            description: `
                                <p>By providing continuous learning opportunities, mentorship, and professional certifications, CDI empowers employees to grow, innovate, and contribute to the company’s long-term vision. </p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/images/sustainability/humanity_4.webp'),
                            title: 'Diversity',
                            description: `
                                <p>CDI also believes in fostering a diverse and inclusive workplace, where everyone has equal opportunities to grow and succeed. CDI’s hiring, promotion, and compensation policies are based on merit, ensuring fairness at every level. Through these efforts, CDI aims to create a workplace culture that values collaboration, innovation, and respect for all individuals.</p>
                            `
                        }
                    ]
                },
                {
                    type: 'grid',
                    grid_type: 'image_content_card',
                    grid_direction: 'col',
                    image: '',
                    title: 'Practices of Occupational Health and Safety',
                    align: '',
                    content: `
                        <p>CDI implements employment practices grounded in occupational health and safety (OHS) principles, ensuring that every employee works in a safe and healthy environment that complies with OHS regulations and standards. Our top priority is to foster a workplace culture that emphasizes safety and well-being for all employees. </p>
                        <p>We enhance workplace safety protocols and maintain a healthy environment through proactive measures and ongoing training initiatives, supporting the optimal performance and welfare of our workforce.</p>
                    `,
                    content_grid: [
                        {
                            icon: asset('assets/frontend/images/sustainability/ohs_management_system_image.webp'),
                            title: 'Compliance with OHS Management System',
                            description: `
                                <p>We adopt the Occupational Health and Safety Management System (OHSMS) to prevent work accidents and environmental pollution. OHSMS is applied to 100% to all our employees and business partners, guided by national regulations and global standards.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/images/sustainability/life_saving_rules_image.webp'),
                            title: 'Life Saving Rules',
                            description: `
                                <p>These are the golden rules, we adopt for a workplace safety program with mandatory safety regulations for everyone in the company, along with penalties for violations. These rules are recognize that workplace safety is a shared responsibility that requires the contributions, vigilance, and care of all employees.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/images/sustainability/process_safety_management_image.webp'),
                            title: 'Process Safety Management',
                            description: `
                                <p>CDI has established a process safety management (PSM) system to prevent catastrophic incidents. This system employs various hazard management techniques to mitigate the risks associated with the release of hydrocarbons, chemicals, or other energy sources.</p>
                            `
                        }
                    ]
                },
                {
                    type: 'grid',
                    background: 'darkest',
                    grid_type: 'box_icon_card',
                    grid_direction: 'row',
                    grid_pattern: 'zig-zag',
                    image: '',
                    title: 'Product Responsibility',
                    align: '',
                    content: 'The Company realizes that the service of quality product to customers is an important key to the ongoing success of business. Therefore, the Company actively builds an effective communication line with the customers and coupled with a strict production supervision to ensure the product quality comply with the standards.',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/ic_frameworks_outline.svg'),
                            title: 'Product Management Framework',
                            description: `
                                <p>CDI employs several product management systems, including Responsible Care®, SNI, Halal, and ISO 9001, to ensure product safety throughout its lifecycle. These management systems encompass not only regulatory compliance but also strategies to mitigate risks related to health, safety, and environmental factors.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_idea_outline.svg'),
                            title: 'Customer-Centric Solutions',
                            description: `
                                <p>Every customer of CDI is a priority stakeholder who can strongly influence business continuity. Understanding this importance, we implement a proactive service to assure service satisfaction at all times.&nbsp.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_test_tube_outline.svg'),
                            title: 'Chemical and Product Stewardship',
                            description: `
                                <p>To ensure that the use and handling of chemicals are carried out following applicable requirements, CDI undertakes activities including chemical hazard assessment, chemical registration, chemical hazards emergency response, and marketing and products labelling.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_renewable_energy_outline.svg'),
                            title: 'Sustainable Products',
                            description: `
                                <p>Our sustainability is demonstrated by the integration of clean technologies and principles, and environmentally friendly product innovations within our green business endeavours. Achieving the International Sustainability & Carbon Certification (ISCC) for our products is a significant milestone for us. With ISCC certification, we are optimistic about exploring opportunities to transition to the use of bio-feedstock as an alternative feedstock.</p>
                            `
                        }
                    ]
                }
            ]
        } else if (props.type == 'governance') {
            items.value = [
                {
                    type: 'file_information',
                    background: 'normal',
                    grid_type: '',
                    grid_direction: 'row',
                    image: asset('assets/frontend/images/sustainability/business_ethics.webp'),
                    title: 'Business Ethics',
                    align: 'left',
                    content: `
                        <p>PT Chandra Daya Investasi Tbk (CDI) upholds strong Business Ethics standards to ensure integrity, transparency, and accountability across all operations. Guided by a Code of Conduct emphasizing honesty, fairness, and respect, employees undergo training to uphold ethical standards and report any concerns through the Company's Whistleblowing System. Individual behaviour is regulated by our iSTAR values and internal Code of Conduct, both of which emphasize professionalism, integrity, and ethical conduct at every level. This commitment to Business Ethics and the Code of Conduct fosters a culture of responsibility, compliance, and ethical business practices essential for optimal governance and sustainable operations.</p>
                    `,
                    file_information: {
                        id: '1',
                        title: 'Our Code of Conduct',
                        description: '',
                        size: '12MB'
                    }
                },
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/grievance_mechanism.webp'),
                    title: 'Grievance Mechanism',
                    align: 'left',
                    content: `
                        <p>Grievance System provides employees with a confidential mechanism to address concerns within the realm of industrial relations. The Company ensures informant confidentiality, allowing individuals to report complaints without fear of repercussions. Reports are taken seriously and investigated promptly, with appropriate sanctions enforced for proven violations.</p>
                        <p>We promptly and fairly address grievances to create a transparent and supportive work environment. We have established clear procedures for submitting complaints, conducting investigations, and providing resolution guidelines. We believe that effective grievance mechanisms help us identify and resolve issues, enhance employee satisfaction, and ensure compliance with legal and ethical standards.</p>
                    `
                },
                {
                    type: 'grid',
                    background: 'darkest',
                    grid_type: 'box_icon_card',
                    grid_direction: 'row',
                    grid_pattern: '',
                    image: '',
                    title: 'Sustainable Procurement',
                    align: '',
                    content: 'CDI places a strong emphasis on sustainable procurement by integrating ESG (Environmental, Social, and Governance) considerations into its supply chain processes.',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/ic_product_loading.svg'),
                            title: '',
                            description: `
                                <p>In terms of governance, we ensure equal treatment for all potential suppliers, regardless of their origin, and expects compliance with our Code of Conduct. The procurement process involves the Contracts and Procurement Department working in conjunction with the Contracts Committee, overseen by the Board of Directors. Prospective suppliers undergo a pre-qualification stage before participating in the tender process, with evaluations based on various criteria like legal suitability, quality control systems, and adherence to safety regulations.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_health.svg'),
                            title: '',
                            description: `
                                <p>Additionally, Chandra Daya Investasi maintains a Contractor Safety, Health, and Environment Plan to prioritize operational safety for workers and mitigate environmental impacts. We require our work partners to abide by environmental regulations and uphold safety standards, demonstrating a commitment to human rights and workplace justice in all business partnerships.</p>
                            `
                        }
                    ]
                },
                {
                    type: 'grid',
                    background: 'darkest',
                    grid_type: 'box_icon_card',
                    grid_direction: 'col',
                    grid_pattern: '',
                    image: asset('assets/frontend/images/sustainability/sustainable_procurement_background.webp'),
                    title: 'Cyber Security',
                    align: '',
                    content: 'Chandra Daya Investasi prioritizes information security within its governance framework, recognizing the critical importance of information and IT systems as essential business assets. We emphasize the availability, integrity, and confidentiality of information to ensure our competitive edge, profitability, legal compliance, and reputation.',
                    content_grid: [
                        {
                            icon: asset('assets/frontend/icons/ic_security_password.svg'),
                            title: 'Policy Management',
                            description: `
                                <p>We have implemented IT policies and a User Access and Security Policy to ensure business continuity, minimize the impact of security incidents as well as to protect the privacy of personal information.</p>
                            `
                        },
                        {
                            icon: asset('assets/frontend/icons/ic_computer_protection.svg'),
                            title: 'Security Operation System Initiatives',
                            description: `
                                <p>A key initiative to enhance cybersecurity is the establishment of a Security Operations Center. This center proactively monitors the IT infrastructure, allowing for the timely detection of cybersecurity alerts and incidents.</p>
                            `
                        }
                    ]
                },
                {
                    type: 'content_swiper',
                    grid_type: '',
                    image: '',
                    title: 'Three fundamental components of information security management',
                    align: '',
                    content: ``,
                    content_grid: [
                        {
                            number: 1,
                            icon: asset('assets/frontend/images/sustainability/three_fundamental_security_confidentiality.webp'),
                            title: 'Confidentiality',
                            description: 'Safeguarding sensitive information from unauthorized access or disclosure.'
                        },
                        {
                            number: 2,
                            icon: asset('assets/frontend/images/sustainability/three_fundamental_security_integrity.webp'),
                            title: 'Integrity',
                            description: 'Ensuring the accuracy and completeness of information and software.'
                        },
                        {
                            number: 3,
                            icon: asset('assets/frontend/images/sustainability/three_fundamental_security_availability.webp'),
                            title: 'Availability',
                            description: 'Making certain that critical information and services are accessible to users only when required.'
                        },
                        {
                            number: 4,
                            icon: asset('assets/frontend/images/sustainability/three_fundamental_4.webp'),
                            title: 'Accountability',
                            description: 'Ensuring that actions and changes in the system can be traced back to responsible entities, preventing denial of responsibility'
                        }
                    ]
                },
                {
                    type: 'content',
                    grid_type: '',
                    image: asset('assets/frontend/images/sustainability/governance_performance.webp'),
                    title: 'Governance Performance',
                    align: 'right',
                    content: `
                        <p>In terms of governance, our performance is guided by our Code of Conduct and includes thorough supply chain assessments to ensure ethical practices across our operations.</p>
                        <p>We are committed to maintaining high governance standards by regularly evaluating compliance with our ethical guidelines, which enhances transparency and accountability while mitigating risks.</p>
                    `
                }
            ]
        }
    })

</script>
