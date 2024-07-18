<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    window.onload = function () {
        window.print();
    }
</script>
<style type="text/css">
    @font-face {
        font-family: 'Sarabun';
        src: url('{{ storage_path('fonts/Sarabun/Sarabun-Regular.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sarabun';
        src: url('{{ storage_path('fonts/Sarabun/Sarabun-Bold.ttf') }}') format('truetype');
        font-weight: bold;
        font-style: normal;
    }
    @page {
        size: A4;
        margin: 0.0cm;
        margin-top: 16px;
        margin-bottom: 10px;
    }

</style>

<head>
    <title>การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</title>
</head>
<body class="p-8 mb-4">
<div class="flex justify-center">
    <div class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full overflow-hidden">
        <img class="object-contain w-full h-full" src="/images/Aru-Logo61-2X3.png">
    </div>
</div>
<div class="mt-4">
    <h1 class="text-2xl font-bold text-center">การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23</h1>
    <p class="text-lx text-center">ระหว่างวันที่ 23-25 กุมภาพันธ์ 2567 ณ มหาวิทยาลัยxxx</p>
</div>
<div class="w-full mt-4">
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ชื่อสถาบัน
        </div>
        <div class="col-span-9">
            {{$performance['owner']['institution']}}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ชื่อผู้ประสานงาน
        </div>
        <div class="col-span-9">
            {{$performance['owner']['name']}}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            อีเมลล์
        </div>
        <div class="col-span-9">
            {{$performance['owner']['email']}}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            เบอร์โทรศัพท์
        </div>
        <div class="col-span-9">
            {{$performance['owner']['tel']}}
        </div>
    </div>
    <!-- Institution Head Name -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ผู้บริหารสถาบันการศึกษา
        </div>
        <div class="col-span-9">
            {{$performance['institution_head_name']}}
        </div>
    </div>

    <!-- Institution Head Position -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ตำแหน่งผู้บริหารสถาบันการศึกษา
        </div>
        <div class="col-span-9">
            {{$performance['institution_head_position']}}
        </div>
    </div>

    <!-- Coordinator Position -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ตำแหน่งผู้ประสานงาน
        </div>
        <div class="col-span-9">
            {{$performance['coordinator_position']}}
        </div>
    </div>

    <!-- Name -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ชื่อชุดการการแสดง
        </div>
        <div class="col-span-9">
            {{$performance['name']}}
        </div>
    </div>

    <!-- Type -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ประเภทชุดการแสดง
        </div>
        <div class="col-span-9">
            <ul>
                @foreach($performance['type'] as $type)
                    <li> {{$type}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Description -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            คำอธิบายประกอบชุดการแสดง
        </div>
        <div class="col-span-9">
            {{$performance['description']}}
        </div>
    </div>

    <!-- Duration -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ระยะเวลาในการแสดง
        </div>
        <div class="col-span-9">
            {{$performance['duration']}}
        </div>
    </div>

    <!-- Number of Performers -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนนักแสดง
        </div>
        <div class="col-span-9">
            {{$performance['number_of_performers']}}
        </div>
    </div>

    <!-- Directors -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่อผู้ควบคุมการแสดง
        </div>
        <div class="col-span-9">
            {{$performance['directors']}}
        </div>
    </div>

    <!-- Performers -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่อนักแสดง
        </div>
        <div class="col-span-9">
            {{$performance['performers']}}
        </div>
    </div>

    <!-- Musicians or Narrators -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่อนักดนตรี/ผู้พากย์หรือผู้บรรยาย
        </div>
        <div class="col-span-9">
            {{$performance['musicians_or_narrators']}}
        </div>
    </div>

    <!-- Number of Musicians -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนนักดนตรี
        </div>
        <div class="col-span-9">
            {{$performance['number_of_musicians']}}
        </div>
    </div>

    <!-- Opening Scene -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            การเปิดเรื่องหรือภาพแสดงเริ่มแรกบนเวที
        </div>
        <div class="col-span-9">
            {{$performance['opening_scene']}}
        </div>
    </div>

    <!-- Stage Performance -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            การดำเนินเรื่องบนเวที
        </div>
        <div class="col-span-9">
            {{$performance['stage_performance']}}
        </div>
    </div>

    <!-- Ending Scene -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            การจบเรื่อง
        </div>
        <div class="col-span-9">
            {{$performance['ending_scene']}}
        </div>
    </div>

    <!-- Costume and Props -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ลักษณะการแต่งกายและอุปกรณ์ประกอบการแสดง (MAKE UP & COSTUME, PROPS)
        </div>
        <div class="col-span-9">
            {{$performance['costume_and_props']}}
        </div>
    </div>

    <!-- Stage Lighting -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            การควบคุมแสงบนเวที
        </div>
        <div class="col-span-9">
            {{$performance['stage_lighting']}}
        </div>
    </div>

    <!-- Sound Type -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ประเภทของเสียงประกอบการแสดง
        </div>
        <div class="col-span-9">
            {{$performance['sound_type']}}
        </div>
    </div>

    <!-- Number of Microphones -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนไมค์โครโฟน
        </div>
        <div class="col-span-9">
            {{$performance['number_of_microphones']}}
        </div>
    </div>

    <!-- Number of Amplifiers -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนตู้แอมป์
        </div>
        <div class="col-span-9">
            {{$performance['number_of_amplifiers']}}
        </div>
    </div>

    <!-- Other Specifications -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            อื่นๆ โปรดระบุ
        </div>
        <div class="col-span-9">
            {{$performance['other_specifications']}}
        </div>
    </div>

    <!-- Sound Control -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            การควบคุมเสียง
        </div>
        <div class="col-span-9">
            {{$performance['sound_control']}}
        </div>
    </div>

    <!-- Institution Representatives -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่อผู้บริหาร/ผู้แทนสถาบัน
        </div>
        <div class="col-span-9">
            {{$performance['institution_representatives']}}
        </div>
    </div>

    <!-- Faculty and Staff -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่ออาจารย์ / เจ้าหน้าที่
        </div>
        <div class="col-span-9">
            {{$performance['faculty_and_staff']}}
        </div>
    </div>

    <!-- Students -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายชื่อนักศึกษา
        </div>
        <div class="col-span-9">
            {{$performance['students']}}
        </div>
    </div>

    <!-- Vehicles -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            รายการยานพาหนะ
        </div>
        <div class="col-span-9">
            {{$performance['vehicles']}}
        </div>
    </div>

    <!-- Arrival Date -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            วันที่เดินทางมาถึง
        </div>
        <div class="col-span-9">
            {{$performance['arrival_date']}}
        </div>
    </div>

    <!-- Arrival Time -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            เวลาที่เดินทางมาถึง
        </div>
        <div class="col-span-9">
            {{$performance['arrival_time']}}
        </div>
    </div>

    <!-- Departure Date -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            วันที่เดินทางกลับ
        </div>
        <div class="col-span-9">
            {{$performance['departure_date']}}
        </div>
    </div>

    <!-- Departure Time -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            เวลาที่เดินทางกลับ
        </div>
        <div class="col-span-9">
            {{$performance['departure_time']}}
        </div>
    </div>

    <!-- Accommodation -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ชื่อสถานที่พัก
        </div>
        <div class="col-span-9">
            {{$performance['accommodation']}}
        </div>
    </div>

    <!-- Ceremony and Reception Details -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            ข้อมูลการเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
            จำนวนผู้บริหาร / ผู้แทนสถาบันการศึกษา ที่เข้าร่วม
        </div>
        <div class="col-span-9">
            {{$performance['ceremony_and_reception_details']}}
        </div>
    </div>

    <!-- Number of Institution Heads -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนผู้บริหารเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
        </div>
        <div class="col-span-9">
            {{$performance['number_of_institution_heads']}}
        </div>
    </div>

    <!-- Number of Faculty and Staff -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนอาจารย์ / เจ้าหน้าที่ เข้าร่วมพิธีเปิดและการเลี้ยงรับรอง
        </div>
        <div class="col-span-9">
            {{$performance['number_of_faculty_and_staff']}}
        </div>
    </div>

    <!-- Number of Students -->
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-3">
            จำนวนนักศึกษา ที่เข้าร่วม
        </div>
        <div class="col-span-9">
            {{$performance['number_of_students']}}
        </div>
    </div>

    {{-- <div class="w-full">
        <p class="font-bold text-lg">รูป</p>
        <div class="w-full grid grid-cols-5 gap-4 mt-4">
            @foreach($performance['images']['data'] as $image)
                <div class="w-full h-40 overflow-hidden">
                    <div class="h-40 relative">
                        <img src="{{$image['url']}}" class="object-cover w-full h-60">
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

</div>
<p></p>
</body>
</html>
