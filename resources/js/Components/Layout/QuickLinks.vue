<template>
    <div
        class="py-20 bg-neutral-3 bg-contain lg:bg-cover bg-no-repeat bg-bottom"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/homepage/quick_links.webp')})`
        }"
    >
        <container>
            <div class="grid grid-cols-2">
                <div>
                    <p class="text-neutral-7 text-base mb-4">QUICK LINKS</p>
                    <p class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-0 max-w-[414px]">Need to access detailed information?</p>
                </div>
                <div class="flex flex-col gap-8">
                    <Link
                        v-for="item in menu" :key="item.name"
                        class="flex items-center justify-between text-neutral-13 border-b border-b-neutral-5 pb-8"
                        :href="item.route"
                    >
                        <p class="text-[22px] font-medium">
                            {{ item.name }}
                        </p>
                        <i class="isax icon-arrow-right-1 text-2xl"></i>
                    </Link>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'

    const menu = ref([
        {
            name: 'Job Search',
            route: ''
        },
        {
            name: 'Management & Structure',
            route: ''
        },
        {
            name: 'Investor Relations',
            route: ''
        },
        {
            name: 'Environment',
            route: ''
        },
        {
            name: 'Governance',
            route: ''
        }
    ])
</script>
