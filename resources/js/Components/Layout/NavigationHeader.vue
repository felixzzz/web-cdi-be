<template>
    <section
        x-data="{mobile_menu: false}"
        :class="[
            'top-0 z-[99] w-full',
            stickyScroll ? 'sticky' : '',
            fixed ? '!fixed' : '',
            absolute ? '!absolute' : '',
            transparant ? '' : 'bg-white',
        ]"
    >
        <header
            :class="[
                'w-full h-[88px] flex justify-between items-center left-0 right-0 text-white transition-all border-b-0 border-b-transparent',
                transparant ? 'nav-transparent' : '!text-neutral-13 nav-shadow',
                scrolledPast ? (
                    isHome && !scrolledPastHomeBlue
                        ? '!bg-[#09202EB8]/72 backdrop-blur-2xl !border-b !border-b-white/12'
                        : (
                            stickyBlur
                            ? '!bg-[#09202EB8]/72 backdrop-blur-2xl !border-b !border-b-white/12'
                            : '!bg-white !bg-none nav-shadow !text-neutral-13'
                        )
                ) : ''
            ]"
            id="nav-header"
        >
            <container class="flex justify-between">
                <img :src="asset('assets/frontend/logo_cdi_white.svg')" alt="" class="h-12" v-show="isHome ? !scrolledPastHomeBlue : ((!scrolledPast && transparant) || (scrolledPast && stickyBlur))">
                <img :src="asset('assets/frontend/logo_cdi_colored.svg')" alt="" class="h-12" v-show="isHome ? scrolledPastHomeBlue : ((scrolledPast || !transparant) && !stickyBlur)">

                <div class="hidden lg:flex items-center gap-6 font-normal text-base">
                    <template v-for="menu in MENU">
                        <Link
                            :href="menu.route" v-if="!menu.external && !menu.subs.length && menu.name" :key="menu.active" class="nav-item"
                            :class="{
                                'nav-blue-lighter': (scrolledPast && isHome && !scrolledPastHomeBlue) || transparant || stickyBlur,
                                'nav-blue-base': (!transparant || (scrolledPast && !(isHome && !scrolledPastHomeBlue))) && !stickyBlur,
                                '': !scrolledPast && isHome && !scrolledPastHomeBlue && !transparant
                            }"
                        >
                            {{ $t(menu.name) }}
                        </Link>
                        <div
                            v-if="!menu.external && menu.subs.length" :key="menu.active"
                            class="nav-item cursor-pointer flex items-center gap-1 relative"
                            x-data="{ open_menu: false }"
                            x-on:mouseleave="open_menu = false"
                            x-on:mouseover="open_menu = true"
                            :class="{
                                'nav-blue-lighter': (scrolledPast && isHome && !scrolledPastHomeBlue) || transparant || stickyBlur,
                                'nav-blue-base': (!transparant || (scrolledPast && !(isHome && !scrolledPastHomeBlue))) && !stickyBlur,
                                '': !scrolledPast && isHome && !scrolledPastHomeBlue && !transparant
                            }"
                        >
                            <span>{{ $t(menu.name) }}</span>
                            <i
                                class="isax icon-arrow-down-1 transition-all"
                                x-bind:class="{ 'rotate-180': open_menu }"
                            ></i>

                            <div
                                class="absolute top-[72px] left-1/2 -translate-x-1/2 w-max z-10"
                                x-show="open_menu"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                            >
                                <img :src="asset('assets/frontend/icons/polygon.svg')" alt="" class="mx-auto -mb-[6px]">
                                <div class="p-4 rounded-xl bg-white flex flex-col gap-6 whitespace-nowrap">
                                    <template v-for="(sub, index) in menu.subs" :key="index">
                                        <Link :href="sub.route" class="text-neutral-13 nav-item nav-blue-base justify-start!" x-on:click="open_menu=false"
                                        >
                                            {{ $t(sub.name) }}
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <a :href="menu.active == 'career' ? careerUrl : menu.route" target="_blank" v-if="menu.external" :key="menu.active" class="nav-item"
                            :class="{
                                'nav-blue-lighter': (scrolledPast && isHome && !scrolledPastHomeBlue) || transparant || stickyBlur,
                                'nav-blue-base': (!transparant || (scrolledPast && !(isHome && !scrolledPastHomeBlue))) && !stickyBlur,
                                '': !scrolledPast && isHome && !scrolledPastHomeBlue && !transparant
                            }"
                        >
                            {{ $t(menu.name) }}
                        </a>
                    </template>
                </div>

                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center gap-1 relative cursor-pointer"
                        x-data="{ open_menu: false }"
                        x-on:mouseleave="open_menu = false"
                        x-on:mouseover="open_menu = true"
                    >
                        <template v-if="currentLang == 'en'">
                            <img :src="asset('assets/frontend/icons/flag_en.svg')" alt="" class="w-[18px] rounded-full border border-white">
                            <span>EN</span>
                        </template>
                        <template v-else>
                            <img :src="asset('assets/frontend/icons/flag_id.svg')" alt="" class="w-[18px] rounded-full border border-white">
                            <span>ID</span>
                        </template>
                        <i class="isax icon-arrow-down-1"></i>

                        <div
                            class="absolute top-6 lg:top-[60px] left-1/2 -translate-x-1/2 w-max"
                            x-show="open_menu"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                        >
                            <img :src="asset('assets/frontend/icons/polygon.svg')" alt="" class="mx-auto -mb-[6px]">
                            <div class="p-4 rounded-xl bg-white flex flex-col gap-6 whitespace-nowrap">
                                <div class="text-neutral-13 flex items-center gap-1 cursor-pointer" x-on:click="open_menu=false" @click="changeLanguage('en')">
                                    <img :src="asset('assets/frontend/icons/flag_en.svg')" alt="" class="w-[18px] rounded-full border border-neutral-13">
                                    <span>English</span>
                                </div>
                                <div class="text-neutral-13 flex items-center gap-1 cursor-pointer" x-on:click="open_menu=false" @click="changeLanguage('id')">
                                    <img :src="asset('assets/frontend/icons/flag_id.svg')" alt="" class="w-[18px] rounded-full border border-neutral-13">
                                    <span>Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <i class="isax icon-menu-1 text-2xl cursor-pointer lg:hidden" x-on:click="mobile_menu=true"></i>
                </div>
            </container>
        </header>

        <div
            class="fixed lg:hidden top-0 left-0 bottom-0 right-0 z-50 text-neutral-13"
            x-show="mobile_menu"
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="py-5 bg-white h-full">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center px-[1rem] md:px-[2rem]">
                        <img :src="asset('assets/frontend/logo_cdi_colored.svg')" alt="" class="h-12">

                        <i class="isax icon-close-circle text-2xl cursor-pointer" x-on:click="mobile_menu=false"></i>
                    </div>

                    <div class="flex flex-col gap-6 font-normal text-base w-full items-start mt-8 flex-1 overflow-y-auto px-[1rem] md:px-[2rem]">
                        <template v-for="menu in MENU">
                            <Link
                                :href="menu.route" v-if="!menu.external && !menu.subs.length" :key="menu.active">
                                {{ $t(menu.name) }}
                            </Link>
                            <div
                                v-if="!menu.external && menu.subs.length" :key="menu.active"
                                class="w-full flex flex-col gap-2 !justify-start !items-baseline"
                                x-data="{ open_menu: false }"
                            >

                                <div class="flex items-center gap-1 relative w-full !justify-between cursor-pointer" x-on:click="open_menu=!open_menu">
                                    <span>{{ menu.name }}</span>
                                    <i
                                        class="isax icon-arrow-down-1 transition-all"
                                        x-bind:class="{ 'rotate-180': open_menu }"
                                    ></i>
                                </div>

                                <div
                                    x-show="open_menu"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="p-2 bg-blue-lighter/50 w-full rounded text-neutral-13"
                                >
                                    <div class="flex flex-col gap-2 whitespace-nowrap items-start">
                                        <template v-for="(sub, index) in menu.subs" :key="index">
                                            <Link :href="sub.route" class="!justify-start" x-on:click="open_menu=false"
                                            >
                                                {{ $t(sub.name) }}
                                            </Link>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <a :href="menu.active == 'career' ? careerUrl : menu.route" target="_blank" v-if="menu.external" :key="menu.active">
                                {{ $t(menu.name) }}
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import { ref, onMounted, onUnmounted } from "vue";
import { MENU } from "@/Constanta/Menu";
import Container from "../Section/Container.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { asset } from "@/Lib/utils";
import { switchLang } from "@/Composables/useTranslation";

