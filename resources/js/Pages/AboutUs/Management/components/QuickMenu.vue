<template>
    <div class="bg-blue-dark sticky top-0 z-10">
        <container>
            <div class="gap-10 flex items-center overflow-y-auto">
                <div
                    v-for="tab in tabs"
                    :key="tab.id"
                    class="text-base font-normal text-white py-3 border-b-2 border-b-transparent cursor-pointer whitespace-nowrap"
                    :class="{
                        '!border-b-blue-lighter': tabActive == tab.id
                    }"
                    @click="scrollToSection(tab.id)"
                >
                    {{ tab.name }}
                </div>
            </div>
        </container>
    </div>

    <div class="pt-20 pb-16 bg-blue-dark">
        <container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
                <h2 class="text-2xl leading-6  lg:text-[52px] lg:leading-[60px] font-medium text-blue-lighter">
                    The People Behind Our Success
                </h2>
                <p class="text-neutral-4 text-base">
                    Chandra Daya Investasi leadership team made up of seasoned professionals from diverse backgrounds, brings extensive expertise to guide strategic corporate actions and foster innovation. Meanwhile, our well-defined management structure is crucial ensuring effective decision-making, clear lines of accountability, and the efficient execution of strategic initiatives. All of these drive our overall growth.
                </p>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { onMounted, onUnmounted, ref } from 'vue'

    const tabActive = ref('board-of-directors')
    const lastScrollY = ref(window.scrollY)

    const tabs = ref([
        { id: 'board-of-directors', name: 'Board of Directors' },
        { id: 'board-of-commissioners', name: 'Board of Commissioners' },
        { id: 'organization-structure', name: 'Organization Structure' },
        { id: 'corporate-structure', name: 'Corporate Structure' },
        { id: 'guidelines-of-work', name: 'Guidelines of Work' }
    ])

    const scrollToSection = (id: string) => {
        const section = document.getElementById(id)
        if (section) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' })
        }
    }

    const checkActiveSection = () => {
        const currentScrollY = window.scrollY
        lastScrollY.value = currentScrollY

        tabs.value.forEach((tab) => {
            const section = document.getElementById(tab.id)
            if (section) {
                const rect = section.getBoundingClientRect()
                if (rect.top < 88) {
                    tabActive.value = tab.id
                }
            }
        })
    }

    onMounted(() => {
        window.addEventListener('scroll', checkActiveSection)
    })

    onUnmounted(() => {
        window.removeEventListener('scroll', checkActiveSection)
    })


</script>
