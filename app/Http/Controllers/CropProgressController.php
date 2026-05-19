<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Http\Request;

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

        CropProgress::create($request->all());

        return redirect()->route('crop-progress.index')
            ->with('success', 'Crop Progress Added');
    }
}