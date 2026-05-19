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
}