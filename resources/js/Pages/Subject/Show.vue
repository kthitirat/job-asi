<template>
    <Layout>
        <div class="w-full grid grid-cols-12 gap-4">
            <div class="col-span-4">
                <div class="w-full px-20 grid grid-cols-2 gap-2">
                    <div v-for="(professor,index) in subject.professors"
                         :class="subject.professors.length === 1 ?'col-span-2 row-span-2':''"
                    >
                        <img v-if="professor.image.data.length > 0"
                             :src="professor.image.data[0].url"
                             class="w-full object-cover">
                    </div>

                </div>
            </div>
            <div class="col-span-8">
                <div class="w-full bg-white shadow-lg h-80 px-8 pt-4">
                    <h1 class="text-2xl border pb-4 border-l-0 border-t-0 border-r-0 font-bold text-gray-700">
                        รายวิชา {{ subject.code }} {{ subject.name_th }}
                    </h1>
                    <div class="mt-2 w-full">
                        <p class="font-bold">อาจารย์ผู้สอน:</p>
                        <div v-for="professor in subject.professors" :key="professor.id" class="flex gap-1">
                            <p class="ml-8">อาจารย์ {{ professor.prefix }} {{ professor.first_name }}
                                {{ professor.last_name }}</p>
                            <p v-if="subject.professors.length > 1" class="ml-8">{{ professor.department.name }}</p>
                        </div>
                    </div>
                    <div v-if="subject.professors.length === 1" class="w-full">
                        <p class="font-bold">คณะ:</p>
                        <div class="flex gap-1">
                            <p class="ml-8">{{ subject.professors[0].department.name }}</p>
                        </div>
                    </div>
                    <div class="w-full">
                        <p class="font-bold">วันที่เผยแพร่:</p>
                        <div class="flex gap-1">
                            <p class="ml-8">{{ subject.display_published_at }}</p>
                        </div>
                    </div>
                    <div class="w-full">
                        <p class="font-bold">จำนวนการเข้าชม:</p>
                        <div class="flex gap-1">
                            <p class="ml-8">{{ subject.view }} ครั้ง</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h2 class="font-bold text-gray-700 text-2xl">
                        คำอธิบายรายวิชา
                    </h2>
                    <p>
                        {{ subject.code }} {{ subject.name_th }} {{ subject.unit }}
                    </p>
                    <p>
                        {{ subject.description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full mt-8">
            <h2 class="text-gray-700 font-bold text-3xl">
                สื่อการสอนประเภท Power Point
            </h2>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="font-bold text-gray-700 text-base">รายวิชา</th>
                        <th class="font-bold text-gray-700 text-base">ไฟล์เอกสาร</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(doc,index) in subject.documents.data">
                        <td>
                            <p class="text-base text-gray-700"> {{ subject.code }} {{ subject.name_th }}</p>
                        </td>
                        <td>
                            <a :href="doc.url" class="text-blue-600 hover:text-blue-500 font-bold text-base"
                               target="_blank">
                                {{ doc.name }}
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";

export default {
    name: "ShowSubject",
    components: {Layout},
    props: {
        subject: {
            type: Object,
            required: true
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