const careerUrl = usePage().props.career_url
const currentLang = usePage().props.locale

const scrolledPast = ref(false)
const scrolledPastHomeBlue = ref(false)
const lastScrollY = ref(0)


const props = withDefaults(
    defineProps<{
        fixed?: boolean;
        absolute?: boolean;
        transparant?: boolean;
        stickyScroll?: boolean;
        isHome?: boolean;
        stickyBlur?: boolean;
    }>(),
    {
        stickyScroll: true,
    }
);

const SCROLL_THRESHOLD = 200

const checkScroll = () => {
    if (!props.stickyScroll) return

    const currentScrollY = window.scrollY
    const scrollingUp = currentScrollY < lastScrollY.value // Cek apakah scroll ke atas

    if (props.isHome) {
        const homeBanner = document.getElementById("home_banner_title")
        if (homeBanner) {
            const rect = homeBanner.getBoundingClientRect()
            scrolledPast.value = (rect.top + 20) < 88

            if (scrollingUp && currentScrollY < SCROLL_THRESHOLD) {
                scrolledPast.value = false
            }
        }

        const homeReport = document.getElementById("home_report")
        if (homeReport) {
            const rect = homeReport.getBoundingClientRect()
            scrolledPastHomeBlue.value = (rect.top + 20) < 88

            if (scrollingUp && currentScrollY < SCROLL_THRESHOLD) {
                scrolledPastHomeBlue.value = false
            }
        }

    } else {
        const homeBanner = document.getElementById("home_banner_title")
        if (homeBanner) {
            const rect = homeBanner.getBoundingClientRect()
            scrolledPast.value = (rect.top + 20) < 88

            if (scrollingUp && currentScrollY < SCROLL_THRESHOLD) {
                scrolledPast.value = false
            }
        } else {
            scrolledPast.value = currentScrollY > SCROLL_THRESHOLD

            if (scrollingUp && currentScrollY < SCROLL_THRESHOLD) {
                scrolledPast.value = false
            }
        }
    }

    lastScrollY.value = currentScrollY
}

const changeLanguage = (lang: string) => {
    return switchLang(lang)
}


onMounted(() => {
    if (props.stickyScroll) {
        window.addEventListener("scroll", checkScroll)
    }
})

onUnmounted(() => {
    window.removeEventListener("scroll", checkScroll)
})
</script>
