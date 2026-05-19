<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Field;
use App\Models\CropProgress;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $farms = Farm::where('user_id', $userId)->count();

        $fields = Field::whereHas('farm', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $averageHealth = CropProgress::avg('health_percentage');

        $totalYield = CropProgress::sum('predicted_yield');

        $progresses = CropProgress::latest()->take(5)->get();

        return view('farmer.dashboard', compact(
            'farms',
            'fields',
            'averageHealth',
            'totalYield',
            'progresses'
        ));
    }
}