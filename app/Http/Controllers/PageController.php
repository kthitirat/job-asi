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
