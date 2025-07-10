<template>
    <div class="bg-blue-dark relative" v-if="content.about_us_youtube?.content_en">
        <container>
            <div class="aspect-video w-full">
                <iframe
                    class="w-full h-full rounded-xl"
                    :src="content.about_us_youtube?.content_en"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                ></iframe>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { PreferenceAboutOverview } from '@/types/utility'

    defineProps<{
        content: PreferenceAboutOverview
    }>()

</script>
