<?php

namespace App\Http\Controllers;

use App\Models\NationalPark;
use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function index()
    {
        $parks = NationalPark::withCount('settlements')->get();

        // Kigyűjti a neveket és a darabszámokat külön tömbökbe a JavaScript számára
        $labels = $parks->pluck('nev');
        $counts = $parks->pluck('settlements_count');

        return view('diagram.index', compact('labels', 'counts'));
    }
}