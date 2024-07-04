<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUserAction;
use App\Http\Transformers\SubjectTransformer;
use App\Models\Subject;
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
        $filters = $request->only('search');
        $subjects = Subject::with('professors')
            ->filter($filters)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(20);
        $subjectData = fractal($subjects, new SubjectTransformer())->includeImage()->toArray();
        return Inertia::render('Index')->with([
            'subjects' => $subjectData
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
