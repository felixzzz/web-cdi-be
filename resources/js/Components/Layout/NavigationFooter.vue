<template>
    <div
        class="py-12 bg-blue-dark text-white bg-contain bg-no-repeat bg-center"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/footer.webp')})`
        }"
    >
        <container>
            <div class="flex items-center justify-between mb-10">
                <div>
                    <p class="text-base mb-4 font-medium">{{ $t('footer.a_member_of') }}</p>
                    <img :src="asset('assets/frontend/logo_cdi_footer.svg')" alt="" class="h-12 cursor-pointer" @click="toHome">
                </div>
                <div>
                    <Link :href="route('contact-us')" class="bg-white text-blue-base px-6 py-2 rounded-full whitespace-nowrap">
                        {{ $t('footer.contact_us') }}
                    </Link>
                </div>
            </div>

            <div class="flex justify-between flex-col lg:flex-row pb-12 mb-12 border-b border-b-neutral-8 gap-y-10 lg:gap-y-0">
                <div class="flex flex-col gap-6 max-w-sm" v-if="content.office">
                    <p class="font-medium text-[22px]">{{ content.office.name }}</p>
                    <div class="text-base">
                        <span class="font-medium">{{ content.office.localized_main.location_name }}</span>
                        <span class="text-neutral-6 block">{{ content.office.localized_main.address }}</span>
                    </div>
                    <div class="flex items-center gap-2" v-if="content.office.localized_main.phone">
                        <span class="text-neutral-6">{{ $t('footer.phone') }}</span>
                        <span>{{ content.office.localized_main.phone }}</span>
                    </div>
                    <div class="flex items-center gap-2" v-if="content.office.localized_main.fax">
                        <span class="text-neutral-6">Fax</span>
                        <span>{{ content.office.localized_main.fax }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-8">
                    <Link :href="route('about-us.who-we-are')" class="font-medium">
                        {{ $t('footer.who_we_are') }}
                    </Link>

                    <Link :href="route('our-business.what-we-do')" class="font-medium">
                        {{ $t('footer.our_bussiness') }}
                    </Link>

                    <Link href="" class="font-medium">
                        {{ $t('footer.sustainability') }}
                    </Link>

                    <Link :href="route('investor.report')" class="font-medium">
                        {{ $t('footer.investor') }}
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
                    <Link v-for="(item, index) in menus" :key="index" class="text-xs text-neutral-3 whitespace-nowrap" :href="item.url">
                        {{ item.name }}
                    </Link>
                </div>
            </div>


        </container>
    </div>

</template>

<script setup lang="ts">
    import { Link, router } from '@inertiajs/vue3'
    import Container from '../Section/Container.vue'
    import { onBeforeMount, ref } from 'vue'
    import { asset } from '@/Lib/utils'
    import { useContentStore } from '@/Composables/useContentStore'

    const socials = ref([
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_youtube.svg')
        },
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_linkedin.svg')
        },
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_tiktok.svg')
        },
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_x.svg')
        },
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_instagram.svg')
        },
        {
            url: '',
            icon: asset('assets/frontend/icons/ic_facebook.svg')
        }
    ])

    const menus = ref([
        {
            url: route('terms-and-conditions'),
            name: $t('footer.terms_and_conditions')
        },
        {
            url: route('privacy-policy'),
            name: $t('footer.privacy_policy')
        },
        {
            url: route('cookies-notice'),
            name: $t('footer.cookies_consent')
        },
        {
            url: route('disclaimer'),
            name: $t('footer.disclaimer')
        }
    ])

    const toHome = () => {
        router.visit(route('home'))
    }

    const content = useContentStore()

    onBeforeMount(() => {
        content.getMainOffice()
    })
</script>
