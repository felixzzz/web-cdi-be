<template>
    <div class="py-12 bg-blue-dark text-white bg-[url(assets/frontend/images/footer.webp)] bg-contain bg-no-repeat bg-center">
        <container>
            <div class="flex items-center justify-between mb-10">
                <div>
                    <p class="text-base mb-4 font-medium">A member of</p>
                    <img src="assets/frontend/logo_cdi_footer.svg" alt="" class="h-12">
                </div>
                <div>
                    <Link href="" class="bg-white text-blue-base px-6 py-2 rounded-full whitespace-nowrap">
                        Contact Us
                    </Link>
                </div>
            </div>

            <div class="flex justify-between flex-col lg:flex-row pb-12 mb-12 border-b border-b-neutral-8 gap-y-10 lg:gap-y-0">
                <div class="flex flex-col gap-6 max-w-sm">
                    <p class="font-medium text-[22px]">PT Chandra Daya Investasi Tbk</p>
                    <div class="text-base">
                        <span class="font-medium">Head Office</span>
                        <span class="text-neutral-6 block">Wisma Barito Pacific Tower A, 7th Floor Jl. Let.Jend. S. Parman kav.62-63 Jakarta 11410, Indonesia</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-neutral-6">Phone</span>
                        <span>(62-21) 530 7950</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-neutral-6">Fax</span>
                        <span>(62-21) 530 7950</span>
                    </div>
                </div>

                <div class="flex flex-col gap-8">
                    <Link href="" class="font-medium">
                        Who We Are
                    </Link>

                    <Link href="" class="font-medium">
                        Our Bussiness
                    </Link>

                    <Link href="" class="font-medium">
                        Sustainability
                    </Link>

                    <Link href="" class="font-medium">
                        Investor
                    </Link>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 grid-rows-3 lg:grid-rows-1 items-center text-center lg:text-left">
                <!-- Copyright -->
                <p class="text-xs text-neutral-3 lg:col-start-1 lg:row-start-1">
                    @2025 Chandra Daya Investasi
                </p>

                <!-- Socials (Pindah ke bawah di layar kecil) -->
                <div class="flex gap-4 items-center justify-center row-start-3 lg:row-start-1">
                    <a
                        v-for="(social, index) in socials"
                        :key="index"
                        :href="social.url"
                        target="_blank"
                    >
                        <img :src="social.icon" alt="" class="w-8">
                    </a>
                </div>

                <!-- Menu Links -->
                <div class="flex gap-4 items-center justify-center lg:justify-end lg:col-start-3 lg:row-start-1">
                    <Link v-for="(item, index) in menus" :key="index" class="text-xs text-neutral-3" :href="item.url">
                        {{ item.name }}
                    </Link>
                </div>
            </div>


        </container>
    </div>

</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
    import Container from '../Section/Container.vue'
    import { ref } from 'vue'

    const socials = ref([
        {
            url: '',
            icon: 'assets/frontend/icons/ic_youtube.svg'
        },
        {
            url: '',
            icon: 'assets/frontend/icons/ic_linkedin.svg'
        },
        {
            url: '',
            icon: 'assets/frontend/icons/ic_tiktok.svg'
        },
        {
            url: '',
            icon: 'assets/frontend/icons/ic_x.svg'
        },
        {
            url: '',
            icon: 'assets/frontend/icons/ic_instagram.svg'
        },
        {
            url: '',
            icon: 'assets/frontend/icons/ic_facebook.svg'
        }
    ])

    const menus = ref([
        {
            url: '',
            name: 'Terms & Conditions'
        },
        {
            url: '',
            name: 'Privacy Policy'
        },
        {
            url: '',
            name: 'Cookies Consent'
        },
        {
            url: '',
            name: 'Disclaimer'
        }
    ])
</script>
