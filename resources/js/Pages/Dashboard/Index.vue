<template>
    <Layout>
        <!-- <div class="flex flex-wrap gap-4 z-0">
            <div class="card bg-blue-300 w-96 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-blue-600">Show ทั้งหมด</h2>
                    <div class="flex w-full justify-end">
                        <div class="text-4xl font-bold">{{ performanceCount }}</div>
                    </div>
                </div>
            </div>
            <div class="card bg-blue-300 w-96 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-blue-600">ที่ส่งแล้ว</h2>
                    <div class="flex w-full justify-end">
                        <div class="text-4xl font-bold">{{ publishedPerformanceCount }}</div>
                    </div>
                </div>
            </div>
        </div> -->
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";

export default {
    name: "DashboardIndex",
    components: {Layout},
    props: {
        // performanceCount: {
        //     type: Number,
        //     required: true
        // },
        // publishedPerformanceCount: {
        //     type: Number,
        //     required: true
        // }
    },
    mounted() {
    },
    data() {
        return {};
    }
};
</script>
