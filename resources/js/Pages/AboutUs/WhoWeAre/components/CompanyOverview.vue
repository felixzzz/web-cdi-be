<template>
    <div class="py-20 bg-blue-dark relative" id="company-overview">
        <div
            class="absolute top-0 left-0 right-0 bottom-0 bg-contain bg-no-repeat bg-right"
            :style="{
                'backgroundImage': `url(${asset('assets/frontend/images/about/company_overview_background.webp')})`
            }"
        ></div>

        <container class="relative z-[1]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <div class="lg:col-span-6">
                    <img :src="asset('assets/frontend/logo_cdi_footer.svg')" alt="" class="h-20 mb-4">
                    <p class="font-medium text-[22px] text-blue-lighter mb-[10px]">#Your Growth Partner</p>
                    <div class="content">
                        <p><b>PT Chandra Daya Investasi (CDI)</b> is an infrastructure investment arm of <b>Chandra Asri Group</b>, a leading provider of energy chemicals and infrastructure solutions in Southeast Asia and ECGO, a holding company which focuses on power business investment in Thailand. CDI operates primarily in the infrastructure sector, concentrating on providing solutions that support industrial growth throughout Southeast Asia.</p>
                        <p>CDI’s diverse operations span several interconnected businesses pillars, including water supply and treatment, energy, port & storage, and logistics. CDI is committed to contributing the development and fulfillment of critical infrastructure needs, driving sustainable economic growth in the region.</p>
                        <p>As a forward-thinking company, CDI continues to work towards becoming a leader in the infrastructure sector in both Indonesia and Southeast Asia.  Innovation, efficiency and sustainability are at the core of  all its business pillars.</p>
                        <p>CDI has formed strategic partnerships with reputable domestic and global leaders, such as Krakatau Steel Group, Salim Group and Posco, adding value and expertise to its operations and strengthening its market position.</p>
                    </div>
                </div>
                <div class="lg:col-span-6">
                    <img :src="asset('assets/frontend/images/about/company_overview.webp')" alt="" class="w-full lg:w-[80%] rounded-xl ms-auto">
                </div>
            </div>
        </container>

    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'



</script>
