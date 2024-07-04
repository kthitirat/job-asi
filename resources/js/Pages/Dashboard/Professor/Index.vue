<template>
    <Layout>
        <div class="flex justify-end">
            <Link :href="route('dashboard.professors.create')" class="uppercase btn btn-primary">New Professor</Link>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50 ">
                <tr class="bg-white border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">รูป</th>
                    <th class="px-6 py-3">ชื่อ</th>
                    <th class="px-6 py-3">คณะ</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody v-if="professorData!=null">
                <tr v-for="(professor,index) in professorData" :key="index"
                    class="bg-white border-b">
                    <th class="text-center">{{ professor.id }}</th>
                    <td class="px-6 py-4">
                        <div v-if="professor.image.data.length > 0" class="w-20 h-32">
                            <img :src="professor.image.data[0].url" class="object-cover h-full w-20">
                        </div>
                    </td>
                    <td>
                        <Link :href="route('dashboard.professors.edit',professor.id)" class="underline">
                            {{ professor.full_name }}
                        </Link>
                    </td>
                    <td>
                        {{ professor.department.name }}
                    </td>
                    <td>
                        <button class="btn btn-error text-white btn-sm" type="button"
                                @click="handleDeleteSubject(professor)">
                            Delete
                        </button>
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
    name: "ProfessorIndex",
    components: {
        Link,
        Layout
    },
    props: {
        professors: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            professorData: null,
            pagination: null
        }
    },
    mounted() {
        this.professorData = this.professors.data;
        this.pagination = this.professors.meta.pagination;
    },
    methods: {
        handleDeleteSubject(professor) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบอาจารย์ " + professor.full_name + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.professors.destroy', professor.id));
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
