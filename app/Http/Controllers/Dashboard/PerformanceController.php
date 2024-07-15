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
}