<template>
    <div x-data="{ show: false, zoom: 1, posX: 0, posY: 0, dragging: false, startX: 0, startY: 0 }">
        <a x-on:click="show = true" class="bg-blue-base px-6 py-2 rounded-full text-white font-medium cursor-pointer flex items-center gap-2 w-fit mx-auto mt-10">
            <img :src="asset('assets/frontend/icons/ic_zoom.svg')" alt="">
            {{ $t('Click to Zoom') }}
        </a>

        <!-- Popup -->
        <div
            x-show="show"
            class="fixed inset-0 bg-black bg-opacity-80 flex flex-col items-center justify-center z-50 text-neutral-13"
            x-transition
        >
            <!-- Header -->
            <div class="w-full bg-white py-3 px-4 flex justify-between items-center h-[10vh]">
                <h2 class="text-[28px] font-medium">{{ title }}</h2>
                <a x-on:click="show = false" class="text-neutral-13 text-[24px] cursor-pointer">✖</a>
            </div>

            <!-- Image Container -->
            <div
                class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden bg-white"
                x-on:mousedown="dragging = true; startX = $event.clientX - posX; startY = $event.clientY - posY"
                x-on:mouseup="dragging = false"
                x-on:mousemove="if(dragging) { posX = $event.clientX - startX; posY = $event.clientY - startY }"
            >
                <img
                    :src="image"
                    alt="Zoomable Image"
                    class="cursor-grab select-none"
                    x-bind:style="`transform: translate(${posX}px, ${posY}px) scale(${zoom}); transition: ${dragging ? 'none' : 'transform 0.2s'};`"
                    x-on:wheel.prevent="zoom += $event.deltaY > 0 ? -0.1 : 0.1; zoom = Math.min(3, Math.max(1, zoom))"
                >
            </div>

            <!-- Zoom Controls -->
            <div class="bg-white py-3 px-6 flex items-center gap-4 h-[10vh] w-full">
                <div class="flex items-center gap-4 mx-auto">
                    <button x-on:click="zoom = Math.max(0.1, zoom - 0.1)" class="border border-neutral-5 rounded-lg w-11 h-11 flex items-center justify-center text-blue-base cursor-pointer text-[38px] font-extralight">-</button>
                    <span class="text-lg font-light text-neutral-10" x-text="Math.round(zoom * 100) + '%'"></span>
                    <button x-on:click="zoom = Math.min(3, zoom + 0.1)" class="border border-neutral-5 rounded-lg w-11 h-11 flex items-center justify-center text-blue-base cursor-pointer text-[38px] font-extralight">+</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
import { asset } from '@/Lib/utils';


defineProps<{
    image: string;
    title: string;
}>()
</script>
