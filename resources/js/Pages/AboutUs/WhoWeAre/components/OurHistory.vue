<template>
    <section id="our-history">
        <div
            v-for="(item, i) in data" :key="i"
            class="py-28 text-white bg-blue-dark bg-cover relative"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="overlay-history"></div>
            <container class="relative z-[1]">
                <div class="max-w-[880px] mx-auto">
                    <p class="text-neutral-4 mb-4">Our History</p>
                    <h2 class="text-shadow-2 font-medium text-2xl lg:text-[38px] lg:leading-[44px] max-w-2xl mb-8">
                        {{ item.name }}
                    </h2>
                    <div class="content !text-neutral-5" v-html="item.content"></div>
                </div>
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { ref } from 'vue'



    const data = ref([
        {
            name: 'Cilegon as an Industrial Hub',
            image: asset('assets/frontend/images/about/our_history_1.webp'),
            content: `
            <p>Located in Banten Province on the southern coast of Java Island, Cilegon offers strategic access to international ports and is ideally situated near Jakarta, making it prime location for industrial activities. Its geographic advantage ensures efficient logistics and the seamless distribution good, establishing Cilegon as a key player in Indonesia’s industrial landscape. Since the 1970’s, Cilegon has undergone continues transformation info a major industrial hub, driven by the development of advanced industrial facilities and robust infrastructure.  Today, it stands as one of the most important centers of industry in Indonesia, home to a diverse range of sectors including chemical, steel and energy.</p>
            <p>The Indonesian government strongly supports the growth of Cilegon with policies designed to foster the development of industrial sector. This includes ongoing infrastructure upgrades, investment incentives, and regulatory support, all of which have attracted numerous large domestic and international companies to establish operations in the area.</p>
            `
        },
        {
            name: 'Expanding Business Horizons in Infrastructure Development',
            image: asset('assets/frontend/images/about/our_history_2.webp'),
            content: `
            <p>CDI recognizes significant opportunities to develop infrastructure across Java/Indonesia, where the demand for robust and sustainable infrastructure is rapidly growing. Leveraging Cilegon’s strategic position as an industrial hub and the broader potential of the region, CDI is poised to expand its influence and contribute to the nation’s development</p>
            <p>With diversified portfolio spanning industrial water, energy, port and storage services, and logistics, CDI is building a strong presence in key infrastructure.</p>
            `
        }
    ])

</script>
