<template>
    <Layout>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50 ">
                <tr class="bg-white border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">organization</th>                   
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Tel</th> 
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody v-if="userData!=null">
                <tr v-for="(user,index) in userData" :key="index"
                    class="bg-white border-b">
                    <th class="text-center">{{ user.id }}</th>
                    <td class="px-6 py-4">
                        <Link :href="route('dashboard.users.edit',user.id)">
                            {{ user.name }}
                        </Link>
                    </td>

                    <td>
                        {{ user.institution }}
                    </td>

                    <td>
                        {{ user.email }}
                    </td>

                    <td>
                        {{ user.tel }}
                    </td>

                    <td>
                        <p class="uppercase">
                            {{ user.role?.name  }}
                        </p>
                    </td>
               
                    <td>
                        <button class="btn btn-error text-white btn-sm" type="button"
                                @click="handleDeleteUser(user)">
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
import {Inertia} from "@inertiajs/inertia";
import {nextTick} from "vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "UserIndex",
    components: {Layout,Link},
    props: {
        users: {
            type: Object,
            required: true
        },
       
    },
    mounted() {
       this.userData = this.users.data;
       this.pagination = this.users.meta.pagination;

    },
    data() {
        return {
            userData:null,
            pagination: null

        };
    },
    methods:{
        handleDeleteUser(user) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบ user " + user.name_th + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.users.destroy', user.id));
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

};
</script>
