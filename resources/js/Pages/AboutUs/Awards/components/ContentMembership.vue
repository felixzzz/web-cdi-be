<template>
    <section id="content-membership-section">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white" v-if="!paginate.state.loading">
            <award-card
                v-for="(item, i) in paginate.state.items" :key="i"
                :item="item"
                @image="showImage(item)"
            />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white" v-if="paginate.state.loading">
            <award-card-loading
                v-for="i in 2" :key="i"
            />
        </div>

        <award-image-popup v-bind:data="detail" />

        <pagination-link
            :links="paginate.state.links"
            :meta="paginate.state.meta"
            @fetch="changePage"
            :dark="true"
        />
    </section>


</template>

<script setup lang="ts">
    import usePaginate from '@/Composables/usePaginate'
    import { Award } from '@/types/utility'
    import { onBeforeMount, ref } from 'vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import AwardCardLoading from '@/Components/Ui/Award/AwardCardLoading.vue'
    import AwardCard from '@/Components/Ui/Award/AwardCard.vue'
    import AwardImagePopup from '@/Components/Ui/Award/AwardImagePopup.vue'
    import { triggerClick } from '@/Lib/utils'

    const detail = ref<Award | null>(null)

    const paginate = usePaginate<Award>({
        route: route("api.memberships.list"),
        scroll: 'content-membership-section'
    });

    const changePage = () => {
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()
    })

    const showImage = (data: Award) => {
        detail.value = data
        triggerClick('#award-image-popup')
    }

</script>
