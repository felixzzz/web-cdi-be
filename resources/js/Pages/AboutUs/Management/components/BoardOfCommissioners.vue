<template>
    <section id="board-of-commissioners">
        <p class="text-white font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center mb-16">
            Board of Commissioners
        </p>

        <div class="flex gap-8 text-white justify-center flex-wrap">
            <div class="flex flex-col items-center text-center w-[282px] group transition-all duration-300" v-for="(item, i) in data" :key="i">
                <div class="flex flex-col items-center text-center">
                    <img :src="item.image" alt="" class="aspect-square overflow-hidden rounded-full object-cover shadow-article mb-5 border-2 border-transparent outline-2 outline-transparent group-hover:outline-blue-lighter ">
                    <p class="text-lg font-medium group-hover:text-blue-lighter">{{ item.name }}</p>
                    <p class="text-base font-normal text-neutral-6">{{ item.position }}</p>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup lang="ts">
    import { asset } from '@/Lib/utils'
    import { ref } from 'vue'


    const data = ref([
        {
            image: asset('assets/frontend/images/governance/audit_1.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_2.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_3.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_3.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_3.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        },
        {
            image: asset('assets/frontend/images/governance/audit_3.webp'),
            name: 'Board Commissioner',
            position: 'Commissioner'
        }
    ])

</script>
