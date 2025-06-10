<template>
    <section x-data="{certification_popup: false}">
        <a id="certification-popup" hidden x-on:click="certification_popup=true"></a>
        <div class="fixed top-0 left-0 right-0 bottom-0 z-[999] flex flex-col items-center justify-center" x-show="certification_popup">
            <div class="bg-black/40 fixed top-0 left-0 right-0 bottom-0" x-on:click="certification_popup=false"></div>
            <div class="rounded-2xl bg-blue-dark relative z-[1]  w-[90%] md:w-2xl lg:w-4xl xl:w-5xl max-h-[80%] overflow-y-auto text-white">
                <div class="px-10 py-5 flex items-center justify-between border-b border-white/16 sticky top-0 bg-blue-dark">
                    <p class="font-medium text-[22px]">{{ $t('Detail Certification') }}</p>

                    <img :src="asset('assets/frontend/icons/ic_close_white.svg')" alt="" class="cursor-pointer" x-on:click="certification_popup=false">
                </div>

                <div class="p-10 grid grid-cols-1 lg:grid-cols-3 gap-10" v-if="detail">
                    <div>
                        <div>
                            <img
                                v-if="detail?.files"
                                :src="detail?.files[pictureSelect]" alt=""
                                class="aspect-[9/10] object-cover rounded-xl border-2 border-blue-dark outline-2 outline-[#f8f192c4] bg-white cursor-pointer"
                                @click="showImage(detail, pictureSelect)"
                            >
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
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        <p class="text-sm text-neutral-6">{{ detail.date }}</p>
                        <p class="text-2xl font-medium text-white">{{ detail.name }}</p>
                        <div class="content primary !text-sm" v-html="cleanNbsp(detail.content)"></div>
                        <div class="" v-if="detail.awarder">
                            <p class="text-sm font-medium mb-1">{{ $t('Awarder') }}</p>
                            <p class="font-light text-neutral-6 text-sm">{{ detail.awarder }}</p>
                        </div>
                        <div class="" v-if="detail.category_name">
                            <p class="text-sm font-medium mb-1">{{ $t('Categories') }}</p>
                            <p class="font-light text-neutral-6 text-sm">{{ detail.category_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup lang="ts">
import { asset, cleanNbsp } from '@/Lib/utils'
import { Certification } from '@/types/utility'
import { ref, watch } from 'vue'

const props = defineProps<{
    data?: Certification | null;
}>()

const emits = defineEmits(["image"])

const detail = ref<Certification | null>(null)
const pictureSelect = ref(0)

const changePicture = (index: number) => {
    pictureSelect.value = index
}

const showImage = (dataDetail: (Certification | null), index: number) => {
    emits("image", dataDetail, index)
}

const updateData = () => {
    if (props.data) {
        detail.value = props.data
    }
}

updateData()

watch(() => props.data, updateData, { deep: true })

</script>
