<template>
    <div class="py-20 bg-blue-dark">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
                <h2 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium text-blue-lighter max-w-[580px]">
                    {{ content.sustainability_environment_overview?.title }}
                </h2>
                <p class="content !text-neutral-4 text-base whitespace-pre-line" v-html="content.sustainability_environment_overview?.content"></p>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'

    import { PreferenceSustainabilityEnvironment } from '@/types/utility'

    defineProps<{
        content: PreferenceSustainabilityEnvironment
    }>()
</script>
