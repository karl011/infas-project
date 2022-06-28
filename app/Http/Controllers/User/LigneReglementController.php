<?php

namespace App\Http\Controllers\User;

use App\Models\Reglement;
use Illuminate\Http\Request;
use App\Models\LigneReglement;
use App\Http\Controllers\Controller;

class LigneReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reglements = Reglement::all();
        $ligneReglements = LigneReglement::all();
        return view('user.ligneReglements.create', compact('reglements', 'ligneReglements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reglements = Reglement::all();
        $ligneReglements = LigneReglement::all();
        // $fonctions = auth()->user()->antenne->etudiants()->get();

        return view( 'user.ligneReglements.create',[
            'reglements' => $reglements,
            'ligneReglements' => $ligneReglements
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
        $ligneReglement = $request->validate([
            'lreg_num' => ['required','string','max:50'],
            'lreg_lib' => ['required','string','max:200'],
            'lreg_mont' => ['required','integer'],
            'lreg_qte' => ['required','integer'],
            'lreg_stat_code' => ['required','string','max:5'],
            'reglement_id' => ['required', 'integer']
        ]);

        LigneReglement::create($ligneReglement);

        return back()->with('toast_success', 'Ligne de reglement enregistrée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LigneReglement  $ligneReglement
     * @return \Illuminate\Http\Response
     */
    public function show(LigneReglement $ligneReglement)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LigneReglement  $ligneReglement
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneReglement $ligneReglement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LigneReglement  $ligneReglement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LigneReglement $ligneReglement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LigneReglement  $ligneReglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneReglement $ligneReglement)
    {
        //
    }
}
