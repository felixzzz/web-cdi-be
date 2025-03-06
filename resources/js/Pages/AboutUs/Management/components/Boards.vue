<template>
    <div
        class="pb-20 bg-blue-dark bg-no-repeat bg-contain"
        :style="{
            'backgroundImage': `url(${asset('assets/frontend/images/about/world_map.webp')})`,
            'backgroundPositionY': '48px'
        }"
    >
        <container>
            <board-of-directors />
            <board-of-commissioners />
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import BoardOfDirectors from './BoardOfDirectors.vue'
    import BoardOfCommissioners from './BoardOfCommissioners.vue'
    import { asset } from '@/Lib/utils'

</script>
