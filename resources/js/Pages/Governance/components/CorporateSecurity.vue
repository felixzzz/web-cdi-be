<template>
    <div class="pt-20 bg-blue-dark text-white" id="corporate-security">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16">
                <div class="lg:col-span-2">
                    <img
                        :src="asset('assets/frontend/images/governance/corporate_secretary_jaka.webp')" alt=""
                        class="aspect-square object-cover rounded-[20px] mb-6"
                    >
                    <p class="mb-1 font-medium text-lg lg:text-[22px]">
                        Jaka Dibya Ananta Satari
                    </p>
                    <p class="mb-0 text-sm lg:text-base font-light">Corporate Secretary</p>
                </div>

                <div class="lg:col-span-3">
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">Corporate Secretary</p>
                    <div class="content mb-8">
                        <p>In order to improve transparency, service, and communication to the stakeholders as the implementation of good corporate governance principles, Chandra Asri Group appointed a Corporate Secretary who is responsible directly to the Board of Directors.</p>
                        <p>Corporate Secretary plays an important role in maintaining relationships with all stakeholders in order to communicate Chandra Asri Group’s activities well, especially regarding the disclosure of information. This is in accordance with the provisions set out in the Financial Services Authority Regulation No. 35/ POJK.04 /2014 concerning Corporate Secretary of Issuer or Public Company.</p>
                        <p>Duties and responsibilities of Corporate Secretary are as follows:</p>
                        <ol class="list-decimal">

                            <li>Manage information related to the business environment and conduct correspondence with interested party in the capital markets, including the Financial Services Authority (OJK) and Indonesia Stock Exchange (IDX).</li>
                            <li>Ensure the Company implements GCG principles and comply with applicable laws and regulations on the stock exchange and capital markets, including the Law of Limited Liability Company.</li>
                            <li>Organize GMS, Meeting of the Board of Directors and Board of Commissioners, and Board of Directors Meeting.</li>
                            <li>Organize communication activity between Management with stakeholders in order to build the image of the Company.</li>
                            <li>Organize secretarial activities of Chandra Asri Group’s Management as well as facilitating the relationship of the Company/Management with stakeholders.</li>
                        </ol>
                    </div>

                    <div class="button-gradient-custom">
                        <div class="flex flex-col gap-2">
                            <p class="text-[22px] font-medium">Read Our Article of Association</p>
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
