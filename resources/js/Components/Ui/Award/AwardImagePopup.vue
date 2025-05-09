<template>
    <section x-data="{award_image_popup: false}">
        <a id="award-image-popup" hidden x-on:click="award_image_popup=true"></a>
        <div class="fixed top-0 left-0 right-0 bottom-0 z-[999] flex flex-col items-center justify-center" x-show="award_image_popup">
            <div class="bg-black/40 fixed top-0 left-0 right-0 bottom-0" x-on:click="award_image_popup=false"></div>
            <div class="rounded-2xl bg-blue-dark relative z-[1] w-[90%] md:w-2xl lg:w-4xl xl:w-5xl max-h-[90%] overflow-y-auto text-white">
                <div class="px-10 py-5 flex items-center justify-between border-b border-white/16 sticky top-0 bg-blue-dark">
                    <p class="font-medium text-[22px]">{{ $t('Photo') }}</p>

                    <img :src="asset('assets/frontend/icons/ic_close_white.svg')" alt="" class="cursor-pointer" x-on:click="award_image_popup=false">
                </div>

                <div class="p-10 grid grid-cols-1 gap-10" v-if="data">
                    <div>
                        <div>
                            <img
                                v-if="data?.image"
                                :src="data?.image" alt=""
                                class="w-full max-h-[50vh] object-contain rounded-xl border-2 border-blue-dark outline-2 outline-[#f8f192c4] bg-white"
                            >
                            <file-zoom
                                v-if="data?.image"
                                :image="data?.image" :title="$t('Photo')"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup lang="ts">
import { asset } from '@/Lib/utils'
import FileZoom from '@/Components/Ui/Utils/FileZoom.vue'
import { Award } from '@/types/utility';

defineProps<{
    data?: Award | null;
}>()

</script>
