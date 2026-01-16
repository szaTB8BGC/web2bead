<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Trail;
use App\Models\Settlement;


class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trails = Trail::with('settlement')->get();
        return view('trails.index', compact('trails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settlements = Settlement::all();
        return view('trails.create', compact('settlements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required',
            'hossz' => 'required|numeric',
            'telepulesid' => 'required'
        ]);

        Trail::create($request->all());
        return redirect()->route('trails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
        $settlements = Settlement::all();
        return view('trails.edit', compact('trail', 'settlements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trail $trail)
    {
        $trail->update($request->all());
        return redirect()->route('trails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
        $trail->delete();
        return redirect()->route('trails.index');
    }
}