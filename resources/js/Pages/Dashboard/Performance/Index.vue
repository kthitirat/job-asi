<template>
    <Layout>
        <div class="flex justify-end">
            <Link :href="route('dashboard.performances.create')" class="uppercase btn btn-primary">New performance</Link>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
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
                    <th class="text-center">{{ performance.id }}</th>
                    <td class="px-6 py-4">
                        <!-- <a :href="route('dashboard.performances.edit',performance.id)" class="underline"
                           target="_blank"> -->
                            {{ performance.owner.institution }}
                        <!-- </a> -->
                    </td>
                    <td>{{ performance.owner.name }}</td>
                    <td>{{ performance.owner.email }}</td>
                    <td>{{ performance.owner.tel }}</td>
                    <td>
                        <div class="flex w-full items-center justify-center">
                            <input :checked="performance.is_published" type="checkbox" class="toggle toggle-success"  />
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="pagination != null" id="pagination" class="mt-4 flex justify-between items-center">
            <div>แสดง {{ pagination.from }} ถึง {{ pagination.to }} จาก {{ pagination.total }} แถว</div>
            <div class="join">
                <button v-for="(pag,index) in pagination.links" :key="index"
                        :class="pag.active ?'btn-active':''"
                        class="join-item btn btn-md" @click="selectPage(pag)">
                    {{ pag.label }}
                </button>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";
import {nextTick} from "vue";

export default {
    name: "PerformancesIndex",
    components: {
        Link,
        Layout
    },
    props: {
        performances: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            performanceData: null,
            pagination: null
        }
    },
    mounted() {
        this.performanceData = this.performances.data;
        this.pagination = this.performances.meta.pagination;
    },
    methods: {
        handleDeleteperformance(performance) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบวิชา " + performance.name_th + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.performances.destroy', performance.id));
                    nextTick(() => {
                        window.location.reload();
                    })
                }
            });
        },
        selectPage(pag) {
            Inertia.get(pag.url);
        },
    }
}
</script>

<style scoped>

</style>
