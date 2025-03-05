<template>
    <div class="mb-28">
        <container>
            <p class="text-end text-red-6 text-sm mb-2">*in thousands US$</p>

            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th class="text-left">Explanation</th>
                            <th v-for="i in years" :key="i">
                                {{ i }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(explanation, i) in explanations" :key="i">
                            <tr>
                                <td :colspan="years.length + 1" class="group">
                                    {{ explanation.group }}
                                </td>
                            </tr>
                            <tr v-for="(item, index) in explanation.subs" :key="index">
                                <td>{{ item.name }}</td>
                                <td v-for="(year, yearIndex) in item.years" :key="year" :class="yearIndex == 0 ? 'bg-yellow' : ''">
                                    {{ year }}
                                </td>
                            </tr>


                        </template>
                    </tbody>
                </table>
            </div>
        </container>
    </div>

</template>

<script setup lang="ts">
    import Container from '@/Components/Section/Container.vue'
    import { ref } from 'vue'

    const years  = ref([
        2024,
        2023,
        2022,
        2021,
        2020
    ])


    const explanations = ref([
        {
            group: 'Consolidated Statement of Profit or Loss and other Comprehensive Income',
            subs: [
                {
                    name: 'Net Revenues',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Cost of Revenues',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Gross Profit (Loss)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Net Profit (Loss) For The Year',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Net Profit (Loss) For The Year Attributable to Owners of the Company',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Net Profit (Loss) For The Year Attributable to Non-controlling Interests',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Total Comprehensive Income (Loss) For The Year',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Total Comprehensive Income (Loss) For The Year Attributable to Owners of The Company',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Total Comprehensive Income (Loss) For The Year Attributable to Non-controlling Interests',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Basic Earnings (Loss) per Share (in full U.S. Dollar amount)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'EBITDA',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                }
            ]
        },
        {
            group: 'Consolidated Statements of Financial Position',
            subs: [
                {
                    name: 'Total Assets',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Total Liabilities',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Total Equity',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Investment In Associate',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Net Working Capital',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                }
            ]
        },
        {
            group: 'Ratio',
            subs: [
                {
                    name: 'Gross Profit (Loss) Margin (%)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Net Profit (Loss) Margin (%)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Cash Ratio (X)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Current Ratio (X)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Liability To Equity Ratio (X)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Liability To Assets Ratio (X)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                },
                {
                    name: 'Return on Equity Ratio (%)',
                    years: [
                        '2,078,102',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545',
                        '2,395,545'
                    ]
                }
            ]
        }
    ])

</script>
