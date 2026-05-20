<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Support\Facades\Auth;
use App\Services\WeatherService;

class FarmerController extends Controller
{
    public function dashboard(WeatherService $weatherService)
    {
        $userId = Auth::id();

        // Farms Count
        $farms = Farm::where('user_id', $userId)->count();

        // Fields Count
        $fields = Field::whereHas('farm', function ($query) use ($userId) {

            $query->where('user_id', $userId);

        })->count();

        // Average Health
        $averageHealth = CropProgress::avg('health_percentage');

        // Total Yield
        $totalYield = CropProgress::sum('predicted_yield');

        // Recent Progress
        $progresses = CropProgress::latest()
            ->take(5)
            ->get();

        // Weather API
        $weather = $weatherService->getWeather();

        return view('farmer.dashboard', compact(
            'farms',
            'fields',
            'averageHealth',
            'totalYield',
            'progresses',
            'weather'
        ));
    }
}