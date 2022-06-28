<?php

namespace App\Http\Controllers\User;

use App\Models\Fonction;
use App\Models\Reglelog;
use Illuminate\Http\Request;
use App\Models\LigneReglement;
use App\Http\Controllers\Controller;

class ReglelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::all();
        $reglelogs = Reglelog::all();
        $ligne_reglements = LigneReglement::all();

        return view('user.reglelogs.create', compact('fonctions', 'ligne_reglements','reglelogs' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reglelogs = Reglelog::all();
        $fonctions = auth()->user()->antenne->etudiants()->get();
        $ligne_reglements = LigneReglement::all();

        return view( 'user.reglelogs.create',[
            'fonctions' => $fonctions,
            'reglelogs' => $reglelogs,
            'ligne_reglements' => $ligne_reglements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglelog = $request->validate([
            'relog_date' => ['required', 'date'],
            'relog_stat_code' => ['required','string','max:50'],
            'fonction_id' => ['required','integer'],
            'ligne_reglement_id' => ['required','integer']
        ]);

        Reglelog::create($reglelog);

        return back()->with('toast_success', 'reglelog enregistré avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reglelog  $reglelog
     * @return \Illuminate\Http\Response
     */
    public function show(Reglelog $reglelog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reglelog  $reglelog
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglelog $reglelog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reglelog  $reglelog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglelog $reglelog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reglelog  $reglelog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglelog $reglelog)
    {
        //
    }
}
