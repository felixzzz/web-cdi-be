<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/port_storage_overview.webp')})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="lg:max-w-[45%] ms-auto">
                    <p class="text-2xl lg:text-[28px] font-medium mb-6 text-blue-lighter">Overview</p>
                    <div class="content !text-neutral-5" v-html="content"></div>
                </div>
            </container>
        </div>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'


    const content = `
            <p>CDI manages its own port services, including deep-sea jetties and liquid bulk storage facilities available for rental to support efficient handling of raw materials and finished products. In response to Indonesia's increasing demand for imported chemicals and processed petrochemical products, our port operations offer tailored solutions for leading clients to ensure smooth logistics and supply chain management.</p>
        `

</script>
