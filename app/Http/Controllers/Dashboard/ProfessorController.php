<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\SaveProfessorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateOrUpdateProfessorRequest;
use App\Http\Transformers\DepartmentTransformer;
use App\Http\Transformers\ProfessorTransformer;
use App\Models\Department;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::paginate(20);
        $professorData = fractal($professors, new ProfessorTransformer())->includeImage()->toArray();
        return Inertia::render('Dashboard/Professor/Index')->with([
            'professors' => $professorData
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        $departmentData = fractal($departments, new DepartmentTransformer())->toArray()['data'];
        return Inertia::render('Dashboard/Professor/Create')->with([
            'departments' => $departmentData
        ]);
    }

    public function store(CreateOrUpdateProfessorRequest $request, SaveProfessorAction $action)
    {
        $action->execute(new Professor(), $request->validated());
        return redirect()->route('dashboard.professors.index')->with('success', 'professor updated.');
    }

    public function edit(Professor $professor)
    {
        $departments = Department::all();
        $departmentData = fractal($departments, new DepartmentTransformer())->toArray()['data'];
        $professorData = fractal($professor, new ProfessorTransformer())->includeImage()->toArray();
        return Inertia::render('Dashboard/Professor/Edit')->with([
            'professor' => $professorData,
            'departments' => $departmentData
        ]);
    }

    public function update(Professor $professor, CreateOrUpdateProfessorRequest $request, SaveProfessorAction $action)
    {
        $action->execute($professor, $request->validated());
        return redirect()->route('dashboard.professors.index')->with('success', 'professor updated.');
    }

    public function destroy(Professor $professor)
    {
        if ($professor->subjects()->count() > 0) {
            return redirect()->route('dashboard.professors.index')->with('error', 'professor ยังสอนอยู่');
        }
        $professor->delete();
        return redirect()->route('dashboard.professors.index')->with('success', 'professor deleted');
    }
}
