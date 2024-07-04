<template>
    <Layout>
        <ProfessorForm :departments="departments" :professor="professor" mode="edit"/>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import ProfessorForm from "@/Pages/Dashboard/Professor/ProfessorForm.vue";


export default {
    name: "EditProfessor",
    components: {
        ProfessorForm,
        Layout
    },
    props: {
        departments: {
            type: Array,
            required: true
        },
        professor: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
