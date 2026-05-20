<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Support\Facades\Auth;
use App\Services\WeatherService;
use Illuminate\Http\Request;
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
        $lat = session('lat', 23.4050);
$lon = session('lon', 88.4907);

$weather = $weatherService->getWeather($lat, $lon);

        return view('farmer.dashboard', compact(
            'farms',
            'fields',
            'averageHealth',
            'totalYield',
            'progresses',
            'weather'
        ));
    }
    public function weatherUpdate(Request $request)
{
    session([

        'lat' => $request->lat,
        'lon' => $request->lon,

    ]);

    return response()->json([
        'success' => true
    ]);
}
}