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

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { onMounted, onUnmounted, ref } from 'vue'

    const tabActive = ref('company-overview')
    const lastScrollY = ref(window.scrollY)

    const tabs = ref([
        { id: 'company-overview', name: $t('Company Overview') },
        { id: 'mission-vision', name: $t('Vision & Mission') },
        { id: 'our-history', name: $t('Our History') },
        { id: 'milestone', name: $t('Milestone') },
        { id: 'company-profile', name: $t('Company Profile') },
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
