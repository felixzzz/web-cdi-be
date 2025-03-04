<template>
    <div
        class="bg-blue-dark py-20 text-white bg-contain bg-no-repeat bg-right relative" id="whistleblowing"
    >
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">Whistleblowing</p>
                    <div class="content">
                        <p>The Whistleblowing Management Policy reflects our dedication to upholding our Code of Conduct. This system is designed as a tool to assist all Chandra Asri Group employees, including those in our subsidiaries and joint ventures and stakeholder including but not limited to business partner, supplier or vendor, customer, contractor, agent, consultant and/or any other third party who works with, for or represents Chandra Asri Group in are also encouraged to consult with or report any suspected violations to Chandra Asri Group management.</p>
                    </div>

                    <Link href="" class="px-6 py-2 rounded-full border border-white flex items-center gap-2 w-fit mt-8">
                        See All <i class="isax icon-arrow-right-1 -rotate-45"></i>
                    </Link>
                </div>

                <div class="lg:col-span-2">
                    <p class="mb-8 text-2xl lg:text-[28px] font-light">Complaint Handling Mechanism</p>
                    <img :src="asset('assets/frontend/images/governance/whistleblowing.webp')" alt="">
                </div>


            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset } from '@/Lib/utils'
    import { Link } from '@inertiajs/vue3'

</script>
