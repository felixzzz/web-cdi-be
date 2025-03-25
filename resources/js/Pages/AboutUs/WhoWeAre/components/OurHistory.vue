<template>
    <section id="our-history">
        <div
            v-for="(item, i) in data" :key="i"
            class="py-28 text-white bg-blue-dark bg-cover relative"
            :style="{
                'backgroundImage': `url(${item.image})`
            }"
        >
            <div class="overlay-history"></div>
            <container class="relative z-[1]">
                <div class="max-w-[880px] mx-auto">
                    <p class="text-neutral-4 mb-4">{{ item.tagline }}</p>
                    <h2 class="text-shadow-2 font-medium text-2xl lg:text-[38px] lg:leading-[44px] max-w-2xl mb-8">
                        {{ item.title }}
                    </h2>
                    <div class="content !text-neutral-5" v-html="item.content"></div>
                </div>
            </container>
        </div>
    </section>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import useRequest from '@/Composables/useRequest'
    import { OurHistory } from '@/types/utility'
    import { onMounted, ref } from 'vue'



    const data = ref<OurHistory[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.our-histories'))
        .then((result) => {
            data.value = result.data
        })
    })

</script>
