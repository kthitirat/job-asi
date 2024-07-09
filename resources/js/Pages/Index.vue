<template>
    <Layout>
        <div class="card shadow-xl flex items-center justify-center">
            <figure>
                <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" >
            </figure>
            <div class="card-body flex items-center">
                <h2 class="card-title">งานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h2>
                <p>{{ $page.props.user.institution }}</p>
                <div class="card-actions justify-end">
                    <Link class="btn btn-primary" :href="route('form')">แก้ไขข้อมูล</Link>
                    <button class="btn btn-success">ส่งข้อมูลเรียบร้อยแล้ว</button>
                </div>
                
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
//import axios from 'axios';
import {Link} from "@inertiajs/vue3";
//import {router} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout, Link},
    props: {
        
    },
    data() {
       
    },
    mounted() {
        
    }
       
   
};
</script>

<style scoped>
</style>
