<template>
    <Layout>        
        <div class="w-full flex justify-center py-8">
            <div class="bg-white rounded-lg shadow-lg w-[1240px] p-20 px-20 space-y-4">
                <div class="flex w-full justify-center mb-2">
                    <div class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full overflow-hidden">
                        <img class="object-contain w-full h-full" src="/images/Aru-Logo61-2X3.png">
                    </div>
                </div>
                <h1 class="text-base md:text-xl lg:text-3xl font-bold text-center">
                    การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h1>
                <p class="text-sm md:text-base lg:text-2lx text-center">ระหว่างวันที่ 23-25 กุมภาพันธ์ 2567 ณ
                    มหาวิทยาลัยxxx
                </p>

                <div class="text-sm md:text-base space-y-1  lg:space-y-4">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ชื่อสถาบัน
                        </div>
                        <div class="col-span-6">
                            {{ performance.owner.institution }}
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ชื่อผู้ประสานงาน
                        </div>
                        <div class="col-span-6">
                            {{ performance.owner.name }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            อีเมลล์
                        </div>
                        <div class="col-span-6">
                            {{ performance.owner.email }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            เบอร์โทรศัพท์
                        </div>
                        <div class="col-span-6">
                            {{ performance.owner.tel }}
                        </div>
                    </div>
                    <!-- Institution Head Name -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ผู้บริหารสถาบันการศึกษา
                        </div>
                        <div class="col-span-6">
                            {{ performance.institution_head_name }}
                        </div>
                    </div>

                    <!-- Institution Head Position -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ตำแหน่งผู้บริหารสถาบันการศึกษา
                        </div>
                        <div class="col-span-6">
                            {{ performance.institution_head_position }}
                        </div>
                    </div>

                    <!-- Coordinator Position -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ตำแหน่งผู้ประสานงาน
                        </div>
                        <div class="col-span-6">
                            {{ performance.coordinator_position }}
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ชื่อชุดการการแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.name }}
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ประเภทชุดการแสดง
                        </div>
                        <div class="col-span-6">
                            <ul>
                                <li v-for="(type,index) in performance.type" :key="index">{{ type }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            คำอธิบายประกอบชุดการแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.description }}
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ระยะเวลาในการแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.duration }}
                        </div>
                    </div>

                    <!-- Number of Performers -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนนักแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_performers }}
                        </div>
                    </div>

                    <!-- Directors -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่อผู้ควบคุมการแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.directors }}
                        </div>
                    </div>

                    <!-- Performers -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่อนักแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.performers }}
                        </div>
                    </div>

                    <!-- Musicians or Narrators -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่อนักดนตรี/ผู้พากย์หรือผู้บรรยาย
                        </div>
                        <div class="col-span-6">
                            {{ performance.musicians_or_narrators }}
                        </div>
                    </div>

                    <!-- Number of Musicians -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนนักดนตรี
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_musicians }}
                        </div>
                    </div>

                    <!-- Opening Scene -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            การเปิดเรื่องหรือภาพแสดงเริ่มแรกบนเวที
                        </div>
                        <div class="col-span-6">
                            {{ performance.opening_scene }}
                        </div>
                    </div>

                    <!-- Stage Performance -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            การดำเนินเรื่องบนเวที
                        </div>
                        <div class="col-span-6">
                            {{ performance.stage_performance }}
                        </div>
                    </div>

                    <!-- Ending Scene -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            การจบเรื่อง
                        </div>
                        <div class="col-span-6">
                            {{ performance.ending_scene }}
                        </div>
                    </div>

                    <!-- Costume and Props -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ลักษณะการแต่งกายและอุปกรณ์ประกอบการแสดง (MAKE UP & COSTUME, PROPS)
                        </div>
                        <div class="col-span-6">
                            {{ performance.costume_and_props }}
                        </div>
                    </div>

                    <!-- Stage Lighting -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            การควบคุมแสงบนเวที
                        </div>
                        <div class="col-span-6">
                            {{ performance.stage_lighting }}
                        </div>
                    </div>

                    <!-- Sound Type -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ประเภทของเสียงประกอบการแสดง
                        </div>
                        <div class="col-span-6">
                            {{ performance.sound_type }}
                        </div>
                    </div>

                    <!-- Number of Microphones -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนไมค์โครโฟน
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_microphones }}
                        </div>
                    </div>

                    <!-- Number of Amplifiers -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนตู้แอมป์
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_amplifiers }}
                        </div>
                    </div>

                    <!-- Other Specifications -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            อื่นๆ โปรดระบุ
                        </div>
                        <div class="col-span-6">
                            {{ performance.other_specifications }}
                        </div>
                    </div>

                    <!-- Sound Control -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            การควบคุมเสียง
                        </div>
                        <div class="col-span-6">
                            {{ performance.sound_control }}
                        </div>
                    </div>

                    <!-- Institution Representatives -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่อผู้บริหาร/ผู้แทนสถาบัน
                        </div>
                        <div class="col-span-6">
                            {{ performance.institution_representatives }}
                        </div>
                    </div>

                    <!-- Faculty and Staff -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่ออาจารย์ / เจ้าหน้าที่
                        </div>
                        <div class="col-span-6">
                            {{ performance.faculty_and_staff }}
                        </div>
                    </div>

                    <!-- Students -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายชื่อนักศึกษา
                        </div>
                        <div class="col-span-6">
                            {{ performance.students }}
                        </div>
                    </div>

                    <!-- Vehicles -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            รายการยานพาหนะ
                        </div>
                        <div class="col-span-6">
                            {{ performance.vehicles }}
                        </div>
                    </div>

                    <!-- Arrival Date -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            วันที่เดินทางมาถึง
                        </div>
                        <div class="col-span-6">
                            {{ performance.arrival_date }}
                        </div>
                    </div>

                    <!-- Arrival Time -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            เวลาที่เดินทางมาถึง
                        </div>
                        <div class="col-span-6">
                            {{ performance.arrival_time }}
                        </div>
                    </div>

                    <!-- Departure Date -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            วันที่เดินทางกลับ
                        </div>
                        <div class="col-span-6">
                            {{ performance.departure_date }}
                        </div>
                    </div>

                    <!-- Departure Time -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            เวลาที่เดินทางกลับ
                        </div>
                        <div class="col-span-6">
                            {{ performance.departure_time }}
                        </div>
                    </div>

                    <!-- Accommodation -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ชื่อสถานที่พัก
                        </div>
                        <div class="col-span-6">
                            {{ performance.accommodation }}
                        </div>
                    </div>

                    <!-- Ceremony and Reception Details -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            ข้อมูลการเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
                            จำนวนผู้บริหาร / ผู้แทนสถาบันการศึกษา ที่เข้าร่วม

                        </div>
                        <div class="col-span-6">
                            {{ performance.ceremony_and_reception_details }}
                        </div>
                    </div>

                    <!-- Number of Institution Heads -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนผู้บริหารเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_institution_heads }}
                        </div>
                    </div>

                    <!-- Number of Faculty and Staff -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนอาจารย์ / เจ้าหน้าที่ เข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_faculty_and_staff }}
                        </div>
                    </div>
                    <!-- Number of Students -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนนักศึกษา ที่เข้าร่วม
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_students }}
                        </div>
                    </div>
                </div>
                <p>รูป</p>
                <div class="w-full grid grid-cols-5 gap-4 mt-4">
                    <div v-for="(image,index) in displayImages" :key="index"
                         class="w-full h-20 md:h-36 lg:h-48 xl:h-60 overflow-hidden">
                        <div class="h-20 md:h-36 lg:h-48 xl:h-60 relative">
                            <img :src="image.url" class="object-cover w-full h-20 md:h-36 lg:h-48 xl:h-60">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "ShowPerformance",
    components: {Layout, Link},
    props: {
        performance: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            displayImages: []
        };
    },
    mounted() {
        if (this.performance.images.data.length > 0) {
            this.displayImages = this.performance.images.data
        }
    },
    methods: {},
    watch: {},
    computed: {}
};
</script>

<style scoped>
</style>
