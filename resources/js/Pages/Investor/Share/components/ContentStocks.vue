<template>
    <div>
        <div class="flex gap-6 w-full border-b-2 border-b-neutral-6">
            <div
                v-for="tab in tabs"
                :key="tab.id"
                class="border-b-2 border-b-transparent text-neutral-13 text-lg text-center p-4 hover:border-b-blue-base hover:border-b-4 hover:font-medium transition cursor-pointer"
                :class="{
                    'border-b-4 !border-b-blue-base font-medium': tabActive == tab.id
                }"
                @click="changeTab(tab.id)"
            >
                {{ tab.name }}
            </div>
        </div>

        <div v-show="tabActive == 'top-10-shareholders'">
            <p class="my-10 text-2xl lg:text-[28px] font-medium text-neutral-13">Top 10 Shareholders</p>
            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>Issuance Year</th>
                            <th>Bonds Name</th>
                            <th>Total Issuance (million)</th>
                            <th>Interests Rate (%)</th>
                            <th>Maturity Date</th>
                            <th>Bonds Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="i in 4" :key="i">
                            <td>2018</td>
                            <td>Obligasi Berkelanjutan I Chandra Asri Petrochemical Tahap II Tahun 2018- Seri C</td>
                            <td>IDR300,000</td>
                            <td>9.00% p.a</td>
                            <td>1 Mar 2025</td>
                            <td>idAA- (PEFINDO)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-show="tabActive == 'dividend-information'">
            <div class="content my-10 !text-neutral-8">
                <p>Current dividend policy of the Company is to pay dividends to its shareholders in the amount of approximately 40% of the Company’s net income. The dividends will be subject to the Company’s cash flow and investment plans, as well as requirements imposed by the Company’s indebtedness, regulatory restrictions and other requirements.</p>
                <p>Under Indonesian law, the decision with regards to dividends is made by a resolution of the shareholders at the Annual General Meeting of Shareholders upon the recommendation of the Board of Directors. The Company may declare dividends in any year if the Company has positive retained earnings and after deduction of reserves fund. The recommendation, amount and payment of dividends by the Board of Directors of the Company and the approval of dividends by the Board of Commissioners of the Company is at their discretion and will depend on a number of factors including the Company’s net profits, availability of mandatory reserves, capital expenditure requirements, results of operations, and cash flows. These, in turn, depend on a variety of factors including successful implementation of the Company’s business strategy, financial, competitive and regulatory considerations, general economic conditions and other factors that may be specific to the Company and its industry. Many of these factors are beyond the Company’s control.</p>
                <p>Prior to the end of a financial year, an interim dividend may be distributed so long as it is permitted under the Company’s Articles of Association and provided that the interim dividend does not result in its net assets becoming less than the total issued and paid up capital and the compulsory reserves. Such distribution is determined by the Board of Directors after first being approved by the Board of Commissioners. If, after the end of the relevant financial year, the Company suffers losses, the distributed interim dividend must be returned by the shareholders to the Company, and the Board of Directors and Board of Commissioners will be jointly and severally responsible if the interim dividend is not returned.</p>
                <p>To the extent a decision is made to declare dividends, dividends will be paid in Indonesian Rupiah. Shareholders on the applicable recording date will be entitled to the full amount of dividends approved, subject to any Indonesian withholding tax imposed. Dividends received by non-Indonesian shareholders will be subject to 20% Indonesian withholding tax.</p>
            </div>
            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>Financial Year</th>
                            <th>Dividend/Share US$ (Rp)</th>
                            <th>Total Dividend US$</th>
                            <th>Distribution Date</th>
                            <th>Dividend Payout Ratio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="i in 4" :key="i">
                            <td>2018</td>
                            <td>Obligasi Berkelanjutan I Chandra Asri Petrochemical Tahap II Tahun 2018- Seri C</td>
                            <td>IDR300,000</td>
                            <td>9.00% p.a</td>
                            <td>1 Mar 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { ref } from 'vue'
    const tabActive = ref('top-10-shareholders')


    const tabs = ref([
        {
            id: 'top-10-shareholders',
            name: 'Top 10 Shareholders'
        },
        {
            id: 'dividend-information',
            name: 'Dividend Information'
        }
    ])

    const changeTab = (id: string) => {
        tabActive.value = id
    }

</script>
