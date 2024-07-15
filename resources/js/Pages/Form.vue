<template>
    <Layout>
        <div class="flex w-full justify-center mb-8 mt-4">
            <img class="object-cover w-40 h-45" src="/images/Aru-Logo61-2X3.png">
        </div>
        <h1 class="text-3xl font-bold text-center">การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h1>
        <p class="text-lx text-center">ระหว่างวันที่ XXXXXXX 2568 ณ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
        <div class="bg-white w-full shadow-lg rounded-xl px-8 py-8 mt-4">
            <form>
                <div class="flex w-full justify-end pr-4">
                    <div v-if="!isSaved" class="text-gray-400">
                        <span class="loading loading-spinner"></span>
                    </div>    
                    <p v-if="isSaved"
                       class="text-base lg:text-lg text-green-500 uppercase font-bold opacity-50 italic">
                        Saved
                    </p>        
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">EMAIL</span>
                            </div>
                            <input v-model="form.email"  class="input input-bordered w-full" disabled
                                placeholder="Type here"
                                type="text"/>
                        </label>
                        <div v-if="$page.props.errors.email" class="text-red-500 text-sm">
                            {{ $page.props.errors.email }}
                        </div>
                    </div>               
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ชื่อสถาบันการศึกษา</span>
                            </div>
                            <input v-model="form.institution"  class="input input-bordered w-full" disabled
                                placeholder="Type here"
                                type="text"/>
                        </label>
                        <div v-if="$page.props.errors.institution" class="text-red-500 text-sm">
                            {{ $page.props.errors.institution }}
                        </div>
                    </div>               
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">                
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ชื่อ-สกุล ผู้บริหารสถาบันการศึกษา</span>
                            </div>
                            <input v-model="form.institution_head_name" class="input input-bordered w-full" placeholder="ชื่อ-สกุล ผู้บริหารสถาบันการศึกษา" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.institution_head_name" class="text-red-500 text-sm">
                            {{ $page.props.errors.institution_head_name }}
                        </div>
                    </div>
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ตำแหน่งผู้บริหารสถาบันการศึกษา</span>
                            </div>
                            <input v-model="form.institution_head_position" class="input input-bordered w-full" placeholder="ตำแหน่งผู้บริหารสถาบันการศึกษา" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.institution_head_position" class="text-red-500 text-sm">
                            {{ $page.props.errors.institution_head_position }}
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ชื่อ-สกุล ผู้ประสานงานประจำสถาบัน</span>
                            </div>
                            <input v-model="form.coordinator_name" class="input input-bordered w-full" placeholder="ชื่อ-สกุล ผู้ประสานงานประจำสถาบัน" type="text" disabled/>
                        </label>
                        <div v-if="$page.props.errors.coordinator_name" class="text-red-500 text-sm">
                            {{ $page.props.errors.coordinator_name }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ตำแหน่งผู้ประสานงานประจำสถาบัน</span>
                            </div>
                            <input v-model="form.coordinator_position" class="input input-bordered w-full" placeholder="ตำแหน่งผู้ประสานงานประจำสถาบัน" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.coordinator_position" class="text-red-500 text-sm">
                            {{ $page.props.errors.coordinator_position }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">หมายเลขโทรศัพท์ผู้ประสานงานประจำสถาบัน</span>
                            </div>
                            <input v-model="form.coordinator_phone" class="input input-bordered w-full" placeholder="หมายเลขโทรศัพท์" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.coordinator_phone" class="text-red-500 text-sm">
                            {{ $page.props.errors.coordinator_phone }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ชื่อชุดการการแสดง</span>
                            </div>
                            <input v-model="form.name" class="input input-bordered w-full" placeholder="ชื่อชุดการการแสดง" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.name" class="text-red-500 text-sm">
                            {{ $page.props.errors.name }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text capitalize">ประเภทชุดการแสดง</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="inline-flex items-center">
                                    <input v-model="form.type" class="checkbox"
                                           type="checkbox" value="การแสดงนาฏศิลป์ไทย">
                                    <span class="ml-2">การแสดงนาฏศิลป์ไทย</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input v-model="form.type" class="checkbox" type="checkbox"
                                           value="การแสดงนาฏศิลป์พื้นบ้าน">
                                    <span class="ml-2">การแสดงนาฏศิลป์พื้นบ้าน</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input v-model="form.type" class="checkbox" type="checkbox"
                                           value="การแสดงนาฏศิลป์ร่วมสมัย">
                                    <span class="ml-2">การแสดงนาฏศิลป์ร่วมสมัย</span>
                                </label>
                            </div>
                        </label>
                        <div v-if="$page.props.errors.type" class="text-red-500 text-sm">
                            {{ $page.props.errors.type }}
                        </div>
                    </div>                   
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">คำอธิบายประกอบชุดการแสดง</span>
                            </div>
                            <textarea v-model="form.description" class="textarea textarea-bordered w-full" rows="4" placeholder="คำอธิบายประกอบชุดการแสดง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.description" class="text-red-500 text-sm">
                            {{ $page.props.errors.description }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ระยะเวลาในการแสดง (ช.ม.)</span>
                            </div>
                            <input v-model="form.duration" class="input input-bordered w-full" placeholder="เช่น 1.5 ช.ม." type="text"/>
                        </label>
                        <div v-if="$page.props.errors.duration" class="text-red-500 text-sm">
                            {{ $page.props.errors.duration }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนนักแสดง (คน)</span>
                            </div>
                            <input v-model="form.number_of_performers" class="input input-bordered w-full" placeholder="เช่น 1." type="number"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_performers" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_performers }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่อผู้ควบคุมการแสดง</span>
                            </div>
                            <textarea v-model="form.directors" class="textarea textarea-bordered w-full" rows="4" placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.directors" class="text-red-500 text-sm">
                            {{ $page.props.errors.directors }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่อนักแสดง</span>
                            </div>
                            <textarea v-model="form.performers" class="textarea textarea-bordered w-full"  rows="4"  placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.performers" class="text-red-500 text-sm">
                            {{ $page.props.errors.performers }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่อนักดนตรี/ผู้พากย์หรือผู้บรรยาย</span>
                            </div>
                            <textarea v-model="form.musicians_or_narrators" class="textarea textarea-bordered w-full" rows="4"  placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.musicians_or_narrators" class="text-red-500 text-sm">
                            {{ $page.props.errors.musicians_or_narrators }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนนักดนตรี (คน)</span>
                            </div>
                            <input v-model="form.number_of_musicians" class="input input-bordered w-full" placeholder="จำนวนนักดนตรี (คน)" type="number"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_musicians" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_musicians }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">การเปิดเรื่องหรือภาพแสดงเริ่มแรกบนเวที</span>
                            </div>
                            <textarea v-model="form.opening_scene" class="textarea textarea-bordered w-full" rows="3" placeholder="การเปิดเรื่อง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.opening_scene" class="text-red-500 text-sm">
                            {{ $page.props.errors.opening_scene }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">การดำเนินเรื่องบนเวที</span>
                            </div>
                            <textarea v-model="form.stage_performance" class="textarea textarea-bordered w-full" rows="3" placeholder="การดำเนินเรื่องบนเวที"></textarea>
                        </label>
                        <div v-if="$page.props.errors.stage_performance" class="text-red-500 text-sm">
                            {{ $page.props.errors.stage_performance }}
                        </div>
                    </div>
                </div>
                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">การจบเรื่อง</span>
                            </div>
                            <textarea v-model="form.ending_scene" class="textarea textarea-bordered w-full" rows="3" placeholder="การจบเรื่อง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.ending_scene" class="text-red-500 text-sm">
                            {{ $page.props.errors.ending_scene }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ลักษณะการแต่งกายและอุปกรณ์ประกอบการแสดง</span>
                            </div>
                            <textarea v-model="form.costume_and_props" class="textarea textarea-bordered w-full" rows="3" placeholder="ลักษณะการแต่งกายและอุปกรณ์ประกอบการแสดง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.costume_and_props" class="text-red-500 text-sm">
                            {{ $page.props.errors.costume_and_props }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">การควบคุมแสงบนเวที</span>
                            </div>
                            <textarea v-model="form.stage_lighting" class="textarea textarea-bordered w-full" rows="3" placeholder="การควบคุมแสงบนเวที"></textarea>
                        </label>
                        <div v-if="$page.props.errors.stage_lighting" class="text-red-500 text-sm">
                            {{ $page.props.errors.stage_lighting }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ประเภทของเสียงประกอบการแสดง</span>
                            </div>
                            <textarea v-model="form.sound_type" class="textarea textarea-bordered w-full" rows="3" placeholder="ประเภทของเสียงประกอบการแสดง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.sound_type" class="text-red-500 text-sm">
                            {{ $page.props.errors.sound_type }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนไมค์โครโฟน (ตัว)</span>
                            </div>
                            <input v-model="form.number_of_microphones" class="input input-bordered w-full" placeholder="เช่น 10" type="number"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_microphones" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_microphones }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนตู้แอมป์ (ตู้)</span>
                            </div>
                            <input v-model="form.number_of_amplifiers" class="input input-bordered w-full" placeholder="เช่น 10" type="number"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_amplifiers" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_amplifiers }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">อื่นๆ โปรดระบุ</span>
                            </div>
                            <textarea v-model="form.other_specifications" class="textarea textarea-bordered w-full" rows="3" placeholder="อื่นๆ โปรดระบุ"></textarea>
                        </label>
                        <div v-if="$page.props.errors.other_specifications" class="text-red-500 text-sm">
                            {{ $page.props.errors.other_specifications }}
                        </div>
                    </div>
                </div>

                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">การควบคุมเสียง</span>
                            </div>
                            <textarea v-model="form.sound_control" class="textarea textarea-bordered w-full" placeholder="การควบคุมเสียง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.sound_control" class="text-red-500 text-sm">
                            {{ $page.props.errors.sound_control }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่อผู้บริหาร/ผู้แทนสถาบัน</span>
                            </div>
                            <textarea v-model="form.institution_representatives" class="textarea textarea-bordered w-full" rows="4" placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.institution_representatives" class="text-red-500 text-sm">
                            {{ $page.props.errors.institution_representatives }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่ออาจารย์ / เจ้าหน้าที่</span>
                            </div>
                            <textarea v-model="form.faculty_and_staff" class="textarea textarea-bordered w-full"  rows="4" placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.faculty_and_staff" class="text-red-500 text-sm">
                            {{ $page.props.errors.faculty_and_staff }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายชื่อนักศึกษา</span>
                            </div>
                            <textarea v-model="form.students" class="textarea textarea-bordered w-full" rows="4" placeholder="เช่น 1. ระบุชื่อ - นามสกุล"></textarea>
                        </label>
                        <div v-if="$page.props.errors.students" class="text-red-500 text-sm">
                            {{ $page.props.errors.students }}
                        </div>
                    </div>
                </div>
                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">รายการยานพาหนะ</span>
                            </div>
                            <textarea v-model="form.vehicles" class="textarea textarea-bordered w-full" rows="3" placeholder="เช่น รถบัสขนาดเล็ก, รถบัสขนาดใหญ่, รถตู้, รถยนต์ส่วนบุคคล  "></textarea>
                        </label>
                        <div v-if="$page.props.errors.vehicles" class="text-red-500 text-sm">
                            {{ $page.props.errors.vehicles }}
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">วันที่เดินทางมาถึง</span>
                            </div>
                            <input v-model="form.arrival_date" class="input input-bordered w-full" placeholder="Type here" type="date"/>
                        </label>
                        <div v-if="$page.props.errors.arrival_date" class="text-red-500 text-sm">
                            {{ $page.props.errors.arrival_date }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">เวลาที่เดินทางมาถึง</span>
                            </div>
                            <input v-model="form.arrival_time" class="input input-bordered w-full" placeholder="Type here" type="time"/>
                        </label>
                        <div v-if="$page.props.errors.arrival_time" class="text-red-500 text-sm">
                            {{ $page.props.errors.arrival_time }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">วันที่เดินทางกลับ</span>
                            </div>
                            <input v-model="form.departure_date" class="input input-bordered w-full" placeholder="Type here" type="date"/>
                        </label>
                        <div v-if="$page.props.errors.departure_date" class="text-red-500 text-sm">
                            {{ $page.props.errors.departure_date }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">เวลาที่เดินทางกลับ</span>
                            </div>
                            <input v-model="form.departure_time" class="input input-bordered w-full" placeholder="Type here" type="time"/>
                        </label>
                        <div v-if="$page.props.errors.departure_time" class="text-red-500 text-sm">
                            {{ $page.props.errors.departure_time }}
                        </div>
                    </div>
                </div>
                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ชื่อสถานที่พัก</span>
                            </div>
                            <textarea v-model="form.accommodation" class="textarea textarea-bordered w-full" rows="3" placeholder="เช่น 1. โรงแรมสวนหลวง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.accommodation" class="text-red-500 text-sm">
                            {{ $page.props.errors.accommodation }}
                        </div>
                    </div>
                </div>
                <div class="md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">ข้อมูลการเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง</span>
                            </div>
                            <textarea v-model="form.ceremony_and_reception_details" class="textarea textarea-bordered w-full" placeholder="ข้อมูลการเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง"></textarea>
                        </label>
                        <div v-if="$page.props.errors.ceremony_and_reception_details" class="text-red-500 text-sm">
                            {{ $page.props.errors.ceremony_and_reception_details }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนผู้บริหาร / ผู้แทนสถาบันการศึกษา ที่เข้าร่วม (ท่าน)</span>
                            </div>
                            <input v-model="form.number_of_institution_heads" class="input input-bordered w-full" placeholder="เช่น 10" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_institution_heads" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_institution_heads }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนผู้ควบคุม / อาจารย์ / เจ้าหน้าที่ ที่เข้าร่วม (ท่าน)</span>
                            </div>
                            <input v-model="form.number_of_faculty_and_staff" class="input input-bordered w-full" placeholder="เช่น 10" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_faculty_and_staff" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_faculty_and_staff }}
                        </div>
                    </div>

                    <div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">จำนวนนักศึกษา ที่เข้าร่วม (คน)</span>
                            </div>
                            <input v-model="form.number_of_students" class="input input-bordered w-full" placeholder="เช่น 10" type="text"/>
                        </label>
                        <div v-if="$page.props.errors.number_of_students" class="text-red-500 text-sm">
                            {{ $page.props.errors.number_of_students }}
                        </div>
                    </div>
                </div>

                <input ref="imageInputRef" accept=".jpeg,.png,.jpg" class="hidden" type="file" @change="handleSelectImage">
                <div class="col-span-2 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-8">
                    <div v-for="(image, index) in displayImages" :key="index" class="relative w-full h-60 overflow-hidden">
                        <img :src="image.url" class="object-cover w-full h-full">
                        <button @click.prevent="handleDeleteImage(image)" type="button" class="absolute top-1 right-1 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                        <button 
                            v-if="displayImages.length < maxImage"
                            class="w-full h-20 md:h-36 lg:h-48 xl:h-60 border-2 border-dashed flex justify-center items-center text-gray-500" type="button"
                            @click="$refs.imageInputRef.click()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                </div>

                <div class="md:grid-cols-2 note mt-4">
                    <p><b>หมายเหตุ:</b></p>
                    <p>1. ระบบบันทึกอัตโนมัติ</p>
                    <p>2. หากยังกรอกข้อมูลไม่ครบถ้วน กรุณาอย่ากดส่งข้อมูล</p>
                    <p>3. หากกรอกข้อมูลครบถ้วนแล้ว กรุณากดส่งข้อมูล</p>
                </div>

                <div class="col-span-2 w-full mt-2 flex gap-2 justify-end">
                        <!-- <button :disabled="isSubmitting" class="btn btn-warning text-white" type="button" @click.prevent="saveDraft">บันทึกร่าง</button> -->
                        <button :disabled="isSubmitting" class="btn btn-success"
                                @click.prevent="submit">                                   
                        ส่งข้อมูล</button>
                </div>

            </form>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";
import {useForm} from "@inertiajs/inertia-vue3";

//import {router} from "@inertiajs/vue3";

export default {
    name: "Form",
    components: {Layout, Link},
    props: {
        performance:{
            type: Object,
            required: true
        }
    },
    data() {
        return {
            isSubmitting: false,
            dirtyForm: false,
            debounce: null,  
            displayImages: [],   
            maxImage: 5,             
            form: useForm({
                performance_id: this.performance.id,
                institution: this.$page.props.user.institution,     
                email: this.$page.props.user.email,               
                coordinator_name: this.$page.props.user.name,                                         
                coordinator_phone: this.$page.props.user.tel,   
                institution_head_name: this.performance.institution_head_name ?? "",
                institution_head_position: this.performance.institution_head_position ?? "",   
                coordinator_position: this.performance.coordinator_position ?? "",           
                name: this.performance.name ?? "",
                type: this.performance.type ?? [],
                description: this.performance.description ?? "",
                duration: this.performance.duration ?? "",
                number_of_performers: this.performance.number_of_performers ?? "",
                directors: this.performance.directors ?? "",            
                performers: this.performance.performers ?? "",
                musicians_or_narrators: this.performance.musicians_or_narrators ?? "",
                number_of_musicians: this.performance.number_of_musicians ?? "",
                opening_scene: this.performance.opening_scene ?? "",
                stage_performance: this.performance.stage_performance ?? "",
                ending_scene: this.performance.ending_scene ?? "",
                costume_and_props: this.performance.costume_and_props ?? "",
                stage_lighting: this.performance.stage_lighting ?? "",
                sound_type: this.performance.sound_type ?? "",
                number_of_microphones: this.performance.number_of_microphones ?? "",
                number_of_amplifiers: this.performance.number_of_amplifiers ?? "",
                other_specifications: this.performance.other_specifications ?? "",
                sound_control: this.performance.sound_control ?? "",
                institution_representatives: this.performance.institution_representatives ?? "",
                faculty_and_staff: this.performance.faculty_and_staff ?? "",
                students: this.performance.students ?? "",
                vehicles: this.performance.vehicles ?? "",
                arrival_date: this.performance.arrival_date ?? "",
                arrival_time: this.performance.arrival_time ?? "",
                departure_date: this.performance.departure_date ?? "",
                departure_time: this.performance.departure_time ?? "",
                accommodation: this.performance.accommodation ?? "",
                ceremony_and_reception_details: this.performance.ceremony_and_reception_details ?? "",
                number_of_institution_heads: this.performance.number_of_institution_heads ?? "",
                number_of_faculty_and_staff: this.performance.number_of_faculty_and_staff ?? "",
                number_of_students: this.performance.number_of_students  ?? ""               
                
            }),
      
        };
    },
    mounted() {
        if (this.performance.length == 0) {
            return;
        }
        // this.form.performance_id = this.performance.id;
        this.displayImages = this.performance?.images.data ?? [];
    },

    methods: {
        async handleDeleteImage(image){
            try{
                const response = await axios.delete(this.route('delete_image', this.form.performance_id), {
                params:{
                    image_id: image.id
                }
                });
                this.displayImages = response.data.data;

            } catch (error) {
                console.log('---------');
                console.log(error);
                console.log('---------');
            }

        },
        async handleSelectImage(event) {
            const image = event.target.files[0];
            const maxSizeInMB = 10;
            const maxSizeInBytes = maxSizeInMB * 1024 * 1024;

            if (image.size > maxSizeInBytes) {
                this.$swal.fire({
                    icon: "error",
                    title: "Too large image",
                    text: "ขนาดไฟล์ใหญ่เกินไป กรุณาเลือก file ที่ขนาดไม่เกิน 10 MB",
                });
                return;
            }

             const formData = new FormData();
             formData.append('image', image);
             //formData.append('performance_id', this.form.performance_id)
            
             if (this.form.performance_id !=null) {
                formData.append('performance_id', this.form.performance_id);
             }

            try {
                const response = await axios.post(this.route('upload_image'), formData, {
                    headers: {'Content-Type': 'multipart/form-data'}
                });
                this.displayImages = response.data.data;
             
                // console.log('Image Upload successful:', response.data);
            } catch (error) {                
                console.error('Error uploading image:', error);                
            }
 
        },
        async saveDraft() {
            this.isSubmitting = true;          
            const url = this.route('save_draft');
            const res = await axios.post(url, this.form);
            if (res.status === 200) {
                this.isSubmitting = false;
                this.dirtyForm = false;                  
                if (this.performanceId == null) {
                    router.reload();
                }   
                return;
            }
        },
        async submit() {
            const result = await this.$swal({
                title: "คุณต้องการจะส่งข้อมูล?",
                text: "โปรดระวัง! เมื่อส่งข้อมูลแล้วท่านจะไม่สามารถแก้ไขได้",
                showCancelButton: true,
                confirmButtonText: "ยืนยัน",
                confirmButtonColor: "#f43f5e",
            });
            if (!result.isConfirmed) {
                return;
            }

            const url = this.route('submit_form', this.performance.id);
            const res = await axios.patch(url, {});
            if (res.status === 200) {
                this.$swal({
                    position: 'center',
                    icon: 'success',
                    title: 'ท่านได้ส่งข้อมูลการลงทะเบียนเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                }).then(()=> {
                    window.location.href = this.route('index');
                })
            }
        }    
    },

    watch: {
        form: {
            handler() {
                this.dirtyForm = true;
                clearTimeout(this.debounce)
                this.debounce = setTimeout(() => {
                    this.saveDraft();
                }, 3000);
            },
            deep: true
        }
    },
    computed: {
        isSaved() {
            if (this.dirtyForm) {
                return false;
            }
            return true;
        }
    },
 
};

</script>

<style scoped>
    .relative {
    position: relative;
    }
    .note {
    line-height: 1.8; /* กำหนดระยะห่างของบรรทัด */
    }
</style>

