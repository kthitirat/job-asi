<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUserAction;
use App\Http\Transformers\SubjectTransformer;
use App\Actions\Dashboard\SavePerformanceAction;
use App\Http\Requests\Dashboard\SavePerformanceDraftRequest;
use App\Http\Transformers\PerformanceTransformer;
use App\Http\Transformers\ImageTransformer;
use App\Models\Subject;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ArrayExporter;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubmitFormEmail;
use Spatie\Browsershot\Browsershot;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function index(Request $request)
    {     
        if (Auth::user() && Auth::user()->role->name == 'admin') {
            return redirect()->route('dashboard.index');
        }
        $performance = Performance::where('user_id', Auth::id())->first();
        $performanceData = null;
        if($performance){
            $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();
        }
        return Inertia::render('Index')->with([
            'performance' => $performanceData
        ]);
    }

    public function form()
    {     
        $performance = Performance::where('user_id', Auth::id())->first();
        $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();
        return Inertia::render('Form')->with([
            'performance' => $performanceData
        ]);
    }

    public function uploadImage(Request $request)
    {
        $req = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'performance_id' => ['nullable'],
        ]);
        $performance = null;
        if (Auth::user()->role->name === 'admin') {
            $performance = Performance::findOrFail($request->get('performance_id'));
        }
        if (Auth::user()->role->name === 'user') {
            $performance = Performance::where('user_id', Auth::id())->first();
        }
        if (!$performance) {
            $performance = Performance::create([
                'user_id' => Auth::id(),
            ]);
        }
        $media = $performance->addMedia($req['image'])->toMediaCollection(Performance::MEDIA_COLLECTION_IMAGES);
        $images = $performance->getMedia(Performance::MEDIA_COLLECTION_IMAGES);
        $imagesData = fractal($images, new ImageTransformer())->toArray();
        $data['images'] = $imagesData;
        $data['performance_id'] = $performance->id;

        return response()->json($data);
    }

 
    public function deleteImage(Performance $performance, Request $request)
    {
        $req = $request->validate([
            'image_id' => ['required', 'exists:media,id'],
        ]);
        $media = $performance->getMedia(Performance::MEDIA_COLLECTION_IMAGES)->where('id', $req['image_id'])->first();
        if (!$media) {
            return;
        }
        $media->delete();
        $updatedPerformance = $performance->fresh();
        $images = $updatedPerformance->getMedia(Performance::MEDIA_COLLECTION_IMAGES);
        $imagesData = fractal($images, new ImageTransformer())->toArray();
        return response()->json($imagesData);
    }

    public function saveDraft(SavePerformanceDraftRequest $request, SavePerformanceAction $action)
    {
        $performance = null;
        if (Auth::user()->role->name === 'admin') {
            $performance = Performance::findOrFail($request->get('performance_id'));
        }
        if (Auth::user()->role->name === 'user') {
            $performance = Performance::where('user_id', Auth::id())->first();
        }
        if (!$performance) {
            $performance = Performance::create([
                'user_id' => Auth::id(),
            ]);
        }
        $updatedPerformance = $action->execute($performance, $request->validated());
        $data['performance_id'] = $updatedPerformance->id;
        return response()->json($data, 200);
    }

    public function submitForm(performance $performance)
    {
        $performance->is_published = true;
        $performance->save();

        $updatedPerformance = $performance->fresh();
        $updatedPerformanceData = fractal($updatedPerformance, new PerformanceTransformer())->toArray();
        Mail::to('info@aru.ac.th')->send(new SubmitFormEmail($updatedPerformanceData));
        // Mail::to('info@aru.ac.th')->send(new SubmitFormEmail($updatedPerformanceData));   เพิ่ม email admin เพื่อรับทราบการส่งการลงทะเบียน        
        return response()->json(null, 200);
    }
 
    public function performanceView(performance $performance)
    {
        $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();
        return Inertia::render('ShowPerformance')->with([
            'performance' => $performanceData
        ]);
    }


    public function dashboard()
    {
        $user = Auth::user();
        // $performanceCount = Performance::count();
        // $publishedPerformanceCount = Performance::where('is_published', true)->count();
        return Inertia::render('Dashboard/Index')->with([
            // 'performanceCount' => $performanceCount,
            // 'publishedPerformanceCount' => $publishedPerformanceCount
        ]);
    }

    public function userRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function storeRegister(Request $request, RegisterUserAction $userAction)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'institution' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ]);        
        $newUser = $userAction->execute(new User(), $request->all());
        Auth::login($newUser);
        return redirect()->route('index');
    }

    public function performancePdfView(Performance $performance)
    {
        $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();
        return view('pdf.performance_pdf')->with([
            'performance' => $performanceData
        ]);
    }

    public function performancePdfDownload(Performance $performance)
    {
        Browsershot::url(route('index'))
            ->setNodeBinary('/opt/homebrew/lib/node_modules')
            ->setNpmBinary('/opt/homebrew/bin/npm')
            ->save('example.pdf');
    }

    public function print()
    {
        $data = [
            'title' => 'สวัสดีครับ',
            'content' => 'นี่คือเอกสาร PDF ที่สร้างขึ้นโดยใช้ Laravel และ DomPDF รองรับภาษาไทย'
        ];

        $pdf = Pdf::loadView('pdf.document', $data);
        return $pdf->download('document.pdf');
    }

    public function export()
    {
        $data = [
            ['Name', 'Email', 'Created At'],
            ['John Doe', 'john@example.com', '2024-01-01'],
            ['Jane Smith', 'jane@example.com', '2024-01-02'],
        ];
        return Excel::download(new ArrayExporter($data), 'test-export.xlsx');
    }

    public function performanceExcelDownload(Performance $performance)
    {
        $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();
        $data = [
            ['ชื่อสถาบัน', $performanceData['owner']['institution']],
            ['ชื่อผู้ประสานงาน', $performanceData['owner']['name']],
            ['อีเมลล์', $performanceData['owner']['email']],
            ['เบอร์โทรศัพท์', $performanceData['owner']['tel']],
            ['ผู้บริหารสถาบันการศึกษา', $performanceData['institution_head_name']],
            ['ตำแหน่งผู้บริหารสถาบันการศึกษา', $performanceData['institution_head_position']],
            ['ตำแหน่งผู้ประสานงาน', $performanceData['coordinator_position']],
            ['ชื่อชุดการการแสดง', $performanceData['name']],
            ['ประเภทชุดการแสดง', implode(', ', $performanceData['type'])],
            ['คำอธิบายประกอบชุดการแสดง', $performanceData['description']],
            ['ระยะเวลาในการแสดง', $performanceData['duration']. ' ชม.'],
            ['จำนวนนักแสดง', $performanceData['number_of_performers'] . ' คน'],
            ['รายชื่อผู้ควบคุมการแสดง', $performanceData['directors']],
            ['รายชื่อนักแสดง', $performanceData['performers']],
            ['รายชื่อนักดนตรี/ผู้พากย์หรือผู้บรรยาย', $performanceData['musicians_or_narrators']],
            ['จำนวนนักดนตรี', $performanceData['number_of_musicians'] . ' คน'],
            ['การเปิดเรื่องหรือภาพแสดงเริ่มแรกบนเวที', $performanceData['opening_scene']],
            ['การดำเนินเรื่องบนเวที', $performanceData['stage_performance']],
            ['การจบเรื่อง', $performanceData['ending_scene']],
            [
                'ลักษณะการแต่งกายและอุปกรณ์ประกอบการแสดง (MAKE UP & COSTUME, PROPS)',
                $performanceData['costume_and_props']
            ],
            ['การควบคุมแสงบนเวที', $performanceData['stage_lighting']],
            ['ประเภทของเสียงประกอบการแสดง', $performanceData['sound_type']],
            ['จำนวนไมค์โครโฟน', $performanceData['number_of_microphones'] . ' อัน'],
            ['จำนวนตู้แอมป์', $performanceData['number_of_amplifiers'] . ' ตู้'],
            ['อื่นๆ โปรดระบุ', $performanceData['other_specifications']],
            ['การควบคุมเสียง', $performanceData['sound_control']],
            ['รายชื่อผู้บริหาร/ผู้แทนสถาบัน', $performanceData['institution_representatives']],
            ['รายชื่ออาจารย์ / เจ้าหน้าที่', $performanceData['faculty_and_staff']],
            ['รายชื่อนักศึกษา', $performanceData['students']],
            ['รายการยานพาหนะ', $performanceData['vehicles']],
            ['วันที่เดินทางมาถึง', $performanceData['arrival_date']],
            ['เวลาที่เดินทางมาถึง', $performanceData['arrival_time']],
            ['วันที่เดินทางกลับ', $performanceData['departure_date']],
            ['เวลาที่เดินทางกลับ', $performanceData['departure_time']],
            ['ชื่อสถานที่พัก', $performanceData['accommodation']],
            [
                'ข้อมูลการเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง จำนวนผู้บริหาร / ผู้แทนสถาบันการศึกษา ที่เข้าร่วม',
                $performanceData['ceremony_and_reception_details']
            ],
            [
                'จำนวนผู้บริหารเข้าร่วมพิธีเปิดและการเลี้ยงรับรอง',
                $performanceData['number_of_institution_heads'] . ' ท่าน'
            ],
            [
                'จำนวนอาจารย์ / เจ้าหน้าที่ เข้าร่วมพิธีเปิดและการเลี้ยงรับรอง',
                $performanceData['number_of_faculty_and_staff'] . ' ท่าน'
            ],
            ['จำนวนนักศึกษา ที่เข้าร่วม', $performanceData['number_of_students'] . ' คน'],
            [
                'รูป 1',
                isset($performanceData['images']['data'][0]) ? $performanceData['images']['data'][0]['url'] : '-'
            ],
            [
                'รูป 2',
                isset($performanceData['images']['data'][1]) ? $performanceData['images']['data'][1]['url'] : '-'
            ],
            [
                'รูป 3',
                isset($performanceData['images']['data'][2]) ? $performanceData['images']['data'][2]['url'] : '-'
            ],
            [
                'รูป 4',
                isset($performanceData['images']['data'][3]) ? $performanceData['images']['data'][3]['url'] : '-'
            ],
            [
                'รูป 5',
                isset($performanceData['images']['data'][4]) ? $performanceData['images']['data'][4]['url'] : '-'
            ],
        ];
        $fileName = $performanceData['owner']['institution'] . ' - ' . $performanceData['owner']['name'] . ' - ' . $performanceData['owner']['tel'] . '.xlsx';  //แสดงชื่อเวลาดาวน์โหลดมาที่เครื่อง
        return Excel::download(new ArrayExporter($data), $fileName);
    }



//    public function login()
//    {
//        return Inertia::render('Auth/Login');
//    }
//
//    public function doLogin(Request $request)
//    {
//        $request->only('email', 'password');
//        $user = User::where('email', $request->email)->first();
//        dd($request->all());
//    }

}
