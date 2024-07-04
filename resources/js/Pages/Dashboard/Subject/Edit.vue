<template>
    <Layout>
        <SubjectForm :professors="professors" :subject="subject" mode="edit"/>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {router} from '@inertiajs/vue3'
import SubjectForm from "@/Pages/Dashboard/Subject/SubjectForm.vue";

export default {
    name: "EditSubject",
    components: {
        SubjectForm,
        Layout
    },
    props: {
        professors: {
            type: Array,
            required: true
        },
        subject: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
