<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trail;
use App\Models\NationalPark;
use App\Models\Settlement;

class DatabaseController extends Controller
{
    public function index()
    {
        $trails = Trail::with(['settlement.nationalPark'])->get();
        $parks = NationalPark::all();
        return view('database.index', compact('trails', 'parks'));
    }
}