<template>
    <section id="content-certificate-section">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white" v-if="!paginate.state.loading">
            <certification-card
                v-for="(item, i) in paginate.state.items" :key="i"
                :item="item"
                @detail="showDetail(item)"
                @image="showImage(item)"

            />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white" v-if="paginate.state.loading">
            <award-card-loading
                v-for="i in 2" :key="i"
            />
        </div>

        <pagination-link
            :links="paginate.state.links"
            :meta="paginate.state.meta"
            @fetch="changePage"
            :dark="true"
        />

        <certification-popup v-bind:data="detail" @image="showImage" />
        <certification-image-popup v-bind:data="detail" v-bind:index-image="indexImage" />

    </section>


</template>

<script setup lang="ts">
    import CertificationCard from '@/Components/Ui/Certification/CertificationCard.vue'
    import usePaginate from '@/Composables/usePaginate'
    import { Certification } from '@/types/utility'
    import { onBeforeMount } from 'vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import AwardCardLoading from '@/Components/Ui/Award/AwardCardLoading.vue'
    import CertificationPopup from '@/Components/Ui/Certification/CertificationPopup.vue'
    import CertificationImagePopup from '@/Components/Ui/Certification/CertificationImagePopup.vue'
    import { ref } from 'vue'
    import { triggerClick } from '@/Lib/utils'

    const paginate = usePaginate<Certification>({
        route: route("api.certificates.list"),
        scroll: 'content-certificate-section'
    });

    const detail = ref<Certification | null>(null)
    const indexImage = ref(0)

    const changePage = () => {
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()
    })

    const showDetail = (data: Certification) => {
        detail.value = data
        triggerClick('#certification-popup')
    }

    const showImage = (data: Certification, index?: number) => {
        detail.value = data
        indexImage.value = index ? index : 0
        triggerClick('#certification-image-popup')
    }

</script>
