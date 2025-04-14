<template>
    <section v-for="(item, index) in items" :key="index">
        <div
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
            v-if="item.type == 'content'"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'"></div>
            <container class="relative z-[1]">
                <div
                    class="lg:max-w-[45%]"
                    :class="{
                        'me-auto': item.align == 'left',
                        'ms-auto': item.align == 'right',
                    }"
                >
                    <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-6 text-blue-lighter">{{ item.title }}</p>
                    <div class="content !text-neutral-5" v-html="item.content"></div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'grid'"
            class="text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                'py-10': item.grid_type == 'icon_list_card',
                'py-28': item.grid_type == 'icon_content_card',
                'py-20': item.grid_type == 'box_icon_card' || item.grid_type == 'image_content_card' || item.grid_type == 'featured_image_card',
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class="mb-16 grid grid-cols-1 gap-4"
                    :class="{
                        'lg:grid-cols-2': item.content,
                        'items-center': item.grid_direction == 'row'
                    }"
                >
                    <p
                        class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium"
                        :class="{
                            'lg:col-span-2': item.content && item.grid_direction == 'col'
                        }"
                        v-if="item.title"
                    >{{ item.title }}</p>
                    <div
                        v-if="item.content"
                        class="text-neutral-4 font-light"
                        :class="{
                            'lg:col-span-2 lg:max-w-[80%]': item.content && item.grid_direction == 'col',
                        }"
                        v-html="item.content"
                    ></div>
                </div>

                <div
                    class="grid grid-cols-1 gap-6"
                    :class="{
                        'lg:grid-cols-2': item.grid_pattern != 'zig-zag',
                        'lg:grid-cols-3': item.grid_type == 'image_content_card',
                        'lg:grid-cols-7': item.grid_pattern == 'zig-zag',
                    }"
                >
                    <template v-for="(row, rowIndex) in chunkArray(item.content_json, 2)" :key="rowIndex">
                        <div
                            v-for="(content, contentIndex) in row" :key="contentIndex"
                            class="flex gap-4 items-start relative bg-cover bg-no-repeat"
                            :class="{
                                'flex-col': item.grid_type == 'icon_content_card' || item.grid_type == 'image_content_card',
                                'border border-white/16 bg-[#25405029] p-2 rounded-xl !gap-0 backdrop-blur-sm': item.grid_type == 'image_content_card',
                                'p-6 bg-[#BFCDD414] rounded-lg border border-[#2A404E]/80 backdrop-blur-sm': item.grid_type == 'box_icon_card',
                                'lg:col-span-2': item.grid_pattern !== 'zig-zag'
                                    && item.grid_type === 'box_icon_card'
                                    && item.content_json
                                    && item.content_json.length % 2 !== 0
                                    && rowIndex === Math.floor(item.content_json.length / 2)
                                    && contentIndex === row.length - 1,
                                'lg:col-span-4': (item.grid_pattern === 'zig-zag' && rowIndex % 2 === 0 && contentIndex === 0) || (item.grid_pattern === 'zig-zag' && rowIndex % 2 !== 0 && contentIndex === 1),
                                'lg:col-span-3': (item.grid_pattern === 'zig-zag' && rowIndex % 2 === 0 && contentIndex === 1) || item.grid_pattern === 'zig-zag' && rowIndex % 2 !== 0 && contentIndex === 0,
                                'border border-white/16 bg-[#25405029] rounded-xl !gap-0 backdrop-blur-sm min-h-[328px] !items-end': item.grid_type == 'featured_image_card',
                            }"
                            :style="{
                                'backgroundImage': `url(${content.icon && item.grid_type == 'featured_image_card' ? content.icon : ''})`
                            }"
                        >
                            <div
                                class="flex shrink-0 w-[56px]"
                                :class="{
                                    '!w-[48px]': item.grid_type == 'icon_content_card',
                                    '!w-full aspect-square': item.grid_type == 'image_content_card'
                                }"
                                v-if="item.grid_type != 'featured_image_card'"
                            >
                                <img :src="content.icon" alt=""
                                    class="w-full"
                                    :class="{
                                        'aspect-square object-cover rounded-lg': item.grid_type == 'image_content_card'
                                    }"
                                >
                            </div>
                            <div
                                class="flex flex-col gap-4"
                                :class="{
                                    'px-4 py-6 !gap-2': item.grid_type == 'image_content_card',
                                    'p-6': item.grid_type == 'featured_image_card'
                                }"
                            >
                                <p
                                    v-if="content.title"
                                    class="text-[22px] font-medium text-blue-lighter"
                                    :class="{
                                        '!text-white': item.grid_type == 'image_content_card'
                                    }"
                                >
                                    {{ content.title }}
                                </p>
                                <div
                                    class="content"
                                    :class="{
                                        '!text-neutral-5': item.grid_type == 'icon_list_card',
                                        '!text-neutral-5 lg:!text-sm lg:max-w-[90%]': item.grid_type == 'featured_image_card',
                                        '!text-neutral-6 lg:!text-sm': item.grid_type == 'icon_content_card' || item.grid_type == 'box_icon_card' || item.grid_type == 'image_content_card'
                                    }"
                                    v-html="content.description"
                                >
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'simple_text_information'"
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:items-center"
                >
                    <div
                        :class="{
                            'col-span-2': (Array.isArray(item.content_json) && item.content_json?.length == 0) || !item.content_json
                        }"
                    >
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ item.title }}</p>
                        <div class="content !text-neutral-4" v-html="item.content"></div>
                    </div>
                    <div v-if="Array.isArray(item.content_json) && item.content_json?.length > 0">
                        <div class="items-center lg:max-w-[60%] ms-auto grid grid-cols-2 gap-8 lg:gap-x-16">
                            <div
                                v-for="(content, contentIndex) in item.content_json" :key="contentIndex"
                                :class="{
                                    'row-span-2': item.content_json && item.content_json.length % 2 !== 0 && contentIndex === item.content_json.length - 2
                                }"
                            >
                                <p class="text-blue-lighter font-bold text-3xl lg:text-[48px]">
                                    {{ content.title }}
                                </p>
                                <p>
                                    {{ content.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'file_information'"
            class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-2-darkest' : 'overlay-business-2'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div
                    class=""
                    :class="{
                        'grid grid-cols-1 lg:grid-cols-5 gap-16': item.grid_direction != 'row',
                        'flex flex-col gap-8 lg:max-w-[45%]': item.grid_direction == 'row',
                        'me-auto': item.align == 'left',
                        'ms-auto': item.align == 'right',
                    }"
                >
                    <div :class="item.grid_direction != 'row' ? 'lg:col-span-3' : ''">
                        <p class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium mb-4">{{ item.title }}</p>
                        <div class="content !text-neutral-6" v-html="item.content"></div>
                    </div>
                    <div :class="item.grid_direction != 'row' ? 'lg:col-span-2' : ''">
                        <div
                            class="button-gradient-custom !flex-col !items-start"
                            :class="item.grid_direction == 'row' ? 'lg:min-w-[50%] lg:w-fit' : ''"
                        >
                            <div class="flex flex-col gap-2 pb-2 border-b border-b-neutral-9 mb-2 w-full">
                                <p class="text-[22px] font-medium">{{ item.file_information?.title }}</p>
                                <div class="flex items-center text-base text-white gap-3">
                                    <div class="flex items-baseline gap-3">
                                        <span>{{ item.file_information?.size }}</span>
                                        <span>.</span>
                                    </div>
                                    <img :src="asset('assets/frontend/icons/ic_filepdf_white.svg')" alt="">
                                </div>
                            </div>

                            <div class="flex items-center gap-8 w-full justify-center">
                                <Link href="" class="flex items-center gap-2 text-white font-medium">
                                    <img :src="asset('assets/frontend/icons/ic_eye_white.svg')" alt=""> View
                                </Link>
                                <Link href="" class="flex items-center gap-2 text-white font-medium">
                                    <img :src="asset('assets/frontend/icons/ic_download_file_white.svg')" alt=""> Download
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </container>
        </div>
        <div
            v-else-if="item.type == 'swiper'"
            class="py-20 text-white bg-blue-dark bg-cover relative bg-center"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-2-darkest' : 'overlay-business-2'" v-if="item.image"></div>
            <container class="relative z-[1]">
                <div class="flex max-lg:flex-col items-center gap-8 mb-16 justify-between">
                    <div class="flex flex-col gap-1">
                        <p class="text-2xl lg:text-[28px] font-medium">{{ item.title }}</p>
                        <div class="content !text-neutral-4" v-html="item.content"></div>
                    </div>
                    <div class="">
                        <div class="flex items-center justify-end gap-4">
                            <div class="custom-prev cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center" :id="`swiper-prev-${index}`">
                                <i class="isax icon-arrow-left"></i>
                            </div>
                            <div class="custom-next cursor-pointer text-white text-2xl w-12 h-12 rounded-full border border-white flex items-center justify-center" :id="`swiper-next-${index}`">
                                <i class="isax icon-arrow-right-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <swiper
                    :modules="[Navigation]"
                    :slides-per-view="4"
                    :space-between="24"
                    :navigation="{ nextEl: `#swiper-next-${index}`, prevEl: `#swiper-prev-${index}` }"
                    class="custom-swiper"
                    :breakpoints="{
                        320: { slidesPerView: 1 },
                        640: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                        1280: { slidesPerView: 4 }
                    }"
                >
                    <swiper-slide v-for="(content, contentIndex) in item.content_json" :key="contentIndex">
                        <div
                            class="rounded-3xl p-6 overflow-hidden w-full aspect-[3/4] flex flex-col gap-4 justify-between bg-cover bg-center relative"
                            :style="{
                                'backgroundImage': `url(${content.icon})`
                            }"
                        >
                            <div class="absolute inset-0 overlay-card-sustainability"></div>
                            <div class="flex items-center gap-2 relative z-[1]">
                                <p class="text-white/40 text-4xl lg:text-[68px]">
                                    {{ content.number }}
                                </p>
                                <p class="text-2xl lg:text-[28px] font-medium text-white">
                                    {{ content.title }}
                                </p>
                            </div>

                            <div v-html="content.description" class="!text-neutral-5 relative z-[1]"></div>
                        </div>
                    </swiper-slide>
                </swiper>
            </container>
        </div>
        <div
            v-else-if="item.type == 'list_information'"
            class="text-white bg-blue-dark bg-cover relative bg-center py-20"
            :class="{
                '!bg-blue-dark-black': item.background == 'darkest'
            }"
        >
            <container class="relative z-[1]">
                <div
                    class="mb-16 grid grid-cols-1 gap-4"
                    :class="{
                        'lg:grid-cols-2': item.content,
                        'items-center': item.grid_direction == 'row'
                    }"
                >
                    <p
                        class="text-2xl lg:text-[38px] lg:leading-[44px] font-medium text-blue-lighter max-w-[277px]"
                        :class="{
                            'lg:col-span-2': item.content && item.grid_direction == 'col'
                        }"
                        v-if="item.title"
                    >{{ item.title }}</p>
                    <div
                        v-if="item.content"
                        class="text-neutral-6 font-light"
                        :class="{
                            'lg:col-span-2 lg:max-w-[80%]': item.content && item.grid_direction == 'col',
                        }"
                        v-html="item.content"
                    ></div>
                </div>


            </container>
            <div
                class="py-28 text-white bg-blue-dark bg-cover relative bg-center"
                :class="{
                    '!bg-blue-dark-black': item.background == 'darkest'
                }"
                :style="{
                    'backgroundImage': `url(${item.image})`
                }"
            >
                <div class="absolute inset-0" :class="item.background == 'darkest' ? 'overlay-business-darkest' : 'overlay-business'"></div>
                <container class="relative z-[1]">
                    <div
                        class="lg:max-w-[35%]"
                        :class="{
                            'me-auto': item.align == 'left',
                            'ms-auto': item.align == 'right',
                        }"
                        v-if="item.content_json?.length"
                    >
                        <div class="flex flex-col gap-4">
                            <div class="flex items-start gap-2" v-for="(json, index) in item.content_json" :key="index">
                                <img :src="asset('assets/frontend/icons/ic_bold_duotone_check_circle.svg')" alt="">
                                <div class="">
                                    <p class="text-lg font-medium mb-3 text-blue-lighter">{{json.title }}</p>
                                    <div class="text-neutral-5 text-base font-normal" v-html="json.description"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </container>
            </div>
        </div>

    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { asset, chunkArray } from '@/Lib/utils'
    import { SustainabilityContent } from '@/types/utility'
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css'
    import 'swiper/css/navigation'
    import { Navigation } from 'swiper/modules'
    import { Link } from '@inertiajs/vue3'

    defineProps<{
        items: SustainabilityContent[]
    }>()

</script>
