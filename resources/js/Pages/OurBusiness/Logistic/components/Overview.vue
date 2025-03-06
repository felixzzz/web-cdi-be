<template>
    <div>
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/ourbusiness/logistics_overview.webp')})`
            }"
        >
            <div class="absolute inset-0 overlay-business"></div>
            <container class="relative z-[1]">
                <div class="max-w-[45%] ms-auto">
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
            <p>In 2024, CDI expanded its infrastructure business in the logistic and cold chain sector with the establishment of PT Chandra Shipping International (CSI), PT Chandra Cold Chain (CCC), and acquisition of PT Marina Indah Maritim (MIM). CSI and MIM are active in the shipping industry and currently manage a fleet of 7 chemical and LPG transport vessels. </p>
        `

</script>
