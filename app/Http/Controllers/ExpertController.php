<?php

namespace App\Http\Controllers;

class ExpertController extends Controller
{
    public function dashboard()
    {
        return view('expert.dashboard');
    }
}