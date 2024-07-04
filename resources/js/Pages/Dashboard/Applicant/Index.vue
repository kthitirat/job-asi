<template>
    <Layout>
        <div class="w-full flex justify-end">
            <Link class="btn btn-primary">CREATE</Link>
        </div>
        <div class="flex gap-2 w-full">
            <div class="w-80">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Select Type</span>
                    </div>
                    <select  class="select select-bordered">
                        <option value="">All</option>
                        <option ></option>
                    </select>
                </label>
            </div>
            <div class="w-80">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Select Category</span>
                    </div>
                    <select
                            class="select select-bordered">
                        <option value="">All</option>
                        <option>
                            
                        </option>
                    </select>
                </label>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50 ">
                <tr class="bg-white border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">ประกาศ</th>
                    <th class="px-6 py-3">ตำแหน่งที่รับสมัคร</th>
                    <th class="px-6 py-3">คุณวุฒิ</th>
                    <th class="px-6 py-3">ประเภท</th>
                    <th class="px-6 py-3">อัตรา</th>
                    <th class="px-6 py-3">วันที่รับสมัคร</th>
                    <th class="px-6 py-3">รายละเอียด</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr
                    class="bg-white border-b">
                   
                    <th class="text-center"></th>
                    <td class="px-6 py-4">
                        <Link  class="underline">
                           
                        </Link>
                    </td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4">
                        <p class="whitespace-nowrap">
                            
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <Link class="border border-slate-300 hover:border-indigo-300 bg-white hover:bg-indigo-50 text-indigo-600 hover:text-indigo-800 font-medium px-4 py-2 rounded-md transition duration-300">
                            ข้อมูลผู้สมัคร
                        </Link>
                        <!-- <div class="flex justify-center gap-1">
                            <a >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                     stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div> -->

                    </td>
                    <td class="px-6 py-4 flex flex-col items-center gap-1">
                        <Link 
                              class="btn btn-primary btn-sm w-16">
                            EDIT
                        </Link>
                        <button class="btn btn-error btn-sm w-16 text-gray-100 uppercase" type="button"
                               >
                            DELETE
                        </button>
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
import {Link, router, useForm} from "@inertiajs/vue3";

export default {
    name: "ApplicantIndex",
    components: {Layout, Link},
    props: {
       
    },
    mounted() {
       
    },
    data() {
       
    },
    methods: {
        
    },
    watch: {
        
    }
};
</script>
