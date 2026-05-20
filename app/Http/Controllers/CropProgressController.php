<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function store(Request $request, Field $field)
{
    $request->validate([

        'health_percentage' =>
            'required|numeric|min:0|max:100',

        'progress_percentage' =>
            'required|numeric|min:0|max:100',

        'predicted_yield' =>
            'required|numeric|min:0',

        'notes' => 'nullable',

        'crop_image' =>
            'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);

    // Crop Age Calculation
    $cropAge = Carbon::parse($field->sowing_date)
        ->diffInDays(now());

    // Image Upload
    $imagePath = null;

    if ($request->hasFile('crop_image')) {

        $imagePath = $request
            ->file('crop_image')
            ->store('crop-images', 'public');
    }

    // Save Progress
    CropProgress::create([

        'field_id' => $field->id,

        'growth_stage' =>
            $this->detectGrowthStage($cropAge),

        'health_percentage' =>
            $request->health_percentage,

        'progress_percentage' =>
            $request->progress_percentage,

        'predicted_yield' =>
            $request->predicted_yield,

        'notes' =>
            $request->notes,

        'crop_age' =>
            $cropAge,

        'crop_image' =>
            $imagePath,

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