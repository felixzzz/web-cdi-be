<template>
    <div
        class="pb-[88px] pt-28 bg-blue-dark relative overflow-hidden bg-cover bg-no-repeat"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/homepage/expanding_business.webp')})`
        }"
    >
        <container class="grid lg:grid-cols-2 gap-10 relative">
            <div>
                <h2 class="font-medium text-blue-lighter text-4xl lg:text-[52px] max-w-2xl">
                    Expanding Business Horizons In Infrastructure Development
                </h2>
                <Link href="" class="bg-white text-blue-base px-6 py-2 border border-neutral-13 rounded-full whitespace-nowrap gap-3 flex items-center w-fit mt-10">
                    About Us <i class="isax icon-arrow-right-1 -rotate-45 text-xl"></i>
                </Link>
            </div>
            <div class="text-neutral-4">
                <p>
                    Recognize significant opportunity to develop infrastructure business in Cilegon, where the demand for robust infrastructure is rapidly growing.  Leveraging Cilegon’s strategic position as an industrial hub, CDI is poised to expand its influence and contribute to the region’s development.
                </p>
                <br>
                <p>
                    CDI’s asset are secured by long-term contracts with reputable stable cash flow and a high pass-through capability. This provides company with enhanced margin-generation potential, positioning CDI for long-term success in the infrastructure sector. With diversified portfolio spanning industrial water, energy, port and storage services, and logistics, CDI is building a strong presence in key infrastructure.
                </p>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

</script>
