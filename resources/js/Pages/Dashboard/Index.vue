<template>
    <Layout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="card bg-blue-300 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-blue-600">ลงทะเบียนทั้งหมด</h2>
                <div class="flex w-full justify-end">
                    <div class="text-4xl font-bold">{{ performanceCount }}</div>
                </div>
            </div>
        </div>
        <div class="card bg-blue-300 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-blue-600">ที่ส่งแล้ว</h2>
                <div class="flex w-full justify-end">
                    <div class="text-4xl font-bold">{{ publishedPerformanceCount }}</div>
                </div>
            </div>
        </div>
        <div class="card bg-blue-300 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-blue-600">ที่ยังไม่ส่งแล้ว</h2>
                <div class="flex w-full justify-end">
                    <div class="text-4xl font-bold">{{ unpublishedPerformanceCount }}</div>
                </div>
            </div>
        </div>
    </div>
        <div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-gray-700 uppercase bg-gray-50 ">
                    <tr class="bg-white border-b">
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">ชื่อหน่วยงาน</th>
                        <th class="px-6 py-3">ชื่อผู้ประสานงาน</th>
                        <th class="px-6 py-3">อีเมลล์</th>
                        <th class="px-6 py-3">โทร</th>
                        <th class="px-6 py-3">สถานะ</th>
                    </tr>
                    </thead>
                    <tbody v-if="performanceData!=null">
                    <tr v-for="(performance,index) in performanceData" :key="index"
                        class="bg-white border-b">
                        <!-- <th class="text-center">{{ performance.id }}</th> -->
                        <th class="text-center">{{ index + 1 }}</th> 
                        <td class="px-6 py-4">
                            <a :href="route('dashboard.performances.edit',performance.id)" class="underline"
                            target="_blank"> 
                                {{ performance.owner.institution }}
                            </a> 
                        </td>
                        <td>{{ performance.owner.name }}</td>
                        <td>{{ performance.owner.email }}</td>
                        <td>{{ performance.owner.tel }}</td>
                        <td>
                            ส่งแล้ว ({{performance.submitted_at}})
                            <!-- <div class="flex w-full items-center justify-center">
                                <input :checked="performance.is_published" class="toggle toggle-success"
                                        type="checkbox" @change="handlePublish(performance)"  />
                            </div> -->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";

export default {
    name: "DashboardIndex",
    components: {Layout},
    props: {
        performanceCount: {
            type: Number,
            required: true
        },
        publishedPerformanceCount: {
            type: Number,
            required: true
        },
        performances: {
            type: Array,
            required: true
        },
        unpublishedPerformanceCount:{
            type: Number,
            required: false
        }
    },
    mounted() {
        this.performanceData = this.performances;
    },
    data() {
        return {
            performanceData: null
        };
    }
};
</script>
