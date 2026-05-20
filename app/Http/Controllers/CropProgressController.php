<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\CropAiService;
class CropProgressController extends Controller
{
    public function index(Field $field)
    {
        $progresses = CropProgress::where('field_id', $field->id)
            ->latest()
            ->get();

        return view('crop-progress.index', compact(
            'field',
            'progresses'
        ));
    }

    public function create(Field $field)
    {   
        return view('crop-progress.create', compact('field'));
    }

    public function store(
    Request $request,
    Field $field,
    CropAiService $cropAiService
)
{
    $request->validate([

        'crop_condition' => 'required',

        'visible_issue' => 'required',

        'crop_image' => 'required|image',

        'notes' => 'nullable',

    ]);

    $cropAge = Carbon::parse($field->sowing_date)
        ->diffInDays(now());

    $imagePath = $request
        ->file('crop_image')
        ->store('crop-images', 'public');

    // AI Analysis
    $aiResponse = $cropAiService->analyze(

        $imagePath,

        $field->crop_type,

        $request->visible_issue

    );

    $text =
        $aiResponse['candidates'][0]['content']['parts'][0]['text']
        ?? '';

    preg_match('/Health Score:\s*(\d+)/', $text, $healthMatch);

    preg_match('/Disease:\s*(.*)/', $text, $diseaseMatch);

    preg_match('/Risk Level:\s*(.*)/', $text, $riskMatch);

    preg_match('/Recommendation:\s*(.*)/', $text, $recommendationMatch);

    CropProgress::create([

        'field_id' => $field->id,

        'growth_stage' => $this->detectGrowthStage($cropAge),

        'crop_condition' => $request->crop_condition,

        'visible_issue' => $request->visible_issue,

        'crop_image' => $imagePath,

        'notes' => $request->notes,

        'crop_age' => $cropAge,

        'health_percentage' => $healthMatch[1] ?? 70,

        'progress_percentage' => rand(50, 100),

        'predicted_yield' => rand(200, 500),

        'ai_health_score' => $healthMatch[1] ?? 70,

        'ai_disease' => trim($diseaseMatch[1] ?? 'Unknown'),

        'ai_risk_level' => trim($riskMatch[1] ?? 'Medium'),

        'ai_recommendation' => trim($recommendationMatch[1] ?? 'Monitor crop regularly'),

    ]);

    return redirect()->route(
        'crop-progress.index',
        $field
    );
}

    private function detectGrowthStage($cropAge)
    {
        if ($cropAge <= 10) {
            return 'Germination';
        }

        if ($cropAge <= 30) {
            return 'Vegetative';
        }

        if ($cropAge <= 60) {
            return 'Flowering';
        }

        if ($cropAge <= 90) {
            return 'Fruiting';
        }

        return 'Harvest';
    }
}