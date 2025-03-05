<template>
    <div class="pb-20 bg-blue-dark">
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

</script>
