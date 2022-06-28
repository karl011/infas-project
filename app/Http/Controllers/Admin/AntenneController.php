<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antenne;
use Illuminate\Http\Request;

class AntenneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antennes = Antenne::all();

        return view('admin.antennes.index', compact('antennes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antenne = $request->validate([
            'ant_code' => ['required','string','max:3','unique:antennes'],
            'ant_lib' => ['required','string','max:100'],
            'ant_statut' => ['required','string','max:5'],
        ]);

        Antenne::create($antenne);
        
        return back()->with('toast_success', 'Antènne crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Antenne  $antenne
     * @return \Illuminate\Http\Response
     */
    public function show(Antenne $antenne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Antenne  $antenne
     * @return \Illuminate\Http\Response
     */
    public function edit(Antenne $antenne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Antenne  $antenne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antenne $antenne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Antenne  $antenne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antenne $antenne)
    {
        //
    }
}
