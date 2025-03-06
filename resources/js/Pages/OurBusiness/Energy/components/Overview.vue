<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/energy_overview.webp')})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="max-w-[45%] ms-auto">
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
            <p>CDI energy business and operations are managed by PT Krakatau Chandra Energi (KCE), which focuses on energy provider, electrical services, and renewable energy solutions.</p>
            <p>KCE's energy solutions are supported by two subsidiaries, PT Krakatau Sarana Energi (KSE) and PT Krakatau Posco Energy (KPE). KSE focuses on developing fuel stations and vehicles to expand electric vehicle (EV) charging stations, supporting renewable energy development. KPE collectively generates 210 MWe to meet the energy needs of internal operations, industries, and the local community in the Cilegon region.</p>
            <p>In the future, CDI plans to develop power plants that will utilize renewable energy sources, including solar and hydropower, to further support sustainable energy solutions.</p>
        `

</script>
