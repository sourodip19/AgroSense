<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::where('user_id', Auth::id())->get();

        return view('farms.index', compact('farms'));
    }

    public function create()
    {
        return view('farms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'farm_name' => 'required',
            'location' => 'required',
            'total_area' => 'required|numeric',
        ]);

        Farm::create([
            'user_id' => Auth::id(),
            'farm_name' => $request->farm_name,
            'location' => $request->location,
            'total_area' => $request->total_area,
        ]);

        return redirect()->route('farms.index')
            ->with('success', 'Farm Added Successfully');
    }
public function show(Farm $farm)
{
    $farm->load('fields');

    return view('farms.show', compact('farm'));
}

public function edit(Farm $farm)
{
    return view('farms.edit', compact('farm'));
}

public function update(Request $request, Farm $farm)
{
    $request->validate([
        'farm_name' => 'required',
        'location' => 'required',
        'total_area' => 'required|numeric',
    ]);

    $farm->update($request->all());

    return redirect()->route('farms.index')
        ->with('success', 'Farm Updated Successfully');
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

    $response = \Illuminate\Support\Facades\Http::post(

        "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}",

        [

            'contents' => [[

                'parts' => [[

                    'text' => $prompt

                ]]

            ]]

        ]

    );

    $result =
        $response['candidates'][0]['content']['parts'][0]['text']
        ?? 'कोई जानकारी उपलब्ध नहीं है।';

    return back()->with(
        'crop_ai_result',
        $result
    );
}
}