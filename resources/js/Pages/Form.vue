<template>
    <Layout>
        <div class="flex w-full justify-center mb-8 mt-4">
            <img class="object-cover w-40 h-45" src="/images/Aru-Logo61-2X3.png">
        </div>
        <h1 class="text-3xl font-bold text-center">การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h1>
        <p class="text-lx text-center">ระหว่างวันที่ XXXXXXX 2568 ณ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
        <div class="bg-white w-full shadow-lg rounded-xl px-8 py-8 mt-4">
            <form>
                <div></div>
                <div v-if="performanceId" class="flex w-full justify-end pr-4 gap-4 items-center">
                    <div v-if="$page.props.user.role.name === 'admin'">
                        <a :href="route('performance_excel_download',performanceId)" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 50 50">
                            <path d="M 28.875 0 C 28.855469 0.0078125 28.832031 0.0195313 28.8125 0.03125 L 0.8125 5.34375 C 0.335938 5.433594 -0.0078125 5.855469 0 6.34375 L 0 43.65625 C -0.0078125 44.144531 0.335938 44.566406 0.8125 44.65625 L 28.8125 49.96875 C 29.101563 50.023438 29.402344 49.949219 29.632813 49.761719 C 29.859375 49.574219 29.996094 49.296875 30 49 L 30 44 L 47 44 C 48.09375 44 49 43.09375 49 42 L 49 8 C 49 6.90625 48.09375 6 47 6 L 30 6 L 30 1 C 30.003906 0.710938 29.878906 0.4375 29.664063 0.246094 C 29.449219 0.0546875 29.160156 -0.0351563 28.875 0 Z M 28 2.1875 L 28 6.53125 C 27.867188 6.808594 27.867188 7.128906 28 7.40625 L 28 42.8125 C 27.972656 42.945313 27.972656 43.085938 28 43.21875 L 28 47.8125 L 2 42.84375 L 2 7.15625 Z M 30 8 L 47 8 L 47 42 L 30 42 L 30 37 L 34 37 L 34 35 L 30 35 L 30 29 L 34 29 L 34 27 L 30 27 L 30 22 L 34 22 L 34 20 L 30 20 L 30 15 L 34 15 L 34 13 L 30 13 Z M 36 13 L 36 15 L 44 15 L 44 13 Z M 6.6875 15.6875 L 12.15625 25.03125 L 6.1875 34.375 L 11.1875 34.375 L 14.4375 28.34375 C 14.664063 27.761719 14.8125 27.316406 14.875 27.03125 L 14.90625 27.03125 C 15.035156 27.640625 15.160156 28.054688 15.28125 28.28125 L 18.53125 34.375 L 23.5 34.375 L 17.75 24.9375 L 23.34375 15.6875 L 18.65625 15.6875 L 15.6875 21.21875 C 15.402344 21.941406 15.199219 22.511719 15.09375 22.875 L 15.0625 22.875 C 14.898438 22.265625 14.710938 21.722656 14.5 21.28125 L 11.8125 15.6875 Z M 36 20 L 36 22 L 44 22 L 44 20 Z M 36 27 L 36 29 L 44 29 L 44 27 Z M 36 35 L 36 37 L 44 37 L 44 35 Z"></path>
                            </svg>
                        </a>
                    </div>
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
                    
                    <div>
                        <a :href="route('performance_view',performanceId)"
                           class="text-green-600" target="_blank">
                            <svg class="size-8" fill="none" stroke="currentColor" stroke-width="1.5"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                 
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
                            <input v-model="form.coordinator_phone" class="input input-bordered w-full" placeholder="หมายเลขโทรศัพท์" type="text" disabled/>
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
                <div class="mt-4">แนบภาพถ่ายการแสดง จำนวน 5 ภาพ </div>
                <input ref="imageInputRef" accept=".jpeg,.png,.jpg" class="hidden" type="file" @change="handleSelectImage">
                <div class="col-span-2 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-8">
                        <div v-for="(image,index) in displayImages" :key="index"
                             class="w-full h-20 md:h-36 lg:h-48 xl:h-60 overflow-hidden">
                            <div class="h-20 md:h-36 lg:h-48 xl:h-60 relative">
                                <img :src="image.url" class="object-contain w-full h-20 md:h-36 lg:h-48 xl:h-60">
                                <button v-if="!isSubmitting" class="absolute top-1 right-1 text-red-500" type="button"
                                        @click.prevent="handleDeleteImage(image)">
                                    <svg class="size-6" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div v-if="isSubmitting"
                                     class="absolute top-0 left-0 w-full h-60 bg-white opacity-50 flex items-center justify-center">
                                    <span class="loading loading-spinner loading-lg"></span>
                                </div>
                            </div>
                        </div>
                        <button 
                            v-if="displayImages.length < maxImage"
                            class="w-full h-20 md:h-36 lg:h-48 xl:h-60 border-2 border-dashed flex justify-center items-center text-gray-500" type="button"
                            @click="selectingImage">
                            <div v-if="!isSubmitting">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>  
                            <div v-if="isSubmitting">
                                <span class="loading loading-spinner loading-lg"></span>
                            </div>                        
                        </button>
                </div>

                <div class="md:grid-cols-2 note mt-4">
                    <p><b>หมายเหตุ:</b></p>
                    <p>1. ระบบบันทึกอัตโนมัติ</p>
                    <p>2. หากยังกรอกข้อมูลไม่ครบถ้วน กรุณาอย่ากดส่งข้อมูล</p>
                    <p>3. หากกรอกข้อมูลครบถ้วนแล้ว กรุณากดส่งข้อมูล</p>
                </div>

                <div v-if="performance.length !== 0 && performance.is_published" class="col-span-2 w-full mt-2 flex gap-2 justify-end">
                        <!-- <button :disabled="isSubmitting" class="btn btn-warning text-white" type="button" @click.prevent="saveDraft">บันทึกร่าง</button> -->
                        <button :disabled="isSubmitting" class="btn btn-success"
                                @click.prevent="submit">                                   
                                ส่งข้อมูล
                        </button>
                </div>
                <button ref="showSendingEmailModal" class="btn hidden" onclick="sending_email.showModal()" type="button">open modal</button>
                    <dialog id="sending_email" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button ref="sendingEmailCloseModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 hidden">✕</button>
                            </form>
                            <h3 class="text-lg font-bold text-center text-gray-500">กำลังส่งข้อมูล</h3>
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="loading loading-spinner text-success mt-2"></span>
                                <p class="py-4 text-center text-gray-500">กำลังส่งข้อมูลให้กับแอดมิน กรุณารอสักครู่ และอย่าออกจากหน้านี้</p>
                            </div>   
                        </div>
                    </dialog>
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
            performanceId: null,
            isSubmitting: false,
            isSending: false,
            dirtyForm: false,
            debounce: null,  
            displayImages: [],   
            maxImage: 5,             
            form: useForm({
                performance_id: this.performance.id,
                institution: this.$page.props.user.role.name === 'admin' ? this.performance.owner.institution : this.$page.props.user.institution,     
                email: this.$page.props.user.role.name === 'admin' ? this.performance.owner.email : this.$page.props.user.email,               
                coordinator_name: this.$page.props.user.role.name === 'admin' ? this.performance.owner.name : this.$page.props.user.name,                                        
                coordinator_phone: this.$page.props.user.role.name === 'admin' ? this.performance.owner.tel : this.$page.props.user.tel, 
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
        if (this.performance.length === 0) {
            return;
        }
        this.displayImages = this.performance.images.data ?? [];
        this.performanceId = this.performance.id;
    },

    methods: {
        selectingImage() {
            if (this.isSubmitting) return;
            this.$refs.imageInputRef.click()
        },
        async handleDeleteImage(image){
            this.isSubmitting = true;
            try{
                const response = await axios.delete(this.route('delete_image', this.performanceId), {
                    params: {
                        image_id: image.id
                    }
                });
                this.displayImages = response.data.data;
                this.isSubmitting = false;
            } catch (error) {
                this.isSubmitting = false;
                console.log('-----------------');
                console.log(error);
                console.log('-----------------');
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
            if (this.performanceId != null) {
                formData.append('performance_id', this.performanceId);
            }

            try {
                this.isSubmitting = true;
                const response = await axios.post(this.route('upload_image'), formData, {
                    headers: {'Content-Type': 'multipart/form-data'}
                });
                this.displayImages = response.data.images.data;
                this.performanceId = response.data.performance_id
                this.isSubmitting = false;
            } catch (error) {
                this.isSubmitting = false;
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
                this.performanceId = res.data.performance_id;
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
            this.isSending = true;
            const url = this.route('submit_form', this.performanceId);
            const res = await axios.patch(url, {});
            if (res.status === 200) {
                this.isSending = false;
                setTimeout(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'ท่านได้ยื่นรายละเอียดการแสดงเรียบร้อยแล้ว',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = this.route('index');
                    })
                }, 500);
            } else {
                this.isSending = false;
            }
        }
    },
    watch: {
        isSending() {
            if (!this.isSending) {
                this.$refs.sendingEmailCloseModal.click();
                return;
            }
            this.$refs.showSendingEmailModal.click();
            return;
        },
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
    }
};

</script>

<style scoped>
    .relative {
    position: relative;
    }
    .note {
    line-height: 1.8; /* กำหนดระยะห่างของบรรทัด */
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 15rem; /* h-60 in Tailwind */
        overflow: hidden;
}

    .image-full {
        width: 100%;
        height: 100%;
        object-fit: cover;
}
    span {
        font-size: 1.10rem;
    }
    input {
        font-size: 1rem; /* ขนาดตัวอักษรที่ต้องการ เช่น 1.25rem */
    }
    textarea{
        font-size: 1rem; /* ขนาดตัวอักษรที่ต้องการ เช่น 1.25rem */
    }

</style>

