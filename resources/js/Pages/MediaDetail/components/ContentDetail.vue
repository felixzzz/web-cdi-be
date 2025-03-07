<template>
    <div class="py-20">
        <container>
            <breadcrumb base="Home" :route="route('home')" current="Wastewater Treatment, How to Do It Safely and Properly?" v-bind:links="otherLinks" />

            <div class="flex items-center justify-between gap-2 my-4">
                <p class="text-neutral-10">05-02-2025</p>

                <div class="flex items-center gap-2">
                    <Link v-for="(item, index) in shares" :key="index" :href="item.link">
                        <img :src="item.icon" alt="">
                    </Link>
                </div>
            </div>

            <img :src="data.image" alt="" class="w-full rounded-xl mb-10">
            <h1 class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-6">
                Wastewater Treatment, How to Do It Safely and Properly?
            </h1>

            <div class="content !text-neutral-9" v-html="data.content"></div>

            <div class="mt-16 flex-col text-center">
                <p class="font-medium text-neutral-13 lg:text-lg mb-4">
                    Share this post
                </p>
                <div class="flex items-center gap-2 justify-center">
                    <Link v-for="(item, index) in shares" :key="index" :href="item.link">
                        <img :src="item.icon" alt="">
                    </Link>
                </div>

                <div class="flex items-center gap-2 justify-center mt-12">
                    <div class="bg-neutral-4 px-3 py-[6px] rounded-full text-sm text-neutral-10" v-for="i in 4" :key="i">
                        Tag {{ i }}
                    </div>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import Breadcrumb from '@/Components/Ui/Utils/Breadcrumb.vue'
    import { asset } from '@/Lib/utils'
    import { BreadcrumbLink } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    const props = defineProps<{
        type: string
    }>()

    const otherLinks = ref<BreadcrumbLink[]>([])

    const data = ref({
        image: 'https://images.unsplash.com/photo-1523731407965-2430cd12f5e4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        content: `
            <p>lorem ipsum</p>
        `
    })

    const shares = ref([
        {
            icon: asset('assets/frontend/icons/ic_share_copy_rounded.svg'),
            link: ''
        },
        {
            icon: asset('assets/frontend/icons/ic_share_linkedin_rounded.svg'),
            link: ''
        },
        {
            icon: asset('assets/frontend/icons/ic_share_x_rounded.svg'),
            link: ''
        },
        {
            icon: asset('assets/frontend/icons/ic_share_fb_rounded.svg'),
            link: ''
        },
    ])

    onMounted(() => {
        if (props.type == 'news') {
            otherLinks.value = [{
                route: route('media.index', { type: 'news' }),
                title: 'News'
            }]
        }

        if (props.type == 'blog') {
            otherLinks.value = [{
                route: route('media.index', { type: 'blog' }),
                title: 'Blog'
            }]
        }
    })
</script>
