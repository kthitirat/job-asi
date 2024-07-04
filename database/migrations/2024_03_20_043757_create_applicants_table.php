<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Applicant;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('announcement_id');
            $table->string('prefix');                       //คำนำหน้าชื่อ
            $table->string('first_name');                   //ชื่อ
            $table->string('last_name');                    //นามสกุล
            $table->text('address');                        //ที่อยู่
            $table->date('birth_date');                      //วันเดือนปีเกิด
            $table->unsignedInteger('age');                  //อายุ
            $table->string('phone');                        //หมายเลขโทรศัพท์
            $table->string('birth_place');                   //สถานที่เกิด
            $table->string('race');                         //เชื้อชาติ
            $table->string('citizen_id');                   //หมายเลขบัตรประชาชน
            $table->string('marital_status');               //สถานภาพสมรส
            $table->string('nationality');                  //สัญชาติ
            $table->string('district');                     //ออกให้ที่อำเภอ/เขต
            $table->string('province');                     //จังหวัด
            $table->date('card_issued_date');               //วันเดือนปีที่ออกบัตร
            $table->date('card_expiration_date');         //วันเดือนปีที่บัตรหมดอายุ
            $table->string('military_service');             //การรับราชการทหาร
            $table->string('religion');                     //ศาสนา
            $table->string('current_occupation');           //อาชีพปัจจุบัน
            $table->text('reason_for_leaving');             //เหตุผลที่(อยาก)ออกจากงาน
            $table->text('additional_course')->nullable();  //หลักสูตรเพิ่มเติม
            $table->text('additional_training')->nullable();//การฝึกอบรม
            $table->text('achievements')->nullable();       //โปรดระบุความสำเร็จของงานที่ผ่านมาในช่วง 3 ปีหลัง (ถ้ามี)
            $table->text('experience_gained');              //โปรดให้ความเห็นเกี่ยวกับประสบการ์ที่ได้รับ
            $table->text('talent')->nullable();             //ความสามารถพิเศษ (ถ้ามี)

            $table->json('trainings')->nullable();
            $table->json('experiences')->nullable();
            $table->json('references')->nullable();

//
//            $table->string('education_and_training_year');  //ข้อมูลการศึกษาและฝึกฝึกอบรม ปี พ.ศ. จาก - ถึง
//            $table->string('school_name');                  //สถานศึกษา
//            $table->string('education_degree');             //วุฒิการศึกษา
//            $table->string('grade');                        //เกรดเฉลี่ย
//            $table->string('additional_course');            //หลักสูตรเพิ่มเติม
//            $table->string('training');                     //การฝึกอบรม
//            $table->string('work_experience');              //ข้อมูลการทำงานและประสบการณ์ทำงาน
//            $table->string('organization_name');            //ชื่อและที่อยู่ของหน่วยงาน
//            $table->string('position_duties');              //ตำแหน่งงานและหน้าที่โดยย่อ
//            $table->string('salary');                       //เงินเดือน
//            $table->string('resignation_reason');           //สาเหตุที่ออกจากงาน
//            $table->text('achievements')->nullable();       //โปรดระบุความสำเร็จของงานที่ผ่านมาในช่วง 3 ปีหลัง (ถ้ามี)
//            $table->text('experience_gained');              //โปรดให้ความเห็นเกี่ยวกับประสบการ์ที่ได้รับ
//            $table->text('talent')->nullable();             //ความสามารถพิเศษ (ถ้ามี)
//            $table->string('reference_person_name');        //ชื่อบุคคลอ้างอิง
//            $table->string('reference_person_lastname');    //นามสกุลบุคคลอ้างอิง
//            $table->string('current_position');             //ตำแหน่งปัจจุบัน
//            $table->string('workplace_and_phone');          //ที่ทำงานปัจจุบันและโทรศัพท์
//            $table->string('relationship');                 //ระบุความสัมพันธ์กับท่าน
//            $table->string('signature_applicant');          //ลงชื่อผู้สมัคร
//            $table->date('submit_date');                    //ยื่นใบสมัครวันเดือนปี
//            $table->string('signature_recruiter');          //ลงชื่อผู้รับสมัคร
//            $table->date('recruiter_date');                 //รับสมัครวันเดือนปี
//            $table->string('signature_payee');              //ลงชื่อผู้รับเงิน
//            $table->date('payee_date');                     //รับเงินวันเดือนปี
//            $table->string('accepted');                     //ช่องยินยอมยอมรับนโยบายความเป็นส่วนตัว
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
