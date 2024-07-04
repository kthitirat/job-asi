<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\SaveSubjectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateOrUpdateSubjectRequest;
use App\Http\Transformers\ProfessorTransformer;
use App\Http\Transformers\SubjectTransformer;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('published_at', 'desc')->paginate(20);
        $subjectData = fractal($subjects, new SubjectTransformer())->includeImage()->toArray();
        return Inertia::render('Dashboard/Subject/Index')->with([
            'subjects' => $subjectData
        ]);
    }

    public function create()
    {
        $professors = Professor::all();
        $professorData = fractal($professors, new ProfessorTransformer())->includeImage()->toArray()['data'];
        return Inertia::render('Dashboard/Subject/Create')->with([
            'professors' => $professorData
        ]);
    }

    public function store(CreateOrUpdateSubjectRequest $request, SaveSubjectAction $action)
    {
        $newSubject = $action->execute(new Subject(), $request->validated());
        $newSubjectData = fractal($newSubject, new SubjectTransformer())->includeImage()->includeDocuments()->toArray();
        return redirect()->route('dashboard.subjects.index');
    }

    public function edit(Subject $subject)
    {
        $professors = Professor::all();
        $professorData = fractal($professors, new ProfessorTransformer())->includeImage()->toArray()['data'];
        $subjectData = fractal($subject, new SubjectTransformer())->includeImage()->includeDocuments()->toArray();
        return Inertia::render('Dashboard/Subject/Edit')->with([
            'professors' => $professorData,
            'subject' => $subjectData
        ]);
    }

    public function update(Subject $subject, createOrUpdateSubjectRequest $request, SaveSubjectAction $action)
    {
        $action->execute($subject, $request->validated());
        return redirect()->route('dashboard.subjects.index')->with('success', 'subject updated.');
    }

    public function destroy($uuid)
    {
        $subject = Subject::where('uuid', $uuid)->first();
        if (!$subject) {
            return redirect()->back()->with('error', 'no subject found.');
        }
        $subject->delete();
        return redirect()->route('dashboard.subjects.index')->with('success', 'subject deleted');
    }
}
