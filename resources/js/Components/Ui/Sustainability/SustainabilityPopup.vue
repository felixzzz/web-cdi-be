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
                    <img :src="item.image" alt="" class="rounded-e-3xl w-full">
                </div>
                <div class="lg:col-span-2">
                    <h2 class="text-[22px] font-medium text-blue-base mb-2">
                        {{ item.title }}
                    </h2>
                    <p class="text-neutral-8">
                        {{ item.description }}
                    </p>
                    <div class="h-[1px] bg-neutral-5 w-full my-6"></div>
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Language
                                </td>
                                <td class="text-neutral-8">
                                    Indonesia
                                </td>
                            </tr>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Author
                                </td>
                                <td class="text-neutral-8">
                                    Novita Puteri K., Dwi Putri Julyanti, Bagus Adiputra Utama, Adiyat (and the other 11 authors)
                                </td>
                            </tr>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Publisher
                                </td>
                                <td class="text-neutral-8">
                                    Indonesia
                                </td>
                            </tr>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Release Year
                                </td>
                                <td class="text-neutral-8">
                                    2023
                                </td>
                            </tr>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Pages
                                </td>
                                <td class="text-neutral-8">
                                    64
                                </td>
                            </tr>
                            <tr>
                                <td class="text-neutral-10 font-bold pe-6">
                                    Format
                                </td>
                                <td class="text-neutral-8">
                                    PDF
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

    defineProps<{
        item: any;
        type: string;
    }>()

</script>
