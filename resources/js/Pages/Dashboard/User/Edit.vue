<template>
    <Layout>
        <div>
            dfdfd
        </div>
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3';


export default {
    name: "UserEdit",
    components: {Layout, Link},
    props: {
        user: {
            type: Object,
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
