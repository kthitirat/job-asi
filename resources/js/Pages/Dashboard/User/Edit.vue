<template>
    <Layout>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="col-span-1 sm:col-span-2">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">สิทธิ์การเข้าถึงระบบ</span>
                        </div>
                        <select v-model="form.role_id" class="select select-bordered w-full uppercase">
                            <option value="">สิทธิ์การเข้าถึงระบบ</option>
                            <option v-for="role in roles" :key="role.id" :value="role.id">
                                <p class="uppercase">{{ role.name }}</p>
                            </option>
                        </select>
                    </label>
                    <div v-if="$page.props.errors.role_id" class="text-red-500 text-sm">
                        {{ $page.props.errors.role_id }}
                    </div>
                </div>

                <div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">ชื่อ-สกุลผู้ประสานงานประจำสถาบัน</span>
                        </div>
                        <input v-model="form.name" class="input input-bordered w-full"
                            placeholder="ชื่อ-สกุลผู้ประสานงานประจำสถาบัน"
                            type="text"/>
                    </label>
                    <div v-if="$page.props.errors.name" class="text-red-500 text-sm">
                        {{ $page.props.errors.name }}
                    </div>
                </div>

                <div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">ชื่อสถาบันการศึกษา</span>
                        </div>
                        <input v-model="form.institution" class="input input-bordered w-full"
                            placeholder="ชื่อสถาบันการศึกษา"
                            type="text"/>
                    </label>
                    <div v-if="$page.props.errors.institution" class="text-red-500 text-sm">
                        {{ $page.props.errors.institution }}
                    </div>
                </div>

                <div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">EMAIL</span>
                        </div>
                        <input v-model="form.email" class="input input-bordered w-full"
                            placeholder="EMAIL"
                            type="text"/>
                    </label>
                    <div v-if="$page.props.errors.email" class="text-red-500 text-sm">
                        {{ $page.props.errors.email }}
                    </div>
                </div>

                <div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">หมายเลขโทรศัพท์</span>
                        </div>
                        <input v-model="form.tel" class="input input-bordered w-full"
                            placeholder="หมายเลขโทรศัพท์ ผู้ประสานงานประจำสถาบัน"
                            type="text"/>
                    </label>
                    <div v-if="$page.props.errors.tel" class="text-red-500 text-sm">
                        {{ $page.props.errors.tel }}
                    </div>
                </div>

                <div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input v-model="form.password" class="input input-bordered w-full"
                            placeholder="Password"
                            type="password"/>
                    </label>
                    <div v-if="$page.props.errors.password" class="text-red-500 text-sm">
                        {{ $page.props.errors.password }}
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-end mt-4">
                <button :disabled="submitting" class="btn btn-primary uppercase" type="submit">Submit</button>
            </div>

        </form>
    </Layout>
</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link, router} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3'


export default {
    name: "UserEdit",
    components: {Layout, Link},
    props: {
        user: {
            type: Object,
            required: true
        },  
        roles: {
            type: Array,
            required: true
        },
        errors: Object,  
    },
    mounted() {
        
    },
    data() {
        return {
            submitting:false,
            form: useForm({
                name: this.user.name ?? "",
                institution: this.user.institution,            
                email: this.user.email,            
                tel: this.user.tel, 
                role_id: this.user.role_id,     
                password: null      
            }),
        };
    },
    methods: {        
         submit() {
            this.submitting = true;
            const url = this.route('dashboard.users.update', this.user.id);
            router.post(url, {
                _method: 'patch',
                user_id: this.user.id,
                name: this.form.name,
                institution: this.form.institution,
                email: this.form.email,
                tel: this.form.tel,
                role_id: this.form.role_id,
                password: this.form.password
                
            });
        },
    },
    watch: {}
};
</script>
