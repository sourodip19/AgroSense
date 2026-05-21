<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\WeatherService;
use App\Services\AiRecommendationService;

class FarmerController extends Controller
{
    public function dashboard(
        WeatherService $weatherService,
        AiRecommendationService $aiService
    )
    {
        $userId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Analytics
        |--------------------------------------------------------------------------
        */

        // Total Farms
        $farms = Farm::where('user_id', $userId)->count();

        // Total Fields
        $fields = Field::whereHas('farm', function ($query) use ($userId) {

            $query->where('user_id', $userId);

        })->count();

        // Average Crop Health
        $averageHealth = CropProgress::avg('health_percentage');

        // Total Predicted Yield
        $totalYield = CropProgress::sum('predicted_yield');

        // Recent Crop Progress
        $progresses = CropProgress::latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Weather System
        |--------------------------------------------------------------------------
        */

        // Default fallback coordinates
        $lat = session('lat', 23.4050);
        $lon = session('lon', 88.4907);

        // Live weather
        $weather = $weatherService->getWeather($lat, $lon);

        /*
        |--------------------------------------------------------------------------
        | Smart Agricultural Alerts
        |--------------------------------------------------------------------------
        */

        $alerts = [];

        // Critical Crop Health
        $criticalFields = CropProgress::where(
            'health_percentage',
            '<',
            40
        )->count();

        if ($criticalFields > 0) {

            $alerts[] = [

                'type' => 'danger',

                'message' =>
                    'Critical crop health detected in some fields.'

            ];
        }

        // Moderate Warning
        $warningFields = CropProgress::whereBetween(
            'health_percentage',
            [40, 70]
        )->count();

        if ($warningFields > 0) {

            $alerts[] = [

                'type' => 'warning',

                'message' =>
                    'Some crops require monitoring attention.'

            ];
        }

        // Harvest Ready
        $harvestReady = CropProgress::where(
            'crop_age',
            '>',
            90
        )->count();

        if ($harvestReady > 0) {

            $alerts[] = [

                'type' => 'success',

                'message' =>
                    'Some crops are ready for harvesting.'

            ];
        }

        // High Temperature Alert
        if (($weather['main']['temp'] ?? 0) > 35) {

            $alerts[] = [

                'type' => 'danger',

                'message' =>
                    'Extreme temperature detected. Irrigation recommended.'

            ];
        }

        // Low Humidity Alert
        if (($weather['main']['humidity'] ?? 0) < 30) {

            $alerts[] = [

                'type' => 'warning',

                'message' =>
                    'Low humidity detected. Monitor soil moisture.'

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | AI Crop Advisor
        |--------------------------------------------------------------------------
        */

        $latestProgress = CropProgress::latest()->first();

        $aiAdvice = null;

        if ($latestProgress) {

            $field = $latestProgress->field;

            $aiAdvice = $aiService->generate([

                'crop' => $field->crop_type,

                'health' => $latestProgress->health_percentage,

                'temperature' => $weather['main']['temp'] ?? 0,

                'humidity' => $weather['main']['humidity'] ?? 0,

                'stage' => $latestProgress->growth_stage,

                'yield' => $latestProgress->predicted_yield,

            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Return Dashboard View
        |--------------------------------------------------------------------------
        */

        return view('farmer.dashboard', compact(
            'farms',
            'fields',
            'averageHealth',
            'totalYield',
            'progresses',
            'weather',
            'alerts',
            'aiAdvice'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Weather Geolocation Session Update
    |--------------------------------------------------------------------------
    */

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
  

public function cropSearch(Request $request)
{
    $request->validate([

        'crop_name' => 'required'

    ]);

    $crop = $request->crop_name;

    $apiKey = env('GEMINI_API_KEY');

    $prompt = "

You are an expert Indian agriculture advisor.

The farmer searched: {$crop}

Understand local Indian crop names.

Respond ONLY in simple Hindi.

Give detailed farming guidance including:

1. खेती का सही समय
2. मिट्टी
3. सिंचाई
4. खाद
5. रोग नियंत्रण
6. उत्पादन बढ़ाने के तरीके

Make response farmer-friendly.

";

    try {

        $response = Http::timeout(20)

            ->post(

                 "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",

                [

                    'contents' => [[

                        'parts' => [[

                            'text' => $prompt

                        ]]

                    ]]

                ]

            );

        $data = $response->json();

        if (
            isset(
                $data['candidates'][0]['content']['parts'][0]['text']
            )
        ) {

            $result =
                $data['candidates'][0]['content']['parts'][0]['text'];

        } elseif (isset($data['error'])) {

            $result =
                'API Error: ' .
                $data['error']['message'];

        } else {

            $result =
                'AI service temporarily unavailable.';
        }

    } catch (\Exception $e) {

        $result =
            'Server Error: ' .
            $e->getMessage();
    }

    return back()->with(
        'crop_ai_result',
        $result
    );
}




}