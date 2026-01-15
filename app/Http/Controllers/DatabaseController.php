<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trail;

class DatabaseController extends Controller
{
    public function index()
    {
        $trails = Trail::with(['settlement.nationalPark'])->get();
        return view('database.index', compact('trails'));
    }
}