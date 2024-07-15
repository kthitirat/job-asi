<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use App\Http\Transformers\PerformanceTransformer;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::paginate(20);
        $performanceData = fractal($performances, new PerformanceTransformer())->toArray();
        return Inertia::render('Dashboard/Performance/Index')->with([
            'performances' => $performanceData
        ]);
      
    }  
    
    public function edit(Performance $performance)
    {
        // $performance = Performance::where('user_id', Auth::id())->first();
        
        $performanceData = fractal($performance, new PerformanceTransformer())->includeImages()->toArray();  
        return Inertia::render('Form')->with([
            'performance' => $performanceData
        ]);
    }

    public function togglePubish(Performance $performance)
    {
        $performance->is_published = !$performance->is_published;
        $performance->save();
        return response()->json(null, 200);
    }


}