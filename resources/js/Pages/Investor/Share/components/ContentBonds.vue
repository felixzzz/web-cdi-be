<template>
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

</template>

<script setup lang="ts">


</script>
