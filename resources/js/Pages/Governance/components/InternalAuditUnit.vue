<template>
    <div class="pt-16 pb-20 bg-blue-dark text-white" id="internal-audit-unit">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-2">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">Internal Audit Unit</p>
                    <div class="content">
                        <p>Chandra Asri Group established an Internal Audit Unit to assist Management in preparing and managing a systematic and orderly approach in implementing its monitoring and evaluation duties on internal control, risk management and corporate governance.</p>
                        <p>Structure and position, duties, responsibilities, authority, as well as requirements and the Code of Conduct of Internal Auditor are set forth in the Internal Audit Charter. Internal Audit Charter was approved by the Decree of the Board of Directors as well as Board of Commissioner, and is used.</p>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <img :src="asset('assets/frontend/images/governance/internal_audit_unit_chart.webp')" alt="" class="w-full">
                </div>
            </div>

            <div class="button-gradient-custom">
                <div class="flex flex-col gap-2">
                    <p class="text-[22px] font-medium">For internal audit charter</p>
                    <div class="flex items-center text-base text-white gap-3">
                        <div class="flex items-baseline gap-3">
                            <span>7MB</span>
                            <span>.</span>
                        </div>
                        <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                    </div>
                </div>

                <div class="flex lg:items-center gap-8 w-full lg:w-fit">
                    <Link href="" class="flex items-center gap-2 text-white font-medium">
                        <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> View
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-white font-medium">
                        <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> Download
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
</script>
