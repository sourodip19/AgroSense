<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::with('farm')->latest()->get();

        return view('fields.index', compact('fields'));
    }

    public function create()
    {
        $farms = Farm::all();

        return view('fields.create', compact('farms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'farm_id' => 'required',
            'field_name' => 'required',
            'crop_type' => 'required',
            'soil_type' => 'required',
            'sowing_date' => 'required',
            'irrigation_status' => 'required',
            'field_status' => 'required',
            'field_size' => 'required|numeric|min:0.1',
        ]);

        Field::create([
    'farm_id' => $request->farm_id,
    'field_name' => $request->field_name,
    'crop_type' => $request->crop_type,
    'soil_type' => $request->soil_type,
    'sowing_date' => $request->sowing_date,
    'irrigation_status' => $request->irrigation_status,
    'field_status' => $request->field_status,
    'field_size' => $request->field_size,
]);

        return redirect()->route('fields.index')
            ->with('success', 'Field Added Successfully');
    }

    public function edit(Field $field)
{
    $farms = Farm::all();

    return view('fields.edit', compact('field', 'farms'));
}

public function update(Request $request, Field $field)
{
    $request->validate([
        'field_name' => 'required',
        'field_size' => 'required|numeric',
        'crop_type' => 'required',
        'soil_type' => 'required',
        'irrigation_type' => 'required',
        'sowing_date' => 'required|date',
    ]);

    $field->update($request->all());

    return redirect()->route('fields.index')
        ->with('success', 'Field Updated Successfully');
}

public function destroy(Field $field)
{
    $field->delete();

    return redirect()->route('fields.index')
        ->with('success', 'Field Deleted Successfully');
}
}