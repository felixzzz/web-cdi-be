<template>
    <div class="flex bg-white rounded-xl shadow-article border border-neutral-5 overflow-hidden w-full" x-on:click="popup=true">
        <div class="flex flex-col text-neutral-13 group w-full" :class="type == 'publication' ? 'cursor-pointer' : ''">
            <div class="w-full aspect-square overflow-hidden">
                <div
                    class="w-full aspect-square bg-cover bg-center transition-transform duration-300 ease-in-out group-hover:scale-150"
                    :style="{ backgroundImage: `url(${item.image})` }"
                ></div>
            </div>
            <div class="p-6">
                <h3 class="text-[22px] font-medium mb-2 line-clamp-3">
                    {{ item.title }}
                </h3>
                <div class="content primary !text-sm mb-4 line-clamp-3 !text-neutral-8" v-html="cleanNbsp(item.description)"></div>
                <div class="flex items-center text-base text-neutral-8 gap-3">
                    <div class="flex items-baseline gap-3">
                        <span>{{ item.file?.size }}</span>
                        <span>.</span>
                    </div>
                    <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                </div>
                <div class="h-[1px] bg-neutral-5 w-full mb-5 mt-8"></div>
                <div class="flex items-center justify-around gap-2 w-full">
                    <a href="javascript:;" class="flex items-center gap-2 text-blue-base font-medium" @click="preview(previewFile(item.file?.path))">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> View {{ type == 'report' ? 'Report' : 'Detail' }}
                    </a>
                    <a :href="downloadFile(item.file?.path)" class="flex items-center gap-2 text-blue-base font-medium" target="_blank">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> Download
                    </a>
                </div>
            </div>
        </div>
    </div>

    <SustainabilityPopup :item="item" :type="type" x-show="popup" v-if="type == 'publication'" />

</template>

<script setup lang="ts">
    import { asset, cleanNbsp, downloadFile, previewFile } from '@/Lib/utils'
    import { SustainabilityReport } from '@/types/utility'
    import SustainabilityPopup from './SustainabilityPopup.vue'

    const props = defineProps<{
        item: SustainabilityReport,
        type: string;
    }>()

    const preview = (file?: string) => {
        if (props.type == 'report') {
            window.open(file, '_blank')
        }
    }

</script>
