<template>
    <div class="flex aspect-video">
        <div
            v-for="(item, index) in data" :key="index"
            class="relative w-[25%] bg-cover bg-center bg-no-repeat text-white cursor-pointer transition-all duration-1000 ease-in-out flex-grow"
            :style="{ backgroundImage: `url(${item.image})` }"
            @mouseover="hoverIndex = index"
            @mouseleave="hoverIndex = null"
            :class="{
                'w-[40%]': hoverIndex === index, 'w-[calc((100%-40%)/(data.length-1))]': hoverIndex !== null && hoverIndex !== index
            }"
            @click="redirect(item, false)"
        >
            <div class="absolute inset-0 overlay-card-2"></div>
            <div class="absolute inset-0 flex flex-col justify-end px-5 lg:px-10 pb-5 lg:pb-10 pt-10 text-white z-10">
                <h1
                    :class="{
                        'font-medium text-2xl lg:text-[38px] lg:leading-[44px]': hoverIndex === index,
                        'font-medium text-2xl lg:text-[52px] lg:leading-[60px]': hoverIndex !== index,
                    }"
                >{{ item.title }}</h1>
                <div
                    class="overflow-hidden transition-all duration-[5000, 500] ease-in-out max-h-0"
                    :class="{ 'max-h-full opacity-100 mt-2': hoverIndex === index }"
                >
                    <div class="content !text-white !text-sm !font-light opacity-0 transition-all duration-2000 ease-in-out" :class="{ 'opacity-100': hoverIndex === index }" v-html="item.description"></div>
                    <div class="flex mt-8 gap-2">
                        <div
                            v-for="(company, companyIndex) in item.companies" :key="companyIndex"
                            class="px-[15px] py-[6px] rounded-full border border-white text-sm flex items-center gap-2 cursor-pointer"
                            @click.stop="redirect(item, true, company)"
                            @click="redirect(item, true, company)"
                        >
                            {{ company }}
                            <i class="isax icon-arrow-right-1"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pt-16 pb-28 bg-blue-dark">
        <container>
            <p class="text-neutral-5">This strategic business development allows CDI to play a key role in meeting the growing infrastructure demands in Indonesia, positioning us for long-term success across multiple sectors.  Looking ahead, CDI is well-positioned to play a critical role in the continued development of the industrial sector not only in Indonesia but also across Southeast Asia. Through innovation, investment and strategic growth, CDI is becoming a cornerstone of the region’s infrastructure landscape.</p>
        </container>
    </div>
</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { router } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const hoverIndex = ref<number | null>(null)


    const data = ref([
        {
            image: asset('assets/frontend/images/ourbusiness/our_business_what_we_do_energy.webp'),
            title: 'Energy',
            route: route('our-business.energy'),
            description: `
                <p>Our energy business and operations are managed under PT Krakatau Chandra Energi (KCE), in which we hold a 70% stake, acquired from PT Krakatau Sarana Infrastruktur, a subsidiary of PT Krakatau Steel (Persero) Tbk, in 2023. This acquisition strengthens our ability to support strategic sectors in Indonesia, while offering synergies and providing the necessary supporting utilities for future growth and expansion. The targeted growth also includes renewable energy (EBT) businesses, where CDI, through KCE, is committed to becoming a pioneer in driving the energy transition toward a more sustainable future, supporting the government's target of achieving net zero emissions by 2060.</p>
            `,
            companies: ['Electricity Supply', 'Electrical Services', 'Renewable Energy']
        },
        {
            image: asset('assets/frontend/images/ourbusiness/our_business_what_we_do_water.webp'),
            title: 'Water',
            route: route('our-business.water'),
            description: `
                <p>Our water business and activities are operated by our affiliate company <b>PT Krakatau Tirta Industri (KTI)</b>, in which we hold a <b>49% stake acquired</b> from <b>PT Krakatau Sarana Infrastruktur</b>, a subsidiary of PT Krakatau Steel (Persero) Tbk, in <b>2023</b>. Our industrial water business includes: clean water, demineralized water, and wastewater management.</p>
            `,
            companies: ['CLEAN WATER', 'DEMIN WATER', 'WASTEWATER TREATMENT']
        },
        {
            image: asset('assets/frontend/images/ourbusiness/our_business_what_we_do_ports_storage.webp'),
            title: 'Ports & Storage',
            route: route('our-business.ports-and-storage'),
            description: `
                <p>CDI also operates  a portfolio of ports and tank services specializing in  refined chemical and petroleum products.  CDI subsidiary which operate in this sector are <b>PT Chandra Samudera Port (CSP) and PT Redeco Petrolin Utama (RPU)</b>. CDI serves <b>reputable multinational clients with potential growth from key global traders such as Aramco, Glencore, Shell and other players.</b></p>
            `,
            companies: ['PT Chandra Pelabuhan Nusantara', 'PT Redeco Petrolin Utama']
        },
        {
            image: asset('assets/frontend/images/ourbusiness/our_business_what_we_do_logistic.webp'),
            title: 'Logistic',
            route: route('our-business.logistics'),
            description: `
                <p>We are advancing in the shipping and warehousing sector, focusing on meeting the needs of Chandra Asri Group, with plans to extend services to potential external clients in the future. Our logistics operation include <b>PT Chandra Shipping International (CSI), PT Marina Indah Maritim (MIM), and PT Chandra Cold Chain (CCC).</b></p>
            `,
            companies: ['Key Assets']
        }
    ])

    const redirect = (item: any, child: boolean, tabName?: string) => {
        console.log(tabName)
        if (!child) {
            router.visit(item.route)
        } else {
            router.visit(item.route, {
                data: {
                    tab: tabName
                }
            })
        }
    }
</script>
