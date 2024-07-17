<template>
    <Layout>
        <div v-if="$page.props.user" class="card shadow-xl flex items-center justify-center">
            <figure>
                <img src="https://picsum.photos/928/548" alt="Shoes" class="rounded-image">
            </figure>
            <div class="card-body flex items-center">
                <h2 class="card-title">งานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h2>
                <p>{{ $page.props.user.institution }}</p>
                <div class="card-actions justify-end">
                    <Link v-if="!performance || (performance && !performance.is_published)" :href="route('form')"
                              class="btn btn-primary">
                            แก้ไข
                    </Link>
                    <div v-if="performance && performance.is_published"
                             class="px-4 py-2 bg-green-700 rounded-md text-white opacity-50">
                             ลงทะเบียนเรียบร้อยแล้ว
                        </div>
                    <Link v-if="performance && performance.is_published"
                              :href="route('performance_view',performance.id)"
                              class="px-4 py-2 bg-primary rounded-md text-white cursor-pointer">
                            ดูสรุป
                    </Link>
                </div>
                
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout, Link},
    props: {
        performance: {
            type: Object || null,
            default: null
        }
    },
    data() {
        return {};
    },
    mounted() {
    },
    methods: {},
    watch: {},
    computed: {
        coverImage() {
            if (!this.performance) {
                return '/images/logo.jpg';
            }
            if (this.performance.images.data.length === 0) {
                return '/images/logo.jpg'
            }
            return this.performance.images.data[0].url;
        }
    }
};
</script>

<style scoped>
    .rounded-image {
        border-radius: 20px; /* Adjust the value as needed */
    }
</style>
