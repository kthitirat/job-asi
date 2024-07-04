<template>
    <Layout>
        <div class="w-full flex justify-end">
            <Link :href="route('dashboard.announcements.edit',announcement.id)" class="btn btn-primary">EDIT</Link>
        </div>
        <AnnouncementForm :all-categories="allCategories" :all-types="allTypes" :announcement="announcement"
                          mode="show"/>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50">
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th class="px-6 py-3">หมายเลขใบสมัคร</th>
                    <th class="px-6 py-3">ชื่อ</th>
                    <th class="px-6 py-3">เบอร์โทร</th>
                    <th class="px-6 py-3">email</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(applicant,index) in announcement.applicants.data" :key="index"
                    class="bg-white border-b hover:bg-gray-50">
                    <th class="text-center">{{ applicant.id }}</th>
                    <td class="px-6 py-4"> {{ applicant.prefix }}{{ applicant.user.name }}</td>
                    <td class="px-6 py-4">{{ applicant.phone }}</td>
                    <td class="px-6 py-4">{{ applicant.user.email }}</td>
                    <td class="px-6 py-4 flex flex-col items-center gap-1">
                        <Link :href="route('dashboard.applicants.show', { applicant: applicant.id })"
                              class="btn btn-primary btn-sm w-16">
                            SHOW
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3';
import AnnouncementForm from "@/Pages/Dashboard/Announcement/AnnouncementForm.vue";

export default {
    name: "AnnouncementShow",
    components: {Layout, Link, AnnouncementForm},
    props: {
        announcement: {
            type: Object,
            required: true
        },
        allTypes: {
            type: Array,
            required: true
        },
        allCategories: {
            type: Array,
            required: true
        },


    },
    mounted() {

    },
    data() {
        return {};
    },
    methods: {},
    watch: {}
};
</script>
