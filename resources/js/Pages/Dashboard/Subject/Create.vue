<template>
    <Layout>
        <SubjectForm :professors="professors" mode="create"/>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {router} from '@inertiajs/vue3'
import SubjectForm from "@/Pages/Dashboard/Subject/SubjectForm.vue";

export default {
    name: "SubjectCreate",
    components: {
        SubjectForm,
        Layout
    },
    props: {
        professors: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
