<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CropProgressController extends Controller
{
    public function index()
    {
        $progresses = CropProgress::with('field')->latest()->get();

        return view('crop-progress.index', compact('progresses'));
    }

    public function create()
    {
        $fields = Field::all();

        return view('crop-progress.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required',
            'growth_stage' => 'required',
            'health_percentage' => 'required|numeric|min:0|max:100',
            'progress_percentage' => 'required|numeric|min:0|max:100',
            'predicted_yield' => 'required|numeric',
        ]);

        $field = Field::findOrFail($request->field_id);

$cropAge = Carbon::parse($field->sowing_date)
    ->diffInDays(now());

CropProgress::create([

    'field_id' => $request->field_id,

   'growth_stage' => $this->detectGrowthStage($cropAge),

    'health_percentage' => $request->health_percentage,

    'progress_percentage' => $request->progress_percentage,

    'predicted_yield' => $request->predicted_yield,

    'notes' => $request->notes,

    'crop_age' => $cropAge,

]);

        return redirect()->route('crop-progress.index')
            ->with('success', 'Crop Progress Added');
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