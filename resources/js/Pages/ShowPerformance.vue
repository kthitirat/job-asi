<template>
    <Layout>  
        <div class="px-8 flex justify-end">
            <Link :href="route('index')" class="flex items-center gap-2">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <p>กลับหน้าแรก</p>
            </Link>
        </div>     
        <div class="w-full flex justify-center py-8">        
            <div class="bg-white rounded-lg shadow-lg w-[1240px] p-20 px-20 space-y-4">
                <div class="flex justify-end">
                    <div v-if="performance.is_published || $page.props.user.role.name === 'admin'">                 
                        <a class="currsor-pointer" :href="route('performance_pdf_view',performance.id)" target="_blank">
                            <svg id="Capa_1" fill="#000000" height="30px" version="1.1" viewBox="0 0 48 48"
                             width="30px" xml:space="preserve"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"> <g> <g> <path
                                d="M47.987,21.938c-0.006-0.091-0.023-0.178-0.053-0.264c-0.011-0.032-0.019-0.063-0.033-0.094 c-0.048-0.104-0.109-0.202-0.193-0.285c-0.001-0.001-0.001-0.001-0.001-0.001L42,15.586V10c0-0.022-0.011-0.041-0.013-0.063 c-0.006-0.088-0.023-0.173-0.051-0.257c-0.011-0.032-0.019-0.063-0.034-0.094c-0.049-0.106-0.11-0.207-0.196-0.293l-9-9 c-0.086-0.086-0.187-0.148-0.294-0.197c-0.03-0.013-0.06-0.022-0.09-0.032c-0.086-0.03-0.174-0.047-0.264-0.053 C32.038,0.01,32.02,0,32,0H7C6.448,0,6,0.448,6,1v14.586l-5.707,5.707c0,0-0.001,0.001-0.002,0.002 c-0.084,0.084-0.144,0.182-0.192,0.285c-0.014,0.031-0.022,0.062-0.033,0.094c-0.03,0.086-0.048,0.173-0.053,0.264 C0.011,21.96,0,21.978,0,22v19c0,0.552,0.448,1,1,1h5v5c0,0.552,0.448,1,1,1h34c0.552,0,1-0.448,1-1v-5h5c0.552,0,1-0.448,1-1V22 C48,21.978,47.989,21.96,47.987,21.938z M44.586,21H42v-2.586L44.586,21z M38.586,9H33V3.414L38.586,9z M8,2h23v8 c0,0.552,0.448,1,1,1h8v5v5H8v-5V2z M6,18.414V21H3.414L6,18.414z M40,46H8v-4h32V46z M46,40H2V23h5h34h5V40z"></path>
                                <path
                                    d="M18.254,26.72c-0.323-0.277-0.688-0.473-1.097-0.586c-0.408-0.113-0.805-0.17-1.19-0.17h-3.332V38h2.006v-4.828h1.428 c0.419,0,0.827-0.074,1.224-0.221c0.397-0.147,0.748-0.374,1.054-0.68c0.306-0.306,0.552-0.688,0.74-1.148 c0.187-0.459,0.281-0.994,0.281-1.606c0-0.68-0.105-1.247-0.315-1.7C18.843,27.364,18.577,26.998,18.254,26.72z M16.971,31.005 c-0.306,0.334-0.697,0.501-1.173,0.501h-1.156v-3.825h1.156c0.476,0,0.867,0.147,1.173,0.442c0.306,0.295,0.459,0.765,0.459,1.411 C17.43,30.18,17.277,30.67,16.971,31.005z"></path>
                                <polygon
                                    points="30.723,38 32.78,38 32.78,32.832 35.857,32.832 35.857,31.081 32.764,31.081 32.764,27.8 36.112,27.8 36.112,25.964 30.723,25.964 "></polygon>
                                <path
                                    d="M24.076,25.964H21.05V38h3.009c1.553,0,2.729-0.524,3.528-1.572c0.799-1.049,1.198-2.525,1.198-4.429 c0-1.904-0.399-3.386-1.198-4.446C26.788,26.494,25.618,25.964,24.076,25.964z M26.55,33.843c-0.13,0.528-0.315,0.967-0.552,1.318 c-0.238,0.351-0.521,0.615-0.85,0.79c-0.329,0.176-0.686,0.264-1.071,0.264h-0.969v-8.466h0.969c0.385,0,0.742,0.088,1.071,0.264 c0.329,0.175,0.612,0.439,0.85,0.79c0.238,0.351,0.422,0.793,0.552,1.326s0.196,1.156,0.196,1.87 C26.746,32.702,26.68,33.316,26.55,33.843z"></path> </g> </g> </g>
                                </svg>
                        </a>
                    </div>
                </div>
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
                            
                        </div>
                        <div class="col-span-6">
                            {{ performance.ceremony_and_reception_details }}
                        </div>
                    </div>

                    <!-- Number of Institution Heads -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนผู้บริหาร / ผู้แทนสถาบันการศึกษา ที่เข้าร่วม
                        </div>
                        <div class="col-span-6">
                            {{ performance.number_of_institution_heads }}
                        </div>
                    </div>

                    <!-- Number of Faculty and Staff -->
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6 lg:col-span-3">
                            จำนวนผู้ควบคุม / อาจารย์ / เจ้าหน้าที่ ที่เข้าร่วม
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
