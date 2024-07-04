<template>
    <Layout>
        <div class="flex justify-end">
            <Link :href="route('dashboard.subjects.create')" class="uppercase btn btn-primary">New Subject</Link>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50 ">
                <tr class="bg-white border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">ปก</th>
                    <th class="px-6 py-3">รหัสวิชา</th>
                    <th class="px-6 py-3">ชื่อวิชา</th>
                    <th class="px-6 py-3">วันที่เผยแพร่</th>
                    <th class="px-6 py-3">อาจารย์</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody v-if="subjectData!=null">
                <tr v-for="(subject,index) in subjectData" :key="index"
                    class="bg-white border-b">
                    <th class="text-center">{{ subject.raw_id }}</th>
                    <td class="px-6 py-4">
                        <div v-if="subject.image.data.length > 0" class="w-20 h-32">
                            <img :src="subject.image.data[0].url" class="object-cover h-full w-20">
                        </div>
                    </td>
                    <td>
                        {{ subject.code }}
                    </td>
                    <td>
                        <Link :href="route('dashboard.subjects.edit',subject.raw_id)">
                            <p> {{ subject.name_th }}</p>
                            <p> {{ subject.name_en }}</p>
                        </Link>

                    </td>
                    <td>
                        {{ subject.display_published_at }}
                    </td>
                    <td>
                        <div>
                            <p v-for="(professor) in subject.professors">
                                {{ professor.prefix }} {{ professor.first_name }} {{ professor.last_name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-error text-white btn-sm" type="button"
                                @click="handleDeleteSubject(subject)">
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
    name: "SubjectIndex",
    components: {
        Link,
        Layout
    },
    props: {
        subjects: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            subjectData: null,
            pagination: null
        }
    },
    mounted() {
        this.subjectData = this.subjects.data;
        this.pagination = this.subjects.meta.pagination;
    },
    methods: {
        handleDeleteSubject(subject) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบวิชา " + subject.name_th + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.subjects.destroy', subject.id));
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
