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

class PageController extends Controller
{
    public function index(Request $request)
    {     
        $performance = Performance::where('user_id', Auth::id())->first();
        $performanceData = null;
        if($performance){
            $performanceData = fractal($performance, new PerformanceTransformer())->toArray();
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
            'image' => ['required','image','mimes:jpeg,png,jpg','max:10240'], // 10240 KB = 10 MB
            'performance_id' => ['nullable'],
        ]);
         
        if (isset($req['performance_id']) && $req['performance_id']){                   //ถ้ามี performance ไม่เท่ากับ null 
            $performance = Performance::findOrFail($req['performance_id']);
        }
        if (!isset($req['performance_id']) || is_null($req['performance_id'])) {      //ถ้าไม่มีให้สร้าง performance ใหม่
                $performance = Performance::create([
                'user_id' => Auth::id(),
            ]);
        }
       
        $media = $performance->addMedia($req['image'])->toMediaCollection(Performance::MEDIA_COLLECTION_IMAGES);
        $images = $performance->getMedia(Performance::MEDIA_COLLECTION_IMAGES);
        $imagesData = fractal($images, new ImageTransformer())->toArray();
        return response()->json($imagesData);       

    }

    public function saveDraft(SavePerformanceDraftRequest $request, SavePerformanceAction $action)
    {
        $performance = Performance::find($request->performance_id);
        if(!$performance){
            $performance = Performance::create([
                'user_id' => Auth::id()
            ]);
        }
        $performance = $action->execute($performance, $request->validated());
        return response()->json(null, 200);
    }

    public function submitForm(Performance $performance)
    {
        $performance->is_published = true;
        $performance->save();
        return response()->json(null, 200);     
    }


    public function dashboard()
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Index')->with([
            'user' => $user,
            'number' => 9,
            'date' => "9-3-2567",
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
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ]);
        $newUser = $userAction->execute(new User(), $request->all());
        Auth::login($newUser);
        return redirect()->route('index');
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
