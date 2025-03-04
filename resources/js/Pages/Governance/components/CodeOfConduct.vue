<template>
    <div class="py-20 bg-blue-dark text-white" id="code-of-conduct">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                <div class="lg:col-span-4">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">Code of Conduct</p>
                    <div class="content">
                        <p>Chandra Asri Group has a Code of Conduct (CoC) as guidance in act and the implementation of Good Corporate Governance. CoC is a written provisions that is used as reference in conducting business activities that must be understood and carried out every day. CoC also regulates corporate behaviour and individual behaviour related to compliance, health and safety, conflicts of interest management, compliance with laws, procurement, security of information and assets, and public information disclosure.</p>
                        <p>CoC applies to all employees and management (Board of Directors and Board of Commissioners) of Chandra Asri Group as well as its subsidiaries and every joint venture company within Chandra Asri Group’s control. It is expected that every Employee; and stakeholder, including but not limited to a business partner, a supplier or vendor, a customer, a contractor, an agent, a consultant and/or any other third party who works with, for or represent Chandra Asri Group must understand and follow this Code of Conduct.</p>
                        <p>Evaluation of CoC implementation is conducted periodically to ensure that all elements of the Company has been running the business rules based on the ethics and high standards that have been set. In addition, a review of CoC is conducted to determine whether it requires changes and/or adjustments of regulations in connection with the development of Chandra Asri Group’s business.</p>
                    </div>
                </div>
            </div>

            <div class="button-gradient-custom mt-8">
                <div class="flex flex-col gap-2">
                    <p class="text-[22px] font-medium">Our Code of Conduct</p>
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

            <div class="py-20">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 mb-8">
                    <div class="lg:col-span-4">
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">SHE Regulation</p>
                        <div class="content">
                            <p>The below handbook has been developed to socialize SHE regulation information to all Chandra Asri Group and its subsidiaries employee, and contractor staffs who work in the CAP and its subsidiaries premises.</p>
                            <p>This regulation shall apply to all facilities and businesses of the Chandra Asri Group and its subsidiaries, and joint venture companies over which CAP has management control, regardless of type, size and product provided.</p>
                            <p>All Chandra Asri Group and its subsidiaries, and contractor staffs are expected to follow rules and regulation in the below strictly so that all activities can be executed smoothly and orderly, conflicts can be minimized and finally all of us can achieve target in all aspects of safety, schedule, quality and cost.</p>
                            <p>Please download the below rules and regulation (which divided into 4 (four)) download links, should you have any question or difficulties, please contact your superior or CAP staffs who are responsible for your activities.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-8">
                    <div class="button-gradient-custom" v-for="i in 4" :key="i">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">
                                {{
                                    i == 1 ? 'SHE Regulation'
                                    : (
                                        i == 2 ? 'Life Saving Rules Procedure'
                                        : (
                                            i == 3 ? 'Life Saving Rules Violation Procedure'
                                            : 'SHEQEn Management Policy'
                                        )
                                    )
                                }}
                            </p>
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
