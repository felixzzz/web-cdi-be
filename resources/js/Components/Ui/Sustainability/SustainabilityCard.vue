<template>
    <div class="flex bg-white rounded-xl shadow-article border border-neutral-5 overflow-hidden w-full">
        <div class="flex flex-col text-neutral-13 group cursor-pointer w-full">
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
                <p class="text-sm mb-4 line-clamp-3 text-neutral-8">
                    {{ item.description }}
                </p>
                <div class="flex items-center text-base text-neutral-8 gap-3">
                    <div class="flex items-baseline gap-3">
                        <span>{{ item.size }}</span>
                        <span>.</span>
                    </div>
                    <img :src="asset('assets/frontend/icons/ic_filepdf.svg')" alt="">
                </div>
                <div class="h-[1px] bg-neutral-5 w-full mb-5 mt-8"></div>
                <div class="flex items-center justify-around gap-2 w-full">
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_eye.svg')" alt=""> View {{ type == 'report' ? 'Report' : 'Detail' }}
                    </Link>
                    <Link href="" class="flex items-center gap-2 text-blue-base font-medium">
                        <img :src="asset('assets/frontend/icons/ic_download_file.svg')" alt=""> Download
                    </Link>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { asset } from '@/Lib/utils';
    import { SustainabilityFile } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'

    defineProps<{
        item: SustainabilityFile,
        type: string;
    }>()

</script>
