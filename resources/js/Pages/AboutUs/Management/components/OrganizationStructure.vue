<template>
    <section
        id="organization-structure"
        x-data="{ open_section: false }"
    >
        <div
            class="bg-neutral-3 text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] transition border-b-2 border-neutral-5 hover:bg-blue-base hover:text-white"
            x-bind:class="open_section ? '!bg-blue-base !text-white' : ''"
        >
            <container>
                <div class="flex items-center justify-between py-8 cursor-pointer" x-on:click="open_section=!open_section">
                    <span>{{ $t('Organization Structure') }}</span>
                    <i
                        class="isax icon-arrow-down-1 transition-all"
                        x-bind:class="{ 'rotate-180': open_section }"
                    ></i>
                </div>
            </container>
        </div>
        <div
            x-show="open_section"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="py-20"
        >
            <container>
                <p class="text-2xl lg:text-[28px] font-medium text-blue-base mb-6">{{ $t('Organization Structure') }}</p>
                <img :src="content.about_us_organization_structure?.file_url" alt="">
                <!-- <p class="text-red-6 mt-2 italic">*As of 31st December 2024</p> -->
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { PreferenceAboutManagement } from '@/types/utility'

    defineProps<{
        content: PreferenceAboutManagement
    }>()

</script>
