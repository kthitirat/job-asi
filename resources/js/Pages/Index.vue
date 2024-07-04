<template>
    <Layout>
        <div class="w-full">
            <div class="flex justify-center">
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-700">เอกสารประกอบการสอน</h1>
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-blue-600">(PowerPoint)</h1>
            </div>
            <div class="w-full px-4 md:px-6 lg:px-10 xl:px-16">
                <label class="form-control w-full max-w-xs">
                    <input ref="searchInputRef" v-model="search" class="input input-bordered w-full max-w-xs"
                           placeholder="ค้นหา..."
                           type="text"/>
                </label>
            </div>
            <div
                v-if="subjectData && subjectData.length > 0"
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4 md:px-6 lg:px-10 xl:px-16 mt-4 lg:mt-10">
                <div v-for="(subject,index) in subjectData" :key="subject.id">
                    <TeachingMaterialCard :subject="subject"/>
                </div>
            </div>
            <div v-if="subjectData && subjectData.length === 0" class="flex w-full mt-20 justify-center">
                <p>ไม่พบข้อมูล....</p>
            </div>
            <div v-if="subjectData && subjectData.length > 0 && pagination !== null"
                 class="px-4 md:px-6 lg:px-10 xl:px-16 mt-4 flex justify-end">
                <div class="join">
                    <Link v-for="(pagination,index) in pagination.links" :key="index"
                          :class="pagination.active ?'btn-active':''"
                          :href="pagination.url ?? '#'"
                          class="join-item btn">
                        {{ pagination.label }}
                    </Link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout, TeachingMaterialCard, Link},
    props: {
        subjects: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            subjectData: null,
            pagination: null,
            search: new URLSearchParams(window.location.search).get('search') ?? null,
            debouce: null
        };
    },
    mounted() {
        this.subjectData = this.subjects.data
        this.pagination = this.subjects.meta.pagination;
        this.$refs.searchInputRef.focus();
    },
    methods: {
        async submitSearch() {
            const url = this.route('index', {
                search: this.search
            })
            await router.visit(url, {
                only: ['subjects'],
            })
        }
    },
    watch: {
        search() {
            clearTimeout(this.debounce)
            this.debounce = setTimeout(() => {
                this.submitSearch();
            }, 500);
        }
    },
    computed: {}
};
</script>

<style scoped>
</style>
