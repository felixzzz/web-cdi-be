<template>
    <div class="fixed top-0 left-0 right-0 bottom-0 z-[999] flex flex-col items-center justify-center">
        <div class="bg-black/40 fixed top-0 left-0 right-0 bottom-0" x-on:click="popup=false"></div>
        <div class="rounded-2xl bg-white relative z-[1]  w-[90%] md:w-2xl lg:w-4xl xl:w-5xl max-h-[80%] overflow-y-auto">
            <div class="flex items-center justify-between gap-1 mb-4 sticky top-0 bg-white p-6 rounded-t-2xl">
                <p class="text-2xl lg:text-[28px] font-medium text-neutral-13 capitalize">
                    {{ type }}
                </p>

                <img :src="asset('assets/frontend/icons/ic_close.svg')" alt="" class="cursor-pointer" x-on:click="popup=false">
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 px-6 pb-6">
                <div class="">
                    <img :src="item.image" alt="" class="rounded-e-3xl w-full overflow-hidden">
                </div>
                <div class="lg:col-span-2">
                    <h2 class="text-[22px] font-medium text-blue-base mb-2">
                        {{ item.title }}
                    </h2>
                    <div class="content !text-neutral-8" v-html="item.description"></div>
                    <div class="h-[1px] bg-neutral-5 w-full my-6"></div>
                    <table>
                        <tbody>
                            <tr v-if="item.language">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Language
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.language }}
                                </td>
                            </tr>
                            <tr v-if="item.author">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Author
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.author }}
                                </td>
                            </tr>
                            <tr v-if="item.publisher">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Publisher
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.publisher }}
                                </td>
                            </tr>
                            <tr v-if="item.release_year">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Release Year
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.release_year }}
                                </td>
                            </tr>
                            <tr v-if="item.pages">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Pages
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.pages }}
                                </td>
                            </tr>
                            <tr v-if="item.format">
                                <td class="text-neutral-10 font-bold pe-6 py-1">
                                    Format
                                </td>
                                <td class="text-neutral-8">
                                    {{ item.format }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { asset } from '@/Lib/utils'
    import { SustainabilityReport } from '@/types/utility'

    defineProps<{
        item: SustainabilityReport;
        type: string;
    }>()

</script>
