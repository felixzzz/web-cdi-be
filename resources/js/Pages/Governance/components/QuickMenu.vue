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
import useRequest from '@/Composables/useRequest';
    import { NameId, PreferenceGovernance } from '@/types/utility'
    import { onMounted, onUnmounted, ref } from 'vue'

    const props = defineProps<{
        content: PreferenceGovernance
    }>()

    const tabActive = ref('corporate-secretary')
    const lastScrollY = ref(window.scrollY)

    const tabs = ref<NameId[]>([])

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

    const getCommitte = async () => {
        let needGetCommitte: boolean = true;
        let showCommitte: boolean = false

        if (props.content.governance_audit_committe_show?.content_en == 'show' || props.content.governance_sustainability_committe_show?.content_en == 'show') {
            needGetCommitte = false
            showCommitte = true
        }

        if (needGetCommitte) {
            await useRequest().get(route('api.utility.has-governance-committes'))
            .then((result) => {
                if (result.data?.length > 0) showCommitte = true
            })
        }

        if (showCommitte) tabs.value.push({ id: 'committee', name: $t('Committee' )},)
    }

    onMounted(async () => {

        tabs.value.push({ id: 'corporate-secretary', name: $t('Corporate Secretary' )},)
        tabs.value.push({ id: 'internal-audit-unit', name: $t('Internal Audit Unit' )},)
        await getCommitte()
        if (props.content.governance_risk_management_show?.content_en == 'show') tabs.value.push({ id: 'risk-management', name: $t('Risk Management' )},)
        tabs.value.push({ id: 'code-of-conduct', name: $t('Code of Conduct' )},)
        if (props.content.governance_policy_show?.content_en == 'show') tabs.value.push({ id: 'policy', name: $t('Policy' )},)
        tabs.value.push({ id: 'whistleblowing', name: $t('Whistleblowing') })

        window.addEventListener('scroll', checkActiveSection)
    })

    onUnmounted(() => {
        window.removeEventListener('scroll', checkActiveSection)
    })


</script>
