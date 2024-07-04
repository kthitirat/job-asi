<template>
    <Layout>
        <!-- <div class="w-full flex justify-end">
            <Link :href="route('dashboard.announcements.edit',announcement.id)" class="btn btn-primary">EDIT</Link>
        </div>
        <AnnouncementForm :all-categories="allCategories" :all-types="allTypes" :announcement="announcement"
                          mode="show"/> -->


        <!-- 1.ข้อมูลส่วนตัว -->
        <div>
            <h6 class="text-md">1.ข้อมูลส่วนตัว</h6>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="first-name">ชื่อและนามสกุล</label>
                    <div class="mt-2">
                        <input id="first-name" :value="applicant.prefix+applicant.first_name+ ' ' +applicant.last_name"
                               autocomplete="given-name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="first-name"
                               type="text"/>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="last-name">สมัครตำแหน่ง</label>
                    <div class="mt-2">
                        <input id="last-name" :value="applicant.last_name" autocomplete="family-name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="last-name"
                               type="text"/>
                    </div>
                </div>

                <div class="col-span-full">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="about">ที่อยู่ที่ติดต่อได้</label>
                    <div class="mt-2">
                        <textarea id="about" :value="applicant.address"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                                  name="about"
                                  rows="3"/>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="postal-code">หมายเลขโทรศัพท์</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.phone" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="email">Email address</label>
                    <div class="mt-2">
                        <input id="email" :value="applicant.email" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="email"
                               type="email"/>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="postal-code">วัน/เดือน/ปีเกิด</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.birth_date" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">อายุ</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.age" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="email">สถานที่เกิด</label>
                    <div class="mt-2">
                        <input id="email" :value="applicant.birth_place" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="email"
                               type="email"/>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">เชื้อชาติ</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.race" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">สัญชาติ</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.nationality" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="postal-code">สถานภาพสมรส</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.marital_status" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">หมายเลขบัตรประจำตัวประชาชน</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.citizen_id" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">ออกให้ที่อำเภอ/เขต</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.district" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">จังหวัด</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.province" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">วันเดือนปีที่ออกบัตร</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.card_issued_date" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">วันเดือนปีที่บัตรหมดอายุ</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.card_expiration_date" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="postal-code">ศาสนา</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.religion" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="postal-code">การรับราชการทหาร</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.military_service" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>

            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900"
                           for="postal-code">อาชีพปัจจุบัน</label>
                    <div class="mt-2">
                        <input id="postal-code" :value="applicant.current_occupation" autocomplete="postal-code"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                               name="postal-code"
                               type="text"/>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900" for="about">เหตุผลที่ (อยาก)
                        ออกจากงาน</label>
                    <div class="mt-2">
                        <textarea id="about" :value="applicant.reason_for_leaving"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4"
                                  name="about"
                                  rows="3"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. ข้อมูลการศึกษาและฝึกอบรม -->
        <div class="mt-4">
            <h6 class="text-md">2. ข้อมูลการศึกษาและฝึกอบรม</h6>
        </div>

        <section class="container mx-auto p-6 font-mono">
            <div class="w-full overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-400">
                        <thead class="border-b border-gray-600">
                        <!-- แถวที่ 1 -->
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-collapse border border-slate-400">
                            <!-- ปี พ.ศ. -->
                            <th class="px-4 py-3 border-collapse border border-slate-400" colspan="2">ปี พ.ศ.</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">สถานศึกษา</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">
                                ประกาศนียบัตร/ปริญญาบัตร/วิชาเอก
                            </th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">เกรดเฉลี่ย</th>
                        </tr>
                        <!-- แถวที่ 2 -->
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-collapse border border-slate-400">
                            <th class="px-4 py-3 border-collapse border border-slate-400">จาก</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400">ถึง</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-for="(training,index) in applicant.trainings" v-if="applicant.trainings" :key="index"
                            class="text-gray-700">
                            <td class="px-4 py-3 text-ms border">{{ this.formattedDate(training.from) }}</td>
                            <td class="px-4 py-3 text-ms border">{{ this.formattedDate(training.to) }}</td>
                            <td class="px-4 py-3 text-sm border">{{ training.school }}</td>
                            <td class="px-4 py-3 text-sm border">{{ training.degree }}</td>
                            <td class="px-4 py-3 text-sm border">{{ training.grade }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- หลักสูตรเพิ่มเติม -->
        <section class="container mx-auto p-6 font-mono">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <!-- <h6 class="text-lg text-center">หลักสูตรเพิ่มเติม</h6> -->
                    <div
                        class="relative flex flex-col  text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-100">

                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                หลักสูตรเพิ่มเติม
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                {{ applicant.additional_course }}
                            </p>
                        </div>
                    </div>
                    <!-- <div>
                    <textarea class="w-full h-24 px-3 py-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="แสดงข้อความข้อความของคุณที่นี่..."></textarea>
                    </div>-->
                </div>
                <div>
                    <div
                        class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-100">
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                การฝึกอบรม
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                {{ applicant.additional_training }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. ข้อมูลการทำงานและประสบการณ์ทำงาน (โปรดให้รายละเอียดของงานที่ทำในช่วง 3 ปีหลัง) -->
        <div>
            <h6 class="text-md">3. ข้อมูลการทำงานและประสบการณ์ทำงาน (โปรดให้รายละเอียดของงานที่ทำในช่วง 3 ปีหลัง)</h6>
        </div>
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-400">
                        <thead class="border-b border-gray-600">
                        <!-- แถวที่ 1 -->
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-collapse border border-slate-400">
                            <!-- ปี พ.ศ. -->
                            <th class="px-4 py-3 border-collapse border border-slate-400" colspan="2">ปี พ.ศ.</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">
                                ชื่อและที่อยู่ของหน่วยงาน
                            </th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">
                                ตำแหน่งงานและหน้าที่โดยย่อ
                            </th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">เงินเดือน</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400" rowspan="2">
                                สาเหตุที่ออกจากงาน
                            </th>
                        </tr>
                        <!-- แถวที่ 2 -->
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-collapse border border-slate-400">
                            <th class="px-4 py-3 border-collapse border border-slate-400">จาก</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400">ถึง</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-for="(experience,index) in applicant.experiences" v-if="applicant.experiences"
                            :key="index" class="text-gray-700">
                            <td class="px-4 py-3 text-ms border">{{ this.formattedDate(experience.from) }}</td>
                            <td class="px-4 py-3 text-ms border">{{ this.formattedDate(experience.to) }}</td>
                            <td class="px-4 py-3 text-sm border">{{ experience?.company }}</td>
                            <td class="px-4 py-3 text-sm border">{{ experience?.position }}</td>
                            <td class="px-4 py-3 text-sm border">{{ experience?.salary.toLocaleString() }}</td>
                            <td class="px-4 py-3 text-sm border">{{ experience?.leave_reason }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- โปรดระบุความสำเร็จของงานที่ทำผ่านมาในช่วง 3 ปีหลัง (ถ้ามี) -->
        <section class="container mx-auto p-6 font-mono">
            <div>
                <div
                    class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-100">
                    <div class="p-6">
                        <h6 class="block  font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            โปรดระบุความสำเร็จของงานที่ทำผ่านมาในช่วง 3 ปีหลัง (ถ้ามี)
                        </h6>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                            {{ applicant.achievements }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- โปรดให้ความคิดเห็นเกี่ยวกับประสบการณ์ที่ได้รับ และอธิบายว่าประสบการณ์นั้น ๆ เป็นประโยชน์ต่องานที่สมัครในครั้งนี้ -->
        <section class="container mx-auto p-6 font-mono">
            <div>
                <div
                    class="relative flex flex-col  text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-100">
                    <div class="p-6">
                        <h6 class="block font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            โปรดให้ความคิดเห็นเกี่ยวกับประสบการณ์ที่ได้รับ และอธิบายว่าประสบการณ์นั้น ๆ
                            เป็นประโยชน์ต่องานที่สมัครในครั้งนี้
                        </h6>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                            {{ applicant.experience_gained }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. ข้อมูลความรู้ความสามารถพิเศษ (ถ้ามี) -->
        <section class="container mx-auto mb-4 p-6 font-mono">
            <div>
                <div
                    class="relative flex flex-col  text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-100">
                    <div class="p-6">
                        <h6 class="block mb-2 font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            ข้อมูลความรู้ความสามารถพิเศษ (ถ้ามี)
                        </h6>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                            {{ applicant.talent }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. บุคคลอ้างอิง (ขอให้ระบุชื่อบุคคลที่คุ้นเคยกับการทำงานของท่าน เช่น ผู้บังคับบัญชาโดยตรง โปรดอย่าระบุชื่อบุคคลที่เป็นญาติและเพื่อน) -->
        <div>
            <h6 class="text-md">5. บุคคลอ้างอิง (ขอให้ระบุชื่อบุคคลที่คุ้นเคยกับการทำงานของท่าน เช่น
                ผู้บังคับบัญชาโดยตรง โปรดอย่าระบุชื่อบุคคลที่เป็นญาติและเพื่อน)</h6>
        </div>
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-5 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-400">
                        <thead class="border-b border-gray-600">
                        <!-- แถวที่ 1 -->
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-collapse border border-slate-400">
                            <!-- ปี พ.ศ. -->
                            <th class="px-4 py-3 border-collapse border border-slate-400">ชื่อและนามสกุล</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400">ตำแหน่งปัจจุบัน</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400">ที่ทำงานปัจจุบันและโทรศัพท์
                            </th>
                            <th class="px-4 py-3 border-collapse border border-slate-400">ระบุความสัมพันธ์กับท่าน</th>

                        </tr>

                        </thead>
                        <tbody class="bg-white">
                        <tr v-for="(reference,index) in applicant.references" v-if="applicant.references" :key="index"
                            class="text-gray-700">
                            <td class="px-4 py-3 text-ms border">{{ reference.full_name }}</td>
                            <td class="px-4 py-3 text-ms border">{{ reference.position }}</td>
                            <td class="px-4 py-3 text-sm border">{{ reference.company }}</td>
                            <td class="px-4 py-3 text-sm border">{{ reference.relationship }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ข้อ 6  -->
        <div>
            <h6 class="text-md">6. ข้าพเจ้ามีคุณสมบัติครบถ้วนตามที่ระบุไว้ในข้อ 7 แห่งข้อบังคับมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา ว่าด้วย การบริหารงานบุคคลสำหรับพนักงานมหาวิทยาลัย พ.ศ.2562</h6>
            <h6 class="text-md pl-16">ขอรับรองว่าข้อความที่กล่าวข้างต้นเป็นความจริงทุกประการ หากข้อความตอนใดเป็นความเท็จหรือไม่ ตรงกับความจริงให้ถือเป็นหลักฐานเพื่อเลิกจ้างข้าพเจ้าได้ทันที</h6>
        </div>
        <div>
            <div class="text-center mt-6">
                <p class="mr-6">ลงชื่อ.............................................ผู้สมัคร</p>
            </div>
            <div class="text-center mt-2">
                <p class="mr-6">(.............................................)</p>
            </div>
            <div class="text-center mt-2">
                <p class="mr-6">ยื่นใบสมัครวันที่..............เดือน..............พ.ศ.................ผู้สมัคร</p>
            </div>
        </div>

         <!-- เฉพาะเจ้าหน้าที่มหาวิทยาลัย  -->
        <div class="mt-6">
            <h6 class="text-md text-md inline-block border-b border-gray-500">เฉพาะเจ้าหน้าที่มหาวิทยาลัย</h6>
        </div>

        <div class="w-full mb-5 overflow-hidden rounded-lg shadow-lg mt-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border border-slate-400 ...">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 border-collapse border border-slate-400 text-left">งานทรัพยากรบุคคล</th>
                            <th class="px-4 py-3 border-collapse border border-slate-400 text-left">งานการเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-collapse border border-slate-400 px-4">ได้ตรวจสอบหลักฐานการสมัครเบื้องต้น ครบถ้วน สมบูรณ์แล้ว 
                                <span>
                                    <div class="mb-8">
                                        <div class="text-center mt-6">
                                            <p class="mr-6">ลงชื่อ.............................................ผู้สมัคร</p>
                                        </div>
                                        <div class="text-center mt-2">
                                            <p class="mr-6">(.............................................)</p>
                                        </div>
                                        <div class="text-center mt-2">
                                            <p class="mr-6">ยื่นใบสมัครวันที่..............เดือน..............พ.ศ.................ผู้รับสมัคร</p>
                                        </div>
                                    </div>
                                </span>
                            </td>
                            <td class="border-collapse border border-slate-400 px-4">ได้รับค่าธรรมเนียมสอบเป็นเงิน 200 บาท เป็นที่เรียบร้อยแล้ว 
                                <span><br>ตามใบเสร็จเลขที่.................................</span> 
                                <span>
                                    <div class="mb-8">
                                        <div class="text-center mt-6">
                                            <p class="mr-6">ลงชื่อ.............................................ผู้รับเงิน</p>
                                        </div>
                                        <div class="text-center mt-2">
                                            <p class="mr-6">(.............................................)</p>
                                        </div>
                                        <div class="text-center mt-2">
                                            <p class="mr-6">ยื่นใบสมัครวันที่..............เดือน..............พ.ศ.................ผู้สมัคร</p>
                                        </div>
                                    </div>
                                </span>
                            </td>
                        </tr>
                        <!-- ข้อมูลอื่นๆ ที่ต้องการเพิ่มเข้าไป -->
                    </tbody>
                </table>
            </div>
        </div>

   



    </Layout>

</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";
import {useForm} from '@inertiajs/inertia-vue3';
import moment from 'moment';
import 'moment/locale/th';

export default {
    name: "ApplicantShow",
    components: {Layout},
    props: {
        applicant: {
            type: Object,
            required: true
        }

    },
    mounted() {

    },
    data() {
        return {};
    },
    methods: {
        formattedDate(date) {
            if (date === null) {
                return null;
            }
            return moment(date).locale('th').format('DD/MM/YYYY');
        }
    },
    watch: {}
};

</script>

