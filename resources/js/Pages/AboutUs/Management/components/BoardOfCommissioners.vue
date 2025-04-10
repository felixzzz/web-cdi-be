<template>
    <section id="board-of-commissioners">
        <p class="text-white font-medium text-2xl lg:text-[38px] lg:leading-[44px] text-center mb-16">
            {{ $t('Board of Commissioners') }}
        </p>

        <div class="flex gap-8 text-white justify-center flex-wrap">
            <Link class="flex flex-col items-center text-center w-[282px] group transition-all duration-300" v-for="(item, i) in data" :key="i" :href="route('about-us.team', item.ulid)">
                <div class="flex flex-col items-center text-center">
                    <img :src="item.image ? previewFile(item.image) : asset('assets/frontend/icons/avatar_dummy_fill.webp')" alt="" class="aspect-square overflow-hidden rounded-full object-cover shadow-article mb-5 border-2 border-transparent outline-2 outline-transparent group-hover:outline-blue-lighter ">
                    <p class="text-lg font-medium group-hover:text-blue-lighter">{{ item.name }}</p>
                    <p class="text-base font-normal text-neutral-6">{{ item.position }}</p>
                </div>
            </Link>
        </div>
    </section>

</template>

<script setup lang="ts">
    import useRequest from '@/Composables/useRequest'
    import { asset, previewFile } from '@/Lib/utils'
    import { Team } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'


    const data = ref<Team[]>([])

    onMounted(() => {
        useRequest().get(route('api.utility.teams', 'boc'))
        .then((result) => {
            data.value = result.data
        })
    })

</script>
