<template>
    <section x-data="{certification_image_popup: false}">
        <a id="certification-image-popup" hidden x-on:click="certification_image_popup=true"></a>
        <div class="fixed top-0 left-0 right-0 bottom-0 z-[999] flex flex-col items-center justify-center" x-show="certification_image_popup">
            <div class="bg-black/40 fixed top-0 left-0 right-0 bottom-0" x-on:click="certification_image_popup=false"></div>
            <div class="rounded-2xl bg-blue-dark relative z-[1] w-[90%] md:w-2xl lg:w-4xl xl:w-5xl max-h-[90%] overflow-y-auto text-white">
                <div class="px-10 py-5 flex items-center justify-between border-b border-white/16 sticky top-0 bg-blue-dark">
                    <p class="font-medium text-[22px]">{{ $t('Photo') }}</p>

                    <img :src="asset('assets/frontend/icons/ic_close_white.svg')" alt="" class="cursor-pointer" x-on:click="certification_image_popup=false">
                </div>

                <div class="p-10 grid grid-cols-1 gap-10" v-if="detail">
                    <div>
                        <div>
                            <img
                                v-if="detail?.files"
                                :src="detail?.files[pictureSelect]" alt=""
                                class="w-full max-h-[50vh] object-contain rounded-xl border-2 border-blue-dark outline-2 outline-[#f8f192c4] bg-white"
                            >
                            <file-zoom
                                v-if="detail?.files"
                                :image="detail?.files[pictureSelect]" :title="$t('Photo')"
                            />
                            <div class="mt-6 flex gap-3">
                                <div
                                    class="relative w-[92px] h-[92px] rounded-sm cursor-pointer"
                                    v-for="(file, index) in detail?.files"
                                    :key="file"
                                    @click="changePicture(index)"
                                >
                                    <div class="bg-neutral-13/72 w-full h-full rounded-sm flex items-center justify-center absolute" v-if="pictureSelect == index">
                                        <p class="text-sm text-white">{{ $t('Displayed') }}</p>
                                    </div>
                                    <img
                                        :src="file" alt=""
                                        class="object-cover rounded-sm bg-white w-[92px] h-[92px]"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup lang="ts">
import { asset } from '@/Lib/utils'
import { Certification } from '@/types/utility'
import FileZoom from '@/Components/Ui/Utils/FileZoom.vue'
import { ref, watch } from 'vue'

const props = defineProps<{
    data?: Certification | null;
    indexImage?: number
}>()

const detail = ref<Certification | null>(null)
const pictureSelect = ref(props.indexImage || 0)

const changePicture = (index: number) => {
    pictureSelect.value = index
}

const updateData = () => {
    if (props.data) {
        detail.value = props.data
    }
}
updateData()

watch(() => props.data, updateData, { deep: true })

</script>
