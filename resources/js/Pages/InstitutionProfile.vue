<template>
    <Layout>
       <div>
        <form autocomplete="off" @submit.prevent="submit" >
            <p class="text-lg font-bold">UPDATE ข้อมูลผู้ประสานงาน</p>
            <div class="bg-white p-8 shadow-lg rounded-xl">
                <div class="mt-4">
                    <div>
                        <InputLabel for="institution" value="Institution" />
                        <input id="institution" v-model="form.institution" autocomplete="institution"
                            class="input input-bordered w-full"
                            placeholder="ชื่อสถาบันการศึกษา"
                            required type="institution" />
                        <InputError :message="form.errors.institution" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <InputLabel for="name" value="Firstname" />
                            <input id="name" v-model="form.name" autocomplete="name"
                                autofocus class="input input-bordered w-full"
                                placeholder="ชื่อ-สกุล ผู้ประสานงานประจำสถาบัน"
                                required type="text" />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>

                        <div>
                            <InputLabel for="tel" value="Phone" />
                            <input id="tel" v-model="form.tel" autocomplete="tel"
                                class="input input-bordered w-full"
                                placeholder="หมายเลขโทรศัพท์ ผู้ประสานงานประจำสถาบัน"
                                required type="tel" />
                            <InputError :message="form.errors.tel" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />
                        <input id="email" v-model="form.email" autocomplete="email"
                            class="input input-bordered w-full"
                            placeholder="Email"
                            required type="email" />
                        <InputError :message="form.errors.email" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <InputLabel for="pwd" value="Password"/>
                            <input v-model="form.password"
                                autocomplete="off"
                                class="input input-bordered w-full"
                                placeholder="กรอกรหัสผ่านหากต้องการเปลี่ยน!!"
                                type="text"/>
                            <InputError :message="form.errors.password" class="mt-2"/>
                        </div>
                        <div>
                            <InputLabel for="pwd_confirmation" value="Confirm Password"/>
                            <input v-model="form.password_confirmation"
                                autocomplete="off"
                                class="input input-bordered w-full"
                                placeholder="ยืนยันรหัสผ่านหากต้องการเปลี่ยน!!"
                                type="text"/>
                            <InputError :message="form.errors.password_confirmation" class="mt-2"/>
                        </div>
                        <div class="flex w-full justify-end col-span-2">
                            <button class="btn btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>         
        </form>
       </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
import axios from 'axios';
import {Link, useForm} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";

export default {
    name: "Index",
    components: {InputError, PrimaryButton, Checkbox, InputLabel, Layout, Link},
    props: {
       
    },
    data() {
        return {
            form:useForm({
                name: this.$page.props.user.name,
                institution: this.$page.props.user.institution,
                tel: this.$page.props.user.tel,
                email: this.$page.props.user.email,
                password: '',
                password_confirmation: '',
                terms: false,
            })
        };
    },
    mounted() {
    },
    methods: {
        async submit(){
            const res = await this.form.post(this.route('update_institution_profile'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        router.visit(this.route('index'));
                    })
                },
            });
            
        }
    },
    watch: {},
    computed: {
       }
};
</script>

<style scoped>
    .rounded-image {
        border-radius: 20px; /* Adjust the value as needed */
    }
</style>
