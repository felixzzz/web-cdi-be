<template>
    <section id="content-award-section" x-data="{filter_year: false}">
        <div class="relative" x-on:click.away="filter_year = false">
            <div class="px-6 py-2 rounded-full border border-white text-white flex items-center gap-2 w-fit mb-8 cursor-pointer relative" x-on:click="filter_year=!filter_year">
                {{ !selectedYear ? $t('All Year') : selectedYear }}
                <i class="isax icon-arrow-down-1"></i>
            </div>
            <div class="absolute bg-white text-neutral-13 p-2 rounded top-12 shadow w-[100px] left-0 flex flex-col gap-1" x-show="filter_year">
                <div
                    class="w-full cursor-pointer text-center px-2 py-1 rounded hover:bg-neutral-5"
                    :class="selectedYear == '' ? 'bg-neutral-5' : ''"
                    @click="filterYear('')"
                    x-on:click="filter_year=false"
                >
                    {{ $t('All Year') }}
                </div>
                <div
                    v-for="year in years"
                    :key="year"
                    class="w-full cursor-pointer text-center px-2 py-1 rounded hover:bg-neutral-5"
                    :class="selectedYear == year ? 'bg-neutral-5' : ''"
                    @click="filterYear(year)"
                    x-on:click="filter_year=false"
                >
                    {{ year }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 gap-y-16 text-white" v-if="!paginate.state.loading">
            <award-card
                v-for="(item, i) in paginate.state.items" :key="i"
                :item="item"
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
    </section>


</template>

<script setup lang="ts">
    import AwardCard from '@/Components/Ui/Award/AwardCard.vue'
    import AwardCardLoading from '@/Components/Ui/Award/AwardCardLoading.vue'
    import PaginationLink from '@/Components/Ui/Utils/PaginationLink.vue'
    import usePaginate from '@/Composables/usePaginate'
    import useRequest from '@/Composables/useRequest'
    import { getQueryParam, routeAppendParam } from '@/Lib/utils'
    import { Award } from '@/types/utility'
    import { onBeforeMount, ref } from 'vue'

    const years = ref<number[] | string[]>([])
    const selectedYear = ref<number | string>(getQueryParam('year') ||'')

    const paginate = usePaginate<Award>({
        route: route("api.awards.list"),
        scroll: 'content-award-section'
    });

    const changePage = () => {
        paginate.fetchData()
    }

    onBeforeMount(() => {
        paginate.fetchData()

        useRequest().get(route('api.awards.years'))
        .then((result) => {
            years.value = result.data
        })
    })

    const filterYear = (year: any) => {
        selectedYear.value = year
        routeAppendParam({year: year})
        paginate.fetchData()
    }

</script>
