<template>
    <div class="py-20">
        <container>
            <breadcrumb base="Home" :route="route('home')" :current="data.title" v-bind:links="otherLinks" />

            <div class="flex items-center justify-between gap-2 my-4">
                <p class="text-neutral-10">{{ data.date }}</p>

                <div class="flex items-center gap-2">
                    <Link v-for="(item, index) in shares" :key="index" :href="item.link">
                        <img :src="item.icon" alt="">
                    </Link>
                </div>
            </div>

            <img :src="data.image" alt="" class="w-full rounded-xl mb-10">
            <h1 class="text-neutral-13 font-medium text-2xl lg:text-[38px] lg:leading-[44px] mb-6">
                {{ data.title }}
            </h1>

            <div class="content primary !text-neutral-9" v-html="data.content"></div>

            <div class="mt-16 flex-col text-center">
                <p class="font-medium text-neutral-13 lg:text-lg mb-4">
                    {{ $t('Share this post') }}
                </p>
                <div class="flex items-center gap-2 justify-center">
                    <a
                        v-for="(item, index) in shares" :key="index" :href="item.link"
                        @click="handleClick(item, $event)"
                        target="_blank"
                    >
                        <img :src="item.icon" alt="">
                    </a>
                </div>

                <div class="flex items-center gap-2 justify-center mt-12">
                    <template v-for="tag in data.tags" :key="tag">
                        <div class="bg-neutral-4 px-3 py-[6px] rounded-full text-sm text-neutral-10" v-if="tag">
                            {{ tag }}
                        </div>
                    </template>
                </div>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import Breadcrumb from '@/Components/Ui/Utils/Breadcrumb.vue'
    import { asset, showAlert } from '@/Lib/utils'
    import { BreadcrumbLink, News } from '@/types/utility'
    import { Link } from '@inertiajs/vue3'
    import { onMounted, ref } from 'vue'

    const props = defineProps<{
        type: string;
        data: News;
    }>()

    const otherLinks = ref<BreadcrumbLink[]>([])

    const rawUrl = route('media.detail', { type: props.type, id: props.data.slug })
    const urlToShare = encodeURIComponent(rawUrl)

    const shares = ref([
        {
            icon: asset('assets/frontend/icons/ic_share_copy_rounded.svg'),
            link: '#',
            action: () => {
                navigator.clipboard.writeText(rawUrl)
                showAlert($t('Link copied to clipboard!'))
            }

        },
        {
            icon: asset('assets/frontend/icons/ic_share_linkedin_rounded.svg'),
            link: `https://www.linkedin.com/shareArticle?mini=true&url=${urlToShare}`,
        },
        {
            icon: asset('assets/frontend/icons/ic_share_x_rounded.svg'),
            link: `https://x.com/intent/tweet?url=${urlToShare}`,
        },
        {
            icon: asset('assets/frontend/icons/ic_share_fb_rounded.svg'),
            link: `https://www.facebook.com/sharer/sharer.php?u=${urlToShare}`,
        },
    ])

    const handleClick = (item: any, event: any) => {
        if (item.action) {
            event.preventDefault()
            item.action()
        }
    }


    onMounted(() => {
        if (props.type == 'news') {
            otherLinks.value = [{
                route: route('media.index', { type: 'news' }),
                title: $t('News')
            }]
        }

        if (props.type == 'blog') {
            otherLinks.value = [{
                route: route('media.index', { type: 'blog' }),
                title: $t('Blog')
            }]
        }
    })
</script>
